<?php
    include 'model/conexion.php';
    $tablaclientes = $bd->query("SELECT * FROM tblclientes;");
    $clientes = $tablaclientes->fetchAll(PDO::FETCH_OBJ);

    $tablaprestamos = $bd->query("SELECT * FROM tblprestamos");
    $prestamos = $tablaprestamos->fetchAll(PDO::FETCH_OBJ);

    $sentencia_nombre = $bd->query("SELECT cliente FROM tblprestamos");
    $sentencia_nombre->execute();
    $nombre_cliente = $sentencia_nombre->fetchColumn();

?>

<center>

    <form action="" method="GET">
        <h4>Cliente: </h4>
        <input type="text" name="busqueda">
        <input type="submit" name="enviar" value ="Buscar">
    </form>

    <?php

    if(isset($_GET['enviar'])){
        $buscar = $_GET['busqueda'];
        $consulta_tabla = $bd->query("SELECT * FROM tblprestamos WHERE cliente='$buscar'");
        $consulta = $consulta_tabla->fetchAll(PDO::FETCH_OBJ);
        ?>
        
        <table align = "center">

        <tr>
            <td>Cliente</td>
            <td>Monto del préstamo</td>
            <td>Plazos</td>
            <td>Acciones</td>
        </tr>

        <?php
        foreach($consulta as $datos){
            ?>
            <tr>
                <td><?php echo $datos->cliente ?></td>
                <td>$<?php echo $datos->monto_prestamo ?></td>
                <td><?php echo $datos->plazos ?></td>

                <form method="POST" action="tabla-amortizacion.php">
                <td><button type="submit" value ="<?php echo $datos->idprestamo ?>" name ="id_prestamo_amortizacion"><img src="img/icono-acciones.png" width="15" height="15"></button></td>
                <!--<td><input type="image" value ="<?php echo $datos->idprestamo ?>" name ="id_prestamo_amortizacion" src="img/icono-acciones.png" width="15" height="15"></td>-->
                </form>
                
            </tr>
            <?php
        }
    ?>

        <tr>
            <td><a href="index.php"><input type="button" value = "Volver"></a></td>
            <td><button><a href = "agregar-prestamos.php">Agregar prestamos</a></button></td>
        </tr>
    </table>


        <?php
    }else{
        //echo "VACIO";
        ?>

        <table align = "center">

            <tr>
                <td>Cliente</td>
                <td>Monto del préstamo</td>
                <td>Plazos</td>
                <td>Acciones</td>
            </tr>

            <?php
            foreach($prestamos as $datos){
                ?>
                <tr>
                    <td><?php echo $datos->cliente ?></td>
                    <td>$<?php echo $datos->monto_prestamo ?></td>
                    <td><?php echo $datos->plazos ?></td>

                    <form method="POST" action="tabla-amortizacion.php">
                    <td><button type="submit" value ="<?php echo $datos->idprestamo ?>" name ="id_prestamo_amortizacion"><img src="img/icono-acciones.png" width="15" height="15"></button></td>
                    <!--<td><input type="image" value ="<?php echo $datos->idprestamo ?>" name ="id_prestamo_amortizacion" src="img/icono-acciones.png" width="15" height="15"></td>-->
                    </form>
                    
                </tr>
                <?php
            }
        ?>

            <tr>
                <td><a href="index.php"><input type="button" value = "Volver"></a></td>
                <td><button><a href = "agregar-prestamos.php">Agregar prestamos</a></button></td>
            </tr>
        </table>

        <?php
    }


    ?>



</center>