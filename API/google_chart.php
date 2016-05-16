<h2>Mis taksot kasutad ?</h2>
<?php
require ('gChart.php');
$barChart = new gBarChart(200,150,'g');
$barChart->addDataSet(array(112));
$barChart->addDataSet(array(212));
$barChart->addDataSet(array(50));
$barChart->setColors(array("22aacc", 
"11ff11", "ff3344"));
$barChart->setLegend(array("Kiisu", 
"Tulika", "Tallink"));
$barChart->setAutoBarWidth();
?>
<img src="<?php print $barChart->getUrl();  ?>" />
