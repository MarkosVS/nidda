<?
 ob_start();
 session_start();
 // código acima inicia a sessão
 include("../functions/conectar.php"); // arquivo que faz a conexão com o database
 include("../includes/logout.php"); // arquivo que faz logout
 $usuarioLogado = $_SESSION['usuarionidda'];
 $senhaLogado = $_SESSION['senhanidda'];
 $selectLogin = "SELECT * from login WHERE usuario=:usuarioLogado AND senha=:senhaLogado";
try{
	$result = $conexao->prepare($selectLogin);
	$result->bindParam('usuarioLogado',$usuarioLogado, PDO::PARAM_STR);
	$result->bindParam('senhaLogado',$senhaLogado, PDO::PARAM_STR);
	$result->execute();
	$contar = $result->rowCount();
	if($contar == 1){
		$loop = $result->fetchAll();
		foreach($loop as $show){
			$nomeLogado = $show['nome'];
			$sobrenomeLogado = $show['sobrenome'];
			$userLogado = $show['usuario'];
			$emailLogado = $show['email'];
			$senhaLogado = $show['senha'];
			$imgLogado = $show['thumb'];
			$nivelLogado = $show['nivel'];
			$nomeCompletoLogado = $nomeLogado . ' ' . $sobrenomeLogado;
		}
	}
}catch(PDOWEXCEPTION $erro){echo $erro;}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="keywords" content="NIDDA, Gráfica, Design, Notícias, Tecnologia, Desenvolvimento, Programação, Motion Graphics, TI, Cartão de Visita, Banner, Criação de Site, Edição de Vídeo, 3D, Gráfica Fortaleza, Messejana">
<meta name="author" content="NIDDA Development">
<!-- importações -->
<link rel="icon" href="../icone.ico">
<link href="../css/main.css" rel="stylesheet" type="text/css">
<link href="../css/banner.css" rel="stylesheet" type="text/css">
<link href="../css/news.css" rel="stylesheet" type="text/css">
<link href="../css/responsividade.css" rel="stylesheet" type="text/css">
<link href='https://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
<script type="text/jscript" src="banner.js"></script>
<script type="text/jscript" src="../js/jquery-1.12.1.js"></script>
<script type="text/jscript" src="../js/jquery.maskedinput-1.1.4.js"></script>
<?PHP
//exibir o título do post no cabeçalho
	if(isset($_GET['id'])){
		$idTitle = $_GET['id'];
	}
	$sqlTitle = "SELECT * from posts WHERE exibir ='Sim' AND id=:id LIMIT 1";
	try{
		$result = $conexao->prepare($sqlTitle);
		$result->bindParam('id', $idTitle, PDO::PARAM_INT);
		$result->execute();
		$contagem = $result->rowCount();
		if($contagem > 0){
		$mostrar = $result->fetch(PDO::FETCH_OBJ)
		
	
?>
<title><?PHP echo $mostrar->titulo;?> - NIDDA</title>
<?PHP
		}}catch(PDOException $erro){
	echo $erro;	
}

?>
</head>

