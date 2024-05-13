<?php 
@session_start();
if(!$_SESSION['admin_username']){
	echo "<script>window.open('admin_login.php','_self')</script>";
}
?>
<?php 

include "../config/config.php";

if(isset($_POST['insert-category'])){
	$insert_name = $_POST['insert-title'];

	$select_query = "SELECT * FROM categories WHERE cat_name = '{$insert_name}'";
	$select_result = mysqli_query($conn,$select_query);
	$select_row = mysqli_num_rows($select_result);
	if($select_row > 0){
		echo "<script>alert('This Categories is Already Exits')</script>";
	}else {
		
		$sql = "INSERT INTO categories (cat_name) VALUES ('$insert_name')";
		$result = mysqli_query($conn,$sql);

		if($result){
			echo "<script>alert('Data Inserted Successfully')</script>";
		}
	}
}
?>

<h2 class="text-center">Add New Categories</h2>
<form action="" method="post">
	<div class="input-group mb-2 w-90">
	  <span class="input-group-text" id="basic-addon1"><span class="fa-solid fa-receipt"></span></span>
	  <input type="text" class="form-control" placeholder="Insert Categories" name="insert-title" aria-describedby="basic-addon1">
	</div>
	<div class="input-group mb-2 w-10 m-auto">
	   <input type="submit" class="border-0 p-2 my-3 bg-info " value="Insert Categories" name="insert-category">
	  	<!-- <button type="submit" class=" border-0 p-2 my-3 bg-info ">Insert Category</button> -->
	</div> 

</form>