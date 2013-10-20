<?php
	error_reporting(E_ALL ^ E_NOTICE);
	$idCl = $_GET['idCl'];
	try
	{
		$client = new soapClient('http://localhost/evaipi3/ws/ws.php?wsdl');
		$respuesta = $client->saludar(array('idCl'=>$idCl));

		print_r($respuesta);
	} catch(soapFault $error)
	{
		die($error->getMessage());
	}
?>