<?php
include_once 'dbcon.php';
include_once 'header.php';
session_start();
if($_SESSION["login_user"] != true) {
     header("Location: index.php");
}
?>
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
  <h2><span style="font-size:30px;cursor:pointer" onclick="openNav()">☰ </span> <b>ADMINISTRATOR</b> &nbsp;   &nbsp;  <i>Set charges</i><a href="logout.php"><button name="logoutindex" type="Submit" class="btn"  style="color:#ffffff;background-color:#112235;  float: right; margin-right: 20px;">Logout</button></a></h2>
 <center><form method="POST" action="setcharge.php" style="margin-top: 40px;" >
<label>Container capacity</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <input type="text" name="container_capacity">
  <br><br>
  <label>price per kilometer</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <input type="text" name="price_per_km">
  <br><br>
  <label>warehouse cost per container</label>
  <input type="text" name="container_cost_wh">
  <br><br>
  
<button type="submit" name="saveships" class="btn" style="background-color: green;"><b>Save</b></button>


 </form></center>

<?php
if(isset($_POST['saveships'])){
  $container_capacity= $_POST['container_capacity'];
  $price_per_km=$_POST['price_per_km'];
  $container_cost_wh=$_POST['container_cost_wh'];
 
//inserting values to database

$query="INSERT INTO container_weight(container_capacity,price_per_km,container_cost_wh)
  VALUES('$container_capacity','$price_per_km','$container_cost_wh')";
  $querysave=mysqli_query($conn,$query);
}
?>
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
 <?php
include_once 'footer.php';
?>
