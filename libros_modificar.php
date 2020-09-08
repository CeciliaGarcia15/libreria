<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<?php 
include_once("libros_conexion.php");
$obj= new Libros();
$autor=$obj->autor();
$genero=$obj->genero();
$idioma=$obj->idioma();


if(isset($_POST["cargar"])){
    $resultado=$obj->cargar($_POST["book_id"]);
    while ($registro=$resultado->fetch_assoc()) {
        
?>

<div>
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post" class="ui form">
 <label for="">nombre del libro:</label>
<input type="text" name="libro_titulo" placeholder ="nombre  del libro " value="<?php echo $registro["title"]?>"><br>
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
<input type="number" name="libro_año" value="<?php echo $registro["year"]?>" placeholder="Año de publicacion del libro"><br>
<br>

<label>Idioma:</label>
<select name="idiomita">
    <option value="">idioma</option>

<?php

    while ($data=$idioma->fetch_array())
    {
    ?>
    <option value="<?php echo $data['lang_id']?>"><?php echo $data["lang_name"]?></option>
    <?php     
    }
    
?>

</select><br>

<label for="">Copias disponibles:</label>
<input type="number" name="libro_copias" value="<?php echo $registro['copies']?>" placeholder ="Copias del libro en stock"><br>
<br>

<label for="">Descripcion:</label><br>
<div class="field">
<textarea name="descripcion"><?php echo $registro["description"]?></textarea>
</div>
<input type="hidden" name="id" value="<?php echo  $registro['book_id'];?>">
<br><input type="submit" name="modificar" class="ui inverted green button" value="Guardar Libro">

</form>
<?php
    }
}

if(isset($_POST["modificar"])) {
    $id=$_POST["id"];
    $titulo=$_POST["libro_titulo"];
    $autores=$_POST["autores"];
    $generos=$_POST["generos"];
    $año=$_POST["libro_año"];
    $i=$_POST["idiomita"];
    $copias=$_POST["libro_copias"];
    $desc=$_POST["descripcion"];
    $obj->modificar_libro($id,$autores,$generos,$titulo,$año,$i,$copias,$desc);
    


}
?>

</div>
<button class="ui black button"><a href="libros.php">volver a libros</a></button>

</body>
</html>