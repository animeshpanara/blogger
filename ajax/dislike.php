<?php
	session_start();
	include_once('../dbcon.php');
	$blogid=$_GET['blogid'];
	$user=$_SESSION['login'];
	$wastefull=mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM `dislikes` WHERE `userName`='$user' AND `id`='$blogid'"));

	$totallikes=mysqli_fetch_assoc(mysqli_query($con,"SELECT `likes` FROM `blogs` WHERE `id`='$blogid' "));
	$totallikes=$totallikes['likes'];

	$totaldislikes=mysqli_fetch_assoc(mysqli_query($con,"SELECT `dislikes` FROM `blogs` WHERE `id`='$blogid' "));
	$totaldislikes=$totaldislikes['dislikes'];

	if($wastefull=="")
	{
		$usefull=mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM `likes` WHERE `userName`='$user' AND `id`='$blogid'"));
		if($usefull!="")
		{
			mysqli_query($con,"DELETE FROM `likes` WHERE `id`='$blogid' AND `userName`='$user'");
			$totallikes-=1;
			mysqli_query($con,"UPDATE `blogs` SET `likes`='$totallikes' WHERE `id`='$blogid' ");
		}
		mysqli_query($con,"INSERT INTO `dislikes` VALUES ('$blogid','$user') ");
		$totaldislikes+=1;
		mysqli_query($con,"UPDATE `blogs` SET `dislikes`='$totaldislikes' WHERE `id`='$blogid' ");

		echo "<button type='button' class='w3-button w3-theme-d1 w3-margin-bottom' onclick='usefullPost(".$blogid.",this)'><i class='fa fa-thumbs-up'></i>&nbsp;Like&nbsp;&nbsp;&nbsp;$totallikes</button>&nbsp;&nbsp;<button type='button' class='w3-button w3-theme-d1 w3-margin-bottom w3-white' onclick='wastefullPost(".$blogid.",this)'><i class='fa fa-thumbs-down' style='color:red'></i>&nbsp;DisLike&nbsp;&nbsp;&nbsp;$totaldislikes</button>";
	}
	else
	{
		mysqli_query($con,"DELETE FROM `dislikes` WHERE `id`='$blogid' AND `userName`='$user'");
		$totaldislikes-=1;
		mysqli_query($con,"UPDATE `blogs` SET `dislikes`='$totaldislikes' WHERE `id`='$blogid' ");

		echo "<button type='button' class='w3-button w3-theme-d1 w3-margin-bottom' onclick='usefullPost(".$blogid.",this)'><i class='fa fa-thumbs-up'></i>&nbsp;Like&nbsp;&nbsp;&nbsp;$totallikes</button>&nbsp;&nbsp;<button type='button' class='w3-button w3-theme-d1 w3-margin-bottom' onclick='wastefullPost(".$blogid.",this)'><i class='fa fa-thumbs-down'></i>&nbsp;DisLike&nbsp;&nbsp;&nbsp;$totaldislikes</button>";
	}
?>