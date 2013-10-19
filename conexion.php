<?php
class conexion {
   
    private $server="";
    private $usr="";
    private $pass="";
    private $db="";
    
    
    public function __construct($servidor,$base,$usuario,$contra) {
        $this->server=$servidor;
        $this->db=$base;
        $this->usr=$usuario;
        $this->pass=$contra;
    }
    
    public function objconexion(){
        $con=  mysqli_connect($this->server,$this->usr,$this->pass);
        mysqli_select_db($con,$this->db);
                
        return $con;
        
    }
    
    public function CUD($query){
        
        if ($consulta = mysqli_query($this->objconexion(), $query) == TRUE){
            return true;
        }  else {
            return pg_errormessage($this->objconexion());
        }   
    }
    
    public function Extraer($query){
        $respuesta=  mysqli_query($this->objconexion(),$query);
        return $respuesta;
    }

    public function cerrarConexion()
    {
        mysqli_close($this->objconexion());
    }
}
?>