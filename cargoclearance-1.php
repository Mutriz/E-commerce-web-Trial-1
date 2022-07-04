<?php
include_once 'dbcon.php';
include_once 'header.php';
?>
<style type="text/css">

</style>

<center><h2 style="font-family: md script; font-size: 50px; color: #000000; font-style: italic;">Cargo clearance department </h2></center>
 <form method="POST" action="phpcargoclearance.php">
<label>Order ID</label>&nbsp;
  <input type="text" name="order_id">
  <br><br><br><br><br><br>
  <label>Clearance state</label>&nbsp;&nbsp;
  <input type="text" name="clearance_state">
  <br><br><br><br><br><br>
  
<button type="submit" name="saveclearance"><b>Save</b></button>


 </form>

 <?php
include_once 'footer.php';
?>