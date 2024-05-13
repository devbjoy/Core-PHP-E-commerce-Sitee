<?php 
include "../config/config.php";
session_start();
if(!$_SESSION['admin_username']){
	echo "<script>window.open('admin_login.php','_self')</script>";
}
?>
<?php 
if(isset($_POST['insert_product'])){

	$product_title 			 = $_POST['product_title'];
	$product_description = $_POST['product_description'];
	$product_keyword 		 = $_POST['product_keyword'];
	$category 					 = $_POST['category'];
	$brands 						 = $_POST['brands'];
	$product_price 			 = $_POST['product_price'];

	// images
	$product_image1 			 = $_FILES['product_image1']['name'];
	$product_image2 			 = $_FILES['product_image2']['name'];
	$product_image3 			 = $_FILES['product_image3']['name'];

	// images tmp name
	
	$product_tmp_image1 			 = $_FILES['product_image1']['tmp_name'];
	$product_tmp_image2 			 = $_FILES['product_image2']['tmp_name'];
	$product_tmp_image3 			 = $_FILES['product_image3']['tmp_name'];

	if($product_title=='' || $product_description=='' || $product_keyword=='' || $category=='' || $brands=='' || $product_price=='' || $product_image1=='' || $product_image2=='' || $product_image3==''){
		echo "<script>alert('Please fill the all input')</script>";
	}else {
		
		move_uploaded_file($product_tmp_image1, "./product_images/$product_image1");
		move_uploaded_file($product_tmp_image2, "./product_images/$product_image2");
		move_uploaded_file($product_tmp_image3, "./product_images/$product_image3");

		$sql = "INSERT INTO products(product_title,product_description,product_keyword,category_id,brand_id,product_image1,product_image2,product_image3,product_price,date,status) VALUES ('$product_title','$product_description','$product_keyword',$category,$brands,'$product_image1','$product_image2','$product_image3','$product_price',NOW(),'true')";

		$query = mysqli_query($conn,$sql);
		if($query){
			echo "<script>alert('Data Uploaded successfully')</script>";
			echo "<script>window.open('index.php?view_product','_self')</script>";
		}
	}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Insert product</title>
		<!-- cdn link -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>
	<!-- bootstrap css link -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
	<!-- custom css link -->
	<link rel="stylesheet" href="./style.css" type="text/css">
</head>
<body class="bg-light">
	<div class="container my-3">
		<h2 class="text-center">Inserted Product</h2>
		<!-- form -->
		<form action="" method="post" enctype="multipart/form-data">
			<!-- product title -->
			<div class="form-outline mb-3 w-50 m-auto">
				<label for="product_title" class="from-label">Product Title</label>
				<input type="text" id="product_title" class="form-control" name="product_title" placeholder="Enter Porduct Title" autocomplete="off" required>
			</div>
			<!-- product description -->
			<div class="form-outline mb-3 w-50 m-auto">
				<label for="product_description" class="from-label">Product Description</label>
				<input type="text" id="product_description" class="form-control" name="product_description" placeholder="Enter Porduct Description" autocomplete="off" required>
			</div>
			<!-- product keyword -->
			<div class="form-outline mb-3 w-50 m-auto">
				<label for="product_keyword" class="from-label">Product keyword</label>
				<input type="text" id="product_keyword" class="form-control" name="product_keyword" placeholder="Enter Porduct keyword" autocomplete="off" required>
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
		  	   echo "<option value='$category_id'>$category_name</option>";
		  	}

		  ?>
					
					<!-- <option value="">category1</option>
					<option value="">category1</option>
					<option value="">category1</option>
					<option value="">category1</option> -->
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
		  	    echo "<option value='$brand_id'>$brand_name</option>";
		  	}

		  ?>
				
					<!-- <option value="">brand1</option>
					<option value="">brand1</option>
					<option value="">brand1</option>
					<option value="">brand1</option> -->
				</select>
			</div>
			<!-- product Image1 -->
			<div class="form-outline mb-3 w-50 m-auto">
				<label for="product_image1" class="from-label">Fast Image</label>
				<input type="file" id="product_image1" class="form-control" name="product_image1" placeholder="Enter Image" autocomplete="off" required>
			</div>
			<!-- product Image2 -->
			<div class="form-outline mb-3 w-50 m-auto">
				<label for="product_image2" class="from-label">Second Image</label>
				<input type="file" id="product_image2" class="form-control" name="product_image2" placeholder="Enter Image" autocomplete="off" required>
			</div>
				<!-- product Image3 -->
			<div class="form-outline mb-3 w-50 m-auto">
				<label for="product_image3" class="from-label">Third Image</label>
				<input type="file" id="product_image3" class="form-control" name="product_image3" placeholder="Enter Image" autocomplete="off" required>
			</div>
				<!-- product Price -->
			<div class="form-outline mb-3 w-50 m-auto">
				<label for="product_price" class="from-label">Product Price</label>
				<input type="text" id="product_price" class="form-control" name="product_price" placeholder="Enter Product Price" autocomplete="off" required>
			</div>
				<!-- product button -->
			<div class="form-outline mb-3 w-50 m-auto">
				<input type="submit" class="btn btn-info my-3 px-2" name="insert_product" value="Insert Product">
			</div>
		</form>
	</div>
</body>
</html>