<?php
	include_once('conexion.php');
	$conexion = new conexion("localhost","clientes","root", "");
	$sql = 'select * from clientes';
	$resultado = $conexion->Extraer($sql);
	echo '***************--***************--***************--***************--***************<br>';
	while($fila=mysqli_fetch_array($resultado))
	{
		echo 'ID Cliente: '.$fila[0].'<br>';
		echo 'Nombre: '.$fila[1].'<br>';
		echo 'Departamento: '.$fila[2].'<br>';
		echo 'Sexo: '.$fila[3].'<br>';
		echo 'Edad: '.$fila[4].'<br>';
		echo 'Efectivo: '.$fila[5].'<br>';
		echo '***************--***************--***************--***************--***************';
	}
	mysqli_close($conexion);
?>