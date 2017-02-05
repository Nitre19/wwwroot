<?php
// Si un alumne no sap cap llenguatge inicialitzem els llenguatges
// amb l’expressió array('')
// Array de prova
$alumnes=array('Anna',array('php','c','javaScript'),
'Joan',array('php','c'),'Pere',array(''),
'Maria',array('php','c','javaScript'));
// Elimino elements per a provar el funcionament
unset($alumnes[1][1]);
unset($alumnes[7][0]);
echo "<table border='1'><caption>Llenguatges alumne</caption>";
echo "<tr><th>Alumne</th><th>Llenguatges</th></tr>";
foreach($alumnes as $key=>$values)
{
// Quan l’índex és múltiple de 2 es tracta del nom de l’alumne
if ($key%2==0) echo "<tr><td>$values</td>";
else
{ $j=0;
foreach($values as $lleng)
if ($j==0)
{
$l=$lleng; // no podem utilitzar l'index per a fer la
// comparació (possible unset del primer llenguatge!)
$j++;
}
else $l .= " , ".$lleng;
echo "<td>$l</td></tr>";
}
}
echo "</table>";
?>