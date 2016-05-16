<?php exit('Disabled'); ?>

CREATE USER 'kursus1102'@'localhost' IDENTIFIED BY 'EmMoKkNv12345';

GRANT ALL PRIVILEGES ON * . * TO 'kursus1102'@'localhost' IDENTIFIED BY 'EmMoKkNv12345' WITH GRANT OPTION MAX_QUERIES_PER_HOUR 0 MAX_CONNECTIONS_PER_HOUR 0 MAX_UPDATES_PER_HOUR 0 MAX_USER_CONNECTIONS 0 ;

CREATE DATABASE IF NOT EXISTS `kursus1102` ;

GRANT ALL PRIVILEGES ON `kursus1102` . * TO 'kursus1102'@'localhost';

FLUSH PRIVILEGES;

CREATE TABLE `kursus1102`.`news` (
`id_news` INT( 5 ) NOT NULL AUTO_INCREMENT PRIMARY KEY ,
`caption` VARCHAR( 255 ) NOT NULL ,
`body` TEXT NOT NULL ,
`category` VARCHAR( 22 ) NOT NULL ,
`keywords` VARCHAR( 255 ) NOT NULL ,
`status` CHAR( 1 ) NOT NULL ,
`important` CHAR( 1 ) NOT NULL ,
`date_insert` DATETIME NOT NULL ,
`date_change` DATETIME NOT NULL
) ENGINE = MYISAM COMMENT = 'here are stored news';

INSERT INTO `kursus1102`.`news` (
`id_news` ,
`caption` ,
`body` ,
`category` ,
`keywords` ,
`status` ,
`important` ,
`date_insert` ,
`date_change`
)
VALUES (
NULL , 'Sait avatud', 'Teretulemast, avasime saidi. Täna kõik -0,5%.', 'IT', 'avamine, allahindlus', '1', '', NOW( ) , NOW( )
);

INSERT INTO news
SET caption = 'Nälg ajas rebase puu otsa pekki sööma',
body = 'Albu põhikooli õpetajal Anneli Trummeril õnnestus teha fotoseeria rebasest, kes ronis hoovis õunapuu otsa ja sõi seal lindudele pandud peki. REKLAAM Trummer imestas, et isegi kassil pole õnnestunud puu otsast pekki kätte saada, kuid rebane oli nii osav, et lutsutas ühe lindude rasvapalli tühjaks ja pistis nahka ka puu otsas rippunud pekitüki. Puu otsast toidukraami kättesaamiseks kulus rebasel paarkümmend minutit. Trummer selgitas, et rebane oli ilus ja julge. «Pildistasin teda köögi aknast ja vahepeal vaatasime kohe tõtt, kuid ta ei teinud minust väljagi,» sõnas ta. (JT) http://www.jt.ee/?id=396877',
category = 'Bioloogia',
keywords = 'rebane',
STATUS = '1',
important = '1',
date_insert = NOW( ) 