<HTML>
<head>
<title>Primer exemple amb POO</title>
</head>
<body>
	 
	<?php
	class User
	{
		var $nom;
		var $pass='Pa$$w0rd';
	}
	// Instanciar 2 objectes de la classe Alumne
	$user1=new User();
	$user1->nom="Xavi";
	echo $user1->nom;
	echo "<br>";
	echo $user1->pass;
	?>
</body>
</HTML>