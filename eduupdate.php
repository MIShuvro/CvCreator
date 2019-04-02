<?php
include('session.php');
if(!isset($_SESSION['login_user'])){
header("location: index.php"); 
}
$conn = mysqli_connect("localhost", "root", "", "data_storage");
$query = "SELECT * from sign_up where username = '$user_check'";
$ses_sql = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($ses_sql);
$getMyID= $row['id'];
   if(isset($_POST['update'])){
	   $eduid = $getMyID;
	 $schoolname= $_POST['school'];
	$passing_year = $_POST['year'];
	$gpa = $_POST['gpa'];
	   $query = "UPDATE edu_table SET
	     	inst_name='$schoolname',
	        passing_year='$passing_year',
	        gpa='$gpa'
		 WHERE id=$getMyID";
       $update = mysqli_query($conn,$query);
	   if($update){
		   header('Location:education.php');
	   }
       
   }
   
  if(isset($_POST['delete'])){
	  $query = "DELETE FROM edu_table WHERE id=$getMyID";
	  $delete = mysqli_query($conn,$query);
	  if($delete){
		 header('location: education.php'); 
	  }
  }




$university = "SELECT * from edu_table where id = '$getMyID'";
$university_query =mysqli_query($conn,$university);
$read_university = mysqli_fetch_assoc($university_query);


?>

<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>Education Page</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<style>
.edu_info{
		 
		 width: 400px;
    margin: 50px auto;
    border: 2px solid;
    background: tomato;
    padding: 30px 15px 30px 15px;
		 
	 }
	 td{
		 color: #ddd;
    font-weight: bold;
    font-size: 22px;
	 }
</style>
</head>
<body>
  	<div class="edu_info">
<h1>Education Information</h1>
	
 
   
		<table>
	  <form action="eduupdate.php?id=<?php echo $getMyID;?>" method="POST">
	      <label>Institute Name: <input type="text" name="school" value="<?php echo $read_university['inst_name'];?>"/></label> <br /><br />
	      <label>Passing Year: <input type="date" name="year" value="<?php echo $read_university['passing_year'];?>"/></label><br /><br />
	      <label>GPA: <input type="text" name="gpa" value="<?php echo $read_university['gpa'];?>"/></label><br /><br />
	      <input type="submit" name="update" value="Update"/>
	      <input type="submit" name="delete" value="delete"/>
		  
	  </form>
	  </table>
	</div>
 
    
	 
  
 
	
</body>
</html>