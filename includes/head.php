<?
 ob_start();
 session_start();
 // código acima inicia a sessão
 include("functions/conectar.php"); // arquivo que faz a conexão com o database
 include("includes/logout.php"); // arquivo que faz logout
 include("functions/limitar-texto.php"); // função que limita o texto
 $usuarioLogado = $_SESSION['usuarionidda'];
 $senhaLogado = $_SESSION['senhanidda'];
 $selectLogin = "SELECT * from login WHERE usuario=:usuarioLogado AND senha=:senhaLogado";
try{
	$resultLogin = $conexao->prepare($selectLogin);
	$resultLogin->bindParam('usuarioLogado',$usuarioLogado, PDO::PARAM_STR);
	$resultLogin->bindParam('senhaLogado',$senhaLogado, PDO::PARAM_STR);
	$resultLogin->execute();
	$contarLogin = $resultLogin->rowCount();
	if($contarLogin == 1){
		$loop = $resultLogin->fetchAll();
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
<link rel="icon" href="icone.ico">
<link href="css/main.css" rel="stylesheet" type="text/css">
<link href="css/banner.css" rel="stylesheet" type="text/css">
<link href="css/news.css" rel="stylesheet" type="text/css">
<link href="css/responsividade.css" rel="stylesheet" type="text/css">
<link href='https://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
<script type="text/jscript" src="js/banner.js"></script>
<script type="text/jscript" src="js/jquery-1.12.1.js"></script>
<script type="text/jscript" src="js/jquery.maskedinput-1.1.4.js"></script>
<script type="text/jscript" src="js/cep.js"></script>