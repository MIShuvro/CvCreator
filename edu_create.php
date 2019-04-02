<?php
include('session.php');
if(!isset($_SESSION['login_user'])){
header("location: index.php"); 
}
$dbconn = mysqli_connect('localhost','root','','data_storage');
$query = "SELECT * from sign_up where username = '$user_check'";
$ses_sql = mysqli_query($dbconn, $query);
$row = mysqli_fetch_assoc($ses_sql);
$getMyID= $row['id'];

   
   if(isset($_POST['ssc'])){
	   
	   $edu_year = mysqli_real_escape_string($dbconn,$_POST['date']);
	   $edu_inst = mysqli_real_escape_string($dbconn,$_POST['school']);
	   $edu_gpa = mysqli_real_escape_string($dbconn,$_POST['gpa']);
	   
	   $query = "INSERT INTO ssc(school_name,school_year,school_gpa,id) Values ('$edu_inst','$edu_year','$edu_gpa','$getMyID') ";
	   $exquery = mysqli_query($dbconn,$query);
	   if($exquery){
		   header("location:education.php");
	   }
       mysqli_close($dbconn);
   }
   else if(isset($_POST['hsc'])){
	   
	   $edu_year = mysqli_real_escape_string($dbconn,$_POST['date']);
	   $edu_inst = mysqli_real_escape_string($dbconn,$_POST['school']);
	   $edu_gpa = mysqli_real_escape_string($dbconn,$_POST['gpa']);
	   
	   $query = "INSERT INTO hsc(college_name,passing_year,college_gpa,id) Values ('$edu_inst','$edu_year','$edu_gpa','$getMyID') ";
	   $exquery = mysqli_query($dbconn,$query);
	   if($exquery){
		   header("location:education.php");
	   }
       mysqli_close($dbconn);
   }
   else if(isset($_POST['bsc'])){
	   
	   $edu_year = mysqli_real_escape_string($dbconn,$_POST['date']);
	   $edu_inst = mysqli_real_escape_string($dbconn,$_POST['school']);
	   $edu_gpa = mysqli_real_escape_string($dbconn,$_POST['gpa']);
	   
	   $query = "INSERT INTO university(uni_name,passing_year,uni_gpa,id) Values ('$edu_inst','$edu_year','$edu_gpa','$getMyID') ";
	   $exquery = mysqli_query($dbconn,$query);
	   if($exquery){
		   header("location:education.php");
	   }
       mysqli_close($dbconn);
   }
?>

<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>Add Education</title>
	<link rel="stylesheet" href="edu.css" />
</head>
<body>

<!-- Tab links -->
<div class="tab">
  <button class="tablinks" onclick="openCity(event, 'London')">SSC</button>
  <button class="tablinks" onclick="openCity(event, 'Paris')">HSC</button>
  <button class="tablinks" onclick="openCity(event, 'Tokyo')">BSC</button>
</div>

<!-- Tab content -->
<div id="London" class="tabcontent">
  <h3>SSC</h3>
  
	<form action="educreate.php" method="POST">
	    <label>School Name: <input type="text" name="school" /></label><br /><br />
	    <label>Passing Year: <input type="date" name="date" /></label><br /><br />
	    <label>Obtained GPA: <input type="text" name="gpa" /></label><br /><br />
		<input type="submit" value="Submit" name="ssc" />
	</form>
</div>

<div id="Paris" class="tabcontent">
  <h3>HSC</h3>
  <form action="edu_create.php" method="POST">
	    <label>College Name: <input type="text" name="school" /></label><br /><br />
	    <label>Passing Year: <input type="date" name="date" /></label><br /><br />
	    <label>Obtained GPA: <input type="text" name="gpa" /></label><br /><br />
		<input type="submit" value="Submit" name="hsc" />
	</form>
</div>

<div id="Tokyo" class="tabcontent">
  <h3>BSC</h3>
  <form action="edu_create.php" method="POST">
	    <label>University Name: <input type="text" name="school" /></label><br /><br />
	    <label>Passing Year: <input type="date" name="date" /></label><br /><br />
	    <label>Obtained GPA: <input type="text" name="gpa" /></label><br /><br />
		<input type="submit" value="Submit" name="bsc" />
	</form>
</div>

<a href="education.php">Back</a>


	<script src="./JS/edu.js"></script>
</body>
</html>