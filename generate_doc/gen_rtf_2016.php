<?php

#pastefake
#http://thejh.net/misc/website-terminal-copy-paste

$rtf= file_get_contents('cert_msword.rtf');

$rtf = str_replace('[NIMI]', 'Taaniel Tina', $rtf);
$rtf = str_replace('[KUUPAEV]', date('m-d-Y'), $rtf);

$today = date("ymd_His");
$output_filename = "generated_rtf_$today.rtf";

header('Content-type: application/msword');
header('Content-Disposition: attachment; filename='.$output_filename.'');
echo $rtf;
die();

?>