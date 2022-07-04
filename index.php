<?php
include_once 'dbcon.php';



if (isset($_POST['submit']))
{
	$email=mysqli_real_escape_string($conn, $_POST['email']);
	$pw=mysqli_real_escape_string($conn,$_POST['pw']);
	$pw=md5($pw);

	$sql_customer = "SELECT * FROM customer WHERE email = '$email' AND '$pw'";
	$sql_admin = "SELECT * FROM admin WHERE email = '$email' AND '$pw'";
	$sql_employee = "SELECT * FROM employee WHERE email = '$email' AND '$pw'";
	$sql_shipper = "SELECT * FROM shipper WHERE email = '$email' AND '$pw'";

	$query_customer=mysqli_query($conn,$sql_customer);
	$query_admin=mysqli_query($conn,$sql_admin);
	$query_employee=mysqli_query($conn,$sql_employee);
	$query_shipper=mysqli_query($conn,$sql_shipper);
		
		/*login for customer*/
		$result_customer = mysqli_num_rows($query_customer);
		$result_admin = mysqli_num_rows($query_admin);
		$result_employee = mysqli_num_rows($query_employee);
		$result_shipper = mysqli_num_rows($query_shipper);

		if($result_customer==1){
			session_start();
		    // Initializing Session
		    $_SESSION['login_user'] = $email;
		    $user_check=$_SESSION['login_user']; 
		    $ses_sql=mysqli_query("SELECT email from customer where email='$user_check'", $conn); 
			$row = mysqli_fetch_assoc($ses_sql); 
			$login_session =$row['email']; 		    
		    header("Location:customerpage.php");
		   
		}
		/*login for admin*/
		
		elseif($result_admin==1){
			 $_SESSION['login_user'] = $email;
		    $user_check=$_SESSION['login_user']; 
		    $ses_sql=mysqli_query("SELECT email from admin where email='$user_check'", $conn); 
			$row = mysqli_fetch_assoc($ses_sql); 
			$login_session =$row['email']; 		
			header("Location:admin/dashboard.php");
		}
		/*login for employee*/
		
		elseif($result_employee==1){
			header("Location:employee.php");
		}
		/*login for shipper*/
		
		elseif($result_shipper==1){
			header("Location:ship.php");
		}else{
			$message= "Invalid username or password";
			echo "<script type='text/javascript'>alert('$message');</script>";
		}
		
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" href="css/bootstrap.css">
</head>
<script type="text/javascript">
	function validate()	{
		var EmailId=document.getElementById("email");
		var atpos = EmailId.value.indexOf("@");
    	var dotpos = EmailId.value.lastIndexOf(".");
		var pw=document.getElementById("pw");
		if (atpos<1 || dotpos<atpos+2 || dotpos+2>=EmailId.value.length) 
		{
        	alert("Enter valid email-ID");
			EmailId.focus();
        	return false;
   		}
		return true;
	}
</script>
<style type="text/css">
body{
		background-image: url(images/paris.jpg);
		margin:0;
		background-repeat: no-repeat;
		background-size: cover;
		background-position: center;
		background-attachment: fixed;
	}
	.loginform{
		background-color: rgba(255,255,255,0.5);
		color: #000000;
		margin-top: 200px;
		margin-bottom: 200px;
		margin-right: 400px;
		margin-left: 400px;
		padding: 60px;
		border-radius: 15px;
}

	
</style>
<body>
	<div class="loginform">
	<form id="login" action="index.php" onsubmit="return validate()" method="post" name="login">
	<center><h3>Login</h3>
		<br>
	<label>Email:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
	<input type="text" id="email" size="30" maxlength="30" name="email"/>
	<br><br>
	<label>Password:</label>
	<input type="password" id="pw" size="30" maxlength="30" name="pw"/></center>
	<br>	
	<center><input type="Submit" value="Submit" name="submit" id="submit" class="button"></center>
	<br><br>
	<p>Don't have an account?&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="register.php"><b>Sign up</b></a></p>
	</form>
	</div>
</body>
</html>