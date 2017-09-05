<?php
	session_start();
	include_once('../dbcon.php');
	$blogid=$_GET['blogid'];
	$user=$_SESSION['login'];

	$usefull=mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM `likes` WHERE `userName`='$user' AND `id`='$blogid'"));

	$totallikes=mysqli_fetch_assoc(mysqli_query($con,"SELECT `likes` FROM `blogs` WHERE `id`='$blogid' "));
	$totallikes=$totallikes['likes'];

	$totalDislikes=mysqli_fetch_assoc(mysqli_query($con,"SELECT `dislikes` FROM `blogs` WHERE `id`='$blogid' "));
	$totalDislikes=$totalDislikes['dislikes'];

	if($usefull=="")
	{
		$wastefull=mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM `dislikes` WHERE `userName`='$user' AND `id`='$blogid'"));
		if($wastefull!="")
		{
			mysqli_query($con,"DELETE FROM `dislikes` WHERE `id`='$blogid' AND `userName`='$user'");
			$totalDislikes-=1;
			mysqli_query($con,"UPDATE `blogs` SET `dislikes`='$totalDislikes' WHERE `id`='$blogid' ");
		}
		mysqli_query($con,"INSERT INTO `likes` VALUES ('$blogid','$user') ");
		$totallikes+=1;
		mysqli_query($con,"UPDATE `blogs` SET `likes`='$totallikes' WHERE `id`='$blogid' ");
		//echo "liked";
		echo "<button type='button' class='w3-button w3-theme-d1 w3-margin-bottom w3-white' onclick='usefullPost(".$blogid.",this)'><i class='fa fa-thumbs-up' style='color:red'></i>&nbsp;Like&nbsp;&nbsp;&nbsp;$totallikes</button>&nbsp;&nbsp;<button type='button' class='w3-button w3-theme-d1 w3-margin-bottom' onclick='wastefullPost(".$blogid.",this)'><i class='fa fa-thumbs-down'></i>&nbsp;DisLike&nbsp;&nbsp;&nbsp;$totalDislikes</button>";
		//echo "<span class='likes' onclick='usefullPost(".$blogid.",this)'><i class='fa fa-thumbs-up'></i> Usefull&nbsp;&nbsp;$totallikes</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span onclick='wastefullPost(".$blogid.",this)'><i class='fa fa-thumbs-down'></i> Waste of Time&nbsp;&nbsp;$totalDislikes</span>";
	}
	else
	{
		mysqli_query($con,"DELETE FROM `likes` WHERE `id`='$blogid' AND `userName`='$user'");
		$totallikes-=1;
		mysqli_query($con,"UPDATE `blogs` SET `likes`='$totallikes' WHERE `id`='$blogid' ");
		echo "<button type='button' class='w3-button w3-theme-d1 w3-margin-bottom' onclick='usefullPost(".$blogid.",this)'><i class='fa fa-thumbs-up'></i>&nbsp;Like&nbsp;&nbsp;&nbsp;$totallikes</button>&nbsp;&nbsp;<button type='button' class='w3-button w3-theme-d1 w3-margin-bottom' onclick='wastefullPost(".$blogid.",this)'><i class='fa fa-thumbs-down'></i>&nbsp;DisLike&nbsp;&nbsp;&nbsp;$totalDislikes</button>";
		
		//echo "<span onclick='usefullPost(".$blogid.",this)'><i class='fa fa-thumbs-up'></i> Usefull&nbsp;&nbsp;$totallikes</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span onclick='wastefullPost(".$blogid.",this)'><i class='fa fa-thumbs-down'></i> Waste of Time&nbsp;&nbsp;$totalDislikes</span>";
	}
?>