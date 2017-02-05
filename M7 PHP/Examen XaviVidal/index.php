<?php
	include 'class/ClConnexio.php';
	include 'class/ClEntrada.php';
?>

<?php
	$loConnexio = new ClConnexio();
	$connexioBdd = $loConnexio->conectarBdd();
	$loEntrada = new ClEntrada();
	$entradesLliures = $loEntrada->obtenirEntradesLliures($connexioBdd);

$temes=array();

	if (isset($_POST['Enviar']) ) {
        $temes=$_POST['marcats'];
        foreach ($temes as $act)
        {        
        	$lWhere = "WHERE ID_ENTRADA = $act";
            $dadesEntrada = $loEntrada->obtenirEntradesWhere($lWhere,$connexioBdd);
            $loEntrada->ubdateOcupatWhere($lWhere,$connexioBdd);
            if(!$dadesEntrada) //retorna fals si hi ha un error en la consulta, sino retorna l'objecte amb dades
		echo "Error: <br>" . mysqli_error($connexioBdd);
		else {		
			while ( $arrayresultat2=mysqli_fetch_row($dadesEntrada) ) // recorremos todas las filas del resultado del select
			{
				$data=$arrayresultat2[0];
				$idObra=$arrayresultat2[1];
				$idTeatre = $arrayresultat2[2];
				$numSeient =$arrayresultat2[3];
				//ENVIAMOS DATOS AL WEBSERVICE de arrayresultat2 + $act
				header('Location: webservice.php?data='.$data.'&idObra='.$idObra.'&idTeatre='.$idTeatre.'&numSeient='.$numSeient.'&idEntrada='.$act.'');
			}
		}
        }
    }

	echo "<form method='post' action='' enctype='multipart/form-data'>";
	echo "<table border=1>";
	echo "<tr><td align=center>Obra</td><td align=center>Zona</td><td align=center>Data</td><td align=center>Fila</td>
				<td align=center>Nº Seient</td><td align=center>Marcar</td></tr>";
	if(!$entradesLliures) //retorna fals si hi ha un error en la consulta, sino retorna l'objecte amb dades
		echo "Error:<br>" . mysqli_error($connexioBdd);
		else {		
			while ( $arrayresultat=mysqli_fetch_row($entradesLliures) ) // recorremos todas las filas del resultado del select
			{
				echo "<tr><td align=center>$arrayresultat[0]</td><td align=center>$arrayresultat[1]</td><td align=center>$arrayresultat[2]</td><td align=center>$arrayresultat[3]</td>
				<td align=center>$arrayresultat[4]</td><td align=center><input type='checkbox' name='marcats[]' value='$arrayresultat[5]'></input></td></tr>";
			}
		}
	echo "</table>";	
	echo "<input type='submit' name='Enviar' value='Enviar'>";
	echo "</form>";		

		
?>
<!DOCTYPE html>
<html>
<head>
	<title>Petit Teatre</title>
</head>
<body>
</body>
</html>