<?php
	include_once('../dbcon.php');
	$blogid=$_GET['blogid'];

	$blogger=mysqli_fetch_assoc(mysqli_query($con,"SELECT `blogger` FROM `blogs` WHERE `id`='$blogid'"));
	$blogger=$blogger['blogger'];

	if($blogger!=$admin)
	{
		$notificationText="$admin found your blog inappropiate for blogger users and hence your blog is deleted.Try posting some usefull blogs.";
		mysqli_query($con,"INSERT INTO `notifications` (`notify`,`notifier`,`id`,`notification`) VALUES ('$blogger','$admin','0','$notificationText')");
	}

	mysqli_query($con,"DELETE FROM `blogs` WHERE `id`='$blogid'");
	mysqli_query($con,"DELETE FROM `comments` WHERE `id`='$blogid'");
	mysqli_query($con,"DELETE FROM `notifications` WHERE `id`='$blogid'");
	mysqli_query($con,"DELETE FROM `likes` WHERE `id`='$blogid'");
	mysqli_query($con,"DELETE FROM `dislikes` WHERE `id`='$blogid'");

?>