<?PHP
	include("includes/head.php");
?>
<title>Lista de Pedidos - Painel de Administração - NIDDA</title>
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
	<?PHP $pagina = "pedidos"; /* variavel de pagina*/?>
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
				Lista de Pedidos
				<table id="tb-pedidos">
					<thead id="thead-pedidos">
				    	<tr>
							<td class="td-pedidos">Cliente</td>
							<td class="td-pedidos">E-mail</td> 
							<td class="td-pedidos">CEP</td>
							<td class="td-pedidos">Rua</td>
							<td class="td-pedidos">Núm</td>
							<td class="td-pedidos">Bairro</td>
							<td class="td-pedidos">Cidade</td>
							<td class="td-pedidos">Estado</td>
							<td class="td-pedidos">Categoria</td>
							<td class="td-pedidos">Descrição</td>
						  </tr>
					 </thead>
					 <tbody id="tbody-pedidos">
					 <?PHP
					 $selectPedidos = "SELECT * from pedidos ORDER BY id DESC";
					 try{
						 $resultPedidos = $conexao->prepare($selectPedidos);
							$resultPedidos->execute();
							$contarPedidos = $resultPedidos->rowCount();
							if($contarPedidos>0){
								while($show = $resultPedidos->FETCH(PDO::FETCH_OBJ)){
					 ?>
						  <tr>
							<td class="td-pedidos"><?PHP echo $show->nome ?></td>
							<td class="td-pedidos"><?PHP echo $show->email ?></td> 
							<td class="td-pedidos"><?PHP echo $show->cep ?></td>
							<td class="td-pedidos"><?PHP echo $show->rua ?></td>
							<td class="td-pedidos"><?PHP echo $show->numero ?></td>
							<td class="td-pedidos"><?PHP echo $show->bairro ?></td>
							<td class="td-pedidos"><?PHP echo $show->cidade ?></td>
							<td class="td-pedidos"><?PHP echo $show->estado ?></td>
							<td class="td-pedidos"><?PHP echo $show->categoria ?></td>
							<td class="td-pedidos"><?PHP echo $show->descricao ?></td>
						  </tr>
					<?PHP
								}
							}
						}catch(PDOException $erro){
							echo $erro;
						}
					?>
				  	  </tbody>
				</table>
			</div>
		</div>
	</section>
	<!-- Fim do Conteúdo - inicio do Rodapé  -->
	<footer id ="footer2">
		<?PHP include("includes/footer.php");?>
	</footer>	
</body>
</html>