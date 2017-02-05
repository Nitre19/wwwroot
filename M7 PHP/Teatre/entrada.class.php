<?php

	class Entrada {

		public $nomObra;
		public $teatre;
		public $fila;
		public $columna;
		public $zona;
		public $data;
		public $preu;
		public $disponibles;
		public $numFiles;
		public $numColumnes;

		function __construct($obra,$f,$c,$zona,$data,$preu,$tea){
			$this->teatre=$tea;
			$this->nomObra=$obra;
			$this->fila=$f;
			$this->columna=$c;
			$this->zona=$zona;
			$this->data=$data;
			$this->preu=$preu;
		}

		public function introduirEntrada(){
			include 'Conexio.php';

			$conexio=mysqli_connect($ip,$usu,$pass);

		    if(!$conexio){
		        exit('No es pot connectar:'. mysqli_connect_error());
		    }

		    if(!mysqli_select_db($conexio,$bbdd)){
		            echo 'No es pot conectar a la base de dades\n';
		    }

		    $sql="insert into Entrada values('$this->teatre','$this->nomObra',$this->fila,$this->columna,'$this->zona','$this->data',$this->preu)";

	        $res=mysqli_query($conexio,$sql);
		    if(!$res){
		    	//Al no poder realizar el insert de la entrada, damos por hecho que ese asiento esta coupado
			    echo"Asiento Ocupado!";
			}else{
			    echo "Entrada comprada correctament!";
			}
	        
	        mysqli_close($conexio);
		}

	}
?>