<?php        
require_once('nusoap.php');
$URL='http://localhost/evaipi3/ws';
$server= new soap_server();
$server->configureWSDL('ipieval3', $URL);
$server->wsdl->schemaTargetNamespace=$URL;
include_once('conexion.php');
$conexion = new conexion("localhost","clientes","root", "");

//metodo saludar
$server->register('saludar',array('nombre'=>'xsd:string'), array('return'=>'xsd:string'), $URL);

function saludar()
{
    return new soapval('return','xsd:string', 'Hola!, saludos desde el web service');
}

//metodo para registrar cliente en base de datos
$server->register('agregarCliente',array('nombre'=>'xsd:string','departamento'=>'xsd:string','sexo'=>'xsd:string','edad'=>'xsd:int','efectivo'=>'xsd:double'), array('return'=>'xsd:string'), $URL);

function agregarCliente($nombre, $depto, $sex, $edad, $dinero)
{
	$query="insert into cliente(nombre, departamento, sexo, edad, efectivo) values('".$nombre."','".$departamento."','".$sexo."',".$edad.",".$efectivo.")";
	$result = $conexion->CUD($query);
	if ($result)
	{
	    return new soapval('return'.'xsd:string',"DATOS AGREGADOS EXITOSAMENTE");
	}
	else
	{
	    return new soapval('return'.'xsd:string',"ERROR AL AGREGAR DATOS");
	}
}
?>