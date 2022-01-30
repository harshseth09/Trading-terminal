<?php
session_start();
$sql="select * from transactions where user_id=".$_SESSION['uid'];
$con= new mysqli("localhost","root","","term_project");
$r=mysqli_query($con,$sql);
echo"<table border='2px' id='customers'>";
echo "<thead><tr>";
echo "<th>transaction date</th>";
echo "<th>order id</th>";
echo "<th>transaction type</th>";
echo "<th>transaction amount</th>";
echo "</tr></thead>";
while($row=mysqli_fetch_assoc($r))
{
		echo "<tr>";
		echo "<td>".$row['trans_date']."</td>";
		echo "<td>".$row['order_id']."</td>";
		echo "<td>".$row['transaction_type']."</td>";
		echo "<td>".$row['transaction_amount']."</td>";
}
echo "</table>";

echo "<style>";
echo "#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #4CAF50;
  color: white;
}
</style>";
?>