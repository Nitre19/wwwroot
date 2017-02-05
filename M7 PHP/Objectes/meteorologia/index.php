<?php
	include 'class/ClPrediccio.php';
	include 'class/ClImatges.php';
?>
<!--http://api.openweathermap.org/data/2.5/weather?q=London&mode=json&appid=83d8295832fc23ce7d4f9d6f5d938228-->
<!-- TODO:
	- Intentar Recuperar Cookie
		-Mostrar datos segun la cookie
-->

<?php
$apiCode = "83d8295832fc23ce7d4f9d6f5d938228";
#Haceder a la web i obtner el objeto JSon
$infoObtinguda = file_get_contents("http://api.openweathermap.org/data/2.5/weather?q=London&mode=json&appid=83d8295832fc23ce7d4f9d6f5d938228");

#no entra dintre dels objectes
#var_dump(json_decode($infoObtinguda));

#Entra dintre dels objectes
var_dump(json_decode($infoObtinguda, true));
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php
	
?>
</body>
</html>