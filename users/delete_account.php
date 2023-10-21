<?php 
	include('../config/connection.php');
	$id = $_SESSION['id'];
	$delete_query = "delete from users_tb where user_id='$id'";
	$delete_result = mysqli_query($con,$delete_query);
	session_destroy();
	session_unset();
	echo "<script>alert('Account Deleted Successfully');</script>";
	echo "<script>window.open('/index.php','_self');</script>";

?>