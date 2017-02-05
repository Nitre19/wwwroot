<?php
	/*Exemple de connexió a base de dades.
*/
	$connexio = mysqli_connect("127.0.0.1", "root", "root");
	$bdd="geckos"; //nom de la base de dades on es connecta

	if (!$connexio)
	{
		exit('No es pot connectar:'. mysqli_connect_error());
	}
	/*
	* La funció exit() mostra un missatge i surt de l’execució del codi.
	  La funció mysql_error() retorna un text amb un missatge d’error de la darrera operació MySQL que s’ha executat.
	*/
	// echo "<p>Connexió correcta!</p>";	

	if(!mysqli_select_db($connexio,$bdd))
		exit("Error al connectar amb la base de dades". mysqli_connect_error());

	$username = "xavi"; // modificar nombres de las variables al ponerlo en el login.php de la web
	$pass = "admin";
	$edat = 20;
	$email = "xvidalllicasmx@gmail.com";

	$sql="Select nom, pass from users_geckos"; // hacemos un selecct a la bdd para obtener la lista de usuarios y sus passwords

	$result=mysqli_query($connexio,$sql); // guardamos el resultado de la consulta en la variable $result

	if(!$result) //retorna fals si hi ha un error en la consulta, sino retorna l'objecte amb dades
 		echo "Error en la consulta, revisa la sql";
	else {
		// PARTE GECKOS
		$userExist = false;
		while ( $arrayresultat=mysqli_fetch_row($result) ) // recorremos todas las filas del resultado del select
		{	         	
	         	if ($arrayresultat[0] == $username && $arrayresultat[1] == $pass)  // miramos si el usuario y password introducidos en el form existen en la bdd
	         	{
	         		$userExist = true;
	         	}
	    }
	    if ($userExist!=true) // si el usuario no existe la variable $userExist estara en false y entraremos en el if
	    { 
	    	//HAcer inset del usuario
	    	$sql = "INSERT INTO users_geckos (nom, pass, edat, email) VALUES ('$username', '$pass', $edat, '$email')"; 
	    	// creamos un sql para insertar un usuario el la bdd 

			if (mysqli_query($connexio, $sql)) { // si la sql se completa correctamente el nuevo usuario ya existira en la bdd
			    //echo "New record created successfully";
			} else {
			    //echo "Error: " . $sql . "<br>" . mysqli_connect_error();
			}
	    	//echo "El usuari $username NO existeix";
		}
		else{
			header('Location: index.php');
		}
	}
	mysqli_free_result($result);
	mysqli_close($connexio);

// Parte para leer la tabla viajes_geckos de la bdd                                                       	    <<<<<<<<<----------------- webSite.php

	if(!mysqli_select_db($connexio,$bdd))
		exit("Error al connectar amb la base de dades". mysqli_connect_error());

	$sql = "SELECT * FROM viajes_geckos";


	$result=mysqli_query($connexio,$sql); // guardamos el resultado de la consulta en la variable $result

	if(!$result) //retorna fals si hi ha un error en la consulta, sino retorna l'objecte amb dades
 		echo "Error en la consulta, revisa la sql";
	else {
		// PARTE GECKOS
		// Hacer un echo que imprima la cabecera de la tabla
		echo "<table border=1 cellspacing=0 cellpading=6>
				<tr> <td>Destino</td> <td>Imagen</td> <td>Precio</td> <td> </td> </tr>  ";
		while ( $arrayresultat=mysqli_fetch_row($result) ) // recorremos todas las filas del resultado del select
		{	         	
			// Por cada linia de la consulta sql meter cada dato en una celda de la tabla, recuperar img de la url y poner botn "añadir alcarr" al clicar hacer un insert de ese viaje en la tabla cart_geckos de ese usuario
			// RECORDAR la tala viajes_geckos tiene un id al principio empezar a imprimir desde $arrrayresultat[1]
			/*
			$arrayresultat[0]=id
			$arrayresultat[1]=destino
			$arrayresultat[2]=urlImg
			$arrayresultat[3]=preu
			*/			
			echo "<tr> <td>$arrayresultat[1]</td> <td><img src='$arrayresultat[2]'></td> <td>$arrayresultat[3]</td> <td>Boton Añadir</td> </tr>";
	    }
	    echo "</table>";
	}
	mysqli_free_result($result);
	mysqli_close($connexio);
/*
	    // Quantes files retorna la consulta
	    echo "<p>Select returned ". mysqli_num_rows($result). " rows</p>";

	    //Escribim el resultat de la consulta o amb mysqli_fetch_array o amb mysqli_fetch_row
	    echo "<h2> resultat de la consulta:</h2>";
	       

	        //Només es pot recórrer el result set un cop.
	        while ( $arrayresultat=mysqli_fetch_array($result) ) {
	         	echo "<br>";
	         	
	         	var_dump($arrayresultat);
	         }
	         

	         while ( $arrayresultat=mysqli_fetch_row($result) ) {
	         	echo "<br>";
	         	
	         	//var_dump($arrayresultat);
	         	echo $arrayresultat[0] . " " . $arrayresultat[1];

	         }
*/
	}
	/* free result set */
	mysqli_free_result($result);
?>