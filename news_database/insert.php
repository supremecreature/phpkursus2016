<?php 

  include "header.php";
    
?>

<h2>Uudiste lisamine</h2>

<form method=post action=<?php echo $_SERVER['SCRIPT_NAME']; ?>>

<table border=1>

<tr>
  <td>Pealkiri</td>
  <td><input type=text name=caption size=50></td>
</tr>
<tr>
  <td>Sisu</td>
  <td><textarea name=body class=ckeditor id=editor1 rows=15 cols=36></textarea></td>
</tr>
<tr>
  <td>Kategooria</td>
  <td>
  <select name=category>
    <option></option>
    <option>IT</option>
    <option>Keemia</option>
    <option>Füüsika</option>
    <option>Muusika</option>
    <option>Ajalugu</option>
    <option>Bioloogia</option>
    <option>Matemaatika</option>
  </select>
  </td>
</tr>
<tr>
  <td>Võtmesõnad</td>
  <td><input type=text name=keywords size=50> otsingu märksõnad nt. tuumajaam, kilekott, valimised</td>
</tr>
<tr>
  <td>Staatus</td>
  <td>
  Aktiivne: <input type=radio name=status value=1 checked>
  Passiivne: <input type=radio name=status value=0>
  </td>  
</tr>
<tr>
  <td>Oluline</td>
  <td>
  <input type=checkbox name=important value=1>
  </td>  
</tr>
<tr>
  <td colspan=2>
  <input type=submit name=nupp value=Sisesta>
  </td>  
</tr>

</table>
</form>


<?php

if ($_POST['nupp'])
{

  //print_r($_POST);
  //echo "Pealkiri: ".$_POST['caption'];
  $query = "INSERT INTO news SET
  caption='".$_POST['caption']."',
  body='".$_POST['body']."',
  category='".$_POST['category']."',
  keywords='".$_POST['keywords']."',
  status='".$_POST['status']."',
  important='".$_POST['important']."',
  date_insert=NOW()";
  
  echo $query;

  mysql_query($query) OR
  die("Ebaõnnestus: " . mysql_error());
}

include "footer.php";

?>