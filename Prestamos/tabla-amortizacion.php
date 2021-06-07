<center>
    <?php
        include 'model/conexion.php';
        $idamortizacion = $_POST['id_prestamo_amortizacion'];

        $tablaamortizacion = $bd->query("SELECT * FROM tblprestamos WHERE idprestamo='$idamortizacion'");
        $tablaamortizacion->execute();
        //$tablaamortizacion->execute();
        $amortizacion = $tablaamortizacion->fetchAll(PDO::FETCH_OBJ);

        //$sentencia = $bd->query("SELECT plazos FROM tblprestamos WHERE idprestamo='$idamortizacion'");
        //$contador = $sentencia->fetchColumn(PDO::FETCH_OBJ);
        //echo $sentencia;
        //echo $idamortizacion;
        //echo $contador;

        $sentencia = $bd->prepare("SELECT plazos FROM tblprestamos WHERE idprestamo='$idamortizacion'");
        $sentencia->execute();
        $contador = $sentencia->fetchColumn();
        //echo $contador;

        $sentencia_prestamo = $bd->query("SELECT monto_prestamo FROM tblprestamos WHERE idprestamo='$idamortizacion'");
        $sentencia_prestamo->execute();
        $prestamo = $sentencia_prestamo->fetchColumn();
        //echo $prestamo;

        $sentencia_fecha = $bd->query("SELECT fecha_prestamo FROM tblprestamos WHERE idprestamo='$idamortizacion'");
        $sentencia_fecha->execute();
        $fecha = $sentencia_fecha->fetchColumn();
        //echo date("d-m-Y",strtotime($fecha."+ 15 days"));

        $sentencia_nombre = $bd->query("SELECT cliente FROM tblprestamos WHERE idprestamo='$idamortizacion'");
        $sentencia_nombre->execute();
        $nombre_cliente = $sentencia_nombre->fetchColumn();

        $interes = ($prestamo/$contador)*0.10;
        $abono = $prestamo/$contador + $interes;
    ?>

    <h3>Tabla de Amortizacion</h3>
    <h5>Cliente: <?php echo $nombre_cliente ?></h5>
    <h5>No. Pago <?php echo $contador ?></h5>
    <table>
        <tr>
            <td>No. Pago</td>
            <td>Fecha</td>
            <td>Préstamo</td>
            <td>Interés(10%)</td>
            <td>Abono</td>
        </tr>

        <?php 
            for($a = 1; $a <= $contador; $a++){
                ?>

                <tr>
                    <td><?php echo $a ?></td>
                    <td><?php echo $fecha ?></td>
                    <td>$<?php echo $prestamo/$contador ?></td>
                    <td>$<?php echo $interes ?></td>
                    <td>$<?php echo $abono ?></td>
                </tr>

                <?php
                $fecha = date("Y-m-d",strtotime($fecha."+ 15 days"));
            }
        ?>

        <tr>
            <td></td>
            <td>Totales: </td>
            <td>$<?php echo $prestamo ?></td>
            <td>$<?php echo $interes*$contador ?></td>
            <td>$<?php echo $abono*$contador ?></td>
        </tr>

        <tr>
            <td><a href="registro-prestamos.php"><input type="button" value = "Volver"></a></td>
            <td></td>
        </tr>

    </table>
</center>