<?PHP
	$ano = date('Y');
	$visitor_ip = $_SERVER['REMOTE_ADDR'];
	$json_file = file_get_contents("http://freegeoip.net/json/".$visitor_ip);
	$json_str = json_decode($json_file);
	
	
	?>
<div id="topo_rodape">
	<div id="xoxomidia">
		<h2>Redes Sociais</h2>
		<a href="https://www.facebook.com/niddadesign/" target="_blank"><img src="images/icons-social/fb.png" width="60px" height="60px"></a>
		<a href="https://twitter.com/nidda_design" target="_blank"><img src="images/icons-social/tt.png" width="60px" height="60px"></a>
		<a href="https://www.instagram.com/niddadesign/" target="_blank"><img src="images/icons-social/insta.png" width="60px" height="60px"></a>
		<a href="https://www.youtube.com/channel/UCv9nxY76GGGaQvwIGm4nYCg" target="_blank"><img src="images/icons-social/yt.png" width="60px" height="60px"></a>
		<a href="https://www.behance.net/niddadesign" target="_blank"><img src="images/icons-social/be.png" width="60px" height="60px"></a>
	</div>
</div>
<div id="copyright">
	© <?PHP echo $ano;?> NIDDA Development - Todos os Direitos Reservados <!-- Você está acessando de: <?PHP echo $json_str->country_name;?>-->
</div>