<form enctype="multipart/form-data" action="" method="POST">
Send this file:
<input type="file" name="userfile">
<input type="submit" name="nupp" value="Send">
</form>


<?php

if ($_POST['nupp'] == "Send")
{
  //$uploaddir = 'C:/kirjuta/xampp/htdocs/kursus1102/upload/';
  //$uploaddir = '/home/creature/public_html/php/kursus1102/upload/';
  $uploaddir = '/var/www/html/upload/';
                
  $picname = $_FILES['userfile']['name'];
  $uploadfile = $uploaddir.$picname;

  echo "<pre>";

  move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile);
  print_r($_FILES);

  echo "</pre>";
}

?> 