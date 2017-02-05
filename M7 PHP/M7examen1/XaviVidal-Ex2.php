<!DOCTYPE html>
<html>
<head>
<title>Registre usuari</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<style type="text/css">
table {
	text-align: right;
	border: solid 1px;
}
td {
	padding: 5px;
}
</style>
</head>
<body>
	<?php
$taula = array(1,2,3,4,5,6,7,8,9);
$multiplicaper = array(1,2,3,4,5,6,7,8,9,10);

echo "<table";
echo "<tr><td>";
echo "<table>";
echo "<tr>";

for ($i=0; $i <count($taula) ; $i++) { 
	echo "<td>";
	for ($j=0; $j <count($multiplicaper) ; $j++) { 
		echo "$taula[$i] x $multiplicaper[$j] =". $taula[$i]*$multiplicaper[$j]."</br>";
	}
	echo "</td>";
}
echo "</tr>";
echo "</table>";
echo "</td></tr>";
echo "</table>";
?>
</body>
</html>

