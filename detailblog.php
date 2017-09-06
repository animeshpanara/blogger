<?php
session_start();
include_once('dbcon.php');
if (!isset($_SESSION['login'])) {
  header('location:index.php');
}
$userName=$_SESSION['login'];
?>
<!DOCTYPE html>
<html>
<title>W3.CSS Template</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-blue-grey.css">
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
html,body,h1,h2,h3,h4,h5 {font-family: "Open Sans", sans-serif}
</style>
<body class="w3-theme-l5">
<?php include_once('header.php') ?>

<!-- Page Container -->
<div class="w3-container w3-content" style="max-width:1400px;margin-top:80px">    
  <!-- The Grid -->
  <div class="w3-row">
    <!-- Left Column -->
    <?php
    $bloggerName=$userName;
    $bloggerData=mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM `users` WHERE `userName`='$bloggerName'"));
    $mail=$bloggerData['mail'];
    $totalFollowers=mysqli_fetch_assoc(mysqli_query($con,"SELECT COUNT(`following`) FROM `follow` WHERE `following`='$bloggerName'"));
    $totalFollowers=$totalFollowers['COUNT(`following`)'];

    $totalFollowing=mysqli_fetch_assoc(mysqli_query($con,"SELECT COUNT(`follower`) FROM `follow` WHERE `follower`='$bloggerName'"));
    $totalFollowing=$totalFollowing['COUNT(`follower`)'];

    $totalPosts=mysqli_fetch_assoc(mysqli_query($con,"SELECT COUNT(`id`) FROM `blogs` WHERE `blogger`='$bloggerName'"));
    $totalPosts=$totalPosts['COUNT(`id`)'];
    ?>
    <div class="w3-col m3 w3-margin">
      <!-- Profile -->
      <div class="w3-card-2 w3-round w3-white">
        <div class="w3-container">
         <h4 class="w3-center">Profile</h4>
         <p class="w3-center"><img src=<?php echo $locationProfilePic; ?> class="w3-circle" style="height:200px;width:200px" alt="Avatar"></p>
         <hr>
         <p style="text-align: center;"><?php echo $userName ?></p>
        
     <p style="text-align: center;"><?php echo "<span class='userMail'>$mail</span>" ?></p>
     <?php
        if($admin!=$userName)
        echo " <div style='text-align:center; margin:auto; border: 2px solid;'>
              <table style='margin:auto; text-align: center;' cellspacing='10'>
              <tr class='postCountTitle'>
              <td >Followers</td>
              <td >Following</td>
              <td>&nbsp;&nbsp;Posts&nbsp;&nbsp;&nbsp;</td>
              </tr>
              <tr class='postCounts'>
              <td class='followerPanel' >$totalFollowers</td>
              <td class='followingPanel' >$totalFollowing</td>
              <td>$totalPosts</td>
              </tr> 
              </table>
              </div>";  
     ?>
     <!-- <div style="text-align: center;margin: auto;border: 2px solid">
     <table style="margin:auto;" cellspacing="10">
     <tr class="postCountTitle">
          <td >Followers</td>
          <td >Following</td>
          <td>&nbsp;&nbsp;Posts&nbsp;&nbsp;&nbsp;</td>
        </tr>
        <tr class="postCounts">
          <td class="followerPanel" ><?php echo $totalFollowers; ?></td>
          <td class="followingPanel" ><?php echo $totalFollowing; ?></td>
          <td><?php echo $totalPosts; ?></td>
        </tr> 
     </table>
     </div> -->
         </div>
         <br>
      </div>
      <br>
    </div>
    <!-- <div class="w3-col m3 w3-margin">
      
      <div class="w3-card-2 w3-round w3-white">
        <div class="w3-container">
         <h4 class="w3-center">Profile</h4>
         <p class="w3-center"><img src=<?php echo $locationProfilePic ?> class="w3-circle" style="height:200px;width:200px" alt="Avatar"></p>
         <hr>
         <p style="text-align: center;"><?php echo $userName ?></p>
         </div>
      </div>
      <br>
      
    </div> -->
    <div class="w3-col m8">
    <?php
    	$blogid=$_GET['blogid'];
    	$blogsToShow=mysqli_query($con,"SELECT * FROM `blogs` WHERE `id`='$blogid'");
    	$blog=mysqli_fetch_assoc($blogsToShow);
        $blogid=$blog['id'];
        $blogger=$blog['blogger'];
        $bloggerimg=mysqli_fetch_assoc(mysqli_query($con,"SELECT `propic` FROM `users` WHERE `userName`='$blogger'"));
        //$location='userpics/';
        $bloggerpic=$bloggerimg['propic'];
        $bloggerP=$location.$bloggerpic;

        //$propic=mysqli_fetch_assoc(mysqli_query($con,"SELECT `propic` FROM `users` WHERE `userName`='$blogger'"));
        //$location='userpics/'.$propic['propic'];
        $isLiked=mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM `likes` WHERE `id`='$blogid' AND `userName`='$userName'"));
        if($isLiked=="")
        {
          //$likebutton="<span onclick='usefullPost(".$blogid.",this)'><i class='fa fa-thumbs-up'></i> Usefull&nbsp;&nbsp;".$blog['usefull']."</span>";
           $likebutton="<button type='button' class='w3-button w3-theme-d1 w3-margin-bottom' onclick='usefullPost(".$blogid.",this)'><i class='fa fa-thumbs-up'></i>&nbsp;Like&nbsp;&nbsp;&nbsp;".$blog['likes']."</button>"; 
        }
        else
        {
          $likebutton="<button type='button' class='w3-button w3-theme-d1 w3-margin-bottom w3-white' onclick='usefullPost(".$blogid.",this)'><i class='fa fa-thumbs-up' style='color:red'></i>&nbsp;Like&nbsp;&nbsp;&nbsp;".$blog['likes']."</button>"; 
        }

        $isDisliked=mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM `dislikes` WHERE `id`='$blogid' AND `userName`='$userName'"));
        if($isDisliked=="")
        {
          
          $dislikebutton="<button type='button' class='w3-button w3-theme-d1 w3-margin-bottom' onclick='wastefullPost(".$blogid.",this)'><i class='fa fa-thumbs-down'></i>&nbsp;DisLike&nbsp;&nbsp;&nbsp;".$blog['dislikes']."</button>";
        }
        else
        {
          $dislikebutton="<button type='button' class='w3-button w3-theme-d1 w3-margin-bottom w3-white' onclick='wastefullPost(".$blogid.",this)'><i class='fa fa-thumbs-down' style='color:red'></i>&nbsp;DisLike&nbsp;&nbsp;&nbsp;".$blog['dislikes']."</button>";  
        }
        if($userName==$admin){
          $deletebutton="<i class='fa fa-window-close deleteBtn' onclick='takeDelConf($blogid)'></i>";
          $str4="
          		<div class='w3-hide deleteConf'></div>
                <div class='w3-hide deleteCont'>
                <hr>
                <span>Are you sure you want to delete this post?</span>
                <div>
                <button type='button' class='w3-button w3-theme-d1 w3-margin-bottom buttons deleteSubmit'>Delete</button>
                <button type='button' class='w3-button w3-theme-d1 w3-margin-bottom buttons' onclick='completeDeleting()'>Cancel</button>
                </div>
                </div>
                ";}
        	else{
        	$deletebutton="";
        	$str4="";
        	}   

    ?>    
        
        <div class='w3-container w3-card-2 w3-white w3-round w3-margin w3-padding'><br>
        <img src=<?php echo $bloggerP; ?> alt='Avatar' class='w3-left w3-csquare w3-margin-right' style='height:60px;width:60px'>
        <span class='w3-right w3-opacity'><?php echo $deletebutton;?></span>
        <h4><?php echo $blogger; ?></h4><br>
        <?php echo $str4;?>
        <hr class='w3-clear'>
        <p><?php echo $blog['blog']; ?></p>
        <hr>
        &nbsp;&nbsp;
        <span>
        <?php echo $likebutton; ?>&nbsp;&nbsp;<?php echo $dislikebutton; ?>
        </span>
        &nbsp;&nbsp;
        <br>
        <div class='w3-container commentbox'>
        <?php
        $comments=mysqli_query($con,"SELECT * FROM `comments` WHERE `id`='$blogid'");
        while($comment=mysqli_fetch_assoc($comments))
      	{
        $cid=$comment['id'];
        $commenter=$comment['commenter'];
        $commenttext=$comment['comment'];
        $commenterimg=mysqli_fetch_assoc(mysqli_query($con,"SELECT `propic` FROM `users` WHERE `userName`='$commenter'"));
        $location='userpics/';
        $commenterpic=$commenterimg['propic'];
        $commenterP=$location.$commenterpic;
        echo "
        	<div class='w3-row'>
			<hr>
            	<div class='w3-col w3-padding' style='width:60px;'><img src='$commenterP' class='w3-square' style='height:45px;width:45px' align='middle' alt='Avatar'></img>
            	</div>
            	<div class='w3-rest w3-padding' >
            	$commenttext
            	</div>
            </div>";
		}
        ?>
          <div class='w3-row commentPlz'>
            <hr>
            <div class='w3-col w3-padding' style='width:60px;'><img src=<?php echo $locationProfilePic; ?> class='w3-square' style='height:45px;width:45px' align='middle' alt='Avatar'></img>
            </div>
            <div class='w3-rest w3-padding' >
            <input class='w3-input w3-border w3-round-large commentInput' type='text' placeholder='your comments here......' onkeyup='if(event.which== 13)commentsin(<?php echo $blogid;?>);'>
            <button type='submit' class='w3-button w3-theme-d2 w3-margin-top' value='Comment' onclick='commentsin(<?php echo $blogid;?>)'><i class='fa fa-comment'></i>Comment</button>
            </div>
          </div>
        </div>
         
      </div>
      
    
     
      
    <!-- End Middle Column -->
    </div>
    
 
    
  <!-- End Grid -->
  </div>
  
<!-- End Page Container -->
</div>
<br>