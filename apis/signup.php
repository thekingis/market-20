<?php

    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    if(isset($_POST['email'])){
        $home = $_SERVER['DOCUMENT_ROOT'];

        include $home.'/inc/connect.php';

        function generateReferenceID(){
            global $con;
            $referenceID = substr(sha1(mt_rand()),0,20);
            $query = mysqli_query($con, "SELECT * FROM `accounts` WHERE `referenceID` = '".$referenceID."'");
            if(mysqli_num_rows($query) == 0)
                return $referenceID;
            return generateReferenceID();
        }

        $referenceID = strtolower($_POST['referenceID']);
        $email = strtolower($_POST['email']);
        $fName = mysqli_real_escape_string($con, ucfirst(strtolower($_POST['fName'])));
        $lName = mysqli_real_escape_string($con, ucfirst(strtolower($_POST['lName'])));
        $country = mysqli_real_escape_string($con, ucfirst(strtolower($_POST['country'])));
        $phone = mysqli_real_escape_string($con, ucfirst(strtolower($_POST['phone'])));
        $occupation = mysqli_real_escape_string($con, ucfirst(strtolower($_POST['occupation'])));
        $password = $_POST['password'];
        $year = $_POST['year'];
        $month = $_POST['month'];
        $day = $_POST['day'];
        $date = date('Y-m-d G:i:s');
        $dateOfBith = $year . '-' . sprintf( "%02d", $month) . '-' . sprintf( "%02d", $day);

        $query = mysqli_query($con, "SELECT * FROM `accounts` WHERE `email` = '".$email."'");
        if(mysqli_num_rows($query) == 0){
            $referalID = 0;
            $refQuery = mysqli_query($con, "SELECT * FROM `accounts` WHERE `referenceID` = '".$referenceID."'");
            if(mysqli_num_rows($refQuery) == 1){
                $sql = mysqli_fetch_array($refQuery);
                $referalID = $sql['id'];
            }
            $refID = generateReferenceID();
            $defaultPhotoURL = 'https://market-20.com/images/userlogo.png';
            mysqli_query($con, "INSERT INTO `accounts` VALUES('0', '".$fName."', '".$lName."', '".$email."', '".md5($password)."', '".$defaultPhotoURL."', '', '".$country."', '".$phone."', '".$occupation."', '".$dateOfBith."', '".$referalID."', '".$refID."', '0', '0', '0', 'pending', '".$date."')");
            $userId = mysqli_insert_id($con);
            session_start();
            $_SESSION['userID'] = $userId;
            setcookie("userID", $userId, time()+2592000, '/', '.market-20.com');
            $data = array('hasError' => false);
            echo json_encode($data);
            return;
        }
        $data = array('hasError' => true, 'errorText' => 'An account with this Email already exists');
        echo json_encode($data);
    }
?>