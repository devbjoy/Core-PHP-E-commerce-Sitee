<?php 
session_start();
if(!$_SESSION['admin_username']){
	echo "<script>window.open('admin_login.php','_self')</script>";
}

?>


<?php 

if(isset($_GET['edit_brand'])){
	$brand_id = $_GET['edit_brand'];

	$select_brands = "SELECT * FROM brands WHERE brand_id = {$brand_id}";
	$result = mysqli_query($conn,$select_brands) or die('query not exists');
	$row = mysqli_fetch_assoc($result);
	$product_name = $row['brand_name'];
}


?>


<div class="container mt-5">
	<h2 class="text-center text-success">Edit Brands</h2>
	<form action="" method="post">
			<!-- product title -->
			<div class="form-outline mb-3 w-50 m-auto">
				<label for="brand_title" class="from-label">Brand Title</label>
				<input type="text" id="brand_title" class="form-control" name="brand_title" autocomplete="off" required value="<?= $product_name; ?>">
			</div>
			<div class="from-outline w-50 m-auto">
				<input type="submit" value="Update Brand" name="update_brand" class="btn btn-info">
			</div>
		</form>
	</div>

<?php 

if(isset($_POST['update_brand'])){

	$brand_name = $_POST['brand_title'];

	$update_sql = "UPDATE brands SET brand_name = '{$brand_name}' WHERE brand_id = {$brand_id}";
	$update_result = mysqli_query($conn,$update_sql) or die('query not exists');

	if($update_result){
		echo "<script>alert('Brands Name Update Successfully')</script>";
		echo "<script>window.open('index.php?view_brands','_self')</script>";
	}
}