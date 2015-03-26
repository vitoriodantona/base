<?php
	session_start("logado");
	if(!isset($_SESSION['log'])){
?>
	<html>
		<head>
			<title>Login</title>
			<link href="css/style.css" rel="stylesheet" type="text/css" />
		</head>
		<body>
			<div id="topo">
    	<div id="logo">
        </div>
    </div>
	<div id="menu">
		<ul>
			<li><a href="cadastro.php">Cadastro</a></li>
			<li><a href="senha.php">Senha</a></li>
		</ul>
	</div>
    <div id="conteudo">
				
				<!-- formulario -->
				<div id="form">
				<form id="formulario" method="post" action="logar.php">
					<table border="0">
					<tr><td>Login</td><td><input class="texto" type="text" name="login" /></td></tr>
					<tr><td>Senha</td><td><input class="texto" type="password" name="senha" /></td></tr>
					<tr><td colspan="2"><input class="botao" type="submit" name="logar" value="Logar" /></td></tr>
					</table>
				</form>
                </div>
				<!-- fim do formulario -->
				
				<?php
					//exibe a mensagem recebida
					if(isset($_SESSION['msg'])){
						echo $_SESSION['msg'];
						unset($_SESSION['msg']);
					}
				?>
			</div>
		</body>
	</html>
<?php
	}else{
		session_start("msg");
		$_SESSION['msg'] = "Você já esta logado";
		header("location: ../index.php");
	}
?>