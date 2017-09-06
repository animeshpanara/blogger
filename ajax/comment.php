<?php
	session_start();
	include_once('../dbcon.php');
	$loggedUser=$_SESSION['login'];
	$comment=$_POST['comment'];
	$blogid=$_POST['blogid'];
	$location='userpics/';
	$propic=mysqli_fetch_assoc(mysqli_query($con,"SELECT `propic` FROM `users` WHERE `userName`='$loggedUser'"));
	$propic=$propic['propic'];
	$locationProfilePic=$location.$propic;
		
	mysqli_query($con,"INSERT INTO `comments` VALUES ('$blogid','$loggedUser','$comment',NULL) ");
		$blogger=mysqli_fetch_assoc(mysqli_query($con,"SELECT `blogger` FROM `blogs` WHERE `id`='$blogid'"));
		$blogger=$blogger['blogger'];
		if($blogger!=$loggedUser)
		{
			$notificationText="$loggedUser commented on your Blog...\"$comment\"";
			mysqli_query($con,"INSERT INTO `notifications` (`notify`,`notifier`,`id`,`notification`) VALUES ('$blogger','$loggedUser','$blogid','$notificationText')");
		}
			

		echo "
			<hr>
            <div class='w3-col w3-padding' style='width:60px;'><img src='$locationProfilePic' class='w3-square' style='height:45px;width:45px' align='middle' alt='Avatar'></img>
            </div>
            <div class='w3-rest w3-padding' style='line-height:40px'>
            $comment
            </div>
          </div>";

?>