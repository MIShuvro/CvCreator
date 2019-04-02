<?php
include('login.php');
if(isset($_SESSION['login_user'])){
 header("location:dashboard.php"); 
}
?> 
<!DOCTYPE html>
<html>
<head>
  <title>PHP Login System</title>
  <link href="./CSS/style.css" rel="stylesheet" type="text/css">
</head>
<body>
 <div id="login">
 <?php 
    if(isset($_GET['msg'])){
		echo "<span id='success'>".$_GET['msg']."</span>";
	}
 ?>
  <h2 id="heading">Login Here </h2>
  <form action="" method="post">
     <label style="color:white">UserName :</label>
      <input id="name" name="username" placeholder="Enter your username here" type="text"/>
      <label style="color:white">Password :</label>
      <input id="password" name="password" placeholder="Enter your password here" type="password" /><br><br>
      <input name="submit" type="submit" value=" Login "/>
   
   <a href="signup.php" id="signup" >Sign Up Here?</a><br />
   <span><?php echo $error; ?></span>
  </form>
 </div>
</body>
</html>