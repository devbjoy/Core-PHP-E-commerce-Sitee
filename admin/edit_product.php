
<?php 
session_start();
if(!$_SESSION['admin_username']){
	echo "<script>window.open('admin_login.php','_self')</script>";
}

?>
<?php 
if(isset($_GET['edit_product'])){
	$pid = $_GET['edit_product'];

	$select_product = "SELECT * FROM products WHERE product_id = $pid";
	$select_query = mysqli_query($conn,$select_product);
	$select_result = mysqli_fetch_assoc($select_query);

}


?>
<div class="container mt-5">
	<h2 class="text-center text-success">Edit Product</h2>
	<form action="update_product.php" method="post" enctype="multipart/form-data">
			<!-- product title -->
			<div class="form-outline mb-3 w-50 m-auto">
				<label for="product_title" class="from-label">Product Title</label>
				<input type="text" id="product_title" class="form-control" name="product_title" autocomplete="off" required value="<?= $select_result['product_title']; ?>">
				<input type="hidden" name="product_id" required value="<?= $pid; ?>">
			</div>
			<!-- product description -->
			<div class="form-outline mb-3 w-50 m-auto">
				<label for="product_description" class="from-label">Product Description</label>
				<input type="text" id="product_description" class="form-control" name="product_description"autocomplete="off" required value="<?= $select_result['product_description']; ?>">
			</div>
			<!-- product keyword -->
			<div class="form-outline mb-3 w-50 m-auto">
				<label for="product_keyword" class="from-label">Product keyword</label>
				<input type="text" id="product_keyword" class="form-control" name="product_keyword" autocomplete="off" required value="<?= $select_result['product_keyword']; ?>">
			</div>
			<!-- categories -->
			<div class="form-outline mb-3 w-50 m-auto">
				<label for="category" class="from_label">Select Categories</label>
				<select name="category" id="category" class="form-select">
					<option value="" disabled selected>Select One Category</option>
			<?php 
		  	$category_select = "SELECT * FROM categories";
		  	$category_query = mysqli_query($conn,$category_select);
		  	while ($category_row = mysqli_fetch_assoc($category_query)) {
		  		$category_name = $category_row['cat_name'];
		  		$category_id = $category_row['cat_id'];
		  		if($select_result['category_id'] == 	$category_id){
						$select = "selected";
					}else{
						$select = "";
					}
		  	   echo "<option {$select} value='$category_id'>$category_name</option>";
		  	}

		  ?>
				</select>
			</div>
			<!-- brands -->
			<div class="form-outline mb-3 w-50 m-auto">
				<label for="brands" class="from_label">Select Brands</label>
				<select name="brands" id="brands" class="form-select">
					<option disabled selected>Select One Brands</option>
					<?php 
		  	$brand_select = "SELECT * FROM brands";
		  	$brand_query = mysqli_query($conn,$brand_select);
		  	while ($brand_row = mysqli_fetch_assoc($brand_query)) {
		  		$brand_name = $brand_row['brand_name'];
		  		$brand_id = $brand_row['brand_id'];
		  		if($select_result['brand_id'] == $brand_row['brand_id']){
						$select = "selected";
					}else{
						$select = "";
					}
		  	    echo "<option {$select} value='$brand_id'>$brand_name</option>";
		  	}

		  ?>
				</select>
			</div>
			<!-- product Image1 -->
			<div class="form-outline mb-3 w-50 m-auto">
				<label for="product_image1" class="from-label">Fast Image</label>
				<div class="d-flex">
					<input type="file" id="product_image1" class="form-control" name="product_image1" autocomplete="off" required>
					<img src="./product_images/<?= $select_result['product_image1']; ?>" alt="" class="edit_img">
				</div>
			</div>
			<!-- product Image2 -->
			<div class="form-outline mb-3 w-50 m-auto">
				<label for="product_image2" class="from-label">Second Image</label>
				<div class="d-flex">
					<input type="file" id="product_image2" class="form-control" name="product_image2" autocomplete="off" required>
					<img src="./product_images/<?= $select_result['product_image2']; ?>" alt="" class="edit_img">
				</div>		
			</div>
				<!-- product Image3 -->
			<div class="form-outline mb-3 w-50 m-auto">
				<label for="product_image3" class="from-label">Third Image</label>
				<div class="d-flex">
					<input type="file" id="product_image3" class="form-control" name="product_image3" autocomplete="off" required>
					<img src="./product_images/<?= $select_result['product_image3']; ?>" alt="" class="edit_img">
				</div>		
			</div>
				<!-- product Price -->
			<div class="form-outline mb-3 w-50 m-auto">
				<label for="product_price" class="from-label">Product Price</label>
				<input type="text" id="product_price" class="form-control" name="product_price" autocomplete="off" required value="<?= $select_result['product_price']; ?>">
			</div>
				<!-- product button -->
			<div class="form-outline mb-3 w-50 m-auto">
				<input type="submit" class="btn btn-info my-3 px-2" name="update_product" value="Update Product">
			</div>
		</form>
</div>
