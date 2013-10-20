<?php
	error_reporting(E_ALL ^ E_NOTICE);
	$idCl = $_GET['idClient'];
	include ('nusoap.php');

	$client = new nusoap_client('http://localhost/evaipi3/ws/ws.php?wsdl','wsdl');
	$err = $client->getError();
	if($err)
	{
		echo '<h2>Constructor Error</h2><pre>'.$err.'</pre>';
	}

	$param = array('idCl'=>$idCl);
	$result = $client->call('mostrarDatos',$param);

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
		}
	}
?>