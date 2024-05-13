<?php 
@session_start();
if(!$_SESSION['admin_username']){
	echo "<script>window.open('admin_login.php','_self')</script>";
}
?>



<h2 class="text-center text-success mt-2">All Brands</h2>
<table class="table table-bordered text-center mb-5">
	<thead>
		<tr>
			<th>SI NO</th>
			<th>Brands Name</th>
			<th>Edit</th>
			<th>Delete</th>
		</tr>
	</thead>
	<tbody>
		<?php 
			$select_brand = "SELECT * FROM brands";
			$select_query = mysqli_query($conn,$select_brand) or die('query not exists');
			$serial = 0;
			while($row = mysqli_fetch_assoc($select_query)){
				$brand_id = $row['brand_id'];
				$brand_title = $row['brand_name'];
				$serial++;
		?>
		<tr>
			<td><?= $serial; ?></td>
			<td><?= $brand_title; ?></td>
			<td><a href='index.php?edit_brand=<?= $brand_id; ?>'><i class='fa fa-pencil' aria-hidden='true'></i></a></td>
			<td><a href='index.php?delete_brand=<?= $brand_id; ?>'><i class='fa fa-trash' aria-hidden='true'></i></a></td>
		</tr>
	<?php }?>
	</tbody>
</table>