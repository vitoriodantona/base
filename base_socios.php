<?php
header('Content-Type: text/html; charset=utf-8');
require("inc/connect.php");
$mysqli = new mysqli($hostname, $username, $password, $dbname);
$query = "SELECT nome, endereco, bairro, cep FROM base_socios";

	if ($result = $mysqli->query($query)) {
		while ($row = $result->fetch_assoc()) {
		echo $row["nome"] . " - " . $row["endereco"] . " - " . $row["bairro"] . " - " . $row["cep"] . "<br>";
		}
	$result->close();
	}

$mysqli->close();