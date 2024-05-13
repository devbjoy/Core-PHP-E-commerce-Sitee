<?php 

// include "./config/config.php";
?>

<?php 

// getting products

function getProducts(){
	global $conn;

	if(!isset($_GET['category'])){
	if(!isset($_GET['brand'])){
	$sql = "SELECT * FROM products ORDER BY rand() LIMIT 0,9";
	$query = mysqli_query($conn,$sql);
	while($row = mysqli_fetch_assoc($query)){
	$product_title = $row['product_title'];
	$product_description = substr($row['product_description'],0, 100);
	$product_price = $row['product_price'];
	$product_id = $row['product_id'];
	$product_image = $row['product_image1'];
	$category_id = $row['category_id'];
	$brand_id = $row['brand_id'];

		echo "<div class='col-md-4 col-sm-12 mb-2'>
			<div class='card'>
  				<img src='./admin/product_images/$product_image' class='card-img-top' alt='$product_title'>
				  <div class='card-body'>
				    <h5 class='card-title text-capitalize'>$product_title</h5>
				    <p class='card-text'>$product_description</p>
				    <p>Price: $product_price/-</p>
				    <a href='index.php?prod_id=$product_id' class='btn btn-info'>Add to Cart</a>
				    <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
				  </div>
			</div>
		</div>";
	}
}
}
}

// getting all product

function getAllProduct(){
	global $conn;

	if(!isset($_GET['category'])){
	if(!isset($_GET['brand'])){
	$sql = "SELECT * FROM products ORDER BY rand()";
	$query = mysqli_query($conn,$sql);
	while($row = mysqli_fetch_assoc($query)){
	$product_title = $row['product_title'];
	$product_description = substr($row['product_description'],0, 100);
	$product_price = $row['product_price'];
	$product_id = $row['product_id'];
	$product_image = $row['product_image1'];
	$category_id = $row['category_id'];
	$brand_id = $row['brand_id'];

		echo "<div class='col-md-4 col-sm-12 mb-2'>
			<div class='card'>
  				<img src='./admin/product_images/$product_image' class='card-img-top' alt='$product_title'>
				  <div class='card-body'>
				    <h5 class='card-title text-capitalize'>$product_title</h5>
				    <p class='card-text'>$product_description</p>
				    <p>Price: $product_price/-</p>
				    <a href='index.php?cart_id=$product_id' class='btn btn-info'>Add to Cart</a>
				    <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
				  </div>
			</div>
		</div>";
	}
}
}
}

// getting unique categories product

function get_uniqe_category_product(){
	global $conn;

	if(isset($_GET['category'])){
	$category_id = $_GET['category'];
	$sql = "SELECT * FROM products WHERE category_id = $category_id";
	$query = mysqli_query($conn,$sql);
	$number = mysqli_num_rows($query);
	if($number>0){
	while($row = mysqli_fetch_assoc($query)){
	$product_title = $row['product_title'];
	$product_description = substr($row['product_description'],0, 100);
	$product_price = $row['product_price'];
	$product_id = $row['product_id'];
	$product_image = $row['product_image1'];
	$category_id = $row['category_id'];
	$brand_id = $row['brand_id'];

		echo "<div class='col-md-4 col-sm-12 mb-2'>
			<div class='card'>
  				<img src='./admin/product_images/$product_image' class='card-img-top' alt='$product_title'>
				  <div class='card-body'>
				    <h5 class='card-title text-capitalize'>$product_title</h5>
				    <p class='card-text'>$product_description</p>
				    <p>Price: $product_price/-</p>
				    <a href='index.php?cart_id=$product_id' class='btn btn-info'>Add to Cart</a>
				    <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
				  </div>
			</div>
		</div>";
	}
}else {
	echo "<h2 class='text-center text-danger'>This categories item is not Available<h2>";
}
}
}

// getting unique brands product

