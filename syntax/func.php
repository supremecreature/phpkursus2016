<?php

function getname_local($name)
{
    
$namelist = "Koer    123
Kass    567
Kass     1
Ilves    3532
Kana    234234";

//$namelist = file_get_contents('http://students.tmk.edu.ee/andmebaas/SQL/names_surnames.txt');
   
    $name = ucfirst($name); #sentence case
   
    $rows = explode("\n", $namelist);
    //print_r($rows);
    
    foreach($rows as $key => $val)
    {
        $temp = explode("    ", $val);
        $lastname = str_replace(' ',  '', $temp[0]); #remove spaces
        $namecount = $temp[1];
        $surenames[$lastname] = $surenames[$lastname] + $namecount;
    }
    //print_r($surenames);
    
    //print_r(array_keys($surenames)); #array keys

    $count = $surenames[$name];
   
    return $count;
}




function getname_remote($name)
{
    
/*$namelist = "Koer    123
Kass    567
Kass     1
Ilves    3532
Kana    234234";*/

$namelist = file_get_contents('http://students.tmk.edu.ee/andmebaas/SQL/names_surnames.txt');
  
    $name = ucfirst($name); #sentence case
   
    $rows = explode("\n", $namelist);
    //print_r($rows);
    
    foreach($rows as $key => $val)
    {
        $val = str_replace(' ', '', $val); #remove spaces
        $temp = explode("\t", $val);
        $lastname = $temp[0];
        $namecount = $temp[1];
        $surenames[$lastname] = $surenames[$lastname] + $namecount;
    }
    //print_r($surenames);
    
    //print_r(array_keys($surenames)); #array keys

    $count = $surenames[$name];
   
    return $count;
}

echo "<h2>TEST</h2>";

echo "Perenime Ilves esinemissagedus " . getname_local ("ilves") . "<br>";
echo "Perenime Koer esinemissagedus " . getname_local ("Koer") . "<br>";
echo "Perenime Kass esinemissagedus " . getname_local ("Kass") . "<br>";

echo "<h2>STAT andmed</h2>";

echo "Perenime Ilves esinemissagedus " . getname_remote ("ilves") . "<br>";
echo "Perenime Koer esinemissagedus " . getname_remote ("Koer") . "<br>";
echo "Perenime Kass esinemissagedus " . getname_remote ("Kass") . "<br>";
echo "Perenime Rebane esinemissagedus " . getname_remote ("rebane") . "<br>";
echo "Perenime Ivanov esinemissagedus " . getname_remote ("Ivanov") . "<br>";

?>