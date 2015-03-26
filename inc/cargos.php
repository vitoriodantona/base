<?php
require("connect.php");
$mysqli = new mysqli($hostname, $username, $password, $dbname);
$mysqli->query("SET NAMES 'utf8'");
$parameter = filter_input(INPUT_GET, 'term');
$resultSet = $mysqli->query("SELECT * FROM cargos WHERE cargo LIKE '%{$parameter}%' ORDER BY cargo ASC LIMIT 10");
 if (!$resultSet) {
	 echo '<pre>' , print_r($mysqli->error, 1);
	 die(__FILE__ . '::' . __LINE__); }
	 else {
		 $result = array(); 
		 foreach ($resultSet as $row) {
		 $result[] = $row;
		 }
		 print_r(json_encode($result));
		 }
	$mysqli->close();
