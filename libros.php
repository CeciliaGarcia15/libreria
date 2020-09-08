<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" type="text/css" href="Semantic-UI-CSS-master/semantic.min.css">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>libros</title>
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

    <a href="alta_libros.php" class="ui primary button" >Nuevo libro</a><br><br><br>
    <?php
//----------------CONEXION A LA BASE DE DATOS-----------------------------------------

        require_once("libros_conexion.php");
        $obj= new Libros();

//---------------BOTON DE ELIMINAR-------------------------------------------------------------------------
        if(isset($_POST["eliminar"])){
            $obj->baja_libro($_POST["book_id"]);
            echo "<h1>Autor eliminado existosamente</h1>";
        }
//-------------------CONSULTA A LA BASE DE DATOS------------------------------------------------------
       //$resultado=$obj->consultar_libros();
        $resultado=$obj->index_libros();

//-----------------TABLA DE AUTORES-------------------------------------------------------------------------------------------------------------------------

        echo "<table id='tablaContacto' class='ui very basic table'>";
        echo "<tr>";
        echo "<td class='encabezado'>titulo</td>";
        echo "<td class='encabezado'>Autor</td>";
        echo "<td class='encabezado'>año</td>";
        echo "<td class='encabezado'>idioma</td>";
        echo "<td class='encabezado'>Genero</td>";
        echo "<td class='encabezado'>copias</td>";
        echo "<td class='encabezado'>descripcion</td>";
        echo "<td class='encabezado'>Modificar</td>";
        echo "<td class='encabezado'>Eliminar</td>";
        echo "</tr>";
    while ($registro=$resultado->fetch_assoc()) {
        echo"<tr>";
        echo"<td>".$registro["title"]."</td>";
        echo"<td>".$registro["name"]." ".$registro["surname"]."</td>";
        echo"<td>".$registro["year"]."</td>";
        echo"<td>".$registro["lang_name"]."</td>";
        echo"<td>".$registro["genre_name"]."</td>";
        echo"<td>".$registro["copies"]."</td>";
        echo"<td>".$registro["description"]."</td>";
        ?>
       <td>
       <form action="libros_modificar.php" method="post">
          <input type="hidden" name="book_id" value=" <?php echo  $registro['book_id'];?>">
           <input type="submit" class="ui orange right button" name="cargar" value="Modificar" >
        </form>

       </td>
        <td>
        <form action="" method="post">
            <input type="hidden" name="book_id" value=" <?php echo $registro['book_id'];?>  ">
            <input type="submit" value="Eliminar" class="ui red right button" name="eliminar">
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