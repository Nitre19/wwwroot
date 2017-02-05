<?php
	include 'connexioBdd/connexio.php';
	echo"<style>";
		include'estils/estils.css';
	echo"</style>";
	$destino ="";
	$precio ="";
	$desc=0;
	$IdMaxima="";
	$IdGenerada="";
	$ImgURL="";
	if(!mysqli_select_db($connexio,$bdd))
			exit("Error al connectar amb la base de dades". mysqli_connect_error());
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
		if ($user!='admin' || $password!='admin') {
			header('Location: index.php');
		}
	}
	//-------------------------------------------------------------------
	echo "<table><tr><td><img src='img/logo.png'></td><td>User: $user<br>Edat: $edat<br>E-mail: $email<br><form action='cart.php'><input type='submit' value='Carrito' /></form>";
	echo "<form action='webSite.php'><input type='submit' value='Volver a la web' /></form>";
	echo "</td></tr></table>";
	//-------------------------------------------------------------------
	if (isset($_POST['addViaje'])) {
		if (empty($_POST['destino']) || empty($_POST['precio'])) {
			$error="<p>Rellena todos los campos</p>";
			echo "$error";
		}else{
			if ($_POST['desc']<0) {
				$desc=0;
			}else{
				$desc=$_POST['desc'];
			}
			$destino=$_POST['destino'];
			$precio=$_POST['precio'];
			if (is_uploaded_file($_FILES['imagen']['tmp_name']))
			{
				$mTmpFile = $_FILES["imagen"]["tmp_name"];
				$mTipo = exif_imagetype($mTmpFile);
				if (($mTipo != IMAGETYPE_JPEG) && ($mTipo != IMAGETYPE_PNG))
				    echo"Formato de archivo incorrecto";
				else{
					$nombreDirectorio = "img";
					$nombreFichero = $_FILES['imagen']['name'];				 
					$nombreCompleto = $nombreDirectorio ."/". $nombreFichero;
					if (is_file($nombreCompleto))
					{
						$idUnico = time();
						$nombreFichero = $idUnico . "-" . $nombreFichero;
					}				 
					move_uploaded_file($_FILES['imagen']['tmp_name'], $nombreDirectorio."/".$nombreFichero);		
	//-------------------------------------------------------------------
					//Hacemos el insert a la bdd		
					$sql="SELECT max(id) FROM viajes_geckos";
					$result=mysqli_query($connexio,$sql);
					if(!$result) //retorna fals si hi ha un error en la consulta, sino retorna l'objecte amb dades
				 		echo "Error en la consulta, revisa la sql";
					else {						
						while ( $arrayresultat=mysqli_fetch_row($result) ) // recorremos todas las filas del resultado del select
						{
							$IdMaxima=$arrayresultat[0];
						}
						$IdGenerada=$IdMaxima+1;
						$ImgURL=$nombreDirectorio."/".$nombreFichero;		
						$sql="INSERT INTO viajes_geckos VALUES ('$IdGenerada','$destino','$ImgURL','$precio','$desc')";
						if (mysqli_query($connexio, $sql)) {
							echo "New record created successfully";	
							echo "<img src='img/$nombreFichero'>";   
							header('Location: cleanWeb.php');			   
						} else {
						  	echo "Error: " . $sql . "<br>" . mysqli_error($connexio);
						}
					}
				}
			}			 
			else
				print ("No se ha podido subir el fichero");
		}
	}

	//Mirar si $_POST['addViaje'] isset
	//Mirar que ningun campo este vacio
	//Hacer el insert del nuevo viaje
		//Si el viaje ya existe se podria hacer un update con lo nuevos datos
		//Se podria implementar la opcion de eliminar viaje

?>
<html>
<head>
	<title></title>
</head>
<body>
	<form method="post" enctype="multipart/form-data">
		<fieldset><legend>Añadir Viaje</legend> 
			<label>Destino:<input type='text' name='destino' value = "<?php echo $destino; ?>"/></label>
			<label>Precio:<input type='number' name='precio' value = "<?php echo $precio; ?>"/></label>
			<label>Descuento:<input type='number' name='desc' value = "<?php echo $desc; ?>"/></label></br></br>
			<label>Imagen:<input type='file' name='imagen'/></label></br></br>
			<input type="submit" name="addViaje" value="Añadir Viaje"/>							
		</fieldset>
	</form>
</body>
</html>