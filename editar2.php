<?php
header('Content-Type: text/html; charset=utf-8');
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>SINTRAPAV</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="initial-scale=1,maximum-scale=1,user-scalable=no" />
<link rel="stylesheet" type="text/css" href="css/estilo.css">
<link rel="stylesheet" href="css/jquery-ui.css">
</head>
<body onload="window.scrollTo(0, 1);">
<img src="images/logo.png" style="padding:10px">

<?php


$_BS['PorPagina'] = 50; // Número de registros por página


$_BS['MySQL']['servidor'] = 'localhost';
$_BS['MySQL']['usuario'] = 'root';
$_BS['MySQL']['senha'] = '';
$_BS['MySQL']['banco'] = 'base';
$con = mysqli_connect($_BS['MySQL']['servidor'], $_BS['MySQL']['usuario'], $_BS['MySQL']['senha'], $_BS['MySQL']['banco']);

$sql = "SELECT * FROM `base` WHERE chapa = '".	$_GET['id']."'";

$query = mysqli_query($con, $sql);



		while ($resultado = mysqli_fetch_assoc($query)) {
			
			$i = $resultado['estado_civil'];
			$estado_civil1 = '';
			$estado_civil2 = '';
			$estado_civil3 = '';
			switch ($i) {
				
				case "S":
					$estado_civil1 =  "checked";
				break;
				
				case "C":
					$estado_civil2 =  "checked";
				break;
				
				case "M":
					$estado_civil3 =  "checked";
				break;
			}
			
			$i = $resultado['sexo'];
			$masculino = '';
			$feminino = '';
			switch ($i) {
				
				case "M":
					$masculino =  "checked";
				break;
				
				case "F":
					$feminino =  "checked";
				break;
				}
		
?>

<table border="0">
<form method="post" action="inserir_assoc.php">
<input type="hidden" name="estado_origem" id="estado_origem" />
<input type="hidden" name="municipio_origem" id="municipio_origem" />
<input type="hidden" name="estado" id="estado" />
<input type="hidden" name="municipio" id="municipio" />
<input type="hidden" name="cargo" id="cargo">
  <tr>
    <td width="25%"><div align="right"><label for="nome">Nome</label></div></th>
    <td width="75%"><div align="left"><input  type="text"  name="nome" id="nome" size="55" value="<?php echo $resultado['nome']; ?>"></div></th>
  </tr>
  <tr>
    <td><div align="right"><b>Estado Civil</div></td>
    <td><input type="radio" name="estado_civil" value="s" <?php echo $estado_civil1; ?>>Solteiro &nbsp; <input name="estado_civil" type="radio" value="c" <?php echo $estado_civil2; ?>>Casado &nbsp <input type="radio" name="estado_civil" value"m" <?php echo $estado_civil3; ?>> Marital</td>
  </tr>
  <tr>
    <td><div align="right"><label for="estado_origem_autocomplete">Est. Naturalidade</label></div></td>
    <td><table border="0"><td><input  type="text" name="estado_origem_autocomplete" id="estado_origem_autocomplete"><td><label for="municipio_origem_autocomplete">Cidade</label></td><td><input type="text" name="municipio_origem_autocomplete" id="municipio_origem_autocomplete"></td></table></td>
  </tr>
  <tr>
    <td><div align="right"><b>Sexo</b></div></td>
    <td><input name="sexo" type="radio" value="m" <?php echo $masculino; ?>>Masculino &nbsp <input type="radio" name="sexo" value"f" <?php echo $feminino; ?> align="left"> Feminino</td>
  </tr>
  <tr>
    <td><div align="right"><label for="data_nasc">Data de Nascimento</label></div></td>
    <td><input  type="date" name="data_nasc" id="data_nasc"></td>
  </tr>
  <tr>
    <td><div align="right"><label for="pai">Pai</label></div></td>
    <td><input  type="text" size="54"  name="pai"></td>
  </tr>
  <tr>
    <td><div align="right"><label for="mae">Mãe</label></div></td>
    <td><input  type="text" size="54" name="mae"></td>
  </tr>
  <tr>
    <td><div align="right"><label for="endereco">Endereço</label></div></td>
    <td><input  type="text" size="54" name="endereco"></td>
  </tr>
  <tr>
    <td><div align="right"><label for="bairro">Bairro</label></div></td>
    <td><input  type="text" size="27" name="bairro"></td>
  </tr>
  <tr>
    <td><div align="right"><label for="cep">CEP</label></div></td>
    <td><input  type="text" name="cep"></td>
  </tr>
    <tr>
    <td><div align="right"><label for="estado_autocomplete">Estado</label></div></td>
    <td><table border="0"><td><input type="text" name="estado_autocomplete" id="estado_autocomplete"><td><label for="municipio_autocomplete">Cidade</label></td><td><input type="text" name="municipio_autocomplete" id="municipio_autocomplete"><input type="hidden" name="uf" id="uf"></td></table></td>
  </tr>
  <tr>
    <td><div align="right"><label for="telefone">Telefone</label></div></td>
    <td><input  type="tel" name="telefone"></td>
  </tr>
  <td colspan="2">
     <div id="titulo">
        <a href="#" id="mais"><b>Adicionar Dependente</b></a>
    </div>
    <div style="clear:both"></div>
      <table cellpadding="0" cellspacing="0" id="lista">
        <thead>
            <tr>
                <th class="cab-right">Nome</th>
                <th class="cab-center">Grau</th>
				<th class="cab-left">Data de Nascimento</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <td class="foot-left"></td>
                <td class="foot-center"></td>
				<td class="foot-right"></td>
            </tr>
        </tfoot>
        <tbody>
            <tr>
                <td class="linha-left"><input type="text" name="dependentes[1][nome]" size="30" /></td>
                <td class="linha-center"><input type="text" name="dependentes[1][grau]" size="10" /></td>
				<td class="linha-right"><input type="text" name="dependentes[1][nascimento]" size="10" /></td>
            </tr>
        </tbody>
    </table>
    <input type="hidden" value="1" name="quantidade_itens" /> 
      <div style="clear:both"></div>
    </div>
  </td>
  <tr>
    <td><div align="right"><label for="ctps">CTPS</label></div></td>
    <td><table border="0"><td><input  type="text" name="ctps" id="ctps"><td><label for="serie">Série</label></td><td><input type="text" name="serie" id="serie"></td></table></td>
  </tr>
  <tr>
    <td><div align="right"><label for="cpf">CPF</label></div></td>
    <td><input  type="text" name="cpf" value="<?php echo $resultado['cpf']; ?>"></td>
  </tr>
  <tr>
    <td><div align="right"><label for="identidade">Identidade</label></div></td>
    <td><table border="0"><td><input  type="text" name="identidade" id="identidade"><td><label for="orgao_emissor">Órgão Emissor</label></td><td><input type="text" name="orgao_emissor" id="orgao_emissor"></td></table></td>
  </tr>
  <tr>
    <td><div align="right">Empresa</div></td>
    <td><input  type="text" name="empresa"></td>
  </tr>
  <tr>
    <td><div align="right">Referência</div></td>
    <td><input  type="text" name="referencia"></td>
  </tr>
  <tr>
    <td><div align="right">Função</div></td>
    <td><input  type="text" name="funcao" id="funcao"></td>
  </tr>
  <tr>
    <td><div align="right">Admissão</div></td>
    <td><input  type="text" name="admissao"></td>
  </tr>
  <tr>
    <td><div align="right">Hora</div></td>
    <td><input  type="text" name="salario" value="<?php echo $resultado['hora']; ?>"></td>
  </tr>
  <tr>
    <td></td>
    <td><input type="submit" value="Inserir"></td>
</tr>
</table>
</form>
<script src="js/jquery-2.1.3.min.js"></script>
<script src="js/jquery-ui.js"></script>
		<script>
		
		// JavaScript Document
$(function(){
	
	$('#mais').click(function(){
		
		var next = $('#lista tbody').children('tr').length + 1;
		
		$('#lista tbody').append('<tr>' + 
        	'<td class="linha-left"><input type="text" name="dependentes['+next+'][nome]" size="30" /></td>' + 
            '<td class="linha-center"><input type="text" name="dependentes['+next+'][grau]" size="10" /></td>' +
			'<td class="linha-right"><input type="text" name="dependentes['+next+'][nascimento]" /></td>' +
        '</tr>');
		
		$(':hidden').val(next);
		
		
		return false;
	});
	
	$('form').submit(function(){
		
		var parametros = $(this).serialize();
		
	/*	$.get(
			$(this).attr('action'),
			parametros,
			function(data){
				$('#resultado').empty().append(data);
			},
			"html"
		)
		
		return false;
	*/	
	});
	

});
		
		
			$('#estado_origem_autocomplete').autocomplete({
				source: function (request, response) {
					$.ajax({
						url: 'inc/estados.php?term='+$('#estado_origem_autocomplete').val(),
						dataType: 'json'
					}).done(function(data) {
						var result = $.map( data, function( item ) {
				        	console.log(item);
			                return {
			                    label: item.estado,
			                    value: item.id
			                }
			            })
						response(result);
					})
			    },
			    focus: function(event, ui) {
		            $("#estado_origem_autocomplete").val(ui.item.label);
		            return false;
				},
			    change: function(event, ui) {
		            $("#estado_origem").val(ui.item.value);
		            $("#estado_origem_autocomplete").val(ui.item.label);
		            return false;
				},
			    select: function( event, ui ) {
		            $("#estado_origem").val(ui.item.value);
		            $("#estado_origem_autocomplete").val(ui.item.label);
		            return false;
		        },
			});
			
			$('#municipio_origem_autocomplete').autocomplete({
				source: function (request, response) {
					$.ajax({
						url: 'inc/municipios.php?uf='+$('#estado_origem').val()+'&term='+$('#municipio_origem_autocomplete').val(),
						dataType: 'json'
					}).done(function(data) {
						var result = $.map( data, function( item ) {
				        	console.log(item);
			                return {
			                    label: item.municipio,
			                    value: item.id
			                }
			            })
						response(result);
					})
			    },
			    focus: function(event, ui) {
		            $("#municipio_origem").val(ui.item.label);
		            return false;
				},
			    change: function(event, ui) {
		            $("#municipio_origem").val(ui.item.value);
		            $("#municipio_origem_autocomplete").val(ui.item.label);
		            return false;
				},
			    select: function( event, ui ) {
		            $("#municipio_origem").val(ui.item.value);
		            $("#municipio_origem_autocomplete").val(ui.item.label);
		            return false;
		        },
			});
			
			
			
			$('#estado_autocomplete').autocomplete({
				source: function (request, response) {
					$.ajax({
						url: 'inc/estados.php?term='+$('#estado_autocomplete').val(),
						dataType: 'json'
					}).done(function(data) {
						var result = $.map( data, function( item ) {
				        	console.log(item);
			                return {
			                    label: item.estado,
			                    value: item.id
			                }
			            })
						response(result);
					})
			    },
			    focus: function(event, ui) {
		            $("#estado_autocomplete").val(ui.item.label);
		            return false;
				},
			    change: function(event, ui) {
		            $("#estado").val(ui.item.value);
		            $("#estado_autocomplete").val(ui.item.label);
		            return false;
				},
			    select: function( event, ui ) {
		            $("#estado").val(ui.item.value);
		            $("#estado_autocomplete").val(ui.item.label);
		            return false;
		        },
			});
			
			$('#municipio_autocomplete').autocomplete({
				source: function (request, response) {
					$.ajax({
						url: 'inc/municipios.php?uf='+$('#estado').val()+'&term='+$('#municipio_autocomplete').val(),
						dataType: 'json'
					}).done(function(data) {
						var result = $.map( data, function( item ) {
				        	console.log(item);
			                return {
			                    label: item.municipio,
			                    value: item.id
			                }
			            })
						response(result);
					})
			    },
			    focus: function(event, ui) {
		            $("#municipio").val(ui.item.label);
		            return false;
				},
			    change: function(event, ui) {
		            $("#municipio").val(ui.item.value);
		            $("#municipio_autocomplete").val(ui.item.label);
		            return false;
				},
			    select: function( event, ui ) {
		            $("#municipio").val(ui.item.value);
		            $("#municipio_autocomplete").val(ui.item.label);
		            return false;
		        },
			});
</script>

<?php
		}
?>		

</body>
</html>