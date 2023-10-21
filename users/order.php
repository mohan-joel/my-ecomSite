<?php 
	include('../config/connection.php');
	include('../functions.php');
	if(!isset($_SESSION['username'])){
		header("location: login.php");
	}


	if(isset($_GET['user_id'])){
		$get_ip = getIPAddress();
		$amount_due = 0;
		$invoice_number = mt_rand();
		$user_id = $_SESSION['id'];
		$cart_query = "select * from carts_tb where ip_address='$get_ip'";
		$cart_result = mysqli_query($con,$cart_query);
		$num_products = mysqli_num_rows($cart_result);
		$total_products = $num_products;
		while($row = mysqli_fetch_array($cart_result)){
			$total_price = array($row['total_price']);
			$total_price_val = array_sum($total_price);
			$amount_due+=$total_price_val;
		}
		// echo $amount_due .",". $user_id .",". $invoice_number .",". $total_products;
		$order_query = "insert into orders_tb (user_id,amount_due,invoice_number,total_products,order_date,order_status,notification_status) values ('$user_id','$amount_due','$invoice_number','$total_products',NOW(),0,0)";
		$order_result = mysqli_query($con,$order_query);
		if($order_result){
			echo "<script>alert('Order done!!!');</script>";
			echo "<script>window.open('profile.php','_self');</script>";
		}

		// insert into pending table
		$insert_pending = "insert into orders_pending_tb (user_id,invoice_number,order_status) values ('$user_id','$invoice_number','pending')";
		$pending_result = mysqli_query($con,$insert_pending);
		

		//delete from carts table
	$delete_cart = "delete from carts_tb where ip_address='$get_ip'";
	$delete_cart_res = mysqli_query($con,$delete_cart);
	}



?>