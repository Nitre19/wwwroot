<?php
	include 'connexioBdd/connexio.php';
	//TDOO hacer un inser en tabla geo
	//TODO hacer que retorne los datos del select para leerlo desde el android

	if(!mysqli_select_db($connexio,$bdd))
				exit("Error al connectar amb la base de dades". mysqli_connect_error());

	$sql = "SELECT * FROM geo";

	$result=mysqli_query($connexio,$sql);

	while ( $arrayresultat=mysqli_fetch_row($result) ) 
	{	         	
     	echo json_encode($arrayresultat);
    }


?>