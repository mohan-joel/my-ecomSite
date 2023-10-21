<?php 
include('includes/header.php');
if(!isset($_SESSION['username'])){
    header("location:../index.php");
}


 ?>

 <!-- fourth child -->
<div class="row">
	<div class="col-md-2 bg-secondary p-0">
		<ul class="navbar-nav me-auto text-center">
			<!-- Brands to be displayed -->
			<li class="nav-item bg-info">
				<a href="#" class="nav-link text-light"><h4>Your Profile</h4></a>
			</li>
			<li class="nav-item bg-info profile">
				<img src="../images/user_images/<?=$_SESSION['photo'];?>" style="height: 100px;">
			</li>
			<li class="nav-item bg-secondary profile">
				<a href="#" class="text-light">Pending Orders</a>
			</li>
			<li class="nav-item bg-secondary profile">
				<a href="profile.php?user_edit_account" class="text-light" >Edit Account</a>
			</li>
			<li class="nav-item bg-secondary profile">
				<a href="profile.php?my_orders" class="text-light">My Orders</a>
			</li>
			<li class="nav-item bg-secondary profile">
				<a href="profile.php?user_delete_account" class="text-light">Delete Account</a>
			</li>
			<li class="nav-item bg-secondary profile">
				<a href="#" class="text-light">Logout</a>
			</li>
		</ul>
	</div>
	<div class="col-md-10">
		<!-- showing products -->
		<div class="row">
			<?php
				if(isset($_GET['user_edit_account'])){
					include('user_edit_account.php');
				}

				if(isset($_GET['user_delete_account'])){
					include('user_delete_account.php');
				}

				if(isset($_GET['my_orders'])){
					include('display_user_order.php');
				}
			 ?>
		</div>
	</div>
	
</div>


<?php include('includes/footer.php'); ?>