<?php

require_once '../conexion/conexion.php';

class Proveedor extends conexion{

    private $run;
    private $nombre;
    private $direccion;
    private $telefono;
    private $correo;
    private $resena;

	public function __construct(){
		$this->conectar();
	}
    
     public function getRun(){
		return $this->run;
	}
	public function setRun($run){
		return $this->run=$run;
	}
	 public function getNombre(){
	 	return $this->nombre;
	 }
	 public function setNombre($nombre){
	 	return  $this->nombre=$nombre;
	 }
	 public function getDireccion(){
	 	 return $this->direccion;
	 }
	 public function setDireccion($direccion){
	 	 return  $this->direccion=$direccion;
	 }
	 public function getTelefono(){
	 	 return $this->telefono;
	 }
	 public function setTelefono($telefono){
	 	return   $this->telefono=$telefono;
	 }
    public function getResena(){
        return $this->resena;
	}
	public function setResena($resena){
		 return $this->resena=$resena;
	}
     public function getCorreo(){
        return $this->correo;
	}
	public function setCorreo($correo){
		 return $this->correo=$correo;
	}

  public function IngresarProveedor(){
     if($this->VerificarProveedor()){
		 if($this->ModificarProveedor()){
           return "Proveedor Actualizado Correctamente...";
		 }
     }else{

      $this->consultaBd("insert into proveedor values('".$this->getRun()."','".$this->getNombre()."','".$this->getDireccion()."','".$this->getTelefono()."','".$this->getCorreo()."','".$this->getResena()."')");
			return "Proveedor registrado correctamente..";
     }
}

    public function VerificarProveedor(){
	  $consulta=$this->consultaBd("select * from proveedor where run_proveedor='".$this->getRun()."'");
		return $this->numero_filas($consulta)>0;
	}

    public function EliminarProveedor($parametroRut){
		$consulta=$this->consultaBd("select * from proveedor where run_proveedor='".$parametroRut."'");
		if($this->numero_filas($consulta)>0){
			//Existe el usuario, por ende elimino
			$this->consultaBd("delete from proveedor where run_proveedor='".$parametroRut."'");
			return 1;
		}else{
			//No existe el usuario.
			return 0;
		}
	}
      public function ModificarProveedor(){
		$consulta=$this->consultaBd("select * from proveedor where run_proveedor='".$this->getRun()."'");
		if($this->numero_filas($consulta)>0){
			//Existe el usuario, por ende elimino
			$this->consultaBd("update proveedor set nombreProveedor='".$this->getNombre()."',direccionProveedor='".$this->getDireccion()."',telefonoProveedor='".$this->getTelefono()."',correo='".$this->getCorreo()."',reseñaProveedor='".$this->getResena()."'  where run_proveedor='".$this->getRun()."'");
			return 1;
		}else{
			//No existe el usuario.
			return 0;
		}
	}

	public function ListadoProveedores(){
		
		$queryBd="select * from proveedor";
		$consulta=$this->consultaBd($queryBd);
		$datos = array();

		while($row=$this->fetch_array($consulta)){
			$datos[]=array(
				'RunProveedor'=>$row[0],
				'Nombre'=>$row[1],
				'Direccion'=>$row[2],
				'Telefono'=>$row[3],
				'Correo'=>$row[4],
				'Resena'=>$row[5]
				);
		}
		return json_encode($datos);
	}

}


?>