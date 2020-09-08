<?php 
include_once("clientes_conexion.php");
$obj= new Cliente();

if(isset($_POST["cargar"])){
    $resultado=$obj->cargar($_POST["cliente_id"]);
    while ($registro=$resultado->fetch_assoc()) {
        
?>
        <fieldset>
            <form action="" method="post" >
            dni:<input type="number" name="dni" value="<?php echo $registro['client_id'];?>">
            nombre: <input type="text" name="cliente_nombre" value="<?php echo $registro['cname'];?>"><br>
            apellido:<input type="text" name="cliente_apellido" value="<?php echo $registro['csurname'];?> "><br>
            email: <input type="text" name="cliente_email" value="<?php echo $registro['email'];?> "><br>
            cumpleaños:<input type="text" name="cliente_cumpleaños" value="<?php echo $registro['birthdate'];?> "><br>
            genero:<input type="text" name="cliente_genero"  size="1" value="<?php echo $registro['gender'];?>"><br>
            activo:<input type="number" name="cliente_activo" min="0" max="1" size="1" value="<?php echo $registro['active'];?>"><br>
            
            <input type="submit" value="Modificar" name="modificar">
            </form>
        </fieldset>
        

<?php
    }
}
date_default_timezone_set('America/Argentina/Buenos_Aires');
if(isset($_POST["modificar"])) {
    $nombre=$_POST["cliente_nombre"];
    $apellido=$_POST["cliente_apellido"];
    $email=$_POST["cliente_email"];
    $cumpleaños=$_POST["cliente_cumpleaños"];
    $genero=$_POST["cliente_genero"];
    $activo=$_POST["cliente_activo"];
    $dni=$_POST["dni"];
    $update=date('Y-m-d,H:i;s',time());
   require_once("clientes_conexion.php");
   $obj=new Cliente();
   $obj->modificar_cliente($dni,$nombre,$apellido,$email,$cumpleaños,$genero,$activo,$update);

}
?>
 <button><a href="clientes.php">volver a clientes</a></button>