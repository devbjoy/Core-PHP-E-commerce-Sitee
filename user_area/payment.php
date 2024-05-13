

<?php 
	include "../config/config.php";
	include "../functions/common_function.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Payment page</title>
	<!-- bootstrap css link -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
	<style>
		.upi_img{
			width: 100%;
			height: 300px;
			object-fit: cover;
		}
	</style>
</head>
<body>
	<?php 
	$user_ip = getIPAddress();
	$sql = "SELECT * FROM user WHERE user_ip = '$user_ip'";
	$query = mysqli_query($conn,$sql);
	$result = mysqli_fetch_assoc($query);
	$user_id = $result['user_id'];

	?>
	<div class="container">
		<h2 class="text-center text-info">Payment Method</h2>
		<div class="row d-flex align-items-center justify-content-center m-1 mt-5 mb-2">
			<div class="col-md-6">
				<a href="https://www.paypal.com"><img src="../images/upi.jpg" alt="" target="_blank" class="upi_img"></a>
			</div>
			<div class="col-md-6">
				<a href="order.php?user_id=<?php echo $user_id; ?>"><h2 class="text-center">Pay Offline</h2></a>
			</div>
		</div>
	</div>
</body>
</html>