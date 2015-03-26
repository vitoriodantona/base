<?php
require("inc/connect.php");
$mysqli = new mysqli($hostname, $username, $password, $dbname);
$mysqli->query("SET NAMES 'utf8'");
$parameter = filter_input(INPUT_GET, 'term');
$resultSet = $mysqli->query("SELECT * FROM estados WHERE estado like '{$parameter}%' ORDER BY estado ASC limit 5");
 if (!$resultSet) {
	 echo '<pre>' , print_r($mysqli->error, 1);
	 die(__FILE__ . '::' . __LINE__); }
	 else {
		while($row = $resultSet->fetch_array()) {
		$rows[] = $row;
		}

		foreach($rows as $row) {
		echo $row['estado'] . "&nbsp;";
		}
	 }
	 $mysqli->close();
?>