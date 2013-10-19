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
	ajax.open("GET","agregarusuario.php?nombre="+id,true);
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

registrar.onclick = function()
{
	regUser();
}

window.onload = function()
{
	cargarContenido();
}