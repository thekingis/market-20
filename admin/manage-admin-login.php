<?php

    $home = $_SERVER['DOCUMENT_ROOT'];
    include_once $home.'/inc/connect.php';
    include_once $home.'/inc/classes.php';
    include_once $home.'/inc/functions.php';
    $title = 'Manage Login - Admin';
    $activePage = 'Manage Login';

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
                <nav class="text-black fs-2 mb-5">Manage Admin Login</nav>
                <form id="logoutAdminForm" class="px-sm-5 text-start" action="/apis/actions.php">
                    <fieldset>
                        <input type="hidden" name="action" value="logout-admin">
                        <input type="hidden" name="adminIds" id="adminIds">
                        <div class="mb-4 px-lg-5">
                            <?php
                                $adminList = array('0' => 'Select All');
                                $adminQuery = mysqli_query($con, "SELECT * FROM `admin`");
                                while($adminSql = mysqli_fetch_array($adminQuery)){
                                    $adminId = $adminSql['id'];
                                    $adminList[$adminId] = $adminSql['firstName'].' '.$adminSql['lastName'];
                                }
                                $arrayKeys = array_keys($adminList);
                                $lastIndex = array_key_last($arrayKeys);
                                foreach($arrayKeys as $index => $key){
                                    $admin = $adminList[$key];
                                    $isDivisibleByTwo = ($index % 2) == 0;
                                    $isLastIndex = $index == $lastIndex;
                                    $el = $isDivisibleByTwo ? '<div class="row">' : '';
                                    $el .= '<div class="col-12 col-md-6"><div class="form-check">';
                                    $el .= '<input class="form-check-input cursor-pointer" type="checkbox" value="'.$admin.'" admin-id="'.$key.'" id="checkBox-'.$key.'" data-for="admins">';
                                    $el .= '<label class="form-check-label cursor-pointer" for="checkBox-'.$key.'">'.$admin.'</label>';
                                    $el .= '</div></div>';
                                    $el .= !$isDivisibleByTwo || $isLastIndex ? '</div>' : '';
                                    echo $el;
                                }
                            ?>
                        </div>
                        <div class="text-center">
                            <input type="submit" name="submit" id="submit" class="btn btn-primary px-4 py-2" value="FORCE LOGOUT">
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
        <div class="modal fade" id="errorModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body text-danger"></div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
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
            
            var $superInput = $('input:checkbox[data-for=admins][admin-id=0]');
            var $input = $('input:checkbox[data-for=admins]:not([admin-id=0])');
            var toastLive = document.getElementById('liveToast');
            var toast = new bootstrap.Toast(toastLive);

            $('form#logoutAdminForm').submit(function(evt){
                $this = $(this);
                evt.preventDefault();
                var checkedNum = $('input:checkbox[data-for=admins]:checked').length;
                if(checkedNum == 0){
                    $('div#errorModal').modal('show');
                    $('div#errorModal').find('div.modal-body').text('Please select at least one admin');
                    return;
                }
                var selectedAdmins = new Array();
                $('input:checkbox[data-for=admins]:checked:not(:disabled)').each(function(){
                    var adminId = parseInt($(this).attr('admin-id'));
                    selectedAdmins.push(adminId);
                });
                var isAllAdmin = selectedAdmins.includes(0);
                var adminRoles = isAllAdmin ? '0' : selectedAdmins.join(',');
                $this.find('input#adminIds').val(adminRoles);
                $this.find('input#submit').val('FORCING LOGOUT...');
                var apiUrl = $this.attr('action');
                var formData = $this.serialize();
                $this.find('fieldset').prop('disabled', true);
                $(toastLive).find('div').removeClass('bg-danger bg-success');
                $.ajax({
                    url: apiUrl,
                    type: 'POST',
                    data: formData,
                    dataType: 'json',
                    error: function(){
                        $this.find('input#submit').val('FORCE LOGOUT');
                        $this.find('fieldset').attr('disabled', false);
                        $('div#errorModal').modal('show');
                        $('div#errorModal').find('div.modal-body').text('An error occured. Please try again');
                    },
                    success: function(dataObj){
                        $(toastLive).find('div').addClass('bg-success');
                        $(toastLive).find('div.toast-body').text('Forced Logout Successful');
                        toast.show();
                        var logoutSelf = dataObj.logoutSelf;
                        if(logoutSelf){
                            window.location.href = '/logout/';
                            return;
                        }
                        $this.find('input#submit').val('FORCE LOGOUT');
                        var disabled = $('input:checkbox[data-for=admins]:not(:checked)').length == 0;
                        $this.find('fieldset').attr('disabled', disabled);
                        $('input:checkbox[data-for=admins]:checked').prop('disabled', true);
                    }
                });
            });

            $superInput.click(function(){
                $input.filter(':not(:disabled)').prop('checked', true);
                $(this).prop('checked', true);
            });

            $input.click(function(evt){
                var checkedNum = $input.filter(':not(:checked)').length;
                if(checkedNum == 0)
                    $superInput.prop('checked', true);
                else
                    $superInput.prop('checked', false);
            });

        </script>
    </body>
    </body>

</html>