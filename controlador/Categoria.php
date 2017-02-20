<?php

require_once '../conexion/conexion.php';

class Categoria extends conexion{

    private $id_tipo;
    private $descripcion_tipo;
    private $id_subtipo;
    private $descripcion_subtipo;

	public function __construct(){
		$this->conectar();
	}
    
     public function getIdTipo(){
		return $this->id_tipo;
	}
	public function setIdTipo($id_tipo){
		return $this->id_tipo=$id_tipo;
	}
	 public function getDescripcionTipo(){
	 	return $this->descripcion_tipo;
	 }
	 public function setDescripcionTipo($descripcion_tipo){
	 	return  $this->descripcion_tipo=$descripcion_tipo;
	 }
	 public function getIdSubtipo(){
	 	 return $this->id_subtipo;
	 }
	 public function setIdSubtipo($id_subtipo){
	 	 return  $this->id_subtipo=$id_subtipo;
	 }
	 public function getDescripcionSubtipo(){
	 	 return $this->descripcion_subtipo;
	 }
	 public function setDescripcionSubtipo($descripcion_subtipo){
	 	return   $this->descripcion_subtipo=$descripcion_subtipo;
	 }
   
     public function IngresarTipo(){
     if($this->VerificarTipo()){
        return "El tipo ingresado ya existe...";
     }else{

      $this->consultaBd("insert into tipo_producto values(id_tipo_producto = id_tipo_producto + 1,'".$this->getNombre()."','".$this->getDireccion()."','".$this->getTelefono()."','".$this->getCorreo()."','".$this->getResena()."')");
			return "Tipo ingresado correctamente..";
	 }
}

    public function VerificarTipo(){
	  $consulta=$this->consultaBd("select * from proveedor where run_proveedor='".$this->getRun()."'");
		return $this->numero_filas($consulta)>0;
	}

}

?>