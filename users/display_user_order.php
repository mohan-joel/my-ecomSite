

<div class="card mt-3 ">
	<h3 class="text-center">My Order Details</h3>
	<table class="table table-striped bg-success">
	<thead>
		<tr>
			<th>S.No</th>
			<th>Amount</th>
			<th>Invoice Number</th>
			<th>Total Products</th>
			<th>Order Date</th>
			<th>Complete/Incomplete</th>
			<th>Status</th>
		</tr>
	</thead>
	<tbody>
		<?php
			$id= $_SESSION['id'];
			$select_query = "select * from orders_tb where user_id='$id'";
			$select_result = mysqli_query($con,$select_query);
			while($order = mysqli_fetch_assoc($select_result)){
				
		 ?>
		<tr>
			<td>S.No</td>
			<td><?=$order['amount_due']?></td>
			<td><?=$order['invoice_number']?></td>
			<td><?=$order['total_products']?></td>
			<td><?=$order['order_date']?></td>
			<td>
				<?php 
					if($order['order_status']==1){
						echo "Complete";
					}else{
						echo "Incomplete";
					}
				?>
			</td>
			<td>Confirm</td>
		</tr>
		<?php } ?>
	</tbody>
</table>
</div>