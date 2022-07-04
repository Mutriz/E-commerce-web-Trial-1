<?php
include_once 'dbcon.php';

if (isset($_POST['submit']))
{
$fname= $_POST['fname'];
$lname=$_POST['lname'];
$id_number=$_POST['id_number'];
$phone= $_POST['phone'];
$email=$_POST['email'];
$pw= $_POST['pw'];
$pw=md5($pw);

if(empty($fname) || empty($lname) || empty($id_number) || empty($phone) || empty($email) || empty($pw)){
		$message = "Please fill in all the fields!";
		echo "<script type='text/javascript'>alert('$message');</script>";
		

	}else{
			#validity of mail
			if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
				
				$message = "Please write a valid email";
				echo "<script type='text/javascript'>alert('$message');</script>";
				
			
			}else{
				//username
				$sql="SELECT * FROM vpopmail_add_alias_domain_ex(olddomain, newdomain) WHERE email='$email'";
				$result=mysqli_query($conn,$sql);
				$resultCheck=mysqli_num_rows($result);
				if($resultCheck > 0) {
					$message = "Email address has been taken!";
					echo "<script type='text/javascript'>alert('$message');</script>";
					
				
				}else{
					$sql = "INSERT INTO admin(first_name,last_name,id_number,phone,email,password) VALUES 
					('$fname', '$lname','$id_number','$phone','$email', '$pw')";
							if(mysqli_query($conn, $sql))
						{ 
							$message = "You have been successfully registered";
					 echo "<script type='text/javascript'>alert('$message');</script>";
						}
					header("location: index.php");

				}
				}
			}

	}
	


?>
<HTML>
<HEAD>
<TITLE>Sign up</TITLE>
<link rel="stylesheet" href="css/bootstrap.css">
<style type="text/css">
body {
	margin:0;
		background-image: url(images/paris.jpg);
		background-repeat: no-repeat;
		background-size: cover;
		background-position: center;
		background-attachment: fixed;
		-webkit-background-size: cover;
		-moz-background-size: cover;
		-o-background-size: cover;
		
}

#register_form	{	
	background-color: rgba(255,255,255,0.5);
		color: #000000;
		margin-top: 10px;
		margin-bottom: 10px;
		margin-right: 400px;
		margin-left: 400px;
		padding: 30px;
		border-radius: 15px;
    
}
</style>
</HEAD>
<BODY>

<div id="register_form" align="center" height="200" width="200">
<FORM name="register" method="post" action="adminregister.php" onsubmit="return validate()">

<center><h3>Register</h3></center>
<br>
<label>First name</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<INPUT name="fname" type="TEXT" placeholder="Enter your first name" size="30" maxlength="30" align="center" id="fname">
<br><br>
	<label>Last name</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<INPUT type="TEXT" name="lname" align="center" size="30" maxlength="30" placeholder="Enter your last name" id="lname">
<br><br>
<label>ID number</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<INPUT name="id_number" type="TEXT" placeholder="Enter your id number" size="30" maxlength="30" align="center" id="id_number">
<br><br>
	<label>Phone number</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<INPUT name="phone" type="TEXT" placeholder="Enter your phone number" size="30" maxlength="30" align="center" id="phone">
	<br><br>
	<label>Email Address </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<INPUT name="email" type="TEXT" id="email" placeholder="Enter your E-Mail ID" size="30" maxlength="30">
<br><br>
	<label>Password</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<INPUT type="PASSWORD" name="pw" size="30"  id="pw">
<br><br>
	<label>Confirm password</label>
<INPUT type="PASSWORD" name="cpw" size="30" id="cpw">
<br><br>
<INPUT TYPE="Submit" value="Submit" name="submit" id="submit" class="button">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<INPUT TYPE="Reset" value="Reset" id="reset" class="button"></FORM>
<br>
<p> Already have an account with us?<a href="index.php"><b>Login</b></a></p>
</BODY>
</HTML>