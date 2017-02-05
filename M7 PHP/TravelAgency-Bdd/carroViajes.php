<?php
    include "catalogoViajes.php";

    session_start();

    $i=0;
    $trobat=0;

    // PUT THE PRODUCT TO THE SESSION; OR JUST THE ID OF THE PRODUCT

    if (isset($_GET['id']) && (isset($_GET['todo']))) 
    {
        $todo = $_GET['todo'];
        $id = $_GET['id'];
        $sessionCart = array();

        if (isset($_SESSION['cart'])) 
        {
            $sessionCart = $_SESSION['cart'];
        }

        if ($todo == 'add') 
        {
            //Comprobamos si el viaje ya está en el CARRITO o no

            while ($i<(count($sessionCart)) && $trobat==0)
            {
                if($sessionCart[$i] == $id) $trobat=1;
                else $i++;
            }

            // Si no está lo añadimos, si está mostramos mensaje de viaje repetido
            if ($trobat==0)
            {
                $sessionCart[] = $id; 
                $viaje = $viajes[$id];             
                echo "Viaje a $viaje añadido al CARRITO <br/> \n";
            }
            else
            {
                $viaje = $viajes[$id];
                echo "Viaje $viaje ya estaba en tu CARRITO";
            }

        } else if ($todo == 'remove')
                {
                    $sessionCart = array_diff($sessionCart, array($id));
                    //  http://stackoverflow.com/questions/7225070/php-array-delete-by-value-not-key
                    $viaje = $viajes[$id];
                    echo "Viaje a $viaje CANCELADO <br/> \n";

                } else {}
        $_SESSION['cart'] = $sessionCart;
    }

    //var_dump($sessionCart);
?>

<h1>Tus viajes</h1>
<?php

    // Si hay algo en el carrito entra, sino no
    if (isset($_SESSION['cart'])) 
    {
        if (isset($_SESSION['cart'])) 
        {
            $sessionCart = $_SESSION['cart'];
        }

        $items=array();
        
        foreach ($sessionCart as $id) 
        {
            if (isset($viajes[$id])) 
            {
                //To simplify, if products are repeated in the cart they are ignored.
                $items[$id] = $viajes[$id];
            }
        }

        foreach ($items as $id => $viaje) 
        {
            echo $id .".- " . $viaje . " <a href='carroViajes.php?todo=remove&id=".$id."'>Eliminar</a><br>";
        }
    }
    else echo "No tienes ningún viaje en el carrito :( <br>";
?>

<br><a href='Travel_Agency.php'>Volver a los viajes</a></br>