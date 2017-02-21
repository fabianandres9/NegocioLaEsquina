<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
	<title>Alumno</title>
<script type="text/javascript" src="./js/jquery_import.js"></script>


<?php
$server     = 'localhost'; //servidor
$username   = 'root'; //usuario de la base de datos
$password   = ''; //password del usuario de la base de datos
$database   = 'negociolaesquina'; //nombre de la base de datos
 
$conexion = @new mysqli($server, $username, $password, $database);
 
if ($conexion->connect_error) //verificamos si hubo un error al conectar, recuerden que pusimos el @ para evitarlo
{
    die('Error de conexión: ' . $conexion->connect_error); //si hay un error termina la aplicación y mostramos el error
}
 
$sql="SELECT * from tipo_producto";
$result = $conexion->query($sql); //usamos la conexion para dar un resultado a la variable
 
if ($result->num_rows > 0) //si la variable tiene al menos 1 fila entonces seguimos con el codigo
{
    $ComboTipoProducto="";
    while ($row = $result->fetch_array(MYSQLI_ASSOC)) 
    {
        $ComboTipoProducto .=" <option value='".$row['id_tipo_producto']."'>".$row['descripcion_tipo']."</option>"; //concatenamos el los options para luego ser insertado en el HTML
    }
}
else
{
    echo "No hubo resultados";
}
$conexion->close(); //cerramos la conexión
?>




<?php
$server     = 'localhost'; //servidor
$username   = 'root'; //usuario de la base de datos
$password   = ''; //password del usuario de la base de datos
$database   = 'negociolaesquina'; //nombre de la base de datos
 
$conexion = @new mysqli($server, $username, $password, $database);
 
if ($conexion->connect_error) //verificamos si hubo un error al conectar, recuerden que pusimos el @ para evitarlo
{
    die('Error de conexión: ' . $conexion->connect_error); //si hay un error termina la aplicación y mostramos el error
}
 
$sql="SELECT * from subtipo_producto";
$result = $conexion->query($sql); //usamos la conexion para dar un resultado a la variable
 
if ($result->num_rows > 0) //si la variable tiene al menos 1 fila entonces seguimos con el codigo
{
    $ComboSubtipoProducto="";
    while ($row = $result->fetch_array(MYSQLI_ASSOC)) 
    {
        $ComboSubtipoProducto .=" <option value='".$row['id_subtipo_producto']."'>".$row['descripcion_subtipo']."</option>"; //concatenamos el los options para luego ser insertado en el HTML
    }
}
else
{
    echo "No hubo resultados";
}
$conexion->close(); //cerramos la conexión
?>


	<script type="text/javascript">
 	

    	function LimpiarCajas(){
		   $('#txt_nombre').val("");
           $('#txt_cantidad').val("");
           $('#txt_precio').val("");
           $('#SubtipoProducto').val("");
           $('#txt_proveedor').val("");
		}

 </script>
  <script type="text/javascript">
			$(document).ready(function(){
			$('#formulario_registroProducto').submit(function(){
				var action="InsertarProducto";
				$.ajax({
					data:$(this).serialize()+"&action="+action,
					url:"./despacho/despachoProducto.php",
					type:"POST",
					beforeSend:function(){
						$('#Mensaje').html("<h3>Procesando...</h3>");
					},
					success:function(resp){
						$('#Mensaje').html("<h3>"+resp+"</h3>");
						LimpiarCajas();				
					}
				});
				return false;
			});
		});

    </script>
</head>
<body>
<center>
<form id="formulario_registroProducto" name="formulario_registroProducto" action="#" method="POST">
<h1>Registro de Producto</h1><br>
<label>Nombre Producto:</label><br>
<input type="text" name="txt_nombre" id="txt_nombre" placeholder="Nombre Producto"><br><br>
<label>Cantidad:</label><br>
<input type="number" name="txt_cantidad" id="txt_cantidad" placeholder="Cantidad"><br><br>
<label>Precio:</label><br>
<input type="number" name="txt_precio" id="txt_precio" placeholder="Precio"><br><br>
<label>Tipo Producto:</label><br><br>
<select name="TipoProducto" id="TipoProducto">
       <?php echo $ComboTipoProducto; ?>
</select><br><br>
<label>Subtipo Producto:</label><br><br>
<select name="SubtipoProducto" id="SubtipoProducto">
       <?php echo $ComboSubtipoProducto; ?>
</select><br><br>
<label>Proveedor:</label><br><br>
<input type="text" name="txt_proveedor" id="txt_proveedor" placeholder="Proveedor"><br><br>
<input type="submit" name="btn_docente" id="btn_docente" value="Ingresar"><br><br>

</form>
<div id="Mensaje"></div><br><br>

<a href="Portal.php"><li>Portal</li></a><br><br>
<a href="RegistrarUsuario.php"><li>Registro Usuario </li></a><br><br>
<a href="RegistrarProducto.php"><li>Registro Producto</li></a><br><br>
<a href="RegistrarProveedor.php"><li>Registro Proveedor</li></a><br><br>
<a href="LoginAdministrador1.php"><li>Ingresar como Administrador</li></a><br><br>
<a href="LoginAlumno.php"><li>Ingresar como Alumno</li></a><br><br>

</center>
</body>
</html>