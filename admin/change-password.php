<?php

    $home = $_SERVER['DOCUMENT_ROOT'];
    include_once $home.'/inc/connect.php';
    include_once $home.'/inc/classes.php';
    include_once $home.'/inc/functions.php';
    $title = 'Change Password - Admin';
    $activePage = 'Change Password';

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
            <div class="container-body p-3 text-center mx-auto" style="width: 28rem; max-width:100%;">
                <nav class="text-black fs-2 mb-5">Change Password</nav>
                <form id="changePassword" action="/apis/actions.php">
                    <fieldset class="px-lg-5">
                        <input type="hidden" name="action" value="change-password">
                        <input type="hidden" name="adminId" value="<?php echo $adminID; ?>">
                        <label for="oldPassword" class="form-label fw-bold">Old Password</label>
                        <input type="password" name="oldPassword" class="form-control text-center mb-5" id="oldPassword" required>
                        <label for="newPassword" class="form-label fw-bold">New Password</label>
                        <input type="password" name="newPassword" class="form-control text-center mb-5" id="newPassword" required>
                        <label for="confirmPassword" class="form-label fw-bold">Confirm Password</label>
                        <input type="password" class="form-control text-center mb-5" id="confirmPassword" required>
                        <div class="text-center">
                            <input type="submit" id="submit" class="btn btn-primary px-4 py-2" value="SAVE">
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
            
            var toastLive = document.getElementById('liveToast');
            var toast = new bootstrap.Toast(toastLive);

            $('form#changePassword').submit(function(evt){
                $this = $(this);
                evt.preventDefault();
                var oldPassword = $this.find('input#oldPassword').val();
                var newPassword = $this.find('input#newPassword').val();
                var confirmPassword = $this.find('input#confirmPassword').val();

                if(newPassword.length < 8 || newPassword.length > 15){
                    $this.find('input#password').addClass('input-error');
                    $('div#errorModal').modal('show');
                    $('div#errorModal').find('div.modal-body').text('Your Password must be between 8 to 15 characters');
                    return;
                }
                if(!(confirmPassword === newPassword)){
                    $this.find('input#confirmPassword').addClass('input-error');
                    $('div#errorModal').modal('show');
                    $('div#errorModal').find('div.modal-body').text('Your Passwords do not match');
                    return;
                }
                $this.find('input#submit').val('UPDATING...');
                $this.find('fieldset').attr('disabled', true);
                var apiUrl = $this.attr('action');
                var formData = new Object();
                $this.find('input[name]').each(function() {
                    var value = this.value
                    var name = $(this).attr('name');
                    formData[name] = value;
                });
                $.ajax({
                    url: apiUrl,
                    type: 'POST',
                    data: formData,
                    dataType: 'json',
                    error: function(){
                        $this.find('fieldset').attr('disabled', false);
                        $this.find('input#submit').val('UPDATE');
                        $('div#errorModal').modal('show');
                        $('div#errorModal').find('div.modal-body').text('An error occured. Please try again');
                    },
                    success: function(dataObj){
                        var hasError = dataObj['hasError'];
                        $this.find('input#submit').val('UPDATE');
                        $this.find('fieldset').attr('disabled', false);
                        if(hasError){
                            $('div#errorModal').modal('show');
                            $('div#errorModal').find('div.modal-body').text(dataObj.errorText);
                            return;
                        }
                        $this.find('input[type=password]').val('');
                        $(toastLive).find('div').addClass('bg-success');
                        $(toastLive).find('div.toast-body').text('Password Updated');
                        toast.show();
                    }
                });
            });

        </script>
    </body>

</html>