<body>
	<div id="fb-root"></div>
		<script>(function(d, s, id) {
			  var js, fjs = d.getElementsByTagName(s)[0];
			  if (d.getElementById(id)) return;
			  js = d.createElement(s); js.id = id;
			  js.src = "//connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v2.5";
			  fjs.parentNode.insertBefore(js, fjs);
			}(document, 'script', 'facebook-jssdk'));
		</script>
	<header>
			<div id="divlogo">
				<div id="centerlogo">
					<img id="logotipo" src="../images/logotipo.png">
				</div>
			</div>
	</header>
	<!-- Fim cabeçalho - inicio menu -->
	<div id="menu">
		<nav id="navmenu">
			<ul id="listmenu">
				<li><a href="../index.php">Home</a></li>
				<li><a href="../design.php">Design</a></li>
				<li><a href="../video.php">Vídeo</a></li>
				<li><a href="../3d.php">3D</a></li>
				<li><a href="../desenvolvimento.php">Desenvolvimento</a></li>
				<li><a href="../noticias.php" class="ativo">Notícias</a></li>
				<li><a href="../sobre.php">Sobre</a></li>
				<?PHP if(!isset($_SESSION['usuarionidda']) && (!isset($_SESSION['senhanidda']))){ // só aparece esse menu se não houver uma session
				?>
				<li><a href="../login.php">Entrar/Registrar</a></li>
				<?PHP } 
				if(isset($_SESSION['usuarionidda']) && (isset($_SESSION['senhanidda']))){ // só aparece esses menus se houver uma session
					if($nivelLogado == 1 || $nivelLogado == 2){ // só aparece esse menu o usuário tiver permissão
					?>
						<li><a target="_blank" href="../admin/index.php">Painel de Controle</a></li>
					<?PHP
					
					}
				?>
				<li><a href="?sair"><?PHP echo $nomeLogado;?> (Sair)</a></li>
				<?PHP } ?>
			</ul>
		</nav>
	</div>
	<!-- Fim do Menu - inicio do Banner  -->
	<section id="slides">	
		<div id="banner">
			<div id="banner_img">
				<img src="../banner_img/1.jpg" border="0" alt="Banner">			
			</div>
			<div id="botoes">
			<a href="javascript:void(0);" id="banner_img_1" class="hover" onclick="mudaImg('0');">1</a>
			<a href="javascript:void(0);" id="banner_img_2" onclick="mudaImg('1');">2</a>
			<a href="javascript:void(0);" id="banner_img_3" onclick="mudaImg('2');">3</a>
			<a href="javascript:void(0);" id="banner_img_4" onclick="mudaImg('3');">4</a>			
			</div>
	</div>
	</section>
	<!-- Fim do Banner - inicio do Conteúdo  -->
	<section id="conteudo">
		<div id="cont1">
			<div class="topic-box" id="tpc-busca">
				<!-- motor de busca -->
				<div class="div-pesq">
					
					<?PHP
						//selecionar os posts no banco de dados
						if(isset($_GET['id'])){
							$idUrl = $_GET['id'];
						}
						$sql = "SELECT * from posts WHERE exibir ='Sim' AND id=:id LIMIT 1";
						try{
							$resultado = $conexao->prepare($sql);
							$resultado->bindParam('id', $idUrl, PDO::PARAM_INT);
							$resultado->execute();
							$contar = $resultado->rowCount();
							if($contar > 0){
								//exibição dos posts
								while($exibe = $resultado->fetch(PDO::FETCH_OBJ)){
								//pausa no código pra incluir tags html
						?>
								<div class="topic-box">
									<strong><?PHP echo $exibe->titulo ?></strong>
									<br><span id="autor_data">Publicado por <?PHP echo $exibe->autor;?> em <?PHP echo $exibe->data;?>.</span>
									<br><img src="../upload/<?PHP echo $exibe->imagem;?>">
									<br><?PHP echo $exibe->descricao; ?>
									<br><br>Fonte: <?PHP echo $exibe->fonte; ?>
								</div>
						<?PHP
							}}else{
							?>
								<div class="topic-box">
									<strong>Notícia não encontrada.</strong>
								</div>
								<?PHP
								header("Location: ../noticias.php");
								exit;
						}
						}catch(PDOException $erro){
							echo $erro;	
						}
						?>
						<div class="topic-box">	
							<div class="fb-comments" data-href="http://nidda.16mb.com/noticias/noticia.php?id=<?PHP echo $idUrl;?>" data-width="100%" data-numposts="5"></div>
						</div>

				</div>		
			</div>
		</div>
	</section>
	<!-- Fim do Conteúdo - inicio do Rodapé  -->
	<footer id="rodape">
		<?PHP
	$ano = date('Y');
?>
<div id="topo_rodape">
	<div id="xoxomidia">
		<h2>Redes Sociais</h2>
		<a href="https://www.facebook.com/niddadesign/" target="_blank"><img src="../images/icons-social/fb.png" width="60px" height="60px"></a>
		<a href="https://twitter.com/nidda_design" target="_blank"><img src="../images/icons-social/tt.png" width="60px" height="60px"></a>
		<a href="https://www.instagram.com/niddadesign/" target="_blank"><img src="../images/icons-social/insta.png" width="60px" height="60px"></a>
		<a href="https://www.youtube.com/channel/UCv9nxY76GGGaQvwIGm4nYCg" target="_blank"><img src="../images/icons-social/yt.png" width="60px" height="60px"></a>
		<a href="https://www.behance.net/niddadesign" target="_blank"><img src="../images/icons-social/be.png" width="60px" height="60px"></a>
	</div>
</div>
<div id="copyright">
	© <?PHP echo $ano;?> NIDDA Development - Todos os Direitos Reservados
</div>
	</footer>
</body>
</html>