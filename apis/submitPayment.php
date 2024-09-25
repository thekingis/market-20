<?php
    if(isset($_POST['paymentMethod'])){
        $home = $_SERVER['DOCUMENT_ROOT'];
        include $home.'/inc/connect.php';
        include $home.'/inc/classes.php';
        include $home.'/inc/functions.php';

        $stockID = $_POST['stockID'];
        $paymentMethod = $_POST['paymentMethod'];
        $referenceID = mysqli_real_escape_string($con, $_POST['referenceID']);
        $amount = $_POST['amount'];
        $date = date('y-m-d G:i:s');

        mysqli_query($con, "INSERT INTO `payments` VALUES('0', '".$userId."', '".$stockID."', '".$paymentMethod."', '".$referenceID."', '".$amount."', 'pending', '".$date."')");
    }
?>