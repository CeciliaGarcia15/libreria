<?php
include("conexion.php");
class Cliente extends Conexion{
    public function alta_cliente($dni,$nombre,$apellido,$email,$cumpleaños,$genero,$activo,$creacion)
    {
        $this->sentencia="INSERT INTO clients(client_id,cname,csurname,email,birthdate,gender,active,created_at) VALUES ('$dni','$nombre','$apellido','$email','$cumpleaños','$genero','$activo','$creacion')";
        $bandera=$this->ejecutar_sentencia();
        if($bandera===TRUE){
            echo"<h1>El nuevo cliente fue insertado exitosamente</h1>";
        }
    }
    public function consultar_cliente(){
        $this->sentencia="SELECT * FROM clients;";
        $resultado=$this->obtener_sentencia();
        return $resultado;
    }

        public function cargar($id){
        $this->sentencia="SELECT * FROM clients WHERE client_id='$id'";
        $resultado= $this->obtener_sentencia();
        return $resultado;
    }
 
    
    public function modificar_cliente($dni,$nombre,$apellido,$email,$cumpleaños,$genero,$activo,$update)
    {
        $this->sentencia="UPDATE clients SET client_id='$dni',cname='$nombre',csurname='$apellido',email='$email',birthdate='$cumpleaños',gender='$genero',active='$activo',updated_at='$update' WHERE client_id='$dni'";
        $bandera=$this->ejecutar_sentencia();
        if($bandera===true){
           echo"<h1>El cliente fue modificado exitosamente</h1>" ;
        }
    }

    public function baja_cliente($id){
        $this->sentencia="DELETE FROM clients WHERE client_id='$id'";
        $bandera=$this->ejecutar_sentencia();
        if($bandera===true){
            echo"<h1>El cliente fue eliminado exitosamente</h1>" ;
         }

    }




}
?>