<?php
$producte=array('Disc',2,60.23, 'Storage',1,2,3,4,5,6,7,8); // productes llegits de la BD
/*
Declaració taula i la seva capçalera.
Fins al bucle “for” no cal utilitzar PHP!!!!
*/
echo "<table border='1'><caption>Productes venuts</caption>";
echo "<tr><th>Producte</th><th>Quantitat</th>";
echo "<th>Import unitat</th><th>Familia</th></tr>";
/* Creem la fila on es visualitzaran els articles */
echo "<tr>";
/* Recorregut dels articles. Cal utilitzar llenguatge PHP!! */
for($i=0;$i<count($producte);$i++) 
{		
	if ($i%4==0 && $i!=0) {
		echo "</tr>";
		echo "<tr>";
	}
	echo "<td>".$producte[$i]."</td>";

}
/* Tanquem tags de la fila i de la taula */

echo "</table>";
?>
