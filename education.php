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





$university = "SELECT * from edu_table where id = '$getMyID'";
$university_query =mysqli_query($conn,$university);
$read_university = mysqli_fetch_assoc($university_query);

if(isset($_POST['submit'])){
	$eduid = $getMyID;
	 $schoolname= $_POST['school'];
	$passing_year = $_POST['year'];
	$gpa = $_POST['gpa'];
	$insert = "INSERT INTO edu_table(id,inst_name,passing_year,gpa) VALUES('$eduid','$schoolname','$passing_year','$gpa')";
	$ex = mysqli_query($conn,$insert);
	if($insert){
		header("location:education.php");
	}
}
?>

<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>Education Page</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<style>
	body{
		body {
        background: #f48e36b0;
        margin: 0;
        padding: 0;
    }
	}
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
	
  <?php if(mysqli_num_rows($university_query)<1){?>
     	<div class="eduinfo">
		<h1>No Education Info Is Here</h1>
	  <form action="education.php" method="POST">
	      <label>Institute Name: <input type="text" name="school" /></label> <br /><br />
	      <label>Passing Year: <input type="date" name="year" /></label><br /><br />
	      <label>GPA: <input type="text" name="gpa" /></label><br /><br />
	      <input type="submit" name="submit" value="Add"/>
		  
	  </form>
	</div>
  <?php }else {?>
     <table>
	    <tr> <td>School Name:<?php echo $read_university['inst_name'];?></td> </tr>
	    <tr> <td>Passing Year:<?php echo $read_university['passing_year'];?></td> </tr>
	    <tr> <td>GPA:<?php echo $read_university['gpa'];?></td> </tr>
		<tr><td><a href="eduupdate.php?id=<?php echo $getMyID;?>">Update</a></td></tr>
	 </table>
	 
  
  <?php }?>
	<a href="dashboard.php">Back To Home</a>
	
	</div>
</body>
</html>