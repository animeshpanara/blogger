<?php
session_start();
if(isset($_SESSION['login']))
{

	$userName=$_SESSION['login'];
	$result="<span class='notice' style='color:green;'>Successfully Logged In!</span>";
	header("location:blogmain.php");
}
else
{

	include_once('dbcon.php');
	$result="";
	$userName="";
	if (isset($_POST['login'])) {
		$userName=$_POST['uname'];
		$password=$_POST['psw'];
		
		$user=mysqli_fetch_assoc(mysqli_query($con,"SELECT `userName`,`password` FROM `users` WHERE `userName`='$userName'"));
		if($user==""){
			$result="<span class='notice'>User not found! <a href='signup.php'>Sign Up Here</a></span>";
		}
		else {
			$dbasePassword=$user['password'];
			if($dbasePassword!=$password){
				$result="<span class='notice'>Incorrect Password!</span>";
			}
			else
			{
				$result="<span class='notice' style='color:green;'>Successfully Logged In!</span>";
				$_SESSION['login']=$userName;
				header("location:blogmain.php");
			}
		}
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<h2>BLOGGER</h2>

<button onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Login</button>
<button onclick="document.getElementById('id02').style.display='block'" style="width:auto;">Sign Up</button>

<div id="id02" class="modal">
  
  <form class="modal-content animate signupform"  action="signup.php" method="POST" enctype="multipart/form-data">
    <div class="container">
    <div class="imgcontainer"> 
      <img src="userpics/default.png" alt="Avatar" class="avatar" id="profilepic">
    
      <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>
    </div>
      <label><b>Username</b></label>
      <input type="text" placeholder="Enter Username" name="user" required>

      <label><b>Email</b></label>
      <input type="text" placeholder="Enter Email" name="email" required>

      <label><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="psw" class="psw" required>

      <label><b>Repeat Password</b></label>
      <input type="password" placeholder="Repeat Password" name="psw-repeat" class="psw-repeat" required>

      <label class="uploadDiv"><b>Upload Profile Picture</b></label>
      <input type="file" accept=".jpg,.jpeg,.png" name="userpic" class="uploadButton" onchange="readURL(this)">

      <input type="checkbox" checked="checked"> Remember me
      <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>

      <div class="clearfix">
        <button type="button" onclick="document.getElementById('id02').style.display='none'" class="cancelbtn">Cancel</button>
        <button type="submit" name="submit" class="signupbtn">Sign Up</button>
      </div>
    </div>
    
  </form>
</div>

<div id="id01" class="modal">
  	
  <form class="modal-content animate loginForm" action="index.php" method="POST" enctype="multipart/form-data">
    <?php echo $result ?>
    <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
      
    </div>

    <div class="container">
      <label><b>Username</b></label>
      <input type="text" placeholder="Enter Username" name="uname" required>

      <label><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="psw" required>
        
      <button type="submit" class="buttons" value="login" name="login">Login</button>
      <input type="checkbox" checked="checked"> Remember me
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
      <!-- <span class="psw">Forgot <a href="#">password?</a></span> -->
    </div>
  </form>
</div>
</body>
<script type="text/javascript" src="js/script.js"></script>
<script type="text/javascript" src="js/validate.js"></script>
<script type="text/javascript">
var validate=[
{
	"class":"psw"
},	
{
"class":"psw-repeat",
"matchWith":"psw,password"
},
"signupform"
];
setValidatorFunction(validate);
</script>
</html>