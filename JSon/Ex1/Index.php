<?php  
	include '../connexioBdd/connexio.php';

	//$ipmal = $_SERVER['REMOTE_ADDR'];
	 //$in6_addr = inet_pton('::1');	
	//echo $in6_addr;
	//var_dump($_SERVER)
	$ip = $_SERVER['REMOTE_ADDR'];	
	$navegador = $_SERVER['HTTP_USER_AGENT'];

	if(!mysqli_select_db($connexio,$bdd))
				exit("Error al connectar amb la base de dades". mysqli_connect_error());

	$sql = "INSERT INTO exIp (ip, navegador) VALUES ('$ip', '$navegador')";

	mysqli_query($connexio, $sql);

	
?>