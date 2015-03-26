<?php
	/*////////////////
		Arion 1.0
	///////////////*/
	
	session_start("logado");		//inicia a sessуo
	require_once('funcoes.php');	//incere as funчѕes
	if(isset($_POST['alterar'])){	//Verifica se o campo alterar esta setado
	
		if($_POST['codigo'] == null || $_POST['senha1'] == null || $_POST['senha2'] == null){
			$_SESSION['msg'] = "Preencha todos os campos";	//mensagem
			header("location: senha.php");//redirecionamento
		}else{
			conexao(); //funчуo de conexуo com MySQL
			$sql = "SELECT * FROM usuarios WHERE codigo='".$_POST['codigo']."'";
			$linha = mysql_query($sql);
			$linha = mysql_num_rows($linha);
			if($linha != 0){
				$senha1 = $_POST['senha1'];	//
				$senha2 = $_POST['senha2'];	//recupera os valores
				$codigo = $_POST['codigo'];	//
				
			if($_POST['senha1'] == $_POST['senha2']){	//verifica se as senhas conferem					
					$sql_senha = "UPDATE usuarios SET senha='$senha1' WHERE codigo='$codigo'";	// sql que altera a senha onde o codigo for igual
					
					$ver = atualizar($sql_senha);	//insere a query
					if($ver){
						// se o retorno for positivo
						$_SESSION['msg'] = "Senha alterada com ъxito!";		//mensagem
						header("location: senha.php");//redirecionamento
					}else{
						//se o retorno for negativo
						$_SESSION['msg'] = "Codigo incorreto";	//mensagem
						header("location: senha.php");	//redirecionamento
					}
				
			}else{
				//se as senhas nуo conferirem
				$_SESSION['msg'] = "Senha nуo confere";	//mensagem
				header("location: senha.php");//redirecionamento
			}
			}else{
				$_SESSION['msg'] = "Codigo invalido";	//mensagem
				header("location: senha.php");//redirecionamento
			}
		}
	}else{
		$_SESSION['msg'] = "Primeiro preencha os campos";	//mensagem
		header("location: senha.php");//redirecionamento
	}
?>