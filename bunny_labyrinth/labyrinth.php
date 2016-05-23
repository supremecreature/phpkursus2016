<?php  
session_start();

include "keystrokes.php";

#conf
$_SESSION['labi'] = 10;
$_SESSION['labj'] = 10;

function gen_labyrinth ()
{
  for ($i=0; $i<$_SESSION['labi']; $i++)
  {
    for ($j=0; $j<$_SESSION['labj']; $j++)
    {
      #open area
      $_SESSION['lab'][$i][$j] = 0;
      #walls
      #top
      if ($i == 0) $_SESSION['lab'][$i][$j] = 1;
      #bottom
      if ($i == $_SESSION['labi']-1) $_SESSION['lab'][$i][$j] = 1;
      #left
      if ($j == 0) $_SESSION['lab'][$i][$j] = 1;
      #right
      if ($j == $_SESSION['labj']-1) $_SESSION['lab'][$i][$j] = 1;
    }  
  }
  
  for ($i=0; $i<(25+$_SESSION['level']); $i++)
  {
    #obstacles
    $_SESSION['lab'][rand(1, $_SESSION['labi']-2)][rand(1, $_SESSION['labj']-2)] = 1;
  }

  return $_SESSION['lab'];
}


function show_labyrinth ()
{
  echo "<table border=1>\n";
  for ($i=0; $i<$_SESSION['labi']; $i++)
  {
    echo "<tr>";
    for ($j=0; $j<$_SESSION['labj']; $j++)
    {
      echo "<td>";
      
      if ($_SESSION['lab'][$i][$j] == 0) echo "&nbsp;";
      elseif ($_SESSION['lab'][$i][$j] == 1) echo "<img src=brick.jpg>";
      elseif ($_SESSION['lab'][$i][$j] == 2) echo "<img src=carrot.jpg>";
      elseif ($_SESSION['lab'][$i][$j] == 3) echo "<img src=bunny.jpg>";
      elseif ($_SESSION['lab'][$i][$j] == 4) echo "<img src=hole.jpg>";
      elseif ($_SESSION['lab'][$i][$j] == 5) echo "<img src=bunny_red.jpg>";
      elseif ($_SESSION['lab'][$i][$j] == 6) echo "<img src=fox.jpg>";
      
      echo "</td>";
    }
    echo "</tr>\n";
  }
  echo "</table>\n";
}


function show_labyrinth_matrix ()
{
  echo "<table border=1 cellpadding=5>\n";
  for ($i=0; $i<$_SESSION['labi']; $i++)
  {
    echo "<tr>";
    for ($j=0; $j<$_SESSION['labj']; $j++)
    {
      echo "<td>".$_SESSION['lab'][$i][$j]."</td>";
    }
    echo "</tr>\n";
  }
  echo "</table>\n";
}

function fill_lab_with_items()
{
  
  #carrots
  for ($i=0; $i<(7+$_SESSION['level']); $i++)
  {
    $_SESSION['lab'][rand(1, $_SESSION['labi']-2)][rand(1, $_SESSION['labj']-2)] = 2;
  }
  
  #extra rabbit
  if (rand(0, 30) == 0)
  {
    $_SESSION['lab'][rand(1, $_SESSION['labi']-2)][rand(1, $_SESSION['labj']-2)] = 5;
  }
  
  #fox = min. 1 life
  if (rand(0, 10) == 0)
  {
    $_SESSION['lab'][rand(1, $_SESSION['labi']-2)][rand(1, $_SESSION['labj']-2)] = 6;
  } 

  #hero
  $_SESSION['lab'][2][2] = 3;
  $_SESSION['heroi'] = 2;
  $_SESSION['heroj'] = 2;
  
  #hole 
  do
  {
    $_SESSION['holei'] = rand(1, $_SESSION['labi']-2);
    $_SESSION['holej'] = rand(1, $_SESSION['labj']-2);
  } while ($_SESSION['lab'][ $_SESSION['holei'] ][ $_SESSION['holej'] ] <> 0);
  
  $_SESSION['lab'][$_SESSION['holei']][$_SESSION['holej']] = 4;
  
  
  return $_SESSION['lab'];
}

