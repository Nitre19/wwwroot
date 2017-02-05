<HTML>
<head>
<title>Primer exemple amb POO</title>
</head>
<body>
	 
	<?php
	class Pont
	{
		var $any;
		var $material;
		var $llevadis=0;
		//var $estat;		
		public function __construct($pany,$pmaterial){			
			$this->any= $pany;
			$this->material = $pmaterial;	
		}	
	}

	class PontLlevadis extends Pont
	{
		var $material = "ferro";
		var $llevadis = 1;
		var $estat;
		function __construct($pestat=0)
		{
			$this->estat = $pestat;
		}
		public function modificarEstat()
		{
			var $value = 0;
			if ($this->estat==$value) {
				$value = 1;
			}
			$this->estat = $value;
		}
		
	}
	// Instanciar 2 objectes de la classe Feina

	?>
</body>
</HTML>