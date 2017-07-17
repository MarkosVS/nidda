<?PHP
	include("includes/head.php");
?>
<title>Sobre a NIDDA</title>
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
	<?PHP $pagina = "sobre"; /* variavel de pagina*/?>
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
			<?PHP // cálculo de idades
				//declaração de datas
				$dataMarcos = '18/12/1996';
				$dataDeka = '26/05/1998';
				$dataLuan = '07/12/1995';
				$dataFelipe = '24/04/1997';
				// Separa em dia, mês e ano
				list($diaMarcos, $mesMarcos, $anoMarcos) = explode('/', $dataMarcos);
				list($diaDeka, $mesDeka, $anoDeka) = explode('/', $dataDeka);
				list($diaLuan, $mesLuan, $anoLuan) = explode('/', $dataLuan);
				list($diaFelipe, $mesFelipe, $anoFelipe) = explode('/', $dataFelipe);
				// Descobre que dia é hoje e retorna a unix timestamp
				$hoje = mktime(0, 0, 0, date('m'), date('d'), date('Y'));
				// Descobre a unix timestamp da data de nascimento do fulano
				$nascimentoMarcos = mktime( 0, 0, 0, $mesMarcos, $diaMarcos, $anoMarcos);
				$nascimentoDeka = mktime( 0, 0, 0, $mesDeka, $diaDeka, $anoDeka);
				$nascimentoLuan = mktime( 0, 0, 0, $mesLuan, $diaLuan, $anoLuan);
				$nascimentoFelipe = mktime( 0, 0, 0, $mesFelipe, $diaFelipe, $anoFelipe);
			   
				// Depois apenas fazemos o cálculo já citado :)
				$idadeMarcos = floor((((($hoje - $nascimentoMarcos) / 60) / 60) / 24) / 365.25);
				$idadeDeka = floor((((($hoje - $nascimentoDeka) / 60) / 60) / 24) / 365.25);
				$idadeLuan = floor((((($hoje - $nascimentoLuan) / 60) / 60) / 24) / 365.25);
				$idadeFelipe = floor((((($hoje - $nascimentoFelipe) / 60) / 60) / 24) / 365.25);
			?>
				<strong>Sobre</strong>
				<br>NIDDA é uma start-up do ramo de Informática fundada em dezembro de 2015. Seus fundadores são Marcos Vinicius, Luan Lima, Felipe Queiroz e Alexsander da Silva. Sua principal área de atuação é a área de Design Gráfico. Com serviços desde papelaria até identidade visual completa. Para mais informações, por favor, entre em contato conosco. Você pode entrar em contato conosco por meio do e-mail: niddadesign@gmail.com
				<br>No rodapé da página, você encontrará links para as nossas redes sociais.
				<br><br><strong>Os Fundadores</strong><br>
				Marcos Vinicius dos Santos Sombra, <?PHP echo $idadeMarcos; ?> anos. Designer e Desenvolvedor.
				<br><a href="https://www.facebook.com/maarkinvinicius" target="_blank">Facebook</a> || <a href="https://twitter.com/ND_markosvs" target="_blank">Twitter</a> || <a href="https://www.behance.net/nd_markosvs" target="_blank">Béhance</a>
				<br><br>Luan Lima Vieira, <?PHP echo $idadeLuan; ?> anos. Designer, Ilustrador, Editor e Produtor de Vídeo.
				<br><a href="https://www.facebook.com/luan.vieira.334455" target="_blank">Facebook</a> || <a href="https://www.behance.net/Luan_ant" target="_blank">Béhance</a>
				<br><br>Felipe da Silva Queiroz, <?PHP echo $idadeFelipe; ?> anos. Desenvolvedor e Investidor.
				<br><a href="https://www.facebook.com/FelipeSQz" target="_blank">Facebook</a>
				<br><br>Alexsander da Silva, <?PHP echo $idadeDeka; ?> anos. Designer, Modelador e Animador 3D.
				<br><a href="https://www.facebook.com/dekiinhaah" target="_blank">Facebook</a>
				<br><br><strong>Estrutura Física</strong><br>A sede física da NIDDA ainda se encontra em construção. Mais informações em breve.
				<br>Futura sede será localizada no bairro Jangurussu em Fortaleza-CE.
			</div>
		</div>
	</section>
	<!-- Fim do Conteúdo - inicio do Rodapé  -->
	<footer id="rodape">
		<?PHP include("includes/footer.php");?>
	</footer>
</body>
</html>