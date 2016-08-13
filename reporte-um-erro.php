<?PHP
	include("includes/head.php");
?>
<title>Reporte-nos um erro - NIDDA</title>
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
	<?PHP $pagina = "home"; /* variavel de pagina*/?>
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
	<!-- Fim do Banner - inicio do Conteúdo  -->
	<section id="conteudo">
		<div id="cont1">
			<div class="topic-box">
			<strong>Reporte um erro </strong>
				<form id="cont-bug" method="post" action="#" enctype="multipart/form-data">
					<div class="form-field" id="form-bug">						
						<label for="nome">Nome</label>
						<input class="input-bug" id="nome" type="text" name="nome" required placeholder="Nome" value="<?PHP if(isset($_SESSION['usuarionidda']) && (isset($_SESSION['senhanidda']))){ echo $nomeCompletoLogado; } ?>">
					</div>
					
					<div  class="form-field" id="form-bug">	
						<label for="msg">Mensagem</label>
						<textarea class="input-bug" id="msg" placeholder="Digite o erro encontrado" required name="msg"></textarea>															
					</div>
					
					<div class="form-field input-botoes">
						<input class="input-bug" type="submit" value="Enviar" name="enviar" >
					</div>
				</form>
				<?PHP
				if(isset($_POST['enviar'])){
					$nome = trim(strip_tags($_POST['nome']));
					$msg = trim(strip_tags($_POST['msg']));
					$data_envio = date('d/m/Y');
					$hora_envio = date('H:i:s');
					$emailenviar = "niddadesign@gmail.com";
					$destino = $emailenviar;
					$assunto = "Um erro foi reportado no seu site";
					$arquivo = "Um erro foi reportado por ".$nome." no dia ".$data_envio." às ".$hora_envio.".<br><br>".$msg;
					$headers = 'MIME-Version: 1.0' . "\r\n";
						$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
						$headers .= 'from: Admin NIDDA';
					$enviar = mail($destino, $assunto, $arquivo, $headers);
					if($enviar){
						$mgm = "ENVIADO COM SUCESSO";
						echo "Mensagem enviada com sucesso. Voltando ao início";
						header("Refresh: 8, index.php");
					}
					else{
						$mgm = "ERRO AO ENVIAR!";	
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