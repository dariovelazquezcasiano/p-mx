	//funcion para actualizar carpetas de dias
function actualizarCarpetas() {
		//metodo para carpetas____________________________________________
		
		//san blas
		var carpeta = {carpeta:'3'};

		$.ajax({
			type: 'POST',
			url: '../blank_carpetas/blank_carpetas.php',
			data: carpeta,
			beforesend: function() {
				console.log('peticion de carpetas enviada');
			},
			success: function(response) {
				//console.log(response);
				var resultado=JSON.parse(response);
				var lista = '';
				$.each(resultado, function(index, value) {
		            lista = '<li><button onClick="verVideos('+"'"+'3'+"'"+','+"'"+value +"'"+');" class="fecha">'+ value + '</button></li>' + lista;
		        });

		        $("#sanBlas").html(lista);
					
			},
			error: function() {
				console.log('A ocurrido un error');
			},
			timeout: 5000
		});

		//caimanero...................................................
		var carpeta = {carpeta:'4'};

		$.ajax({
			type: 'POST',
			url: '../blank_carpetas/blank_carpetas.php',
			data: carpeta,
			beforesend: function() {
				//console.log('peticion de carpetas enviada');
			},
			success: function(response) {
				//console.log(response);
				var resultado=JSON.parse(response);
				var lista = '';
				$.each(resultado, function(index, value) {
		         	lista = '<li><button onClick="verVideos('+"'"+'4'+"'"+','+"'"+value +"'"+');" class="fecha">'+ value + '</button></li>' + lista;
		        });

		        $("#caimanero").html(lista);
					
			},
			error: function() {
				console.log('A ocurrido un error');
			},
			timeout: 5000
		});

		//alhuey...................................................
		var carpeta = {carpeta:'5'};

		$.ajax({
			type: 'POST',
			url: '../blank_carpetas/blank_carpetas.php',
			data: carpeta,
			beforesend: function() {
				//console.log('peticion de carpetas enviada');
			},
			success: function(response) {
				//console.log(response);
				var resultado=JSON.parse(response);
				var lista = '';
				$.each(resultado, function(index, value) {
		        	lista = '<li><button onClick="verVideos('+"'"+'5'+"'"+','+"'"+value +"'"+');" class="fecha">'+ value + '</button></li>' + lista;
		        });

		        $("#alhuey").html(lista);
					
			},
			error: function() {
				console.log('A ocurrido un error');
			},
			timeout: 5000
		});

		//brisas...................................................
		var carpeta = {carpeta:'59'};

		$.ajax({
			type: 'POST',
			url: '../blank_carpetas/blank_carpetas.php',
			data: carpeta,
			beforesend: function() {
				//console.log('peticion de carpetas enviada');
			},
			success: function(response) {
				//console.log(response);
				var resultado=JSON.parse(response);
				var lista = '';
				$.each(resultado, function(index, value) {
		        	lista = '<li><button onClick="verVideos('+"'"+'59'+"'"+','+"'"+value +"'"+');" class="fecha">'+ value + '</button></li>' + lista;
		        });

		        $("#brisas").html(lista);
					
			},
			error: function() {
				console.log('A ocurrido un error');
			},
			timeout: 5000
		});
}

//funcion para ver listado de videos____________________________
function verVideos (caseta,dia) {
		//variables
		var fecha = {caseta:caseta, dia:dia};
		//console.log(caseta, dia);
	$.ajax({
		type: 'POST',
		url: '../blank_videos/blank_videos.php',
		data: fecha,
		beforesend: function() {
			//console.log('peticion de videos enviada');
		},
		success: function(response) {
			var videosJson=JSON.parse(response);
			var listaVideos = '';
			var nombrecaseta = '';
			if (caseta == '3') { nombrecaseta = 'San Blas:';	}
			if (caseta == '4') { nombrecaseta = 'Caimanero:';	}
			if (caseta == '5') { nombrecaseta = 'Alhuey:';	}
			if (caseta == '59') { nombrecaseta = 'Las Brisas:';	}

			nombrecaseta = nombrecaseta + " " + dia;
			$.each(videosJson, function(index, value) {
	             listaVideos = listaVideos + '<li>'+ value + '</li>';
	        });

	        $("#videosTitulo").html(nombrecaseta);
	        $("#videos").html(listaVideos);

	        casetaID = caseta;
	        fechaVideo = dia;
		},
		error: function() {
			console.log('A ocurrido un error');
		},
		timeout: 5000
	});
}

var casetaID = '';
var fechaVideo = '';

$( document ).ready(function() {


	actualizarCarpetas();

	$("#actualizarCarpetas").click(function(){
	actualizarCarpetas();
	});

	$("#actualizarVideos").click(function(){
	verVideos(casetaID,fechaVideo);
	});

});
