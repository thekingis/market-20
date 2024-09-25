<?php

    $home = $_SERVER['DOCUMENT_ROOT'];
    include_once $home.'/inc/connect.php';
    include_once $home.'/inc/classes.php';
    include_once $home.'/inc/functions.php';
    $title = 'Add Admin - Admin';
    $activePage = 'Add Admin';

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
                <nav class="text-black fs-2 mb-5">Add Admin</nav>
                <form id="addAdminForm" class="px-sm-5 text-start" action="/apis/actions.php">
                    <fieldset>
                        <input type="hidden" name="action" value="add-admin">
                        <input type="hidden" name="roles" id="roles">
                        <div class="row mb-4 px-lg-5">
                            <div class="col-12 col-lg-6">
                                <div class="mb-3">
                                    <label for="firstName" class="form-label fw-bold">First Name</label>
                                    <input type="text" name="firstName" class="form-control" id="firstName" required>
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="mb-3">
                                    <label for="lastName" class="form-label fw-bold">Last Name</label>
                                    <input type="text" name="lastName" class="form-control" id="lastName" required>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-4 px-lg-5">
                            <div class="col-12 col-lg-6">
                                <div class="mb-3">
                                    <label for="userName" class="form-label fw-bold">Username</label>
                                    <input type="text" name="userName" class="form-control" id="userName" required>
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="mb-3">
                                    <label for="password" class="form-label fw-bold">Password</label>
                                    <input type="password" name="password" value="12345678" class="form-control" id="password" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="mb-4 px-lg-5">
                            <nav class="form-label fw-bold">Admin Roles</nav>
                            <?php
                                $roleList = array('0' => 'Super Admin');
                                $roleQuery = mysqli_query($con, "SELECT * FROM `admin-roles`");
                                while($roleSql = mysqli_fetch_array($roleQuery)){
                                    $roleid = $roleSql['id'];
                                    $roleList[$roleid] = $roleSql['role'];
                                }

                                $arrayKeys = array_keys($roleList);
                                $lastIndex = array_key_last($arrayKeys);
                                foreach($arrayKeys as $index => $key){
                                    $role = $roleList[$key];
                                    $isDivisibleByTwo = ($index % 2) == 0;
                                    $isLastIndex = $index == $lastIndex;
                                    $el = $isDivisibleByTwo ? '<div class="row">' : '';
                                    $el .= '<div class="col-12 col-md-6"><div class="form-check">';
                                    $el .= '<input class="form-check-input cursor-pointer" type="checkbox" value="'.$role.'" role-id="'.$key.'" id="checkBox-'.$key.'" data-for="roles">';
                                    $el .= '<label class="form-check-label cursor-pointer" for="checkBox-'.$key.'">'.$role.'</label>';
                                    $el .= '</div></div>';
                                    $el .= !$isDivisibleByTwo || $isLastIndex ? '</div>' : '';
                                    echo $el;
                                }
                            ?>
                        </div>
                        <div class="text-center">
                            <input type="submit" name="submit" id="submit" class="btn btn-primary px-4 py-2" value="CREATE">
                        </div>
                    </fieldset>
                </form>
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
            
            var regexUserName = /^[a-zA-Z]+$/;
            var regexName = /^[a-zA-Z]+[a-zA-Z- ]+$/;
            var $superInput = $('input:checkbox[data-for=roles][role-id=0]');
            var $input = $('input:checkbox[data-for=roles]:not([role-id=0])');
            var toastLive = document.getElementById('liveToast');
            var toast = new bootstrap.Toast(toastLive);

            $('form#addAdminForm').submit(function(evt){
                $this = $(this);
                evt.preventDefault();
                var firstName = $this.find('input#firstName').val();
                var lastName = $this.find('input#lastName').val();
                var userName = $this.find('input#userName').val();
                var checkedNum = $('input:checkbox[data-for=roles]:checked').length;
                if(!regexName.test(firstName)){
                    $(toastLive).find('div').addClass('bg-danger');
                    $(toastLive).find('div.toast-body').text('First Name contains invalid characters');
                    toast.show();
                    return;
                }
                if(!regexName.test(lastName)){
                    $(toastLive).find('div').addClass('bg-danger');
                    $(toastLive).find('div.toast-body').text('Last Name contains invalid characters');
                    toast.show();
                    return;
                }
                if(!regexUserName.test(userName)){
                    $(toastLive).find('div').addClass('bg-danger');
                    $(toastLive).find('div.toast-body').text('Username contains invalid characters');
                    toast.show();
                    return;
                }
                if(checkedNum == 0){
                    $(toastLive).find('div').addClass('bg-danger');
                    $(toastLive).find('div.toast-body').text('Please assign a role to this admin');
                    toast.show();
                    return;
                }
                var selectedRoles = new Array();
                $('input:checkbox[data-for=roles]:checked').each(function(){
                    var roleId = parseInt($(this).attr('role-id'));
                    selectedRoles.push(roleId);
                });
                var isSuperAdmin = selectedRoles.includes(0);
                var adminRoles = isSuperAdmin ? '0' : selectedRoles.join(',');
                $this.find('input#roles').val(adminRoles);
                $this.find('input#submit').val('CREATING...');
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
                        $this.find('input#submit').val('CREATE');
                        $this.find('fieldset').attr('disabled', false);
                        $(toastLive).find('div').addClass('bg-danger');
                        $(toastLive).find('div.toast-body').text('Network Error');
                        toast.show();
                    },
                    success: function(dataObj){
                        var hasError = dataObj.hasError;
                        $this.find('input#submit').val('CREATE');
                        $this.find('fieldset').attr('disabled', false);
                        if(hasError){
                            $(toastLive).find('div').addClass('bg-danger');
                            $(toastLive).find('div.toast-body').text(dataObj.errorText);
                            toast.show();
                            return;
                        }
                        $this.find('input:text').val('');
                        $('input:checkbox[data-for=roles]').prop('checked', false);
                        $(toastLive).find('div').addClass('bg-success');
                        $(toastLive).find('div.toast-body').text('Admin Successfully Added');
                        toast.show();
                    }
                });
            });

            $superInput.click(function(){
                $input.prop('checked', true);
                $(this).prop('checked', true);
            });

            $input.click(function(evt){
                var checkedNum = $input.filter(':not(:checked)').length;
                if(checkedNum == 0)
                    $superInput.prop('checked', true);
                else
                    $superInput.prop('checked', false);
            });

            $('document').click(function(evt){
                //console.log(evt.target.nodeName);
            });

        </script>
    </body>

</html>