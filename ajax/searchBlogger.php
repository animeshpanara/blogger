<?php
	include_once('../dbcon.php');
	$blogger=$_GET['blogger'];
	$found=false;
	$searchedData='';
	$location='userpics/';
	$bloggersSearched=mysqli_query($con,"SELECT `userName`,`propic` FROM `users`");
	while($bloggerSearched=mysqli_fetch_assoc($bloggersSearched)){
		$bloggerName=$bloggerSearched['userName'];
		if(stripos($bloggerName,$blogger)!==false)
		{
			$found=true;
			$propic=$bloggerSearched['propic'];
			$searchedData.="<a href='profile.php?user=$bloggerName' class='w3-bar-item w3-button w3-padding' style='line-height: 100%;width:100%'>
			<div class='w3-row'>
				<div class='w3-col' style='width:60px'><img src='$location$propic' style='height:40px;width:40px'></img>
				</div>
				<div class='w3-rest' style='line-height:40px'><span>$bloggerName</span>
				</div>
			</div>
			</a>";
		}
	}
	if($found)
		echo "$searchedData"
?>