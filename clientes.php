<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="Semantic-UI-CSS-master/semantic.min.css">
    <title>Clientes</title>
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

    <h1>Informacion Disponible de todos los clientes</h1>
    <a href="alta_clientes.php" class="ui primary button" >Nuevo cliente</a><br>
    <?php
//----------------CONEXION A LA BASE DE DATOS-----------------------------------------

        require_once("clientes_conexion.php");
        $obj= new Cliente();

//---------------BOTON DE ELIMINAR-------------------------------------------------------------------------
        if(isset($_POST["eliminar"])){
            $obj->baja_cliente($_POST["cliente_id"]);
        }
//-------------------CONSULTA A LA BASE DE DATOS------------------------------------------------------

        $resultado=$obj->consultar_cliente();

//-----------------TABLA DE AUTORES-------------------------------------------------------------------------------------------------------------------------

        echo "<table id='tablaContacto' class='ui very basic table'>";
        echo "<tr>";
        echo "<td class='encabezado'>DNI</td>";
        echo "<td class='encabezado'>Nombre</td>";
        echo "<td class='encabezado'>Apellido</td>";
        echo "<td class='encabezado'>Email</td>";
        echo "<td class='encabezado'>Cumpleaños</td>";
        echo "<td class='encabezado'>Genero</td>";
        echo "<td class='encabezado'>Activo</td>";
        echo "<td class='encabezado'>Fecha de creacion</td>";
        echo "<td class='encabezado'>Modificar</td>";
        echo "<td class='encabezado'>Eliminar</td>";
        echo "</tr>";
    while ($registro=$resultado->fetch_assoc()) {
        echo"<tr>";
        echo"<td>".$registro["client_id"]."</td>";
        echo"<td>".$registro["cname"]."</td>";
        echo"<td>".$registro["csurname"]."</td>";
        echo"<td>".$registro["email"]."</td>";
        echo"<td>".$registro["birthdate"]."</td>";
        echo"<td>".$registro["gender"]."</td>";
        echo"<td>".$registro["active"]."</td>";
        echo"<td>".$registro["created_at"]."</td>";
        
        ?>
       <td>
       <form action="clientes_modificar.php" method="post">
          <input type="hidden" name="cliente_id" value=" <?php echo  $registro['client_id'];?>">
           <input type="submit" class="ui orange right button" name="cargar" value="Modificar" >
        </form>

       </td>
        <td>
        <form action="" method="post">
            <input type="hidden" name="cliente_id" value=" <?php echo $registro['client_id'];?>  ">
            <input type="submit" class="ui red right button" value="Eliminar" name="eliminar">
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