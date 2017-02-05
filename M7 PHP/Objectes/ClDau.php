<HTML>
<head>
<title>Primer exemple amb POO</title>
</head>
<body>
	 
	<?php
	class Dau
	{
		var $numCares;
		var $valorDau;		

		
		public function tirarDau($pnumCares){
			$this->numCares = $pnumCares;
			$this->valorDau = rand(1,$pnumCares);
			$this->mostrarDau();
		}		

		public function mostrarDau()
	    {
	    	echo $this->valorDau;
	    	echo "<br>";
	    }
		
	}
	// Instanciar 2 objectes de la classe Feina
	$dau1 = new Dau();
	$dau1->tirarDau(6);
	$dau2 = new Dau();
	$dau2->tirarDau(6);
	$dau3 = new Dau();
	$dau3->tirarDau(6);
	$suma = $dau1->valorDau+$dau2->valorDau+$dau3->valorDau;
	echo "------<br>";
	echo $suma;
	?>
</body>
</HTML>