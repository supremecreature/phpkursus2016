 <?php  


$file = "./cert_msword.rtf";
//$file = "C:/kirjuta/xampp/htdocs/generate_rtf/arve.rtf";
//$file = "/var/www/html/generate_doc/arve.rtf";

$source = fopen($file, "r");
$text = fread($source, filesize($file));
fclose($source);


function fillin($tag, $value, $text)
{
  return preg_replace("!([/?)(\w+)([^>]$tag?])!e", $value, $text);
  //return str_replace($value, $tag, $text);
}


#$text = fillin("[NIMI]", "Timotey Jebjäinas", $text);
#$text = fillin("[KUUPAEV]", date("d.m.Y"), $text);


header("HTTP/1.1 200 OK");
header("Content-type: application/rtf");

$today = date("ymd_Gis");
$output_filename = "cert_$today.rtf";

header("Content-type: application/force-download");
header("Content-Disposition: attachment; filename=$output_filename");
header("Content-lenght: " . strlen($text));

echo $text;

?> 