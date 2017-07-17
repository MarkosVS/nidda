<?PHP
	//conexão com o banco de dados é feito por essa página	
	try{
		$conexao = new PDO('mysql:host=mysql.hostinger.com.br;dbname=u497616428_posts', 'u497616428_ndmvs', 'gtort15ND');
		$conexao -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}catch(PDOException $erro){
		echo 'ERROR: ' . $erro->getMessage();
	}
?>