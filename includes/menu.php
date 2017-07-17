<li><a <?PHP if($pagina == "home"){echo 'class="ativo"';}?>href="index.php">Home</a></li>
<li><a <?PHP if($pagina == "design"){echo 'class="ativo"';}?>href="design.php">Design</a></li>
<li><a <?PHP if($pagina == "videos"){echo 'class="ativo"';}?>href="video.php">Vídeo</a></li>
<li><a <?PHP if($pagina == "3d"){echo 'class="ativo"';}?>href="3d.php">3D</a></li>
<li><a <?PHP if($pagina == "desenvolvimento"){echo 'class="ativo"';}?>href="desenvolvimento.php">Desenvolvimento</a></li>
<li><a <?PHP if($pagina == "noticias"){echo 'class="ativo"';}?>href="noticias.php">Notícias</a></li>
<li><a <?PHP if($pagina == "sobre"){echo 'class="ativo"';}?>href="sobre.php">Sobre</a></li>

<?PHP if(!isset($_SESSION['usuarionidda']) && (!isset($_SESSION['senhanidda']))){ // só aparece esse menu se não houver uma session
?>
<li><a <?PHP if($pagina == "login"){echo 'class="ativo"';}?>href="login.php">Entrar/Registrar</a></li>
<?PHP } 
if(isset($_SESSION['usuarionidda']) && (isset($_SESSION['senhanidda']))){ // só aparece esses menus se houver uma session
	if($nivelLogado == 1 || $nivelLogado == 2){ // só aparece esse menu o usuário tiver permissão
	?>
	
		<li><a target="_blank" <?PHP if($pagina == ""){echo 'class="ativo"';}?>href="admin/index.php">Painel de Controle</a></li>
	
	<?PHP
	
	}
?>

<li><a <?PHP if($pagina == ""){echo 'class="ativo"';}?>href="?sair"><?PHP echo $nomeLogado;?> (Sair)</a></li>
<?PHP } ?>