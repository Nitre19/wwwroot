<?php

	class Teatre {

		public $nomTeatre;

		public function getTeatre(){

			include'Conexio.php';

			$sql="select * from Teatre";
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
		        	$this->nomTeatre = $fila['nom'];
		        }
		    }

	        mysqli_close($conexio);

	        return $this->nomTeatre;

			}
		}
	}
?>