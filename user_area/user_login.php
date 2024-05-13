
<?php 
include "../config/config.php";
include "../functions/common_function.php";
// session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login page</title>
	<!-- cdn link -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>
	<!-- bootstrap css link -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
	<style>
		body{
			overflow-x: hidden;
		}
	</style>
</head>
<body>
	<div class="container mt-3">
		<h2 class="text-center">Login Now</h2>
		<!-- form -->
		<form action="" method="post" enctype="multipart/form-data">
			<!-- product title -->
			<div class="form-outline mb-3 w-50 m-auto">
				<label for="username" class="from-label">Username</label>
				<input type="text" id="username" class="form-control" name="username" placeholder="Enter Your Name" autocomplete="off" required>
			</div>
			<div class="form-outline mb-3 w-50 m-auto">
				<label for="password" class="from-label">Password</label>
				<input type="text" id="password" class="form-control" name="password" placeholder="Enter Your Password" autocomplete="off" required>
			</div>
			<div class="form-outline mb-3 w-50 m-auto">
				<input type="submit" value="Login" class="btn btn-info text-light" name="login_btn">
				<p class="mt-2 fw-bold small pt-1">Don't have an account ? <a href="user_registation.php" class="text-danger">Register</a></p>
			</div>
		</form>
	</div>
</body>
</html>

<?php 

if(isset($_POST['login_btn'])){
		// session_start();
	$name = $_POST['username'];
	$pass = $_POST['password'];

	$sql = "SELECT * FROM user WHERE username = '$name'";
	$query = mysqli_query($conn,$sql);
	$row = mysqli_num_rows($query);
	$data = mysqli_fetch_assoc($query);
	$user_pass = $data['user_password'];

	$ip_address = getIPAddress();
	// select cart item
	$select_cart = "SELECT * FROM cart_details WHERE ip_address = '$ip_address'";
	$select_cart_query = mysqli_query($conn,$select_cart);
	$select_cart_number = mysqli_fetch_assoc($select_cart_query);
	$cart_num = mysqli_num_rows($select_cart_query);
	if($row > 0){
		session_start();
		$_SESSION['username'] = $name;
		if(password_verify($pass, $user_pass)){
			// echo "<script>alert('Login Successful')</script>";
			if($row==1 AND $cart_num==0){
				
				$_SESSION['username'] = $name;
				echo "<script>alert('Login Successful')</script>";
				echo "<script>window.open('user_profile.php','_self')</script>";
			}else{
				
				$_SESSION['username'] = $name;
				echo "<script>alert('Login Successful')</script>";
				echo "<script>window.open('checkout.php','_self')</script>";
			}
		}else{
			echo "<script>alert('Invalid Username and password')</script>";
		}
	}else {
		echo "<script>alert('Invalid Username and password')</script>";
	}
}

?>

