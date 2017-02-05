<?php 
$producte=array('Disc',2,60.23,'Storage',
'Stick usb',5,6,'Storage',
'Monitor',1,140.95, 'Monitor');
echo "<table border='1'><caption>Productes venuts</caption>";
echo "<tr><th>Producte</th><th>Quantitat</th>";
echo "<th>Import unitat</th><th>Familia</th></tr>";
for($i=0;$i<count($producte);$i++)
{
$r=$i%4; //Com que només tenim 4 columnes, quan i sigui 4 s’ha de tancar la fila
if ($r==0) echo "<tr>";
echo "<td>".$producte[$i]."</td>";
if($r==3) echo "</tr>";
}
echo "</table>";
?>