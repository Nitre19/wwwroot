<?php  
	include 'connexioBdd/connexio.php';
	//TODO Get de los datos de la URL
	//TODO Connectar a la BDD
	//TODO Inser a la BDD
	//TODO Guardar datos en JSon

	$nom="";
	//$data = "";
	$latitud = 0;
	$longitud = 0;

	$nom=$_GET['nom'];
	//$data = $_GET['data'];
	$latitud = $_GET['latitud'];
	$longitud = $_GET['longitud'];


	if(!mysqli_select_db($connexio,$bdd))
				exit("Error al connectar amb la base de dades". mysqli_connect_error());

	$sql = "INSERT INTO geo (nom, data, latitud, longitud) VALUES ('$nom', 'now()', $latitud, $longitud)";

	mysqli_query($connexio, $sql);

/*
	$sql = "SELECT * FROM geo";

	$result=mysqli_query($connexio,$sql);

	while ( $arrayresultat=mysqli_fetch_row($result) ) 
	{	         	
     	echo json_encode($arrayresultat);
    }
    */
?>