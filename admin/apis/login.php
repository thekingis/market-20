<?php

    if(isset($_POST['username'])){
        $home = $_SERVER['DOCUMENT_ROOT'];
        include_once $home.'/inc/connect.php';

        $hasError = false;
        $data = array();

        $username = strtolower($_POST['username']);
        $password = md5($_POST['password']);
        //$stayLoggedin = filter_var($_POST['stayLoggedin'], FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE);
        
        $queryCheck = mysqli_query($con, "SELECT * FROM `admin` WHERE username = '".$username."'");
        $hasError = mysqli_num_rows($queryCheck) == 0;
        $sql = mysqli_fetch_array($queryCheck);

        if($hasError){
            $data['errorText'] = 'Invalid Username';
        } else {
            $pass = $sql['password'];
            $hasError = !($password === $pass);
            $data['errorText'] = 'Incorrect Password';
        }

        if(!$hasError){
            $adminId = $sql['id'];
            session_start();
            $_SESSION['adminID'] = $adminId;
            setcookie("adminID", $adminId, time()+2592000, '/', '.market-20.com');
        }

        $data['hasError'] = $hasError;
        echo json_encode($data);

    }

?>