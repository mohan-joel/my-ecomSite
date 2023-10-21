<?php 
  include('../config/connection.php');
  include('../functions.php');
  if(isset($_POST['register'])){
      $fullname = safe_value($con,$_POST['fullname']);
      $username = safe_value($con,$_POST['username']);
      $gender = safe_value($con,$_POST['gender']);
      $email = safe_value($con,$_POST['email']);
      $address = safe_value($con,$_POST['address']);
      $contact = safe_value($con,$_POST['contact']);
      $role = safe_value($con,$_POST['role']);
      $password = safe_value($con,$_POST['password']);
      $user_pass = md5($password);
      $c_pass = safe_value($con,$_POST['c_pass']);
      $ip_address = getIPAddress();
      $photo = $_FILES['photo']['name'];
      $temp_photo = $_FILES['photo']['tmp_name'];
      move_uploaded_file($temp_photo, "../images/user_images/".$photo);
      if($fullname=='' or $username=='' or $gender=='' or $email=='' or $address=='' or $contact=='' or $role=='' or $user_pass=='' or $c_pass=='' or $photo==''){
        echo"<script>alert('Please insert all given fields');</script>";
      }else{
        //check whether username exists or not
        $query = "select * from users_tb where username='$username'";
        $result = mysqli_query($con,$query);
        $num_row = mysqli_num_rows($result);
        if($num_row > 0){
          echo "<script>alert('User already exists');</script>";
          echo "<script>window.open('register.php','_self');</script>";
        }else{
          //insert users
        $insert_query = "insert into users_tb (fullname,username,gender,email,address,contact,role,ip_address,password,photo) values ('$fullname','$username','$gender','$email','$address','$contact','$role','$ip_address','$user_pass','$photo')";
        $insert_res = mysqli_query($con,$insert_query);
        if($insert_res){
          echo "<script>alert('Users Inserted Successfully');</script>";
          echo "<script>window.open('login.php','_self');</script>";
        }
        }
        
      }
      

  }

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>E-ComSite -SIGNUP</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  
</head>
<body>
  <h1 class="text-center">User Registration Page</h1>
<div class="container">
  <div class="row">
    <div class="col-md-3"></div>
      <div class="col-md-6">      
        <form action="" method="POST" enctype="multipart/form-data">
          <div class="form-group">
            <label for="fullname">Full Name:</label>
            <input type="text" class="form-control" name="fullname" placeholder="Enter Full Name" id="fullname">
          </div>
          <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" class="form-control" name="username" placeholder="Enter Username" id="username">
            <span id="userExistMsg"></span>
          </div>
          <div class="form-group">  
            <label for="gender">Gender:</label>
            <select class="form-control" name="gender">
              <option value="">Select Gender</option>
              <option value="male">Male</option>
              <option value="female">Female</option>
            </select>
          </div>
          <div class="form-group">  
            <label for="email">Email:</label>
            <input type="email" class="form-control" name="email" placeholder="Enter Email" >
          </div>
          <div class="form-group">  
            <label for="address">Address:</label>
            <input type="text" class="form-control" name="address" placeholder="Enter Address" >
          </div>
          <div class="form-group">  
            <label for="contact">Contact No.:</label>
            <input type="text" class="form-control" name="contact" placeholder="Enter Contact No." >
          </div>
          <div class="form-group">  
            <label for="role">Role:</label>
            <select class="form-control" name="role">
              <option value="user">User</option>
            </select>
          </div>
          <div class="form-group">  
            <label for="password">Password:</label>
            <input type="password" class="form-control" name="password" id="password" placeholder="Enter Password" >
          </div>
          <div class="form-group">  
            <label for="c_pass">Confirm Password:</label>
            <input type="password" class="form-control" name="c_pass" id="c_pass" placeholder="ReType Password" >
            <span id="confirmMsg"></span>
          </div>
          <div class="form-group">  
            <label for="photo">User's Photo:</label>
            <input type="file" class="form-control" name="photo" >
          </div>
          <div class="form-group">
            <p>Already have account ?<a href="login.php"> Login</a></p>
            <input type="submit" name="register" class="btn btn-primary" value="Register">
          </div>
        </form>
      </div>
  </div>
</div>

<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
  $(document).ready(function(){
    //check password and confirm password match or not
   $("#c_pass").keyup(function(){
      var password = $("#password").val();
      var c_pass = $("#c_pass").val();
      if(password == c_pass){
          $("#confirmMsg").html("Password and Confirm Password Matched").css("color","green");
      }else{
        $("#confirmMsg").html("Password and Confirm Password are not matching").css("color","red");
      }
    });

  //check whether username exists in database or not
   $("#username").keyup(function(){
      var username = $("#username").val();
      // alert(username);
      $.ajax({
        url:"user_exists.php",
        type:"post",
        data:{username:username},
        success:function(data){
          if(data ==1){
              $("#userExistMsg").html("User already exists. You can't insert this user.").css("color","red");
          }else{
              $("#userExistMsg").html("Ok!!! Fine, you can insert this user").css("color","green");
          }
        }
      });
    });
  });
</script>
</body>
</html>