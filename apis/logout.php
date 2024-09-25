<?php
	
	session_start();
	$userId = $_SESSION['userID'];
	setcookie("userID", $userId, time() - 2592000, '/', '.market-20.com');
	session_destroy();
	$href = '/';
	if(isset($_GET['href']))
		$href = $_GET['href'];
	header('location: '.$href);
	
?>