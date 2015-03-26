<?php //header("Content-Type: text/html; charset=utf-8",true); ?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>SINTRAPAV</title>
<meta name="viewport" content="initial-scale=1,maximum-scale=1,user-scalable=no" />
<link rel="stylesheet" type="text/css" href="css/estilo.css">
</head>
<link rel="stylesheet" type="text/css" href="jquery.autocomplete.css" />
<script type="text/javascript" src="inc/jquery.js"></script>
<script type="text/javascript" src="inc/jquery.autocomplete.js"></script>
<script>

$(document).ready(function(){

uf = document.getElementById('estado').value

$("#estado_origem").autocomplete("inc/inc_estados.php", {

		selectFirst: true
	});

$("#cidade_origem").autocomplete("inc/inc_cidades.php?uf=" + uf +"", {
		selectFirst: true
	});
		
$("#estado").autocomplete("inc/inc_estados.php", {
		selectFirst: true
	});

$("#cidade").autocomplete("inc/inc_cidades.php?q=&uf=" + uf +"", {
		selectFirst: true
	});

$("#funcao").autocomplete("inc/inc_cargos.php", {
		selectFirst: true
	});
});


</script>
<body onload="window.scrollTo(0, 1);">
<img src="images/logo.png" style="padding:10px">

<?php


$_BS['PorPagina'] = 50; // Número de registros por página


$_BS['MySQL']['servidor'] = 'localhost';
$_BS['MySQL']['usuario'] = 'root';
$_BS['MySQL']['senha'] = '';
$_BS['MySQL']['banco'] = 'base';
mysql_connect($_BS['MySQL']['servidor'], $_BS['MySQL']['usuario'], $_BS['MySQL']['senha']);
mysql_select_db($_BS['MySQL']['banco']);
$sql = "SELECT * FROM `base` WHERE chapa = '".@$_GET['id']."'";

$query = mysql_query($sql);



while ($resultado = mysql_fetch_assoc($query)) {

?>

<table border="0" class="table1">
  <tr>
    <th width="25%" scope="col"><div align="right">Nome</div></th>
    <th width="75%" scope="col"><div align="left"><input class="busca" type="text"  name="nome" id="nome" size="54" value="<?php echo $resultado['nome']; ?>"></div></th>
  </tr>
  <tr>
    <td><label for="estado_civil"><div align="right">Estado Civil</div></label></td>
    <td><input type="radio" name="estado_civil" value="s">Solteiro &nbsp; <input name="estado_civil" type="radio" value="c">Casado &nbsp <input type="radio" name="estado_civil" value"m" align="left"> Marital</td>
  </tr>
  <tr>
    <td><div align="right"><label for="estado_origem">Est. Naturalidade</label></div></td>
    <td><table border="0"><td><input class="busca" type="text"  name="estado_origem" id="estado_origem"><td>Cidade</td><td><input type="text" name="cidade_origem" id="cidade_origem"></td></table></td>
  </tr>
  <tr>
    <td><div align="right">Sexo</div></td>
    <td><input name="sexo" type="radio" value="m">Masculino &nbsp <input type="radio" name="sexo" value"f" align="left"> Feminino</td>
  </tr>
  <tr>
    <td><div align="right">Data de Nascimento</div></td>
    <td><input class="busca" type="date" name="data"></td>
  </tr>
  <tr>
    <td><div align="right">Pai</div></td>
    <td><input class="busca" type="test" name="pai"></td>
  </tr>
  <tr>
    <td><div align="right">Mãe</div></td>
    <td><input class="busca" type="text" name="mae"></td>
  </tr>
  <tr>
    <td><div align="right">Endereço</div></td>
    <td><input class="busca" type="text" name="endereco"></td>
  </tr>
  <tr>
    <td><div align="right">Bairro</div></td>
    <td><input class="busca" type="text" name="bairro"></td>
  </tr>
  <tr>
    <td><div align="right">CEP</div></td>
    <td><input class="busca" type="text" name="cep"></td>
  </tr>
    <tr>
    <td><div align="right">Estado</div></td>
    <td><table border="0"><td><input type="text" name="estado" id="estado" Value="Pará"><td>Cidade</td><td><input type="text" name="cidade" id="cidade"><input type="hidden" name="uf" id="uf"></td></table></td>
  </tr>
  <tr>
    <td><div align="right">Telefone</div></td>
    <td><input class="busca" type="tel" name="telefone"></td>
  </tr>
  <tr>
    <td><div align="right">CTPS</div></td>
    <td><input class="busca" type="text" name="ctps"></td>
  </tr>
  <tr>
    <td><div align="right">Série</div></td>
    <td><input class="busca" type="text" name="serie"></td>
  </tr>
  <tr>
    <td><div align="right">CPF</div></td>
    <td><input class="busca" type="text" name="cpf" value="<?php echo $resultado['cpf']; ?>"></td>
  </tr>
  <tr>
    <td><div align="right">Identidade</div></td>
    <td><input class="busca" type="text" name="identidade"></td>
  </tr>
  <tr>
    <td><div align="right">Órgão Emissor</div></td>
    <td><input class="busca" type="text" name="orgao_emissor"></td>
  </tr>
  <tr>
    <td><div align="right">Empresa</div></td>
    <td><input class="busca" type="text" name="empresa"></td>
  </tr>
  <tr>
    <td><div align="right">Referência</div></td>
    <td><input class="busca" type="text" name="referencia"></td>
  </tr>
  <tr>
    <td><div align="right">Função</div></td>
    <td><input class="busca" type="text" name="funcao" id="funcao"></td>
  </tr>
  <tr>
    <td><div align="right">Admissão</div></td>
    <td><input class="busca" type="text" name="admissao"></td>
  </tr>
  <tr>
    <td><div align="right">Hora</div></td>
    <td><input class="busca" type="text" name="salario" value="<?php echo $resultado['hora']; ?>"></td>
  </tr>
  <tr>
    <td></td>
    <td><input type="button" value="Imprimir" onclick="alert(uf)"> &nbsp <input type="button" value="Gerar Carteira"></td>
</tr>
</table>
<?php
}
?>



</body>
</html>