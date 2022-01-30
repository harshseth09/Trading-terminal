<html>
<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box}

/* Full-width input fields */
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

/* Set a style for all buttons */
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

/* Extra styles for the cancel button */
.cancelbtn {
  padding: 14px 20px;
  background-color: #f44336;
}

/* Float cancel and signup buttons and add an equal width */
.cancelbtn, .signupbtn {
  float: left;
  width: 50%;
}

/* Add padding to container elements */
.container {
  padding: 16px;
}

/* Clear floats */
.clearfix::after {
  content: "";
  clear: both;
  display: table;
}

/* Change styles for cancel button and signup button on extra small screens */
@media screen and (max-width: 300px) {
  .cancelbtn, .signupbtn {
     width: 100%;
  }
}
</style>
<?php
$con= new mysqli("localhost","root","","term_project");
session_start();
$uid=$_SESSION['uid'];
$t="select * from net where user_id=".$uid;
$r=mysqli_query($con,$t);
$row=mysqli_fetch_assoc($r);
echo '<body>
<form  style="border:1px solid #ccc" action="limits.php" method="POST">
  <div class="container">
    <h1>Current Funds=Rs. '.$row["net"].'</h1>
    <hr>
    <label for="amount"><b>Amount</b></label>
    <input type="text" placeholder="Enter amount" name="amount" required>
    <div class="clearfix">
      <button type="submit" name=add class="cancelbtn">Add funds</button>
      <button type="submit" name=withdraw class="signupbtn">Withdraw Funds</button>
    </div>
  </div>
</form>';


if(isset($_POST['add']))
{
  $add=$_POST['amount'];
  $sql="insert into balance(user_id,d_w,date_dw) values(".$uid.",".$add.",curdate())";
  $sql1="update net set net=net+".$add." where user_id=".$uid;
  mysqli_query($con,$sql);
  mysqli_query($con,$sql1);
  echo "amount has been successfully added";
}
if(isset($_POST['withdraw']))
{
  $sub=-1*$_POST['amount'];
  $sql="select net from net where user_id=".$uid;
  $result=mysqli_query($con,$sql);
  $row=mysqli_fetch_assoc($result);
  if($row['net']<$_POST['amount'])
    echo "error invalid amount";
  else
   {
  $sql="insert into balance(user_id,d_w,date_dw) values(".$uid.",".$sub.",curdate())";
  $sql1="update net set net=net+".$sub." where user_id=".$uid;
  mysqli_query($con,$sql);
  mysqli_query($con,$sql1);
  echo "amount has been withdrawn";
  }
}
?>

</body>
</html>