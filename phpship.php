<?php
include_once 'dbcon.php';


if(isset($_POST)){
  $ship_id= $_POST['ship_id'];
  $email=$_POST['email'];
  $country_of_origin=$_POST['country_of_origin'];
  $departure_date= $_POST['departure_date'];
  $arrival_kenya=$_POST['arrival_kenya'];
  $departure_kenya=$_POST['departure_kenya'];
  $destination= $_POST['destination'];
  $arrival_destination=$_POST['arrival_destination'];
  $available_space=$_POST['available_space'];
  $charge_per_container= $_POST['charge_per_container'];

//inserting values to database

$query="INSERT INTO ship(ship_id,email,country_of_origin,departure_date,arrival_kenya,departure_kenya,
destination,arrival_destination,available_space,charge_per_container)
	VALUES('$ship_id','$email','$country_of_origin','$departure_date','$arrival_kenya','$departure_kenya','$destination','$arrival_destination','$available_space','$charge_per_container')";
  $querysave=mysqli_query($conn,$query);
}

?>