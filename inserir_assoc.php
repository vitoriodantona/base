<?php
header('Content-Type: text/html; charset=utf-8');
require("inc/connect.php");
mysqli_query($mysqli, "SET NAMES 'utf8'");
mysqli_query($mysqli, 'SET character_set_connection=utf8');
mysqli_query($mysqli, 'SET character_set_client=utf8');
mysqli_query($mysqli, 'SET character_set_results=utf8');
if (!$mysqli) {
    die("Conexão falhou: " . mysqli_connect_error());
}

$NOME = mysql_real_escape_string($_POST['nome']);
$ESTADO_CIVIL = mysql_real_escape_string($_POST['estado_civil']);
$ESTADO_ORIGEM  = mysql_real_escape_string($_POST['estado_origem']);
$MUNICIPIO_ORIGEM = mysql_real_escape_string($_POST['municipio_origem']);
$SEXO = mysql_real_escape_string($_POST['sexo']);
$DATA_NASC = mysql_real_escape_string($_POST['data_nasc']);
$PAI = mysql_real_escape_string($_POST['pai']);
$MAE = mysql_real_escape_string($_POST['mae']);
$ENDERECO = mysql_real_escape_string($_POST['endereco']);
$BAIRRO = mysql_real_escape_string($_POST['bairro']);
$CEP = mysql_real_escape_string($_POST['cep']);
$MUNICIPIO = mysql_real_escape_string($_POST['municipio']);
$ESTADO = mysql_real_escape_string($_POST['estado']);
$TELEFONE = mysql_real_escape_string($_POST['telefone']);
$CTPS = mysql_real_escape_string($_POST['ctps']);
$SERIE = mysql_real_escape_string($_POST['serie']);
$CPF = mysql_real_escape_string($_POST['cpf']);
$IDENTIDADE = mysql_real_escape_string($_POST['identidade']);
$ORGAO_EMISSOR = mysql_real_escape_string($_POST['orgao_emissor']);
$EMPRESA = mysql_real_escape_string($_POST['empresa']);
$REFERENCIA = mysql_real_escape_string($_POST['referencia']);
$FUNCAO = mysql_real_escape_string($_POST['funcao']);
$DATA_ADMISSAO = mysql_real_escape_string($_POST['admissao']);
$SALARIO = mysql_real_escape_string($_POST['salario']);
//$ADMIN = mysql_real_escape_string($_POST['nome']);
//$STATUS = mysql_real_escape_string($_POST['nome']);

$sql = "INSERT INTO base_socios (NOME,
                                 ESTADO_CIVIL, 
								 ESTADO_NASC, 
								 MUN_NASC,
								 SEXO,
                                 DATA_NASC,
								 PAI,
								 MAE,
								 ENDERECO,
								 CEP,
								 BAIRRO,
								 CIDADE,
								 ESTADO,
								 TELEFONE,
								 CTPS,
								 SERIE,
								 CPF,
								 IDENTIDADE,
								 ORGAO_EMISSOR,
								 EMPRESA,
								 REFERENCIA,
								 FUNCAO,
								 DATA_ADMISSAO,
								 SALARIO)
								 
								 VALUES(
								 
								'$NOME',
								'$ESTADO_CIVIL',
								$ESTADO_ORIGEM,
								$MUNICIPIO_ORIGEM,
								'$SEXO',
                                '$DATA_NASC',
								'$PAI',
								'$MAE',
								'$ENDERECO',
								'$CEP',
								'$BAIRRO', 
								$MUNICIPIO,
                                $ESTADO,
								$TELEFONE,
								'$CTPS',
								'$SERIE',
								'$CPF',
								'$IDENTIDADE',
                                '$ORGAO_EMISSOR',
								$EMPRESA,
								$REFERENCIA,
								$FUNCAO,
								'$DATA_ADMISSAO',
                                $SALARIO)";

 if (mysqli_query($mysqli, $sql)) {
    echo "<font face='verdana' color='#ff0000'>Registro inserido!</font><br>";
 } else {
echo '<pre>' , print_r($mysqli->error, 1);
echo "<br>" . $sql;
 die(__FILE__ . '::' . __LINE__); 
 
 }

 $sql = "SELECT * FROM  base_socios ORDER BY CODIGO DESC LIMIT 1";

    $query = mysqli_query($mysqli, $sql);

    while ($resultado = mysqli_fetch_assoc($query)) {
	
	    $id = $resultado['CODIGO'];
		
		$dependentes =  $_POST['dependentes'];
		foreach ($dependentes as $dependente) {
		$dependente_nome = mysql_real_escape_string($dependente['nome']);
		$dependente_grau = mysql_real_escape_string($dependente['grau']);
		$dependente_nascimento = mysql_real_escape_string($dependente['nascimento']);
		$admin = 0;
		
		$sql = "INSERT INTO dependentes (cod_assoc, nome, grau, data_nasc, admin) VALUES ($id, '$dependente_nome', '$dependente_grau', '$dependente_nascimento', $admin)";
		
		 print_r($_POST);
			if (mysqli_query($mysqli, $sql)) {
			echo "<br>Dependentes inserido.<br>";	
			} else {
echo '<pre>' , print_r($mysqli->error, 1);
echo "<br>" . $sql;
 die(__FILE__ . '::' . __LINE__); 
 
 }

        }
	}
		
	


mysqli_close($mysqli);