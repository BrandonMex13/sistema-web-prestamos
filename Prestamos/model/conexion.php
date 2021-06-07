<?php
    $nombrebd = 'bdprestamos';
    $usuario = 'root';
    $contrasena = '';

    try
    {
        $bd = new PDO('mysql:host=localhost;
        dbname=' .$nombrebd,
                    $usuario,
                    $contrasena
                );
    }
    catch(Exeption $e)
    {
        echo "Error de coneccion " .$e->getMessage();
    }
?>