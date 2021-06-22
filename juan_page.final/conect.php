<html>
<head>
	<title>Eliminar registros</title>
</head>
<body>
	<marquee direction= "rigth"><h2>Busqueda y eliminacion de mensajes</h2></marquee><hr />
	<h2 align="center">Eliminar registros</h2>
</div>
<form name="f" method="POST" action="consulta_elimina.php"></form>
<div align="center">
	<table width="450" border="0" align="center">
		<tr>
			<td width="157">clave del registro</td>
			<td width="199"><input type="text" name="id"></td>
			<td width="79"><input type="submit" name="buscar" value="Buscar"></td>
		</tr>
	</table>
</div>
</form>
</body>
</html>
<?php
if(isset($_POST["buscar"])){
	$conex = mysqli_connect("localhost", "juan_jesus", "pasword19", "curso_juan");
	$id = $_POST["id"];
	$consulta = "select * from mensajes where id='$id'";
	$resultado = mysqli_query($conex, $consulta);
if($resultado){
	while ($row=$resultado->fetch_array()){
		$id = $row["id"];
		$nombre = $row["nombre"];
		$email = $row["email"];
		$mensaje = $row["mensaje"];

	echo "<hr><h1 align='center'>datos del registro</h1>
		<form name='g' method = 'POST' action='consulta_elimina.php'>
		<table align='center' border=0>
		<tr><td>clave de area</td><td><input type='text' name='id_c' value='$id'></td></tr>
		<tr><td>clave de area</td><td><input type='text' name='nombre' value='$nombre'></td></tr>
		<tr><td>clave de area</td><td><input type='text' name='email' value='$email'></td></tr>
		<tr><td>clave de area</td><td><input type='text' name='id_c' value='$mensaje'></td></tr>
		</table>
		</div>
		<p align='center'><input type = 'submit' name= 'eliminar' value='Eliminar'/><p/>
		<form/>";
	}}
} if (isset($_POST["eliminar"])) {
	$conex= mysqli_connect("localhost", "juan_jesus", "pasword19", "curso_juan");
		$id= $_POST["id_c"];
	$consulta = "delete from mensajes where id='$id'";
	$resultado = mysql_query($conex, $consulta);

	if ($resultado) {
		echo "<form name='f' method = 'POST' action= 'consulta_elimina.php'>
		<h1 align='center'>Registro eliminado</h1>
		</form>";
		
	}else{
		echo "<form name='f' method = 'POST' action= 'consulta_elimina.php'>
		<h1 align='center'>ERROR</h1>
		</form>";
	}
}

