<?php
	/*////////////////
		Arion 1.0
	///////////////*/
	
	session_start("logado");
	if(isset($_POST['cadastrar'])){
		require_once('funcoes.php');
		conexao();
		$sql_selecao = "SELECT * FROM usuarios WHERE login='".$_POST['login']."'";
		$res_selecao = mysql_query($sql_selecao);
		$linhas = mysql_num_rows($res_selecao);
		if($linhas == 0){
			$codigo = md5( ($_POST['nome']) . ($_POST['login']) . ($_POST['sobrenome']));
			$sql_cadastro = "INSERT INTO usuarios (nome, sobrenome, login, senha, email, codigo) VALUES ('".$_POST['nome']."', '".$_POST['sobrenome']."', '".$_POST['login']."', '".$_POST['senha']."', '".$_POST['email']."', '".$codigo."')";
			if(gravar($sql_cadastro)){			
			$_SESSION['msg'] = "Registro incluído com êxito!<br/>seu codigo é: (".$codigo.").<br/>Guarde este codigo em local seguro, pois será essencial para recuperar sua senha.<br/>";
			$_SESSION['nome'] = $_POST['nome'];
			$_SESSION['sobrenome'] = $_POST['sobrenome'];
			$_SESSION['login'] = $_POST['login'];
			$_SESSION['senha'] = $_POST['senha'];
			$_SESSION['email'] = $_POST['email'];
			$_SESSION['codigo'] = $codigo;
			$_SESSION['log'] = 1;
			header("location: ../index.php");
			}else{
				$_SESSION['msg'] = "Não foi possivel efetuar o registro.<br/>";
				header("location: cadastro.php");
			}
		}else{
			$_SESSION['msg'] = "Esse login já esta cadastrado.<br/>";
			header("location: cadastro.php");
		}
	}else{
		header("location: cadastro.php");
	}
?>