function show_interface()
{
  echo "
  <h3>ARVUTIMÄNG VIHANE JÄNES</h3>
  <table border=1>\n
  <tr>
  <td>";
  
  show_labyrinth_matrix();
  
  echo "
  <form>
  </td>
  <td>
    <h3>Level ".$_SESSION['level']."</h3>
    <span style='color: green'>
    Õpetus!<br>
    Kogu täpselt <b>".$_SESSION['level']."</b> porgandit<br>
    ja seejärel hüppa auku.<br></span>
    <input type=button name=nupp value='Uus mäng' onclick=window.location.href='".$_SERVER['PHP_SELF']."?action=new_game'> 
    <input type=button name=nupp value='Tase uuesti' onclick=window.location.href='".$_SERVER['PHP_SELF']."?action=reset_level'>
    <br><br><br><br><br><br>
    Mängimiseks kasuta nooleklahve:
    <table border=1>
    <tr>
    <td></td><td align=center>
    <input type=button name=nupp value=Üles onclick=window.location.href='".$_SERVER['PHP_SELF']."?move=up'>
    </td><td></td>
    </tr>
    <tr>
    <td>
    <input type=button name=nupp value=Vasem onclick=window.location.href='".$_SERVER['PHP_SELF']."?move=left'>
    </td>
    <td><input type=button name=nupp value=Alla onclick=window.location.href='".$_SERVER['PHP_SELF']."?move=down'></td>
    <td><input type=button name=nupp value=Parem   onclick=window.location.href='".$_SERVER['PHP_SELF']."?move=right'></td>
    </tr>
    </form>
    </table>";

  
  for ($i=1; $i<=$_SESSION['carrots']; $i++)
  {
    echo "<img src=carrot.jpg>";
    if ($i % 5 == 0) echo "<br>";
  }
  
  echo "<hr>Elud: ";
  
  for ($i=1; $i<=$_SESSION['lives']; $i++)
  {
    echo "<img src=bunny.jpg>";
  }
    
  echo "
  </td>
  </tr>\n
  </table>\n
  ";
  
}

function move_hero($way)
{
  
  if ($way == "up" AND $_SESSION['lab'][$_SESSION['heroi']-1][$_SESSION['heroj']] <> 1)
  {
    $_SESSION['lab'][$_SESSION['heroi']][$_SESSION['heroj']] = 0;
    $_SESSION['heroi']--;
  }
  if ($way == "down" AND $_SESSION['lab'][$_SESSION['heroi']+1][$_SESSION['heroj']] <> 1)
  {
    $_SESSION['lab'][$_SESSION['heroi']][$_SESSION['heroj']] = 0;
    $_SESSION['heroi']++;
  }
  if ($way == "left" AND $_SESSION['lab'][$_SESSION['heroi']][$_SESSION['heroj']-1] <> 1)
  {
    $_SESSION['lab'][$_SESSION['heroi']][$_SESSION['heroj']] = 0;
    $_SESSION['heroj']--;
  }  
  if ($way == "right" AND $_SESSION['lab'][$_SESSION['heroi']][$_SESSION['heroj']+1] <> 1)
  {
    $_SESSION['lab'][$_SESSION['heroi']][$_SESSION['heroj']] = 0;
    $_SESSION['heroj']++;
  }  
  
  if ($_SESSION['lab'][$_SESSION['heroi']][$_SESSION['heroj']] == 2) $_SESSION['carrots']++;
  if ($_SESSION['lab'][$_SESSION['heroi']][$_SESSION['heroj']] == 5) $_SESSION['lives']++;
  if ($_SESSION['lab'][$_SESSION['heroi']][$_SESSION['heroj']] == 6) $_SESSION['lives']--;
  if ($_SESSION['lab'][$_SESSION['heroi']][$_SESSION['heroj']] == 4)
  {
    #right amount of carrots?
    if ($_SESSION['carrots'] == $_SESSION['level']) //ok
    {
      $_SESSION['level']++;
    }
    else
    {
      $_SESSION['lives']--;
    }

    $_SESSION['carrots'] = 0;
    #new level
    gen_labyrinth();
    fill_lab_with_items();        
  }
    
  #new location
  $_SESSION['lab'][$_SESSION['heroi']][$_SESSION['heroj']] = 3;
  
  return $_SESSION['lab'];
}


#here is main program
if ($_GET['action'] == "new_game")
{
  $_SESSION['level'] = 1;
  $_SESSION['carrots'] = 0;
  $_SESSION['lives'] = 3;
  gen_labyrinth();
  fill_lab_with_items();  
}
if ($_GET['action'] == "reset_level")
{
  $_SESSION['carrots'] = 0;
  $_SESSION['lives']--;
  gen_labyrinth();
  fill_lab_with_items();   
}

if ($_SESSION['lives'] > 0)
{
  
  move_hero(addslashes($_GET['move']));

}
else
{
  echo "<font color=red><h3>Mäng on läbi! Alusta uut mängu.</h3></font>";
}

show_interface();

//print_r($_GET);
//print_r($_POST);
//echo "heroi=$_SESSION['heroi'], heroj=$_SESSION['heroj']";

?>
