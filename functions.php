<?php 

	function safe_value($con, $input){
		return mysqli_real_escape_string($con,$input);
	}


	function getProducts()
	{
		global $con;
		if(isset($_SESSION['username'])){
			if(!isset($_GET['category']))
		{
			if(!isset($_GET['brand']))
			{
				$products_query = "select * from products_tb order by rand() limit 6";
				$products_result = mysqli_query($con,$products_query);
				while($product = mysqli_fetch_assoc($products_result)){
				$product_id = $product['product_id'];
				$product_title = $product['product_title'];
				$product_description = $product['product_description'];
				$product_image1 = $product['product_image1'];
				$category_id = $product['category_id'];
				$brand_id = $product['brand_id'];
				$product_price = $product['product_price'];
				echo "<div class='col-md-4 mb-2'>
						<div class='card'>
						  <img src='../images/product_images/$product_image1' class='card-img-top' alt='jeans' height='5%' width='5%'>
						  <div class='card-body'>
						    <h5 class='card-title'>$product_title</h5>
						    <p class='card-text'>$product_description</p>
						    <p>Price: Rs.$product_price</p>
						    <a href='index.php?cart=$product_id' class='btn btn-info'>Add to Cart</a>
						    <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
						  </div>
						</div>
					</div>";
				}
			}
		}
	}else{
		if(!isset($_GET['category']))
		{
			if(!isset($_GET['brand']))
			{
				$products_query = "select * from products_tb order by rand() limit 6";
				$products_result = mysqli_query($con,$products_query);
				while($product = mysqli_fetch_assoc($products_result)){
				$product_id = $product['product_id'];
				$product_title = $product['product_title'];
				$product_description = $product['product_description'];
				$product_image1 = $product['product_image1'];
				$category_id = $product['category_id'];
				$brand_id = $product['brand_id'];
				$product_price = $product['product_price'];
				echo "<div class='col-md-4 mb-2'>
						<div class='card'>
						  <img src='images/product_images/$product_image1' class='card-img-top' alt='jeans' height='5%' width='5%'>
						  <div class='card-body'>
						    <h5 class='card-title'>$product_title</h5>
						    <p class='card-text'>$product_description</p>
						    <p>Price: Rs.$product_price</p>
						    <a href='index.php?cart=$product_id' class='btn btn-info'>Add to Cart</a>
						    <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
						  </div>
						</div>
					</div>";
				}
			}
		}
	}
	}


	function getUniqueCategories()
	{
		global $con;
		if(isset($_GET['category']))
		{
				$category_id = $_GET['category'];
				$products_query = "select * from products_tb where category_id='$category_id'";
				$category_result = mysqli_query($con,$products_query);
				$category_num = mysqli_num_rows($category_result);
				if($category_num > 0){
					while($product = mysqli_fetch_assoc($products_result)){
					$product_id = $product['product_id'];
					$product_title = $product['product_title'];
					$product_description = $product['product_description'];
					$product_image1 = $product['product_image1'];
					$category_id = $product['category_id'];
					$brand_id = $product['brand_id'];
					$product_price = $product['product_price'];
					echo "<div class='col-md-4 mb-2'>
							<div class='card'>
							  <img src='images/product_images/$product_image1' class='card-img-top' alt='jeans' height='5%' width='5%'>
							  <div class='card-body'>
							    <h5 class='card-title'>$product_title</h5>
							    <p class='card-text'>$product_description</p>
							    <p>Price: Rs.$product_price</p>
							    <a href='index.php?cart=$product_id' class='btn btn-info'>Add to Cart</a>
							   <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
							  </div>
							</div>
						</div>";
					}
				}else{
					echo "<div class='text-center' style='color:red;font-size:50px;'>No Cateogory's Items Found</div>";
				}
			}
		}



		function search_product()
	{
				global $con;
				if(isset($_GET['search_data_product'])){
				$search_data_value = $_GET['search_data'];
				$search_query = "select * from products_tb where product_keywords like '%$search_data_value%'";
				$products_result = mysqli_query($con,$search_query);
				while($product = mysqli_fetch_assoc($products_result)){
				$product_id = $product['product_id'];
				$product_title = $product['product_title'];
				$product_description = $product['product_description'];
				$product_image1 = $product['product_image1'];
				$category_id = $product['category_id'];
				$brand_id = $product['brand_id'];
				$product_price = $product['product_price'];
				echo "<div class='col-md-4 mb-2'>
						<div class='card'>
						  <img src='images/product_images/$product_image1' class='card-img-top' alt='jeans' height='5%' width='5%'>
						  <div class='card-body'>
						    <h5 class='card-title'>$product_title</h5>
						    <p class='card-text'>$product_description</p>
						    <p>Price: Rs.$product_price</p>
						    <a href='index.php?cart=$product_id' class='btn btn-info'>Add to Cart</a>
						    <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
						  </div>
						</div>
					</div>";
					}
				}
			}


	function getUniqueBrands()
	{
		global $con;
		if(isset($_GET['brand']))
		{
				$brand_id = $_GET['brand'];
				$products_query = "select * from products_tb where brand_id='$brand_id'";
				$products_result = mysqli_query($con,$products_query);
				$brand_num = mysqli_num_rows($products_result);
				if($brand_num > 0)
				{
					while($product = mysqli_fetch_assoc($products_result)){
					$product_id = $product['product_id'];
					$product_title = $product['product_title'];
					$product_description = $product['product_description'];
					$product_image1 = $product['product_image1'];
					$category_id = $product['category_id'];
					$brand_id = $product['brand_id'];
					$product_price = $product['product_price'];
					echo "<div class='col-md-4 mb-2'>
							<div class='card'>
							  <img src='images/product_images/$product_image1' class='card-img-top' alt='jeans' height='5%' width='5%'>
							  <div class='card-body'>
							    <h5 class='card-title'>$product_title</h5>
							    <p class='card-text'>$product_description</p>
							    <p>Price: Rs.$product_price</p>
							    <a href='index.php?cart=$product_id' class='btn btn-info'>Add to Cart</a>
							    <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
							  </div>
							</div>
						</div>";
					}
				}else{
					echo "<div class='text-center' style='color:red;font-size:50px;'>No Brand's Items Found</div>";
				}
			}
		}


	function getCategories()
	{
		global $con;
		$category_query = "select * from categories_tb order by category_name";
		$category_result = mysqli_query($con, $category_query);
		while($category = mysqli_fetch_assoc($category_result)){
		$category_id = $category['category_id'];
		$category_name = $category['category_name'];
		echo "<li class='nav-item'>
			<a href='index.php?category=$category_id' class='nav-link text-light'>$category_name</a>
			</li>";
		} 
	}

	function getBrands()
	{
		global $con;
		$query = "select * from brands_tb order by brand_name";
		$result = mysqli_query($con,$query);
		while($brands = mysqli_fetch_assoc($result)){
		$brand_id = $brands['brand_id'];
		$brand_name = $brands['brand_name'];
		echo "<li class='nav-item'>
		<a href='index.php?brand=$brand_id' class='nav-link text-light'>$brand_name</a>
		</li>";
		} 
	}

	function getProductDetails()
	{
		global $con;
		$id = $_GET['product_id'];
			$detail_query = "select * from products_tb where product_id='$id'";
			$detail_result = mysqli_query($con,$detail_query);
			while($detail = mysqli_fetch_assoc($detail_result)){
				$product_id = $detail['product_id'];
				$product_title = $detail['product_title'];
				$product_description = $detail['product_description'];
				$product_price = $detail['product_price'];
				$product_image1 = $detail['product_image1'];
				$product_image2 = $detail['product_image2'];
				$product_image3 = $detail['product_image3'];
			echo"<div class='col-md-4'>
				<div class='card'>
						  <img src='images/product_images/$product_image1' class='card-img-top' alt='jeans' height='5%' width='5%'>
						  <div class='card-body'>
						    <h5 class='card-title'>$product_title</h5>
						    <p class='card-text'>$product_description</p>
						    <p>Price: Rs.$product_price</p>
						    <a href='index.php?cart=$product_id' class='btn btn-info'>Add to Cart</a>
						    <a href='index.php' class='btn btn-secondary'>Go Home</a>
						  </div>
						</div>
			</div>
			<div class='col-md-8'>
				<div class='row'>
					<div class='col-md-12'>
						<h5 class='text-center text-danger'>Product Details</h5>
					</div>
					<div class='col-md-4'>
						<img src='images/product_images/$product_image2' class='card-img-top' alt='jeans' height='5%' width='5%'>
					</div>
					<div class='col-md-4'>
						<img src='images/product_images/$product_image3' class='card-img-top' alt='jeans' height='5%' width='5%'>
					</div>
				</div>
			</div>";
			}
	}


	function getIPAddress() {  
	    //whether ip is from the share internet  
	     if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
	                $ip = $_SERVER['HTTP_CLIENT_IP'];  
	        }  
	    //whether ip is from the proxy  
	    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
	                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
	     }  
	//whether ip is from the remote address  
	    else{  
	             $ip = $_SERVER['REMOTE_ADDR'];  
	     }  
	     return $ip;  
	}  

	function cart_details()
	{
		global $con;
		if(isset($_GET['cart'])){
			$id = $_GET['cart'];
			$price_select = "select product_price from products_tb where product_id='$id'";
			$price_res = mysqli_query($con,$price_select);
			while($price = mysqli_fetch_assoc($price_res)){
				$product_price = $price['product_price'];
			}
			$get_ip = getIPAddress();
			$cart_query = "select * from carts_tb where ip_address='$get_ip' and  product_id='$id' ";
			$cart_result = mysqli_query($con,$cart_query);
			$cart_num = mysqli_num_rows($cart_result);
			if($cart_num > 0){
				echo "<script>alert('This product is already in cart.');</script>";
				echo "<script>window.open('index.php','_self');</script>";
			}else{
				$cart_insert= "insert into carts_tb (product_id,ip_address,quantity,total_price) values ('$id','$get_ip',1,$product_price)";
				$cart_insert_result = mysqli_query($con,$cart_insert);
				if($cart_insert_result){
					echo "<script>alert('Product inserted into cart');</script>";
					echo "<script>window.open('index.php','_self');</script>";
				}else{
					echo "<script>alert('Unable to insert');</script>";
					echo "<script>window.open('index.php','_self');</script>";
				}
			}
		}
	}

	function display_cart_num()
	{
		global $con;
		$num_cart_query = "select * from carts_tb";
	    $num_cart_res = mysqli_query($con,$num_cart_query);
	    $cart_num = mysqli_num_rows($num_cart_res);

	    echo "<a class='nav-link active' aria-current='page' href='display_cart_items.php'><i class='fa-solid fa-cart-shopping'><sup>$cart_num</sup></i></a>";
	}

	function getCartAmount()
	{
			global $con;
			$get_ip = getIPAddress();
			$total_amt = 0;
			$cart_query = "select * from carts_tb where ip_address ='$get_ip'";
			$cart_res = mysqli_query($con,$cart_query);
			while($row = mysqli_fetch_assoc($cart_res)){
				$product_id = $row['product_id'];
				$price_query = "select * from products_tb where product_id='$product_id'";
				$price_res = mysqli_query($con,$price_query);
				while($product_price_row = mysqli_fetch_array($price_res)){
					$product_price = array($product_price_row['product_price']);
					$product_value = array_sum($product_price);
					$total_amt += $product_value;
				}
			}
			echo $total_amt;
	}

	function payableAmount()
	{
		global $con;
		$payableAmount = 0;
		$get_ip = getIPAddress();
		$query_cart = "select * from carts_tb where ip_address='$get_ip'";
		$result_cart = mysqli_query($con,$query_cart);
		while($cart = mysqli_fetch_array($result_cart)){
			$total_price = array($cart['total_price']);
			$total_price_value = array_sum($total_price);
			$payableAmount+=$total_price_value;
		}
		echo $payableAmount;
	}

	
	

?>