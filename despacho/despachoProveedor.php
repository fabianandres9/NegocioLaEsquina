<?php

require_once '../controlador/Proveedor.php';
$pro=new Proveedor();
session_start();
switch ($_REQUEST['action']) {

	   case 'InsertarProveedor':
		$pro->setRun($_REQUEST['txt_run']);
        $pro->setNombre($_REQUEST['txt_nombre']);
		$pro->setDireccion($_REQUEST['txt_direccion']);
		$pro->setTelefono($_REQUEST['txt_telefono']);
		$pro->setCorreo($_REQUEST['txt_correo']);
        $pro->setResena($_REQUEST['txt_resena']);
		echo $pro->IngresarProveedor();
		break;

		case 'EliminarProveedor':
		echo $pro->EliminarProveedor($_REQUEST['runProveedor']);
		break;
        
		case 'ListarProveedores':
		echo ($pro->ListadoProveedores(""));
		break;
    
}

?>