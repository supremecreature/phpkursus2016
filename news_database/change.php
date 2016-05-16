<?php 

  include "header.php";
  
  $id_news = $_GET['id_news'];

  if ($_POST['nupp'])
  {
    $query = "UPDATE news SET
    caption='".$_POST['caption']."',
    body='".$_POST['body']."',
    category='".$_POST['category']."',
    keywords='".$_POST['keywords']."',
    status='".$_POST['status']."',
    important='".$_POST['important']."',
    date_change=NOW()
    WHERE id_news='$id_news'";
    
    //echo $query;

    mysql_query($query) OR
    die("Ebaõnnestus: " . mysql_error());
  }


  #edit
  if($_GET['action'] == 'edit')
  {
    $query = "SELECT * FROM news WHERE id_news='$id_news'";

    $result = mysql_query($query) OR
    die("Ebaõnnestus: " . mysql_error());
    
    $row = mysql_fetch_assoc($result);
  }
  

  #delete
  if($_GET['action'] == 'del')
  {
    $query = "DELETE FROM news WHERE id_news='$id_news'";
    
    $result = mysql_query($query) OR
    die("Ebaõnnestus: " . mysql_error());
    
    echo '<META HTTP-EQUIV="Refresh" CONTENT="0; URL=search.php">';
  }

  #eristatakse muutujaid
  //$_GET['foo'];
  //$_POST['foo'];
  //$_SESSION['foo'];
  //$foo;

?>

<h2>Uudiste muutmine</h2>

<form method=post action=<?php echo $_SERVER['SCRIPT_NAME']."?id_news=$id_news&action=edit"; ?>>

<table border=1>

<tr>
  <td>Pealkiri</td>
  <td><input type=text name=caption size=50 value='<?php echo $row['caption']; ?>'></td>
</tr>
<tr>
  <td>Sisu</td>
  <td><textarea name=body class=ckeditor id=editor1 rows=15 cols=36><?php echo $row['body']; ?></textarea></td>
</tr>
<tr>
  <td>Kategooria</td>
  <td>
  <select name=category>
    <option><?php echo $row['category']; ?></option>
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
  <td><input type=text name=keywords size=50 value='<?php echo $row['keywords']; ?>'> otsingu märksõnad nt. tuumajaam, kilekott, valimised</td>
</tr>
<tr>
  <td>Staatus</td>
  <td>
  Aktiivne: <input type=radio name=status value=1 <?php if($row['status'] == true) echo "checked"; ?>>
  Passiivne: <input type=radio name=status value=0 <?php if($row['status'] == false) echo "checked"; ?>>
  </td>  
</tr>
<tr>
  <td>Oluline</td>
  <td>
  <input type=checkbox name=important value=1  <?php if($row['important'] == true) echo "checked"; ?>>
  </td>  
</tr>
<tr>
  <td colspan=2>
  <input type=submit name=nupp value=Muuda>
  </td>  
</tr>

</table>
</form>


<?php

  include "footer.php";

?>