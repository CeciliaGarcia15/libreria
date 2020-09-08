<fieldset>
<legend>Ingresa un nuevo Autor</legend>
    <form action="" method="post">
    nombre: <input type="text" name="autor_nombre" placeholder ="nombre  del autor "><br>
    apellido <input type="text" name="autor_apellido" placeholder ="apellido del autor "><br>
    nacionalidad <input type="text" name="autor_nacionalidad" placeholder =" segun iso 639-1 language "><br>
    <br><input type="submit" name="insertar" value="Guardar Autor">
    
    </form>

</fieldset>

<button><a href="autores.php">volver</a></button>
<?php
 if(isset($_POST["insertar"])) {
     $nombre=$_POST["autor_nombre"];
     $apellido=$_POST["autor_apellido"];
     $nacionalidad=$_POST["autor_nacionalidad"];
    require_once("autor_conexion.php");
    $obj=new Autor();
    $obj->alta_autor($nombre,$apellido,$nacionalidad);
    
 }
?>



