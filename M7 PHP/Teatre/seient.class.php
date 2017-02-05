<?php

	class Seient {
		public $nomTeatre;
		public $fila;
		public $columna;
		public $zona;
		public $numFiles;
		public $numColumnes;
		public $obra;
		public $dataObra;

		//Inicializa todos los asientos del teatro
		public function inicialitzarSeients($f,$c,$teatre="TeatredeBarcelona"){
			include 'Conexio.php';

			$this->nomTeatre=$teatre;
			$this->numFiles=$f;
			$this->numColumnes=$c;

			$conexio=mysqli_connect($ip,$usu,$pass);

	        if(!$conexio){
	            exit('No es pot connectar:'. mysqli_connect_error());
	        }
	        
	        if(!mysqli_select_db($conexio,$bbdd)){
	            echo 'No es pot conectar a la base de dades\n';
	        }

	        //Introduce los asientos de platea
	        for($x=1;$x<$this->numFiles;$x++){
	        	for($y=1;$y<$this->numColumnes;$y++){
	        		$sql="Insert into Seient values('$this->nomTeatre','$x','$y','Platea')";
	        		$res=mysqli_query($conexio,$sql);
	        	}
	        }

	        //Introduce los asientos de palco
	        for($x=1;$x<$this->numFiles;$x++){
	        	for($y=1;$y<$this->numColumnes;$y++){
	        		$sql2="Insert into Seient values('$this->nomTeatre','$x','$y','Palco')";
	        		$res=mysqli_query($conexio,$sql2);
	        	}
	        }

	        mysqli_close($conexio);

		}

		//Devuelve el numero de asientos disponibles
		public function seientsDisponibles($nom,$data){

			include 'Conexio.php';

			$this->obra=$nom;
			$this->dataObra=$data;

			$totalSeients=$this->numFiles * $this->numColumnes;
			$ocupats = 0;

			$sql="select count(*) as ocupats from Entrada where nomObra='$this->obra' and dataObra='$this->dataObra'";
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
			        	$ocupats=$fila['ocupats'];
			        }

		    	}
			}

			$disponibles = $totalSeients - $ocupats;

			mysqli_close($conexio);

			return $disponibles;
		}
		
	}
?>