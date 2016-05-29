<?php
/*
// Get a file into an array.  In this example we'll go through HTTP to get
// the HTML source of a URL.
$lines = file('http://www.example.com/');

// Loop through our array, show HTML source as HTML source; and line numbers too.
foreach ($lines as $line_num => $line) {
    echo "Line #<b>{$line_num}</b> : " . htmlspecialchars($line) . "<br />\n";
}
*/


// Using the optional flags parameter since PHP 5
$trimmed = file('estonian-words.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
// print_r($trimmed);

foreach ($trimmed as $line_num => $line) {
    // echo "Line #<b>{$line_num}</b> : " . $line . "<br />\n";
	$findme = 'est';
	$pos = strpos(strtolower($line), $findme);
	
	# found
	if ($pos == true AND strlen($line) < 15)
	{
		$counter++;
		$line = str_replace($findme, "<b>".strtoupper($findme)."</b>", $line );
		echo "$counter) " . $line . "<br />\n";
	}
}

?>
