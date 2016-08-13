<?PHP
	include("includes/head.php");
?>
<title>NIDDA Development - Criação de Sites e Sistemas</title>
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
	<?PHP $pagina = "desenvolvimento"; /* variavel de pagina*/?>
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
				<span><br><a href="faca-seu-pedido.php?q=dev">Faça seu pedido clicando aqui</a></span>
			</div>
			<div class="cont_pag">
				<img class="img-3d img-dev" src="images/portfolio/site.jpg" alt="Criação de Sites" title="Criação de Sites">
				<span><br>Criação de Sites</span>
			</div>
			<div class="cont_pag">
				<iframe width="560" height="315" src="https://www.youtube.com/embed/GjovBnX1mlE" frameborder="0" allowfullscreen></iframe>
				<span><br>Desenvolvimento de Aplicativos</span>
			</div>
		</div>
	</section>
	<!-- Fim do Conteúdo - inicio do Rodapé  -->
	<footer id="rodape">
		<?PHP include("includes/footer.php");?>
	</footer>
</body>
</html>