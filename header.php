<?php
	if (isset($_GET['logout'])) {
		session_start();
		session_unset();
		session_destroy();
		header("location:index.php");
	}
?>
<div class="w3-top">
 <div class="w3-bar w3-theme-d2 w3-left-align w3-large">
  <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large w3-theme-d2" href="javascript:void(0);" onclick="openNav()"><i class="fa fa-bars"></i></a>
  <a href="blogmain.php" class="w3-bar-item w3-button w3-padding-large w3-theme-d4"><i class="fa fa-home w3-margin-right"></i>Logo</a>
  <!-- <a href="#" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white w3-hide" title="News"><i class="fa fa-globe"></i></a>
  <a href="#" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white w3-hide" title="Account Settings"><i class="fa fa-user"></i></a>
  -->
  <div class="w3-dropdown-hover w3-hide-small">
   
    <?php
	if (isset($_SESSION['login'])) {
		$location='userpics/';
		$userName=$_SESSION['login'];
		$propic=mysqli_fetch_assoc(mysqli_query($con,"SELECT `propic` FROM `users` WHERE `userName`='$userName'"));
		$propic=$propic['propic'];
		$locationProfilePic=$location.$propic;
		}
		$notifications=mysqli_query($con,"SELECT * FROM `notifications` WHERE `notify`='$userName' ORDER BY `time` DESC");
		$totalNoti=0;
		$totalRead=0;
		$notiTables="<div class='w3-dropdown-content w3-card-4 w3-bar-block' style='width:800px'>";
		while($notification=mysqli_fetch_assoc($notifications))
		{
			$notify=$notification['notify'];
			$notifier=$notification['notifier'];
			$blogid=$notification['id'];
			$notid=$notification['notid'];
			if($blogid>0)
			$locationToGo='detailblog.php?blogid='.$blogid;
			else
			$locationToGo='profile.php?user='.$notifier;

			$propic=mysqli_fetch_assoc(mysqli_query($con,"SELECT `propic` FROM `users` WHERE `userName`='$notifier'"));
			$propic=$propic['propic'];
			$notificationText=$notification['notification'];
			if($notification['readBy']=='0')
			{
				$totalNoti++;
				$notiTables.="<a href='$locationToGo' class='w3-bar-item w3-button w3-show' onclick='return markread($notid)'>
				<div class='w3-row'>
				<div class='w3-col' style='width:60px'><img src='$location$propic' style='height:40px;width:40px'></img>
				</div>
				<div class='w3-rest'><span>$notificationText</span>
				</div>
				</div>
				</a>
				";
			}
			else
			{
				$totalRead++;
				$notiTables.="<a href='$locationToGo' class='w3-bar-item w3-button w3-teal'><div class='w3-row'>
				<div class='w3-col' style='width:60px'><img src='$location$propic' style='height:40px;width:40px'></img>
				</div>
				<div class='w3-rest'><span>$notificationText</span>
				</div>
				</div>
				</a>
				";
				
			}
			

			if($totalNoti<10 && $totalRead==9)
			{
				break;
			}
		}
		$notiTables.="</div>";
	?>
	<button class="w3-button w3-padding-large" title="Notifications"><i class="fa fa-bell"></i><span class="w3-badge w3-right w3-small w3-green"><?php echo $totalNoti;?></span></button>
	<?php echo $notiTables;?>
  </div>

  <div class="w3-margin w3-col m1"></div>
  <div class="w3-dropdown-hover w3-hide-small w3-margin w3-col m6">
		<?php
		if (isset($_SESSION['login'])) {
			echo "<input type='text' class='searchBox' placeholder='Search Blogger...' style='width:100%' onkeyup='searchUsers(this.value)'>
			<div class='w3-dropdown-content w3-card-4 w3-bar-block w3-col m6 searchResult'>
      		</div>";
		}
		?>
	</div>
  <a href="#"  class="w3-bar-item w3-button w3-padding-large w3-theme-d4" style="float:right; size: auto;"><form method="GET" action="header.php"><input type="submit" value="Logout" name="logout" style="float:right;display: flex"></input></form></a>
  


</div>
</div>

<script type="text/javascript" src="js/script.js"></script>
<script type="text/javascript" src="js/restapis.js"></script>