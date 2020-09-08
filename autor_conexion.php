<?php
include("conexion.php");
class Autor extends Conexion{
    public function alta_autor($nombre,$apellido,$nacionalidad)
    {
        $this->sentencia="INSERT INTO authors VALUES ('','$nombre','$apellido','$nacionalidad')";
        $bandera=$this->ejecutar_sentencia();
        if($bandera===True){
            echo"<h1>Autor insertado exitosamente<h1>";
        }
    }
    public function consultar_autor(){
        $this->sentencia="SELECT * FROM authors;";
        $resultado=$this->obtener_sentencia();
        return $resultado;
    }

        public function cargar($id){
        $this->sentencia="SELECT * FROM authors WHERE author_id='$id'";
        $resultado= $this->obtener_sentencia();
        return $resultado;
    }
 
    
    public function modificar_autor($nombre,$apellido,$nacionalidad,$id)
    {
        $this->sentencia="UPDATE authors SET name='$nombre',surname='$apellido',nationality='$nacionalidad', author_id='$id' WHERE author_id='$id'";
        $bandera=$this->ejecutar_sentencia();
        if($bandera===True){
            echo "<h1>Autor modificado exitosamente<h1>";
           echo" <button><a href='autores.php'>volver a autores</a></button>";
        }

    }

    public function baja_autor($id){
        $this->sentencia="DELETE FROM authors WHERE author_id='$id'";
        $this->ejecutar_sentencia();

    }




}
?>