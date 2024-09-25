<?php

    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    $home = $_SERVER['DOCUMENT_ROOT'];
    include_once $home.'/inc/connect.php';
    include_once $home.'/inc/classes.php';
    include_once $home.'/inc/functions.php';

    $data = array();
    $hasError = false;
    $date = date('Y-m-d G:i:s');
    $hostUrl = 'https://market-20.com';

    if(isset($_POST['action'])) {

        $action = $_POST['action'];

        switch ($action) {
            case 'hideNotifications':
                $notificationIds = $_POST['notificationIds'];
                mysqli_query($con, "UPDATE `notifications` SET `popState` = 'hide' WHERE FIND_IN_SET(`id`, '".$notificationIds."') AND `userID` = '".$userId."'");
                break;
            case 'updateProfile':
                $password = md5($_POST['password']);
                $query = mysqli_query($con, "SELECT * FROM `accounts` WHERE `password` = '".$password."' AND `id` = ".$userId);
                $hasError = mysqli_num_rows($query) == 0;
                if(!$hasError){
                    $country = mysqli_real_escape_string($con, ucfirst(strtolower($_POST['country'])));
                    $phone = mysqli_real_escape_string($con, ucfirst(strtolower($_POST['phone'])));
                    $occupation = mysqli_real_escape_string($con, ucfirst(strtolower($_POST['occupation'])));
                    $year = $_POST['year'];
                    $month = $_POST['month'];
                    $day = $_POST['day'];
                    $dateOfBith = $year . '-' . sprintf( "%02d", $month) . '-' . sprintf( "%02d", $day);
                    mysqli_query($con, "UPDATE `accounts` SET `country` = '".$country."', `phone` = '".$phone."', `occupation` = '".$occupation."', `dateOfBirth` = '".$dateOfBith."' WHERE `id` = ".$userId);
                } else 
                    $data['errorText'] = 'Your Password is incorrect';
                $data['hasError'] = $hasError;
                echo json_encode($data);
                break;
            case 'changePassword':
                $oldPassword = md5($_POST['oldPassword']);
                $newPassword = md5($_POST['newPassword']);
                $query = mysqli_query($con, "SELECT * FROM `accounts` WHERE `password` = '".$oldPassword."' AND `id` = ".$userId);
                $hasError = mysqli_num_rows($query) == 0;
                if(!$hasError){
                    mysqli_query($con, "UPDATE `accounts` SET `password` = '".$newPassword."' WHERE `id` = ".$userId);
                } else 
                    $data['errorText'] = 'Your Password is incorrect';
                $data['hasError'] = $hasError;
                echo json_encode($data);
                break;
            case 'verifyOTP':
                $userInfo = new UserInfo($con, $userId);
                if($userInfo->verified){
                    $hasError = true;
                    $data['errorText'] = 'The email linked to this account have already been verified';
                } else {
                    $otpQuery = mysqli_query($con, "SELECT * FROM `otpcodes` WHERE `userId` = ".$userId);
                    if(mysqli_num_rows($otpQuery) == 0){
                        $hasError = true;
                        $data['errorText'] = 'There is no OTP for this account';
                    } else {
                        $otpSql = mysqli_fetch_array($otpQuery);
                        $code = $otpSql['code'];
                        $otpCode = $_POST['otpCode'];
                        if($otpCode != $code){
                            $hasError = true;
                            $data['errorText'] = 'Incorrect OTP';
                        } else {
                            $time = time();
                            $otpTime = (int) $otpSql['time'];
                            if($time > $otpTime){
                                $hasError = true;
                                $data['errorText'] = 'OTP code has exipred';
                            } else {
                                mysqli_query($con, "UPDATE `accounts` SET `status` = 'verified' WHERE `id` = ".$userId);
                            }
                        }
                    }
                }
                $data['hasError'] = $hasError;
                echo json_encode($data);
                break;
            case 'getOTP':
                $otpCode = str_pad(rand(0, pow(10, 6)-1), 6, '0', STR_PAD_LEFT);
                
                require($home.'/PHPMailer/src/SMTP.php');
                require($home.'/PHPMailer/src/PHPMailer.php');
                require($home.'/PHPMailer/src/Exception.php');
                $mail = new PHPMailer(true);
                
                $time = time() + (60 * 15);
                $userInfo = new UserInfo($con, $userId);

                try {
                    $subject = "Verify Email (Market-20)";
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
                    $mail->addReplyTo($mailEmail, $mailName);

                    $textMsg = '<p>Hi '.$userInfo->fullName.'!</p>';
                    $textMsg .= '<p>Welcome to Market-20. Your Email verification OTP is:</p>';
                    $textMsg .= '<p style="font-size:28px;">'.$otpCode.'</p>';
                    $textMsg .= '<p><strong>Note:</strong> This OTP will expire after 15 minutes</p>';
                    $textMsg .= '<p>If you did not request an OTP from Market-20, please ignore this email.</p>';

                    mysqli_query($con, "REPLACE INTO `otpcodes` VALUES('".$userId."', '".$otpCode."', '".$time."')");
                    
                    $templateUrl = 'https://market-20.com/mail-templates/default.php?title='.urlencode($subject).'&text='.urlencode($textMsg);
                    $msg = file_get_contents($templateUrl, true);
                    $mail->Body = $msg;
                
                    $mail->send();
                } catch (Exception $e) {
                    $hasError = true;
                    $data['errorText'] = 'Something went wrong. Please try again';
                }
                $data['hasError'] = $hasError;
                echo json_encode($data);
                break;
            case 'forgot-password':

                $email = mysqli_real_escape_string($con, strtolower($_POST['email']));
                $query = mysqli_query($con, "SELECT `id` FROM `accounts` WHERE `email` = '".$email."'");
                if(mysqli_num_rows($query) == 0){
                    $hasError = true;
                    $data['errorText'] = 'There\'s no account associated with this email';
                } else {
                    function generateLinkCode(){
                        global $con;
                        $linkCode = substr(sha1(mt_rand()),0,10);
                        $query = mysqli_query($con, "SELECT * FROM `resetpasswordlinks` WHERE `linkCode` = '".$linkCode."'");
                        if(mysqli_num_rows($query) == 0)
                            return $linkCode;
                        return generateLinkCode();
                    }

                    $sql = mysqli_fetch_array($query);
                    $userId = $sql['id'];
                    $time = time() + (60 * 15);
                    $linkCode = generateLinkCode();
                    $link = $hostUrl.'/reset-password/'.$linkCode;
                
                    require($home.'/PHPMailer/src/SMTP.php');
                    require($home.'/PHPMailer/src/PHPMailer.php');
                    require($home.'/PHPMailer/src/Exception.php');
                    $mail = new PHPMailer(true);
                    
                    $userInfo = new UserInfo($con, $userId);

                    try {
                        $subject = "Password Reset (Market-20)";
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

                        $textMsg = '<p>Hi '.$userInfo->fullName.'!</p>';
                        $textMsg .= '<p>You have requested to reset your password on Market-20. Click on the link below to reset your password</p>';
                        $textMsg .= '<p><a href="'.$link.'">'.$link.'</a></p>';
                        $textMsg .= '<p><strong>Note:</strong> This link will expire after 15 minutes</p>';
                        $textMsg .= '<p>If you did not request a password reset, please ignore this email.</p>';
                        $mail->Body = $textMsg;

                        mysqli_query($con, "INSERT INTO `resetpasswordlinks` VALUES('0', '".$userId."', '".$linkCode."', '".$time."', 'false')");
                    
                        $mail->send();
                    } catch (Exception $e) {
                        $hasError = true;
                        $data['errorText'] = 'Something went wrong. Please try again';
                    }
                }
                $data['hasError'] = $hasError;
                echo json_encode($data);
                break;
            case 'reset-password':
                $linkCode = $_POST['linkCode'];
                $linkCodeQuery = mysqli_query($con, "SELECT * FROM `resetpasswordlinks` WHERE `linkCode` = '".$linkCode."'");
                if(mysqli_num_rows($linkCodeQuery) == 0){
                    $hasError = true;
                    $data['errorText'] = 'Something went wrong. Please try again';
                } else {
                    $linkCodeSql = mysqli_fetch_array($linkCodeQuery);
                    $linkCodeUsed = filter_var($linkCodeSql['used'], FILTER_VALIDATE_BOOLEAN);
                    if($linkCodeUsed){
                        $hasError = true;
                        $data['errorText'] = 'This link have already been used';
                    } else {
                        $linkCodeTime = (int) $linkCodeSql['time'];
                        $time = time();
                        if($time > $linkCodeTime){
                            $hasError = true;
                            $data['errorText'] = 'This link has expired';
                        } else {
                            $userId = $linkCodeSql['userID'];
                            $password = md5($_POST['password']);
                            mysqli_query($con, "UPDATE `accounts` SET `password` = '".$password."' WHERE `id` = ".$userId);
                            mysqli_query($con, "UPDATE `resetpasswordlinks` SET `used` = 'true' WHERE `linkCode` = '".$linkCode."'");
                        }
                    }
                }
                $data['hasError'] = $hasError;
                echo json_encode($data);
                break;
        }
    }
?>