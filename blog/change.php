<?php

include "dbconnect.php";
include "header.php";

//array_walk($_POST, addslashes);
#delete
if($_GET['action'] == 'delete'){
  $query = "UPDATE blog SET deleted = '1' WHERE id_blog = '".$_GET['id_blog']."'";
  $result = mysql_query($query) OR die("Ebaõnnestus: " . mysql_error());
  echo '<META HTTP-EQUIV="Refresh" CONTENT="0; URL=search.php">';
}
#security
foreach($_POST as $key => $val)
{
  $_POST[$key] = addslashes($_POST[$key]);
}
 
if($_POST['nupp'] == "Muuda")
{
  $query = "
  UPDATE blog SET
  caption='".$_POST['caption']."',
  content='".$_POST['content']."',
  category='".$_POST['category']."',
  status='".$_POST['status']."',
  important='".$_POST['important']."',
  date_change=NOW()
  WHERE id_blog='".$_GET['id_blog']."'
  LIMIT 1
  ";

  //echo "<p>Query: $query";
  
  #database query
  $result = mysql_query($query) OR
  die("Ebaõnnestus: " . mysql_error());
}
 
 
  # edit
  $query = "SELECT * FROM blog 
  WHERE id_blog='".$_GET['id_blog']."'";

  $result = mysql_query($query) OR
  die("Ebaõnnestus: " . mysql_error());

  $row = mysql_fetch_assoc($result);

echo "<form method=post action=".$_SERVER['SCRIPT_NAME']."?id_blog=$row[id_blog]&action=edit>\n";

echo "<h3>Muutmine</h3>";

echo "<table border=1>\n";

echo "<tr>";
echo "<td>Pealkiri:</td>";
echo "<td><input type=text name=caption size=50 value='$row[caption]'></td>";
echo "</tr>";

echo "<tr>";
echo "<td>Sisu:</td>";
echo "<td><textarea name=content rows=15 cols=50>$row[content]</textarea></td>";
echo "</tr>";

echo "<tr>";
echo "<td>Kategooria:</td>";
echo "<td>
<select name=category>
<option>$row[category]</option>
<option></option>
<optgroup label=Varia></optgroup>
<option>Loodus</option>
<option>Poliitika</option>
<option>Nali</option>
<optgroup label=Tehnika></optgroup>
<option>IT</option>
<option>TV</option>
</select>
</td>";
echo "</tr>";

echo "<tr>";
echo "<td>Staatus:</td>";
echo "<td>
Aktiivne: <input type=radio name=status value=1 ";
if ($row['status'] == true) echo " checked";
echo ">";

echo "Passiivne: <input type=radio name=status value=0 ";
if ($row['status'] == false) echo " checked";
echo ">";
echo "</td>";
echo "</tr>";









echo "<tr>";
echo "<td>Oluline:</td>";
echo "<td>
<input type=checkbox name=important value=1 ";
if ($row['important'] == true) echo " checked";
echo ">";
echo "</td>";
echo "</tr>";

echo "<tr>";
echo "<td colspan=2><center><input type=submit name=nupp value=Muuda></center></td>";
echo "</tr>";

echo "</table>";
echo "</form>";
include "footer.php";
?>