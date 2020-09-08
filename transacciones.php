<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="Semantic-UI-CSS-master/semantic.min.css">

    <title>Transacciones</title>
</head>
<body>
    <div class="ui teal secondary  menu">
  <a href="index.php"  class="item">
    Inicio
  </a>
  <a href="clientes.php" class="item">
    Clientes
  </a>
  <a href="transacciones.php" class="item">
    Transacciones
  </a>
  <a href="libros.php" class="item">
    Libros
  </a>
  <a href="autores.php" class="item">
    Autores
  </a>
  <a href="generos.php" class="item">
    Generos
  </a>
</div>

    <h1>Informacion Disponible de todas las transacciones</h1>
    <a href="alta_transacciones.php" class="ui primary button" >Nuevas transacciones</a><br><br><br>
    <?php
//----------------CONEXION A LA BASE DE DATOS-----------------------------------------

        require_once("transacciones_conexion.php");
        $obj= new Transaccion();
        
//-------------------CONSULTA A LA BASE DE DATOS------------------------------------------------------

        $resultado=$obj->index_transaccion();

//-----------------TABLA DE AUTORES-------------------------------------------------------------------------------------------------------------------------

        echo "<table id='tablaContacto' class='ui very basic table'>";
        echo "<tr>";
        echo "<td class='encabezado'>cliente</td>";
        echo "<td class='encabezado'>libro</td>";
        echo "<td class='encabezado'>cantidad</td>";
        echo "<td class='encabezado'>tipo</td>";
        echo "<td class='encabezado'>fecha de creacion</td>";
        echo "<td class='encabezado'>modificado</td>";
        echo "<td class='encabezado'>Modificar</td>";
        echo "</tr>";
    while ($registro=$resultado->fetch_assoc()) {
        echo"<tr>";
        echo"<td>".$registro["cname"]." ".$registro["csurname"]."</td>";
        echo"<td>".$registro["title"]."</td>";
        echo"<td>".$registro["book_quantity"]."</td>";
        echo"<td>".$registro["type"]."</td>";
        echo"<td>".$registro["created_at"]."</td>";
        echo"<td>".$registro["updated_at"]."</td>";
        
        ?>
        <td>
            <form action="transaccion_modificar.php" method="post">
            <input type="hidden" name="transaction_id" value="<?php echo $registro['transaction_id'];?>">
            <input type="submit" class="ui orange right button" name="cargar"  value="Modificar" >
            </form>
        </td>

<?php

        echo"</tr>";
    }   
    echo"</table>";   
    
?>

<script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
<script src="Semantic-UI-CSS-master/semantic.min.js"></script>

</body>
</html>