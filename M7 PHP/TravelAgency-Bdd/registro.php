<!DOCTYPE html>
	<html>
		<head>
			<title>Registro GECKOS</title>
			<meta charset="UTF-8" />
			<meta name="viewport" content="width=device-width, initial-scale=1.0" />
			<link rel='stylesheet' href="css/estil.css" />
			<img src='imagenes/logoRana.png' width='350' height='110'>
		</head>
		<body>
			<main>
				<p align='right'><b>Eres admin?</b> <a href="registroAdmin.php">Iniciar Sesion</a></p>
				<h1>Registro</h1>
				<form method="post">
					<fieldset><legend>Login</legend>
					<label>Nombre: <input type='text' name='nombre'/></label>
					<label>Edad: <input type='number' name='edad'/></label>
					<label>Email: <input type='email' name='correo'/></label>
				<p><input type="submit" name="enviar" value="Entrar"/></p></fieldset> </form>
			</main>
		</body>
	</html>

<?php

	$servername = "localhost";
	$username = "root";
	$passsword = "root";
	$bddname = "phpviajes";
	$email="";
	$nombre="";
	$edad=0;
	session_start();

	$connexio = mysqli_connect($servername, $username, $passsword);

	if (!$connexio)
	{
		exit('No es pot connectar:'. mysql_error());
	}
	else echo "<p>Connexió correcta!</p>";

	if(!mysqli_select_db($connexio,$bddname))
	exit("Error al connectar amb la base de dades". mysqli_connect_error());

	if(isset($_POST['enviar']))		// Comprobamos todo cuando le damos a Enviar
	{
		
		if (empty($_POST['nombre']) || (empty($_POST['edad']) || (empty($_POST['correo']))))
		{
			echo "<p><font color='red'> ERROR! Falta rellenar campos obligatorios. </font></p>";
		}
		else
		{
			$email = $_POST['correo'];
			$nombre = $_POST['nombre'];
			$edad = $_POST['edad'];

			if (filter_var($email, FILTER_VALIDATE_EMAIL))  // Filtro que valida si un email es correcto 
            {  
            	$sql="Select * from usuario where nombre='$nombre'";
				$result=mysqli_query($connexio,$sql);		// Para que lo de arriba lo haga he de ejecutar la consulta

                if($result) 
            	{
            		if(mysqli_num_rows($result)>0)
            		{
            			$_SESSION['usuario'] = $nombre;
            			header('Location: Travel_Agency.php');
            		}
            		else header('Location: noAutorizado.php');		// Si es menor o muy mayor no tiene acceso
            	}
            }  
            else echo '<br>"' . $email . '" = Invalid' . "\n"; 
		}			// 'nombre' del POST ha de ser igual al name del label, el SESSION el que quierass
	}
?>