<center>
    <?php
        if(!isset($_POST['oculto'])){
            exit();
        }

        include 'model/conexion.php';
        $nombre = $_POST['txtNombre'];
        $fecha = $_POST['txtfecha_registro'];

        $sentencia = $bd->prepare("INSERT INTO tblclientes(nombres, fecha_registro) VALUES(?,?);");
        $resultado = $sentencia->execute([$nombre, $fecha]);

        if($resultado === TRUE){
            echo "Cliente registrado correctamente";
        }else{
            echo "Ocurrio un error al registrar al cliente";
        }

    ?>

    <br>
    <a href="index.php"><input type="button" value = "Volver"></a>
</center>