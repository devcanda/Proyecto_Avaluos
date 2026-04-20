<?php
include_once 'entidad.php';
include_once '../utilidades/conexion.php';
class usuario extends entidad
 {
        var $nombre;
        var $password;
		var $correo;
		
        function __construct()
        {
            parent::__construct();
            $this->nombre   = "";
            $this->password = "";		  
            $this->correo   = "";          
        }
               
        
        function materializar($conn) 
        {
            parent::materializar($conn);
            $this->nombre = $conn['nombre'];
            $this->password=$conn['password'];           
            $this->correo = $conn['correo'];
        }


        function crearConsultaRegistro()
        {
          return  "INSERT INTO usuarios (nombre, password, correo, fechaRegistro, idRegistradoPor, fechaUltimaModificacion, idModificadoPor, estado) VALUES (?,?,?,?,?,?,?,?);";            
        }
 
        function crearConsultaModificar()
        {
          return  "UPDATE usuarios SET nombre=?,password=?,correo=?, fechaUltimaModificacion=?, idModificadoPor =?, estado =? WHERE id =?";           
        }
 
        function getArrayRegistrar()
        {
           
            $array = array
            (
                 $this->nombre,               
                 $this->password,
                 $this->correo,
                 $this->fechaRegistro,
                 $this->idRegistradoPor,
                 $this->fechaUltimaModificacion,
                 $this->idModificadoPor,
                 $this->estado                                   
             
            );
 
           return $array;
        }
 
        function getArrayModificar()
        {
           
            $array = array
            (
 
                 $this->nombre,            
                 $this->password,
                 $this->correo,
                 $this->fechaUltimaModificacion,
                 $this->idModificadoPor,
                 $this->estado,
                 $this->id                                    
             
            );
 
           return $array;
    }
      

    public function registrar()
    {
        try
        {
            if($this->Validar())
            {
               
                $obj  = new conexion();
                $bd = $obj->getConexion();
                $bd->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                $bd->beginTransaction();
                $stmt = $bd->prepare($this->crearConsultaRegistro());
                $stmt->execute($this->getArrayRegistrar());
                $this->id = $bd->lastInsertId();
                $bd->commit();
                return (object) ['estado' => 1,'mensaje' => 'OK'];
            }
            else
            {
                return (object) ['estado' => 0,'mensaje' => 'Usuario en uso'];
            }              

        }catch (Exception $e)
        {
            return $this->errorConsulta($bd, $e);
        }
       
    }
    
   
    public function modificar()
    {
        try
        {
            if($this->Validar())
            {
               
                $obj  = new conexion();
                $bd = $obj->getConexion();
                $bd->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                $bd->beginTransaction();
                $stmt = $bd->prepare($this->crearConsultaModificar());
                $stmt->execute($this->getArrayModificar());               
                $bd->commit();
                return (object) ['estado' => 1,'mensaje' => 'OK'];
            }
            else
            {
                return (object) ['estado' => 0,'mensaje' => 'Usuario en uso'];
            }              

        }catch (Exception $e)
        {
            $this->errorConsulta($bd, $e);
        }        
    }
   

    public function Validar()
    {
       parent::Validar();
       return self::getbycorreo($this->correo, $this->id);;
    }

    public  function errorConsulta($bd, $e)
    {
        if(isset($bd) && !empty($bd))
        {
            $bd->rollback();
        }  
        return (object) ['estado' => 0,'mensaje' => $e->getMessage()];   
        
    }
    
    function get($Id)
    {
        $sql = "SELECT * FROM usuarios WHERE id = '$Id'";
        $bd = new conexion();
        $filas = $bd->Query($sql);
        $resultado = $bd->siguienteRegistro($filas);
        if(isset($resultado) && !empty($resultado))
        {
            $this->materializar($resultado);
        }
    }
   
    
    public static function Ultimos10Creados()
    {
        $sql = "SELECT * FROM usuarios WHERE estado = 'Activo' ORDER BY id DESC LIMIT 10";
        $bd = new conexion();
		$result = $bd->Query($sql);
		$retorno = array();
		$i=0;
		while ($row = $result->fetch(PDO::FETCH_ASSOC)) 
		{
		   if(isset($row) && !empty($row))
			{
		  	    $obj = new usuario();
		  	    $obj->materializar($row);
		  	    $retorno[$i++] =$obj;
		  	}
		}
        return $retorno;
    }

       
    public static function getbycorreo($correo, $id)
    {
        $sql = "SELECT * FROM usuarios WHERE correo = '$correo'  AND ('$id' = '0' OR id <> '$id') ";
        $bd = new conexion();
        $filas = $bd->Query($sql);
        $resultado = $bd->siguienteRegistro($filas);
        if(isset($resultado) && !empty($resultado))
        {
            return false;
        }
        else
        {
            return true;
        }
    }


    public static function filtrar($nombre,$correo,$start,$end, $stado)
    {

        if($start==''|| $start ==null) $start = '0000-00-00';
        if($end==''  || $end ==null)   $end = '0000-00-00';

	    $sql = "SELECT * FROM usuarios WHERE  ('$stado'  = '' or  estado = '$stado')
                and ('$nombre' = '' or  nombre LIKE '$nombre%')
                and ('$correo' = '' or  correo LIKE '$correo%')
                and ('$start' = '0000-00-00' and '$end' = '0000-00-00') OR (fechaRegistro BETWEEN '$start' AND '$end' ) ORDER BY id DESC";
                
		$bd = new conexion();
		$result = $bd->Query($sql);
		$retorno = array();
		$i=0;
		while ($row = $result->fetch(PDO::FETCH_ASSOC)) 
		{
		   if(isset($row) && !empty($row))
			{
		  	    $obj = new usuario();
		  	    $obj->materializar($row);
		  	    $retorno[$i++] =$obj;
		  	}
		}
        return $retorno;
    }

 
    public static function validarInicio($correo, $password)
    {
        $sql = "SELECT * FROM usuarios WHERE correo ='$correo' AND estado ='Activo' LIMIT 1";
        $bd  = new conexion();
        $filas = $bd->Query($sql);
        $resultado = $bd->siguienteRegistro($filas);
        if(isset($resultado) && !empty($resultado))
        {
            $Usuario = new usuario();
            $Usuario->materializar($resultado);
            if(password_verify($password,$Usuario->password))return $Usuario;
            else return null;
            
        }else
        {
            return null;
        }
    }


       

    }
?>