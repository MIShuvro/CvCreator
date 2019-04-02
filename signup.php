<?php 

   
   if(isset($_POST['submit'])){
	   $dbconn = mysqli_connect('localhost','root','','data_storage');
	   $fname = mysqli_real_escape_string($dbconn,$_POST['fullname']);
	   $uname = mysqli_real_escape_string($dbconn,$_POST['uname']);
	   $password = mysqli_real_escape_string($dbconn,$_POST['password']);
	   $email = mysqli_real_escape_string($dbconn,$_POST['email']);
	   $gender = mysqli_real_escape_string($dbconn,$_POST['gender']);
	   $religion = mysqli_real_escape_string($dbconn,$_POST['religion']);

	   $usertype= mysqli_real_escape_string($dbconn,$_POST['UserType']);

	   $query = "INSERT INTO sign_up(fullname,username,password,email,gender,religion,usertype) Values ('$fname','$uname','$password','$email','$gender','$religion','$usertype') ";
	   $exquery = mysqli_query($dbconn,$query);
	   if($exquery){
		   header('Location:index.php?msg='.urldecode("Accounted created Successfully"));
	   }
       mysqli_close($dbconn);
   }
?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title></title>
	<link rel="stylesheet" href="./CSS/signup.css">
</head>
<body>
<div class="header"><h1>User Registration Page</h1></div>
	<div class="signup">
	   <form action="signup.php" method="post">
	   <table>
	      <tr><td><span>Full Name:</span></td> <td> <input type="text" name="fullname" required/> </td> </tr>
	      <tr><td><span>User Name:</span></td><td><input type="text" name="uname" required/> </td> </tr>
	      <tr><td><span>Password:</span></td> <td><input type="password" name="password" required/></td></tr>
	      <tr><td><span>Email: </span></td><td><input type="email" name="email" required/></td></tr><tr>
		  <tr><td><span>Gender:</span> </td>
           <td> <input type="radio" name="gender" value="Male"/>Male</td>
		   <td> <input id="radio" type="radio" name="gender" value="Female"/>Female</td>
		  </tr>
		  <tr><td><span>Religion:</span></td>  
          <td> <select name="religion" >
		      <option value="0">Select</option>
		       <option value="Islam">Islam</option>
		       <option value="Hindu">Hindu</option>
		       <option value="Kristan">Kristan</option>
               
		  </select></td></tr>
		  <tr><td><span>User Type:</span></td>  
          <td> <select name="UserType" >
		      <option value="0">Select</option>
		       <option value="Employer">Employer</option>
		       <option value="Job Secker">Job Secker</option>
		       
               
		  </select></td></tr>
	      <tr></tr>
          <tr></tr>
          <tr></tr>
         
          <tr><td>
          <a href="index.php" id="goto"><span>Go To Home</span></a>
          </td>
          <td></td><td> <input id="submit" type="submit" value="SUBMIT" name="submit"/></td></tr>
	   </table>
	  
	</form>
	
	</div>
	<div class="footer"></div>
</body>
</html>