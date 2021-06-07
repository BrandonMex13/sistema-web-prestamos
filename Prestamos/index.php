<?php
    include 'model/conexion.php';
    $tablaclientes = $bd->query("SELECT * FROM tblclientes;");
    $clientes = $tablaclientes->fetchAll(PDO::FETCH_OBJ);
    //print_r($clientes);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema Prestamos</title>
</head>
<body>
    <center>
        <h3>Catalogo de clientes</h3>

        <table>
            <tr>
                <td>Id</td>
                <td>Nombre</td>
                <td>Fecha de registro</td>
            </tr>

            <?php
                foreach ($clientes as $dato){
                    ?>
                    <tr>
                        <td><?php echo $dato->idclientes ?></td>
                        <td><?php echo $dato->nombres ?></td>
                        <td><?php echo $dato->fecha_registro ?></td>
                    </tr>

                    <?php
                }
                ?>
        </table>

        <button><a href = "registro-prestamos.php">Registro de prestamos</a></button>
        <!--<button><a href = "agregar-prestamos.php">Agregar prestamos</a></button>-->
        <button><a href = "registroclientes.php">Registrar cliente</a></button>
        
    </center>


</body>
</html>