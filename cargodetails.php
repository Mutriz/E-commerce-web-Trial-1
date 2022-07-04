<?php
include_once 'dbcon.php';
include_once 'header.php';
session_start();
if (isset($_POST['submit'])){
if (isset($_POST['number_containers'])&&
		($_POST['price_container'])&&
		($_POST['shipping_cost'])&&	
		($_POST['fowarder_cost'])&&
		($_POST['warehouse_cost'])&&
		($_POST['ff_date'])){
	$number_containers=$_POST['number_containers'];
	$price_container=$_POST['price_container'];
	$shipping_cost=$_POST['shipping_cost'];
	$fowarder_cost=$_POST['fowarder_cost'];
	$warehouse_cost=$_POST['warehouse_cost'];
	$ff_date=$_POST['ff_date'];
	$user_check=$_SESSION['login_user'];
	$sql2="INSERT INTO cargo_details(email,number_containers,price_container,shipping_cost,fowarder_cost,
	warehouse_cost,ff_date)VALUES ('$user_check','$number_containers','$price_container','$shipping_cost',
	'$fowarder_cost','$warehouse_cost', '$ff_date')";
	$sql3=mysqli_query($conn,$sql2);
}
if($sql3=true){  
	$message = "Successfully saved";
	header("location:payment.php");
}else{  
	$message = "Could not save your data"; 
}
	echo "<script type='text/javascript'>alert('$message');</script>";
}?>