<?php 
include "../functions/common_function.php";
include "../config/config.php";
?>
<?php 

if(isset($_POST['login'])){

	$name = $_POST['username'];
	$pass = $_POST['password'];

	$sql = "SELECT * FROM admin_table WHERE admin_name = '$name'";
	$query = mysqli_query($conn,$sql) or die('query failed');
	$result = mysqli_num_rows($query);
	if($result > 0){
		while ($row = mysqli_fetch_assoc($query)) {
		   $admin_pass = $row['admin_password'];
		   if(password_verify($pass, $admin_pass)){
		   		session_start();
		   		$_SESSION['admin_username'] = $name;
		   		echo "<script>alert('login successfully')</script>";
		   		echo "<script>window.open('index.php','_self')</script>";
		   }else{
		   	echo "<script>alert('password don not matched')</script>";
		   }
		}
	}else {
		echo "<script>alert('Invalid Date')</script>";
	}
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin Login</title>
	<!-- bootstrap css link -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

		<!-- cdn link -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>
</head>
<body>
	<div class="container-fluid">
		<h2 class="text-center my-4">Admin Login</h2>
		<div class="row d-flex align-items-center justify-content-center">
			<div class="col-md-12">
				<form action="" method="post">
					<div class="form-outline mb-3 w-50 m-auto">
				    <label for="username" class="from-label">Username</label>
				    <input type="text" id="username" class="form-control" name="username" placeholder="Enter Your Username" autocomplete="off" required>
			    </div>
			    <div class="form-outline mb-3 w-50 m-auto">
				    <label for="password" class="from-label">Password</label>
				    <input type="text" id="password" class="form-control" name="password" placeholder="Enter Your Password" autocomplete="off" required>
			    </div>   
			    <div class="form-outline mb-3 w-50 m-auto">
				    <input type="submit" name="login" class="btn btn-info mb-3" value="Login">
				    <p class="fw-bold small">Don't you have an account ? <a href="admin_registation.php" class="text-danger">Register</a></p>
			    </div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>

