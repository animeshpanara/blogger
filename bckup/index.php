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
  
  <form class="modal-content animate signupform"  action="login.php" method="POST">
    <div class="imgcontainer"> 
      <img src="userpics/default.png" alt="Avatar" class="avatar" id="profilepic">
    </div>
    
    <div class="container">
      <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>
      <label><b>Username</b></label>
      <input type="text" placeholder="Enter Username" name="user" required>

      <label><b>Email</b></label>
      <input type="text" placeholder="Enter Email" name="email" required>

      <label><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="psw" class="psw" required>

      <label><b>Repeat Password</b></label>
      <input type="password" placeholder="Repeat Password" name="psw-repeat" class="psw-repeat" required>

      <label class="uploadDiv"><b>Upload Profile Picture</b></label>
      <input type="file" accept=".jpg,.jpeg,.png" name="propic" class="uploadButton" onchange="readURL(this)">

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
  <form class="modal-content animate" action="/action_page.php">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
      <img src="img_avatar2.png" alt="Avatar" class="avatar">
    </div>

    <div class="container">
      <label><b>Username</b></label>
      <input type="text" placeholder="Enter Username" name="uname" required>

      <label><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="psw" required>
        
      <button type="submit">Login</button>
      <input type="checkbox" checked="checked"> Remember me
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
      <!-- <span class="psw">Forgot <a href="#">password?</a></span> -->
    </div>
  </form>
</div>
</body>
<script type="text/javascript" src="script.js"></script>
<script type="text/javascript" src="validate.js"></script>
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