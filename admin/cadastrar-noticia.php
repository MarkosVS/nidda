<?PHP
	include("includes/head.php");
?>
<title>Cadastro de Notícias - Painel de Administração - NIDDA</title>
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
	<?PHP $pagina = "cadatro"; /* variavel de pagina*/?>
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
				Cadastrar Notícia
				<form id="cont-bug" method="post" action="#" enctype="multipart/form-data">
					<div class="form-field" id="form-bug">						
						<label for="titulo">Título</label>
						<input class="input-bug" id="nome" type="text" required name="titulo" placeholder="Título" value="">
					</div>
					
					<div class="form-field" id="form-bug">						
						<label for="fonte">Fonte:</label>
						<input class="input-bug" id="fonte" type="text" required name="fonte" placeholder="Fonte" value="">
					</div>
					
					<div class="form-field" id="form-bug">						
						<label for="titulo">Imagem</label>
						<input type="file" class="input-bug" required id="imagem" value="" name="img[]">
					</div>
					
					<div  class="form-field" id="form-bug">	
						<label for="msg">Notícia</label>
						<textarea class="input-bug" id="msg" placeholder="Texto da Notícia" required name="msg"></textarea>															
					</div>
					
					<div class="form-field input-botoes">
						<input class="input-bug" type="submit" value="Cadastrar" name="cadastrar" >
					</div>
					<?PHP
						$autor = $nomeCompletoLogado;
						$exibir = 'Sim';
						//código para cadastrar o post no banco de dados
						if(isset($_POST['cadastrar'])){
							$titulo = trim(strip_tags($_POST['titulo']));
							$fonte = trim(strip_tags($_POST['fonte']));
							$data = date('d/m/Y');;
							$descricao = trim(strip_tags($_POST['msg']));
							
		//upload da imagem
		//infos
		$file 		= $_FILES['img'];
		$numFile	= count(array_filter($file['name']));
		//pasta de destino
		$folder		= '../upload/';
		//requisitos
		$permite 	= array('image/jpeg', 'image/png');
		$maxSize	= 1500 * 350 * 1;
		//mensagens
		$msg		= array();
		$errorMsg	= array(
			1 => 'O arquivo no upload é maior do que o limite definido em upload_max_filesize no php.ini.',
			2 => 'O arquivo ultrapassa o limite de tamanho em MAX_FILE_SIZE que foi especificado no formulário HTML',
			3 => 'o upload do arquivo foi feito parcialmente',
			4 => 'Não foi feito o upload do arquivo'
		);
		
		if($numFile <= 0){ //envie ao menos uma foto
			echo 'Envie pelo menos uma foto!';
		}
		else if($numFile >= 2){ //envie no máximo uma foto
			echo 'Selecione apenas uma foto!';
		}else{
			
			for($i = 0; $i < $numFile; $i++){
				$name 	= $file['name'][$i];
				$type	= $file['type'][$i];
				$size	= $file['size'][$i];
				$error	= $file['error'][$i];
				$tmp	= $file['tmp_name'][$i];
				
				$extensao = @end(explode('.', $name));
				$novoNome = rand().".$extensao";
				
				if($error != 0)
					$msg[] = "<b>$name :</b> ".$errorMsg[$error];
				else if(!in_array($type, $permite))
					$msg[] = "<b>$name :</b> Erro imagem não suportada!";
					
				else if($size > $maxSize)
					$msg[] = "<b>$name :</b> Erro imagem ultrapassa o limite de 5MB";
					
				else{
					
					if(move_uploaded_file($tmp, $folder.'/'.$novoNome)){
						//$msg[] = "<b>$name :</b> Upload Realizado com Sucesso!";
						
//inserir dados do database
$insert = "INSERT into posts (titulo, fonte, autor, data, imagem, exibir, descricao) VALUES (:titulo, :fonte, :autor, :data, :imagem, :exibir, :descricao)";	
							try{
								$result = $conexao->prepare($insert);
								$result->bindParam(':titulo', $titulo, PDO::PARAM_STR);
								$result->bindParam(':fonte', $fonte, PDO::PARAM_STR);
								$result->bindParam(':autor', $autor, PDO::PARAM_STR);
								$result->bindParam(':data', $data, PDO::PARAM_STR);
								$result->bindParam(':imagem', $novoNome, PDO::PARAM_STR);
								$result->bindParam(':exibir', $exibir, PDO::PARAM_STR);
								$result->bindParam(':descricao', $descricao, PDO::PARAM_STR);
								$result->execute();
								$contar = $result->rowCount();
								if($contar > 0){
									//mensagem de sucesso
									echo '<strong>Sucesso!</strong> O post foi cadastrado';
								}else{
									//mensagem de erro
									echo '<strong>Erro!</strong> Não foi possível cadastrar o post';	
								}
							}catch(PDOException $erro){
								echo $erro;
							}		
					}else
						$msg[] = "<b>$name :</b> Desculpe! Ocorreu um erro...";
				}
				foreach($msg as $pop)
				echo '';
					//echo $pop.'<br>';
			}
		}					
	}				?>
			</div>
		</div>
	</section>
	<!-- Fim do Conteúdo - inicio do Rodapé  -->
	<footer id ="footer2">
		<?PHP include("includes/footer.php");?>
	</footer>	
</body>
</html>