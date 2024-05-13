<?php 
session_start();
if(!$_SESSION['admin_username']){
	echo "<script>window.open('admin_login.php','_self')</script>";
}

?>

<?php 

if(isset($_GET['delete_order'])){

	$order_id = $_GET['delete_order'];
	// echo $order_id;
	$sql = "DELETE FROM order_table WHERE order_id = {$order_id}";
	$query = mysqli_query($conn,$sql) or die('query not exists');

	if($query){
		echo "<script>alert('Order has been deleted successfully')</script>";
		echo "<script>window.open('index.php?view_order','_self')</script>";
	}
}


?>