<?php
	session_start();
	include_once('../dbcon.php');
	$loggedUser=$_SESSION['login'];
	$notid=$_GET['notid'];
	mysqli_query($con,"UPDATE `notifications` SET `readby`='1' WHERE `notid`='$notid'");
?>