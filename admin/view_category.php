<?php 
@session_start();
if(!$_SESSION['admin_username']){
	echo "<script>window.open('admin_login.php','_self')</script>";
}
?>



<h2 class="text-center text-success mt-2">All Categories</h2>
<table class="table table-bordered text-center mb-5">
	<thead>
		<tr>
			<th>SI NO</th>
			<th>Category Name</th>
			<th>Edit</th>
			<th>Delete</th>
		</tr>
	</thead>
	<tbody>
		<?php 
			$select_categroy = "SELECT * FROM categories";
			$select_query = mysqli_query($conn,$select_categroy) or die('query not exists');
			$serial = 0;
			while($row = mysqli_fetch_assoc($select_query)){
				$category_id = $row['cat_id'];
				$category_title = $row['cat_name'];
				$serial++;
		?>
		<tr>
			<td><?= $serial; ?></td>
			<td><?= $category_title; ?></td>
			<td><a href='index.php?edit_category=<?= $category_id; ?>'><i class='fa fa-pencil' aria-hidden='true'></i></a></td>
			<td><a href='index.php?delete_category=<?= $category_id; ?>'><i class='fa fa-trash' aria-hidden='true'></i></a></td>
		</tr>
	<?php }?>
	</tbody>
</table>
