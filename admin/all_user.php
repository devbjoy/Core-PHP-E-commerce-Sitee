
<?php 
@session_start();
if(!$_SESSION['admin_username']){
	echo "<script>window.open('admin_login.php','_self')</script>";
}

?>




<h2 class="text-center text-success">All Users</h2>
<table class="table table-bordered text-center mt-5">
	<thead>
		<?php 
			$select_sql = "SELECT * FROM user";
			$select_query = mysqli_query($conn,$select_sql) or die('query not exists');
			$result = mysqli_num_rows($select_query);
			if($result > 0){

		?>
		<tr>
			<th>SI NO</th>	
			<th>Username</th>
			<th>User Email</th>
			<th>User Image</th>
			<th>User Address</th>
			<th>User Mobile</th>
			<th>Delete</th>
		</tr>
	</thead>
	<tbody>
		<?php 
		$serial = 0;
			while ($row = mysqli_fetch_assoc($select_query)) {
			  $serial++;  
			  $user_id = $row['user_id'];
			  $user_img = $row['user_image'];
		?>
		<tr>
			<td><?= $serial; ?></td>
			<td><?= $row['username']; ?></td>
			<td><?= $row['user_email']; ?></td>
			<td><img src="../user_area/user_images/<?= $user_img; ?>" alt="" class="edit_img"></td>
			<td><?= $row['user_address']; ?></td>
			<td><?= $row['user_mobile']; ?></td>
			<td><a href='index.php?delete_user=<?= $user_id; ?>'><i class='fa fa-trash' aria-hidden='true'></i></a></td>
		</tr>
	<?php 
		}
	}else {
		echo "<h2 class='text-center text-danger'>No order are avaliable</h2>";
	}


	?>
	</tbody>
</table>


