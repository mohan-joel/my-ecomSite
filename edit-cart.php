<?php include('includes/header.php'); ?>
 <?php 
 	if(isset($_POST['update'])){
 		if(isset($_GET['id'])){
 			$id=$_GET['id'];
 			$get_ip = getIPAddress();
 			$qty = safe_value($con,$_POST['quantity']);
 			$total_price = safe_value($con,$_POST['total_price']);
 			$update_query = "update carts_tb set quantity='$qty',total_price='$total_price' where product_id='$id' and ip_address='$get_ip'";
 			$update_result = mysqli_query($con,$update_query);
 			if($update_result){
 				echo "<script>alert('Cart updated Successfully');</script>";
 				echo "<script>window.open('display_cart_items.php','_self');</script>";
 			} 
 		}
 	}
 ?>

 <!-- fourth child -->
<div class="container">
	<div class="row">
		<div class="col-md-4"></div>
		<div class="col-md-4">
			<?php 
				if(isset($_GET['id'])){
					$prod_id = $_GET['id'];
					$select_prod = "select product_price from products_tb where product_id='$prod_id'";
					$prod_result = mysqli_query($con,$select_prod);
					while($prod = mysqli_fetch_assoc($prod_result)){
						$product_price = $prod['product_price'];
					}
					$select_cart = "select * from carts_tb where product_id='$prod_id'";
					$cart_res = mysqli_query($con,$select_cart);
					while($cart = mysqli_fetch_assoc($cart_res)){
						$qty = $cart['quantity'];
						
					}
				}
			?>
			<form action="" method="post" class="form-group">
				<u><h2 class="text-center">Change the Quantity</h2></u>
				<label>Quantity</label>
				<input type="text" name="quantity" id="quantity" class="form-control" value="<?=$qty?>">
				<label>Product Price</label>
				<input type="text" name="product_price" id="product_price" class="form-control" value="<?=$product_price?>">
				<label>Total Amount</label>
				<input type="text" name="total_price" id="total_price" class="form-control">
				<input type="submit" name="update" value="Update" class="btn btn-info">
			</form>
		</div>
		<div class="col-md-4"></div>
		
	</div>
</div>


<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
	$(document).ready(function(){
		$("#quantity").keyup(function(){
			var quantity = $("#quantity").val();
			var product_price = $("#product_price").val();
			var total_price = quantity*product_price;
			$("#total_price").val(total_price);
		});
	});
</script>

<?php include('includes/footer.php'); ?>


