<?PHP
	include("includes/head.php");
?>
<title>Painel de Administração - NIDDA</title>
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
	<?PHP $pagina = "home"; /* variavel de pagina*/?>
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
			<div class="topic-box">
				Últimas Notícias
				<?PHP
				//selecionar posts do database
				$select = "SELECT * from posts ORDER BY id DESC LIMIT 5";
				$contagem = 1;
				
				try{
					
					$result = $conexao->prepare($select);
					$result->execute();
					$contar = $result->rowCount();
					if($contar>0){
						while($mostrar = $result->FETCH(PDO::FETCH_OBJ)){
							//quebra no código pra incluir a tabela	html
					?>
				<div class="topic-box">
					<strong><?PHP echo $mostrar->titulo ?></strong><br><img src="../upload/<?PHP echo $mostrar->imagem;?>"><br><?PHP echo limitarTexto($mostrar->descricao, $limite = 350); ?><br><br><span id="link_"><a href="#">Editar Notícia</a></span>
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
			</div>
		</div>
	</section>
	<!-- Fim do Conteúdo - inicio do Rodapé  -->
	<footer id ="footer2">
		<?PHP include("includes/footer.php");?>
	</footer>	
</body>
</html>