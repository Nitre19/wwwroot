<?php
$languages = array("HTML/CSS","JavaScript", "PHP", "C", "Java");
$count = count($languages);
unset($languages[3]); // Esborrem el contingut de la 4 posició de l’array i quedarà buit.

for ($i=0; $i <$count ; $i++) { 
	if (isset($languages[$i]))
	{
		echo "Valor $i:".$languages[$i]."<br />";
	}
}
?>