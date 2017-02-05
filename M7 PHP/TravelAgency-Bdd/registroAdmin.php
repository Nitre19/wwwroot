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
			<p align='right'><b>Eres nuevo?</b> <a href="registro.php">Registrate</a></p>
				<h1>Registro Admin</h1>
				<form method="post">
					<fieldset><legend>Login</legend>
					<label>Usuario: <input type='text' name='nomAdmin'/></label>
					<label>Contraseña: <input type='passsword' name='contraseña'/></label>
				<p><input type="submit" name="enviar" value="Entrar"/></p></fieldset> </form>
			</main>
		</body>
	</html>
<?php

	$servername = "localhost";
	$username = "root";
	$passsword = "root";
	$bddname = "phpviajes";


	$connexio = mysqli_connect($servername, $username, $passsword);

	if (!$connexio)
	{
		exit('No es pot connectar:'. mysql_error());
	}
	else echo "<p>Connexió correcta!</p>";

	if(!mysqli_select_db($connexio,$bddname))
	exit("Error al connectar amb la base de dades". mysqli_connect_error());
	
	if(isset($_POST['enviar'])) 
	{
		$nombreAdmin = $_POST['nomAdmin'];				// Para guardar el nombre en esa variable miramos antes si hay algo escrito
		$_SESSION['nomAdmin'] = $nombreAdmin;

		$sql="Select nombre from admin where nombre='$nombreAdmin'";		// Select para que me muestre el nombre de la tabla si es igual al que me ha introducido

		$result=mysqli_query($connexio,$sql);		// Para que lo de arriba lo haga he de ejecutar la consulta

		if(!$result) //retorna fals si hi ha un error en la consulta, sino retorna l'objecte amb dades
	 	echo "Error en la consulta, revisa la sql";
	 	else header('Location: Travel_Agency.php');
	}

  ?>