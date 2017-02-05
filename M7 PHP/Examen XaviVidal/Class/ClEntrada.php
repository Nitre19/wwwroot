<?php
/**
* 
*/
class ClEntrada
{
	var $ID_ENTRADA;
	var $ID_TEATRE;
	var $ID_OBRA;
	var $NOM_OBRA;
	var $ZONA;
	var $DATA;
	var $SEIENT_FILA;
	var $SEIENT_NUM;
	var $OCUPAT;


	function obtenirEntradesLliures($pconnexioBdd){
		$sql = "SELECT NOM_OBRA, ZONA, DATA, SEIENT_FILA, SEIENT_NUM, ID_ENTRADA FROM entrades WHERE OCUPAT=0";
		$lResult = mysqli_query($pconnexioBdd,$sql);;
		return $lResult;
	}

	function obtenirEntradesWhere($pWhere,$pconnexioBdd){
		$sql = "SELECT DATA, ID_OBRA, ID_TEATRE, SEIENT_NUM FROM entrades $pWhere" ;
		$lResult = mysqli_query($pconnexioBdd,$sql);;
		return $lResult;
	}

	function ubdateOcupatWhere($pWhere,$pconnexioBdd){
		$sql = "UPDATE entrades SET OCUPAT=1 $pWhere" ;
		mysqli_query($pconnexioBdd, $sql);
	}

}

?>