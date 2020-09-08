<?php 
include_once("transacciones_conexion.php");
$obj= new Transaccion();
$resultado1=$obj->clientes();
$resultado2=$obj->libros();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar la operación</title>
</head>
<body>

<?php

if(isset($_POST["cargar"])){
    $resultado=$obj->cargar($_POST["transaction_id"]);
    while ($registro=$resultado->fetch_assoc()) {
        
?>


    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post">
    cliente: <select name="cliente">
   <?php 
        while ($datos=$resultado1->fetch_array())
        {
        ?>
        <option value="<?php echo $datos["client_id"]?>"><?php echo $datos["cname"]." ".$datos["csurname"]?></option>
        <?php     
        }
    ?>
    </select>
    libro: 
    <select name="libro">
    <?php 
        while ($respuesta=$resultado2->fetch_array())
        {
        ?>
        <option value="<?php echo $respuesta["book_id"]?>"><?php echo $respuesta["title"]?></option>
        <?php     
        }
    ?>
  
    </select> <br>
    <br>cantidad:<input type="number" name="cantidad" placeholder="ingrese la cantidad deseada" value="<?php echo $registro['book_quantity'] ?>"><br>
    
    <label>estado:</label>   
    <select name="estado">
        <option value="prestado">prestamo</option>
        <option value="devuelto">devolucion</option>
    </select>
    <input type="hidden" name="id" value="<?php echo  $registro['transaction_id'];?>">
    <br><input type="submit" name="modificar" value="modificar transaccion">
    
    </form>





<?php
}
}
date_default_timezone_set('America/Argentina/Buenos_Aires');
 if(isset($_POST["modificar"])) {
    $id=$_POST["id"];
    $cliente=$_POST["cliente"];
    $libro=$_POST["libro"];
    $estado=$_POST["estado"];
    $cantidad=$_POST["cantidad"];
    $update=date('Y-m-d,H:i;s',time());
    $obj->modificar_transaccion($id,$libro,$cliente,$estado,$cantidad,$update);
 }

?>
<button><a href="transacciones.php">Todas las transacciones</a></button>
</body>
</html>