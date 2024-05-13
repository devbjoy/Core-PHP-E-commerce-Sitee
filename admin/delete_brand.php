

<?php 
session_start();
if(!$_SESSION['admin_username']){
	echo "<script>window.open('admin_login.php','_self')</script>";
}

?>

<?php 

if(isset($_GET['delete_brand'])){
	$brand_id = $_GET['delete_brand'];

	$delete_query = "DELETE FROM brands WHERE brand_id = {$brand_id}";
	$result = mysqli_query($conn,$delete_query) or die('query not exists');

	if($result){
		echo "<script>alert('Brands has been deleted successfully')</script>";
		echo "<script>window.open('index.php?view_brands','_self')</script>";
	}
}


?>