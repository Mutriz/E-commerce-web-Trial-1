<?php
session_start();
if($_SESSION["login_user"] != true) {
     header("Location: index.php");
}
include_once 'dbcon.php';
?>
<!DOCTYPE html>
<html>
 <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/bootstrap.css">
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
  <h2><span style="font-size:30px;cursor:pointer" onclick="openNav()">☰ </span> <b>ADMINISTRATOR</b> &nbsp;   &nbsp;  <i>Send notification</i><a href="logout.php"><button name="logoutindex" type="Submit" class="btn"  style="color:#ffffff;background-color:#112235;  float: right; margin-right: 20px;">Logout</button></a></h2>
  <?php 
          
          if(isset($_POST['submit'])){
              $email= $_POST['email'];
              $message = $_POST['message'];
              $query ="INSERT INTO notifications (email, type, message, status, date) VALUES ('$email', 'comment', '$message', 'unread', CURRENT_TIMESTAMP)";
              $result1=mysqli_query($conn,$query);
              if ($result1=true) {
                echo "sent";
              }else{
                echo "unable to send";
              }
              
          }
          ?>
          <?php
//function for filling email into the select box
function fill_email($conn){
  $output='';
  $sql="SELECT email FROM customer";
  $result=mysqli_query($conn,$sql);

  while ($row=mysqli_fetch_array($result)) {
    $output .='<option value="'.$row["email"].'">'.$row["email"].'</option>';
  } 
  return $output;
}?>
        <center><form method="POST" class="form-inline my-2 my-lg-0" action="write-note.php" style="margin-top: 40px;">
          <label>Email:</label>
          <select id="email" name = "email" class="form-control mr-sm-2">
              <?php echo fill_email($conn) ?>
            </select>
            <br><br>
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <input name="message"class="form-control mr-sm-2" type="text" placeholder="Message" required>
          <br><br>
          <button name="submit" class="btn btn-outline-success my-2 my-sm-0" type="submit">Submit</button>
        </form> </center>
     
 <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="js/bootstrap.bundle.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/bootstrap.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery-3.3.1.min.js"></script>
      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script></html>
       
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