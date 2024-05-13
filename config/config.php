<?php 

$conn = mysqli_connect('localhost','root','','mystore') or die("connect failed");

if(!$conn){
	echo "mysqli_error()";
}

?>