<?PHP
	include("includes/head.php");
?>
<title>NIDDA</title>
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
		<div class="topiclist" id="topic01">
			<div id="noticia-destaque" class="topic-box">
				<?PHP
				$select = "SELECT * from posts ORDER BY id DESC LIMIT 1";
				try{
					$result = $conexao->prepare($select);
					$result->execute();
					$contar = $result->rowCount();
					if($contar>0){
						while($mostrar = $result->FETCH(PDO::FETCH_OBJ)){
						//quebra no código pra incluir o html
				?>
				<span id="titulo"><?PHP echo $mostrar->titulo ?></span><br><br><?PHP echo limitarTexto($mostrar->descricao, $limite = 100); ?><br><a href="noticias/noticia.php?id=<?PHP echo $mostrar->id;?>">Ver notícia completa</a>
				<?PHP
						}
					}else{
						?>
						Título<br>Descrição breve da notícia.<br>Ver notícia completa
				<?PHP
					}
				}catch(PDOException $erro){
					echo $erro;
				}
				?>
			</div>
			
			<div class="topic-box">
				Precisa de um site? Nós podemos te ajudar! Peça seu site agora mesmo:<br><a href="faca-seu-pedido.php?q=dev"><img src="images/site.png" alt="Criação de Sites" title="Criação de Sites"></a>
			</div>
			<div class="topic-box">
				Encontrou algum erro no site? Por favor, reporte-nos:<br><a href="reporte-um-erro.php">Reporte um erro</a>
			</div>
		</div>
		<div class="topiclist" id="topic02">
			<div class="topic-box">
				<?PHP
				$selectDestaque = "SELECT * from posts WHERE destaque='Sim' LIMIT 1";
				try{
					$result = $conexao->prepare($selectDestaque);
					$result->execute();
					$contar = $result->rowCount();
					if($contar>0){
						while($mostrar = $result->FETCH(PDO::FETCH_OBJ)){
						//quebra no código pra incluir o html
				?>
				<span id="titulo"><?PHP echo $mostrar->titulo ?></span><br><br><?PHP echo limitarTexto($mostrar->descricao, $limite = 100); ?><br><a href="noticias/noticia.php?id=<?PHP echo $mostrar->id;?>">Ver notícia completa</a>
				<?PHP
						}
					}else{
						?>
						Título<br>Descrição breve da notícia.<br>Ver notícia completa
				<?PHP
					}
				}catch(PDOException $erro){
					echo $erro;
				}
				?>
			</div>
			
			<div class="topic-box">
				Inscreva-se no canal da NIDDA no YouTube:
				<br><a href="https://www.youtube.com/channel/UCv9nxY76GGGaQvwIGm4nYCg?sub_confirmation=1" target="_blank"><img src="images/youtube.png" alt="Canal da NIDDA no YouTube" title="Canal da NIDDA no YouTube"></a>
			</div>
			<div class="topic-box">
				Demo Reel do editor de vídeo oficial da NIDDA:<br><iframe width="560" height="315" src="https://www.youtube.com/embed/QKIEk_ftO78" frameborder="0" allowfullscreen></iframe>
			</div>
		</div>
	</section>
	<!-- Fim do Conteúdo - inicio do Rodapé  -->
	<footer id="rodape">
		<?PHP include("includes/footer.php");?>
	</footer>
	
</body>
</html>