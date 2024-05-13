<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Delete Page</title>
</head>
<body>
	<h2 class="text-center text-danger mb-5">Delete Account</h2>
	<form action="" method="post" class="text-center">
		<div class="form-outline mb-3 w-50 m-auto">
			<input type="submit" class="form-control" name="delete_account" value="Delete Account"  class="text-center">
		</div>
		<div class="form-outline mb-3 m-auto w-50 ">
			<input type="submit"  class="form-control" name="dont_delete" value="Don't Delete Account"  class="text-center">
		</div>
	</form>
</body>
</html>


<?php 

if(isset($_POST['delete_account'])){
	$login_username = $_SESSION['username'];

	$delete_query = "DELETE FROM user WHERE username = '$login_username'";
	$delete_result = mysqli_query($conn,$delete_query) or die('query not exists');

	if($delete_query){
		session_destroy();
		echo "<script>alert('Account has been deleted')</script>";
		echo "<script>window.open('../index.php','_self')</script>";
	}
}

if(isset($_POST['dont_delete'])){
	echo "<script>window.open('./user_profile.php','_self')</script>";
}

?>