<?php
	/*////////////////
		Arion 1.0
	///////////////*/
	
	session_start("logado");
	if(!isset($_SESSION['log'])){
?>
	<html>
		<head>
			<title>Cadastro</title>
			<link href="css/style.css" rel="stylesheet" type="text/css" />
		</head>
		<body>
			<div id="topo">
    	<div id="logo">
        </div>
    </div>
	<div id="menu">
		<ul>
			<li><a href="login.php">Login</a></li>
			<li><a href="senha.php">Senha</a></li>
		</ul>
	</div>
    <div id="conteudo">
				<!-- formulario -->
                <div id="form">
				<form id="formulario" method="post" action="cadastrar.php">
					<table border="0">
					<tr><td>Nome</td><td><input class="texto" type="text" name="nome" /></td></tr>
					<tr><td>Sobreome</td><td><input class="texto" type="text" name="sobrenome" /></td></tr>
					<tr><td>Login</td><td><input class="texto" type="text" name="login" /></td></tr>
					<tr><td>Senha</td><td><input class="texto" type="password" name="senha" /></td></tr>
					<tr><td>E-mail</td><td><input class="texto" type="text" name="email" /></td></tr>
					<tr><td colspan="2"><input class="botao" type="submit" name="cadastrar" value="Cadastrar"/></td></tr>
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
			</fieldset>
		</div>
		</body>
	</html>
<?php
	}else{
		$_SESSION['msg'] = "Você já esta logado";
		header("location: ../index.php");
	}
?>