<?php 
   $id = $_GET['id'];
	$dbconn = mysqli_connect('localhost','root','','data_storage');
	$rquery = "SELECT * FROM sign_up WHERE id=$id";
	$exquery = mysqli_query($dbconn,$rquery);
	$getData = mysqli_fetch_assoc($exquery);
   if(isset($_POST['submit'])){
	   $fname = mysqli_real_escape_string($dbconn,$_POST['fullname']);
	   $uname = mysqli_real_escape_string($dbconn,$_POST['username']);
	   $email = mysqli_real_escape_string($dbconn,$_POST['email']);
	   $gender = mysqli_real_escape_string($dbconn,$_POST['gender']);
	   $religion = mysqli_real_escape_string($dbconn,$_POST['religion']);
	  // $user= mysqli_real_escape_string($dbconn,$_POST['user']);
	   $query = "UPDATE sign_up SET
	     fullname='$fname',
	     username='$uname',
	     email='$email',
	     gender='$gender',
	     usertype='$religion'
		
		 WHERE id=$id";
       $update = mysqli_query($dbconn,$query);
	   if($update){
		   header('Location:dashboard.php?msg='.urldecode("Data updated Successfully"));
	   }
       
   }
   
  if(isset($_POST['delete'])){
	  $query = "DELETE FROM sign_up WHERE id=$id";
	  $delete = mysqli_query($dbconn,$query);
	  if($delete){
		  
		 session_start();
if(session_destroy()) 
{
header("Location: index.php?msg=".urldecode("Accounted Deleted Successfully")); 
}
		 
	  }
  }
?>

<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title></title>
    <link rel="stylesheet" href="./CSS/update.css">
</head>
<body>

<div class="update">
    <form action="update.php?id=<?php echo $id;?>" method="post">
	   <table>
	      <h1>Update Your Profile</h1>
	      <tr><td>Fullname:</td> <td><input type="text" name="fullname" value="<?php echo $getData['fullname'];?>" /></td></tr>
	      <tr><td>Username:</td><td> <input type="text" name="username" value="<?php echo $getData['username'];?>"/></td></tr>
	      <tr><td>Email: </td><td><input type="text" name="email" value="<?php echo $getData['email'];?>"/></td></tr>
	      <tr><td>Gender:</td> <td><input type="text" name="gender" value="<?php echo $getData['gender'];?>"/></td></tr>
          <tr><td>User Type:</td><td> <input type="text" name="religion" value="<?php echo $getData['usertype'];?>"/></td></tr>
		  
        
          <tr><td><input type="submit" value="UPDATE" name="submit"/></td>
          
          <td><input type="submit" value="DELETE" name="delete"/></td></tr>
	   </table>
	   
	   
	</form>
	<a href="index.php">Go To Home</a>
</div>

	
</body>
</html>