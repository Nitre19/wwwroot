<?php
	include 'connexioBdd/connexio.php';

	if(!mysqli_select_db($connexio,$bdd))
		exit("Error al connectar amb la base de dades". mysqli_connect_error());
	//-------------------------------------------------------------------
	session_start();
	if (empty($_SESSION['login']) || empty($_SESSION['password']) || empty($_SESSION['age']) || empty($_SESSION['email']))
	{
		header('Location: index.php');
	}
	$user= $_SESSION['login'];
	$password= $_SESSION['password'];
	$edat= $_SESSION['age'];
	$email= $_SESSION['email'];
	$arrayID = array();
	$arrayQtt = array();
	$preuFinal=0;
	//-------------------------------------------------------------------
	echo "<table><tr><td><img src='img/logo.png'></td><td>User: $user<br>Edat: $edat<br>E-mail: $email<br><form action='webSite.php'><input type='submit' value='Volver a la web' /></form></td></tr></table>";
	//-------------------------------------------------------------------
	$sql = "SELECT * FROM cart_geckos WHERE nom='$user' and pass='$password'";
	$result=mysqli_query($connexio,$sql); // guardamos el resultado de la consulta en la variable $result	
	if(!$result) //retorna fals si hi ha un error en la consulta, sino retorna l'objecte amb dades
 		echo "Error: " . $sql . "<br>" . mysqli_error($connexio);
	else {
		$i=0;
		while ( $arrayresultat=mysqli_fetch_row($result) ) // recorremos todas las filas del resultado del select
		{	         	
			$arrayID[$i]=$arrayresultat[2];
			$arrayQtt[$i]=$arrayresultat[3];
			$i++;
	    }
	    echo "</table>";	    
	}
	mysqli_free_result($result);
	echo "<table border=1 cellspacing=0 cellpading=6>
		<tr> <th>Destino</th> <th>Imagen</th> <th>Precio</th> <th> Descuento</th><th>Precio Final</th> <th> </th> </tr>  ";
		$i=0;
	while ($i<count($arrayID)) {
		$idBuscada=$arrayID[$i];
		$sql = "SELECT * FROM viajes_geckos WHERE id='$idBuscada'";
		$result=mysqli_query($connexio,$sql);
		if(!$result) //retorna fals si hi ha un error en la consulta, sino retorna l'objecte amb dades
			echo "Error: " . $sql . "<br>" . mysqli_error($connexio);
		else {		
			while ( $arrayresultat2=mysqli_fetch_row($result) ) // recorremos todas las filas del resultado del select
			{
				$preu=$arrayresultat2[3]*$arrayQtt[$i];
				$preuFinal= $preu-($preu*$arrayresultat2[4]/100);
				echo "<tr class='viaje'> <td>$arrayresultat2[1]</td> <td><img class='imgDestino' src='$arrayresultat2[2]'></td> <td>$preu €</td> <td>$arrayresultat2[4] %</td> <td>$preuFinal €</td> <td><form method='post'><label><input type='hidden' name='rmvId' value='$arrayresultat2[0]'/></label><input type='submit' name='rmvCart' value='Eliminar del carro' /></form></td></tr>";
			}
		}
		$i++;
	}
	//-------------------------------------------------------------------
	if (isset($_POST['rmvCart'])) {
		if (!empty($_POST['rmvId']))
		{
			//hacemos select para ver la Qtt de ese viaje si Qtt==1 hacemos un delete, si Qtt>1 hademos un update de Qtt-1
			$id = $_POST['rmvId'];
			$sql="SELECT * FROM cart_geckos WHERE nom='$user' and pass='$password' and id='$id'";
			$result=mysqli_query($connexio,$sql);
			if ($result) {	
				while ( $arrayresultat3=mysqli_fetch_row($result) ) // recorremos todas las filas del resultado del select
				{
					if ($arrayresultat3[3]>1) {
						$sql= "UPDATE cart_geckos SET qtt=qtt-1 WHERE nom='$user' and pass='$password' and id='$id'";
						if (mysqli_query($connexio, $sql)) {
							echo "New record created successfully";				    			   
						} else {
						  	echo "Error: " . $sql . "<br>" . mysqli_error($connexio);
						}						
				    }else{
				    	$sql="DELETE FROM cart_geckos WHERE nom='$user' and pass='$password' and id='$id'";
						if (mysqli_query($connexio, $sql)) {
							echo "New record created successfully";				    			   
						} else {
						  	echo "Error: " . $sql . "<br>" . mysqli_error($connexio);
						}
				    }	
				}			   
			} else {
				echo "Error: " . $sql . "<br>" . mysqli_error($conn);
			}	
			header('Location: cleanCart.php');	
		}
	}
	//-------------------------------------------------------------------
	mysqli_close($connexio);
		echo"<style>";
		include'estils/estils.css';
	echo"</style>";
?>
<html>
<head>
	<title></title>
</head>
<body>

</body>
</html>