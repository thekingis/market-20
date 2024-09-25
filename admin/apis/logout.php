<?php
	
	session_start();
	$adminId = $_SESSION['adminID'];
	setcookie("adminID", $adminId, time() - 2592000, '/', '.market-20.com');
	session_destroy();
	$href = '/';
	if(isset($_GET['href']))
		$href .= $_GET['href'];
	header('location: '.$href);
	
?>