<?php


session_start();
if(session_destroy()) 
{
header("Location: index.php?msg=".urldecode("Logged out successfully")); 
}
?>
 <?php 
    if(isset($_GET['msg'])){
		echo "<span id='success'>".$_GET['msg']."</span>";
	}
 ?>