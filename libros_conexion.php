<?php
include("conexion.php");
class Libros extends Conexion{
    public function alta_libros($autor,$generos,$titulo,$año,$lenguaje,$copias,$descripcion)
    {
        $this->sentencia="INSERT INTO books VALUES ('','$autor','$generos','$titulo','$año','$lenguaje','$copias','$descripcion')";
        $bandera=$this->ejecutar_sentencia();
        if($bandera===True){
            echo "<h2>Libro guardado correctamente</h2>";
        }
    }
    public function consultar_libros(){
        $this->sentencia="SELECT * FROM books;";
        $resultado=$this->obtener_sentencia();
        return $resultado;
    }


    public function index_libros(){
        $this->sentencia="SELECT b.book_id,a.name,a.surname,g.genre_name,b.title,b.year,l.lang_name,b.copies,b.description
        FROM books as b
        INNER JOIN authors as a
        ON b.author_id=a.author_id
        INNER JOIN genres as g
        ON b.genre_id=g.genre_id
        INNER JOIN languages as l
        ON b.lang_id=l.lang_id;";
        
        $resultado=$this->obtener_sentencia();
        return $resultado;
    }


    public function autor(){
        $this->sentencia="SELECT * FROM authors;";
        $resultado=$this->obtener_sentencia();
        return $resultado;

    }
 
    public function genero(){
        $this->sentencia="SELECT * FROM genres;";
        $resultado=$this->obtener_sentencia();
        return $resultado;

    }
    public function idioma(){
        $this->sentencia="SELECT * FROM languages;";
        $resultado=$this->obtener_sentencia();
        return $resultado;

    }

        public function cargar($id){
        $this->sentencia="SELECT * FROM books WHERE book_id='$id'";
        $resultado= $this->obtener_sentencia();
        return $resultado;
    }
 
    
    public function modificar_libro($id,$autor,$generos,$titulo,$año,$idioma,$copias,$descripcion)
    {
        $this->sentencia="UPDATE books SET book_id='$id',author_id='$autor',genre_id='$generos',title='$titulo',`year`='$año',lang_id='$idioma',copies='$copias', `description`='$descripcion' WHERE book_id='$id'";
        $bandera=$this->ejecutar_sentencia();
        if($bandera===True){
            echo "<h2>Libro guardado correctamente</h2>";
        }
        
    }

    public function baja_libro($id){
        $this->sentencia="DELETE FROM books WHERE book_id='$id'";
        $this->ejecutar_sentencia();
    }




}
?>