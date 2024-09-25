<?php
    if(isset($_POST['investmentId'])){
        $home = $_SERVER['DOCUMENT_ROOT'];
        include $home.'/inc/connect.php';
        include $home.'/inc/classes.php';
        include $home.'/inc/functions.php';

        $investmentId = $_POST['investmentId'];
        $withdrawalMethod = $_POST['withdrawalMethod'];
        $walletAddress = $_POST['walletAddress'];
        $isChecked = $_POST['checkbox'];
        $textarea = mysqli_real_escape_string($con, $_POST['textarea']);
        $date = date('y-m-d G:i:s');

        mysqli_query($con, "INSERT INTO `withdrawal-requests` VALUES('0', '".$userId."', '".$investmentId."', '".$withdrawalMethod."', '".$walletAddress."', '".$isChecked."', '".$textarea."', 'pending', '".$date."')");
        mysqli_query($con, "UPDATE `investments` SET `status` = 'pending' WHERE `id` = ".$investmentId);
    }
?>