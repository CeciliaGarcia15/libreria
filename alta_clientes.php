<fieldset>
<legend>Ingresa un nuevo cliente</legend>
    <form action="" method="post">
    DNI: <input type="number" size="8" name="cliente_id" placeholder ="dni del usuario "><br>
    nombre: <input type="text" name="cliente_nombre" placeholder ="nombre  del autor "><br>
    apellido:<input type="text" name="cliente_apellido" placeholder ="apellido del autor "><br>
    email: <input type="email" name="cliente_email" placeholder =" segun iso 639-1 language "><br>
    cumpleaños:<input type="date" name="cliente_cumpleaños" placeholder ="apellido del autor "><br>
    genero:<input type="text" name="cliente_genero"  size="1" placeholder ="apellido del autor "><br>
    activo:<input type="number" name="cliente_activo" min="0" max="1" size="1" placeholder ="apellido del autor "><br>

    <br><input type="submit" name="insertar" value="Guardar cliente">
    
    </form>

</fieldset>

<button><a href="clientes.php">volver</a></button>
<?php
date_default_timezone_set('America/Argentina/Buenos_Aires');
 if(isset($_POST["insertar"])) {
     $dni=$_POST["cliente_id"];
     $nombre=$_POST["cliente_nombre"];
     $apellido=$_POST["cliente_apellido"];
     $email=$_POST["cliente_email"];
     $cumpleaños=$_POST["cliente_cumpleaños"];
     $genero=$_POST["cliente_genero"];
     $activo=$_POST["cliente_activo"];
     $creacion=date('Y-m-d,H:i;s',time());
    require_once("clientes_conexion.php");
    $obj=new Cliente();
    $obj->alta_cliente($dni,$nombre,$apellido,$email,$cumpleaños,$genero,$activo,$creacion);
 }
?>
