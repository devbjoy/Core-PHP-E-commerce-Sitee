<?php 
	include "../config/config.php";
	include "../functions/common_function.php";


if(isset($_GET['user_id'])){
	$user_id = $_GET['user_id'];
}


// getting total prduct price and count total order prduct

$total_price = 0;
	$ip = getIPAddress();
	$sql = "SELECT * FROM cart_details WHERE ip_address = '$ip'";
	$query = mysqli_query($conn,$sql);
	$total_product = mysqli_num_rows($query);
	$invoice = mt_rand();
	$status = "pending";

	while($row = mysqli_fetch_assoc($query)){
		$product_id = $row['product_id'];

		$sql2 = "SELECT * FROM products WHERE product_id = $product_id";
		$query2 = mysqli_query($conn,$sql2);
		while($row2 = mysqli_fetch_assoc($query2)){
			$product_price = array($row2['product_price']);
			$product_value = array_sum($product_price);
			$total_price+=$product_value;
		}
	}
	// echo $total_price;


// getting quantity

$sql3 = "SELECT * FROM cart_details";
$query3 = mysqli_query($conn,$sql3);
$result3 = mysqli_fetch_assoc($query3);
$quantitys = $result3['quantity'];

if($quantitys==0){
	$quantity = 1;
	$sub_total = $total_price;
}else {
	$quantity = $quantitys;
	$sub_total = $total_price * $quantity;
}


$insert_sql = "INSERT INTO order_table (user_id,amount_due,invoies_number,total_product,order_date,order_status) VALUES ($user_id,$sub_total,$invoice,$total_product,NOW(),'$status')";

$insert_query = mysqli_query($conn,$insert_sql);
 
if($insert_query){
	echo "<script>alert('Order submited successfully')</script>";
	echo "<script>window.open('user_profile.php','_self')</script>";
}

// inserting order pending table

$insert_pending = "INSERT INTO order_pending_table(user_id,invoice_number,product_id,quantity,order_status) VALUES ($user_id,$invoice,$product_id,$quantity,'$status')";
$pending_query = mysqli_query($conn,$insert_pending);

// delete item for cart_details

$delete_sql = "DELETE FROM cart_details WHERE ip_address = '$ip'";
$delete_query = mysqli_query($conn,$delete_sql);

?>