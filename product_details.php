
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
		          <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-plus"></i><sup><?php count_cart_item();?></sup></a>
		        </li>
		        <li class="nav-item">
		          <a class="nav-link" href="#">Total Price: <?php total_price();?>/-</a>
		        </li>
		      </ul>
		      <form class="d-flex" role="search" action="search.php" method="get">
		        <input class="form-control me-2" type="text" name="search" placeholder="Search" aria-label="Search">
		        <!-- <button class="btn btn-outline-light bg-info text-white" type="submit">Search</button> -->
		        <input type="submit" name="submit" value="Search" class="btn btn-outline-light">
		      </form>
		    </div>
		  </div>
		</nav>
	</div>

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

<!-- forth child -->
<div class="row">
	<!-- product item -->
	<div class="col-md-10">
		<div class="row mx-1">
				
			<?php 
				view_product();
				get_uniqe_category_product();
				get_uniqe_brands_product();
			?>
			
		</div>
	</div>
	<!-- sidebar -->
	<div class="col-md-2 p-0 bg-secondary">
		<!-- delivery brands -->
		<ul class="navbar-nav me-auto text-center">
			<li class="nav-item bg-info">
			   <a class="nav-link text-light" href="#"><h4>Delivery Brands</h4></a>
		  </li>
		  <?php 
				getBrands();


		  ?>
	
		</ul>
		<!-- category -->
		<ul class="navbar-nav me-auto text-center">
			<li class="nav-item bg-info">
			   <a class="nav-link text-light" href="#"><h4>Categories</h4></a>
		  </li>
		  <?php 
		  getCategories();
		 
		  ?>
		</ul>
	</div>
</div>


<!-- last child -->
<div class="container-fluid bg-info text-center p-3">
	<p>Create by Bijoy saha || copyright by the <?php echo date("Y"); ?></p>
</div>




<!-- bootstrap script link -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>