<?php
$alumnes=array('Anna',array('php','c','javaScript'),
'Joan',array('php','c'));
echo "<table border='1'><caption>Llenguatges alumne</caption>";
echo "<tr><th>Alumne</th><th>Llenguatges</th></tr>";
for($i=0;$i<count($alumnes);$i++)
{
if ($i%2==0) echo "<tr><td>".$alumnes[$i]."</td>";
else
{
for($j=0;$j<count($alumnes[$i]);$j++)
if ($j==0) $l=$alumnes[$i][$j];
else $l .= " , ".$alumnes[$i][$j];
echo "<td>$l</td></tr>";
} // Tanca else
} // Tanca el primer for
echo "</table>";
?>