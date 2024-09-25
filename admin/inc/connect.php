<?php
    
    ini_set('display_errors', '1');
    ini_set('display_startup_errors', '1');
    error_reporting(E_ALL);
    date_default_timezone_set('Africa/Lagos');

    //$con = mysqli_connect('localhost', 'wwfthfnu_market-20', 'Gx8QLpbpkAvfYMjVn7wN')or die ('connect error');
    $con = mysqli_connect('localhost', 'root', '')or die ('connect error');
    mysqli_select_db($con, 'wwfthfnu_market-20') or die (mysqli_error($con));

    $mailHost = 'mail.market-20.com';
    $mailUsername = 'support@market-20.com';
    $mailPassword = '4J)9bh5aEL-Di6';
    $mailEmail = 'support@market-20.com';
    $mailName = 'Market-20';
    $mailPort = 587;
    define("SENT", "Sent");
    define("INBOX", "INBOX");
    $imapHost = '{mail.market-20.com:993/imap/ssl/novalidate-cert}';
    $imapUsername = 'support@market-20.com';
    $imapPassword = '4J)9bh5aEL-Di6';
    
?>