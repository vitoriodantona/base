<?php
	/*////////////////
		Arion 1.0
	///////////////*/
	
	session_start("logado");
	require_once('funcoes.php');
	
	if(isset($_POST['atualizar'])){	//verifica se  campo atualizar esta setado
		conexao();	//conexгo
		$sql_ataulizacao = "UPDATE usuarios SET nome='".$_POST['nome']."', sobrenome='".$_POST['sobrenome']."', senha='".$_POST['senha']."', email='".$_POST['email']."' WHERE login='".$_POST['login']."'"; //query de atualizaзгo
		$ver = atualizar($sql_ataulizacao);	//insere a query
		if($ver){
			//retorno positivo da query
			$_SESSION['msg'] = "Registro alterado com кxito";	//mensagem
			$sql_selecao = "select * from usuarios where login='".$_POST['login']."'";	//seleciona os novos dados
			$res_selecao = selecionar($sql_selecao);	//insere a query
			
			while($res = mysql_fetch_assoc($res_selecao)){	//atualiza os dados do usuario logado
			$_SESSION['nome'] = $res[nome];
			$_SESSION['sobrenome'] = $res[sobrenome];
			$_SESSION['login'] = $res[login];
			$_SESSION['senha'] = $res[senha];
			$_SESSION['email'] = $res[email];
			}
			header("location: ../index.php");
		}else{
			//retorno negativo da query
			$_SESSION['msg'] = "Nгo foi possнvel atualizar seus dados";
			header("location: atualizacao.php");
		}
	}else{
		//se nгo estiver setado o campo atualizar
		header("location: atualizacao.php");
	}
?>