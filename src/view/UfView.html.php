<?php
	$retorno = '<table>'; $retorno .= '<thead><tr><th>Nome</th><th>Sigla</th></thead>'; $retorno .= '<tbody>';
	foreach ($dados as $estado) {
		$retorno .= "<tr><td>{$estado['estado']}</td><td>{$estado['uf']}</td></tr>";
	}
	$retorno .= '</tbody>';