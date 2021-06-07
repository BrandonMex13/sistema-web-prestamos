<!-- Inicio insertar -->
<center>
    <h3>Registro de Clientes</h3>
    <form method = "POST" action ="insertar.php" >
        <table>
            <tr>
                <td>Nombre: </td>
                <td><input type="text" name="txtNombre"></td>
            </tr>    

            <tr>
                <td>fecha de registro:</td>
                <td><input type="date" name="txtfecha_registro" value = "<?php date_default_timezone_set('America/Mazatlan'); echo date("Y-m-d"); ?>" readonly="true"></td>
            </tr>

            <input type="hidden" name="oculto" value="1">
            <tr>
                <td><input type="button" value = "Volver" onClick ="history.go(-1);"></td>
                <td><input type="reset" name="" value ="Cancelar"></td>
                <td><input type="submit" value="Registrar cliente"></td>
            </tr>    
        </table>
    </form>
</center>