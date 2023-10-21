<?php 
	require("../config/connection.php");
	require("../functions.php");
	if(isset($_POST['login'])){
		$username = safe_value($con,$_POST['username']);
    $role = safe_value($con,$_POST['role']);
		$password = safe_value($con,$_POST['password']);
    $user_pass = md5($password);
		// $user_pass = password_hash($password, PASSWORD_DEFAULT);
		if($username=='' or $role=='' or $user_pass==''){
			echo "<script>alert('Please give value of all fields')</script>";
			echo "<script>window.open('login.php','_self')</script>";
		}else{
     
      //users selection
			$sql="select * from users_tb where username='$username' and role='$role' and password='$user_pass'";
			$result = mysqli_query($con,$sql);
			$users_num = mysqli_num_rows($result);
			
			if($users_num > 0){
				$row = $result->fetch_assoc();
        $_SESSION['fullname'] = $row['fullname'];
				$_SESSION['username'] = $row['username'];
        $_SESSION['gender']=$row['gender'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['address']=$row['address'];
        $_SESSION['contact'] = $row['contact'];
        $_SESSION['photo']=$row['photo'];
				$_SESSION['password'] = $row['password'];
        if($role == "admin"){
          echo "<script>alert('Admin logged in successfully');</script>";
          echo "<script>window.open('index.php','_self');</script>";
        }else{
           echo "<script>alert('User logged in successfully');</script>";
          echo "<script>window.open('users/profile.php','_self');</script>";
        }
			}
		}
	}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>E-ComSite -Admin LOGIN</title>
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
  <h1 class="text-center">Admin Login Page</h1>
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
            <label for="role">Role:</label>
            <select class="form-control" name="role">
              <option value="">--Select Role--</option>
              <option value="admin">Admin</option>
              <option value="user">User</option>
            </select>
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