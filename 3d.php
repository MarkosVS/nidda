<?PHP
	include("includes/head.php");
?>
<title>NIDDA 3D - Modelagem e Animação</title>
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
	<?PHP $pagina = "3d"; /* variavel de pagina*/?>
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
				<span><br><a href="faca-seu-pedido.php?q=3d">Faça seu pedido clicando aqui</a></span>
			</div>
			<div class="cont_pag">
				<iframe width="560" height="315" src="https://www.youtube.com/embed/IXTiSFDK8Gg" frameborder="0" allowfullscreen></iframe>
				<span><br>Vinheta em 3D</span>
			</div>
			<div class="cont_pag">
				<img class="img-3d" src="images/portfolio/pendrive.png" alt="Modelagem 3D" title="Modelagem 3D">
				<span><br>Modelagem em 3D</span>
			</div>
		</div>
	</section>
	<!-- Fim do Conteúdo - inicio do Rodapé  -->
	<footer id="rodape">
		<?PHP include("includes/footer.php");?>
	</footer>
</body>
</html>