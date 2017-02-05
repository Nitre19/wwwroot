<?php
 
/*
Fitxer index.php  Fitxer d'inici

*/

//Arguments per la capçalera header. Aquestes variables seran visibles
//des de cap.php
$TITOL = "cookie";
$ESTIL = "estils.css";

include("cap.php");
?>
 
<!-- Formulari d'entrada -->
<div class="login">
 
<form action="cookie.php"  method="POST" name="entrada">
 
<table>
 
<tr>
		<td align="right">Nom</td>
      <td align="left">  <input type="text" name="nom" size="15" maxlength="15" /> </td>
	</tr>
 
<tr>
 
<td align="right">Llengua</td>
  	<td align="left">  
	<select name="idioma">
		<option>
 				Anglès
 			</option>     
 			<option>
 				Francès
 			</option>       
		<option selected="selected">
 				Català
 			</option>            
		<option>
 				Castellà
 			</option>            
      			</select>
     	</td>
</tr>
 
<tr>
<td></td>
<td colspan="2" align="center">
	<input type="submit" value="Enviar">  <INPUT type="reset" value="Esborrar" >
</td>
 
</tr>
 
</table>
 
 
 
</form>
 
</div>
 </body>
</html>
