<?php
    $home = $_SERVER['DOCUMENT_ROOT'];
	include $home.'/inc/connect.php';
	include $home.'/inc/classes.php';
	include $home.'/inc/functions.php';
	
    if(!loggedin()){
		header('location: /');
		exit();
	}
    $title = 'Search Users - Admin';
?>
<!DOCTYPE html>
<html lang="en">    
        <?php include $home.'/inc/head.php'; ?>
    <body>
        <?php include $home.'/inc/header.php'; ?>
        <div class="bg-white main-container">
            <?php include_once $home.'/inc/left-nav-bar.php'; ?>
            <div class="container-body d-flex flex-lg-row flex-column">
                <div style="min-height: 80px;" class="position-relative align-self-lg-stretch flex-lg-grow-1">
                    <div class="position-absolute top-0 bottom-0 start-0 end-0 p-1 p-lg-2">
                        <form id="searchForm">
                            <nav class="form-label">Search with Name, Email or Phone Number</nav>
                            <div class="position-relative d-flex flex-lg-row border rounded">
                                <input type="search" placeholder="Search..." class="form-control flex-fill border-0" name="searchText" required />
                                <button type="submit" class="btn btn-primary">Search</button>
                                <div onclick="event.stopPropagation()" id="resultDiv" style="max-height:400px;z-index:2;" class="position-absolute d-none bg-light h-auto scrollbar w-100 border rounded top-100"></div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="position-relative align-self-stretch flex-grow-1 border-start">
                    <div id="profile-data" class="position-absolute top-0 bottom-0 start-0 end-0 overflow-auto p-1 p-lg-2">
                    </div>
                </div>
            </div>
        </div>
        <script>

            var $stagedButton = null;
            
            $('form#searchForm').on('submit', function(evt){
                evt.preventDefault();
                var $this = $(this);
                var data = $this.serialize();
                $(this).find('button[type=submit]').html('<img src="https://market-20.com//images/loading-gif.gif" width="20" />');
                $(this).find(':input').prop('disabled', true);
                $.ajax({
                    url: '/apis/search.php',
                    type: 'POST',
                    data: data,
                    dataType: 'json',
                    error: function(){
                        $this.find('button[type=submit]').html('Search');
                    },
                    success: function(data){
                        var dataHtml = '';
                        $this.find('button[type=submit]').html('Search');
                        $this.find(':input').prop('disabled', false);
                        if(data.hasData){
                            var dataArr = data.data;
                            dataHtml += '<ul class="data-list p-0">';
                            for(var i = 0; i < dataArr.length; i++) {
                                var dataObj = dataArr[i];
                                var userID = dataObj.userID;
                                var firstName = dataObj.firstName;
                                var lastName = dataObj.lastName;
                                var name = firstName + ' ' + lastName;
                                var email = dataObj.email;
                                var photoUrl = dataObj.photoUrl;
                                var phone = dataObj.phone;
                                var dataStr = encodeURIComponent(JSON.stringify(dataObj));

                                dataHtml += '<li onkeypress="triggerClick($(this), event)" onclick="getUserInfo('+userID+')" tabindex="0" class="rounded overflow-hidden p-2 m-2 cursor-pointer text-start">';
                                dataHtml += '<img src="'+photoUrl+'" class="def-img align-middle width-40 height-40">';
                                dataHtml += '<div class="d-inline-block ms-2 align-middle" style="width: calc(100% - 40px)">';
                                dataHtml += '<span class="d-block fs-14 overflow-hidden ellipsis">' + name + '</span>';
                                dataHtml += '<span class="d-block fs-13 text-slategrey overflow-hidden ellipsis">';
                                dataHtml += email;
                                dataHtml += '<span class="mx-1">&#8226;</span>';
                                dataHtml += phone;
                                dataHtml += '</span>';
                                dataHtml += '</div>';
                                dataHtml += '</li>';
                            }
                            dataHtml += '</ul>';
                        } else {
                            dataHtml = '<nav class="fw-bold text-center">No Data Found</nav>';
                        }
                        $('div#resultDiv').removeClass('d-none').html(dataHtml);
                    }
                });
            });

            function getUserInfo(userId){
                $('div#resultDiv').addClass('d-none');
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

            function triggerClick($this, evt){
                var keyCode = evt.keyCode;
                if(keyCode === 13){
                    $this.trigger('click');
                }
            }

            $("body").click(function() {
                $('div#resultDiv').addClass('d-none');
            });

            $(window).keydown(function(evt) {
                var keyCode = evt.keyCode;
                if(keyCode === 38 || keyCode === 40){
                    if(!$('div#resultDiv').hasClass('d-none'))
                        evt.preventDefault();
                    moveFocusToList(keyCode);
                }
            });

            function moveFocusToList(keyCode){
                var $liLists = $('div#resultDiv ul.data-list li');
                var listLength = $liLists.length;
                if(listLength > 0){
                    var isDownKey = keyCode === 40;
                    var $focusedLi = $liLists.filter(':focus');
                    var lastIndex = listLength - 1;
                    var noFocus = $focusedLi.length == 0;
                    var focusedLiIndex = $focusedLi.index();
                    var focusIndex = noFocus ? isDownKey ? 0 : lastIndex : isDownKey ? focusedLiIndex + 1 : focusedLiIndex - 1;
                    focusIndex = focusIndex < 0 ? lastIndex : focusIndex;
                    focusIndex = focusIndex > lastIndex ? 0 : focusIndex;
                    $liLists.eq(focusIndex).focus();
                }
            }
            
        </script>
    </body>
</html>