<?php
include("conexion.php");
class Generos extends Conexion{
    public function alta_genero($nombre)
    {
        $this->sentencia="INSERT INTO genres VALUES ('','$nombre')";
        $bandera=$this->ejecutar_sentencia();
        if($bandera===True){
            
        }
    }
    public function busqueda_producto($busqueda,$tabla){
        $this->sentencia="SELECT * FROM '$tabla' where   like'%$busqueda%' or nombre like '%$busqueda%'";
        $resultado=$this->obtener_sentencia();
        return $resultado;
    }
    public function consultar_genero(){
        $this->sentencia="SELECT * FROM genres;";
        $resultado=$this->obtener_sentencia();
        return $resultado;
    }

        public function cargar($id){
        $this->sentencia="SELECT * FROM genres WHERE genre_id='$id'";
        $resultado= $this->obtener_sentencia();
        return $resultado;
    }

    
    public function modificar_genero($nombre,$id)
    {
        $this->sentencia="UPDATE genres SET genre_name='$nombre', genre_id='$id' WHERE genre_id='$id'";
        $bandera=$this->ejecutar_sentencia();
        if($bandera===True){
            echo "<h1>Genero modificado exitosamente<h1>";
            echo" <button><a href='generos.php'>volver a autores</a></button>";
        }

    }

    public function baja_genero($id){
        $this->sentencia="DELETE FROM genres WHERE genre_id='$id'";
        $this->ejecutar_sentencia();

    }




}
?>