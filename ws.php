<?php        
require_once('nusoap.php');
$URL='http://localhost/evaipi3/ws';
$server= new soap_server();
$server->configureWSDL('ipieval3', $URL);
$server->wsdl->schemaTargetNamespace=$URL;



//metodo saludar
$server->register('saludo',array('nombre'=>'xsd:string'), array('return'=>'xsd:string'), $URL);


function saludo(){
        return new soapval('return','xsd:string', 'Hola!, saludos desde el web service');
}
//metodo para registrar cliente en base de datos
$server->register('agregarCliente',array('nombre'=>'xsd:string','departamento'=>'xsd:string','sexo'=>'xsd:string','edad'=>'xsd:int','efectivo'=>'xsd:int'), array('return'=>'xsd:string'), $URL);

function agregarCliente($nombre, $depto, $sex, $edad, $dinero){
include './conexion.php';
$link=conectar();
mysql_select_db("ipi-eva3",$link);
$query="insert into cliente(nombre, departamento, sexo, edad, efectivo) values('".$nombre."','".$departamento."','".$sexo."','".$edad."','".$efectivo."')";
if ($result=mysql_query($query, $link)) {
        return new soapval('return'.'xsd:string',"DATOS AGREGADOS EXITOSAMENTE");
}else{

        return new soapval('return'.'xsd:string',"ERROR AL AGREGAR DATOS");
        }
}
?>