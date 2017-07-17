<?PHP
if(isset($_REQUEST['sair'])){
	session_destroy();
	session_unset($_SESSION['usuarionidda']);
	session_unset($_SESSION['senhanidda']);
	header("Location: index.php");	
}
?>