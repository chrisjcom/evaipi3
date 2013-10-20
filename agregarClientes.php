<?php
	error_reporting(E_ALL ^ E_NOTICE);
	// $nombre = $_POST['nombre'];
	// $depto = $_POST['departamento'];
	// $sexo = $_POST['sexo'];
	// $edad = $_POST['edad'];
	// $efectivo = $_POST['efectivo'];

	$nombre = 'Griss';
	$depto = 'Ahuachapán';
	$sexo = 'F';
	$edad = 24;
	$efectivo = 100;

	try
	{
		$client = new soapClient('http://localhost/evaipi3/ws/ws.php?wsdl');
		$respuesta = $client->agregarCliente(array('nombre'=>$nombre,'departamento'=>$depto,'sexo'=>$sexo,'edad'=>$edad,'efectivo'=>$efectivo));
		print_r($respuesta);
	} catch(soapFault $error)
	{
		die($error->getMessage());
	}
?>