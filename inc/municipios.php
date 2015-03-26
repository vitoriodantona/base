<?php
require("connect.php");
$mysqli->query("SET NAMES 'utf8'");
$parameter = filter_input(INPUT_GET, 'term');
$parameter2 = filter_input(INPUT_GET, 'uf');
$resultSet = $mysqli->query("SELECT * FROM municipios WHERE municipio like '{$parameter}%' AND uf = '{$parameter2}' ORDER BY municipio ASC limit 5");
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
	 
	 
	
?>