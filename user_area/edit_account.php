<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Edit Account</title>
	<!-- bootstrap css link -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
	<h3 class="text-center mb-3">Edit Account</h3>
	<?php 
		if(isset($_GET['edit_account'])){
			$username = $_SESSION['username'];
			$select_sql = "SELECT * FROM user WHERE username = '$username'";
			$select_query = mysqli_query($conn,$select_sql);
			$row = mysqli_fetch_assoc($select_query); 
			    $user_id = $row['user_id'];
			    $user_name = $row['username'];
			    $user_image = $row['user_image'];
			    $user_email = $row['user_email'];
			    $user_address = $row['user_address'];
			    $user_mobile = $row['user_mobile'];
			}

	?>
	<form action="" enctype="multipart/form-data" method="post">
		<div class="input-group m-auto mb-3 w-50">
	  	<input type="text" class="form-control" value="<?= $user_name; ?>" name="username">
		</div>
		<div class="input-group m-auto mb-4 w-50">
	  	<input type="email" class="form-control" name="email"  value="<?= $user_email; ?>">
		</div>
		<div class="input-group m-auto mb-4 w-50 d-flex">
	  	<input type="file" class="form-control" name="new_img">
	  	<input type="hidden" class="form-control" name="old_img" value="<?= $user_image; ?>">
	  	<img src="./user_images/<?= $images; ?>" alt="">
		</div>
		<div class="input-group m-auto mb-4 w-50">
	  	<input type="text" class="form-control" name="address"  value="<?= $user_address; ?>">
		</div>
		<div class="input-group m-auto mb-4 w-50">
	  	<input type="text" class="form-control" name="mobile"  value="<?= $user_mobile; ?>">
		</div>
		<div class="input-group m-auto mb-4 w-50">
	  	<input type="submit" value="Update Profile" class="btn btn-info" name="update_profile">
		</div>
	</form>
</body>
</html>

<?php 

if(isset($_POST['update_profile'])){
	 $upd_user_id = $user_id;
	 $upd_user_name = $_POST['username'];
	 $user_email = $_POST['email'];
	 $user_address = $_POST['address'];
	 $user_mobile = $_POST['mobile'];

	 if(empty($_FILES['new_img'])){
		$new_name = $_FILES['old_img']['name'];
	}else {
		
   $user_image = $_FILES['new_img']['name'];
   $user_image_tmp = $_FILES['new_img']['tmp_name'];

   $new_name = time()."-".basename($user_image);

   move_uploaded_file($user_image_tmp, "./user_images/$new_name");

   $sql = "UPDATE user SET username = '$upd_user_name', user_email = '$user_email',user_image = '$new_name',user_address = '$user_address', user_mobile = '$user_mobile' WHERE user_id = $upd_user_id";
   $query = mysqli_query($conn,$sql);
   if($query){
   	echo "<script>alert('Profile updated successfully')</script>";
   	echo "<script>window.open('logout.php','_self')</script>";
   }
 }
}

?>