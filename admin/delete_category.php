<?php 
session_start();
if(!$_SESSION['admin_username']){
	echo "<script>window.open('admin_login.php','_self')</script>";
}

?>

<?php 

if(isset($_GET['delete_category'])){
	$cat_id = $_GET['delete_category'];

	$delete_query = "DELETE FROM categories WHERE cat_id = {$cat_id}";
	$result = mysqli_query($conn,$delete_query) or die('query not exists');

	if($result){
		echo "<script>alert('category has been deleted successfully')</script>";
		echo "<script>window.open('index.php?view_category','_self')</script>";
	}
}


?>