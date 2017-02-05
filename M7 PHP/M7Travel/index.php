<?php
	include 'connexioBdd/connexio.php';
	echo"<style>";
		include'estils/estils.css';
	echo"</style>";
	session_start();
	$error="";
	$login = "";
	$age = "";
	$email = "";
	$emailOk = false;
	$loginOk = false;
	$ageOk = false;
	if (isset($_POST['enviar'])) {
		if (empty($_POST['login']) || empty($_POST['password']))
		{
			$error="<p>Usuari o password no son correctes!</p>";
			echo "$error";
		}
		
		if (empty($_POST['age'])) {
			$error="<p>El campo 'Age' és obligatorio!</p>";
			echo "$error";
		}
		
		if (empty($_POST['email'])) {
			$error="<p>El campo 'Email' és obligatorio!</p>";
			echo "$error";
		}
		else
		{
			if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
				$_SESSION['email'] = $_POST['email'];
				$email = $_SESSION['email'];
				$emailOk = true;
			}
			else
			{
				$error="<p>El campo 'Email' no és valido!</p>";
				echo "$error";
			}						
		}
		if (!empty($_POST['login'])) {
			$_SESSION['login'] =$_POST['login'] ;
			$login = $_SESSION['login'];
			if (!empty($_POST['password'])) {
				$_SESSION['password'] =$_POST['password'] ;
				$loginOk = true;
			}			
		}
		if (!empty($_POST['age'])) {
			$_SESSION['age'] = $_POST['age'];
			$age = $_SESSION['age'];
			$ageOk = true;
		}
		if ($loginOk && $ageOk && $emailOk) {
			//HACER  INSER DEL USER EN LA BDD
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

			$username = $_POST['login']; // modificar nombres de las variables al ponerlo en el login.php de la web
			$pass = $_POST['password'];
			$edat = $_SESSION['age'];
			$email = $_POST['email'];
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
			header('Location: login.php');			
		}
	}
?>
<html>
<head>
<script type="text/javascript" src="js/info.js"></script>
	<title>Geckos Adventures</title>
</head>
<body>
	

	<form method="post" >
		<fieldset><legend>Login</legend>
		<img src="img/logo.png"></br>
			<label>Login:<input type='text' name='login' value = "<?php echo $login; ?>"/></label>
			<label>Password:<input type='password' name='password'/></label></br></br>
			<label>Age:<input type='number' name='age' value = "<?php echo $age; ?>"/></label>
			<label>E-mail:<input type='text' name='email' value = "<?php echo $email; ?>"/></label></br></br>
			<input type="submit" name="enviar" value="Entrar" /></br>
			<a href="download/XaviVidal-Geckos.rar" download="XaviVidal-Geckos.rar">
				Descargar Archivo Para Crear BDD
			</a>
		</fieldset>
	</form>
</body>
</html>

