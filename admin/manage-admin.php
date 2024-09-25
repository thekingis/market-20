<?php

    $home = $_SERVER['DOCUMENT_ROOT'];
    include_once $home.'/inc/connect.php';
    include_once $home.'/inc/classes.php';
    include_once $home.'/inc/functions.php';
    $title = 'Manage Admin - Admin';
    $activePage = 'Manage Admin';

    if(!loggedin()){
        header('location: /login/');
        exit();
    }

?>
<!DOCTYPE html>
<html lang="en">

    <?php include_once $home.'/inc/head.php'; ?>

    <body>

        <?php include_once $home.'/inc/header.php'; ?>        

        <div class="bg-white main-container">
            <?php include_once $home.'/inc/left-nav-bar.php'; ?>
            <div class="container-body p-3 text-center">
                <div class="row mb-5 align-items-center">
                    <div class="col-12 col-md-6 text-black fs-2 text-start ps-3">Manage Admin</div>
                    <div class="col-12 col-md-6 text-black fs-2 text-start text-md-end">
                            <div class="dropdown me-3">
                                <span onclick="floatMenu(this)" class="fs-17 cursor-pointer text-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">With Selected</span>
                                <ul class="dropdown-menu" id="selectedAction">
                                    <li class=" cursor-pointer"><a class="dropdown-item disabled" onclick="showConfirmation($(this), event)" data-action="activate">Activate</a></li>
                                    <li class=" cursor-pointer"><a class="dropdown-item disabled" onclick="showConfirmation($(this), event)" data-action="deactivate">Deactivate</a></li>
                                    <li class=" cursor-pointer"><a class="dropdown-item disabled" onclick="showConfirmation($(this), event)" data-action="logout">Force Logout</a></li>
                                    <li class=" cursor-pointer"><a class="dropdown-item disabled" onclick="showConfirmation($(this), event)" data-action="delete">Delete</a></li>
                                </ul>
                            </div>
                    </div>
                </div>
                <div class="mb-4 px-lg-5 text-start">
                    <?php
                        $adminList = array();
                        $adminQuery = mysqli_query($con, "SELECT * FROM `admin`");
                        while($adminSql = mysqli_fetch_array($adminQuery)){
                            $adminId = $adminSql['id'];
                            $deactivated = filter_var($adminSql['deactivated'], FILTER_VALIDATE_BOOLEAN);
                            $adminList[$adminId] = array($adminSql['firstName'].' '.$adminSql['lastName'], $deactivated);
                        }
                        $arrayKeys = array_keys($adminList);
                        $lastIndex = array_key_last($arrayKeys);
                        foreach($arrayKeys as $index => $key){
                            $adminInfo = $adminList[$key];
                            $admin = $adminInfo[0];
                            $deactivated = $adminInfo[1];
                            $isDivisibleByTwo = ($index % 2) == 0;
                            $isLastIndex = $index == $lastIndex;
                            $actText = $deactivated ? 'activate' : 'deactivate';
                            $el = $isDivisibleByTwo ? '<div class="row" style="z-index: 3;">' : '';
                            $el .= '<div class="col-12 col-md-6"><label data-label="'.$key.'" class="position-relative card p-3 m-3 cursor-pointer"><label class="form-check-label cursor-pointer">';
                            $el .= '<span class="checkbox"></span>';
                            $el .= '<span class="ms-2 me-3">'.$admin.'</span></label>';
                            $el .= '<div class="dropdown position-absolute end-0 top-50 translate-middle-y me-3">';
                            $el .= '<span excluded onclick="floatMenu(this)" class="fs-5 fw-bold text-secondary" data-bs-toggle="dropdown" aria-expanded="false">&#9781;</span>';
                            $el .= '<ul class="dropdown-menu">';
                            $el .= '<li><a class="dropdown-item" excluded onclick="showConfirmation($(this), event, '.$key.')" data-action="edit">Edit Role</a></li>';
                            $el .= '<li><a class="dropdown-item" excluded onclick="showConfirmation($(this), event, '.$key.')" data-action="logout">Force Logout</a></li>';
                            $el .= '<li><a class="dropdown-item" excluded onclick="showConfirmation($(this), event, '.$key.')" data-action="'.$actText.'" data-for="'.$key.'">'.ucfirst($actText).'</a></li>';
                            $el .= '<li><a class="dropdown-item" excluded onclick="showConfirmation($(this), event, '.$key.')" data-action="delete">Delete</a></li></ul></div>';
                            $el .= '<div excluded id="floater-'.$key.'" style="z-index: 7;" onclick="event.preventDefault()" class="position-absolute d-none bg-secondary opacity-50 top-0 start-0 end-0 bottom-0 cursor-not-allowed"></div>';
                            $el .= '</label></div>';
                            $el .= !$isDivisibleByTwo || $isLastIndex ? '</div>' : '';
                            echo $el;
                        }
                    ?>
                </div>
            </div>
        </div>
        <div class="modal fade" id="alertModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="alertModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body"></div>
                    <div class="modal-footer">
                        <nav class="fs-13 text-danger text-center fw-bold d-block"></nav>
                        <button type="button" id="cancelBtn" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="button" id="actionBtn"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="editModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel"></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body scrollbar"></div>
                    <div class="modal-footer">
                        <nav class="fs-13 text-danger text-center fw-bold d-block"></nav>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="button" id="actionBtn" class="btn btn-success">Save</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="position-fixed bottom-0 start-0 p-3" style="z-index: 999">
            <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header text-light">
                    <strong class="me-auto text-light">Market-20</strong>
                    <small class="text-light">Just Now</small>
                    <button type="button" class="btn-close" data-bs-dismiss="toast"><i class="bi bi-x-lg text-light"></i></button>
                </div>
                <div class="toast-body text-light"></div>
            </div>
        </div>
        <script>

            var selectedUsers = new Array();
            var toastLive = document.getElementById('liveToast');
            var toast = new bootstrap.Toast(toastLive);

            $('label[data-label]').click(function(evt) {
                var adminId = $(this).attr('data-label');
                var isExcluded = $(evt.target).is('[excluded]');
                if(!isExcluded){
                    var $checkbox = $(this).find('span.checkbox');
                    var isChecked = $checkbox.is('[checked]');
                    if(isChecked){
                        $checkbox.removeAttr('checked');
                        selectedUsers.remove(adminId);
                    } else {
                        $checkbox.attr('checked', true);
                        selectedUsers.push(adminId);
                    }
                    var checkedNum = $('label[data-label]').find('span.checkbox[checked]').length;
                    if(checkedNum === 0)
                        $('ul#selectedAction li a').addClass('disabled');
                    else
                        $('ul#selectedAction li a').removeClass('disabled');
                }
            });

            function showConfirmation($span, evt, adminId){
                evt.preventDefault();
                var dataAction = $span.attr('data-action');
                if(dataAction === 'edit'){
                    editRole(adminId);
                    return;
                }
                $('div#alertModal').modal('show');
                var btnText = dataAction.firstToUpperCase();
                var hasSelection = typeof adminId === 'undefined';
                var suffix = hasSelection && selectedUsers.length > 1 ? ' these Admins?' : ' this Admin?';
                var text = 'Are you sure you want to ' + btnText + suffix;
                var btnClass, alertClass, actionText;
                var dataObj = new Object();
                switch(dataAction){
                    case 'logout':
                        btnClass = 'btn btn-danger';
                        alertClass = 'bg-danger';
                        actionText = 'logout-admin';
                        break;
                    case 'delete':
                        btnClass = 'btn btn-danger';
                        alertClass = 'bg-danger';
                        actionText = 'delete-admin';
                        break;
                    case 'activate':
                        btnClass = 'btn btn-success';
                        alertClass = 'bg-success';
                        actionText = 'admin-action';
                        dataObj.actVal = 'false';
                        break;
                    case 'deactivate':
                        btnClass = 'btn btn-dark';
                        alertClass = 'bg-success';
                        actionText = 'admin-action';
                        dataObj.actVal = 'true';
                        break;
                }
                selectedUsers = hasSelection ? selectedUsers : [adminId];
                var admins = selectedUsers.join(',');
                dataObj.adminId = admins;
                dataObj.action = actionText;
                $alertModal = $('div#alertModal');
                $button = $alertModal.find('button#actionBtn');
                $button.off('click');
                $button.attr('class', btnClass)
                    .text($span.text())
                    .click(function(){
                        executeAction($(this), $span, dataObj, actionText, alertClass);
                    });
                $alertModal.find('div.modal-body').text(text);
            }

            function editRole(adminId){
                $('div#editModal').modal('show');
                $('div#editModal').find('div.modal-footer').hide();
                $('div#editModal').find('div.modal-body').html('<div class="text-center"><img src="https://www.grafil-computers.com/images/loading-gif.gif" class="m-5" style="width: 30px" /></div>');
                data = {adminId: adminId};
                $.ajax({
                    url: '/apis/edit-role.php',
                    type: 'post',
                    data: data,
                    success: function(htmlData){
                        $('div#editModal').find('div.modal-footer').show();
                        $('div#editModal').find('div.modal-body').html(htmlData);
                    }
                });
            }

            function executeAction($button, $span, dataObj, actionText, alertClass){
                var textObj = {'Deactivate': 'Activate', 'Activate': 'Deactivate'};
                var dataAction = $span.attr('data-action');
                var btnText = $button.text();
                var newBtnText = btnText.sliceLast(1);
                $('a.dropdown-item').addClass('disabled');
                newBtnText += 'ing...';
                if(dataAction === 'logout')
                    newBtnText = 'Forcing Logout...';
                $('div#alertModal').find('button').prop('disabled', true);
                $button.text(newBtnText);
                $.ajax({
                    url: '/apis/actions.php',
                    type: 'POST',
                    data: dataObj,
                    error: function(){
                        $('div#alertModal').find('button').prop('disabled', false);
                        $button.text(btnText);
                        $('div#alertModal').modal('hide');
                        $('a.dropdown-item').removeClass('disabled');
                        $(toastLive).find('div').addClass('bg-danger');
                        $(toastLive).find('div.toast-body').text('An Error Occured! Please try again');
                        toast.show();
                        var checkedNum = $('label[data-label]').find('span.checkbox[checked]').length;
                        if(checkedNum === 0)
                            $('ul#selectedAction li a').addClass('disabled');
                    },
                    success: function(dataString){
                        $('div#alertModal').modal('hide');
                        $('div#alertModal').find('button').prop('disabled', false);
                        $('a.dropdown-item').removeClass('disabled');
                        $('ul#selectedAction li a').addClass('disabled');
                        $('label[data-label]').find('span.checkbox').removeAttr('checked');
                        if(dataAction === 'delete'){
                            selectedUsers.forEach(function(adminId) {
                                $('div#floater-'+adminId).removeClass('d-none');
                            });
                        } else if(dataAction != 'logout'){
                            var newSpanText = textObj[btnText];
                            selectedUsers.forEach(function(adminId) {
                                $('label[data-label='+adminId+']').find('a[data-for='+adminId+']').attr('data-action', newSpanText.toLowerCase()).text(newSpanText);
                            });
                        } else {
                            var dataObject =JSON.parse(dataString);
                            var logoutSelf = dataObject.logoutSelf;
                            if(logoutSelf){
                                window.location.href = '/logout/';
                                return;
                            }
                        }
                        selectedUsers = [];
                        var alertText;
                        switch(dataAction){
                            case 'logout':
                                alertText = 'Admin User Successfully Logged out';
                                break;
                            case 'delete':
                                alertText = 'Admin User Successfully Deleted';
                                break;
                            case 'activate':
                                alertText = 'Admin User Successfully Activated';
                                break;
                            case 'deactivate':
                                alertText = 'Admin User Successfully Deactivated';
                                break;
                        }
                        $(toastLive).find('div').addClass(alertClass);
                        $(toastLive).find('div.toast-body').text(alertText);
                        toast.show();
                    }
                });
            }

            function floatMenu(span){
                $parentDiv = $(span).parent();
                $parentDiv.css('z-index', 8);
                $('span[data-bs-toggle=dropdown]').not(span).each(function() {
                    $exParentDiv = $(this).parent();
                    $exParentDiv.css('z-index', 4);
                });
            }

        </script>
    </body>

</html>