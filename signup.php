<?php 
define('DB_HOST', 'localhost'); 
define('DB_NAME', 'blog'); 
define('DB_USER','root'); 
define('DB_PASSWORD',''); 
session_start();
$con=mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME) or die("Failed to connect to MySQL: " . mysqli_error($con)); 
//$db=mysqli_select_db($con,DB_NAME) or die("Failed to connect to MySQL: " . mysqli_error()); 
function NewUser() {
	 global $con;
	//$fullname = $_POST['uname']; 
	$userName = $_POST['user']; 
	$email = $_POST['email']; 
	$password = $_POST['psw']; 
	$id=mysqli_fetch_assoc(mysqli_query($con,"SELECT max(`id`) FROM `users`"));
	$id=$id['max(`id`)'];
	$id=$id+1;
	
	mysqli_query($dbase,"INSERT INTO `users` VALUES ('$id','$userName','$password','$mail','$name')");
	if($_FILES['userpic']['tmp_name']!='')
	{
		$location='userpics/';
		$tmpName=$_FILES['userpic']['tmp_name'];
		$name=$_FILES['userpic']['name'];
		$name=explode('.', $name);
		$name=$name[count($name)-1];
		$name=$userName.'.'.$name;
		move_uploaded_file($tmpName,$location.$name);
	}
	else
	{
		$name='default.png';
	}
	mysqli_query($con,"INSERT INTO `users` VALUES ('$id','$userName','$password','$email','$name')");
	
	$_SESSION['login']=$userName;
	header("Location:index.php");

	//$query = "INSERT INTO websiteusers (email,pass,userName) VALUES ('$email','$password','$userName')"; 
	//$data = mysqli_query ($con,$query)or die(mysqli_error($con)); 
	
	//if($data) { echo "YOUR REGISTRATION IS COMPLETED..."; } 
	} 
	function SignUp() {
		global $con; 
		if(!empty($_POST['user'])) //checking the 'user' name which is from Sign-Up.html, is it empty or have some text 
		{ 
			$userName = $_POST['user']; 
			$email = $_POST['email']; 
			$password = $_POST['psw']; 
			$query = mysqli_query($con,"SELECT * FROM users WHERE userName = '$userName' AND password = '$password'") or die(mysqli_error($con)); 
			if(!$row = mysqli_fetch_array($query) or die(mysqli_error($con))) 
				{ newuser(); } 
			else 
				{ echo "SORRY...YOU ARE ALREADY REGISTERED USER..."; } 
		} 
	} 
	if(isset($_POST['submit'])) 
		{
		 	SignUp(); 
		} 
?>
