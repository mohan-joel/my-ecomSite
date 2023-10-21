<?php 
if(!isset($_SESSION['username'])){
		header("location: login.php");
	}
	if(isset($_POST['insert_brands'])){
		$brand_name = $con->real_escape_string($_POST['brand_name']);
		$brand_select_query = "select * from brands_tb where brand_name='$brand_name'";
		$brand_select_result = mysqli_query($con,$brand_select_query);
		$brands_num = mysqli_num_rows($brand_select_result);
		if($brands_num > 0){
			echo "<script>alert('This brand is already inserted'); </script>";
		}else{
			$brand_insert_query = "insert into brands_tb (brand_name) values ('$brand_name')";
			$brand_insert_result = mysqli_query($con,$brand_insert_query);
			if($brand_insert_result){
				echo "<script>alert('Brand Inserted Successfully');</script>";
			}
		}
	}
?>
<div class="container">
	<div class="row">
		<div class="col-md-12 input_box">
		<form method="post" action="" class="form-group">
			<h3 class="text-center">Insert Brands</h3>
			<input type="text" name="brand_name" class="form-control" id="brand_name" placeholder="Enter Brand's Name">

			<input type="submit" name="insert_brands" class="form-control bg-dark btn_brand" value="Insert" >
		</form>
	</div>
	</div>
</div>