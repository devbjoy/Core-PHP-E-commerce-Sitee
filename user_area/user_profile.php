
<?php 
include "../config/config.php";
include "../functions/common_function.php";
session_start();
// if(!isset($_SESSION['user_id'])){
// 	$_SESSION['user_id'] = time();
// }
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>User profile page</title>

	<!-- cdn link -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>
	<!-- bootstrap css link -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
	<!-- custom css link -->
	<link rel="stylesheet" href="../style.css" type="text/css">
</head>
<body>
	<!-- fast child -->
	<div class="container-fluid bg-info p-0">
		<nav class="navbar navbar-expand-lg">
		  <div class="container-fluid">
		    <a class="navbar-brand" href="../index.php"><img src="../images/logo.jpg" alt="" class="logo"></a>
		    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		      <span class="navbar-toggler-icon"></span>
		    </button>
		    <div class="collapse navbar-collapse" id="navbarSupportedContent">
		      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
		        <li class="nav-item">
		          <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
		        </li>
		        <li class="nav-item">
		          <a class="nav-link" href="../all_product.php">Product</a>
		        </li>
		        <?php 
		        	if(isset($_SESSION['username'])){
		        		echo "<li class='nav-item'>
		          	<a class='nav-link' href='user_profile.php'>My Account</a>
		        	</li>";
		        	}else{
		        		echo "<li class='nav-item'>
		          	<a class='nav-link' href='user_registation.php'>Register</a>
		        	</li>";
		        	}

		        ?>
		        <li class="nav-item">
		          <a class="nav-link" href="#">Contact</a>
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
		    <a class='nav-link' href='user_login.php'>Login</a>
	  		</li>";
	 		}else {
	 			echo "<li class='nav-item'>
		    <a class='nav-link' href='logout.php'>Logout</a>
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

<div class="row ">
	<div class="col-md-2 bg-danger p-0">
		<ul class="navbar-nav me-auto text-center bg-secondary" style="height: 100vh;">
			<li class="nav-item bg-info">
			   <a class="nav-link text-light" href="#"><h4>My Profile</h4></a>
		  </li>
		  <?php 
		  	$user = $_SESSION['username'];
		  	$select_img = "SELECT * FROM user WHERE username = '$user'";
		  	$img_query = mysqli_query($conn,$select_img);
		  	$resutl = mysqli_fetch_assoc($img_query);
		  	$images = $resutl['user_image'];
		  ?>
			<li class="nav-item">
			   <a class="nav-link text-light" href="#"><img src="user_images/<?= $images; ?>" class="profile-pik" alt=""></a>
		  </li>
		  <li class="nav-item">
			   <a class="nav-link text-light" href="user_profile.php">Pending Order</a>
		  </li>
		  <li class="nav-item">
			   <a class="nav-link text-light" href="user_profile.php?edit_account">Edit Account</a>
		  </li>
		  <li class="nav-item">
			   <a class="nav-link text-light" href="user_profile.php?my_order">My Order</a>
		  </li>
		  <li class="nav-item">
			   <a class="nav-link text-light" href="user_profile.php?delete_account">Delete Account</a>
		  </li>
		  <li class="nav-item">
			   <a class="nav-link text-light" href="logout.php">Logout</a>
		  </li>
		</ul>
	</div>
	<div class="col-md-10 text-center">
		<?php 
			get_count_pending_order();
			if(isset($_GET['edit_account'])){
				include "edit_account.php";
			}
			if(isset($_GET['my_order'])){
				include "my_order.php";
			}
			if(isset($_GET['delete_account'])){
				include "delete_account.php";
			}
		?>
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