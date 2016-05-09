<?php  

include "dbconnect.php";
include "functions.php";
include "header.php";

check_rights(MODE);

#deletion
if (isset($_GET['id_del']))
{
  $_GET['id_del'] = str_secure($_GET['id_del']);
  
  $query = "
  UPDATE users SET 
  deleted='1', 
  date_change=NOW(),
  id_users_change='".$_SESSION['login_user']['id_users']."'  
  WHERE id_users=".$_GET['id_del']."
  ";
  
  mysql_query($query) OR
  die("Ebaõnnestus DEL: " . mysql_error());  
  
  echo '<META HTTP-EQUIV="Refresh" CONTENT="0; URL=search.php">';
}

#edit
#do only after form submit
if($_POST['nupp'] == "Muuda")
{
  $_GET['id_edit'] = str_secure($_GET['id_edit']);
  
  #let's make strings secure
  foreach($_POST as $key => $val)
  {
    $_POST[$key] = str_secure($_POST[$key]);
  }
  
  #DB query
  $query = "UPDATE users SET
  username='".$_POST['username']."',
  name='".$_POST['name']."',
  email='".$_POST['email']."',
  language='".$_POST['language']."',
  comment='".$_POST['comment']."',
  newsletter='".$_POST['newsletter']."',
  status='".$_POST['status']."',
  date_change=NOW(),
  id_users_change='".$_SESSION['login_user']['id_users']."'
  WHERE id_users='".$_GET['id_edit']."'
  ";
  
  echo $query;
  
  mysql_query($query) OR
  die("Ebaõnnestus EDIT: " . mysql_error());
  
  echo '<META HTTP-EQUIV="Refresh" CONTENT="0; URL=search.php">';
}

  
  $query = "SELECT * FROM users WHERE id_users='${_GET['id_edit']}' LIMIT 1";

  $result = mysql_query($query) OR
  die("Ebaõnnestus: " . mysql_error());
  
  $row = mysql_fetch_assoc($result);

?>

<html>

<head>
<title>Kasutajate andmebaas</title>
</head>

<body bgcolor=AliceBlue text=DarkGoldenRod link=DarkSlateGray></body>


<h3>Kasutajate muutmise vorm</h3>

<form action=<?php  echo $_SERVER['SCRIPT_NAME']."?id_edit=".$_GET['id_edit'] ?> method=post>

<table border=1>

<tr>
  <td>Kasutajanimi:*</td>
  <td><input type=text name=username value="<?php  echo $row['username'] ?>"></td>
</tr>
<tr>
  <td>Ees- ja perenimi:</td>
  <td><input type=text name=name value="<?php  echo $row['name'] ?>"></td>
</tr>
<tr>
  <td>E-post:</td>
  <td><input type=text name=email value="<?php  echo $row['email'] ?>"></td>
</tr>
<tr>
  <td>Keele valik:</td>
  <td>
  <select name=language>
  <?php  echo "<option>".$row['language']."</option>"; ?>
  <option></option>
  <option>Eesti</option>
  <option>Vene</option>
  <option>Inglise</option>
  <option>Soome</option>
  </select>
  </td>
</tr>
<tr>
  <td>Märkus:</td>
  <td><textarea name=comment cols=25 rows=7><?php  echo $row['comment']; ?></textarea></td>
</tr>
<tr>
  <td>Uudiskiri:</td>
  <?php  
    
    if($row['newsletter'] == 1)
    {
      $newscheck = "checked";
    }
  
  ?>
  <td><input type=checkbox name=newsletter value=1 <?php  echo $newscheck; ?>></td>
</tr>
<tr>
  <td>Aktiivne:</td>
  <td>
  Aktiivne: <input type=radio name=status value=y
  <?php  
  
  if($row['status'] == "y")
  {
    echo " checked";
  }
  
  ?>
  >
  
  Passiivne: <input type=radio name=status value=n
  <?php  
  
  if($row['status'] == "n")
  {
    echo " checked";
  }
  
  ?>
  
  >
  </td>
</tr>
</table>
<input type=submit name=nupp value=Muuda>
<input type=reset value="Algseis tagasi">

</form>

<?php  

  include "footer.php";

?>