<?php
	error_reporting(E_ALL ^ E_NOTICE);
	$nombre = $_GET['nombre'];
	$depto = $_GET['depto'];
	$sexo = $_GET['sexo'];
	$edad = $_GET['edad'];
	$efectivo = $_GET['efectivo'];

	try
	{
		$client = new soapClient('http://localhost/evaipi3/ws/ws.php?wsdl');
		$respuesta = $client->agregarCliente(array('nombre'=>$nombre,'departamento'=>$depto,'sexo'=>$sexo,'edad'=>$edad,'efectivo'=>$efectivo));
		print_r($respuesta);
	} catch(soapFault $error)
	{
		die($error->getMessage());
	}
	include('mostrarClientes.php')
?>