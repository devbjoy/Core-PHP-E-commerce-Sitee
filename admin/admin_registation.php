
<?php 
include "../functions/common_function.php";
include "../config/config.php";
?>
<?php 


if(isset($_POST['registration'])){
	$username = $_POST['username'];
	$admin_email = $_POST['email'];
	$password = $_POST['password'];
	$hash_pass = password_hash($password, PASSWORD_DEFAULT);
	$confirm_pass = $_POST['confirm_pass'];

	
	// select query
	$sql2 = "SELECT * FROM admin_table WHERE admin_name = '$username' OR admin_email = '$admin_email'";
	$query2 = mysqli_query($conn,$sql2);
	$result = mysqli_num_rows($query2);
	if($result > 0){
		echo "<script>alert('Username and Email already exists')</script>";
	}elseif ($password!=$confirm_pass) {
		echo "<script>alert('Password do not matched')</script>";
	}else {

		$sql = "INSERT INTO admin_table (admin_name,admin_email,admin_password) VALUES ('$username','$admin_email','$hash_pass')";

		$query = mysqli_query($conn,$sql);

		if($query){
			echo "<script>alert('Registration successfully')</script>";
			echo "<script>window.open('admin_login.php','_self')</script>";
		}
	}


}



?>



<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin Registration</title>
	<!-- bootstrap css link -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

		<!-- cdn link -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>
</head>
<body>
	<div class="container-fluid">
		<h2 class="text-center my-4">Admin Registration</h2>
		<div class="row d-flex align-items-center justify-content-center">
			<div class="col-md-12">
				<form action="" method="post">
					<div class="form-outline mb-3 w-50 m-auto">
				    <label for="username" class="from-label">Username</label>
				    <input type="text" id="username" class="form-control" name="username" placeholder="Enter Your Username" autocomplete="off" required>
			    </div>
			    <div class="form-outline mb-3 w-50 m-auto">
				    <label for="email" class="from-label">Email</label>
				    <input type="email" id="email" class="form-control" name="email" placeholder="Enter Your Email" autocomplete="off" required>
			    </div>
			    <div class="form-outline mb-3 w-50 m-auto">
				    <label for="password" class="from-label">Password</label>
				    <input type="text" id="password" class="form-control" name="password" placeholder="Enter Your Password" autocomplete="off" required>
			    </div>
			    <div class="form-outline mb-3 w-50 m-auto">
				    <label for="confirm_pass" class="from-label">Confirm Password</label>
				    <input type="text" id="confirm_pass" class="form-control" name="confirm_pass" placeholder="Enter Your Confirm Password" autocomplete="off" required>
			    </div>
			    <div class="form-outline mb-3 w-50 m-auto">
				    <input type="submit" name="registration" class="btn btn-info mb-3" value="Register">
				    <p class="fw-bold small">I have already an account ? <a href="admin_login.php" class="text-danger">Login</a></p>
			    </div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>