<?php 
if(!isset($_SESSION['username'])){
		header("location: login.php");
	}
 	require('../functions.php');
	if(isset($_POST['insert_categories'])){
		$category_name = safe_value($con,$_POST['category_name']);
		$select_query = "select * from categories_tb where category_name='$category_name'";
		$select_result = mysqli_query($con,$select_query);
		$num_rows = mysqli_num_rows($select_result);
		if($num_rows > 0){
			echo "<script>alert('This category is already inserted.')</script>";
		}else{
			$query = "insert into categories_tb (category_name) values ('$category_name')";
			$result = mysqli_query($con,$query);
			if($result){
				echo "<script>alert('Category inserted Successfully');</script>";
			}else{
				echo "<script>alert('Unable to insert category');</script>";
			}
		}
		
	}
?>

<div class="input_box">
	<form method="post" action="" class="form-group">
		<h3 class="text-center">Insert Categories</h3>
		<input type="text" name="category_name" class="form-control" id="category_name" placeholder="Enter Category's Name">

		<input type="submit" name="insert_categories" class="form-control bg-dark btn_brand" value="Insert" >
	</form>
</div>