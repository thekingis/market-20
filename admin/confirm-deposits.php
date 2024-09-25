<?php
    $home = $_SERVER['DOCUMENT_ROOT'];
	include $home.'/inc/connect.php';
	include $home.'/inc/classes.php';
	include $home.'/inc/functions.php';
	
    if(!loggedin()){
		header('location: /');
		exit();
	}
    $title = 'Confirm Deposit - Admin';
?>
<!DOCTYPE html>
<html lang="en">    
        <?php include $home.'/inc/head.php'; ?>
    <body>
        <?php include $home.'/inc/header.php'; ?>
        <div class="bg-white main-container">
            <?php include_once $home.'/inc/left-nav-bar.php'; ?>
            <div class="container-body">
                <div class="position-relative align-self-stretch flex-grow-1 border-end">
                    <div class="position-absolute start-0 end-0 p-1 p-lg-2">
                        <h3 class="text-center">Confirm Deposits</h3>
                        <?php
                            $query = mysqli_query($con, "SELECT * FROM `payments` wHERE `status` = 'pending'");
                            if(mysqli_num_rows($query) == 0){
                                echo '<nav class="mt-4 d-flex justify-content-center"><img src="https://market-20.com/images/no-data.png" class="w-50" /></nav>';
                            } else {
                                while($sql = mysqli_fetch_array($query)){
                                    $id = $sql['id'];
                                    $userID = $sql['userID'];
                                    $stockID = $sql['stockID'];
                                    $paymentMethod = $sql['paymentMethod'];
                                    $referenceID = $sql['referenceID'];
                                    $amount = $sql['amount'];
                                    $userInfo = new UserInfo($con, $userID);
                                    $stockInfo = new StockInfo($con, $stockID);

                                    echo '
                                        <div class="border rounded m-2" id="dataBox-'.$id.'">
                                            <div class="d-flex flex-lg-row flex-column m-2 align-items-lg-center">
                                                <nav class="form-label fw-bold">Depositior\'s Name:</nav>
                                                <nav class="border bg-light rounded p-1 ms-2">'.$userInfo->fullName.'</nav>
                                            </div>
                                            <div class="d-flex flex-lg-row flex-column m-2 align-items-lg-center">
                                                <nav class="form-label fw-bold">Payment Method:</nav>
                                                <nav class="border bg-light rounded p-1 ms-2">'.$paymentMethod.'</nav>
                                            </div>
                                            <div class="d-flex flex-lg-row flex-column m-2 align-items-lg-center">
                                                <nav class="form-label fw-bold">Reference ID:</nav>
                                                <nav class="border bg-light rounded p-1 ms-2">'.$referenceID.'</nav>
                                            </div>
                                            <div class="d-flex flex-lg-row flex-column m-2 align-items-lg-center">
                                                <nav class="form-label fw-bold">Deposited Amount:</nav>
                                                <nav class="border bg-light rounded p-1 ms-2">$'.number_format($amount, 2, '.', ',').'</nav>
                                            </div>
                                            <button onclick="showModalBox('.$id.', '.$userID.', true)" class="btn btn-success m-3">Confirm Payment</button>
                                            <button onclick="showModalBox('.$id.', '.$userID.', false)" class="btn btn-danger m-3">Decline Payment</button>
                                        </div>
                                    ';
                                }
                            }
                        ?>
                    </div>
                </div>
                <div class="position-relative invisible align-self-stretch flex-grow-1">
                    <div class="position-absolute start-0 end-0 p-1 p-lg-2">
                    </div>
                </div>
            </div>
        </div>
        <script>

            function showModalBox(dataID, userID, isConfirmed){
                var btnText = isConfirmed ? 'Confirm' : 'Decline';
                var modal = `
                    <div class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Modal title</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Are you sure you want to ${btnText} this Payment?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="button" onclick="statifyPayment($(this), ${dataID}, ${userID}, ${isConfirmed})" class="btn btn-primary">${btnText}</button>
                                </div>
                            </div>
                        </div>
                    </div>
                `;
                $modal = $(modal);
                $('body').append($modal);
                $modal.modal('show');
            }

            function statifyPayment($that, dataID, userID, isConfirmed){
                var modal = $that.parents('.modal')[0];
                $that.html('<img src="https://market-20.com//images/loading-gif.gif" width="20" />');
                $(modal).find('button').prop('disabled', true);
                var data = {
                    action: 'statifyPayment',
                    paymentId: dataID,
                    userID: userID,
                    isConfirmed: isConfirmed
                };
                $.ajax({
                    url: '/apis/actions.php',
                    type: 'POST',
                    data: data,
                    success: function(data){
                        console.log(data);
                        var alertText = isConfirmed ? 'Payment Confimed' : 'Payment Declined';
                        var alertClass = isConfirmed ? 'alert alert-success m-2' : 'alert alert-danger m-2';
                        $(modal).modal('hide');
                        $('div#dataBox-'+dataID).find('button').remove();
                        var $alertDiv = $('<div>');
                        $alertDiv.addClass(alertClass).text(alertText);
                        $('div#dataBox-'+dataID).append($alertDiv);
                    }
                });
            }


        </script>
    </body>
</html>