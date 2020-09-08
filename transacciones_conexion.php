<?php
include("conexion.php");
class Transaccion extends Conexion{

    public function alta_transaccion($libro,$cliente,$estado,$cantidad,$creacion){   
        $this->sentencia="INSERT INTO transactions(`transaction_id`,`book_id`,`client_id`,`type`,`book_quantity`,`created_at`) VALUES ('','$libro','$cliente','$estado',$cantidad,'$creacion')";
        $bandera=$this->ejecutar_sentencia();
            if($bandera===TRUE){
                echo"<h1>la nueva transaccion fue insertada exitosamente</h1>"; 
            }
        }
        
        /*$this->sentencia="SELECT * FROM books where book_id='$libro'";
        $resultado=$this->obtener_sentencia()->fetch_assoc();
        $copias=$resultado["copies"];
        if($estado=="prestamo"){
            if($copias-$cantidad>=0){
                $this->sentencia="UPDATE books SET copies=".($copias-$cantidad)."WHERE book_id='$libro'";
                $this->ejecutar_sentencia();
                
            
        else
        
        {
            echo"<h1>la cantidad solicitada sobrepasa el stock</h1>";
        }
    }
    else
    
    {
        $this->sentencia="UPDATE books SET copies=".($copias+$cantidad)."WHERE book_id='$libro'";
        $bandera1=$this->ejecutar_sentencia();
        $this->sentencia="INSERT INTO transactions('transaction_id','book_id','client_id','cantidad','type','created_at') VALUES ('','$libro','$cliente',$cantidad,'$postestado','$creacion')";
            $bandera2=$this->ejecutar_sentencia();
            if($bandera2===TRUE){
                echo"<h1>la nueva transaccion fue insertada exitosamente</h1>";
            } 
            
    }   
    }

    }
*/

    public function consultar_transaccion(){
        $this->sentencia="SELECT * FROM transactions;";
        $resultado=$this->obtener_sentencia();
        return $resultado;
    }
    public function index_transaccion(){
        $this->sentencia="SELECT t.transaction_id,c.cname,c.csurname, b.title,t.book_quantity, t.type,t.created_at,t.updated_at
        FROM transactions AS t
        JOIN books AS b
        on t.book_id =b.book_id
        JOIN clients AS c 
        on c.client_id =t.client_id";
        $resultado=$this->obtener_sentencia();
        return $resultado;
    }

    public function clientes(){
        $this->sentencia=" SELECT client_id, cname,csurname FROM clients";
        $resultado=$this->obtener_sentencia();
        return $resultado;
    }
    public function libros(){
        $this->sentencia=" SELECT book_id, title,copies FROM books";
        $resultado=$this->obtener_sentencia();
        return $resultado;
    }
   
   

        public function cargar($id){
        $this->sentencia="SELECT * FROM transactions WHERE transaction_id='$id'";
        $resultado= $this->obtener_sentencia();
        return $resultado;
    }
 
    
    public function modificar_transaccion($id,$libro,$cliente,$estado,$cantidad,$update){
        $this->sentencia="UPDATE transactions SET transaction_id='$id',book_id='$libro',client_id='$cliente',`type`='$estado',book_quantity='$cantidad',updated_at='$update' WHERE transaction_id='$id'";
        $bandera=$this->ejecutar_sentencia();
        if($bandera===true){
            echo"<h1>La transaccion fue modificado exitosamente</h1>" ;
        }
    }

    /*----------NO CREO QUE BORRAR LAS TRANSACCIONES SEA LO CORRECTO DEBERIAMOS DEJARLAS AHI COMO UN REGISTRO AL QUE ACUDIR----------------------
    
    
    public function baja_transaccion($id){
        $this->sentencia="DELETE FROM  WHERE client_id='$id'";
        $bandera=$this->ejecutar_sentencia();
        if($bandera===true){
            echo"<h1>El cliente fue eliminado exitosamente</h1>" ;
         }
*/
    




}
?>