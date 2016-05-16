<?php

include "dbconnect.php";
include "header.php";
//array_walk($_POST, addslashes);

#security
foreach($_POST as $key => $val)
{
  $_POST[$key] = addslashes($_POST[$key]);
}

echo "<form method=post action=".$_SERVER['SCRIPT_NAME'].">\n";

echo "<h3>Sisestamine</h3>";

echo "<table border=1>\n";

echo "<tr>";
echo "<td>Pealkiri:</td>";
echo "<td><input type=text name=caption size=50></td>";
echo "</tr>";

echo "<tr>";
echo "<td>Sisu:</td>";
echo "<td><textarea name=content class=ckeditor id=editor1 rows=15 cols=50></textarea></td>";
echo "</tr>";

echo "<tr>";
echo "<td>Kategooria:</td>";
echo "<td>
<select name=category>
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
Aktiivne: <input type=radio name=status value=1> 
Passiivne: <input type=radio name=status value=0>
</td>";
echo "</tr>";

echo "<tr>";
echo "<td>Oluline:</td>";
echo "<td>
<input type=checkbox name=important value=1> 
</td>";
echo "</tr>";

echo "<tr>";
echo "<td colspan=2><center><input type=submit name=nupp value=Sisesta></center></td>";
echo "</tr>";

echo "</table>";
echo "</form>";

//print_r($_POST);

if($_POST['nupp'] == "Sisesta")
{
  $query = "
  INSERT INTO blog SET
  caption='".$_POST['caption']."',
  content='".$_POST['content']."',
  category='".$_POST['category']."',
  status='".$_POST['status']."',
  important='".$_POST['important']."',
  date_insert=NOW()
  ";

  echo "<p>Query: $query";
  
  #database query
  $result = mysql_query($query) OR
  die("Ebaõnnestus: " . mysql_error());
}
include "footer.php";
?>