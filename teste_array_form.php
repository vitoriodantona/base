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
<body>
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
	
});
	</script>
<form action="processa.php" method="post" name="dependentes">
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
                <td class="linha-left"><input type="text" name="dependentes[0][nome]" size="30" /></td>
                <td class="linha-center"><input type="text" name="dependentes[0][grau]" size="10" /></td>
				<td class="linha-right"><input type="text" name="dependentes[0][nascimento]" size="10" /></td>
            </tr>
        </tbody
		<td><input type="submit" value="Submeter"></td>
    </table>
      <div style="clear:both"></div>
    </div>
	</form>
	</body>
	</html>