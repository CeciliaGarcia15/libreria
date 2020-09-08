<?php
require_once("libros_conexion.php");
$obj=new Libros();
$autor=$obj->autor();
$genero=$obj->genero();
$idioma=$obj->idioma();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" type="text/css" href="Semantic-UI-CSS-master/semantic.min.css">
    
    <title>Ingresar un libro</title>
</head>
<body>

<h2>Ingresa un nuevo libro</h2> 
<div>

    <form action="" method="post" class="ui form">
     <label for="">nombre del libro:</label>
    <input type="text" name="libro_titulo" placeholder ="nombre  del libro "><br>
    <label for="">Autor:</label>
     <select name="autores" class="ui search dropdown">
    
    <?php 
        while ($datos=$autor->fetch_array())
        {
        ?>
        <option value="<?php echo $datos["author_id"]?>"><?php echo $datos["name"]." ".$datos["surname"]?></option>
        <?php     
        }
    ?>
    </select>
    <label for="">Genero:</label>
    <select name="generos" class="ui fluid dropdown">
    <?php 

        while ($d=$genero->fetch_array())
        {
        ?>
        
        <option value="<?php echo $d["genre_id"]?>"><?php echo $d["genre_name"]?></option>
        
        <?php     
        }
    ?>
    </select>
      </div>
    </div>
  </div>

    
    <br>
    <label for="">año de publicación:</label> 
    <input type="number" name="libro_año" placeholder="Año de publicacion del libro"><br>
    <br>

    <label>Idioma:</label>
    <select name="idiomita">
        <option value="">idioma</option>
    
    <?php

        while ($data=$idioma->fetch_array())
        
        {
        ?>
        <option value="<?php echo $data["lang_id"]?>"><?php echo $data["lang_name"]?></option>
        <?php     
        }
        
    ?>
    
    </select><br>

    <label for="">Copias disponibles:</label>
    <input type="number" name="libro_copias" placeholder ="Copias del libro en stock"><br>
    <br>

    <label for="">Descripcion:</label><br>
    <div class="field">
    <textarea name="descripcion"></textarea>
</div>

    <br><input type="submit" name="insertar" class="ui inverted green button" value="Guardar Libro">
    
</form>

    </div>
    
<button class="ui black button"><a href="libros.php">Cancelar</a></button>
<?php
 if(isset($_POST["insertar"])) {
     $titulo=$_POST["libro_titulo"];
     $autores=$_POST["autores"];
     $generos=$_POST["generos"];
     $año=$_POST["libro_año"];
     $i=$_POST["idiomita"];
     $copias=$_POST["libro_copias"];
     $desc=$_POST["descripcion"];

    $obj->alta_libros($autores,$generos,$titulo,$año,$i,$copias,$desc);
    
 }
?>


<script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
<script src="Semantic-UI-CSS-master/semantic.min.js"></script>
<script>
$('select.dropdown')
  .dropdown()
;

</script>
</body>
</html>



