<?php

	class Obra {

		public $nomObres;

		public function getObra(){

			include 'Conexio.php';

			$i=0;

			$sql="select * from Obra";
			$conexio=mysqli_connect($ip,$usu,$pass);

	        if(!$conexio){
	            exit('No es pot connectar:'. mysqli_connect_error());
	        }
	        
	        if(!mysqli_select_db($conexio,$bbdd)){
	            echo 'No es pot conectar a la base de dades\n';
	        }
	        
	        $res=mysqli_query($conexio,$sql);

	        if(!$res){
		        echo"Error SQL";
		    }else{
		        if(mysqli_num_rows($res)>0){
		        while($fila=mysqli_fetch_array($res)){
		        	$this->nomObra[$i] = $fila['nom'];
		        	$i++;
		        }
		    }

	        mysqli_close($conexio);

	        return $this->nomObra;

			}
		}


	}
?>