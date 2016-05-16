<?php

include "dbconnect.php";
include "header.php";
if($_POST['search'])
{
  # search
  $query = "SELECT * FROM blog WHERE 
  (caption LIKE '%".$_POST['search']."%' OR
  content LIKE '%".$_POST['search']."%' OR
  category LIKE '%".$_POST['search']."%')
  AND deleted != '1'
  ORDER BY id_blog DESC";
}
else
{
  # default
  $query = "SELECT * FROM blog WHERE deleted != '1' ORDER BY id_blog DESC";
}

# database query
$result = mysql_query($query) OR
die("Ebaõnnestus: " . mysql_error());

echo "<h3>Otsing</h3>";

echo "<form method=post action=".$_SERVER['SCRIPT_NAME'].">";
echo "<input type=text name=search value='".$_POST['search']."'>";
echo "<input type=submit name=nupp value=Otsi>";
echo "</form>";


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
echo "<th>muutmine</th>";
echo "<th>kustutamine</th>";

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
  
  
  echo "<td><a href=change.php?id_blog=$row[id_blog]&action=edit><img src=img/edit.png border=0></a></td>";
  echo "<td><a href=change.php?id_blog=$row[id_blog]&action=delete onClick='return confirm(\"Oled kindel, et tahad kustutada id: ".$row['id_blog']."?\")'><img src=img/delete.png border=0></a></td>";
  
  
  
  
  
  
  
  
  
  
  
  
  echo "</tr>"; 
}
echo "</table>";
include "footer.php";
?>