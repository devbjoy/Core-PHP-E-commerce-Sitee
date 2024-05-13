
<?php 
@session_start();
if(!$_SESSION['admin_username']){
	echo "<script>window.open('admin_login.php','_self')</script>";
}

?>
<h2 class="text-center text-success">All Order</h2>
<table class="table table-bordered text-center mt-5">
	<thead>
		<?php 
			$select_sql = "SELECT * FROM order_table";
			$select_query = mysqli_query($conn,$select_sql) or die('query not exists');
			$result = mysqli_num_rows($select_query);
			if($result > 0){

		?>
		<tr>
			<th>SI NO</th>
			<th>Amount Due</th>
			<th>Invoice Number</th>
			<th>Total Product</th>
			<th>Order Date</th>
			<th>Status</th>
			<th>Delete</th>
		</tr>
	</thead>
	<tbody>
		<?php 
		$serial = 0;
			while ($row = mysqli_fetch_assoc($select_query)) {
			  $serial++;  
			  $order_id = $row['order_id'];
		?>
		<tr>
			<td><?= $serial; ?></td>
			<td><?= $row['amount_due']; ?></td>
			<td><?= $row['invoies_number']; ?></td>
			<td><?= $row['total_product']; ?></td>
			<td><?= $row['order_date']; ?></td>
			<td><?= $row['order_status']; ?></td>
			<td><a href='index.php?delete_order=<?= $order_id; ?>'><i class='fa fa-trash' aria-hidden='true'></i></a></td>
		</tr>
	<?php 
		}
	}else {
		echo "<h2 class='text-center text-danger'>No order are avaliable</h2>";
	}


	?>
	</tbody>
</table>


