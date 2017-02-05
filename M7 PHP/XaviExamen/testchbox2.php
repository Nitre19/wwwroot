<form method="post" name="prueba_checkbox">
           <table width="50%" border="1" cellspacing="0" cellpadding="1">
           <tr>
             <td width="40%" align="left" valign="top">Su nombre:</td>
             <td width="60%"><label for="nombre"></label>
               <input type="text" name="nombre" id="nombre" /></td>
           </tr>
           <tr>
               
             <td align="left" valign="top">¿Deportes favoritos?</td>
             <td>
                 futbol <input name="checkbox[]" type="checkbox" id="checkbox" value="futbol" /><br>
                 tenis <input  name="checkbox[]" type="checkbox" id="checkbox" value="tenis" /><br>
                 baloncesto <input name="checkbox[]" type="checkbox" id="checkbox" value="baloncesto" /><br>
                 atletismo <input name="checkbox[]" type="checkbox" id="checkbox" value="atletismo" /><br>
             </td>
           </tr>
           <tr>
             <td align="left" valign="top">&nbsp;</td>
             <td><input type="submit" name="enviar" id="button" value="Enviar" /></td>
           </tr>
         </table>
</form>

<?php
 
  $servername = "localhost";
  $username = "root";
  $passsword = "root";
  $bddname = "ex1_json";    // Nombre de la BDD

  $connexio = mysqli_connect($servername, $username, $passsword);

$checkbox = array();
$futbol=0;
$tenis=0;
$baloncesto=0;
$atletismo=0;
  if (!$connexio) exit('No se puede conectar:'. mysql_error());
  else echo "<p>Conexión correcta!</p>";

  if(!mysqli_select_db($connexio,$bddname)) exit("Error al connectar con la base de datos". mysqli_connect_error());
  else
  {
    if(isset($_POST['enviar']))
    {
      if (!empty($_POST['nombre'])) 
      {
        $nombre=$_POST['nombre'];
        if(isset($_POST['checkbox'] ))
        {
          $checkbox=$_POST['checkbox'];
          if (in_array("futbol", $checkbox)) {
            $futbol=1;
          }
          if (in_array("tenis", $checkbox)) {
            $tenis=1;
          }
          if (in_array("baloncesto", $checkbox)) {
            $baloncesto=1;
          }
          if (in_array("atletismo", $checkbox)) {
            $atletismo=1;
          }
          echo "aaaaaaaaaaaaaaaaa";
          $sql="insert into prueba2 values ('$nombre',$futbol,$tenis,$baloncesto,$atletismo)"; // meto la variable $value que ira cambiando
          mysqli_query($connexio, $sql);
        }
        else
        {
          echo "Selecciona almenos un deporte!";
            $sql="insert into prueba2 values ('$nombre',$futbol,$tenis,$baloncesto,$atletismo)"; 
          mysqli_query($connexio, $sql);
        } 
      }  
    }
  }
?>
