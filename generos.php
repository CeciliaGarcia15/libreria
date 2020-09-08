<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" type="text/css" href="Semantic-UI-CSS-master/semantic.min.css">
    <title>generos</title>
    <style>
    #tabla{
    margin:10px;
}
    </style>
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

    <h1>Informacion disponible sobre todos los generos</h1>
    <button class="ui primary button" id="genero_modal">
    Nuevo Genero
    </button>
    <br>
    <?php
//----------------CONEXION A LA BASE DE DATOS-----------------------------------------

        require_once("generos_conexion.php");
        $obj= new Generos();

//---------------BOTON DE ELIMINAR-------------------------------------------------------------------------
if(isset($_POST["eliminar"])){

    $obj->baja_genero($_POST["genre_id"]);
    ?>
    <div class="ui success message">
        <i class="close icon"></i>
        <div class="header">
        Genero eliminado exitosamente.
        </div>
    </div>

    <br>
    <?php
}
//-------------------CONSULTA A LA BASE DE DATOS------------------------------------------------------
        $resultado=$obj->consultar_genero();

//-------------------BOTON MODIFICAR-------------------------------------------------------------------
if(isset($_POST["cargar"])){
    $mod=$obj->cargar($_POST["genre_id"]);
    while ($r=$mod->fetch_assoc()) {
        ?>
    <div id="form_edit">
    <form method="POST" class="ui form" id="frm_edit">
    <div class="two fields">
    <div class="inline fields">
        <div class="disabled fields">
        <input type="number" name="edit_id" value="<?php echo $r['genre_id'];?>">
        </div>
        <label>Nombre del genero</label>
        <input type="text"  name="edit_name" placeholder="edite el genero" value="<?php echo $r['genre_name'];?>" >
        <button type="submit" name="btn_editar" class="ui positive right button">Actualizar</button>
    </div>

    </div>
</form>
</div>
<?php
    }
}

//-----------------TABLA DE GENEROS-------------------------------------------------------------------------------------------------------------------------
?>
<div id="tabla">
<?php
        echo "<table id='tablaContacto' class='ui very basic table'>";
        echo "<tr>";
        echo "<td class='encabezado'>Nombre</td>";
        echo "<td class='encabezado'>Modificar</td>";
        echo "<td class='encabezado'>Eliminar</td>";
        echo "</tr>";
    while ($registro=$resultado->fetch_assoc()) {
        echo"<tr>";
        echo"<td>".$registro["genre_name"]."</td>";
        
        ?>
        <td>
        
        <form action="" method="post">
            <input  type="hidden" name="genre_id" value="<?php echo $registro['genre_id'];?>">
            <button class="ui inverted orange button"  name="cargar">Modificar</button>
        </form>
        </td>
        <td>
        <form action="" method="post">
            <input type="hidden" name="genre_id" value=" <?php echo $registro['genre_id'];?>  ">
            <input type="submit" class="ui inverted red button" value="Eliminar" name="eliminar">
        </form>
        </td>

<?php

        echo"</tr>";
    }   
    echo"</table>";   
    
    
?>
</div>



<div class="ui modal">
  <i class="close icon"></i>
  <div class="header">
    Nuevo Genero
  </div>
  <div class="image content">
    <div class="description">
        <div class="ui header"></div>
        <form method="POST" class="ui form" id="frm_agregar">
            <div class="field">
                <label>Nombre del genero</label>
                <input type="text" name="nombre_genero" placeholder="Ingrese el genero">
            </div>
    <button type="submit" name="btn_insertar" class="ui positive right button">Guardar</button>
</form>
</div>

<?php
 if(isset($_POST["insertar"])) {
    $nombre=$_POST["nombre_genero"];
    $obj->alta_genero($nombre);
}



if(isset($_POST["btn_editar"])) {
    $nombre=$_POST["edit_name"];
    $id=$_POST["edit_id"];
    echo $nombre." ".$id;
   $obj->modificar_genero($nombre,$id);
}
?>







<script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
<script src="Semantic-UI-CSS-master/semantic.min.js"></script>

<script>
   $(document).ready(function(){
  $('#genero_modal').click(function(){
    $('.ui.modal').modal('show');
  });
});
</script>

<script>
$(document).ready(function(){
  $('#edit_modal').click(function(){
    $('.ui.modal.editar').modal('show');
  });
});


$('.message .close')
  .on('click', function() {
    $(this)
      .closest('.message')
      .transition('fade')
    ;
  })
;
</script>

</body>

</html>