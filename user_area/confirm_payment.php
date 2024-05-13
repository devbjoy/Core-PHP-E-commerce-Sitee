<?php 
include "../config/config.php";
include "../functions/common_function.php";
session_start();

if(isset($_GET['order_id'])){
	$id = $_GET['order_id'];

	$sql = "SELECT * FROM order_table WHERE order_id = $id";
	$query = mysqli_query($conn,$sql);
	$result = mysqli_fetch_assoc($query);

	$invoies_number = $result['invoies_number'];
	$amount_due = $result['amount_due'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Confirm Payment Page</title>
	<!-- bootstrap css link -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-secondary">
	<div class="container my-5 text-center">
		<h2 class="text-center text-light">Payment Method</h2>
		<form action="" method="post">
			<div class="form-outline mb-3 w-50 m-auto">
				<input type="text" class="form-control w-50 m-auto" name="invoice"  autocomplete="off" required value="<?= $invoies_number; ?>">
			</div>
			<div class="form-outline mb-3 w-50 m-auto">
				<label for="amount" class="from-label text-light text-center">Amount</label>
				<input type="text" id="amount" class="form-control  w-50 m-auto" name="amount" autocomplete="off" required value="<?= $amount_due; ?>">
			</div>
			<div class="form-outline mb-3 w-50 m-auto">
				<select name="payment_mode" id="" class="form-select w-50 m-auto mb-3">
					<option value="" disabled selected>Select Payment Mode</option>
					<option value="UPI">UPI</option>
					<option value="Online Banking">Online Banking</option>
					<option value="Nagad">Nagad</option>
					<option value="Bkash">Bkash</option>
					<option value="Rocket">Rocket</option>
				</select>
			</div>
			<div class="form-outline mb-3 w-50 m-auto">
				<input type="submit" name="confirm_payment" value="Confirm" class="btn btn-info">
			</div>
		</form>
	</div>
</body>
</html>

<?php 

if(isset($_POST['confirm_payment'])){
	$invoies = $_POST['invoice'];
	$amount = $_POST['amount'];
	$payment_mode = $_POST['payment_mode'];

	$insert_sql = "INSERT INTO user_payment_table(order_id,invoice_number,amount_due,payment_mode,payment_date) VALUES ($id,$invoies,$amount,'$payment_mode',NOW())";

	$insert_query = mysqli_query($conn,$insert_sql) or die('query not exist');

	if($insert_query){
		echo "<script>alert('payment successfully')</script>";
		echo "<script>window.open('user_profile.php?my_order','_self')</script>";
	}

	$update_sql = "UPDATE order_table SET order_status = 'Complete' WHERE order_id = $id";
	$update_query = mysqli_query($conn,$update_sql) or die('query not exist');

}


?>