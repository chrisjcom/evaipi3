<?php
	include_once('conexion.php');
	$conexion = new conexion("localhost","clientes","root", "");
	$sql = 'select idCliente,nombre,edad from clientes';
	$resultado = $conexion->Extraer($sql);
	echo 'ID, Nombre, Edad <br>';
	while($fila=mysqli_fetch_array($resultado))
	{
		echo $fila[0].','.$fila[1].','.$fila[2].'<br>';
	}
	$conexion->cerrarConexion();
?>