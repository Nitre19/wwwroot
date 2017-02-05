<?php
// Array de proves
$languages = array("HTML/CSS", "JavaScript", "PHP", "C", "Java");
unset($languages[3]);
// llistat elements inicialitzats array
$j=0;
echo "<table border='1'>
<caption>Llenguatges</caption>
<tr><th>Nom</th></tr>";
for($i=0;$i<count($languages);) // No sempre incrementa i !!
if (!isset($languages[$i+$j])) $j++;
else
{
echo "<tr><td>".$languages[$i+$j]."</td></tr>";
$i++;
}
echo "</table>";
?>