function get_uniqe_brands_product(){
	global $conn;

	if(isset($_GET['brand'])){
	$brand_id = $_GET['brand'];
	$sql = "SELECT * FROM products WHERE brand_id = $brand_id";
	$query = mysqli_query($conn,$sql);
	$number = mysqli_num_rows($query);
	if($number>0){
	while($row = mysqli_fetch_assoc($query)){
	$product_title = $row['product_title'];
	$product_description = substr($row['product_description'],0, 100);
	$product_price = $row['product_price'];
	$product_id = $row['product_id'];
	$product_image = $row['product_image1'];
	$category_id = $row['category_id'];
	$brand_id = $row['brand_id'];

		echo "<div class='col-md-4 col-sm-12 mb-2'>
			<div class='card'>
  				<img src='./admin/product_images/$product_image' class='card-img-top' alt='$product_title'>
				  <div class='card-body'>
				    <h5 class='card-title text-capitalize'>$product_title</h5>
				    <p class='card-text'>$product_description</p>
				    <p>Price: $product_price/-</p>
				    <a href='index.php?cart_id=$product_id' class='btn btn-info'>Add to Cart</a>
				    <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
				  </div>
			</div>
		</div>";
		}
	}else {
	echo "<h2 class='text-center text-danger'>This brands item is not Available<h2>";
}
}
}




// getting search product

function searchData(){
		global $conn;

	if(isset($_GET['submit'])){

		$search_data = $_GET['search'];
	
	$sql = "SELECT * FROM products WHERE product_keyword LIKE '%$search_data%'";
	$query = mysqli_query($conn,$sql);
	$number = mysqli_num_rows($query);
	if($number>0){
	while($row = mysqli_fetch_assoc($query)){
	$product_title = $row['product_title'];
	$product_description = substr($row['product_description'],0, 100);
	$product_price = $row['product_price'];
	$product_id = $row['product_id'];
	$product_image = $row['product_image1'];
	$category_id = $row['category_id'];
	$brand_id = $row['brand_id'];

		echo "<div class='col-md-4 col-sm-12 mb-2'>
			<div class='card'>
  				<img src='./admin/product_images/$product_image' class='card-img-top' alt='$product_title'>
				  <div class='card-body'>
				    <h5 class='card-title text-capitalize'>$product_title</h5>
				    <p class='card-text'>$product_description</p>
				    <p>Price: $product_price/-</p>
				    <a href='index.php?cart_id=$product_id' class='btn btn-info'>Add to Cart</a>
				    <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
				  </div>
			</div>
		</div>";
	}
}else{
	echo "<h2 class='text-center text-danger'>This search item is not Available";
}
}
}


// getting brands

function getBrands(){
	global $conn;
	$brand_select = "SELECT * FROM brands";
	$brand_query = mysqli_query($conn,$brand_select);
	while ($brand_row = mysqli_fetch_assoc($brand_query)) {
	$brand_name = $brand_row['brand_name'];
	$brand_id = $brand_row['brand_id'];
  echo "<li class='nav-item'>
			   <a class='nav-link text-light text-capitalize' href='index.php?brand=$brand_id'>$brand_name </a>
		  </li>";
	}
}


// getting categories

function getCategories(){
	global $conn;

	$category_select = "SELECT * FROM categories";
	$category_query = mysqli_query($conn,$category_select);
	while ($category_row = mysqli_fetch_assoc($category_query)) {
	$category_name = $category_row['cat_name'];
	$category_id = $category_row['cat_id'];
	echo "<li class='nav-item'>
			   <a class='nav-link text-light text-capitalize' href='index.php?category=$category_id'>$category_name </a>
		  </li>";
	}
}

// getting view product

