<?php 
	
	$user_query = "select * from users_tb";
	$user_result = mysqli_query($con,$user_query);
	while($user = mysqli_fetch_assoc($user_result)){
		$username = $user['username'];
		$fullname = $user['fullname'];
		$email = $user['email'];
		$address = $user['address'];
		$contact = $user['contact'];
		$photo = $user['photo'];
	}

		if(isset($_POST['update'])){
			$uid=$_SESSION['id'];
			$username = $_POST['username'];
			$fullname = $_POST['fullname'];
			$email = $_POST['email'];
			$address = $_POST['address'];
			$contact = $_POST['mobile'];
			$image = $_FILES['image']['name'];
			$temp_name = $_FILES['image']['tmp_name'];
			move_uploaded_file($temp_name, "../images/user_images/".$image);
			$update_query = "update users_tb set fullname='$fullname', username ='$username', email='$email', address='$address', contact='$contact', photo='$image' where user_id='$uid'";
			$update_result = mysqli_query($con,$update_query);
			if($update_result){
				echo "<script>alert('User Detail Updated Succcessfully');</script>";
				
			}else{
				echo "<script>alert('Unable to update user's detail');</script>";
			}
		}
 ?>

<h3 class="text-center text-success">Edit Account</h3>
<form action="" method="post" enctype="multipart/form-data" class="text-center">
	<div class="form-outline mb-4">
		<input type="text" name="username" value="<?=$username?>" class="form-control w-50 m-auto">
	</div>
	<div class="form-outline mb-4">
		<input type="text" name="fullname" value="<?=$fullname?>" class="form-control w-50 m-auto">
	</div>
	<div class="form-outline mb-4"> 
		<input type="text" name="email" value="<?=$email?>" class="form-control w-50 m-auto">
	</div>
	<div class="form-outline mb-4 d-flex w-50 m-auto">
		<input type="file"  name="image"  class="form-control">
		<img src="../images/user_images/<?=$photo?>" height="100px" width="100px">
	</div>
	<div class="form-outline mb-4">
		<input type="text" name="address" value="<?=$address?>" class="form-control w-50 m-auto">
	</div>
	<div class="form-outline mb-4">
		<input type="text" name="mobile" value="<?=$contact?>" class="form-control w-50 m-auto">
	</div>
	<input type="submit" name="update" value="Update" class="bg-info py-2 px-3 border-0">
</form>