<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width initial-scale=1.0">
	<title>Admin Dashboard</title>
	<!-- bootstrap css link -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<!-- font-awesome css link -->
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="../css/sidebar.css">
</head>
<body>
<div class="header">
	<ul>
		 <li style="float: right;list-style-type: none; padding: 0;margin:0;"><a href="logout.php" class="btn btn-light mt-2 mx-2">Logout</a></li>
	</ul>
</div>
<input type="checkbox" name="" id="openSidebarMenu">
<label for="openSidebarMenu" class="sidebarIconToggle">
	<div class="spinner top"></div>
	<div class="spinner middle"></div>
	<div class="spinner bottom"></div>
</label>
<div id="sidebarMenu">
	<ul class="menu">
	  <li><a href="index.php?insert_products">Insert Products</a></li>	
	  <li><a href="#">View Products</a></li>	
	  <li><a href="index.php?insert_categories">Insert Categories</a></li>	
	  <li><a href="insertCategories.php">View Categories</a></li>	
	  <li><a href="index.php?insert_brands">Insert Brands</a></li>
	  <li><a href="">View Brands</a></li>
	  <li><a href="#">All orders</a></li>
	  <li><a href="#">All payments</a></li>
	  <li><a href="#">List Users</a></li>
	</ul>
</div>
<div class="main">