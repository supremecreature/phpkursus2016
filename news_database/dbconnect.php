<?php

  @mysql_connect("localhost", "root", "student") OR
  die("andmebaasi server k�ttesaamatu");

  @mysql_select_db("phpkursus2016") OR
  die("andmebaas k�ttesaamatu");

?>
