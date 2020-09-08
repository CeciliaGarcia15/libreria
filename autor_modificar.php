<?php 
include_once("autor_conexion.php");
$obj= new Autor();

if(isset($_POST["cargar"])){
    $resultado=$obj->cargar($_POST["autor_id"]);
    while ($registro=$resultado->fetch_assoc()) {
        
?>
        <fieldset>
            <form action="" method="post" >
            nombre:<input type="text" name="nombre" value=" <?php echo $registro['name'];?>">
            <br>
            apellido: <input type="text" name="apellido" value="<?php echo $registro['surname'];?>"><br>
            Nacionalidad: <input type="text" name="nacionalidad" value="<?php echo $registro['nationality'];?>"><br>
            <input type="hidden" name="id" value=" <?php echo  $registro['author_id']; ?>">
            <input type="submit" value="Modificar" name="modificar">
            </form>
        </fieldset>
        <button><a href="autores.php">volver a autores</a></button>

<?php
    }
}

if(isset($_POST["modificar"])) {
    $nombre=$_POST["nombre"];
    $apellido=$_POST["apellido"];
    $nacionalidad=$_POST["nacionalidad"];
    $id=$_POST["id"];
   require_once("autor_conexion.php");
   $obj=new Autor();
   $obj->modificar_autor($nombre,$apellido,$nacionalidad,$id);
}
