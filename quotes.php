<?php
$s=$_POST['search'];
$url = 'https://query1.finance.yahoo.com/v7/finance/download/'.$s.'?period1=1589174996&period2=1620710996&interval=1d&events=history&includeAdjustedClose=true';
$data=file_get_contents($url);
$row=explode("\n", $data);
for($i=0; $i<count($row); $i++)
{
	$day[]=explode(",", $row[$i]);
}
echo"<table border='2px' id='customers'>";
echo "<thead>";
echo "<tr>";
echo "<th>".$day[0][0]."</th>";
echo "<th>".$day[0][1]."</th>";
echo "<th>".$day[0][2]."</th>";
echo "<th>".$day[0][3]."</th>";
echo "<th>".$day[0][4]."</th>";
echo "<th>".$day[0][5]."</th>";
echo "<th>".$day[0][6]."</th>";
echo "</tr>";
echo "</thead>";
	
for($i=1; $i<count($row);$i++)
{
	echo "<tr>";
	echo "<td>".$day[$i][0]."</td>";
	echo "<td>".$day[$i][1]."</td>";
	echo "<td>".$day[$i][2]."</td>";
	echo "<td>".$day[$i][3]."</td>";
	echo "<td>".$day[$i][4]."</td>";
	echo "<td>".$day[$i][5]."</td>";
	echo "<td>".$day[$i][6]."</td>";
	echo "</tr>";
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









