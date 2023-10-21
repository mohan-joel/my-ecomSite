<?php

 include('includes/header.php'); 


 ?>

 <!-- fourth child -->
<div class="row">
	<div class="col-md-12">
		<!-- showing products -->
		<div class="row">
			<?php 
				if(!isset($_SESSION['username'])){
					echo "<script>window.open('login.php','_self');</script>";
				}else{
					echo "<script>window.open('payment.php','_self');</script>";
				}
			?>
		</div>
	</div>
</div>


<?php include('includes/footer.php'); ?>