<?php exit('info'); ?>

CREATE DATABASE `ta10` ;

INSERT INTO `mysql`.`user` (
`Host` ,
`User` ,
`Password` ,
`Select_priv` ,
`Insert_priv` ,
`Update_priv` ,
`Delete_priv` ,
`Create_priv` ,
`Drop_priv` ,
`Reload_priv` ,
`Shutdown_priv` ,
`Process_priv` ,
`File_priv` ,
`Grant_priv` ,
`References_priv` ,
`Index_priv` ,
`Alter_priv` ,
`Show_db_priv` ,
`Super_priv` ,
`Create_tmp_table_priv` ,
`Lock_tables_priv` ,
`Execute_priv` ,
`Repl_slave_priv` ,
`Repl_client_priv` ,
`Create_view_priv` ,
`Show_view_priv` ,
`Create_routine_priv` ,
`Alter_routine_priv` ,
`Create_user_priv` ,
`Event_priv` ,
`Trigger_priv` ,
`ssl_type` ,
`max_questions` ,
`max_updates` ,
`max_connections` ,
`max_user_connections`
)
VALUES (
'localhost', 'ta10_user', PASSWORD( 'KAikjotja2010' ) , 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', '', '0', '0', '0', '0'
);

INSERT INTO `mysql`.`db` (
`Host` ,
`Db` ,
`User` ,
`Select_priv` ,
`Insert_priv` ,
`Update_priv` ,
`Delete_priv` ,
`Create_priv` ,
`Drop_priv` ,
`Grant_priv` ,
`References_priv` ,
`Index_priv` ,
`Alter_priv` ,
`Create_tmp_table_priv` ,
`Lock_tables_priv` ,
`Create_view_priv` ,
`Show_view_priv` ,
`Create_routine_priv` ,
`Alter_routine_priv` ,
`Execute_priv` ,
`Event_priv` ,
`Trigger_priv`
)
VALUES (
'localhost', 'ta10', 'ta10_user', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y'
);

FLUSH PRIVILEGES;


CREATE TABLE `ta10`.`blog` (
`id_blog` INT( 5 ) NOT NULL AUTO_INCREMENT PRIMARY KEY ,
`caption` VARCHAR( 255 ) NOT NULL ,
`content` TEXT NOT NULL ,
`category` VARCHAR( 111 ) NOT NULL ,
`status` TINYINT( 1 ) NOT NULL ,
`important` TINYINT( 1 ) NOT NULL ,
`deleted` TINYINT( 1 ) NOT NULL ,
`date_change` DATETIME NOT NULL ,
`date_insert` DATETIME NOT NULL
) ENGINE = MYISAM ;

