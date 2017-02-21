<?php

require_once '../controlador/Producto.php';
$pro=new Producto();
session_start();
switch ($_REQUEST['action']) {

	   case 'InsertarProducto':
		$pro->setNombre($_REQUEST['txt_nombre']);
        $pro->setCantidad($_REQUEST['txt_cantidad']);
		$pro->setPrecio($_REQUEST['txt_precio']);
		$pro->setSubtipo($_REQUEST['SubtipoProducto']);
		$pro->setProveedor($_REQUEST['txt_proveedor']);
		echo $pro->IngresarProducto();
		break;

		case 'EliminarProveedor':
		echo $pro->EliminarProveedor($_REQUEST['runProveedor']);
		break;
        
		case 'ListarProveedores':
		echo ($pro->ListadoProveedores(""));
		break;
    
}

?>