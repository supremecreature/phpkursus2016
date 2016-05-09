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

<h3>Kasutaja välja logimine</h3>

<?php  

echo $_SESSION['login_user']['name'] . " süsteemist välja logitud.";

session_destroy();

?>