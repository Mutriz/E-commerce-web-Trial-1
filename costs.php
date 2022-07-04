<?php
//global variable days for warehouse storage
include_once 'dbcon.php';
include_once 'header.php';
session_start();


//calculate the number of containers needed for the weight of goods

////////////////////////////////
//price per cargo--set by shipping company 
function cargoPrice(){
	$containerPrice=$_POST['containerPrice'];
	$numberOfContainers;
	$totalPrice=$containerPrice*$numberOfContainers;
	echo $totalCargoPrice ,"shillings";
}
$finPrice=cargoPrice();
//price of shipping as per distance--set by shipping company
//price per km
function shippingPrice(){
	$shipPrice=$_POST['shipPrice'];
	$shipDistance=$_POST['shipDistance'];
	$totalShipPrice=$shipPrice*$shipDistance;
	echo $totalShipPrice ,"shillings";
}
$finShipPrice=shippingPrice();
//freight fowarding price as per distance
function fowarderPrice(){
	$fowarder_price=$_POST['fowarder_price'];
	$landDistance=$_POST['landDistance'];
	$totalFowarderPrice=$fowarder_price*$landDistance;
	echo $totalFowarderPrice ,"shillings";
}
$finFowarderPrice=fowarderPrice();
//warehouse charges as per days and number of containers
function warehousePrice(){
	$warehouse_price=$_POST['warehouse_price'];
	$totalwarehousePrice=$warehouse_price*$days;
	echo $totalwarehousePrice ,"shillings";
}
$finWarehousePrice=warehousePrice();
//freight fowarding date
function fowarderDate(){
$shippingDate=$_POST['shippingDate'];
$fowardingDate=$shippingDate-$days;
echo "Your cargo will be transported to the port on",$fowardingDate ;
}
$finFowarderDate=fowarderDate();
?>
