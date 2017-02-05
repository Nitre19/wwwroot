<?php
	
	$boton="";
	include "catalogoViajes.php";
	session_start();

	$nombre="";

	if(isset($_SESSION['usuario']))
	{
		$nombre = $_SESSION['usuario'];
	}

	/*if(isset($_SESSION['nomAdmin']))
	{
		if(strtolower($_SESSION['nomAdmin'])=='admin')
		{
			$boton="<button name='boton' type='submit' style='width:100px; height:50px; margin-left:1050px'>Añadir Viajes</button>";
			$nombre = $_SESSION['nomAdmin'];
		}
		else 
		{
			header('Location:registroAdmin.php');
		}
	}*/
?>

<!DOCTYPE html>
	<html>
		<head>
			<title>GECKOS ADVENTURES</title>
			<meta charset="UTF-8" />
			<meta name="viewport" content="width=device-width, initial-scale=1.0" />
			<link rel='stylesheet' href="css/estil.css" />
			<p align="right"><b>Sesión Iniciada </b>(<?php echo "<i>".$nombre."</i>"; ?>)</p>			<!-- Te indica que usuario ha 'iniciado sesión' -->
			<img src='imagenes/paises.png' width='1340' height='200'>									<!-- Imagen de encabezado -->
			<p align=right><font size=4><a href='registro.php'>Cerrar Sesión</a></font></p>				<!-- Te devuelve al registro -->
		</head>
		<body>
			<main>
				<h3>Bienvenido <font color="blue"><?php echo $nombre; ?></font></h3>

				<h2 align="center"><font size="7">Ofertas en VIAJES<?php echo $boton; ?></font></h2>

				<table>	 <!-- Creamos la tabla !-->
					<thead>
						<?php
							echo "<tr bgcolor='#00BFFF'><th height='30'>VIAJE A</th><th>IMAGEN</th><th>PRECIO</th><th> DESCUENTO</th><th> PRECIO FINAL</th><th> A LA CESTA</th></tr>";

								foreach ($viajes as $id=>$name) 
								{
									// Creo num Randoms para el precio y el descuento por viaje
									do { $descuento=rand(5,50); } while ($descuento%5!=0);			// Fuerzo que sea múltiple de 5 para que sea un dto más lógico
									$precio=rand(1000,3000);
									$preDesc = $precio - ($precio * $descuento/100);

								    echo "<tr bgcolor='#CEF6F5'><th width='200'>".$name. "</th><th><img src='destinos/img".$id.".jpg' width='300' height='200'></th>
								    <th width='180'>".$precio. " €/Persona</th><th width='180'>".$descuento." %</th><th width='180'>".$preDesc." €/Persona
								    <th width='180'><a href='carroViajes.php?todo=add&id=".$id."'>Añadir a la cesta</a></th></tr>";
								}
						?>
					</thead>
				</table>
				<br><a href='carroViajes.php'>Ver tu CARRITO</a>
			</main>
		</body>
	</html>