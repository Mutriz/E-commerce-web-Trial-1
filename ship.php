<?php
include_once 'dbcon.php';
include_once 'header.php';
?>
<style type="text/css">

</style>

<center><h2 style="font-family: md script; font-size: 50px; color: #000000; font-style: italic;">Make your reservations </h2></center>
 <form method="POST" action="phpship.php">
<label>Ship ID</label>&nbsp;
  <input type="text" name="ship_id">
  <br><br><br><br><br><br>
  <label>Email</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <input type="email" name="email">
  <br><br><br><br><br><br>
  <label>Country of origin</label>&nbsp;&nbsp;
  <input type="text" name="country_of_origin">
  <br><br><br><br><br><br>
  <label>Departure date</label>
  <!--<div id="datepicker" class="input-group date" date-date-format="dd-mm-yyyy">-->
  <input type="date" name="departure_date">
  <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span> 
 <!-- </div>-->
  <script type="text/javascript">
    $(function(){
        $("#datepicker").datepicker({
          autoclose:true,
          todayHighlight:true
        }).datepicker('update', new Date());
    });
  </script>
  <br><br><br><br><br><br>
   <label>Arrival date Kenya</label>
  <!--<div id="datepicker" class="input-group date" date-date-format="dd-mm-yyyy">-->
  <input type="date" name="arrival_kenya">
  <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span> 
 <!-- </div>-->
  <script type="text/javascript">
    $(function(){
        $("#datepicker").datepicker({
          autoclose:true,
          todayHighlight:true
        }).datepicker('update', new Date());
    });
  </script>
  <br><br><br><br><br><br>
   <label>Departure date Kenya</label>
  <!--<div id="datepicker" class="input-group date" date-date-format="dd-mm-yyyy">-->
  <input type="date" name="departure_kenya">
  <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span> 
 <!-- </div>-->
  <script type="text/javascript">
    $(function(){
        $("#datepicker").datepicker({
          autoclose:true,
          todayHighlight:true
        }).datepicker('update', new Date());
    });
  </script>
  <br><br><br><br><br><br>
   <label>Destination</label>&nbsp;
  <input type="text" name="destination">
  <br><br><br><br><br><br>
  
  <label>Arrival date destination</label>
  <!--<div id="datepicker" class="input-group date" date-date-format="dd-mm-yyyy">-->
  <input type="date" name="arrival_destination">
  <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span> 
 <!-- </div>-->
  <script type="text/javascript">
    $(function(){
        $("#datepicker").datepicker({
          autoclose:true,
          todayHighlight:true
        }).datepicker('update', new Date());
    });
  </script>
  <br><br><br><br><br><br>
   <label>Available space</label>&nbsp;
  <input type="text" name="available_space">
  <br><br><br><br><br><br>
   <label>Charge per container</label>&nbsp;
  <input type="text" name="charge_per_container">
  <br><br><br><br><br><br>
 
<button type="submit" name="saveships"><b>Save</b></button>


 </form>

 <?php
include_once 'footer.php';
?>