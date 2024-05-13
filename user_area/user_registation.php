
<?php 
include "../functions/common_function.php";
include "../config/config.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>User Regestation From</title>
	<!-- cdn link -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>
	<!-- bootstrap css link -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
	<div class="container my-3">
		<h2 class="text-center">Registration Now</h2>
		<!-- form -->
		<form action="" method="post" enctype="multipart/form-data">
			<!-- product title -->
			<div class="form-outline mb-3 w-50 m-auto">
				<label for="username" class="from-label">Username</label>
				<input type="text" id="username" class="form-control" name="username" placeholder="Enter your name" autocomplete="off" required>
			</div>
			<!-- product description -->
			<div class="form-outline mb-3 w-50 m-auto">
				<label for="user_email" class="from-label">Email</label>
				<input type="email" id="user_email" class="form-control" name="user_email" placeholder="Enter your email" autocomplete="off" required>
			</div>
			<div class="form-outline mb-3 w-50 m-auto">
				<label for="image" class="from-label">User Image</label>
				<input type="file" id="image" class="form-control" name="user_image" placeholder="Enter your image" autocomplete="off" required>
			</div>
			<!-- product keyword -->
			<div class="form-outline mb-3 w-50 m-auto">
				<label for="password" class="from-label">Password</label>
				<input type="text" id="password" class="form-control" name="password" placeholder="Enter pour password" autocomplete="off" required>
			</div>
			<div class="form-outline mb-3 w-50 m-auto">
				<label for="confirm_pass" class="from-label">Confirm Password</label>
				<input type="text" id="confirm_pass" class="form-control" name="confirm_pass" placeholder="Enter Your confirm password" autocomplete="off" required>
			</div>
			<div class="form-outline mb-3 w-50 m-auto">
				<label for="your_address" class="from-label">User Address</label>
				<input type="text" id="your_address" class="form-control" name="your_address" placeholder="Enter your address" autocomplete="off" required>
			</div>
			<div class="form-outline mb-3 w-50 m-auto">
				<label for="your_mobile" class="from-label">User Mobile</label>
				<input type="text" id="your_mobile" class="form-control" name="your_mobile" placeholder="Enter your number" autocomplete="off" required>
			</div>
			<div class="form-outline mb-3 w-50 m-auto">
				<input type="submit" name="submit" value="Register Now" class="btn btn-info text-light">
				<p class="mt-2 fw-bold small pt-1">Already have an account ? <a href="user_login.php" class="text-danger">Login</a></p>
			</div>
		</form>
	</div>
</body>
</html>

<?php 

if(isset($_POST['submit'])){
	$username = $_POST['username'];
	$user_email = $_POST['user_email'];
	$password = $_POST['password'];
	$hash_pass = password_hash($password, PASSWORD_DEFAULT);
	$confam_pass = $_POST['confirm_pass'];
	$your_address = $_POST['your_address'];
	$your_mobile = $_POST['your_mobile'];
	$user_image = $_FILES['user_image']['name'];
	$user_tmp_name = $_FILES['user_image']['tmp_name'];
	$user_ip = getIPAddress();
	
	// select query
	$sql2 = "SELECT * FROM user WHERE username = '$username' OR user_email = '$user_email'";
	$query2 = mysqli_query($conn,$sql2);
	$result = mysqli_num_rows($query2);
	if($result > 0){
		echo "<script>alert('Username and Email already exists')</script>";
	}elseif ($password!=$confam_pass) {
		echo "<script>alert('Password do not matched')</script>";
	}else {

		move_uploaded_file($user_tmp_name, "user_images/$user_image");
		$sql = "INSERT INTO user (username,user_email,user_password,user_image,user_ip,user_address,user_mobile) VALUES ('$username','$user_email','$hash_pass','$user_image','$user_ip','$your_address','$your_mobile')";

		$query = mysqli_query($conn,$sql);

		if($query){
			echo "<script>alert('Data inserted successfully')</script>";
		}
	}


// checking cart item
// $select_ip = getIPAddress();
$select_cart = "SELECT * FROM cart_details WHERE ip_address = '$user_ip'";
$select_query = mysqli_query($conn,$select_cart);
$select_result = mysqli_num_rows($select_query);

if($select_result > 0){
	$_SESSION['username'] = $username;
	echo "<script>alert('You have to some item in cart')</script>";
	echo "<script>window.open('checkout.php','_self')</script>";
}else{
	echo "<script>window.open('../index.php','_self')</script>";
}

}

?>