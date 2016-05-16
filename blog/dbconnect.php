<?php

@mysql_connect("localhost", "root", "student") OR
die("DB server kättesaamatu");

@mysql_select_db("phpkursus2016") OR
die("DB kättesaamatu");

?>
