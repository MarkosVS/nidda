<?PHP
	include("includes/head.php");
?>
<title>Faça seu Pedido - NIDDA</title>
</head>
<script type="text/javascript">
$(document).ready(function(){
	$("#cep").mask("99.999-999");
});
</script>
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
		<div id="cont1">
			<div class="topic-box">
				<strong>Faça seu Pedido</strong>
				<br>
				<?PHP
				if(isset($_POST['enviar'])){
					$nomePedido = trim(strip_tags($_POST['nome']));
					$emailPedido = trim(strip_tags($_POST['email']));
					$cepPedido = trim(strip_tags($_POST['cep']));
					$ruaPedido = trim(strip_tags($_POST['rua']));
					$numPedido = trim(strip_tags($_POST['num']));
					$bairroPedido = trim(strip_tags($_POST['bairro']));
					$cidadePedido = trim(strip_tags($_POST['cidade']));
					$estadoPedido = trim(strip_tags($_POST['estado']));
					$categoriaPedido = trim(strip_tags($_POST['categoria']));
					$descPedido = trim(strip_tags($_POST['descricao']));
					$insertPedido = "INSERT into pedidos (nome, email, cep, rua, numero, bairro, cidade, estado, categoria, descricao) VALUES (:nomePedido, :emailPedido, :cepPedido, :ruaPedido, :numPedido, :bairroPedido, :cidadePedido, :estadoPedido, :categoriaPedido, :descPedido)";
					try{
						$resultPedido = $conexao->prepare($insertPedido);
						$resultPedido->bindParam(':nomePedido', $nomePedido, PDO::PARAM_STR);
						$resultPedido->bindParam(':emailPedido', $emailPedido, PDO::PARAM_STR);
						$resultPedido->bindParam(':cepPedido', $cepPedido, PDO::PARAM_STR);
						$resultPedido->bindParam(':ruaPedido', $ruaPedido, PDO::PARAM_STR);
						$resultPedido->bindParam(':numPedido', $numPedido, PDO::PARAM_STR);
						$resultPedido->bindParam(':bairroPedido', $bairroPedido, PDO::PARAM_STR);
						$resultPedido->bindParam(':cidadePedido', $cidadePedido, PDO::PARAM_STR);
						$resultPedido->bindParam(':estadoPedido', $estadoPedido, PDO::PARAM_STR);
						$resultPedido->bindParam(':categoriaPedido', $categoriaPedido, PDO::PARAM_STR);
						$resultPedido->bindParam(':descPedido', $descPedido, PDO::PARAM_STR);
						$resultPedido->execute();
						$contarPedido = $resultPedido->rowCount();
						if($contarPedido > 0){
							echo "Seu pedido foi efetuado com sucesso. Um e-mail será enviado para ".$emailPedido." em breve com o orçamento do serviço.<br>Por favor, verifique sua caixa de entrada.";
						}else{
							echo "Não foi possível concluir seu pedido. Por favor, tente novamente.";
						}
					}catch(PDOException $erro){
						echo $erro;
					}		
				}
				?>
				<form id="form-pedido" method="post" action="#" enctype="multipart/form-data">
					<div class="form-field">
						<label for="nome">Nome:</label>
						<input class="input-bug" id="nome" type="text" name="nome" required placeholder="Nome" value="<?PHP if(isset($_SESSION['usuarionidda']) && (isset($_SESSION['senhanidda']))){ echo $nomeCompletoLogado; } ?>">
					</div>
					
					<div class="form-field">
						<label for="email">E-mail:</label>
						<input class="input-bug" id="email" type="text" name="email" placeholder="E-mail" required value="<?PHP if(isset($_SESSION['usuarionidda']) && (isset($_SESSION['senhanidda']))){ echo $emailLogado; } ?>">
					</div>
					
					<div class="form-field">
						<label for="cep">CEP (Somente Números):</label>
						<input class="input-bug" id="cep" type="text" name="cep" placeholder="" required value="">
					</div>
					
					<div class="form-field">
						<label for="endereco">Rua:</label>
						<input class="input-bug" id="rua" type="text" name="rua" required placeholder="Rua" value="">
					</div>
					
					<div class="form-field">
						<label for="num">Número:</label>
						<input class="input-bug" id="num" type="text" name="num" required placeholder="Número" value="">
					</div>
					
					<div class="form-field">
						<label for="bairro">Bairro:</label>
						<input class="input-bug" id="bairro" type="text" name="bairro" required placeholder="Bairro" value="">
					</div>
					
					<div class="form-field">
						<label for="cidade">Cidade:</label>
						<input class="input-bug" id="cidade" type="text" name="cidade" required placeholder="Cidade" value="">
					</div>
					
					<div class="form-field">
						<label for="estado">Estado:</label>
						<input class="input-bug" id="estado" type="text" name="estado" required placeholder="Estado" value="">
					</div>
					
					<div class="form-field">
						<label for="nome">Categoria:</label>
						<select  class="input-bug" id="categoria" name="categoria">
							<?PHP
							if(isset($_GET['q'])){
								$q = $_GET['q'];
								if($q == "design"){
								?>
									<option value="1">Design Gráfico</option>
									<option value="2">Edição/Produção de Vídeo</option>
									<option value="3">3D</option>
									<option value="4">Desenvolvimento de Sites/Aplicativos</option>
								<?PHP
								}
								if($q == "video"){
								?>
									<option value="2">Edição/Produção de Vídeo</option>
									<option value="1">Design Gráfico</option>
									<option value="3">3D</option>
									<option value="4">Desenvolvimento de Sites/Aplicativos</option>
								<?PHP
								}
								if($q == "3d"){
								?>
									<option value="3">3D</option>
									<option value="1">Design Gráfico</option>
									<option value="2">Edição/Produção de Vídeo</option>
									<option value="4">Desenvolvimento de Sites/Aplicativos</option>
								<?PHP
								}
								if($q == "dev"){
								?>
									<option value="4">Desenvolvimento de Sites/Aplicativos</option>
									<option value="3">3D</option>
									<option value="1">Design Gráfico</option>
									<option value="2">Edição/Produção de Vídeo</option>
								<?PHP
								}
								if(!($q == "design" || $q == "video" || $q == "3d" || $q == "dev")){
								?>
									<option value="1">Design Gráfico</option>
									<option value="2">Edição/Produção de Vídeo</option>
									<option value="3">3D</option>
									<option value="4">Desenvolvimento de Sites/Aplicativos</option>
								<?PHP
								}
							
							}else{
							?>
								<option value="1">Design Gráfico</option>
								<option value="2">Edição/Produção de Vídeo</option>
								<option value="3">3D</option>
								<option value="4">Desenvolvimento de Sites/Aplicativos</option>
							<?PHP
							}
							?>
						</select>
					</div>
					<div id="form-bug" class="form-field">
						<label for="descricao">Descrição do Serviço:</label>
						<textarea required placeholder="Descreva o serviço desejado" class="input-bug" id="msg" name="descricao"></textarea>
					</div>
					
					<div class="form-field input-botoes">
						<input class="input-bug" type="submit" value="Enviar" name="enviar" >
					</div>
				</form>
				<!-- //aqui\\ -->
			</div>
		</div>
	</section>
	<!-- Fim do Conteúdo - inicio do Rodapé  -->
	<footer id="rodape">
		<?PHP include("includes/footer.php");?>
	</footer>
</body>
</html>