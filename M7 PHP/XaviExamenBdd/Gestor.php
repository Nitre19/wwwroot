<?php
//Variables
//Variables BDD
$host = 'localhost';
$user = 'root';
$pass = 'root';
$bdd = 'examenphpbdd';
$validats = array();
?>

<?php
	$connexio = conectarBdd($host, $user, $pass, $bdd);
?>


<?php
//Parte de mirar el post
	if(isset($_POST['Autoritzar']))	//miramos si el $_POST['Autoritzar'] esta inicializado
	{
		if(isset($_POST['validats'] ))//miramos si el $_POST['validats'] esta inicializado
        {
	        $validats=$_POST['validats'];	//guardamos los datos de $_POST['validats'] en $validats, que es un array 	        
			foreach ($validats as $value) {
				//Por cada valor en el array $validats haremos un update en la tabla vacances modificando el valor de validat a 1
				$sql="UPDATE vacances SET VALIDAT=1 WHERE ID=$value";	//El where id=$value nos permite actualizar el campo del empleado que queremos
				insertUpdateBdd($sql,$connexio);
			}
		}
	}
?>


<?php
//Parte de la bdd
//hacemos un select de la tabla vacances pero solo de los empleados que inicien sus vacaciones antes del el dia actual, esto nos permite saber si han empezado  no las vacaciones
	$sql = "SELECT * FROM vacances WHERE PRIMER_DIA_VACANCES<now()";
	$result=selectBdd($sql,$connexio);

	if(!$result) //retorna fals si hi ha un error en la consulta, sino retorna l'objecte amb dades
	 		echo "Error en la consulta, revisa la sql";
		else {
			// Hacer un echo que imprima la cabecera de la tabla
			echo "<form method='post' action='' enctype='multipart/form-data'>";
			echo "<table border=1 cellspacing=0 cellpading=6><tr><th>Nom</th><th>Cognom</th><th>Codi</th><th>Inici</th><th>Final</th><th>Dies</th><th>Validat</th></tr>";
			while ( $arrayresultat=mysqli_fetch_row($result) ) // recorremos todas las filas del resultado del select
			{	         	
				//var_dump($arrayresultat); //Var dump para mirar de forma rapida lo que tengo en arrayresultat
				/*
				nom = $arrayresultat[0];
				cognom = $arrayresultat[1];
				codi = $arrayresultat[2];
				inici = $arrayresultat[3];
				final = $arrayresultat[4];
				dies = $arrayresultat[6];
				validat = $arrayresultat[5];  <<---Va con la id = $arrayresultat[7];
				*/
				echo "<tr><td>$arrayresultat[0]</td><td>$arrayresultat[1]</td><td>$arrayresultat[2]</td><td>$arrayresultat[3]</td><td>$arrayresultat[4]</td><td>$arrayresultat[6]</td><td><input type='checkbox' name='validats[]' value='$arrayresultat[7]'></input></td></tr>";

		    }
		    echo "</table>";
		    echo "<input type='submit' name='Autoritzar' value='Autoritzar'>
        </form>";	    
		}
?>



<?php
//#################..PARTE DE LAS FUNCIONES..#################
/*
Los comentarios de las funciones estan en index.php
*/
//Funcion para conectar a la bdd
function conectarBdd($pHost, $pUser, $pPass, $pBdd){ //Con esta funcion abrimos la connexion a la bdd
    $lConnexio = mysqli_connect($pHost, $pUser, $pPass); 
    if(!mysqli_select_db($lConnexio,$pBdd))
        exit("Error al connectar amb la base de dades". mysqli_connect_error());
    else{
        return $lConnexio;
    }
}

//Funcion para hacer un insert
function insertUpdateBdd($pSql,$pConnexio){
    mysqli_query($pConnexio, $pSql);
}

//Funcion para hacer un select
function selectBdd($pSql,$pConnexio){   
//Le llega un select, hace la consulta y hace un return del resultado

    $lResult = mysqli_query($pConnexio,$pSql);;

    return $lResult;
}
?>