<?php

function getname($name)
{
    global $names;
    
$names = "koer    123
kass    567
kukk    3532
kana    234234";
   
    $rows = explode("\n", $names);
    //print_r($rows);
    
    foreach($rows as $key => $val)
    {
        $temp = explode("    ", $val);
        $surename[$temp[0]] = $temp[1];
    }
    //print_r($surename);
    
    //print_r(array_keys($surename, "koer"));
    
    return $count;
}

getname("koer");

print_r($names);

?>