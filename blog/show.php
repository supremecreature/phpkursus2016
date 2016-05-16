<?php

include "dbconnect.php";
include "header.php";
$query = "SELECT * FROM blog WHERE deleted != '1' ORDER BY id_blog DESC";

#database query
$result = mysql_query($query) OR
die("Ebaõnnestus: " . mysql_error());

echo "<table border=1>";
echo "<th>jrkn</th>";
echo "<th>id</th>";
echo "<th>pealkiri</th>";
echo "<th>sisu</th>";
echo "<th>kat.</th>";
echo "<th>status</th>";
echo "<th>tähtis</th>";
echo "<th>kp. muut.</th>";
echo "<th>kp. sis.</th>";
while($row = mysql_fetch_assoc($result))
{
  $counter++;
  echo "<tr>";
  echo "<td>$counter</td>";
  echo "<td>$row[id_blog]&nbsp;</td>";
  echo "<td>$row[caption]&nbsp;</td>";
  echo "<td>$row[content]&nbsp;</td>";
  echo "<td>$row[category]&nbsp;</td>";
  echo "<td>$row[status]&nbsp;</td>";
  echo "<td>$row[important]&nbsp;</td>";
  echo "<td>$row[date_change]</td>";
  echo "<td>$row[date_insert]</td>";
  echo "</tr>"; 
}
echo "</table>";
include "footer.php";
?>