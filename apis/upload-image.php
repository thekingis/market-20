<?php
    if(isset($_FILES)){
        $home = $_SERVER['DOCUMENT_ROOT'];
        include $home.'/inc/connect.php';
        include $home.'/inc/classes.php';
        include $home.'/inc/functions.php';
        $hostUrl = 'https://market-20.com';

        $inputSelection = (int) $_POST['inputSelection'];
        $croppedImageFile = $_FILES['croppedImageFile'];
        $tmp = $croppedImageFile['tmp_name'];
        $result = $userId.'-'.time().'-'.substr(sha1(mt_rand()),0,10);
        $target = "/uploaded-files/".$result.".png";
        $filePath = $home.$target;
        $imageUrl = $hostUrl.$target;
        if(move_uploaded_file($tmp, $filePath)){
            $column = $inputSelection == 0 ? 'coverPhotoUrl' : 'photoUrl';
            mysqli_query($con, "UPDATE `accounts` SET `".$column."` = '".$imageUrl."' WHERE `id` = ".$userId);
        }
    }
?>