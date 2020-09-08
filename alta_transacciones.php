<?php
 require_once("transacciones_conexion.php");
 $obj=new Transaccion();
 $resultado=$obj->clientes();
$resultado2=$obj->libros();

?>

<fieldset>
<legend>Ingresa un nuevo cliente</legend>
    <form action="" method="post">
    cliente: <select name="cliente">
   <?php 
        while ($datos=$resultado->fetch_array())
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
    <br>cantidad:<input type="number" name="cantidad" placeholder="ingrese la cantidad deseada"><br>
    estado:
    <select name="estado">
    <option value="prestado">
    prestamo
    </option>
    <option value="devuelto">
    devolucion
    </option>
    </select>
    
    <br><input type="submit" name="insertar" value="Guardar transaccion">
    
    </form>

</fieldset>

<button><a href="transacciones.php">volver</a></button>
<?php
date_default_timezone_set('America/Argentina/Buenos_Aires');
 if(isset($_POST["insertar"])) {
     $cliente=$_POST["cliente"];
     $libro=$_POST["libro"];
     $estado=$_POST["estado"];
     $cantidad=$_POST["cantidad"];
     $creacion=date('Y-m-d,H:i;s',time());
    $obj->alta_transaccion($libro,$cliente,$estado,$cantidad,$creacion);
 }
?>