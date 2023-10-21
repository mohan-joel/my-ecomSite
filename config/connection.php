<?php 
	session_start();
	$con = mysqli_connect('localhost','root','','ecomsite_db');
	if(!$con){
		die(mysqli_error($con));
	}

?>