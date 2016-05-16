<?php

include "header.php";

#dbg
//print_r($_POST);

if (!$_POST['nupp'])
{
  $query = "SELECT * FROM news ORDER BY id_news ASC";
}
else
{
  $query = "SELECT * FROM news WHERE
  caption LIKE '%".$_POST['search']."%' OR
  body LIKE '%".$_POST['search']."%' OR
  category LIKE '%".$_POST['search']."%'
  LIMIT 200
  ";
}

$result = mysql_query($query) OR
die("Ebaõnnestus: " . mysql_error());

echo "<h2>Uudiste otsing</h2>";

echo "<form method=post action=".$_SERVER['SCRIPT_NAME'].">";
echo "<input type=text name=search value='".$_POST['search']."'>";
echo "<input type=submit name=nupp value=Otsi>";
echo "</form>";

echo "<table border=1>";
echo "<th>jkrn</th>";
echo "<th>ID</th>";
echo "<th>pealkiri</th>";
echo "<th>sisu</th>";
echo "<th>kategooria</th>";
echo "<th>staa-<br>tus</th>";
echo "<th>olu-<br>line</th>";
echo "<th>sisestamise kp.</th>";
echo "<th>muutmine</th>";
echo "<th>kustutamine</th>";

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
  echo "<td><a href=change.php?id_news=".$row['id_news']."&action=edit><img src=img/edit.gif border=0></a></td>";
  echo "<td><a href=change.php?id_news=".$row['id_news']."&action=del onClick='return confirm(\"Oled kindel, et tahad kustutada id: ".$row['id_news']." ?\")'><img src=img/delete.gif border=0></a></td>";
  echo "</tr>";

}

  echo "</table>";

include "footer.php";

?>