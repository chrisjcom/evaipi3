<?php        
include_once('../nusoap.php');
$URL='http://localhost/evaipi3/ws';
$server= new soap_server();
$server->configureWSDL('ipieval3', $URL);
$server->wsdl->schemaTargetNamespace=$URL;
include_once('../conexion.php');


//metodo saludar
$server->register('saludar',array('idCl'=>'xsd:int'), array('return'=>'xsd:string'), $URL);

function saludar($idCl)
{
	$conexion = new conexion("localhost","clientes","root", "");
	$query="select nombre from clientes where idCliente=".$idCl."";
	$result = $conexion->Extraer($query);
	$usuario='';
	while($fila=mysqli_fetch_array($result))
	{
		$usuario = $fila[0];
	}	
    $conexion->cerrarConexion();
    return 'Hola! '.$usuario;
}

//metodo para registrar cliente en base de datos
$server->register('agregarCliente',array('nombre'=>'xsd:string','departamento'=>'xsd:string','sexo'=>'xsd:string','edad'=>'xsd:int','efectivo'=>'xsd:int'), array('return'=>'xsd:string'), $URL);

function agregarCliente($nombre, $depto, $sexo, $edad, $efectivo)
{
	$conexion = new conexion("localhost","clientes","root", "");
	$query="insert into clientes(nombre, departamento, sexo, edad, efectivo) values('".$nombre."','".$depto."','".$sexo."',".$edad.",".$efectivo.")";
	$result = $conexion->CUD($query);
	if ($result)
	{
		$conexion->cerrarConexion();
	    return "DATOS AGREGADOS EXITOSAMENTE";
	}
	else
	{
		$conexion->cerrarConexion();
	    return "ERROR AL AGREGAR DATOS";
	}
}

if ( !isset( $HTTP_RAW_POST_DATA ) ) $HTTP_RAW_POST_DATA =file_get_contents( 'php://input' );
$server->service($HTTP_RAW_POST_DATA);
?>