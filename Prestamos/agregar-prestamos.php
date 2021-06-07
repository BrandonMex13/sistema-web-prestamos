<?php
    include 'model/conexion.php';
    $tablaclientes = $bd->query("SELECT * FROM tblclientes;");
    $clientes = $tablaclientes->fetchAll(PDO::FETCH_OBJ);

    $tablamontos = $bd->query("SELECT * FROM tblmontos;");
    $montos = $tablamontos->fetchAll(PDO::FETCH_OBJ);

    $tablaplazos = $bd->query("SELECT * FROM tblplazos;");
    $plazos = $tablaplazos->fetchAll(PDO::FETCH_OBJ);
?>

<center>
    <h3>Agregar prestamos</h3>
    <form method = "POST" action = "ingresar-prestamo.php">
        <h4>Cliente</h4>
        <select name = "txtnombre">
                <?php
                    foreach($clientes as $datos){
                        ?>
                        <option value = "<?php echo $datos->nombres ?>"><?php echo $datos->nombres ?></option>
                        <?php
                    }
                    ?>

            
            
        </select>

        <h4>Monto</h4>
        <select name="txtmonto">
            <?php 
                foreach($montos as $datos){
                    ?>
                    <option value="<?php echo $datos->cantidad ?>">$<?php echo $datos->cantidad ?></option>
                    <?php
                }
                ?>
        </select>

        <h4>Plazos(Quincenales)</h4>
        <select name="txtplazos">
            <?php
                foreach($plazos as $datos){
                    ?>
                    <option value ="<?php echo $datos->num_plazos ?>"><?php echo $datos->num_plazos ?> Quincenas</option>
                    <?php
                }
            ?>
        </select>
        <input type="hidden" name="oculto" value="1">

        <br>
        <br>
        <a href="registro-prestamos.php"><input type="button" value = "Volver"></a>
        <!--<input type="button" value = "Volver" onClick ="history.go(-1);">-->
        <input type="reset" name="" value ="Cancelar">
        <input type="submit" value="Ingresar prestamo">
        
    </form>
</center>