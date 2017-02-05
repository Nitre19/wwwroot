<HTML>
<head>
<title>Primer exemple amb POO</title>
</head>
<body>
	 
	<?php
	class Feina
	{
		var $nom;
		var $desc;
		var $dataI;
		var $dataFiMax;
		var $durada;
		//$pdataFiMax=$pdataI+3
		public function __construct($pnom,$pdesc,$pdataI,$pdurada=1){
			$this->nom=$pnom;
			$this->desc=$pdesc;
			$this->dataI=date('d-m-Y',strtotime($pdataI));
			$this->dataFiMax=date('d-m-Y',strtotime($pdataI.'+3 days'));
			$this->durada=$pdurada;
		}

		public function cambiarDataFi($pdataFi){
			$this->dataFiMax=date('d-m-Y',strtotime($pdataFi));
		}

		public function imprimir()
	    {
	    	echo $this->nom;
	    	echo '<br>';
	    	echo $this->desc;
	    	echo '<br>';
			echo $this->dataI;
			echo '<br>';
			echo $this->dataFiMax;
			echo '<br>';
			echo $this->durada;
	    	echo '<br>';
	    }

	    public function mostrarDataFi(){	    	
			echo $this->dataFiMax;
	    }
	}
	// Instanciar 2 objectes de la classe Feina
	$feina1=new Feina("Feina1","Desc feina1","01/09/2017");
	$feina2=new Feina("Feina2","Desc feina2","01/10/2017",3);
	$feina2->cambiarDataFi("01/15/2017");
	$feina1->imprimir();
	$feina2->imprimir();
	$feina1->mostrarDataFi();
	$feina2->mostrarDataFi();
	?>
</body>
</HTML>