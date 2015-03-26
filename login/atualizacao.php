<?php
	/*////////////////
		Arion 1.0
	///////////////*/
	
	session_start("logado");
	if(isset($_SESSION['log'])){
?>
	<html>
		<head>
			<title>Atualização</title>
			<link href="css/style.css" rel="stylesheet" type="text/css" />
			<script language="JavaScript">
				function codigo(){
					alert("Seu codigo é: <?php echo $_SESSION['codigo']; ?>");
				}
			</script>
		</head>
		<body>
			<div id="topo">
    	<div id="logo">
        </div>
    </div>
	<div id="menu">
		<ul>
			<li><a href="../index.php">Inicio</a></li>
			<li><a href="deslogar.php">Deslogar</a></li>
		</ul>
	</div>
    <div id="conteudo">
				<h3><?php echo$_SESSION['login']; ?></h3>
                <div id="form">
				<form id="formulario" method="post" action="atualizar.php">
					<table border="0">
					<tr><td>Nome</td><td><input class="texto" type="text" name="nome" value="<?php echo $_SESSION['nome'];?>"/></td></tr>
					<tr><td>Sobreome</td><td><input class="texto" type="text" name="sobrenome" value="<?php echo $_SESSION['sobrenome'];?>"/></td></tr>
					<tr><td>Senha</td><td><input class="texto" type="PASSWORD" name="senha" value="<?php echo $_SESSION['senha'];?>"/></td></tr>
					<tr><td>E-mail</td><td><input class="texto" type="text" name="email" value="<?php echo $_SESSION['email'];?>"/></td></tr>
					<tr><td colspan="2"><input class="botao" type="submit" name="atualizar" value="Atualizar"/></td></tr>
					</table>
					<input type="hidden" name="login" value="<?php echo $_SESSION['login']; ?>" />
				</form>
                </div>
				<!-- fim do formulario -->
				
				<?php
					if(isset($_SESSION['msg'])){
					echo $_SESSION['msg'];
					unset($_SESSION['msg']);
					}
				?>
				<br/>
				<button class="botao" onClick="codigo();">Exibir codigo</button>
			</fieldset>
		</div>
		</body>
	</html>
<?php
	}else{
		$_SESSION['msg'] = "Primeiro efetue login";
		header("location: ../index.php");
	}
?>