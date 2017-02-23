<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
	<title>Proveedor</title>
<script type="text/javascript" src="./js/jquery_import.js"></script>

	<script type="text/javascript">
 	

    	function LimpiarCajas(){
		   $('#txt_run').val("");
           $('#txt_nombre').val("");
           $('#txt_direccion').val("");
           $('#txt_telefono').val("");
           $('#txt_correo').val("");
           $('#txt_resena').val("");
		}

		function cargarTabla(){
			var action="ListarProveedores";
			var tabla="";
			$.ajax({
				data:"action="+action,
				url:"./despacho/despachoProveedor.php",
				type:"POST",
				dataType: 'json',
				success:function(data){
					//Recorrimos el Json
					$.each(data, function(i,item){
						//item. el nombre de la columna del array
						tabla+="<tr>";
						tabla+="<td>"+item.RunProveedor+"</td>";
						tabla+="<td>"+item.Nombre+"</td>";
						tabla+="<td>"+item.Direccion+"</td>";
						tabla+="<td>"+item.Telefono+"</td>";
						tabla+="<td>"+item.Correo+"</td>";
						tabla+="<td>"+item.Resena+"</td>";
						tabla+="<td><a href='#' class='eliminar' runProveedor='"+item.RunProveedor+"'>Eliminar</a></td>";
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
			$('#formulario_registroProveedor').submit(function(){
				var action="InsertarProveedor";
				$.ajax({
					data:$(this).serialize()+"&action="+action,
					url:"./despacho/despachoProveedor.php",
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

    </script> 
	
	 <script type="text/javascript">
		
                 	$('.eliminar').live('click',function(){
				var action="EliminarProveedor"
				$.ajax({
					data:"action="+action+"&runProveedor="+$(this).attr('runProveedor'),
					url:"./despacho/despachoProveedor.php",
					type:"POST",
					success:function(resp){
						if(resp==1){
							$('#Mensaje').html("<h3>Proveedor Eliminado Correctamente</h3>");
							cargarTabla();
						}else{
						$('#Mensaje').html("<h3>Proveedor No existe</h3>");
						}
					}
				});
			});

    </script>

</head>
<body onload="cargarTabla()">
<center>
<form id="formulario_registroProveedor" name="formulario_registroProveedor" action="#" method="POST">
<h1>Registro de Proveedor</h1><br>
<label>Run:</label><br>
<input type="text" name="txt_run" id="txt_run" placeholder="Run"><br><br>
<label>Nombre:</label><br>
<input type="text" name="txt_nombre" id="txt_nombre" placeholder="Nombre"><br><br>
<label>Direccion:</label><br>
<input type="text" name="txt_direccion" id="txt_direccion" placeholder="Direccion"><br><br>
<label>Telefono:</label><br>
<input type="number" name="txt_telefono" id="txt_telefono" placeholder="telefono"><br><br>
<label>Correo:</label><br>
<input type="email" name="txt_correo" id="txt_correo" placeholder="Correo"><br><br>
<label>Reseña:</label><br>
<textarea name="txt_resena" id="txt_resena" rows="10" cols="50"></textarea><br><br>
<input type="submit" name="btn_docente" id="btn_docente" value="Ingresar/Actualizar"><br><br>

</form>
<div id="Mensaje"></div><br><br>


<table border="1">
	<thead>
		<th colspan="6">Proveedores</th>
		<tr>
			<td>Rut</td>
			<td>Nombre</td>
			<td>Direccion</td>
			<td>Telefono</td>
			<td>Correo</td>
			<td>Descripcion</td>
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