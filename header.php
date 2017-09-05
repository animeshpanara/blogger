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
  <a href="#" class="w3-bar-item w3-button w3-padding-large w3-theme-d4"><i class="fa fa-home w3-margin-right"></i>Logo</a>
  <a href="#" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" title="News"><i class="fa fa-globe"></i></a>
  <a href="#" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" title="Account Settings"><i class="fa fa-user"></i></a>
 
  <div class="w3-dropdown-hover w3-hide-small">
    <button class="w3-button w3-padding-large" title="Notifications"><i class="fa fa-bell"></i><span class="w3-badge w3-right w3-small w3-green">3</span></button>     
    <div class="w3-dropdown-content w3-card-4 w3-bar-block" style="width:300px">
      <a href="#" class="w3-bar-item w3-button">One new friend request</a>
      <a href="#" class="w3-bar-item w3-button">John Doe posted on your wall</a>
      <a href="#" class="w3-bar-item w3-button">Jane likes your post</a>
    </div>
  </div>
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
  <?php
	if (isset($_SESSION['login'])) {
		$location='userpics/';
		$userName=$_SESSION['login'];
		$propic=mysqli_fetch_assoc(mysqli_query($con,"SELECT `propic` FROM `users` WHERE `userName`='$userName'"));
		$propic=$propic['propic'];
		$locationProfilePic=$location.$propic;
	}
	?>


</div>
</div>

<script type="text/javascript" src="js/script.js"></script>
<script type="text/javascript" src="js/restapis.js"></script>