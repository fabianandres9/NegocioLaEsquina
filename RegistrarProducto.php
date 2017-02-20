<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
	<title>Alumno</title>
<script type="text/javascript" src="./js/jquery_import.js"></script>

	<script type="text/javascript">
 	

    	function LimpiarCajas(){
		   $('#txt_run').val("");
           $('#txt_password').val("");
           $('#txt_nombres').val("");
           $('#txt_apellidos').val("");
           $('#txt_username').val("");
		}

 </script>
  <script type="text/javascript">
			$(document).ready(function(){
			$('#formulario_registroUsuario').submit(function(){
				var action="InsertarUsuario";
				$.ajax({
					data:$(this).serialize()+"&action="+action,
					url:"./despacho/despachoUsuario.php",
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
<form id="formulario_registroUsuario" name="formulario_registroUsuario" action="#" method="POST">
<h1>Registro de Producto</h1><br>
<label>Nombre Producto:</label><br>
<input type="text" name="txt_nombre" id="txt_nombre" placeholder="Nombre Producto"><br><br>
<label>Cantidad:</label><br>
<input type="number" name="txt_cantidad" id="txt_cantidad" placeholder="Cantidad"><br><br>
<label>Precio:</label><br>
<input type="number" name="txt_precio" id="txt_precio" placeholder="Precio"><br><br>
<label>Tipo Producto:</label><br>
<input type="text" name="txt_nombres" id="txt_nombres" placeholder="Nombres"><br><br>
<label>Subtipo Producto:</label><br>
<input type="text" name="txt_apellidos" id="txt_apellidos" placeholder="Apellidos"><br><br>
<label>Proveedor:</label><br>
<input type="text" name="txt_apellidos" id="txt_apellidos" placeholder="Apellidos"><br><br>
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