function view_product(){
	global $conn;

	if(isset($_GET['product_id'])){
	if(!isset($_GET['category'])){
	if(!isset($_GET['brand'])){

	$pro_id = $_GET['product_id'];
	$sql = "SELECT * FROM products WHERE product_id = '$pro_id'";
	$query = mysqli_query($conn,$sql);
	while($row = mysqli_fetch_assoc($query)){
	$product_title = $row['product_title'];
	$product_description = substr($row['product_description'],0, 100);
	$product_price = $row['product_price'];
	$product_id = $row['product_id'];
	$product_image1 = $row['product_image1'];
	$product_image2 = $row['product_image2'];
	$product_image3 = $row['product_image3'];
	$category_id = $row['category_id'];
	$brand_id = $row['brand_id'];

		echo "<div class='col-md-4 col-sm-12 mb-2'>
			<div class='card'>
  				<img src='./admin/product_images/$product_image1' class='card-img-top' alt='$product_title'>
				  <div class='card-body'>
				    <h5 class='card-title text-capitalize'>$product_title</h5>
				    <p class='card-text'>$product_description</p>
				    <p>Price: $product_price/-</p>
				    <a href='index.php?cart_id=$product_id' class='btn btn-info'>Add to Cart</a>
				    <a href='index.php' class='btn btn-secondary'>Go home</a>
				  </div>
			</div>
		</div>
		<div class='col-md-8'>
				<div class='row'>
					<div class='col-md-12'>
						<h2 class='text-center text-info mb-5'>Related Product</h2>
					</div>
					<div class='col-md-6'>
						<img src='./admin/product_images/$product_image2' class='card-img-top' alt='$product_title'>
					</div>
					<div class='col-md-6'>
						<img src='./admin/product_images/$product_image3' class='card-img-top' alt='$product_title'>
					</div>
				</div>
			</div>";
	}
}
}
}
}


// getting ip address

   function getIPAddress() {  
    //whether ip is from the share internet  
     if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
                $ip = $_SERVER['HTTP_CLIENT_IP'];  
        }  
    //whether ip is from the proxy  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
     }  
//whether ip is from the remote address  
    else{  
             $ip = $_SERVER['REMOTE_ADDR'];  
     }  
     return $ip;  
}  
// $ip = getIPAddress();  
// echo 'User Real IP Address - '.$ip;  


// getting cart item

function cart(){
	if(isset($_GET['prod_id'])){
		global $conn;
		$product_id = $_GET['prod_id'];
		$ip = getIPAddress();

		$select_product = "SELECT * FROM cart_details WHERE product_id = $product_id AND ip_address = '$ip'";
		$select_query = mysqli_query($conn,$select_product);
		$row = mysqli_fetch_assoc($select_query);
		$result = mysqli_num_rows($select_query);
		if($result > 0){
			echo "<script>alert('This product already exists')</script>";
			echo "<script>window.open('index.php','_self')</script>";
		}else{
			$sql = "INSERT INTO cart_details (product_id,ip_address,quantity) VALUES ($product_id,'$ip',1)";
			$query = mysqli_query($conn,$sql);

			if($query){
				echo "<script>alert('Product added to cart successfully')</script>";
				echo "<script>window.open('index.php','_self')</script>";
			}else{
				echo "<script>alert('Opps! Something went wrong')</script>";
			}
		}
	}
}

// count cart item function

function count_cart_item(){
	if(isset($_GET['cart_id'])){
		global $conn;

			$ip = getIPAddress();
			$select_query = "SELECT * FROM cart_details WHERE ip_address = '$ip'";
			$select_result = mysqli_query($conn,$select_query);
			$number = mysqli_num_rows($select_result);
		}else{
		global $conn;

			$ip = getIPAddress();
			$select_query = "SELECT * FROM cart_details WHERE ip_address = '$ip'";
			$select_result = mysqli_query($conn,$select_query);
			$number = mysqli_num_rows($select_result);
		}
		echo "$number";
}


// function total cart prices

function total_price(){
	global $conn;

	$total = 0;
	$ip = getIPAddress();
	$sql = "SELECT * FROM cart_details WHERE ip_address = '$ip'";
	$query = mysqli_query($conn,$sql);
	while($row = mysqli_fetch_assoc($query)){
		$product_id = $row['product_id'];

		$sql2 = "SELECT * FROM products WHERE product_id = $product_id";
		$query2 = mysqli_query($conn,$sql2);
		while($row2 = mysqli_fetch_assoc($query2)){
			$product_price = array($row2['product_price']);
			$product_value = array_sum($product_price);
			$total+=$product_value;
		}
	}
	echo "$total";
}


