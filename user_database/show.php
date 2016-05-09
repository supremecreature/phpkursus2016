<?php  

include "dbconnect.php";
include "functions.php";
include "header.php";

check_rights(ANONYMOUS);

?>

<html>

<head>
<title>Kasutajate andmebaas</title>
</head>

<body bgcolor=AliceBlue text=DarkGoldenRod link=DarkSlateGray></body>


<h3>Kasutajate vaatamine</h3>


<?php  
  
$query = "SELECT * FROM users WHERE deleted!='1' ORDER BY id_users ASC";

$result = mysql_query($query) OR
die("Ebaõnnestus: " . mysql_error());

echo "<table border=1>";
echo "<th>jrkn</th>";
echo "<th>ID</th>";
echo "<th>kasutajanimi</th>";
echo "<th>nimi</th>";
echo "<th>e-post</th>";
echo "<th>keel</th>";
echo "<th>märkus</th>";
echo "<th>uudiskiri</th>";
echo "<th>aktiivne</th>";
echo "<th>sis. kp.</th>";
echo "<th>muut. kp.</th>";
  
while($row = mysql_fetch_assoc($result))  
{
  $counter++;
  
  echo "<tr>";
  echo "<td>".$counter."</td>";
  echo "<td>".$row['id_users']."</td>";
  echo "<td>".$row['username']."&nbsp;</td>";
  echo "<td>".$row['name']."&nbsp;</td>";
  echo "<td>".$row['email']."&nbsp;</td>";
  echo "<td>".$row['language']."&nbsp;</td>";
  echo "<td>".$row['comment']."&nbsp;</td>";
  echo "<td>".$row['newsletter']."&nbsp;</td>";
  echo "<td>".$row['status']."&nbsp;</td>";
  echo "<td>".$row['date_insert']."</td>";
  echo "<td>".$row['date_change']."</td>";
  echo "</tr>";
  
}

echo "</table>";
  
include "footer.php";

?>
