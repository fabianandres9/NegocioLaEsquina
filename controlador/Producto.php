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



 public function IngresarProducto(){
   
      $this->consultaBd("insert into producto values(( idProducto = idProducto + 1),'".$this->getNombre()."','".$this->getCantidad()."','".$this->getPrecio()."','".$this->getProveedor()."',1,'".$this->getSubtipo()."')");
			return "Producto Ingresado Correctamente..";
}


	public function EliminarProducto($codigoProducto){
		$consulta=$this->consultaBd("select * from producto where idProducto='".$codigoProducto."'");
		if($this->numero_filas($consulta)>0){
			//Existe el usuario, por ende elimino
			$this->consultaBd("delete from producto where idProducto='".$codigoProducto."'");
			return 1;
		}else{
			//No existe el usuario.
			return 0;
		}
	}
    
	public function ModificarProducto(){
		$consulta=$this->consultaBd("select * from producto where idProducto='".$this->getId()."'");
		if($this->numero_filas($consulta)>0){
			//Existe el usuario, por ende elimino
			$this->consultaBd("update producto set nombreProducto='".$this->getId()."',cantidad='".$this->getCantidad()."',precio='".$this->getPrecio()."',proveedor='".$this->getProveedor()."',estado_producto='".$this->getEstado()."',subtipo_producto='".$this->getSubtipo()."'  where idProducto='".$this->getId()."'");
			return 1;
		}else{
			//No existe el usuario.
			return 0;
		}
	}

	public function ListadoProductos(){
		
		$queryBd="select * from producto";
		$consulta=$this->consultaBd($queryBd);
		$datos = array();

		while($row=$this->fetch_array($consulta)){
			$datos[]=array(
				'Codigo'=>$row[0],
				'Nombre'=>$row[1],
				'Cantidad'=>$row[2],
				'Precio'=>$row[3],
				'Subtipo'=>$row[6],
				'Estado'=>$row[5],
				'Proveedor'=>$row[4]
				);
		}
		return json_encode($datos);
	}



}

?>