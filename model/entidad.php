<?php 
include_once '../utilidades/utilidades.php';

abstract class entidad
{

  //propiedades o caracteristicas
  var $id;
  var $fechaRegistro;
  var $idRegistradoPor;
  var $fechaUltimaModificacion;
  var $idModificadoPor;
  var $estado;
 
 //constructores
  function __construct()
  {
    $this->id=0;
    $this->fechaRegistro=utilidades::hoy();
    $this->idRegistradoPor=0;
    $this->fechaUltimaModificacion=$this->fechaRegistro;
    $this->idModificadoPor=0;
    $this->estado ="Activo"; 
  }

 //metodos de instancia
  function materializar($conn)
  {
    $this->id=$conn['id'];
	  $this->fechaRegistro=$conn['fechaRegistro'];
	  $this->idRegistradoPor=$conn['idRegistradoPor'];
    $this->fechaUltimaModificacion=$conn['fechaUltimaModificacion'];
    $this->idModificadoPor=$conn['idModificadoPor'];
    $this->estado =$conn['estado'];
  }

  
  public function Validar()
  {
     $this->fechaUltimaModificacion=utilidades::hoy();
  }

  abstract public function registrar();
  abstract public function modificar();
   

}

?>