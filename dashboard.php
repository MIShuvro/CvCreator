<?php


include('session.php');

if(!isset($_SESSION['login_user'])){
header("location: index.php"); 
}



$conn = mysqli_connect("localhost", "root", "", "data_storage");






$query = "SELECT * from sign_up where username = '$user_check'";
$ses_sql = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($ses_sql);


?>


<!DOCTYPE html>
<html>
<head>
  <title>User Profile</title>
  <link href="style.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="./CSS/dashboard.css">
</head>
<body>
 <div id="profile">
  <b id="welcome">Hello : <b><?php echo $login_session; ?></b></b>
  <div class="top_slide">
     <ul>
      <li id="edu"><a href="education.php" >Education</a></li>
     <li> <b id="logout"><a href="logout.php">Log Out</a></b></li>
     </ul>
</div>
  </div>
  

 
 <div class="user_data">
 
    <table>
	
	   <tr><td><label>Full Name: </label><?php echo $row['fullname'];?></td></tr>
	   <tr><td><label>User Name:</label> <?php echo $row['username'];?></td></tr>
	   <tr><td><label>Email: </label><?php echo $row['email'];?></td></tr>
	   <tr><td><label>Gender:</label> <?php echo $row['gender'];?></td></tr>
	   <tr><td><label>Religion:</label> <?php echo $row['religion'];?></td></tr>
     <tr><td><label>User Type:</label> <?php echo $row['usertype'];?></td></tr>
	   <tr><td><label><a href="update.php?id=<?php echo urlencode($row['id']);?>">Update</a></label> </td></tr>
	  
	</table>
 </div>
 <div class="footer">
    <?php 
    if(isset($_GET['msg'])){
		echo "<span id='success'>".$_GET['msg']."</span>";
	}
 ?>
 </div>
</body>
</html>