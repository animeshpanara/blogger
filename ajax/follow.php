<?php
	include_once('../dbcon.php');
	$userName=$_GET['userName'];
	$bloggerName=$_GET['bloggerName'];
	$followCheck=mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM `follow` WHERE `following`='$bloggerName' AND `follower`='$userName'"));

	$totalFollowers=mysqli_fetch_assoc(mysqli_query($con,"SELECT COUNT(`following`) FROM `follow` WHERE `following`='$bloggerName'"));
	$totalFollowers=$totalFollowers['COUNT(`following`)'];

	if($followCheck=="")
	{
		$notificationText="$userName started following you";
		mysqli_query($con,"INSERT INTO `notifications` (`notify`,`notifier`,`id`,`notification`) VALUES ('$bloggerName','$userName','-1','$notificationText')");

		
		mysqli_query($con,"INSERT INTO `follow` VALUES ('$bloggerName','$userName')");
		$totalFollowers+=1;

		echo "<button class='w3-button w3-theme-d1 w3-margin-bottom' type='button' onclick='followUser(\"$bloggerName\",\"$userName\")' class='buttons'>Unfollow</button>:$totalFollowers";


	}
	else
	{
		$notificationText="$userName started following you";
		mysqli_query($con,"DELETE FROM `notifications` WHERE `notification`='$notificationText' AND `id`='-1'");
		
		mysqli_query($con,"DELETE FROM `follow` WHERE `following`='$bloggerName' AND `follower`='$userName'");
		
		$totalFollowers-=1;

		echo "<button type='button' class='w3-button w3-theme-d1 w3-margin-bottom' onclick='followUser(\"$bloggerName\",\"$userName\")' class='buttons'>Follow</button>:$totalFollowers";
	}
?>