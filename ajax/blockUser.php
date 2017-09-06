<?php
	include_once('../dbcon.php');
	$bloggerName=$_GET['bloggerName'];
	$blockStatus=mysqli_fetch_assoc(mysqli_query($con,"SELECT `block` FROM `users` WHERE `userName`='$bloggerName'"));
	$blockStatus=$blockStatus['block'];
	if($blockStatus==0)
	{
		mysqli_query($con,"UPDATE `users` SET `block`='1' WHERE `userName`='$bloggerName'");
		echo "<button class='w3-button w3-theme-d1 w3-margin-bottom buttons' type='button' onclick='blockUser(\"$bloggerName\")'>UnBlock</button>";
	}
	else
	{
		mysqli_query($con,"UPDATE `users` SET `block`='0' WHERE `userName`='$bloggerName'");
		echo "<button class='w3-button w3-theme-d1 w3-margin-bottom buttons' type='button' onclick='blockUser(\"$bloggerName\")'>Block</button>";
	}
?>