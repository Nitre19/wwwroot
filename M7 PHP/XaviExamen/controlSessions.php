<?php
    $expiracio= 432000; //<<- 5 dias en segundos
    $form = true;
    $nom = "";
    $actualitat = array();
    $moda=false;
    $esports = false;
    $viatges = false;
    $internacionals = false;
    $tecnologia = false;
    if(isset($_COOKIE['nom']) && isset($_COOKIE['email'])){
        $form = false;
        $nom = $_COOKIE['nom'];
        if (isset($_COOKIE['moda'])) {
               $moda=$_COOKIE['moda'];
            }
        if (isset($_COOKIE['esports'])) {
            $esports = $_COOKIE['esports'];
        }
        if (isset($_COOKIE['viatges'])) {
            $viatges = $_COOKIE['viatges'];
        }
        if (isset($_COOKIE['internacionals'])) {
            $internacionals = $_COOKIE['internacionals'];
        }
        if (isset($_COOKIE['tecnologia'])) {
            $tecnologia = $_COOKIE['tecnologia'];
        }
    }else{
        $form= true;
    }
    if(isset($_POST['Enviar'])){
        setcookie('nom',$_POST['nom'],time()+$expiracio);
        setcookie("email",$_POST['email'],time()+$expiracio);
        if (isset($_POST['actualitat'])) {
            $actualitat=$_POST['actualitat'];
            if (in_array('Moda', $actualitat)) {
               $moda=true;
            }
            if (in_array('Esport', $actualitat)) {
                $esports = true;
            }
            if (in_array('Viatges', $actualitat)) {
                $viatges = true;
            }
            if (in_array('internacionals', $actualitat)) {
                $internacionals = true;
            }
            if (in_array('Tecnologia', $actualitat)) {
                $tecnologia = true;
            }
            setcookie('moda',$moda,time()+$expiracio);
            setcookie('esports',$esports,time()+$expiracio);
            setcookie('viatges',$viatges,time()+$expiracio);
            setcookie('internacionals',$internacionals,time()+$expiracio);
            setcookie('tecnologia',$tecnologia,time()+$expiracio);
        }
        header('Location: controlSessions.php');
    }
    if(isset($_POST['LogOut'])){
        setcookie('nom',"",time()-$expiracio);
        setcookie("email","",time()-$expiracio);
        setcookie('moda',$moda,time()-$expiracio);
        setcookie('esports',$esports,time()-$expiracio);
        setcookie('viatges',$viatges,time()-$expiracio);
            setcookie('internacionals',$internacionals,time()-$expiracio);
            setcookie('tecnologia',$tecnologia,time()-$expiracio);
        header('Location: controlSessions.php');
    }

    if($nom!=""){ 
    echo "Hola: $nom";
}
?>
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
            
            <?php
            if($form==true){
             echo "<aside>
             <h1>Formulari d'inscripció</h1>
        <form method='post' enctype='multipart/form-data'>
                <fieldset><legend>Dades indentificatives</legend>
                     <label>Nom:
                        <input type='text' name='nom' required='required' />
                    </label>
                    <label>Email:
                        <input type='email' name='email' required='required' />
                    </label>
                   
                    </fieldset>
                <fieldset><legend>Indica'ns quines són els teus interessos</legend>
                    <label>Quin d'aquests temes de notícies t'interessen més?</label>
                        <p><input type='checkbox' name='actualitat[]' value='Moda'>Moda</input></p>
                        <p><input type='checkbox' name='actualitat[]' value='Esport'>Esport</input></p>
                        <p><input type='checkbox' name='actualitat[]' value='Viatges'>Viatges</input></p>
                        <p><input type='checkbox' name='actualitat[]' value='internacionals'>Notícies internacionals</input></p>
                        <p><input type='checkbox' name='actualitat[]' value='Tecnologia'>Tecnologia</input>
                        </p>
                    
                    <label>A quina d'aquestes xarxes socials estas més actiu?</label>
                        <p><input type='checkbox' name='social[]' value='Facebook'/>Facebook</p>
                        <p><input type='checkbox' name='social[]' value='Twitter'/>Twitter</p>
                        <p><input type='checkbox' name='social[]' value='Instagram'/>Instagram</p>
                        <p><input type='checkbox' name='social[]' value='LinkedIn'/>LinkedIn</p>
                        <p><input type='checkbox' name='social[]' value='Altres'/>Altres
                        Quina? <input type='text' name='quina' /></p>
                    
                    </fieldset>
                    <input type='submit' name='Enviar' value='Enviar'>
        </form>
        </aside>";
    }else{
         echo "<aside>
             <h1>Formulari d'inscripció</h1>
        <form method='post' enctype='multipart/form-data'>
        <input type='submit' name='LogOut' value='LogOut'>
        </form>
        </aside>";
    }
        ?>
        <section>
            <h2>Notícies seleccionades</h2>
                <?php
                if ($moda==true) {                
                    echo "<article>
                        <h3>Moda</h3>
                        <p>Desfile de la moda de </p>
                        <p>Segon paràgraf del primer article amb lletra més petita que el resum ... <a href='http://google.com'>leer mas.</a> </p>  
                    </article>";
                }
                ?>
                <?php
                if($esports == true){
                    echo"<article>
                        <h3>Esport</h3>
                        <p>Partit de lliga de handbol</p>
                        <p>Segon paràgraf del primer article amb lletra més petita que el resum <a href='http://google.com'>leer mas.</a></p>
                    </article>";
                }
                ?>
                <?php
                if($viatges == true){
                    echo"<article>
                        <h3>Viatges</h3>
                         <img src='imatges/worry.jpg'/>
                         <p>Nova agència de viatges per joves</p>
                         <p>Segon paràgraf del segon article amb lletra més petita que el resum <a href='http://google.com'>leer mas.</a></p>
                    </article>";
                }
                ?>
                <?php
                if($internacionals == true){                
                    echo"<article>
                        <h3>Notícies internacionals</h3>
                        <p>Notícies d'altres paísos europeus</p>
                        <p>Segon paràgraf del primer article amb lletra més petita que el resum <a href='http://google.com'>leer mas.</a></p>
                    </article>";
                }
                ?>
                <?php
                if($tecnologia == true){
                    echo"<article>
                        <h3>Tecnologia</h3>
                         <img src='imatges/clock.jpg'/>
                         <p>Text del segon article. Aquest té una imatge al costat</p>
                         <p>Segon paràgraf del segon article amb lletra més petita que el resum...<a href='http://google.com'>leer mas.</a></p>
                    </article>";
                }
                ?>
        </section>    
        </main>

       
        <footer>
            <p>&copy;Notícies personalitzades</p>
        </footer>
    </body>
</html>