<?php  

session_start();

include "dbconnect.php";
include "functions.php";
include "header.php";

?>

<html>

<head>
<title>Kasutajate andmebaas</title>
</head>

<body bgcolor=AliceBlue text=DarkGoldenRod link=DarkSlateGray></body>


<h3>Kasutaja sisse logimine</h3>

<?php  

echo "<form method=post action=".$_SERVER['SCRIPT_NAME'].">";
echo "Kasutajanimi: <input type=text name=entry1><br>";
echo "Parool: <input type=password name=entry2><br>";
echo "<input type=submit value=Login name=nupp>";
echo "</form>";

#login process

if (isset($_POST['nupp']))
{
  #against bruteforce
  sleep(1);
  
  $usr = str_secure($_POST['entry1']);
  $pwd = str_secure($_POST['entry2']);
  
  $query = "SELECT * FROM users WHERE username='$usr' AND password=PASSWORD('$pwd') LIMIT 1";

  $result = @mysql_query($query);
  $row = mysql_fetch_assoc($result);
  
  if(isset($row['id_users']) AND $row['id_users'] != "" AND is_numeric($row['id_users']) == true)
  {
    $query = "
    UPDATE users SET 
    last_login_date=NOW(),
    login_count=login_count+1
    WHERE id_users='".$row['id_users']."'
    ";
    @mysql_query($query);
    
    echo "<span style='color: green'>Sisselogimine õnnestus.</span>";
    $_SESSION['login_user'] = $row;
    echo '<META HTTP-EQUIV="Refresh" CONTENT="0; URL=login.php">';
  }
  else
  { 
    $query = "
    UPDATE users SET
    login_failed_count=login_failed_count+1
    WHERE username='$usr'
    ";
    @mysql_query($query);
    
    echo "<span style='color: red'>Sisselogimine ebaõnnestus. 
    Vale kasutajanimi ja/või parool.</span>";
  }
  
  
}

?>