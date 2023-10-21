<?php 
include('includes/header.php');
if(isset($_SESSION['username'])){
	header("location: users/profile.php");
}

?>
 <!-- fourth child -->
<div class="row">
	<div class="col-md-10">
		<!-- showing products -->
		<div class="row">
			<?php 
				getProducts();
				cart_details();
				getUniqueCategories();
				getUniqueBrands();
				
				
			?>
		</div>
	</div>
	<div class="col-md-2 bg-secondary p-0">
		<ul class="navbar-nav me-auto text-center">
			<!-- Brands to be displayed -->
			<li class="nav-item bg-info">
				<a href="#" class="nav-link text-light"><h4>Delivery Brands</h4></a>
			</li>
			<?php 
				getBrands();

			 ?>
			<!-- categories to be displayed -->
			<li class="nav-item bg-info">
				<a href="#" class="nav-link text-light"><h4>Categories</h4></a>
			</li>
			<?php 
				getCategories();
		?>
		</ul>
	</div>
</div>


<?php include('includes/footer.php'); ?>