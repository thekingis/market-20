<?php
    $home = $_SERVER['DOCUMENT_ROOT'];
	include $home.'/inc/connect.php';
	include $home.'/inc/classes.php';
	include $home.'/inc/functions.php';
	
    if(!loggedin()){
		header('location: /');
		exit();
	}
    $title = 'All Users - Admin';

    $rowQuery = mysqli_query($con, "SELECT * FROM `accounts`");
    $totalRows = mysqli_num_rows($rowQuery);
    $limit = 30;
    $maxPages = 10;
    $numOfPage = ceil($totalRows / $limit);
    $minPage = min($maxPages, $numOfPage);
?>
<!DOCTYPE html>
<html lang="en">    
        <?php include $home.'/inc/head.php'; ?>
    <body>
        <?php include $home.'/inc/header.php'; ?>
        <div class="bg-white main-container">
            <?php include_once $home.'/inc/left-nav-bar.php'; ?>
            <div class="container-body d-flex flex-lg-row flex-column">
                <div class="position-relative align-self-stretch flex-grow-1">
                    <div class="position-absolute top-0 bottom-0 start-0 end-0 overflow-auto p-1 p-lg-2">
                    <?php
                        $usersQuery = mysqli_query($con, "SELECT * FROM `accounts` ORDER BY `fName`, `lName` DESC LIMIT 0, ".$limit);
                        if(mysqli_num_rows($usersQuery) > 0){
                            echo '<div class="position-relative" id="data-div">';
                            while($usersSql = mysqli_fetch_array($usersQuery)){
                                $userId = $usersSql['id'];
                                $email = $usersSql['email'];
                                $phone = $usersSql['phone'];
                                $photoUrl = $usersSql['photoUrl'];
                                $name = $usersSql['fName'].' '.$usersSql['lName'];
                                echo '<div onclick="getUserInfo('.$userId.')" class="d-flex m-1 cursor-pointer bg-light rounded border p-0" style="height:50px;">';
                                echo '<div class="d-flex align-items-center justify-content-center h-100 p-1" style="width:50px;">';
                                echo '<img src="'.$photoUrl.'" class="def-img align-middle">';
                                echo '</div>';
                                echo '<div class="d-flex align-items-center h-100 flex-fill">';
                                echo '<div class="h-auto flex-fill p-2">';
                                echo '<nav class="fs-6 fw-bold overflow-hidden ellipsis w-100">'.$name.'</nav>';
                                echo '<nav class="fs-13 text-slategrey overflow-hidden ellipsis">'.$email.'<span class="mx-1">&#8226;</span>'.$phone.'</nav>';
                                echo '</div>';
                                echo '</div>';
                                echo '</div>'; 
                            }
                            echo '</div>';
                            ?>
                            <div class="text-center mt-3">
                                <?php
                                    $disabledMore = ($numOfPage > $maxPages) ? '' : 'disabled';
                                    $disabledNext = ($minPage > 1) ? '' : 'disabled';
                                    echo '<button id="movePrevBtn" class="btn btn-outline-secondary m-1" onclick="moveToPrev()" disabled>&lt;&lt;</button>';
                                    echo '<button id="prevBtn" class="btn btn-outline-secondary m-1" onclick="gotoPrevious($(this))" disabled>&lt; Previous</button>';
                                    echo '<span>';
                                    for($i = 1; $i <= $minPage; $i++){
                                        $isDisabled = $i == 1 ? 'disabled' : '';
                                        $xc = $isDisabled ? ' bg-secondary text-light' : '';
                                        echo '<button data-page="'.$i.'" onclick="gotoPage($(this))" class="btn btn-outline-secondary m-1'.$xc.'" '.$isDisabled.'>'.$i.'</button>';
                                    }
                                    echo '<button id="nextBtn" class="btn btn-outline-secondary m-1" onclick="gotoNext($(this))" '.$disabledNext.'>Next &gt;</button>';
                                    echo '<button id="moveNextBtn" class="btn btn-outline-secondary m-1" onclick="moveToNext()" '.$disabledMore.'>&gt;&gt;</button>';
                                    echo '<span>';
                                ?>
                            </div>
                            <?php
                        } else {
                            echo '<img src="https://www.grafil-computers.com/images/no-data.png" class="mt-5" style="width: 200px;">';
                            echo '<nav class="text-black fs-4">No Data Found</nav>';
                        }
                    ?>
                    </div>
                </div>
                <div class="position-relative align-self-stretch flex-grow-1 border-start">
                    <div id="profile-data" class="position-absolute top-0 bottom-0 start-0 end-0 overflow-auto p-1 p-lg-2">
                    </div>
                </div>
            </div>
        </div>
        <script>

            var $div = $('div#data-div');
            var currentPage = 1;
            var minRange = 1;
            var fetchingData = false;
            var maxPages = <?php echo $maxPages; ?>;
            var maxRange = <?php echo $maxPages; ?>;
            var numOfPage = <?php echo $numOfPage; ?>;

            function getUserInfo(userId){
                if(!fetchingData){
                    $('div#profile-data').find('a').addClass('disabled');
                    var loader = '<img class="position-absolute top-50 start-50 translate-middle" src="https://market-20.com//images/loading-gif.gif" width="30" />';
                    $('div#profile-data').addClass('opacity-50').append($(loader));
                    var data = {userId: userId};
                    $.ajax({
                        url: '/apis/get-user-info.php',
                        type: 'POST',
                        data: data,
                        error: function(){
                            $('div#profile-data').addClass('opacity-100');
                            $('div#profile-data').find('a').removeClass('disabled');
                        },
                        success: function(htmlData){
                            $('div#profile-data').html(htmlData);
                            $('div#profile-data').addClass('opacity-100');
                            $('div#profile-data').find('a').removeClass('disabled');
                        }
                    });
                }
            }

            function gotoPage($button){
                $('button.bg-secondary[data-page]').prop('disabled', false).removeClass('bg-secondary').removeClass('text-light');
                $button.prop('disabled', true).addClass('bg-secondary').addClass('text-light');
                currentPage = parseInt($button.attr('data-page'));
                if(currentPage > 1)
                    $('button#prevBtn').prop('disabled', false);
                if(currentPage < numOfPage)
                    $('button#nextBtn').prop('disabled', false);
                fetchPageData();
            }

            function moveToPrev(){
                minRange = Math.max((minRange - maxPages), 1);
                maxRange = minRange + maxPages - 1;
                for(var i = minRange; i <= maxRange; i++){
                    var index = Math.abs(minRange - i);
                    $('button[data-page]').eq(index).text(i).attr('data-page', i);
                }
                $('button[data-page]').prop('disabled', false).removeClass('bg-secondary').removeClass('text-light');
                $('button[data-page='+currentPage+']').prop('disabled', true).addClass('bg-secondary').addClass('text-light');
                if(minRange == 1)
                    $('button#movePrevBtn').prop('disabled', true);
                if(currentPage < numOfPage)
                    $('button#nextBtn').prop('disabled', false);
                if(maxRange < numOfPage)
                    $('button#moveNextBtn').prop('disabled', false);
            }

            function moveToNext(){
                maxRange = Math.min((maxPages + maxRange), numOfPage);
                minRange = maxRange - maxPages + 1;
                for(var i = minRange; i <= maxRange; i++){
                    var index = Math.abs(minRange - i);
                    $('button[data-page]').eq(index).text(i).attr('data-page', i);
                }
                $('button[data-page]').prop('disabled', false).removeClass('bg-secondary').removeClass('text-light');
                $('button[data-page='+currentPage+']').prop('disabled', true).addClass('bg-secondary').addClass('text-light');
                if(maxRange == numOfPage)
                    $('button#moveNextBtn').prop('disabled', true);
                if(currentPage > 1)
                    $('button#prevBtn').prop('disabled', false);
                if(minRange > 1)
                    $('button#movePrevBtn').prop('disabled', false);
            }

            function scrollToPage(){
                var maxPage = Math.ceil(currentPage / 10) * 10;
                maxRange = Math.min(maxPage, numOfPage);
                minRange = maxRange - maxPages + 1;
                for(var i = minRange; i <= maxRange; i++){
                    var index = Math.abs(minRange - i);
                    $('button[data-page]').eq(index).text(i).attr('data-page', i);
                }
                $('button[data-page]').prop('disabled', false).removeClass('bg-secondary').removeClass('text-light');
                $('button[data-page='+currentPage+']').prop('disabled', true).addClass('bg-secondary').addClass('text-light');
                if(maxRange == numOfPage)
                    $('button#moveNextBtn').prop('disabled', true);
                if(minRange == 1)
                    $('button#movePrevBtn').prop('disabled', true);
            }

            function gotoNext($button){
                currentPage++;
                if(currentPage.inRange(minRange, maxRange)){
                    var currentPageIndex = $('button.bg-secondary[data-page]').index();
                    var nextPageIndex = currentPageIndex + 1;
                    $('button.bg-secondary[data-page]').prop('disabled', false).removeClass('bg-secondary').removeClass('text-light');
                    if(nextPageIndex < maxPages)
                        $('button[data-page]').eq(nextPageIndex).prop('disabled', true).addClass('bg-secondary').addClass('text-light');
                    else 
                        moveToNext();
                } else {
                    scrollToPage();
                }
                if(currentPage == numOfPage)
                    $button.prop('disabled', true);
                if(currentPage > 1)
                    $('button#prevBtn').prop('disabled', false);
                if(minRange > 1)
                    $('button#movePrevBtn').prop('disabled', false);
                fetchPageData();
            }

            function gotoPrevious($button){
                currentPage--;
                if(currentPage.inRange(minRange, maxRange)){
                    var currentPageIndex = $('button.bg-secondary[data-page]').index();
                    var prevPageIndex = currentPageIndex - 1;
                    $('button.bg-secondary[data-page]').prop('disabled', false).removeClass('bg-secondary').removeClass('text-light');
                    if(prevPageIndex > -1)
                        $('button[data-page]').eq(prevPageIndex).prop('disabled', true).addClass('bg-secondary').addClass('text-light');
                    else 
                        moveToPrev();
                } else {
                    scrollToPage();
                }
                if(currentPage == 1)
                    $button.prop('disabled', true);
                if(currentPage < numOfPage)
                    $('button#nextBtn').prop('disabled', false);
                if(maxRange < numOfPage)
                    $('button#moveNextBtn').prop('disabled', false);
                    fetchPageData();
            }

            function fetchPageData(){
                fetchingData = true;
                $div.find('a').addClass('disabled');
                var loader = '<img class="position-absolute top-50 start-50 translate-middle" src="https://market-20.com//images/loading-gif.gif" width="30" />';
                $div.addClass('opacity-50').append($(loader));
                var data = {
                    page: currentPage
                };
                $.ajax({
                    url: '/apis/view-users.php',
                    type: 'POST',
                    data: data,
                    error: function(){
                        fetchPageData = false;
                        $div.addClass('opacity-100');
                        $div.find('a').removeClass('disabled');
                        $('button[data-page='+currentPage+']').prop('disabled', false).removeClass('bg-secondary').removeClass('text-light');
                    },
                    success: function(htmlData){
                        fetchPageData = false;
                        $div.html(htmlData);
                        $div.addClass('opacity-100');
                        $div.find('a').removeClass('disabled');
                        $('button[data-page='+currentPage+']').prop('disabled', true).addClass('bg-secondary').addClass('text-light');
                    }
                });
            }

        </script>
    </body>
</html>