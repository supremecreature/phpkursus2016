 <?php

$file = "pakkumine.rtf";

$source = fopen($file, "r");
$text = fread($source, filesize($file));
fclose($source);

function find_replace($tag,$val,$text)
{
  // return preg_replace("/[\$]$tag/",$val,$text);
}

$text = find_replace("NR", rand(1,10000),$text);
$text = find_replace("NIMI", "Hr. Viiulitamm",$text);
$text = find_replace("TUBA", "ühisköögi ja WC potiga toas",$text);
$text = find_replace("OODE_ARV", "1/4 ööd",$text);
$text = find_replace("SAUNA_KELLAAEG", "2:00-6:00",$text);
$text = find_replace("PROGRAMM", "Lendavad taldrikud",$text);
$text = find_replace("PERIOOD", "29.veb 1978 - 29.veb 2277",$text);
$text = find_replace("HIND1", "3888 ruublit (34 )",$text);
$text = find_replace("HIND2", "580 ",$text);
$text = find_replace("KUUPAEV", date("d.m.Y"),$text);

header("HTTP/1.1 200 OK");
header("Content-type: application/rtf");

$today = date("ymd_His");
$output_filename = "pakkumine_$today.rtf";

#header("Content-type: application/force-download");
header("Content-type: application/rtf");
header("Content-Disposition: attachment; filename=$output_filename");
header("Content-length: ".strlen($text));
echo $text;

?> 