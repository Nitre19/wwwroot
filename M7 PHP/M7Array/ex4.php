<?php
$languages = array("HTML/CSS", "JavaScript", "PHP", "C", "Java");
unset($languages[3]);
echo "<table border='1'>
<caption>Llenguatges</caption><tr><th>Nom</th></tr>";
foreach($languages as $value) echo "<tr><td>$value</td></tr>";
echo "</table>";
?>