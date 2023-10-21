<?php 
require("../config/connection.php");
require("../functions.php");

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width initial-scale=1.0">
	<title>E-commerce Website</title>
	<!-- bootstrap css link -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<!-- font-awesome css link -->
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
<div class="container-fluid p-0">
	<!-- first child -->
	<nav class="navbar navbar-expand-lg navbar-light bg-info">
	  <div class="container-fluid">
	    <img src="../images/logo.png" height="5%" width="5%">
	    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	      <span class="navbar-toggler-icon"></span>
	    </button>
	    <div class="collapse navbar-collapse" id="navbarSupportedContent">
	      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
	        <li class="nav-item">
	          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
	        </li>
	        <li class="nav-item">
	          <a class="nav-link active" aria-current="page" href="#">Products</a>
	        </li>
	        <?php if(isset($_SESSION['username'])): ?>
	        	<li class="nav-item">
		          <a class="nav-link active" aria-current="page" href="profile.php">My Account</a>
		        </li>
	        <?php  else: ?>
	        	<li class="nav-item">
		          <a class="nav-link active" aria-current="page" href="register.php">Register</a>
		        </li>
	    <?php endif; ?>
	        <li class="nav-item">
	          <a class="nav-link active" aria-current="page" href="#">Contact</a>
	        </li>
	        <li class="nav-item">
	        	<?php 
	        		display_cart_num();
	          ?>
	        </li>
	        <li class="nav-item">
	          <a class="nav-link active" aria-current="page" href="#">Total Price: <?php getCartAmount(); ?>/-</a>
	        </li>
	      </ul>
	      <form class="d-flex"  action="../search_product.php" method="get">
	        <input class="form-control me-2" type="search" placeholder="Search" name="search_data">
	        <input type="submit" name="search_data_product" class="btn btn-outline-light" value="Search">
	      </form>
	    </div>
	  </div>
	</nav>

	<!-- second child -->
<nav class="navbar navbar-dark  navbar-expand-lg bg-secondary">
   <ul class="navbar-nav ">
   	<?php 
   		if(isset($_SESSION['username'])){
   	  echo "<li class='nav-item'>
   	  	<a href='profile.php' class='nav-link text-white'>Welcome {$_SESSION['fullname']}</a>
   	  </li><li class='nav-item'>
   	  	<a href='logout.php' class='nav-link text-danger'>Logout</a>
   	  </li>
   	  </li><li class='nav-item'>
   	  	<a href='#' class='nav-link text-dark'>Pending Orders</a>
   	  </li>
   	  </li><li class='nav-item'>
   	  	<a href='#' class='nav-link text-info'>Edit Account</a>
   	  </li>
   	  </li><li class='nav-item'>
   	  	<a href='#' class='nav-link text-warning'>My Orders</a>
   	  </li>
   	  </li><li class='nav-item'>
   	  	<a href='#' class='nav-link text-light'>Delete My Account</a>
   	  </li>
   	  ";
   	  }else{
   	  echo"<li class='nav-item'>
   	  	<a href='#' class='nav-link'>Login</a>
   	  </li>";
   	  }
   	  ?>
   </ul>
</nav>

<!-- third child -->
 <div class="bg-light">
 	<h3 class="text-center">Hidden Store</h3>
 	<p class="text-center">Communication is the heart of e-commerce and community</p>
 </div>
