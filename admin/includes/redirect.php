<?PHP 
if($nivelLogado == 1 || $nivelLogado == 2){}
else{
	header("Location: ../index.php");
	exit;
}
?>