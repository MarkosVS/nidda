<?PHP
	include("includes/head.php");
?>
<title>NIDDA Design</title>
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
	<?PHP $pagina = "design"; /* variavel de pagina*/?>
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
			<div id="cont-pedido" class="cont_pag">
				<span><br><a href="faca-seu-pedido.php?q=design">Faça seu pedido clicando aqui</a></span>
			</div>
			<div class="cont_pag">
				<img class="img-port"src="images/portfolio/cartao-visita.png" title="Cartão de Visita" alt="Cartão de Visita">
				<span><br>Cartão de Visita</span>
			</div>
			<div class="cont_pag">
				<img id="reconst_img" class="img-port"src="images/portfolio/logo.png" title="Criação de Logo" alt="Criação de Logo">
				<span><br>Criação de Logo</span>
			</div>
			<div class="cont_pag">
				<img id="caric_img" class="img-port"src="images/portfolio/caric.png" title="Ilustração" alt="Ilustração">
				<span><br>Ilustração</span>
			</div>
			<div class="cont_pag">
				<img id="recolor_img" class="img-port"src="images/portfolio/recolor.jpg" title="Recolorimento de Imagem" alt="Recolorimento de Imagem">
				<span><br>Recolorimento de Imagem</span>
			</div>
			<div class="cont_pag">
				<img id="reconst_img" class="img-port"src="images/portfolio/reconst.jpg" title="Reconstrução de Imagem" alt="Reconstrução de Imagem">
				<span><br>Reconstrução de Imagem</span>
			</div>
			<div class="cont_pag">
				<img id="reconst_img" class="img-port"src="images/portfolio/capa-youtube.png" title="Capa para YouTube" alt="Capa para YouTube">
				<span><br>Capa para YouTube</span>
			</div>
		</div>
	</section>
	<!-- Fim do Conteúdo - inicio do Rodapé  -->
	<footer id="rodape">
		<?PHP include("includes/footer.php");?>
	</footer>
</body>
</html>