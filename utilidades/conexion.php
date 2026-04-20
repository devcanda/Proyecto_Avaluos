<?php
    
class conexion
{
    var $usuario;
    var $password;
    var $servidor;
    var $bd;
    var $cadenaConexio;
    
    function __construct()
    {     
        $this->usuario = "candamil_avaluou";
        $this->password = "b40zb5Ee5E";        
        $this->servidor = "localhost:3306";
        $this->bd = "candamil_avaluo";
        $this->cadenaConexio = "mysql:host=$this->servidor;dbname=$this->bd";
    }    
    		
    function Query($sql)
    {
        $conexion  = new PDO($this->cadenaConexio, $this->usuario, $this->password, array(PDO::MYSQL_ATTR_INIT_COMMAND=>'SET NAMES \'UTF8\''));
        return $conexion->query($sql);
    }

    function getConexion()
    {
        $conexion  = new PDO($this->cadenaConexio, $this->usuario, $this->password, array(PDO::MYSQL_ATTR_INIT_COMMAND=>'SET NAMES \'UTF8\''));
        return $conexion;
    }
        
    function siguienteRegistro($filas) 
    {
        return $filas->fetch(PDO::FETCH_ASSOC);
    }
    
    function getNumeroFilas($filas)
    {
        return $filas->fetchColumn();
    }   
    
}

?>