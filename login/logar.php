<?php
	/*////////////////
		Arion 1.0
	///////////////*/
	
	session_start("logado");	//inicia a sessão
	if(isset($_POST['logar'])){	//verifica se esta setado logar
		require_once('funcoes.php');
		conexao();
		$sql_selecao = "SELECT * FROM usuarios WHERE login='".$_POST['login']."' AND senha='".$_POST['senha']."'";
		$res_selecao = selecionar($sql_selecao);	//incere a query
		$linhas = mysql_num_rows($res_selecao);		//verifica se a query retornou algun resultado
		if($linhas != 0){
			//retorno positivo da query
			while($res = mysql_fetch_assoc($res_selecao)){	//coleta todos os valores do usuario
				$_SESSION['nome'] = $res['nome'];
				$_SESSION['sobrenome'] = $res['sobrenome'];
				$_SESSION['login'] = $res['login'];
				$_SESSION['senha'] = $res['senha'];
				$_SESSION['email'] = $res['email'];
				$_SESSION['codigo'] = $res['codigo'];
				$_SESSION['log'] = 1;
				header("location: ../index.php");
			}
		}else{
			//retorno negativo da query
			$_SESSION['msg'] = "Login ou senha invalidos";
			header("location: login.php");
		}
	}else{
		//se não estiver setado o campo logar
		header("location: login.php");
	}
?>