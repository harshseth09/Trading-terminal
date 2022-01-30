<html>
	<head>
		<title>Login Page</title>

	</head>
<h1 class="h1s">Create Account </h1>
<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box}

input[type=text], input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}

button {
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

button:hover {
  opacity:1;
}

.cancelbtn {
  padding: 14px 20px;
  background-color: #f44336;
}

.cancelbtn, .signupbtn {
  float: left;
  width: 50%;
}

.container {
  padding: 16px;
}

.clearfix::after {
  content: "";
  clear: both;
  display: table;
}

@media screen and (max-width: 300px) {
  .cancelbtn, .signupbtn {
     width: 100%;
  }
}
</style>
<body>



<?php
$conn= new mysqli("localhost","root","","term_project");
echo "<form method=POST>";
if (isset($_POST['submit']))
{
	echo "<div class='container'>";
   echo "<h1>Sign Up</h1><p>Please fill in this form to create an account.</p><hr>";


   echo "<label for='first_name'><b>First name</b></label><input type='text' placeholder='".$_POST['first_name']."' name='first_name' required>";
   echo "<label for='last_name'><b>First name</b></label><input type='text' placeholder='".$_POST['last_name']."' name='last_name' required>";
   echo "<label for='user_name'><b>User name</b></label><input type='text' placeholder='".$_POST['user_name']."' name='user_name' required>";
   echo "<label for='email'><b>Email</b></label><input type='text' placeholder='".$_POST['email']."' name='email' required>";
   echo "<label for='address'><b>Address</b></label><input type='text' placeholder='".$_POST['address']."' name='address' required>";
   echo "<label for='city'><b>City</b></label><input type='text' placeholder='".$_POST['city']."' name='city' required>";
   echo "<label for='state'><b>State</b></label><input type='text' placeholder='".$_POST['state']."' name='state' required>";
   echo "<label for='aadhar'><b>Aadhar</b></label><input type='text' placeholder='".$_POST['aadhar']."' name='aadhar' required>";
   echo "<label for='mobile_number'><b>Mobile number</b></label><input type='text' placeholder='".$_POST['mobile_number']."' name='mobile_number' required>";
   echo "<label for='password'><b>Password</b></label><input type='text' placeholder='".$_POST['password']."' name='password' required>";
   echo "<label for='confirm_password'><b>Confirm Password</b></label><input type='text' placeholder='".$_POST['confirm_password']."' name='confirm_password' required>";


   echo "<div class='clearfix'><button type='button' class='cancelbtn'>Cancel</button><button type='submit' class='signupbtn' name=submit>Sign Up</button>";
    echo "</div></div>";
}
else
{
echo "<div class='container'>";
   echo "<h1>Sign Up</h1><p>Please fill in this form to create an account.</p><hr>";

   echo "<label for='first_name'><b>First name</b></label><input type='text' placeholder='Enter first name' name='first_name' required>";

   echo "<label for='last_name'><b>Last name</b></label><input type='text' placeholder='Enter last name' name='last_name' required>";

   echo "<label for='user_name'><b>User name</b></label><input type='text' placeholder='Enter user name' name='user_name' required>";

   echo "<label for='email'><b>Email</b></label><input type='text' placeholder='Enter Email' name='email' required>";

   echo "<label for='address'><b>Address</b></label><input type='text' placeholder='Enter address' name='address' required>";

   echo "<label for='city'><b>City</b></label><input type='text' placeholder='Which City do you stay in' name='city' required>";

   echo "<label for='state'><b>State</b></label><input type='text' placeholder='Which state do you stay in' name='state' required>";

   echo "<label for='aadhar'><b>Aadhar</b></label><input type='text' placeholder='Enter Aadhar number' name='aadhar' required>";

   echo "<label for='mobile_number'><b>Mobile Number</b></label><input type='text' placeholder='Enter mobile number' name='mobile_number' required>";

   echo "<label for='password'><b>Password</b></label><input type='password' placeholder='Enter Password' name='password' required>";

    echo "<label for='confirm_password'><b>Confirm Password</b></label><input type='password' placeholder='Confirm Password' name='confirm_password' required>";
    
  
    
    

    echo "<div class='clearfix'><button type='button' class='cancelbtn'>Cancel</button><button type='submit' class='signupbtn' name=submit>Sign Up</button>";
    echo "</div></div>";
}	

if(isset($_POST['submit']))
{
  
	$user_name=$_POST['user_name'];
	$sql="select * from login where user_name='".$user_name."'";
	$success=1;
	$x=0;
	$r=mysqli_query($conn,$sql);
  if($_POST['password'] != $_POST['confirm_password'])
  {
    $success=0;
    echo"passwords do not match";
  }
	if (mysqli_num_rows($r)>0) 
	{
		echo "this user name has already been taken";
		$success=0;
	}
	if($success==1)
	{	
		
		while(1)
		{
      $x=mt_rand(0,mt_getrandmax());
			$sqlu="select * from login where user_id=".$x;
			if(mysqli_num_rows(mysqli_query($conn,$sqlu))==0)
				break;
		}


		$sql1="insert into login (user_id,eid,first_name,last_name,address,city,state,user_name,aadhar,mobile,password) values(".$GLOBALS['x'].",'".$_POST['email']."','".$_POST['first_name']."','".$_POST['last_name']."','".$_POST['address']."','".$_POST['city']."','".$_POST['state']."','".$_POST['user_name']."','".$_POST['aadhar']."','".$_POST['mobile_number']."','".$_POST['password']."')";
		mysqli_query($conn,$sql1);
		$sql2="insert into net(net,user_id) values(0,".$GLOBALS['x'].")";
    mysqli_query($conn,$sql2);
	
	echo "</form>";



$to = $_POST['email'];
$subject = "Email Subject";

$message = 'Dear '.$_POST['email'].',<br>';
$message .= "your customer id is<br>".$GLOBALS['x']."<BR>";

// Always set content-type when sending HTML email
$headers = 'MIME-Version: 1.0' . '\r\n';
$headers .= 'Content-type:text/html;charset=UTF-8' . '\r\n';

// More headers
$headers .= 'From: <harshseth125@gmail.com>' . '\r\n';
$headers .= 'Cc: harshseth125@gmail.com' . '\r\n';

mail($to,$subject,$message,$headers);


  header('Location:index.html');

}
}
?>