<HTML>
<head>
<title>Primer exemple amb POO</title>
</head>
<body>	 	 
	<?php

	class Prediccio
	{		
		var $apiCode;

		var $infoObtinguda;

		var $name;
		var $lat;
		var $lon;
		var $tmpMin;
		var $tmpMax;
		var $presure;
		var $windSpeed;
		var $cloudsX100;

		public function __construct($pnom,$papiCode){
			$this->nom=$pnom;
			$this->apiCode = $papiCode;
			obtenirInformacio();
		}

		private function obtenirInformacio(){
			$this->infoObtinguda = file_get_contents("http://api.openweathermap.org/data/2.5/weather?q="+$this->name+"&mode=json&appid="+$this->apiCode);

		}
	}	

	?>
</body>
</HTML>