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
  <a href="customer.php">Book ship</a>    
  <a href="c-note.php">View notifications</a>   
  <a href="order_update.php">Update order</a>       
</div>

<div id="main">
  <h2><span style="font-size:30px;cursor:pointer" onclick="openNav()">☰ </span> <b>CUSTOMER</b> &nbsp;   &nbsp;  <i></i><a href="logout.php"><button name="logoutindex" type="Submit" class="btn"  style="color:#ffffff;background-color:#112235;  float: right; margin-right: 20px; ">Logout</button></a></h2>
  <?php
//function for filling countries into the select box
function fill_country($conn){
  $output='';
  $sql="SELECT * FROM countries";
  $result=mysqli_query($conn,$sql);

  while ($row=mysqli_fetch_array($result)) {
    $output .='<option value="'.$row["country_name"].'">'.$row["country_name"].'</option>';
  } 
  return $output;
}

?>

<form name="cargo_details" method="POST" action="order_updatelogic.php" enctype="multipart/form-data">
     <label>Destination:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <select id="destination" name = "destination" style="height: 25px; width: 150px;">
              <?php echo fill_country($conn) ?>
            </select>     
             <br><br><br>
             <label>Available shipping dates:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             <select id="show_date" name="show_date" type="date" style="height: 25px; width: 150px;">
             </select>
             <br><br><br>
             <label>Perishability of goods</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <select id="goods_perishability" name = "goods_perishability" style="height: 25px; width: 150px;">
               <option value = "perishable">perishable</option>
               <option value = "non-perishable">non-perishable</option>
             </select>   
             <br><br><br>
             <label>Type of goods:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <select id="goods_type" name = "goods_type" style="height: 25px; width: 150px;">
               <option value = "delicate">delicate</option>
               <option value = "non-delicate">non-delicate</option>
             </select>  
             <br><br><br>
             <label>Weight of goods(tonnes):</label>
             <input type="text"  name="goods_weight">
             <br><br><br>
             <label>Your current location:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             <input type="text" name="current_location">
             <br>
             <button name="submit" type="submit" class="btn btn success">Save</button> 
</form>

<?php
include_once 'footer.php';
?> 
<script>  
 $(document).ready(function(){  
      $('#destination').change(function(){  
           var id = $(this).val();  
           $.ajax({  
                url:"availabledates.php",  
                method:"POST",  
                data:{id:id,},  
                success:function(data){  
                     $('#show_date').html(data);  
                }  
           });  
      });  
 });  
 </script>  
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

