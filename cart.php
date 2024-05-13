
<?php 
include "./config/config.php";
include "./functions/common_function.php";
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Ecommearch site with php</title>

	<!-- cdn link -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>
	<!-- bootstrap css link -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
	<!-- custom css link -->
	<link rel="stylesheet" href="./style.css" type="text/css">
</head>
<body>
	<!-- fast child -->
	<div class="container-fluid bg-info p-0">
		<nav class="navbar navbar-expand-lg">
		  <div class="container-fluid">
		    <a class="navbar-brand" href="index.php"><img src="images/logo.jpg" alt="" class="logo"></a>
		    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		      <span class="navbar-toggler-icon"></span>
		    </button>
		    <div class="collapse navbar-collapse" id="navbarSupportedContent">
		      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
		        <li class="nav-item">
		          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
		        </li>
		        <li class="nav-item">
		          <a class="nav-link" href="all_product.php">Product</a>
		        </li>
		        <?php 
		        	if(isset($_SESSION['username'])){
		        		echo "<li class='nav-item'>
		          	<a class='nav-link' href='user_area/user_profile.php'>My Account</a>
		        	</li>";
		        	}else{
		        		echo "<li class='nav-item'>
		          	<a class='nav-link' href='user_area/user_registation.php'>Register</a>
		        	</li>";
		        	}
		        ?>
		        <li class="nav-item">
		          <a class="nav-link" href="#">Contact</a>
		        </li>
		        <li class="nav-item">
		          <a class="nav-link" href=""><i class="fa-solid fa-cart-plus"></i><sup><?php count_cart_item();?></sup></a>
		        </li>
		       <!--  <li class="nav-item">
		          <a class="nav-link" href="#">Total Price: <?php total_price();?>/-</a>
		        </li> -->
		      </ul>
		    </div>
		  </div>
		</nav>
	</div>

<!-- <?php echo $_SESSION['user_id']; ?> -->
<!-- second child -->
<div class="navbar navbar-expand-lg bg-secondary navber-dark">
	<ul class="navbar-nav me-auto">
		<?php 
			if(!isset($_SESSION['username'])){
				echo "<li class='nav-item'>
		    <a class='nav-link' href=''>Welcome Guest</a>
	  		</li>";
			}else{
				echo "<li class='nav-item'>
		    <a class='nav-link' href='#'>Welcome ". $_SESSION['username']." </a>
	  		</li>";
			}
		?>
	 	<?php 
	 		if(!isset($_SESSION['username'])){
	 			echo "<li class='nav-item'>
		    <a class='nav-link' href='./user_area/user_login.php'>Login</a>
	  		</li>";
	 		}else {
	 			echo "<li class='nav-item'>
		    <a class='nav-link' href='./user_area/logout.php'>Logout</a>
	  		</li>";
	 		}
	 	?>
	</ul>
</div>

<!-- third child -->
<div class="bg-light">
	<h3 class="text-center">Hidden Store</h3>
	<p class="text-center">Communication is at the heart of e-commerce and community</p>
</div>

<!-- forth child for table -->

<div class="container">
	<div class="row">
	<form action="" method="post">
	<table class="table table-bordered text-center">
		
		
			<?php 
				$ip = getIPAddress();
				$total_price = 0;
				// $user_id = $_SESSION['user_id'];
				$sql = "SELECT * FROM cart_details WHERE ip_address = '$ip'";
				$query = mysqli_query($conn,$sql);
				$result = mysqli_num_rows($query);
				if($result > 0){
					echo "<thead>
								<tr>
									<th>Product Title</th>
									<th>Product Image</th>
									<th>Product Quantity</th>
									<th>Total Price</th>
									<th>Remove</th>
									<th>Operation</th>
								</tr>
							</thead>";
				echo "<tbody>";
				while($row = mysqli_fetch_assoc($query)){
				$product_id = $row['product_id'];
				$sql2 = "SELECT * FROM products WHERE product_id = $product_id";
				$query2 = mysqli_query($conn,$sql2);
				while($row2 = mysqli_fetch_assoc($query2)){
				$product_title = $row2['product_title'];
				$product_image = $row2['product_image1'];
				$product_price = $row2['product_price'];
				$product_price_all = array($row2['product_price']);
				$product_value = array_sum($product_price_all);
				$total_price+=$product_value;
			?>
			<tr>
				<td><?php echo $product_title; ?></td>
				<td><img src='./admin/product_images/<?php echo $product_image; ?>' alt='' class='cart-img'></td>
				<td><input type='text' name='qnt' value="<?= $row['quantity']?>" class='input-form w-50'></td>
				<td><?php echo $product_price; ?></td>
				<td><input type='checkbox' value="<?php echo $product_id; ?>" name="check[]"></td>
				<td class='d-flex align-center justify-content-center'>
					<?php 
					$ip_ads = getIPAddress();

					if(isset($_POST['update_quantity'])){
						$qunt = $_POST['qnt'];
						$update_sql = "UPDATE cart_details SET quantity = $qunt WHERE ip_address = '$ip_ads'";
						$update_result = mysqli_query($conn,$update_sql);
						// if($update_result){
						// 	echo "<script>window.open('cart.php','_self')</script>";
						// }
						$total_price = $total_price * $qunt;
					}

					?>
				<input type='submit' value='Update' name='update_quantity' class='btn btn-info p-2 mx-2'>
				<input type='submit' value='Remove' name='remove_item' class='btn btn-info p-2'>
				</td>
			</tr>
		<?php 
		}
	}
}else {
	echo "<h2 class='text-center text-danger'>This cart is empty</h2>";
}
	?>
		</tbody>
	</table>
	</form>
	<div class="d-flex mb-5">
	<!-- subtotale -->
	<?php 
	$ip = getIPAddress();
	$sql = "SELECT * FROM cart_details WHERE ip_address = '$ip'";
	$query = mysqli_query($conn,$sql);
	$result = mysqli_num_rows($query);
	if($result > 0){
		echo "<h4 class='px-3 my-2'>Subtotal: <strong class='text-inf'>$total_price/-</strong></h4>
		<a href='index.php'><button class='btn bg-info px-3 py-2  border-0 mx-3'>Continue Shopping</button></a>
		<a href='./user_area/checkout.php'><button class='btn bg-secondary px-3 py-2 border-0 text-light'>Checkout</button></a>";
	}else{
		echo "<a href='index.php'><button class='btn bg-info px-3 py-2  border-0 mx-3'>Continue Shopping</button></a>";
	}

	?>
	
		
	</div>
	</div>
</div>

<?php //add_to_cart(2, 2) ?>

<!-- last child -->
<div class="container-fluid bg-info text-center p-3">
	<p>Create by Bijoy saha || copyright by the <?php echo date("Y"); ?></p>
</div>

<!-- removing cart item function -->

<?php 
function remove_cart(){
	global $conn;
	if(isset($_POST['remove_item'])){
		foreach ($_POST['check'] as $p_id) {
		    echo $p_id;
		    $sql3 = "DELETE FROM cart_details WHERE product_id = $p_id";
		    $result3 = mysqli_query($conn,$sql3);
		    if($result3){
		    	echo "<script>window.open('cart.php','_self')</script>";
		    }
		}
	}
}
 remove_cart();

?>

<!-- bootstrap script link -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>