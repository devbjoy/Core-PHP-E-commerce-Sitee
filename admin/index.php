
<?php 
include "../config/config.php";
@session_start();
if(!$_SESSION['admin_username']){
	echo "<script>window.open('admin_login.php','_self')</script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin panel</title>
	<!-- bootstrap css link -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

		<!-- cdn link -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>

	<!-- custom css link -->
	<link rel="stylesheet" href="../style.css" type="text/css">
</head>
<body>
	<div class="container-fluid p-0">
		<!-- first child -->
		<nav class="navbar navbar-expand-lg navbar-light bg-info">
			<div class="container-fluid">
				<img src="../images/logo.jpg" alt="" class="logo">
				<nav class="navbar navbar-expand-lg">
					<ul class="navbar-nav">
						<li class="nav-item">
							<a href="" class="nav-link text-capitilize">Welcome <?= $_SESSION['admin_username']; ?></a>
						</li>
					</ul>
				</nav>
			</div>
		</nav>

		<!-- second child -->
		<div class="bg-light">
			<h3 class="text-center p-2">Menage Details</h3>
		</div>

		<!-- third child -->
		<div class="row my-0">
			<div class="col-md-12 bg-secondary d-flex align-items-center">
				<div class="px-5">
				  <a href=""><img src="../images/apple.jpg" alt="" class="user"></a>
				  <p class="text-center text-light"><?= $_SESSION['admin_username']; ?></p>
				</div>
				<div class="button text-center">
					<button class="my-3"><a href="insert_product.php" class="nav-link text-light bg-info my-0 p-2">Insert Product</a></button>
					<button><a href="index.php?view_product" class="nav-link text-light bg-info my-0 p-2">View Products</a></button>
					<button><a href="index.php?insert_category" class="nav-link text-light bg-info my-0 p-2">Insert Categories</a></button>
					<button><a href="index.php?view_category" class="nav-link text-light bg-info my-0 p-2">View Categories</a></button>
					<button><a href="index.php?insert_brands" class="nav-link text-light bg-info my-0 p-2">Insert Brands</a></button>
					<button><a href="index.php?view_brands" class="nav-link text-light bg-info my-0 p-2">View Brands</a></button>
					<button><a href="index.php?view_order" class="nav-link text-light bg-info my-0 p-2">All Orders</a></button>
					<button><a href="index.php?view_payment" class="nav-link text-light bg-info my-0 p-2">All payments</a></button>
					<button><a href="index.php?view_users" class="nav-link text-light bg-info my-0 p-2">List Users</a></button>
					<button><a href="admin_logout.php" class="nav-link text-light bg-info my-0 p-2">Logout</a></button>
				</div>
			</div>
		</div>
	</div>	

<div class="container my-3">
	<?php
		if(isset($_GET['insert_category'])){
			include "insert_category.php";
		}
		if(isset($_GET['insert_brands'])){
			include "insert_brands.php";
		}
		if(isset($_GET['view_product'])){
			include "view_product.php";
		}
		if(isset($_GET['edit_product'])){
			include "edit_product.php";
		}
		if(isset($_GET['delete_product'])){
			include "delete_product.php";
		}
		if(isset($_GET['view_category'])){
			include "view_category.php";
		}
		if(isset($_GET['edit_category'])){
			include "edit_category.php";
		}
		if(isset($_GET['delete_category'])){
			include "delete_category.php";
		}
		if(isset($_GET['view_brands'])){
			include "view_brands.php";
		}
		if(isset($_GET['edit_brand'])){
			include "edit_brand.php";
		}
		if(isset($_GET['delete_brand'])){
			include "delete_brand.php";
		}
		if(isset($_GET['view_order'])){
			include "all_order.php";
		}
		if(isset($_GET['delete_order'])){
			include "delete_order.php";
		}
		if(isset($_GET['view_payment'])){
			include "all_payment.php";
		}
		if(isset($_GET['delete_payment'])){
			include "delete_payment.php";
		}
		if(isset($_GET['view_users'])){
			include "all_user.php";
		}
		if(isset($_GET['delete_user'])){
			include "delete_user.php";
		}
	?>
</div>


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>


<!-- bootstrap script link -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>