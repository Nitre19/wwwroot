
<!DOCTYPE html> <!-- Document de tipus HTML5 -->
<html xmlns="http://www.w3.org/1999/xhtml"> 
	<head>	 
        <link rel="stylesheet" type="text/css" href="estils/controlSessions.css" />
		<title>Estils</title> 
		<meta charset="UTF-8"/>

	</head> 
	<body>
        <header>
          
            <h1>Registra't a la associació per estar informat/da de tot el que fem</h1>
           
       
            <nav>
                <p>
                <a href="http://google.com">Google</a>
                <a href="mailto://info@empresa.com">Contacte</a>
                <a href="http://empresa.com/catalog.pdf">Cataleg</a>
                </p>
            </nav>
         </header>
        <main>

           
             <aside>
            
            <?php


            $nom='';
            $email='';
            $temes=array();

            if (isset($_POST['Enviar']) ) {
                //Encara que hi hagi cookies, si torna a enviar el formulari, es sobreescriuen.
                //Recuperem els valors de les cookies per omplir el formulari per si el vol modificar
             
                $temes=$_POST['actualitat'];
                //echo "Nº temes:" .count($temes);
                //var_dump($temes);

                unset($_COOKIE);
                foreach ($temes as $act)
                {
                	setcookie($act,$act,time()+432000);                    
                }
                $email=$_POST['email'];
                $nom=$_POST['nom'];
                

                setcookie('usu',$email,time()+432000);
                setcookie('nom',$nom,time()+432000);
            }
            else if (isset($_COOKIE['usu']) )
            { //recuperem les cookies
                //echo "Recuperem les cookies";


                    $email=$_COOKIE['usu'];
                    $nom=$_COOKIE['nom'];
                    //Abans d'omplir, cal buidar les cookies 
                    setcookie('Moda','0',time()-432000);
                    setcookie('Esport','0',time()-432000);
                    setcookie('Viatges','0',time()-432000);
                    //etc.

                    if (isset ($_COOKIE['Moda']))
                        array_push($temes,$_COOKIE['Moda']);
                    if (isset($_COOKIE['Esport']))
                        array_push($temes,$_COOKIE['Esport']);
                    if (isset($_COOKIE['Viatges']))
                        array_push($temes,$_COOKIE['Viatges']);

                  
                    //etc.
            }

            
            
                //Si no està identificat o han caducat les cookies només es mostra el formulari i no es mostren les noticies

            
            ?>


            <h1>Formulari d'inscripció</h1>
            <form method="post" action="" enctype="multipart/form-data">

            <?php 
             // var_dump($temes);
            if ((isset($_POST['Enviar']) || !isset($_POST['Logout'])) ) {
                ?>
                <input type="submit" name="Logout" value="Logout">
             <?php
            }
            else if (!isset($_COOKIE['usu']) || isset($_POST['Logout'])) {
                
            ?>
                <fieldset><legend>Dades indentificatives</legend>
                    <label>Nom:
                        <input type="text" name="nom" required="required"  <?php if($nom!='') echo "value=$nom"; ?> />
                    </label>
                    <label>Email:
                        <input type="email" name="email" required="required"  <?php if($email!='') echo "value=$email"; ?> />
                    </label>
                  
                    </fieldset>
                <fieldset><legend>Indica'ns quines són els teus interessos</legend>
                    <label>Quin d'aquests temes de notícies t'interessen més?</label>
                        <p><input type="checkbox" name="actualitat[]" value="Moda" <?php if( in_array("Moda",$temes)) { echo "checked='true'"; } ?> >Moda</input></p>
                        <p><input type="checkbox" name="actualitat[]" value="Esport" <?php if( in_array("Esport",$temes)) { echo "checked='true'"; } ?> >Esport</input></p>
                        <p><input type="checkbox" name="actualitat[]" value="Viatges">Viatges</input></p>
                        <p><input type="checkbox" name="actualitat[]" value="internacionals">Notícies internacionals</input></p>
                        <p><input type="checkbox" name="actualitat[]" value="Tecnologia">Tecnologia</input>
                        </p>
                    
                    <label>A quina d'aquestes xarxes socials estas més actiu?</label>
                        <p><input type="checkbox" name="social[]" value="Facebook"/>Facebook</p>
                        <p><input type="checkbox" name="social[]" value="Twitter"/>Twitter</p>
                        <p><input type="checkbox" name="social[]" value="Instagram"/>Instagram</p>
                        <p><input type="checkbox" name="social[]" value="LinkedIn"/>LinkedIn</p>
                        <p><input type="checkbox" name="social[]" value="Altres"/>Altres
                        Quina? <input type="text" name="quina" /></p>
                    
                    </fieldset>
                    <input type="submit" name="Enviar" value="Enviar">
           
            <?php
            }
            else
            {
                echo $_COOKIE['usu'] . $_COOKIE['nom'];
            }
            ?>
             </form>
        </aside>
        <section>
            <?php
            
            if($nom != '')
            {
             echo "<p>Hola ". $nom."</p>" ; 
            }
             ?>
            <h2>Notícies seleccionades</h2>

 
                <?php if( in_array("Moda",$temes)) {
                    ?>
                <article>
                    <h3>Moda</h3>
                    <p>Desfile de la moda de </p>
                    <p>Segon paràgraf del primer article amb lletra més petita que el resum ... <a href="http://google.com">leer mas.</a> </p>
                    
                   
                </article>
                <?php
                }
                ?>

                <?php if( in_array("Esport",$temes)) {
                    ?>
                <article>
                    <h3>Esport</h3>
                    <p>Partit de lliga de handbol</p>
                    <p>Segon paràgraf del primer article amb lletra més petita que el resum <a href="http://google.com">leer mas.</a></p>
                </article>
                <?php
                }
                ?>
                <?php if( in_array("Viatges",$temes)) {
                    ?>
                <article>
                    <h3>Viatges</h3>
                     <img src="imatges/worry.jpg"/>
                     <p>Nova agència de viatges per joves</p>
                     <p>Segon paràgraf del segon article amb lletra més petita que el resum <a href="http://google.com">leer mas.</a></p>
                </article>
                <?php
                }
                ?>
                <?php if( in_array("internacionals",$temes)) {
                    ?>
                <article>
                    <h3>Notícies internacionals</h3>
                    <p>Notícies d'altres paísos europeus</p>
                    <p>Segon paràgraf del primer article amb lletra més petita que el resum <a href="http://google.com">leer mas.</a></p>

                </article>
                 <?php
                }
                ?>
                <?php if( in_array("Tecnologia",$temes)) {
                    ?>
                <article>
                    <h3>Tecnologia</h3>
                     <img src="imatges/clock.jpg"/>
                     <p>Text del segon article. Aquest té una imatge al costat</p>
                     <p>Segon paràgraf del segon article amb lletra més petita que el resum...<a href="http://google.com">leer mas.</a></p>
                </article>
                <?php
                }
                ?>

            <?php
            //}
            ?>
            </section>
            
        </main>

       
        <footer>
            <p>&copy;Notícies personalitzades</p>
        </footer>
    </body>
</html>