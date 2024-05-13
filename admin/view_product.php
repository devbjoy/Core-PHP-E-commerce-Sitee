<?php 
@session_start();
if(!$_SESSION['admin_username']){
	echo "<script>window.open('admin_login.php','_self')</script>";
}
?>

<div class="container">
<h2 class="text-center text-success">All Product</h2>
<table class="table table-bordered my-5">
	<thead class="bg-info text-light text-center">
		<tr>
			<th>SI NO</th>
			<th>Product Title</th>
			<th>Product Image</th>
			<th>Product Price</th>
			<th>Total Sold</th>
			<th>Status</th>
			<th>Edit</th>
			<th>Delete</th>
		</tr>
	</thead>
	<tbody class="bg-secondary text-light text-center">
		<?php 
			$select_product = "SELECT * FROM products";
			$result = mysqli_query($conn,$select_product);
			$number = 0;
			while ($row = mysqli_fetch_assoc($result)) {
					$number++;
			    $product_id = $row['product_id'];
			    $product_title = $row['product_title'];
			    $product_image1 = $row['product_image1'];
			    $product_price = $row['product_price'];
			    $status = $row['status'];
		?>
		<tr class='text-center'>
					<td><?= $number ;?></td>
					<td><?= $product_title; ?></td>
					<td><img src='product_images/<?= $product_image1; ?>' alt='' class='view_img'></td>
					<td><?= $product_price; ?></td>
					<td>
					<?php 
						$count_sql = "SELECT * FROM order_pending_table WHERE product_id = $product_id";
						$count_query = mysqli_query($conn,$count_sql);
						$count = mysqli_num_rows($count_query);
						echo $count;
					?>
					</td>
					<td><?= $status; ?></td>
					<td><a href='index.php?edit_product=<?= $product_id; ?>'><i class='fa fa-pencil' aria-hidden='true'></i></a></td>
					<td><a href='index.php?delete_product=<?= $product_id; ?>'><i class='fa fa-trash' aria-hidden='true'></i></a></td>
				</tr>"
				<?php 
					}
				?>
	</tbody>

</table>
</div>

