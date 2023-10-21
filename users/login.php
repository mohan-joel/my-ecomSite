<?php 
	require("../config/connection.php");
	require("../functions.php");
	if(isset($_POST['login'])){
		$username = safe_value($con,$_POST['username']);
		$password = safe_value($con,$_POST['password']);
		$user_pass = md5($password);
		if($username=='' or $user_pass==''){
			echo "<script>alert('Please give value of all fields')</script>";
			echo "<script>window.open('login.php','_self')</script>";
		}else{
      //carts selection
      $get_ip = getIPAddress();
      $cart_query= "select * from carts_tb where ip_address='$get_ip'";
      $cart_result = mysqli_query($con,$cart_query);
      $cart_num = mysqli_num_rows($cart_result);

      //users selection
			$sql="select * from users_tb where username='$username' and password='$user_pass'";
			$result = mysqli_query($con,$sql);
			$users_num = mysqli_num_rows($result);
			
			if($users_num > 0){
				$row = $result->fetch_assoc();
        $_SESSION['id'] = $row['user_id'];
        $_SESSION['fullname'] = $row['fullname'];
				$_SESSION['username'] = $row['username'];
        $_SESSION['gender']=$row['gender'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['address']=$row['address'];
        $_SESSION['contact'] = $row['contact'];
        $_SESSION['photo']=$row['photo'];
				$_SESSION['password'] = $row['password'];
        if($users_num==1 && $cart_num==0){
          echo "<script>alert('User Logged In')</script>";
          echo "<script>window.open('profile.php','_self')</script>";
        }else{
          echo "<script>alert('User Logged In')</script>";
          echo "<script>window.open('payment.php','_self')</script>";
        }
			}
		}
	}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>E-ComSite -LOGIN</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <style>
  	body{
  		overflow-x: hidden;
  	}
  </style>
</head>
<body>
  <h1 class="text-center">User Login Page</h1>
<div class="container">
  <div class="row">
    <div class="col-md-3"></div>
      <div class="col-md-6">
        <form action="" method="POST">
          <div class="form-group">  
            <label for="email">Username:</label> 
            <input type="text" class="form-control" name="username" placeholder="Enter Username" >
          </div>
          <div class="form-group">  
            <label for="password">Password:</label> 
            <input type="password" class="form-control" name="password" placeholder="Enter Password">
          </div>
          <div class="form-group">
            <p>Not registered yet ?<a href="register.php"> Register here</a></p>
            <input type="submit" name="login" class="btn btn-success" value="Login"> 
          </div>
        </form>
      </div>
  </div>
</div>
</body>
</html>