<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="css/style.css" rel="stylesheet" type="text/css" >
    <title>Arion instalação</title>
    <style type="text/css">
		#msg{
			margin:0 auto;
			width:300px;
		}
		#titulo{
			color:#09F;
			font-size:25px;
			font-family:"Comic Sans MS", cursive;
		}
	</style>   
    </head>

    <body>
    	<div id="topo">
            <div id="logo">
            </div>
        </div>
   			<div id="conteudo">
        		<div id="form">
                <div id="titulo">
                	Instalação
                </div>
				<form action="" method="post" enctype="multipart/form-data">
							<table border="0">
								<tr><td>Nome</td><td><input class="texto" name="nome" type="text" /></td></tr>
							  <tr><td>Sobrenome</td><td> <input class="texto" name="sobrenome" type="text" /></td></tr>
								<tr><td>Login</td><td><input class="texto" name="login" type="text" /></td></tr>
								<tr><td>Senha</td><td><input class="texto" name="senha" type="password" /></td></tr>
								<tr><td>Email</td><td><input class="texto" name="email" type="text" /></td></tr>
								<tr><td colspan="2"><input class="botao" name="instalar" value="Instalar" type="submit" /></td></tr>
							</table>
				</form>
                </div>
				<div id="msg">
			<?
			if(isset($_POST['instalar'])){
			if($_POST['nome'] == null || $_POST['sobrenome'] == null || $_POST['login'] == null || $_POST['senha'] == null || $_POST['email'] == null){
					echo "Preencha todos os campos corretamente";
			}else{
                require_once('mysql_config.php');
                $conexao = mysql_connect($host, $usuario, $senha) or die ("Não foi possivel conectar ao servidor MySQL");
                echo "Conexao efetuada com sucesso!!<br/>";
                
                $sql = "CREATE DATABASE $db";
                if(mysql_query($sql)){
                    echo "Banco de dados criado<br/>";
                }else{
                    echo "Falha ao criar banco de dados<br/>";
                }
                
                if(mysql_select_db('Arion')){
                    echo "Banco selecionado com exito!<br/>";
                }else{
                    echo "Erro ao selecionar o banco<br/>";
                }
                
                $sql = "CREATE TABLE usuarios(
                                                nome varchar(25),
                                                sobrenome varchar(25),
                                                login varchar(15) not null,
                                                senha varchar(20),
                                                email varchar(50),
                                                codigo varchar(150),
                                                PRIMARY KEY(login)
                                                )";
                if(mysql_query($sql)){
                    echo "Tabela criada com exito!<br/>";
                }else{
                    echo "Falha ao criar tabela<br/>";
                }				
					$sql = "SELECT * FROM 'usuarios' WHERE login='".$_POST['login']."'";				
					if(mysql_query($sql)){						
						echo "Usuario já cadastrado";
					}else{
						$codigo = md5( ($_POST['nome']) . ($_POST['login']) . ($_POST['sobrenome']));
						$sql = "INSERT INTO usuarios (nome, sobrenome, login, senha, email, codigo) VALUES ('".$_POST['nome']."', '".$_POST['sobrenome']."', '".$_POST['login']."', '".$_POST['senha']."', '".$_POST['email']."', '$codigo')";
						if(mysql_query($sql)){
							echo "Usuario incluido com exito!<br><a href='login.php'>Login</a>";
						}else{
							echo "Falha ao incluir o usuario<br>";
						}
					}
				}
			}
            ?>
            </div>
           </div>
		</body>
</html>