
<?php 
session_start();
if(!$_SESSION['admin_username']){
	echo "<script>window.open('admin_login.php','_self')</script>";
}

?>

<?php 

if(isset($_GET['delete_product'])){
	$id = $_GET['delete_product'];

	$delete_sql = "DELETE FROM products WHERE product_id = {$id}";
	$result = mysqli_query($conn,$delete_sql) or die('Query not exists');

	if($result){
		echo "<script>alert('Product has been deleted')<script>";
		echo "<script>window.open('index.php','_self')</script>";
	}
}



?>