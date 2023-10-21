<?php 
require("../config/connection.php");

	if(isset($_POST['deleteMultipleBtn']))
		{
			$all_id = $_POST['deleteMultipleCheck'];
			$extract_id = implode(',',$all_id);
			$delete_query = "delete from carts_tb where product_id IN ($extract_id)";
			$delete_result = mysqli_query($con,$delete_query);
			if($delete_result){
				echo "<script>alert('Cart deleted Successfully');</script>";
				echo "<script>window.open('display_cart_items.php','_self');</script>";
			}else{
				echo "<script>alert('Unable to delete cart');</script>";
				echo "<script>window.open('display_cart_items.php','_self');</script>";
			}
		}

?>