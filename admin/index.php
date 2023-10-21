<?php 
include('../config/connection.php');
include('include/header.php'); 
	if(!isset($_SESSION['username'])){
		header("location: login.php");
	}
 ?>
<div class="container my-5">
	<?php 
		if(isset($_GET['insert_brands'])){
			include('insert_brands.php');
		}

		if(isset($_GET['insert_categories'])){
			include('insert_categories.php');
		}

		if(isset($_GET['insert_products'])){
			include('insert_products.php');
		}
	?>
</div>

<?php include('include/footer.php');?>