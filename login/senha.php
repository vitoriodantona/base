<?php
	/*////////////////
		Arion 1.0
	///////////////*/
	
	session_start("logado");
?>
<html>
		<head>
			<title>Recuperar senha</title>
			<link href="css/style.css" rel="stylesheet" type="text/css" />
		</head>
		<body>
			<div id="topo">
    	<div id="logo">
        </div>
    </div>
	<div id="menu">
		<ul>
			<li><a href="login.php">login</a></li>
            <li><a href="cadastro.php">Cadastro</a></li>
		</ul>
	</div>
    <div id="conteudo">
    			<div id="form">
				<form id="formulario" method="post" action="alterar_senha.php">
					<table border="0">
						<tr><td>Codigo</td><td><input class="texto" type="text" name="codigo" /></td></tr>
						<tr><td>Senha</td><td><input class="texto" type="password" name="senha1" /></td></tr>
						<tr><td>Confirme a senha</td><td><input class="texto" type="password" name="senha2" /></td></tr>
						<tr><td colspan="2"><input class="botao" type="submit" name="alterar" value="Alterar"/></td></tr>
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