<?php
 
/*
Fitxer cookie.php
 
Fitxer que guarda les dades a les cookies 
 
Arguments (POST): procedents del formulari d'index.php
- nom: nom de l'usuari
- idioma: idioma predeterminat
 
*/
$TITOL = "Acces";
$ESTIL = "estils.css";
 
include("cap.php");
 
 
//Mirem si estem accedint des del formulari (i no directament)
if(!isset($_POST["nom"]) || !isset($_POST["idioma"]))
{
printf('<div class="login">Has de passar abans per la pantalla de login</div>');
}
else
{ 
 
 
//Podeu descomentar aquest bucle per veure tot el contingut de POST que us arriba a la pàgina	
/*	
$var = "";
 
foreach($_POST as $key => $value)
{
$var .= "POST[" . $key . "]= " . $value . "<br>";
//$var = $var . "POST[" . $key . "]= " . $value . "<br>";
 
}
echo $var;
*/
 
///////////////
//  COOKIES  //
///////////////
 
//Fiquem el nom i la llengua a les cookies	
$expiracio = 3600; //data d'expiració del cookie, 1 hora
setcookie("nom",$_POST["nom"],time()+$expiracio);//establim cookie
setcookie("idioma",$_POST["idioma"],time()+$expiracio);
 
$missatge = "Valors emmagatzemats a les cookies<br> nom=".$_POST['nom'].", idioma=".$_POST['idioma'];

 echo $missatge;
 
}
 
?>
