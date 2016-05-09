<?php  

include "dbconnect.php";
include "functions.php";
include "header.php";

check_rights(USER);

?>

<html>

<head>
<title>Kasutajate andmebaas</title>
</head>

<body bgcolor=AliceBlue text=DarkGoldenRod link=DarkSlateGray></body>


<h3>Kasutajate registreerimise vorm</h3>

<form action=<?php  echo $_SERVER['SCRIPT_NAME']; ?> method=post>

<table border=1>

<tr>
  <td>Kasutajanimi:*</td>
  <td><input type=text name=username value=<?php  echo $_GET['username'] ?>></td>
</tr>
<tr>
  <td>Salasõna:*</td>
  <td><input type=password name=password value=<?php  echo $_GET['password'] ?>></td>
</tr>
<tr>
  <td>Ees- ja perenimi:</td>
  <td><input type=text name=name value=<?php  echo $_GET['name'] ?>></td>
</tr>
<tr>
  <td>E-post:</td>
  <td><input type=text name=email></td>
</tr>
<tr>
  <td>Keele valik:</td>
  <td>
  <select name=language>
  <option></option>
  <option>Eesti</option>
  <option selected>Vene</option>
  <option>Inglise</option>
  <option>Soome</option>
  </select>
  </td>
</tr>
<tr>
  <td>Märkus:</td>
  <td><textarea name=comment cols=14 rows=15>Siia sisesta oma kommentaarid</textarea></td>
</tr>
<tr>
  <td>Uudiskiri:</td>
  <td><input type=checkbox name=newsletter value=1></td>
</tr>
<tr>
  <td>Aktiivne:</td>
  <td>
  Aktiivne: <input type=radio name=status value=y checked>
  Passiivne: <input type=radio name=status value=n>
  </td>
</tr>
</table>
<input type=submit name=nupp value=Sisesta>
<input type=reset value="Algseis tagasi">
</form>

<?php  

  print_r($_POST);
  //echo $_POST['username'];
  
  #let's make strings secure
  foreach($_POST as $key => $val)
  {
    $_POST[$key] = str_secure($_POST[$key]);
  }
  
  if($_POST['nupp'] == "Sisesta")
  {
  	//$salt = 'oias9ft7h+8134qt7b1934+7t+9b384';
    #DB query
    $query = "INSERT INTO users SET
    username='".$_POST['username']."',
    password=PASSWORD('".$_POST['password']."'),
    name='".$_POST['name']."',
    email='".$_POST['email']."',
    language='".$_POST['language']."',
    comment='".$_POST['comment']."',
    newsletter='".$_POST['newsletter']."',
    status='".$_POST['status']."',
    date_insert=NOW(),
    id_users_insert='".$_SESSION['login_user']['id_users']."'
    ";
    
    echo $query;
    
    mysql_query($query) OR
    die("Ebaõnnestus: " . mysql_error());
  
  }

//echo "<a href=".$_SERVER['SCRIPT_NAME']."?username=
//uugu&password=porgand&name=Uugu-Lehmaste>Automaatselt täida väljad</a>";
//print_r($_GET);

include "footer.php";

?>
