<?php 
session_start();
if(!$_SESSION['admin_username']){
	echo "<script>window.open('admin_login.php','_self')</script>";
}

?>
<?php 

if(isset($_GET['edit_category'])){
	$cat_id = $_GET['edit_category'];

	$select_category = "SELECT * FROM categories WHERE cat_id = {$cat_id}";
	$result = mysqli_query($conn,$select_category) or die('query not exists');
	$row = mysqli_fetch_assoc($result);
	$product_name = $row['cat_name'];
}


?>


<div class="container mt-5">
	<h2 class="text-center text-success">Edit Category</h2>
	<form action="" method="post">
			<!-- product title -->
			<div class="form-outline mb-3 w-50 m-auto">
				<label for="category_title" class="from-label">Category Title</label>
				<input type="text" id="category_title" class="form-control" name="category_title" autocomplete="off" required value="<?= $product_name; ?>">
			</div>
			<div class="from-outline w-50 m-auto">
				<input type="submit" value="Update Category" name="update_category" class="btn btn-info">
			</div>
		</form>
	</div>

<?php 

if(isset($_POST['update_category'])){

	$cat_title = $_POST['category_title'];

	$update_sql = "UPDATE categories SET cat_name = '{$cat_title}' WHERE cat_id = {$cat_id}";
	$update_result = mysqli_query($conn,$update_sql) or die('query not exists');

	if($update_result){
		echo "<script>alert('Category Name Update Successfully')</script>";
		echo "<script>window.open('index.php?view_category','_self')</script>";
	}
}

?>