<?php
 include('includes/header.php'); 

if(!isset($_SESSION['username'])){
	header("location:../index.php");
}


 ?>

 <!-- fourth child -->
<div class="container">
	<div class="row">
	<form action="deleteCartItem.php" method="post">
		<?php 
			$select_cart = "select * from carts_tb";
			$select_result = mysqli_query($con,$select_cart);
			$num_cart = mysqli_num_rows($select_result);
			if($num_cart == 0){
				echo "<div style='height:600px; width:600px; padding:100px; margin-left:200px;'><h3 class='text-center text-danger'>No Items in Cart</h3></div>";
			}else{
		?>
			<table class="table table-striped text-center">
				<thead>
					<tr>
						<th>Product Title</th>
						<th>Product Image</th>
						<th>Quantity</th>
						<th>Product Price</th>
						<th>Total Price</th>
						<th><button type="submit" class="btn btn-danger btn-sm" name="deleteMultipleBtn">Delete Selected Item</button></th>
						<th>Update Individual Item</th>
					</tr>
				</thead>
				<tbody>
					<?php 
						while($cart = mysqli_fetch_assoc($select_result)){
							$qty = $cart['quantity'];
							$id = $cart['product_id'];
							$product_query = "select * from products_tb where product_id='$id'";
							$product_result = mysqli_query($con,$product_query);
							while($prod = mysqli_fetch_assoc($product_result)){
								$prod_title = $prod['product_title'];
								$prod_image1 = $prod['product_image1'];
								$prod_price = $prod['product_price'];
					?>
					<tr>
						<td><?=$prod_title?></td>
						<td><img src="../images/product_images/<?=$prod_image1?>" height="80px" width="80px"></td>
						<td><?=$qty?></td>
						 <td><?=$prod_price?></td>
						 <td><?=$qty*$prod_price?></td>
						 <td><input type="checkbox" name="deleteMultipleCheck[]" value="<?=$id?>"></td>
						<td><a href="edit-cart.php?id=<?=$id?>" class="btn btn-success">Update</a></td>
					</tr>
					<?php 
								}
							}
						}
					?>
				</tbody>
			</table>
			<div class="d-flex">
				<h5 class="text-dark">Payable Amount:<strong><?php payableAmount() ?>/-</strong></h5>
				<a href="index.php" class="btn btn-info px-3 mx-4">Continue Shopping</a><a href="checkout.php" class="btn btn-secondary px-3 ">Checkout</a>
			</div>
	</div>
	</form>
</div>


<?php include('includes/footer.php'); ?>