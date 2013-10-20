<?php
	error_reporting(E_ALL ^ E_NOTICE);
	$nombre = $_GET['nombre'];
	$depto = utf8_decode($_GET['departamento']);
	$sexo = $_GET['sexo'];
	$edad = $_GET['edad'];
	$efectivo = $_GET['efectivo'];


	include ('nusoap.php');

	$client = new nusoap_client('http://localhost/evaipi3/ws/ws.php?wsdl','wsdl');
	$err = $client->getError();
	if($err)
	{
		echo '<h2>Constructor Error</h2><pre>'.$err.'</pre>';
	}

	$param = array('nombre'=>$nombre,'departamento'=>$depto,'sexo'=>$sexo,'edad'=>$edad,'efectivo'=>$efectivo);
	$result = $client->call('agregarCliente',$param);

	if($client->fault)
	{
		echo '<h2>Fault</h2><pre>';
		print_r($result);
		echo '</pre>';
	}
	else
	{
		$err = $client->getError();
		if($err)
		{
			echo '<h2>Error</h2><pre>'.$err.'</pre>';
		}
		else
		{
			print_r($result);
			echo '<br>';
		}
	}
	include('mostrarClientes.php');

	// try
	// {
	// 	$client = new soapClient('http://localhost/evaipi3/ws/ws.php?wsdl');
	// 	$param = array('nombre=>'$nombre,'departamento'=>$depto,'sexo'=>$sexo,'edad'=>$edad,'efectivo'=>$efectivo);
	// 	$respuesta = $client->agregarCliente(var_dump($param));
	// 	print_r($respuesta);
	// } catch(soapFault $error)
	// {
	// 	die($error->getMessage());
	// }
?>