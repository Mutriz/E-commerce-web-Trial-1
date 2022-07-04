<?php
include_once 'dbcon.php';
include_once 'header.php';
session_start();
if($_SESSION["login_user"] != true) {
     header("Location: index.php");
}
//echo '<pre>' . print_r($_SESSION, TRUE) . '</pre>';
?>
<!DOCTYPE html>
<html>
<style>
body {
    font-family: "Lato", sans-serif;
}
h2{
  background-color: #112235;
  height: 75px;
  color: #ffffff;
  margin:0;
  padding-top: 20px;
  padding-left: 20px;
}

.sidenav {
    height: 100%;
    width: 0;
    position: fixed;
    z-index: 1;
    top: 0;
    left: 0;
    background-color: #112235;
    overflow-x: hidden;
    transition: 0.5s;
    padding-top: 60px;
}

.sidenav a {
    padding: 8px 8px 8px 32px;
    text-decoration: none;
    font-size: 25px;
    color: #ffffff;
    display: block;
    transition: 0.3s
}

.sidenav a:hover, .offcanvas a:focus{
    color: #818181;
}

.closebtn {
    position: absolute;
    top: 0;
    right: 25px;
    font-size: 36px !important;
    margin-left: 50px;
}

#main {
    transition: margin-left .8s;
    padding: 16px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
</style>

<body>

<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
  <a href="readuser.php">Read user</a>    
  <a href="deleteuser.php">Delete user</a>    
  <a href="readshipper.php">Read shipper</a>    
  <a href="deleteshipper.php">Delete shipper</a>
  <a href="setcharge.php">Set charge</a>    
  <a href="bookship.php">Book ship</a>    
  <a href="write-note.php">Send notification</a>    
  <a href="readorder.php">View order</a>
  <a href="deleteorder.php">Delete order</a> 
  <a href="paymentupdate.php">Update payment</a>       
</div>

<div id="main">
  <h2><span style="font-size:30px;cursor:pointer" onclick="openNav()">☰ </span> <b>ADMINISTRATOR</b> &nbsp;   &nbsp;  <i>Book a ship</i><a href="logout.php"><button name="logoutindex" type="Submit" class="btn"  style="color:#ffffff;background-color:#112235;  float: right; margin-right: 20px;">Logout</button></a></h2>
  <?php
if (isset($_POST['submit']))
{
if (isset($_POST['order_id'])&&
    ($_POST['container_id'])&&
    ($_POST['fleet_id'])){
  $order_id=$_POST['order_id'];
  $container_id=$_POST['container_id'];
  $fleet_id=$_POST['fleet_id'];
 
  
  $sql2="INSERT INTO booking_details(order_id,container_id,fleet_id)
  VALUES ('$order_id','$container_id','$fleet_id')";
  $sql3=mysqli_query($conn,$sql2);
}if($sql3=true){  
  $message = "Successfully booked";
  $booked_order = "UPDATE shipping_order SET book_status = '1' WHERE order_id='$order_id'";
    $result=mysqli_query($conn,$booked_order);
  $fleet_booked = "UPDATE fleet SET status = '0' WHERE fleet_id='$fleet_id'";
    $result=mysqli_query($conn,$fleet_booked);
    $container_booked = "UPDATE warehouse SET status = '0' WHERE container_id='$container_id'";
    $result=mysqli_query($conn,$container_booked);
    //get destination
  $sql="SELECT destination FROM shipping_order WHERE order_id='$order_id'";
  $getdestination=mysqli_query($conn,$sql);
  $row=mysqli_fetch_row($getdestination);
  $getdestination=$row[0];

  ///////////get date for shipping
  // $shipping_date=$_POST['shipping_date'];
  $sql="SELECT shipping_date FROM shipping_order WHERE order_id='$order_id'";
  $getdateship=mysqli_query($conn,$sql);
  $row=mysqli_fetch_row($getdateship);
  $getdateship=$row[0];
  //update available space in the ship
    //$available_space=$_POST['available_space'];
  $sql="SELECT available_space FROM ship WHERE departure_kenya='$getdateship' AND destination='$getdestination'";
  $getspace=mysqli_query($conn,$sql);
  $row=mysqli_fetch_row($getspace);
  $getspace=$row[0];
/*get ship id
   $ship_id=$_POST['ship_id'];
  $sql="SELECT ship_id FROM ship WHERE departure_kenya='$getdateship' AND destination='$getdestination'";
  $getshipid=mysqli_query($conn,$sql);
  $row=mysqli_fetch_row($getshipid);
  $getshipid=$row[0];*/

  //updating the available space on ship
    $n=1;
    $booked_ship = "UPDATE ship SET available_space = ($getspace-$n) WHERE  departure_kenya='$getdateship' AND destination='$getdestination'";
    $result=mysqli_query($conn,$booked_ship);
   
}else{  
  $message = "Could not secure a container"; 
}
  echo "<script type='text/javascript'>alert('$message');</script>";
}?>

<?php
//function for filling order ids into the select box
function fill_orderid($conn){
  $output='';
  $sql="SELECT * FROM shipping_order WHERE pay_status='1' AND book_status='0'";
  $result=mysqli_query($conn,$sql);

  while ($row=mysqli_fetch_array($result)) {
    $output .='<option value="'.$row["order_id"].'">'.$row["order_id"].'</option>';
  } 
  return $output;
}

?>

<?php
//function for filling container ids into the select box
function fill_containerid($conn){
  $output='';
  $sql="SELECT * FROM warehouse WHERE status='1'";
  $result=mysqli_query($conn,$sql);

  while ($row=mysqli_fetch_array($result)) {
    $output .='<option value="'.$row["container_id"].'">'.$row["container_id"].'</option>';
  } 
  return $output;
}

?>

<?php
//function for filling fleet ids into the select box
function fill_fleetid($conn){
  $output='';
  $sql="SELECT * FROM fleet WHERE status='1'";
  $result=mysqli_query($conn,$sql);

  while ($row=mysqli_fetch_array($result)) {
    $output .='<option value="'.$row["fleet_id"].'">'.$row["fleet_id"].'</option>';
  } 
  return $output;
}

?>

<center><form name="booking_details" method="POST" action="bookship.php" enctype="multipart/form-data" style="margin-top: 40px;">
    <label>Order id:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <select id="order_id" name = "order_id" style="height: 25px; width: 150px;">
              <?php echo fill_orderid($conn) ?>
            </select>     
             <br><br><br><br>
               <label>Container id:</label>&nbsp;
             <select id="container_id" name = "container_id" style="height: 25px; width: 150px;">
              <?php echo fill_containerid($conn) ?>
            </select>     
             <br><br><br><br>
               <label>Fleet id:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             <select id="fleet_id" name = "fleet_id" style="height: 25px; width: 150px;">
              <?php echo fill_fleetid($conn) ?>
            </select>     
             <br><br><br><br>
            
             <button name="submit" type="submit" class="btn btn-success">Save</button> 
</form></center>


  </div>
<script>
function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
    document.getElementById("main").style.marginLeft = "250px";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    document.getElementById("main").style.marginLeft= "0";
}
</script>
     
</body>

</html>

<?php
include_once 'footer.php';
?> 



 