// function add_to_cart($prod_id, $qty, $user_id = null){
// 	global $conn;
// 	if(is_null($user_id)){
// 		if(isset($_SESSION['user_id'])){
// 			$user_id = $_SESSION['user_id'];
// 		}else{
// 			$_SESSION['user_id'] = time();
// 			$user_id = $_SESSION['user_id']; 
// 		}
// 	}
// 	$prod_sql = "SELECT product_id, product_price from products WHERE product_id = $prod_id AND status = 'true'";
// 	$product = get_db_data($prod_sql);
// 	$prod_price = $product['product_price'] * $qty;
// 	$ip = getIPAddress();
// 	// Cart table query
// 	// Check product exist for this user or not
	
// 	$cart_check_query = "SELECT * FROM cart_details WHERE user_id = $user_id AND product_id = $prod_id";
// 	$cart_data = get_db_data($cart_check_query);
// 	if(count($cart_data ?? []) > 0){
// 		$card_query = "UPDATE cart_details SET quantity = quantity + $qty, total = total + $prod_price WHERE user_id = $user_id AND product_id = $prod_id";
// 	}else{ 
// 		$card_query = "INSERT INTO cart_details(product_id, ip_address, quantity, user_id, total) VALUES($prod_id, '$ip', $qty, $user_id, $prod_price)";
// 	}

// 	//ext query 
// 	if(mysqli_query($conn, $card_query)){  
// 	 	return true;
// 	}else{  
// 		return false;
// 	}  
// 	mysqli_close($conn);
// }


// function get_db_data($sql){
// 	global $conn;
// 	$pre_sql = mysqli_query($conn, $sql);
// 	return mysqli_fetch_assoc($pre_sql);
// }

// displaing cart function

// function showing_cart(){
// 	global $conn;

// 	$ip = getIPAddress();
// 	$sql = "SELECT * FROM cart_details WHERE ip_address = '$ip'";
// 	$query = mysqli_query($conn,$sql);
// 	$result = mysqli_num_rows($query);
// 	if($result > 0){
// 		while($row = mysqli_fetch_assoc($query)){
// 			$product_id = $row['product_id'];
// 			$sql2 = "SELECT * FROM products WHERE product_id = $product_id";
// 			$query2 = mysqli_query($conn,$sql2);
// 			while($row2 = mysqli_fetch_assoc($query2)){
// 				$product_title = $row2['product_title'];
// 				$product_image = $row2['product_image1'];
// 				$product_price = $row2['product_price'];

// 				echo "<tr>
// 				<td>$product_title</td>
// 				<td><img src='./admin/product_images/$product_image' alt='' class='cart-img'></td>
// 				<td><input type='text' name='quantity' class='input-form w-50'></td>
// 				<td>$product_price</td>
// 				<td><input type='checkbox'></td>
// 				<td class='d-flex align-center justify-content-center'>
// 				<input type='submit' value='Update' name='update_quantity' class='btn btn-info p-2 mx-2'>
// 				<input type='submit' value='Remove' name='remove_item' class='btn btn-info p-2'>
// 				</td>
// 			</tr>";
// 			}
// 		}
// 	}else{
// 		echo "<h2 class='text-center text-info'>You have no product added</h2>";
// 	}
// }

// getting pending oreder

function get_count_pending_order(){
	if(!isset($_GET['edit_account'])){
	if(!isset($_GET['my_order'])){
	if(!isset($_GET['delete_account'])){	
		global $conn;
		$username = $_SESSION['username'];

		$sql = "SELECT * FROM user WHERE username = '$username'";
		$query = mysqli_query($conn,$sql);
		while($row = mysqli_fetch_assoc($query)){
			$user_id = $row['user_id'];
			$sql2 = "SELECT * FROM order_table WHERE user_id = $user_id AND order_status = 'pending'";
			$query2 = mysqli_query($conn,$sql2);
			$result = mysqli_num_rows($query2);
			if($result > 0){
				echo "<h2 class='text-center my-3 text-success'>You have <span class='text-danger'> $result</span> pending orders</h2>";
				echo "<p class='text-center'><a href='user_profile.php?my_order'>Order Details</a></p>";
			}else{
				echo "<p class='text-center my-3 text-success'>You have <span class='text-danger text-center'>0</span> pending orders</p>";
				echo "<a href='../index.php' class='text-center'>Explore Now</a>";
			}
		}
	}
	}
	}
}










?>