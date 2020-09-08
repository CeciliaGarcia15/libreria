<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" type="text/css" href="Semantic-UI-CSS-master/semantic.min.css">

    <title>autores</title>
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
    <h1>Informacion disponible sobre todos los autores</h1>
    <a href="alta_autor.php" class="ui primary button">Nuevo Autor</a><br><br><br>
    <?php
//----------------CONEXION A LA BASE DE DATOS-----------------------------------------

        require_once("autor_conexion.php");
        $obj= new Autor();

//---------------BOTON DE ELIMINAR-------------------------------------------------------------------------
if(isset($_POST["eliminar"])){
    $obj->baja_autor($_POST["autor_id"]);
    echo"<h2>Autor Eliminado Exitosamente<h2><br><br>";
}
//-------------------CONSULTA A LA BASE DE DATOS------------------------------------------------------
        $resultado=$obj->consultar_autor();


//-----------------TABLA DE AUTORES-------------------------------------------------------------------------------------------------------------------------

        echo "<table id='tablaContacto' class='ui very basic table'>";
        echo "<tr>";
        echo "<td class='encabezado'>Nombre</td>";
        echo "<td class='encabezado'>Apellido</td>";
        echo "<td class='encabezado'>Nacionalidad</td>";
        echo "<td class='encabezado'>Modificar</td>";
        echo "<td class='encabezado'>Eliminar</td>";
        echo "</tr>";
    while ($registro=$resultado->fetch_assoc()) {
        echo"<tr>";
        echo"<td>".$registro["name"]."</td>";
        echo"<td>".$registro["surname"]."</td>";
        echo"<td>".$registro["nationality"]."</td>";
        ?>
       <td>
       <form action="autor_modificar.php" method="post">
          <input type="hidden" name="autor_id" value=" <?php echo  $registro['author_id'];?>">
           <input type="submit" class="ui inverted orange button" name="cargar" value="Modificar" >
        </form>

       </td>
        <td>
        <form action="" method="post">
            <input type="hidden" name="autor_id" value=" <?php echo $registro['author_id'];?>  ">
            <input type="submit" class="ui inverted red button" value="Eliminar" name="eliminar">
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