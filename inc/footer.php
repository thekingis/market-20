<script src="/vendor/jquery/jquery.min.js"></script>
<script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<?php
    if(!loggedin()){
        ?>
        <div class="modal fade" id="loginModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Login</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="loginForm">
                            <div class="mb-3">
                                <label for="emailTextBox" class="form-label">Email address</label>
                                <input type="email" name="email" class="form-control" id="emailTextBox" required />
                            </div>
                            <div class="mb-3">
                                <label for="passwordTextBox" class="form-label">Email address</label>
                                <input type="password" name="password" class="form-control" id="passwordTextBox" required />
                            </div>
                            <div class="mb-3 bg-danger text-white mw-100 p-2 invisible" id="errorDivX"></div>
                            <input type="submit" class="btn btn-primary" value="LOGIN" />
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <script>

            $('form#loginForm').on('submit', function(evt){
                evt.preventDefault();
                var $this = $(this);
                var data = $this.serialize();
                $('div#errorDivX').addClass('invisible').html('');
                $(this).find(':input').prop('disabled', true);
                $.ajax({
                    url: '/apis/login.php',
                    type: 'POST',
                    data: data,
                    dataType: 'json',
                    erroe: function(){
                        $('div#errorDivX').removeClass('invisible').html('Connection Error');
                    },
                    success: function(dataObj){
                        if(dataObj.hasError){
                            $this.find(':input').prop('disabled', false);
                            $('div#errorDivX').removeClass('invisible').html(dataObj.errorText);
                            return;
                        }
                        window.location.href = '/dashboard/';
                    }
                });
            });

        </script>
        <?php
    }
?>