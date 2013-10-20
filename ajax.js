function nuevoAjax()
{
	var xmlhttp=false;
	try
	{
		xmlhttp = new ActivexObject('Msxml2.XMLHTTP');
	} catch(e)
	{
		try
		{
			xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');
		} catch(e)
		{
			xmlhttp = false;
		}
	}

	if (!xmlhttp && typeof XMLHttpRequest != 'undefined')
	{
		xmlhttp = new XMLHttpRequest();
	}
	return xmlhttp;
}

//Envío de datos por GET
function saludar()
{
	var id = document.getElementById('idCl').value;
	ajax=nuevoAjax();
	ajax.open("GET","saludar.php?idClient="+id,true);
	ajax.onreadystatechange = function()
	{
		if (ajax.readyState = 4)
		{
			document.getElementById('datosCliente').innerHTML = ajax.responseText
		}
	}
	ajax.send(null)
	document.getElementById('datosCliente').style.textAlign = 'center';
}

function registrar()
{
	nombre = document.getElementById('nombre').value;
	depto = document.getElementById('departamento').value;
	sexo = document.getElementById('sexo').value;
	edad = document.getElementById('edad').value;
	efectivo = document.getElementById('efectivo').value;
	ajax=nuevoAjax();
	ajax.open("GET","agregarClientes.php?nombre="+nombre+"&departamento="+depto+"&sexo="+sexo+"&edad="+edad+"&efectivo="+efectivo,true);
	ajax.onreadystatechange = function()
	{
		if (ajax.readyState = 4)
		{
			document.getElementById('mostrarClientes').innerHTML = ajax.responseText
		}
	}
	ajax.send(null)
}

function verDatos()
{
	var id = document.getElementById('idCl').value;
	ajax=nuevoAjax();
	ajax.open("GET","verDatos.php?idClient="+id,true);
	ajax.onreadystatechange = function()
	{
		if (ajax.readyState = 4)
		{
			document.getElementById('datosCliente').innerHTML = ajax.responseText
		}
	}
	ajax.send(null)
	document.getElementById('datosCliente').style.textAlign = 'center';
}

//Carga de Contenidos
function cargarContenido()
{
	var contenedor = document.getElementById('mostrarClientes');
	ajax=nuevoAjax();
	ajax.open("GET","mostrarClientes.php",true);
	ajax.onreadystatechange = function()
	{
		if (ajax.readyState = 4)
		{
			contenedor.innerHTML = ajax.responseText
		}
	}
	ajax.send(null)
	contenedor.style.textAlign='center'; 
}

document.getElementById('vDatos').onclick = function()
{
	verDatos();
}

document.getElementById('registrar').onclick =function() 
{
	registrar();
}  

document.getElementById('saludar').onclick = function()
{
	saludar();
}
window.onload = function()
{
	cargarContenido();
}