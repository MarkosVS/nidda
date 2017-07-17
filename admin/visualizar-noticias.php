<?PHP
	include("includes/head.php");
?>
<title>Visualizar Notícias - Painel de Administração - NIDDA</title>
</head>
<body>
	<header>
			<div id="divlogo">
				<div id="centerlogo">
					<img id="logotipo" src="../images/logotipo.png">
					<?PHP 
					include("includes/redirect.php");
					?>
				</div>
			</div>
	</header>
	<!-- Fim cabeçalho - inicio menu -->
	<?PHP $pagina = "visualizar"; /* variavel de pagina*/?>
	<div id="menu">
		<nav id="navmenu">
			<ul id="listmenu">
				<?PHP include("includes/menu.php");?>
			</ul>
		</nav>
	</div>
	<!-- Fim do Menu - inicio do Conteúdo  -->
	<section id="conteudo">
		<div id="cont1">
			<div class="topic-box" id="tpc-busca">
				<!-- motor de busca -->
				<div class="div-pesq">
					<form class="form-search" id="" action="visualizar-noticias.php" method="post" enctype="multipart/form-data">
					
						<input type="search" name="pesquisar" id="buscar-fld" placeholder="Pesquisar" value="">
						
						<input type="submit" name="buscar" id="buscar-btn" value="Pesquisar">
						
					</form>
					<?PHP
						if(empty($_GET['page'])){}//não faz nada se estiver vazio
						else{
							$page = $_GET['page'];//insere o dado passado pela url em uma variavel
							//codigo pra permitir apenas valores numericos para o numero da pagina
							if(!is_numeric($page)){
							echo'
							<script language= "JavaScript">
							location.href="visualizar-noticias.php";
							</script>
							';}
						}
						if(isset($page)){}
						else{
							$page = 1; //atribui valor 1, caso não seja dito nenhuma página
						}
						if(isset($_POST['pesquisar'])) {
							$quantidade = 10000;
						}else{
							$quantidade = 8; //controla quantas páginas serão exibidas
						}
						$inicio = ($page * $quantidade) - $quantidade; //determina qual o primeiro post a ser exibido na página
						if(isset($_POST['pesquisar'])) {
							$busca = $_POST['pesquisar'];
							$sql = "SELECT * from posts WHERE exibir ='Sim' AND titulo LIKE '%$busca%' OR descricao LIKE '%$busca%' ORDER BY id DESC LIMIT $inicio, $quantidade";
						}else{	
							$sql = "SELECT * from posts WHERE exibir ='Sim' ORDER BY id DESC LIMIT $inicio, $quantidade";
						}
						try{
							$resultado = $conexao->prepare($sql);
							$resultado->execute();
							$contar = $resultado->rowCount();
							if($contar > 0){
								while($exibe = $resultado->fetch(PDO::FETCH_OBJ)){
						?>
								<div class="topic-box">
									<strong><?PHP echo $exibe->titulo ?></strong><br><img src="../upload/<?PHP echo $exibe->imagem;?>"><br><?PHP echo limitarTexto($exibe->descricao, $limite = 300); ?><br><br><span id="link_"><a href="../noticias/noticia.php?id=<?PHP echo $exibe->id;?>">Ver notícia completa</a></span>
								</div>
						<?PHP
								}
							}else{
								?>
								<div class="topic-box">
									Nenhum post encontrado.
								</div>
								<?PHP
							}
						}catch(PDOException $erro){
							echo $erro;	
						}
						?>
<style>
/* -  style paginação  - */
.paginas{
	width:100%;
	padding:10px 0;
	text-align:center;
	/*background:#FFF;*/
	height:auto;
	margin:10px auto;
}
.paginas a{
	width:auto;
	padding:4px 10px;
	background-color:#063786;
	color:#FFF;
	margin:0 2.5px;
	text-decoration:none;
	font-family:'Oswald', 'Impact';
	font-size:13px;
}
.paginas a:hover{
	text-decoration:underline;
	background-color:#063786;
	color:#FFF;
}
<?PHP //programação da página ativa
	if(isset($_GET['page'])){
		$num_page = $_GET['page'];
	}else{
		$num_page = 1;	
	}
?>
/* -  style pagina ativa  - */
.paginas a.ativo<?PHP echo $num_page;?>{
	background-color:#063786;
	color:#FFF;
}
</style>
<?PHP
//inicio dos botões de paginação
//validação
if(empty($_GET['page'])){}//não faz nada se estiver vazio
else{
	$page = $_GET['page'];//insere o dado passado pela url em uma variavel
	//codigo pra permitir apenas valores numericos para o numero da pagina
	if(!is_numeric($page)){
		echo'
			<script language= "JavaScript">
			location.href="visualizar-noticias.php";
			</script>
	';}
}
if(isset($page)){}
else{
	$page = 1; //atribui valor 1, caso não seja dito nenhuma página
}
$quantidade = 10; //controla quantas páginas serão exibidas
$inicio = ($page * $quantidade) - $quantidade; //determina qual o primeiro post a ser exibido na página
//seleção dos posts
$sqlPage = "SELECT * from posts";//variável que faz a seleção
try{
	$result = $conexao->prepare($sqlPage);
	$result->execute();
	$totalRegistros = $result->rowCount();
}catch(PDOException $erro){
	echo $erro;
}
//verificação
if($totalRegistros <= $quantidade){} //não faz nada
else{
	$paginas = ceil($totalRegistros/$quantidade);
	$links = 5; //quantidade de links exibidos
	if($page > $paginas){ // redireciona caso a página não exista
		echo'
		<script language= "JavaScript">
		location.href="visualizar-noticias.php";
		</script>
	';}
if(isset($i)){} //não faz nada
	else{$i = '1';}
//quebra no código para inserir tags html
?>
<!-- div dos botões -->
<div class="paginas">
	<a href="visualizar-noticias.php?page=1">Primeira Página</a>
<?PHP
//programação dos botões
	if(isset($_GET['page'])){
		$num_page = $_GET['page'];//insere a página atual em uma variável
}
for($i = $page - $links; $i <= $page - 1; $i++){
if($i <= 0){} //não faz nada
else{ // pausa na programação dos botões
?>
<a href="visualizar-noticias.php?page=<?PHP echo $i;?>" class="ativo<?PHP echo $i;?>"><?PHP echo $i;?></a>
<?PHP //apenas fechamento de chaves
}}?>
<!-- pág atual -->
<a href="visualizar-noticias.php?page=<?PHP echo $page;?>" class="ativo<?PHP echo $i;?>"><?PHP echo $page;?></a>
<?PHP //mais programação de botões kk
for($i = $page + 1; $i <= $page + $links; $i++){
if($i > $paginas){} //não faz nada
else{?>
	<a href="visualizar-noticias.php?page=<?PHP echo $i;?>" class="ativo"><?PHP echo $i;?></a>
	<?PHP }} //fechamento de chaves
	?>
<a href="visualizar-noticias.php?page=<?PHP echo $paginas;?>">Última Página</a>
</div><!-- fim da div dos botões -->
<?PHP
	//o código pausado continua aqui
				
	}//isso fecha o else "{$i = '1';}"
// fim dos botões de paginação
?>
				</div>		
			</div>
		</div>
	</section>
	<!-- Fim do Conteúdo - inicio do Rodapé  -->
	<footer id ="footer2">
		<?PHP include("includes/footer.php");?>
	</footer>	
</body>
</html>