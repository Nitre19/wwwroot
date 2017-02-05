	<?php
		include 'connexioBdd/connexio.php';
		echo"<style>";
			include'estils/estils.css';
		echo"</style>";
		$user= "";
		$password= "";
		$edat= "";
		$email= "";
		//-------------------------------------------------------------------
		session_start();
		if (empty($_SESSION['login']) || empty($_SESSION['password']) || empty($_SESSION['age']) || empty($_SESSION['email']))
		{
			header('Location: index.php');
		}else{
			$user= $_SESSION['login'];
			$password= $_SESSION['password'];
			$edat= $_SESSION['age'];
			$email= $_SESSION['email'];
		}
		//-------------------------------------------------------------------
		if(!mysqli_select_db($connexio,$bdd))
			exit("Error al connectar amb la base de dades". mysqli_connect_error());
		//-------------------------------------------------------------------
		if (isset($_POST['addCart'])) {
			if (!empty($_POST['inputId']))
			{
				$id = $_POST['inputId'];
				$sql="INSERT INTO cart_geckos VALUES ('$user','$password','$id',1)";
				if (mysqli_query($connexio, $sql)) {	
					echo "New record created successfully1";				   
				} else {
					$sql= "UPDATE cart_geckos SET qtt=qtt+1 WHERE nom='$user' and pass='$password' and id='$id'";
					if (mysqli_query($connexio, $sql)) {
						echo "New record created successfully";				    			   
					} else {
					  	echo "Error: " . $sql . "<br>" . mysqli_error($conn);
					}
				}	
				header('Location: cleanWeb.php');	
			}
		}
	?>
<html>
<head>
	<title>Geckos Adventures</title>
</head>
<body>
	<?php
		echo "<table><tr><td><img src='img/logo.png'></br></td><td>User: $user<br>Edat: $edat<br>E-mail: $email<br><form action='cart.php'><input type='submit' value='Carrito' /></form>";
		if ($user=='admin' && $password=='admin') {
			echo "<form action='formAddViaje.php'><input type='submit' value='Añadir Viaje' /></form>";
			echo "</td></tr></table>";
		}
		else{
			echo "</td></tr></table>";
		}
	?>
	<?php
		$i=0;
		$sql = "SELECT * FROM viajes_geckos";
		$result=mysqli_query($connexio,$sql); // guardamos el resultado de la consulta en la variable $result

		if(!$result) //retorna fals si hi ha un error en la consulta, sino retorna l'objecte amb dades
	 		echo "Error en la consulta, revisa la sql";
		else {
			// PARTE GECKOS
			// Hacer un echo que imprima la cabecera de la tabla
			echo "<table border=1 cellspacing=0 cellpading=6>
					<tr> <th>Destino</th> <th>Imagen</th> <th>Precio</th> <th> Descuento</th><th>Precio Final</th><th> </th> </tr>  ";
			while ( $arrayresultat=mysqli_fetch_row($result) ) // recorremos todas las filas del resultado del select
			{	         	
				// Por cada linia de la consulta sql meter cada dato en una celda de la tabla, recuperar img de la url y poner botn "añadir al carro" al clicar hacer un insert de ese viaje en la tabla cart_geckos de ese usuario
				// RECORDAR la tala viajes_geckos tiene un id al principio, empezar a imprimir desde $arrrayresultat[1]
				/*
				$arrayresultat[0]=id
				$arrayresultat[1]=destino
				$arrayresultat[2]=urlImg
				$arrayresultat[3]=preu
				*/
				$preu = $arrayresultat[3];
				$desc = $arrayresultat[4];
				$preuFinal = $preu -$preu*$desc/100;
				echo "<tr class='viaje'> <td>$arrayresultat[1]</td> <td><img class='imgDestino' src='$arrayresultat[2]'></td> <td>$arrayresultat[3] €</td> <td>$arrayresultat[4] %</td> <td>$preuFinal €</td> <td><form method='post'><input type='hidden' name='inputId' value='$arrayresultat[0]'/><input type='submit' name='addCart' value='Añadir al carro' /></form></td>
				</tr>";
				$i++;
		    }
		    echo "</table>";	    
		}
		mysqli_free_result($result);
		mysqli_close($connexio);
		
	?>
</body>
</html>