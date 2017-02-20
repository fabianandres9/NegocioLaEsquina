<?php

require_once '../controlador/Usuario.php';
$usu=new Usuario();
session_start();
switch ($_REQUEST['action']) {

		case 'Login':
        $usu->setRun($_REQUEST['txt_run']);
		$usu->setPassword($_REQUEST['txt_password']);
       switch ($usu->IngresarSitio()){
       	case 0:
       		echo "Cuenta inactiva o Bloqueada";
       		break;
       	case -1:
       		echo "Usuario y/o Password incorrectos";
       		break;
       	default:
       		$_SESSION['run']=$usu->IngresarSitio();
       		echo "Conexion Exitosa...";
       		break;
       }
        break;

	   case 'InsertarUsuario':
		$usu->setRun($_REQUEST['txt_run']);
		$usu->setPassword($_REQUEST['txt_password']);
		$usu->setNombres($_REQUEST['txt_nombres']);
		$usu->setApellidos($_REQUEST['txt_apellidos']);
		$usu->setUsername($_REQUEST['txt_username']);
		echo $usu->IngresarUsuario();
		break;

			case 'EliminarUsuario':
		echo $usu->EliminarUsuario($_REQUEST['runUsuario']);
		break;
        
		case 'ListarUsuarios':
		echo ($usu->ListadoUsuarios(""));
		break;

}

?>