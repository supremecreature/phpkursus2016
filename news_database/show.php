<?php

include "header.php";

$query = "SELECT * FROM news ORDER BY id_news ASC";

$result = mysql_query($query) OR
die("Ebaõnnestus: " . mysql_error());

echo "<h2>Uudiste vaatamine</h2>";

echo "<table border=1>";
echo "<th>jkrn</th>";
echo "<th>ID</th>";
echo "<th>pealkiri</th>";
echo "<th>sisu</th>";
echo "<th>kategooria</th>";
echo "<th>staa-<br>tus</th>";
echo "<th>olu-<br>line</th>";
echo "<th>sisestamise kp.</th>";

while($row = mysql_fetch_assoc($result))
{
  $counter++;
  
  echo "<tr>";
  echo "<td>".$counter."</td>";
  echo "<td>".$row['id_news']."&nbsp;</td>";
  echo "<td>".$row['caption']."&nbsp;</td>";
  echo "<td>".substr(nl2br(htmlspecialchars($row['body'])), 0, 100)."&nbsp;</td>";
  echo "<td>".$row['category']."&nbsp;</td>";
  echo "<td>".$row['status']."&nbsp;</td>";
  echo "<td>".$row['important']."&nbsp;</td>";
  echo "<td>".$row['date_insert']."&nbsp;</td>";
  echo "</tr>";

}

  echo "</table>";

include "footer.php";

?>