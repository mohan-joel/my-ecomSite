<?php 
	include('../config/connection.php');
	$username = $_POST['username'];
	$query = "select * from users_tb where username='$username'";
	$result = mysqli_query($con,$query);
	$num_row = mysqli_num_rows($result);
	if($num_row > 0){
		echo 1;
	}else{
		echo 0;
	}

?>