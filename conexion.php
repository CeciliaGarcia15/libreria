<?php

class Conexion{
    private $host="localhost";
    private $user="root";
    private $password="";
    private $base="libreria";
    public $sentencia;
    private $rows=array();
    private $conexion;

    private function abrir_conexion(){
        $this->conexion=new mysqli($this->host,$this->user,$this->password,$this->base);
    }
    private function cerrar_conexion(){
        $this->conexion->close();
    }


    public function ejecutar_sentencia(){
        $this->abrir_conexion();
        $bandera=$this->conexion->query($this->sentencia);
        $this->cerrar_conexion();
        return $bandera;
        }
    public function obtener_sentencia(){
        $this->abrir_conexion();
        $resultado=$this->conexion->query($this->sentencia);
        return $resultado;
    }
}


?>