<center>
    <?php
        include 'model/conexion.php';
        if(!isset($_POST['oculto'])){
            exit();
        }

        include 'model/conexion.php';
        $nombre = $_POST['txtnombre'];
        $monto = $_POST['txtmonto'];
        $plazos = $_POST['txtplazos'];

        date_default_timezone_set('America/Mazatlan');
        $fecha_prestamo = date("Y-m-d");

        $sentencia = $bd->prepare("INSERT INTO tblprestamos(cliente) SELECT nombres FROM tblclientes WHERE nombres= '$nombre';");
        $resultado = $sentencia->execute([$nombre]);

        //$sentencia = $bd->prepare("INSERT INTO tblprestamos(monto_prestamo) SELECT cantidad FROM tblmontos WHERE cantidad= '$monto' and cliente ='Alex ';");
        //$resultado = $sentencia->execute([$monto]);

        $sentencia = $bd->prepare("UPDATE tblprestamos SET monto_prestamo='$monto' WHERE cliente='$nombre';");
        $resultado = $sentencia->execute([$monto, $nombre]);

        $sentencia = $bd->prepare("UPDATE tblprestamos SET plazos='$plazos' WHERE cliente='$nombre';");
        $resultado = $sentencia->execute([$plazos, $nombre]);

        //fecha del prestamo
        $sentencia = $bd->prepare("UPDATE tblprestamos SET fecha_prestamo='$fecha_prestamo' WHERE cliente='$nombre';");
        $resultado = $sentencia->execute([$fecha_prestamo, $nombre]);

        

        if($resultado === TRUE){
            echo "Prestamo registrado correctamente";
        }else{
            echo "Ocurrio un error al registrar el prestamo";
        }

    ?>

    <br>
    <a href="agregar-prestamos.php"><input type="button" value = "Volver"></a>
</center>