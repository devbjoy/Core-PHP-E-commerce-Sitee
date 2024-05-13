<?php 
session_start();
if(!$_SESSION['admin_username']){
	echo "<script>window.open('admin_login.php','_self')</script>";
}
?>

<?php

include "../config/config.php";

if(isset($_POST['update_product'])){
	$product_id 				 = $_POST['product_id'];
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

		$sql = "UPDATE products SET product_title = '{$product_title}',product_description = '{$product_description}',product_keyword = '{$product_keyword}',	category_id = {$category},brand_id = {$brands}, product_image1 = '{$product_image1}',product_image2 = '{$product_image2}',product_image3 = '{$product_image3}',product_price = '{$product_price}',date = NOW(),status = 'true' WHERE product_id = {$product_id}";

		$query = mysqli_query($conn,$sql) or die('query not exists');
		if($query){
			echo "<script>alert('Date updated successfully')</script>";
			echo "<script>window.open('index.php?view_product','_self')</script>";
		}
	}
}


?>