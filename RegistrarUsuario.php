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

		function cargarTabla(){
			var action="ListarUsuarios";
			var tabla="";
			$.ajax({
				data:"action="+action,
			    url:"./despacho/despachoUsuario.php", 
				type:"POST",
				dataType: 'json',
				success:function(data){
					//Recorrimos el Json
					$.each(data, function(i,item){
						//item. el nombre de la columna del array
						tabla+="<tr>";
						tabla+="<td>"+item.RunUsuario+"</td>";
						tabla+="<td>"+item.NombreUsuario+"</td>";
						tabla+="<td>"+item.Contrasena+"</td>";
						tabla+="<td>"+item.Nombre+"</td>";
						tabla+="<td>"+item.Apellidos+"</td>";
						tabla+="<td><a href='#' class='eliminar' runUsuario='"+item.RunUsuario+"'>Eliminar</a></td>";
						tabla+="</tr>";
					});
					//cargamos la estructura de la tabla en el tbody
					$('#cargarTabla').html(tabla);
				}
			});
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
						cargarTabla();	
					}
				});
				return false;
			});
		});


 
		
                 	$('.eliminar').live('click',function(){
				var action="EliminarUsuario"
				$.ajax({
					data:"action="+action+"&runUsuario="+$(this).attr('runUsuario'),
					url:"./despacho/despachoUsuario.php",
					type:"POST",
					success:function(resp){
						if(resp==1){
							$('#Mensaje').html("<h3>Usuario Eliminado Correctamente</h3>");
							cargarTabla();
						}else{
						$('#Mensaje').html("<h3>Usuario No existe</h3>");
						}
					}
				});
			});


	 </script>


</head>
<body onload="cargarTabla()">
<center>
<form id="formulario_registroUsuario" name="formulario_registroUsuario" action="#" method="POST">
<h1>Registro de Usuario</h1><br>
<label>Run:</label><br>
<input type="text" name="txt_run" id="txt_run" placeholder="Run"><br><br>
<label>Contraseña:</label><br>
<input type="password" name="txt_password" id="txt_password" placeholder="Contraseña"><br><br>
<label>Nombre de Usuario:</label><br>
<input type="text" name="txt_username" id="txt_username" placeholder="Nombre de Usuario"><br><br>
<label>Nombres:</label><br>
<input type="text" name="txt_nombres" id="txt_nombres" placeholder="Nombres"><br><br>
<label>Apellidos:</label><br>
<input type="text" name="txt_apellidos" id="txt_apellidos" placeholder="Apellidos"><br><br>
<input type="submit" name="btn_docente" id="btn_docente" value="Ingresar"><br><br>

</form>
<div id="Mensaje"></div><br><br>

<table border="1">
	<thead>
		<th colspan="6">Proveedores</th>
		<tr>
			<td>Run</td>
			<td>Nombre de Usuario</td>
			<td>Contraseña</td>
			<td>Nombre</td>
			<td>Apellidos</td>
			<td colspan="1">Accion</td>
		</tr>
	</thead>
	<tbody id="cargarTabla"></tbody>
</table>

<br><br>

<a href="Portal.php"><li>Portal</li></a><br><br>
<a href="RegistrarUsuario.php"><li>Registro Usuario </li></a><br><br>
<a href="RegistrarProducto.php"><li>Registro Producto</li></a><br><br>
<a href="RegistrarProveedor.php"><li>Registro Proveedor</li></a><br><br>
<a href="Calendario.php"><li>Calendario</li></a><br><br>

</center>
</body>
</html>