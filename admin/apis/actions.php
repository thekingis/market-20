<?php

    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    if(isset($_POST['action'])) {
        $home = $_SERVER['DOCUMENT_ROOT'];
        include_once $home.'/inc/connect.php';
        include_once $home.'/inc/classes.php';
        include_once $home.'/inc/functions.php';
    
        $data = array();
        $hasError = false;
        $date = date('Y-m-d G:i:s');
        $hostUrl = 'https://market-20.com';

        $action = $_POST['action'];

        switch ($action) {
            case 'change-password':
                $adminId = $_POST['adminId'];
                $oldPassword = md5($_POST['oldPassword']);
                $newPassword = md5($_POST['newPassword']);
                $hasError = (int) $adminId != (int) $adminID;
                $errorText = 'Access Denied';
                if(!$hasError){
                    $adminInfo = new AdminInfo($con, $adminID);
                    $hasError = $oldPassword != $adminInfo->password;
                    $errorText = 'Your Password is incorrect';
                    if(!$hasError)
                        mysqli_query($con, "UPDATE `admin` SET `password` = '".$newPassword."' WHERE id = ".$adminID);
                }
                $dataArray['hasError'] = $hasError;
                $dataArray['errorText'] = $errorText;
                echo json_encode($dataArray); 
                break;
            case 'admin-action':
                $adminIds = $_POST['adminId'];
                $actVal = $_POST['actVal'];
                mysqli_query($con, "UPDATE `admin` SET `deactivated` = '".$actVal."' WHERE FIND_IN_SET(`id`, '".$adminIds."')");
                break;
            case 'delete-admin':
                $adminIds = $_POST['adminId'];
                mysqli_query($con, "DELETE FROM `admin` WHERE FIND_IN_SET(`id`, '".$adminIds."')");
                break;
            case 'edit-role':
                $adminId = $_POST['adminId'];
                $roles = $_POST['roles'];
                mysqli_query($con, "UPDATE `admin` SET `roles` = '".$roles."' WHERE `id` = ".$adminId);
                break;
            case 'logout-admin':
                $array = array();
                $adminIds = isset($_POST['adminIds']) ? $_POST['adminIds'] : $_POST['adminId'];
                $isAll = is_numeric($adminIds) && (int) $adminIds == 0;
                $array['logoutSelf'] = $isAll || in_array($adminId, explode(',', $adminIds));
                $queryStr = "UPDATE `admin` SET `loggedOut` = 'true'";
                $queryStr .= $isAll ? '' : ' WHERE FIND_IN_SET(`id`, "'.$adminIds.'")';
                mysqli_query($con, $queryStr);
                echo json_encode($array);
                break;
            case 'add-admin':
                $array = array('hasError' => false);
                $roles = $_POST['roles'];
                $userName = strtolower($_POST['userName']);
                $lastName = $_POST['lastName'];
                $firstName = $_POST['firstName'];
                $password = md5(12345678);

                $query = mysqli_query($con, "SELECT * FROM `admin` WHERE `username` = '".$userName."'");
                if(mysqli_num_rows($query) > 0){
                    $array['hasError'] = true;
                    $array['errorText'] = 'Username already exists';
                } else {
                    mysqli_query($con, "INSERT INTO `admin` VALUES('0', '".$firstName."', '".$lastName."', '".$userName."', '".$password."', '".$roles."', 'false', 'false')");
                }
                echo json_encode($array);

                break;
            case 'statifyKYC':
                $userID = $_POST['userID'];
                $isKYCEnabled = filter_var($_POST['isKYCEnabled'], FILTER_VALIDATE_BOOL);
                $queryStr = $isKYCEnabled ? 'DELETE FROM `kyc` WHERE `userId` = '.$userID : 'REPLACE INTO `kyc` VALUES('.$userID.')';
                mysqli_query($con, $queryStr);
                break;
            case 'statifyWithdrawal':
                
                require(dirname($home).'/PHPMailer/src/SMTP.php');
                require(dirname($home).'/PHPMailer/src/PHPMailer.php');
                require(dirname($home).'/PHPMailer/src/Exception.php');

                $mail = new PHPMailer(true);

                try {
                    $userID = $_POST['userID'];
                    $withdrawalId = $_POST['withdrawalId'];
                    $withdrawalInfo = new WithdrawalInfo($con, $withdrawalId);
                    $isConfirmed = filter_var($_POST['isConfirmed'], FILTER_VALIDATE_BOOL);
                    $includeCapital = filter_var($_POST['includeCapital'], FILTER_VALIDATE_BOOL);
                    $dataStr = $isConfirmed ? 'verified' : 'declined';
                    $state = $isConfirmed ? 'positive' : 'negative';
                    $text = 'Your Withdrawal Request have been '.ucfirst($dataStr);
                    $text .= !$includeCapital && $isConfirmed ? '\nYour capital have been re-invested' : '';
                    mysqli_query($con, "UPDATE `withdrawal-requests` SET `status` = '".$dataStr."' WHERE `id` = ".$withdrawalId);
                    mysqli_query($con, "INSERT INTO `notifications` VALUES('0', '".$userID."', '".$text."', '1', '".$withdrawalId."', '".$state."', 'show', '".$date."')");
                    $investmentID = $withdrawalInfo->investmentID;
                    $investmentInfo = new InvestmentInfo($con, $investmentID);
                    $paymentId = $investmentInfo->paymentID;
                    $paymentInfo = new PaymentInfo($con, $paymentId);
                    $stockID = $paymentInfo->stockId;
                    $stockInfo = new StockInfo($con, $stockID);
                    $dueTime = time() + ($stockInfo->numOfDays * (60 * 60 * 24));
                    $profit = ($stockInfo->percentage / 100) * $paymentInfo->amount;
                    $withdrawn = $profit;
                    if(!$includeCapital && $isConfirmed){
                        $withdrawn += $paymentInfo->amount;
                        mysqli_query($con, "INSERT INTO `investments` VALUES('0', '".$userID."', '".$stockID."', '".$paymentId."', '".$paymentInfo->amount."', '".$profit."', '".$dueTime."', 'progressing', 'true', 'false', '".$date."')");
                    }

                    $userInfo = new UserInfo($con, $userID);
                    $subject = ucfirst($dataStr)." Withdrawal";
                    $mail->SMTPDebug = SMTP::DEBUG_OFF;  
                    $mail->isSMTP();
                    $mail->isHTML(true);
                    $mail->Host = $mailHost;
                    $mail->SMTPAuth = true;
                    $mail->Username = $mailUsername;
                    $mail->Password = $mailPassword;
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                    $mail->Port = $mailPort;
                    $mail->setFrom($mailEmail, $mailName);
                    $mail->addAddress($userInfo->email);
                    $mail->Subject = $subject;

                    $details = array(
                        'Recipient' => $userInfo->fullName,
                        'Payment Method' => $withdrawalInfo->withdrawalMethod,
                        'Wallet Address' => $withdrawalInfo->walletAddress,
                        'Status' => ucfirst($dataStr),
                        'Date' => date('Y F d, h:i A', $time)
                    );

                    $textMsg = '
                        <div class="main-box">
                            <span class="span1">$</span>
                            <span class="span2">'.number_format($withdrawn, 2, '.', ',').'</span>
                        </div>
                    ';

                    foreach($details as $key => $value){
                        $textMsg .= '
                            <div class="row">
                                <div class="col text-start">'.$key.'</div>
                                <div class="col text-end">'.$value.'</div>
                            </div>
                        ';
                    }
                    
                    $templateUrl = 'https://market-20.com/mail-templates/default.php?title='.urlencode($subject).'&text='.urlencode($textMsg);
                    $msg = file_get_contents($templateUrl, true);
                    $mail->Body = $msg;
                
                    $mail->send();
                } catch (Exception $e) {
                }
                break;
            case 'statifyPayment':
                
                require(dirname($home).'/PHPMailer/src/SMTP.php');
                require(dirname($home).'/PHPMailer/src/PHPMailer.php');
                require(dirname($home).'/PHPMailer/src/Exception.php');

                $mail = new PHPMailer(true);

                try {

                    $userID = $_POST['userID'];
                    $paymentId = $_POST['paymentId'];
                    $isConfirmed = filter_var($_POST['isConfirmed'], FILTER_VALIDATE_BOOL);
                    $dataStr = $isConfirmed ? 'verified' : 'declined';
                    $state = $isConfirmed ? 'positive' : 'negative';
                    $text = 'Your Deposit have been '.ucfirst($dataStr);
                    mysqli_query($con, "UPDATE `payments` SET `status` = '".$dataStr."' WHERE `id` = ".$paymentId);
                    mysqli_query($con, "INSERT INTO `notifications` VALUES('0', '".$userID."', '".$text."', '0', '".$paymentId."', '".$state."', 'show', '".$date."')");
                    if($isConfirmed){
                        $paymentInfo = new PaymentInfo($con, $paymentId);
                        $stockID = $paymentInfo->stockId;
                        $stockInfo = new StockInfo($con, $stockID);
                        $dueTime = $paymentInfo->time + ($stockInfo->numOfDays * (60 * 60 * 24));
                        $profit = ($stockInfo->percentage / 100) * $paymentInfo->amount;
                        mysqli_query($con, "INSERT INTO `investments` VALUES('0', '".$userID."', '".$stockID."', '".$paymentId."', '".$paymentInfo->amount."', '".$profit."', '".$dueTime."', 'progressing', 'false', 'false', '".$date."')");
                    }

                    $userInfo = new UserInfo($con, $userID);
                    $paymentInfo = new PaymentInfo($con, $paymentId);
                    $subject = ucfirst($dataStr)." Deposit";
                    $mail->SMTPDebug = SMTP::DEBUG_OFF;  
                    $mail->isSMTP();
                    $mail->isHTML(true);
                    $mail->Host = $mailHost;
                    $mail->SMTPAuth = true;
                    $mail->Username = $mailUsername;
                    $mail->Password = $mailPassword;
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                    $mail->Port = $mailPort;
                    $mail->setFrom($mailEmail, $mailName);
                    $mail->addAddress($userInfo->email);
                    $mail->Subject = $subject;

                    $details = array(
                        'Depositor' => $userInfo->fullName,
                        'Payment Method' => $paymentInfo->paymentMethod,
                        'Reference' => $paymentInfo->referenceID,
                        'Status' => ucfirst($dataStr),
                        'Date' => date('Y F d, h:i A', $time)
                    );

                    $textMsg = '
                        <div class="main-box">
                            <span class="span1">$</span>
                            <span class="span2">'.number_format($paymentInfo->amount, 2, '.', ',').'</span>
                        </div>
                    ';

                    foreach($details as $key => $value){
                        $textMsg .= '
                            <div class="row">
                                <div class="col text-start">'.$key.'</div>
                                <div class="col text-end">'.$value.'</div>
                            </div>
                        ';
                    }
                    
                    $templateUrl = 'https://market-20.com/mail-templates/default.php?title='.urlencode($subject).'&text='.urlencode($textMsg);
                    $msg = file_get_contents($templateUrl, true);
                    $mail->Body = $msg;
                
                    $mail->send();
                } catch (Exception $e) {
                }
                break;
        }
    }
?>