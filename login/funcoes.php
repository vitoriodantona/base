<?php
	/*////////////////
		Arion 1.0
	///////////////*/
	
	function conexao(){
		require_once('mysql_config.php');
		mysql_connect($host, $usuario, $senha) or die("Não foi possivel se conectar ao servidor de bancos de dados: ".mysql_error());
		mysql_select_db($db) or die("Banco de dado nao encontrado: ".mysql_error());
	}
	function selecionar($sql){
		return $retorno = mysql_query($sql);
	}
	function gravar($sql){
		if(mysql_query($sql)){
			return TRUE;
		}else{
			return FALSE;
		}
	}
	function atualizar($sql){
		if(mysql_query($sql)){
			return TRUE;
		}else{
			return FALSE;
		}
	}
?>