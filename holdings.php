<?php
session_start();



              

$uid=$_SESSION['uid'];
$con= new mysqli("localhost","root","","term_project");
$sql="select * from holdings where customer_id=".$uid;
$r=mysqli_query($con,$sql);
$x=array();
echo"<table border='2px' id='customers'>";
echo "<thead><tr>";
echo "<th>Symbol</th>";
echo "<th>Quantiy</th>";
echo "<th>Atp</th>";
echo "<th>Ltp</th>";
echo "<th>Net P/L</th>";
echo "</tr></thead>";
while($row=mysqli_fetch_assoc($r))
{
		echo "<tr>";
		echo "<td>".$row['symbol']."</td>";
		echo "<td>".$row['quantity']."</td>";
		if ($row['quantity']!=0)

		{
			$atp=$row['investment']/$row['quantity'];
			echo "<td>".$atp."</td>";
		}
		else
		echo "<td>0</td>";

	$url = 'https://query1.finance.yahoo.com/v7/finance/download/'.$row['symbol'].'?period1=1587965953&period2=1619501953&interval=1d&events=history&includeAdjustedClose=true';  
              $data=file_get_contents($url);
              $rowk=explode("\n", $data);
              for($i=0; $i<count($rowk); $i++)
              {
                $day[]=explode(",", $rowk[$i]);
            } 
            $ltp=end($day);
              $ltp=$ltp[4];
              echo "<td>".$ltp."</td>";
       $pl=($row['quantity']*$ltp)-$row['investment'];
       echo "<td>".$pl."</td>";

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