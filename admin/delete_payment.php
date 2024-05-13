
<?php 
session_start();
if(!$_SESSION['admin_username']){
	echo "<script>window.open('admin_login.php','_self')</script>";
}

?>

<?php 

if(isset($_GET['delete_payment'])){

	$payment_id = $_GET['delete_payment'];
	// echo $order_id;
	$sql = "DELETE FROM user_payment_table WHERE payment_id = {$payment_id}";
	$query = mysqli_query($conn,$sql) or die('query not exists');

	if($query){
		echo "<script>alert('payment has been deleted successfully')</script>";
		echo "<script>window.open('index.php?view_payment','_self')</script>";
	}
}


?>