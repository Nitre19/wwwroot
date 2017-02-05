<?php
//Variables
//Variables BDD
$host = 'localhost'; //Host del servicio de bdd
$user = 'root'; //User del servicio de bdd
$pass = 'root'; //Pass del servicio de bdd
$bdd = 'examenphpbdd';  //Nombre de la bdd donde trabajaremos

//Variables de la WEB
$Nom ="";   //Nombre del empleado
$Cognom=""; //Cognom del empleado
$Codi=0;    //Codid del empleado
$data_inici=""; //ddata en la que empieza las vacaciones
$data_fi ="";   //data en la que termina las vacaciones
$NumDies=0;     //Numero de dias que hace devacaciones (Siempre es 5 porque el date_diff no hay que utilizarlo)
?>

<?php
//Parete de mirar el post
    if(isset($_POST['Enviar']))
    {
        $connexio = conectarBdd($host, $user, $pass, $bdd); //Al llamar a esta funcion recibimos la connexion a la bdd que utilizaremos para hacer las consultas

        //Recuperamos de la variable $_POST todos los datos y los metemos en las variables creadas anteriormente para despues hacer un insert a la bdd
        $Nom =$_POST['nom'];
        $Cognom=$_POST['cognom'];
        $Codi=$_POST['codi'];
        $data_inici=$_POST['data_inici'];
        $data_fi =$_POST['data_fi'];
        $NumDies= 5;
        //Hacemos el insert a la bdd con los datos recuperados del formulario
        $sql ="INSERT INTO vacances VALUES ('$Nom','$Cognom', $Codi,date('$data_inici'),date('$data_fi'),0,$NumDies, null)";
        insertUpdateBdd($sql,$connexio);    //Esta funcion ejecuta el $sql, puede ser un insert oo un update
    }
?>
<!DOCTYPE html> <!-- Document de tipus HTML5 -->
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
        <link rel="stylesheet" type="text/css" href="estils/vacances.css" />
		<title>Vacances</title>
		<meta charset="UTF-8"/>
	</head>
	<body>
        <header>
            <h1>Formulari per solicitar vacances</h1>
        <nav>
                <p>
                <a href="Gestor.php">Gestió de vacances</a>

                </p>
            </nav>
        </header>
        <main>
             <aside>
             </aside>
             <section>
        <form method="post" action="" enctype="multipart/form-data">
                     <label>Nom:
                        <input type="text" name="nom" required="required" />
                    </label>
                     <label>Cognom:
                        <input type="text" name="cognom" required="required" />
                    </label>
                    <label>Codi empleat:
                        <input type="numeric" name="codi" required="required" />
                    </label>
                    <label>Data inici*:
                        <input type="date" name="data_inici" required="required" />
                    </label>
                    <label>Data fi*:
                        <input type="date" name="data_fi" required="required" />
                    </label>
                   <p>*Ambdós inclosos </p>
                    <input type="submit" name="Enviar" value="Enviar">
        </form>
        </section>
        </main>
        <footer>
            <p>&copy;Solicitud de vacances</p>
        </footer>
    </body>
</html>

<?php
//#################..PARTE DE LAS FUNCIONES..#################
//Funcion para conectar a la bdd
function conectarBdd($pHost, $pUser, $pPass, $pBdd){ //Con esta funcion abrimos la connexion a la bdd
    $lConnexio = mysqli_connect($pHost, $pUser, $pPass);
    if(!mysqli_select_db($lConnexio,$pBdd))
        exit("Error al connectar amb la base de dades". mysqli_connect_error());
    else{
        return $lConnexio;  //Hace el return de la connexion a la base de datos
    }
}


/*
En las funciones inferiores podriamos llamar a la funcion conectarBdd(), esto no evitaria tener que enviarles la variable $connexio
*/
//Funcion para hacer un insert
function insertUpdateBdd($pSql,$pConnexio){
    //Hace el insert o update, no hace ningun return porque despues no necesitamos trabajar con los valores
    mysqli_query($pConnexio, $pSql);
}

//Funcion para hacer un select
function selectBdd($pSql,$pConnexio){
//Le llega un select, hace la consulta y hace un return del resultado
    $lResult = mysqli_query($pConnexio,$pSql);;
    return $lResult;
}
?>
