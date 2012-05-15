<?php 
	$con = mysql_connect("localhost","root","");
	if (!$con) {
		die('Could not connect: ' . mysql_error()); 
	} 
	mysql_select_db("testdata", $con); 
	$result = mysql_query("SELECT * FROM highcharts_php"); 
	while($row = mysql_fetch_array($result)) {
		echo $row['timespan'] . "\t" . $row['visits']. "\n"; 
	} 
	
	mysql_close($con); 

?>