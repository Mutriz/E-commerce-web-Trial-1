<?php
include_once 'dbcon.php';
include_once 'header.php';
session_start();
?>
<?php
if (isset($_POST['submit'])){
if (isset($_POST['destination'])&&
		($_POST['show_date'])&&
		($_POST['goods_perishability'])&&	
		($_POST['goods_type'])&&
		($_POST['goods_weight'])&&
		($_POST['current_location'])){
	$destination=$_POST['destination'];
	$show_date=$_POST['show_date'];
	$goods_perishability=$_POST['goods_perishability'];
	$goods_type=$_POST['goods_type'];
	$goods_weight=$_POST['goods_weight'];
	$current_location=$_POST['current_location'];
	$user_check=$_SESSION['login_user'];
	$sql2="UPDATE shipping_order SET destination='$destination',shipping_date='$show_date',
	goods_perishability='$goods_perishability',goods_type='$goods_type',goods_weight='$goods_weight',
	current_location= '$current_location' WHERE email='$user_check'";
	$sql3=mysqli_query($conn,$sql2);
}if($sql=true){  
	$message = "Successfully updated";
}else{  
	$message = "Could not update your data"; 
}
	echo "<script type='text/javascript'>alert('$message');</script>";
}
?>

<?php
//calculate the number of containers needed for the weight of goods
$sql="SELECT container_capacity FROM container_weight WHERE id=1;";
$container_weightt=mysqli_query($conn,$sql);
$row=mysqli_fetch_row($container_weightt);
$container_weightt=$row[0];
//$user_check=$_SESSION['login_user'];
//$sql2="SELECT goods_weight FROM shipping_order WHERE email='$user_check';";
//$weight=mysqli_query($conn,$sql2);
//$row=mysqli_fetch_row($weight);
//$weight=$row[0];
$weight=$_POST["goods_weight"];
$numberOfContainers=$weight/$container_weightt;


//price per cargo--set by shipping company 
$destination=$_POST['destination'];
	$sql="SELECT charge_per_container FROM ship WHERE destination='$destination'";
	$containerPrice=mysqli_query($conn,$sql);
	$row=mysqli_fetch_row($containerPrice);
	$containerPrice=$row[0];
	$numberOfContainers;
	$totalCargoPrice=$containerPrice*$numberOfContainers;
	
//price of shipping as per distance--set by shipping company
//price per km
	$destination=$_POST['destination'];
	$sql="SELECT cost_per_km FROM ship WHERE destination='$destination'";
	$shipPrice=mysqli_query($conn,$sql);
	$row=mysqli_fetch_row($shipPrice);
	$shipPrice=$row[0];
	/// retrieve distance from db ////
	$destination=$_POST['destination'];
	$sql="SELECT distance_km FROM countries WHERE country_name='$destination'";
	$shipDistance=mysqli_query($conn,$sql);
	$row=mysqli_fetch_row($shipDistance);
	$shipDistance=$row[0];
	$totalShipPrice=$shipPrice*$shipDistance;

//freight fowarding price as per distance
	// retrieve fowarder price from db 
	$destination=$_POST['destination'];
	$sql="SELECT price_per_km FROM container_weight WHERE id=1";
	$fowarder_price=mysqli_query($conn,$sql);
	$row=mysqli_fetch_row($fowarder_price);
	$fowarder_price=$row[0];
	// retrieve distance from db 
	$current_location=$_POST['current_location'];
	$sql="SELECT distance_km FROM counties WHERE county='$current_location'";
	$landDistance=mysqli_query($conn,$sql);
	$row=mysqli_fetch_row($landDistance);
	$landDistance=$row[0];
	$totalFowarderPrice=$fowarder_price*$landDistance;

//warehouse charges as per days and number of containers
	$days=12;
	$sql="SELECT container_cost_wh FROM container_weight WHERE id=1";
	$warehouse_price=mysqli_query($conn,$sql);
	$row=mysqli_fetch_row($warehouse_price);
	$warehouse_price=$row[0];
	$totalwarehousePrice=$warehouse_price*$days;

//freight fowarding date
$show_date=$_POST['show_date'];
//$fowardingDate=date_create('$show_date')->date_modify('-12 days')->date_format('yyyy-mm-dd');
$fowardingDate=date('Y-m-d',strtotime('-12 days',strtotime($show_date)));
/*function fowarderDate(){
$shippingDate=$_POST['shippingDate'];
$fowardingDate=$shippingDate-$days;
echo "Your cargo will be transported to the port on",$fowardingDate ;
}*/
?>
<form class="form-horizontal" action="cargodetails.php" method="post">
<fieldset>

<center>
<legend>Your cargo details</legend>
<!--//calculate the number of containers needed for the weight of goods-->
<div class="form-group">
  <label class="col-md-4 control-label" for="">Number of containers</label>  
  <div class="col-md-4">
  <input id="number_containers" name="number_containers" type="text" value="<?php echo $numberOfContainers; ?>" class="form-control input-md" readonly>
    
  </div>
</div>

<!-- price per container-->
<div class="form-group">
  <label class="col-md-4 control-label" for="">Total price of container(s)(Ksh)</label>  
  <div class="col-md-4">
  <input id="price_container" name="price_container" type="text" value="<?php echo $totalCargoPrice; ?>" class="form-control input-md" readonly>
    
  </div>
</div>

<!-- //price of shipping as per distance-->
<div class="form-group">
  <label class="col-md-4 control-label" for="">Shipping cost(Ksh)</label>  
  <div class="col-md-4">
  <input id="shipping_cost" name="shipping_cost" type="text" value="<?php echo $totalShipPrice;?>" class="form-control input-md" readonly>
    
  </div>
</div>

<!-- freight fowarding price -->
<div class="form-group">
  <label class="col-md-4 control-label" for="">Freight fowarding cost</label>  
  <div class="col-md-4">
  <input id="fowarder_cost" name="fowarder_cost" type="text" value="<?php echo $totalFowarderPrice ;?>"  class="form-control input-md" readonly>
    
  </div>
</div>

<!-- warehouse charges-->
<div class="form-group">
  <label class="col-md-4 control-label" for="">Warehousing cost</label>  
  <div class="col-md-4">
  <input id="warehouse_cost" name="warehouse_cost" type="text" value="<?php echo $totalwarehousePrice;?>" class="form-control input-md" readonly>
    
  </div>
</div>

<!-- freight fowarding date-->
<div class="form-group">
  <label class="col-md-4 control-label" for="">freight fowarding date</label>  
  <div class="col-md-4">
  <input id="ff_date" name="ff_date" type="text" value="<?php echo $fowardingDate ;?>" class="form-control input-md" readonly>
    
  </div>
</div>

<!-- Button (Double) -->
<div class="form-group">
  <label class="col-md-4 control-label" for="submit"></label>
  <div class="col-md-8">
    <button id="submit" name="submit" class="btn btn-success">Submit</button>
    <!--<button id="cancel" name="cancel" class="btn btn-danger">Cancel</button>-->
  </div>
</div>
</center>
</fieldset>
</form>