<?php  

  define(ANONYMOUS, 0);
  define(USER, 2);
  define(MODE, 3);
  define(ADMIN, 4);


  function str_secure($string)
  {
    $string = addslashes($string);
    $string = htmlspecialchars($string);
    $string = trim($string);
    
    return $string;
  }


  #allow current rights and higher
  function check_rights($required_level)
  {

    if ($_SESSION['login_user']['level'] >= $required_level)
    {
      #allow
    }
    else
    {
      #deny
      exit("Kasutajal puuduvad õigused tegevuse sooritamiseks.");
    }
    
  }


?>
