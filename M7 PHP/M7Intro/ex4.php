<?php
$languages = array("HTML/CSS", "JavaScript", "PHP", "C", "Java");
$count = count($languages);
unset($languages[3]);
echo "<table border='1'>
<caption>Llenguatges</caption>
<tr><th>Pos</th><th>Nom</th></tr>";
$j=0;
foreach($languages as $value) {
	$j++;
	if (isset($languages[$j]))
		{
			echo "<tr><td>$j</td><td>$value</td></tr>";
		}
}
echo "</table>";
?>