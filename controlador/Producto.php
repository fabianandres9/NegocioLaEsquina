<?php

require_once '../conexion/conexion.php';

class Producto extends conexion{

    private $id;
    private $nombre;
    private $cantidad;
    private $precio;
    private $proveedor;
    private $estado;
    private $subtipo;

	public function __construct(){
		$this->conectar();
	}
    
     public function getId(){
		return $this->id;
	}
	public function setId($id){
		return $this->id=$id;
	}
	 public function getNombre(){
	 	return $this->nombre;
	 }
	 public function setNombre($nombre){
	 	return  $this->nombre=$nombre;
	 }
	 public function getCantidad(){
	 	 return $this->cantidad;
	 }
	 public function setCantidad($cantidad){
	 	 return  $this->cantidad=$cantidad;
	 }
	 public function getPrecio(){
	 	 return $this->precio;
	 }
	 public function setPrecio($precio){
	 	return   $this->precio=$precio;
	 }
    public function getProveedor(){
        return $this->proveedor;
	}
	public function setProveedor($proveedor){
		 return $this->proveedor=$proveedor;
	}
     public function getEstado(){
        return $this->estado;
	}
	public function setEstado($estado){
		 return $this->estado=$estado;
	}
      public function getSubtipo(){
        return $this->subtipo;
	}
	public function setSubtipo($subtipo){
		 return $this->subtipo=$subtipo;
	}


}

?>