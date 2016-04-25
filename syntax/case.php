<?php  

//$menu_id = rand(1, 6);
$menu_id = $_GET['menu_id'];

switch ($menu_id)
{
  case 1:
    echo "Esileht";
    break;
  case 2:
    echo "Tutvustus";
    break;
  case 3:
    echo "Tooted";
    break;
  case 4:
    echo "Kontakt";
    break;
  default:
    echo "Error 404";
    break;
} 