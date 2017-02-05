<?php

/**
* 
*/
class ClConnexio {
	var $host = 'localhost';
	var $user = 'root';
	var $pass = 'root';
	var $bdd = 'examenteatre';

	function conectarBdd(){ //Con esta funcion abrimos la connexion a la bdd
	    $lConnexio = mysqli_connect($this->host, $this->user, $this->pass); 
	    if(!mysqli_select_db($lConnexio,$this->bdd))
	        exit("Error al connectar amb la base de dades". mysqli_connect_error());
	    else{
	        return $lConnexio;
	    }
	}
}

?>