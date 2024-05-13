<?php 
session_start();
if(!$_SESSION['admin_username']){
	echo "<script>window.open('admin_login.php','_self')</script>";
}

?>
<?php 

if(isset($_GET['delete_user'])){
	$user_id = $_GET['delete_user'];

	$delete_query = "DELETE FROM user WHERE user_id = {$user_id}";
	$result = mysqli_query($conn,$delete_query) or die('query not exists');

	if($result){
		echo "<script>alert('User has been deleted successfully')</script>";
		echo "<script>window.open('index.php?view_users','_self')</script>";
	}
}


?>