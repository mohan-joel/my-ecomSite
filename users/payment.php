<?php

 include('includes/header.php'); 
 include('paymentSetting.php');
if(!isset($_SESSION['username'])){
	header("location:../index.php");
}

$uid = $_SESSION['id'];
 ?>
 <!-- fourth child -->
<div class="row">
	<div class="col-md-12">
		<!-- showing products -->
		<div class="row">
			<div class="col-md-12"><h2 class="text-center">Payment Page</h2></div>
		</div>
		<div class="row  my-5">
			<div class="col-md-12">
				<h6 class="text-center">Click to Select Your Payment Method</h6>
				<div class="text-center">
					<a href="#" class="btn btn-success">E-sewa</a>
					<a href="#" class="btn btn-secondary">Khalti</a>
					<a href="#" class="btn btn-danger">E-dhewa</a>
					<a href="#" class="btn btn-primary">IME-Pay</a>
					<a href="#" class="btn btn-warning">Mobile Banking</a>
					<a href="order.php?user_id=<?=$uid?>" class="btn btn-danger">Offline</a>
				</div>
			</div>
		</div>
	</div>
</div>


<?php include('includes/footer.php'); ?>