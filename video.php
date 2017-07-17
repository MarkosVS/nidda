<?PHP
	include("includes/head.php");
?>
<title>NIDDA - Produções de Vídeos</title>
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
	<?PHP $pagina = "videos"; /* variavel de pagina*/?>
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
				<span><br><a href="faca-seu-pedido.php?q=video">Faça seu pedido clicando aqui</a></span>
			</div>
			<div class="cont_pag">
				<iframe width="560" height="315" src="https://www.youtube.com/embed/2rk4MKIUb_I" frameborder="0" allowfullscreen></iframe>
				<span><br>Edição de Vídeos para YouTube</span>
			</div>
			<div class="cont_pag">
				<iframe width="560" height="315" src="https://www.youtube.com/embed/1R-ozrxr9LU" frameborder="0" allowfullscreen></iframe>
				<span><br>Criação de Vinhetas para Canal no YouTube</span>
			</div>
		</div>
	</section>
	<!-- Fim do Conteúdo - inicio do Rodapé  -->
	<footer id="rodape">
		<?PHP include("includes/footer.php");?>
	</footer>
</body>
</html>