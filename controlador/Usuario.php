<?php

require_once '../conexion/conexion.php';

class Usuario extends conexion{

    private $run;
    private $username;
    private $password;
    private $nombres;
    private $apellidos;
	private $tipo;
    private $estado;
   

	public function __construct(){
		$this->conectar();
	}
    
     public function getRun(){
		return $this->run;
	}
	public function setRun($run){
		return $this->run=$run;
	}
	public function getUsername(){
		return $this->username;
	}
	public function setUsername($username){
		return $this->username=$username;
	}
	 public function getPassword(){
	 	return $this->password;
	 }
	 public function setPassword($password){
	 	return  $this->password=$password;
	 }
	 public function getNombres(){
	 	 return $this->nombres;
	 }
	 public function setNombres($nombres){
	 	 return  $this->nombres=$nombres;
	 }
	 public function getApellidos(){
	 	 return $this->apellidos;
	 }
	 public function setApellidos($apellidos){
	 	return   $this->apellidos=$apellidos;
	 }
    public function getTipo(){
        return $this->tipo;
	}
	public function setTipo($tipo){
		 return $this->tipo=$tipo;
	}
     public function getEstado(){
        return $this->estado;
	}
	public function setEstado($estado){
		 return $this->estado=$estado;
	}
	

  public function IngresarSitio(){
    	$consultas=$this->consultaBd("select * from usuario where run='".$this->getRun()."' and contraseña='".$this->getPassword()."'" );
                if($this->numero_filas($consultas)>0){
                	$fila = $this->fetch_array($consultas);
                	if($fila[5]!=1){
                		return 0;
                		//Bloqueado, Inactivo
                	}else{
                		//Si existe existe el usuario
						sleep(1);
						echo '<script type="text/javascript"> window.location.assign("./Portal.php");</script>';
                		return $fila[0];
                	}
         		 }else{
         		 	//Usuario y/o password incorrecto
          				return -1;
          		}
  
    }

	  public function IngresarUsuario(){
     if($this->VerificarUsuario()){
        if($this->ModificarUsuario()){
			return "Usuario actualizado correctamente...";
		}
     }else{

      $this->consultaBd("insert into usuario values('".$this->getRun()."','".$this->getUsername()."','".$this->getPassword()."','".$this->getNombres()."','".$this->getApellidos()."',1,1)");
			return "Usuario registrado correctamente..";
     }
}

    public function VerificarUsuario(){
	  $consulta=$this->consultaBd("select * from usuario where run='".$this->getRun()."'");
		return $this->numero_filas($consulta)>0;
	}

	public function EliminarUsuario($parametroRut){
		$consulta=$this->consultaBd("select * from usuario where run='".$parametroRut."'");
		if($this->numero_filas($consulta)>0){
			//Existe el usuario, por ende elimino
			$this->consultaBd("delete from usuario where run='".$parametroRut."'");
			return 1;
		}else{
			//No existe el usuario.
			return 0;
		}
	}
    
    public function ModificarUsuario(){
		$consulta=$this->consultaBd("select * from usuario where run='".$this->getRun()."'");
		if($this->numero_filas($consulta)>0){
			//Existe el usuario, por ende elimino
			$this->consultaBd("update usuario set nombreUsuario='".$this->getUsername()."',contraseña='".$this->getPassword()."',nombre='".$this->getNombres()."',apellidos='".$this->getApellidos()."'  where run='".$this->getRun()."'");
			return 1;
		}else{
			//No existe el usuario.
			return 0;
		}
	}

	public function ListadoUsuarios(){
		
		$queryBd="select * from usuario";
		$consulta=$this->consultaBd($queryBd);
		$datos = array();

		while($row=$this->fetch_array($consulta)){
			$datos[]=array(
				'RunUsuario'=>$row[0],
				'NombreUsuario'=>$row[1],
				'Contrasena'=>$row[2],
				'Nombre'=>$row[3],
				'Apellidos'=>$row[4]
				);
		}
		return json_encode($datos);
	}

}

?>

