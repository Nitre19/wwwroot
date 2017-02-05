<?php
if ($_REQUEST['data']!=""&&$_REQUEST['idObra']!=""&&$_REQUEST['idTeatre']!=""&&$_REQUEST['numSeient']!=""&&$_REQUEST['idEntrada']!="") {
	$data=$_REQUEST['data'];
	$idObra=$_REQUEST['idObra'];
	$idTeatre = $_REQUEST['idTeatre'];
	$numSeient =$_REQUEST['numSeient'];
	$idEntrada = $_REQUEST['idEntrada'];

	echo "
<img src='http://qrickit.com/api/qr?d=".$data.";".$idObra.";".$idTeatre.";".$numSeient.";".$idEntrada."&addtext=".$data."'>";

}else{
	echo "Error no s'ha pogut generar el Qr";
}

echo "
<a href='index.php'>Tornar a la WEB</a>";
?>