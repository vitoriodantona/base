<?php
//$i = 0;
//foreach ($_POST['nome2'] as $value) {
//    echo $value." - " . $_POST['grau'][$i] . "";
//$i++;
//}

//$dependentes = filter_input(INPUT_POST, 'dependentes');
$dependentes =  $_POST['dependentes'];
		foreach ($dependentes as $dependente) {
		$dependente_nome = mysql_real_escape_string($dependente['nome']);
		$dependente_nascimento = mysql_real_escape_string($dependente['nascimento']);
		echo "<p>{$dependente_nome} - {$dependente_nascimento}</p>";
		}
