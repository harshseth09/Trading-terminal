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
<body>
<?php
session_start();
$con= new mysqli("localhost","root","","term_project");
$symbol=$_SESSION['stock'];
$uid=$_SESSION['uid'];
echo '<form  style="border:1px solid #ccc" action=buy_sell.php method=POST>
  <div class="container">
    <h1>'.$symbol.'= Rs'.$_SESSION['price'].'</h1>
    <hr>
    <label for="quantity"><b>Quantity</b></label>
    <input type="text" placeholder="Enter quantity" name="quantity" required>
    <div class="clearfix">
      <button type="submit" name=sell class="cancelbtn">Sell</button>
      <button type="submit" name=buy class="signupbtn">Buy</button>
    </div>
  </div>
</form>';
if(isset($_POST['buy'])||isset($_POST['sell']))
{
$quantity=$_POST['quantity'];
$sql="select net from net where user_id=".$_SESSION['uid'];
$result=mysqli_query($con,$sql);
$net=mysqli_fetch_assoc($result);
$cost=$_POST['quantity']*$_SESSION['price'];
$query="select * from holdings where customer_id=".$uid." and symbol='".$symbol."'";
$r=mysqli_query($con,$query);
$check=mysqli_num_rows($r);
if($check==0)
{
  $q1="insert into holdings(customer_id,symbol,quantity,investment)values(".$uid.",'".$symbol."',0,0)";
  mysqli_query($con,$q1);
}

if($cost>$net['net'])
  echo "Insufficient funds";
else
{
  if(isset($_POST['buy']))
  {
    
    $sql4="update holdings set investment=investment+".$cost.", quantity=quantity+".$quantity." where customer_id=".$uid." and symbol='".$symbol."'";
    mysqli_query($con,$sql4);
    $x=mt_rand(0,mt_getrandmax());
    echo $x;
    $sql1='insert into transactions(user_id,trans_date,transaction_type,order_id,transaction_amount) values('.$uid.',curdate(),"buy",'.$x.','.$cost.')';

    $sql2='insert into stocks(user_id,order_id,transaction_date,quantity,symbol)values('.$uid.','.$x.',curdate(),'.$quantity.',"'.$symbol.'")';

    $sql3="update net set net=net-".$cost." where user_id=".$_SESSION['uid'];

    mysqli_query($con,$sql1);
    mysqli_query($con,$sql2);
    mysqli_query($con,$sql3);
  }

  if(isset($_POST['sell']))
  {
    $quantity=(-1)*$quantity;
    echo "hellow";
    $x=mt_rand(0,mt_getrandmax());
    echo $x;
    $sql1='insert into transactions(user_id,trans_date,transaction_type,order_id,transaction_amount) values('.$uid.',curdate(),"sell",'.$x.','.$cost.')';

    $sql2='insert into stocks(user_id,order_id,transaction_date,quantity,symbol)values('.$uid.','.$x.',curdate(),'.$quantity.',"'.$symbol.'")';

    $sql3="update net set net=net+".$cost." where user_id=".$_SESSION['uid'];

    mysqli_query($con,$sql1);
    mysqli_query($con,$sql2);
    mysqli_query($con,$sql3);
    $sql4="update holdings set investment=investment-".$cost.", quantity=quantity+".$quantity." where customer_id=".$uid." and symbol='".$symbol."'";
    mysqli_query($con,$sql4);
  }
  $query="select * from holdings where customer_id=".$uid." and symbol='".$symbol."'";
  $t=mysqli_query($con,$query);
  $row=mysqli_fetch_assoc($t);
  if( $row['quantity']==0)
  {
    $s="delete from holdings where customer_id=".$uid." and symbol='".$symbol."'";
    mysqli_query($con,$s);
  }

}
}
?>
</body>
</html>