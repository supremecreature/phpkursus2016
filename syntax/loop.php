<?php

$rand = rand(1,444);

for($i = 0; $i < 444; $i++) 
{
    echo "0 ";
    if ($i == $rand) echo "O ";
}
?>