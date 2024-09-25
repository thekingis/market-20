<?php
    
    $home = $_SERVER['DOCUMENT_ROOT'];
    include_once $home.'/inc/connect.php';
    include_once $home.'/inc/classes.php';
    include_once $home.'/inc/functions.php';

    if(loggedin()){
        header('location: /apis/logout.php?href=/sign-up/ref/'.$_GET['ref'].'/');
        exit();
    }

    header('location: /sign-up/ref/'.$_GET['ref'].'/');

?>