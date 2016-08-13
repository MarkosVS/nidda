<?PHP
	include("includes/head.php");
?>
<title>Entrar/Registrar - NIDDA</title>
</head>

<body>
	<header>
			<div id="divlogo">
				<div id="centerlogo">
					<img id="logotipo" src="images/logotipo.png">
				</div>
			</div>
	</header>
	<!-- Fim cabeçalho - inicio menu -->
	<?PHP $pagina = "login"; /* variavel de pagina*/?>
	<div id="menu">
		<nav id="navmenu">
			<ul id="listmenu">
				<?PHP include("includes/menu.php");?>
			</ul>
		</nav>
	</div>
	<!-- Fim do Menu - inicio do Banner  -->
	<section id="slides">	
		<?PHP include("includes/banner.php");?>
	</section>
	<?PHP // redireciona para a página inicial caso já exista uma sessão
	if(isset($_SESSION['usuarionidda']) && (isset($_SESSION['senhanidda']))){
		header("Location: index.php");
		exit;
	}
	?>
	<!-- Fim do Banner - inicio do Conteúdo  -->
	<section id="conteudo">
		<div id="cont1">
			<div class="topic-box">
				<strong>Entrar</strong>
				<form class="entrar/registrar" id="login" action="#" method="post" enctype="multipart/form-data">
					<div class="form-field">
						<label for="usuario">Usuário</label>
						<input class="input-login" type="text" id="usuario" name="usuario" value="" placeholder="Nome de Usuário">
					</div>
					<div class="form-field">
						<label for="senha">Senha<br></label>
						<input class="input-login" type="password" id="senha" name="senha" value="" placeholder="Senha">
					</div>
					<div class="form-field input-botoes">
						<input class="input-login input-submit" type="submit" name="entrar" id="entrar" value="Entrar">
					</div>
				</form>
				<?PHP //código para fazer o login
					if(isset($_POST['entrar'])){
						$usuario = trim(strip_tags($_POST['usuario']));
						$senha = trim(strip_tags($_POST['senha']));
						$senhaCrip = md5('_PiApDc68@4165*4#' . $senha);
						$select = "SELECT * from login WHERE BINARY usuario=:usuario AND BINARY senha=:senhaCrip";
						try{
							$result = $conexao->prepare($select);
							$result->bindParam(':usuario', $usuario, PDO::PARAM_STR);
							$result->bindParam(':senhaCrip', $senhaCrip, PDO::PARAM_STR);
							$result->execute();
							$contar = $result->rowCount();
							if($contar>0){
								$usuario = $_POST['usuario'];
								$senha = $_POST['senha'];
								$_SESSION['usuarionidda'] = $usuario;
								$_SESSION['senhanidda'] = $senhaCrip;
								echo 'Conectado com sucesso.';
								header("Refresh: 1, index.php");
							}else{
								echo 'Nome de Usuário ou senha incorretos';
							}
						}catch(PDOException $erro){
							echo $erro;
						}
					}
				?>
			</div>
			
			<div class="topic-box">
				<strong>Registrar</strong>
				<form class="entrar/registrar" id="signup" action="#" method="post" enctype="multipart/form-data">
					<div class="form-field">
						<label for="usuario">Nome</label>
						<input class="input-login input-bug" type="text" id="nome" name="nome" value="" placeholder="Nome">
					</div>
					<div class="form-field">
						<label for="usuario">Sobrenome</label>
						<input class="input-login input-bug" type="text" id="sobrenome" name="sobrenome" value="" placeholder="Sobrenome">
					</div>
					<div class="form-field">
						<label for="usuario">E-mail</label>
						<input class="input-login input-bug" type="text" id="email" name="email" value="" placeholder="E-mail">
					</div>
					<div class="form-field">
						<label for="usuario">Nome de Usuário</label>
						<input class="input-login input-bug" type="text" id="usuario" name="usuario" value="" placeholder="Nome de Usuário">
					</div>
					<div class="form-field">
						<label for="senha">Senha<br></label>
						<input class="input-login input-bug" type="password" id="senha" name="senha" value="" placeholder="Senha">
					</div>
					<div class="form-field">
						<label for="senha">Confirmar Senha<br></label>
						<input class="input-login input-bug" type="password" id="c-senha" name="c-senha" value="" placeholder="Senha">
					</div>
					<div class="form-field input-botoes">
						<input class="input-login input-submit" type="submit" name="registrar" id="registrar" value="Registrar">
					</div>
				</form>
				<?PHP //código para fazer o registrar
					if(isset($_POST['registrar'])){
						$regNome = trim(strip_tags($_POST['nome']));
						$regSobrenome = trim(strip_tags($_POST['sobrenome']));
						$regEmail = trim(strip_tags($_POST['email']));
						$regUsuario = trim(strip_tags($_POST['usuario']));
						$regSenha = trim(strip_tags($_POST['senha']));
						$regCsenha = trim(strip_tags($_POST['c-senha']));
						$regNivel = 10;
						
						if($regSenha == $regCsenha){
							$selectVerificar = "SELECT * from login WHERE usuario LIKE '$regUsuario'";
							$result = $conexao->prepare($selectVerificar);
							$result->execute();
							$contar = $result->rowCount();
							if($contar>0){
								echo "O nome de Usuário já existe";
							}else{
								$selectVerificar2 = "SELECT * from login WHERE email LIKE '$regEmail'";
								$result2 = $conexao->prepare($selectVerificar2);
								$result2->execute();
								$contar2 = $result2->rowCount();
								if($contar2>0){
									echo "Este e-mail já foi cadastrado";
								}else{
									$registrarSenha =  md5('_PiApDc68@4165*4#' . $regSenha);
									$insert = "INSERT into login (nome, sobrenome, email, usuario, senha, nivel) VALUES (:regNome, :regSobrenome, :regEmail, :regUsuario, :registrarSenha, $regNivel)";
									try{
										$resultado = $conexao->prepare($insert);
										$resultado->bindParam(':regNome', $regNome, PDO::PARAM_STR);
										$resultado->bindParam(':regSobrenome', $regSobrenome, PDO::PARAM_STR);
										$resultado->bindParam(':regEmail', $regEmail, PDO::PARAM_STR);
										$resultado->bindParam(':regUsuario', $regUsuario, PDO::PARAM_STR);
										$resultado->bindParam(':registrarSenha', $registrarSenha, PDO::PARAM_STR);
										$resultado->execute();
										$contar3 = $resultado->rowCount();
										if($contar3 > 0){
											echo "Usuário cadastrado com sucesso";
										}else{
											echo "Não foi possível cadastrar o usuário";
										}
									}catch(PDOException $erro){
										echo $erro;
										}
									}
							}
							
						}else{
							echo "As senhas não correspondem";
						}	
					}
				?>
			</div>
		</div>
	</section>
	<!-- Fim do Conteúdo - inicio do Rodapé  -->
	<footer id="rodape">
		<?PHP include("includes/footer.php");?>
	</footer>
</body>
</html>