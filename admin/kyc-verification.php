<?php
    $home = $_SERVER['DOCUMENT_ROOT'];
	include $home.'/inc/connect.php';
	include $home.'/inc/classes.php';
	include $home.'/inc/functions.php';
	
    if(!loggedin()){
		header('location: /');
		exit();
	}
    $title = 'KYC Verification - Admin';
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
                    <div class="position-absolute start-0 end-0 p-1 p-lg-2">
                        <form id="searchForm">
                            <nav class="form-label">Search with Name, Email or Phone Number</nav>
                            <div class="position-relative d-flex flex-lg-row border rounded">
                                <input type="search" placeholder="Search..." class="form-control flex-fill border-0" name="searchText" required />
                                <button type="submit" class="btn btn-primary">Search</button>
                                <div onclick="event.stopPropagation()" id="resultDiv" style="max-height:400px;z-index:2;" class="position-absolute d-none bg-light h-auto scrollbar w-100 border rounded top-100"></div>
                            </div>
                        </form>
                        <div class="m-2" id="dataBox" style="z-index:1;"></div>
                    </div>
                </div>
                <div class="position-relative align-self-stretch flex-grow-1 border-start">
                    <div class="position-absolute start-0 end-0 p-1 p-lg-2">
                        <h3 class="text-center">KYC Enabled Users</h3>
                        <?php
                            $query = mysqli_query($con, "SELECT * FROM `kyc`");
                            if(mysqli_num_rows($query) == 0){
                                echo '<nav class="mt-4 d-flex justify-content-center"><img src="https://market-20.com/images/no-data.png" class="w-50" /></nav>';
                            } else {
                                while($sql = mysqli_fetch_array($query)){
                                    $userId = $sql['userId'];
                                    $userInfo = new UserInfo($con, $userId);
                                    echo '<div class="border rounded m-2 p-2">
                                        <div class="d-flex align-items-center">
                                            <nav><img src="'.$userInfo->photoUrl.'" class="def-img align-middle width-40 height-40"></nav>
                                            <div class="align-middle p-2">
                                                <nav class="fs-14 overflow-hidden ellipsis">'.$userInfo->fullName.'</nav>
                                                <nav class="fs-13 text-slategrey overflow-hidden ellipsis">'.$userInfo->email.'<span class="mx-1">&#8226;</span>'.$userInfo->phone.'</nav>
                                            </div>
                                        </div>
                                        <button onclick="showKYCModal(this)" data-userID="'.$userId.'" data-isKYCEnabled="true" class="btn btn-danger" style="margin-left:50px;">Disable KYC</button>
                                    </div>';
                                }
                            }
                        ?>
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

                                dataHtml += '<li onkeypress="triggerClick($(this), event)" onclick="displayUser(JSON.parse(\''  + JSON.stringify(dataObj).replace(/'/g, '&apos;').replace(/"/g, '&quot;') + '\'))" tabindex="0" class="rounded overflow-hidden p-2 m-2 cursor-pointer text-start">';
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

            function displayUser(dataObj){
                var userID = dataObj.userID;
                var firstName = dataObj.firstName;
                var lastName = dataObj.lastName;
                var name = firstName + ' ' + lastName;
                var email = dataObj.email;
                var photoUrl = dataObj.photoUrl;
                var phone = dataObj.phone;
                var isKYCEnabled = dataObj.isKYCEnabled;
                var btnText = isKYCEnabled ? 'Disable KYC' : 'Enable KYC';
                var btnClass = isKYCEnabled ? 'btn btn-danger' : 'btn btn-success';
                var dataHtml = `
                    <div class="border rounded m-2 p-2">
                        <div class="d-flex align-items-center">
                            <nav><img src="${photoUrl}" class="def-img align-middle width-40 height-40"></nav>
                            <div class="align-middle p-2">
                                <nav class="fs-14 overflow-hidden ellipsis">${name}</nav>
                                <nav class="fs-13 text-slategrey overflow-hidden ellipsis">${email}<span class="mx-1">&#8226;</span>${phone}</nav>
                            </div>
                        </div>
                        <button onclick="showKYCModal(this)" data-userID="${userID}" data-isKYCEnabled="${isKYCEnabled}" class="${btnClass}" style="margin-left:50px;">${btnText}</button>
                    </div>
                `;
                $('div#resultDiv').addClass('d-none');
                $('div#dataBox').html(dataHtml);
            }

            function showKYCModal(that){
                $stagedButton = $(that);
                var userID = $(that).attr('data-userID');
                var isKYCEnabled = JSON.parse($(that).attr('data-isKYCEnabled'));
                var btnText = isKYCEnabled ? 'Disable' : 'Enable';
                var modal = `
                    <div class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Modal title</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Are you sure you want to ${btnText} KYC for this user?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="button" onclick="statifyKYC($(this), ${userID}, ${isKYCEnabled})" class="btn btn-primary">${btnText}</button>
                                </div>
                            </div>
                        </div>
                    </div>
                `;
                $modal = $(modal);
                $('body').append($modal);
                $modal.modal('show');
            }

            function statifyKYC($that, userID, isKYCEnabled){
                var modal = $that.parents('.modal')[0];
                $that.html('<img src="https://market-20.com//images/loading-gif.gif" width="20" />');
                $(modal).find('button').prop('disabled', true);
                var data = {
                    action: 'statifyKYC',
                    userID: userID,
                    isKYCEnabled: isKYCEnabled
                };
                $.ajax({
                    url: '/apis/actions.php',
                    type: 'POST',
                    data: data,
                    success: function(){
                        var btnText = !isKYCEnabled ? 'Disable KYC' : 'Enable KYC';
                        var btnClass = !isKYCEnabled ? 'btn-danger' : 'btn-success';
                        var rmvClass = isKYCEnabled ? 'btn-danger' : 'btn-success';
                        $(modal).modal('hide');
                        $stagedButton.text(btnText)
                                    .addClass(btnClass)
                                    .removeClass(rmvClass)
                                    .attr('data-isKYCEnabled', !isKYCEnabled);
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