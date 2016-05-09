<?php  

session_start();

include "dbconnect.php";
include "functions.php";
include "header.php";

check_rights(MODE);

?>

<html>

<head>
<title>Kasutajate andmebaas</title>
</head>

<body bgcolor=AliceBlue text=DarkGoldenRod link=DarkSlateGray></body>


<h3>Kasutajate otsing</h3>

<?php  

#search
$_POST['search'] = str_secure($_POST['search']);

echo "<form action=".$_SERVER['SCRIPT_NAME']." method=post>";
echo "<input type=text name=search value=\"".$_POST['search']."\">";
echo "<input type=submit name=nupp value=Otsi>";
echo "</form>";
  
if ($_POST['search'] != "")
{
  $query = "SELECT * FROM users WHERE 
  (username LIKE '%".$_POST['search']."%' OR
  name LIKE '%".$_POST['search']."%' OR
  email LIKE '%".$_POST['search']."%')
  AND deleted!='1'
  ORDER BY id_users ASC LIMIT 100";
}
else
{  
  $query = "SELECT * FROM users WHERE deleted!='1' 
  ORDER BY id_users ASC LIMIT 10";
}


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
echo "<th>muuda</th>";
echo "<th>kustuta</th>";
  
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

  if(isset($_SESSION['login_user']['id_users']))
  {
    echo "<td><a href=change.php?id_edit=".$row['id_users'].">
    <img src=img/edit.gif></a></td>";
    echo "<td><a href=change.php?id_del=".$row['id_users']." 
    onClick='return confirm(\"Oled kindel, et tahad kustutada id: 
    ".$row['id_users']." ?\")'>
    <img src=img/del.gif></a></td>";
  }
  else
  {
    echo "<td>Muutmiseks <a href=login.php>logi sisse</a></td>";
    echo "<td>Kustutamiseks <a href=login.php>logi sisse</a></td>";
  }
  
  echo "</tr>";
}

echo "</table>";

include "footer.php";


?>
