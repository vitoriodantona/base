<?php
	/*////////////////
		Arion 1.0
	///////////////*/
	
	session_start("logado");
	unset($_SESSION['nome']);
	unset($_SESSION['sobrenome']);
	unset($_SESSION['login']);
	unset($_SESSION['senha']);
	unset($_SESSION['email']);
	unset($_SESSION['codigo']);
	unset($_SESSION['log']);
	session_destroy();
	header("location: login.php");
?>