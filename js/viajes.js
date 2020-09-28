var map;
function initMap() {
//function initMap(){
	map = new google.maps.Map(document.getElementById('mapaGoogle'), {
		center: {lat: -12.789924, lng: -68.52355},
		zoom: 4,
		mapTypeControl: false
	});
  	if (navigator.geolocation) 
  	{
    	navigator.geolocation.getCurrentPosition(function (position) 
    	{
     	//console.log(position.coords.latitude);
     	//console.log(position.coords.longitude);
        initialLocation = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
        map.setCenter(initialLocation);
 		});
 	}

	infowindow = new google.maps.InfoWindow({});
};


function empezarViaje(){
	if (comprobarNombre() && comprobarEscala()) 
	{
		empezarRealmenteElViaje();
	}
	else{
		alert("Falta completar Nombre y/o Escala");
	}
}

function comprobarNombre(){
	var nombre = $("#nombreViaje").val();
	if (nombre == "") {
		return false;
	}
	else{
		return true;
	}
}

function comprobarEscala(){

	var escala = document.querySelector("#escalaInput").value;

	if (escala) 
	{
		return true;
	}
	else
	{
		return false;
	}
}


function empezarRealmenteElViaje()
{
	document.getElementById("fechaDesde").disabled = false;
	document.getElementById("fechaHasta").disabled = false;

	document.getElementById("citas").disabled = false;
	document.getElementById("fotos").disabled = false;
	document.getElementById("comer").disabled = false;
	document.getElementById("bailar").disabled = false;
	document.getElementById("deportes").disabled = false;
	document.getElementById("musica").disabled = false;
	document.getElementById("cultura").disabled = false;
	document.getElementById("amigos").disabled = false;

	var agregarPuntito = document.getElementById("agregarPuntito");
	agregarPuntito.classList.remove("oculto");

	var empezarViajeBoton = document.getElementById("empezarViajeBoton");
	empezarViajeBoton.classList.add("oculto");

	var cajaDeConfirmarViajeBoton = document.getElementById("cajaDeConfirmarViajeBoton");
	cajaDeConfirmarViajeBoton.classList.remove("oculto");

}

//Eliminar despues
empezarRealmenteElViaje();

var listaDePuntos = [];

function cambiarBotoncito(){
	var agregarPuntito = document.getElementById("agregarPuntito");
	var confirmarPuntito = document.getElementById("confirmarPuntito");
	confirmarPuntito.classList.toggle("oculto");
	agregarPuntito.classList.toggle("oculto");
}

function agregarPuntito(){

	cambiarBotoncito();

	document.getElementById("mapaGoogle");
	var myLatlng = new google.maps.LatLng(-32.789924,-62.52355);
	var marker = new google.maps.Marker({
		draggable: true,
	    position: myLatlng,
	    fechaDesde: "",
	    fechaHasta: "",
	    intereses:[],
	    title:"Hello World!"
	});

	marker.addListener('click', function() 
	{
		if (listaDePuntos[listaDePuntos.length-1] == this) 
		{
			console.log("puto trolo");
		}
		
	    for (var i = listaDePuntos.length - 1; i >= 0; i--) 
	    {

			
    		/*
			if (i == listaDePuntos.length-1) 
			{

			}else
			{
				
				{

				}
				else
				{
				listaDePuntos[i].setIcon('http://maps.google.com/mapfiles/ms/icons/green-dot.png')
				this.setIcon('http://maps.google.com/mapfiles/ms/icons/orange-dot.png')
				}
			}
			*/
		}

  	});

	// To add the marker to the map, call setMap();
	marker.setMap(map);
	listaDePuntos.push(marker);


}

//BORRAR DESPUES
document.getElementById("fechaDesde").value = "2020-09-29";
document.getElementById("fechaHasta").value = "2020-09-30";
	


function confirmarPuntito(){
	if(comprobarFechaExiste())
	{
		if (comprobarFechaLimites()) 
		{
			if (comprobarGustos())
			{
				guardarPuntito();
			}
		}
	}
	
}

function comprobarFechaExiste(){


	console.log(fechaDesde);
	console.log(fechaHasta);

	if (!fechaDesde || !fechaHasta) 
	{
		alert("Falta completar fechas");
		return false;
	}else
	{
		return true;
	}
}

function comprobarFechaLimites(){
	var fechaDesde = document.getElementById("fechaDesde").value;
	var fechaDesde2 = new Date(fechaDesde);

	var fechaHasta = document.getElementById("fechaHasta").value;
	var fechaHasta2 = new Date(fechaHasta);

	var fechaHoy = new Date();
	
	var fechaDentroDeDosAnios = new Date(new Date().setFullYear(new Date().getFullYear() + 2));
	
	if(fechaDesde2 < fechaHoy){
		alert("La fecha de inicio no puede ser anterior a la de hoy");
		return false;
	}
	else{
		if(fechaHasta2 > fechaDentroDeDosAnios)
		{
			alert("La fecha final no puede ser irse tan lejos! Máximo 2 años. Mil disculpas capo.")
			return false;
		}
		else{
			if (fechaDesde2 > fechaHasta2) 
			{
				alert("La fecha de incio no puede ser posterior a la de fin.")
				return false;
			}
			else
			{
				return true;
			}
		}
	}
}

function comprobarGustos()
{
	contador = 0;
	var listaIntereses = document.getElementsByClassName("checkInteres");
	for (var i = listaIntereses.length - 1; i >= 0; i--) {
		if (listaIntereses[i].checked) {
			contador = contador + 1;
		}
	} if (contador == 0) 
	{
		alert("Debe seleccionar al menos un gusto");
		return false;
	}else
	{
		return true;
	}

}



function guardarPuntito()
{
	var fechaDesde = document.getElementById("fechaDesde").value;
	var fechaHasta = document.getElementById("fechaHasta").value;
	var intereses = document.getElementsByClassName("checkInteres");

	estePunto =	listaDePuntos[listaDePuntos.length-1];

	estePunto.fechaDesde = fechaDesde;
	estePunto.fechaHasta = fechaHasta;
	estePunto.intereses = intereses;

	estePunto.setDraggable(false);
	estePunto.setIcon('http://maps.google.com/mapfiles/ms/icons/green-dot.png')


	cambiarBotoncito();

	if (listaDePuntos.length == 1) 
	{
		limpiarCampos();
		return true;
	}
	else
	{
		if (estePunto.fechaDesde < listaDePuntos[listaDePuntos.length-2].fechaHasta) 
		{
			alert("La fecha de inicio de este punto es anterior a la de finalización del punto anterior. Podés estar en dos lados a la vez vos? No. Entonces cambiala.")
		}
		else
		{
			listaDeLineas = [];

			for (var i = listaDePuntos.length - 1; i >= 0; i--) {
				var posX = listaDePuntos[i].getPosition().lat();
				var posY = listaDePuntos[i].getPosition().lng();
				var myLatLng = new google.maps.LatLng(posX, posY);
				listaDeLineas.push(myLatLng);
			}

			
			flightPath = new google.maps.Polyline(
			{
			    path: listaDeLineas,
			    strokeColor: "#0000FF",
			    strokeOpacity: 1.0,
			    strokeWeight: 2
	  		});

	  		/*Con esto se setea la linea en el mapa*/
			flightPath.setMap(map);

			limpiarCampos();
		}
	}
}



function limpiarCampos()
{
	document.getElementById("fechaDesde").value = "";
	document.getElementById("fechaHasta").value = "";
}