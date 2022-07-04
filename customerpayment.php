<?php
session_start();
include_once 'dbcon.php';

    
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <title>Make payment</title>
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/bootstrap.css">
  </head>

  <body>
    <br><br>
   <h2>Make payment</h2>    
<label>Bank account number</label><legend>Barclays: 9876543223</legend>
<output>1.Deposit your money in the bank account number provided.</output>
<br>
<output>2. Scan the bank slip.</output>
<br>
<output>3.Attach the bank slip below and send it to us.</output>
<br>
<output>4. Remember to write your email below</output>
  
     
<?php 
          $targetfolder="paymentslips/";
          
          if(isset($_POST['submit'])){
              $email= $_POST['email'];
              $bankslip=$_FILES['bankslip']['name'];
              $targetfolder=$targetfolder.basename($_FILES['bankslip']['name']);
              $query ="INSERT INTO payment (email, bankslip,type,status) VALUES ('$email', '$bankslip','payment','unread')";
              $result1=mysqli_query($conn,$query);
              move_uploaded_file($_FILES['bankslip']['tmp_name'], $targetfolder);
              }
              
    
          ?>
          
        <form method="POST" class="form-inline my-2 my-lg-0" action="customerpayment.php" enctype="multipart/form-data">
          <input name="email"class="form-control mr-sm-2" type="email" placeholder="Email" required>
             <input type="file" name="bankslip" size="50000"> 
          <button name="submit" class="btn btn-outline-success my-2 my-sm-0" type="submit">Submit</button>
        </form> 
      
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
       



    </body>
    