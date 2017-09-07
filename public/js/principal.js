Storage.prototype.setObject = function(key,value){
	console.log(JSON.stringify(value));
	this.setItem(key,JSON.stringify(value));
}

Storage.prototype.getObject = function(key){
	var value = this.getItem(key);
	return value && JSON.parse(value);
}

function obtenerMiPosicion(callback){
	console.log('obtenerMiPosicion');
	if (navigator.geolocation) {
		//ObtenerMiUbicacion de LocalStora
		var miPosicion = obtenerMiPosicionEnLocalStorage();
		console.log(miPosicion);
		if(miPosicion == null
			|| chequearSiMiPosicionEsValida(miPosicion)){
    		navigator.geolocation.getCurrentPosition(
    			function(position){
    				callback(position);
    				guardarMiPosicionEnLocalStorage(position);
    			}
    			,mostrarError);
    	}else{
    		callback(miPosicion);
    	}
  	}else{
   		//alert("La Geolocalización no es soportada por este navegador");
   		mostrarError({'code':4});
  	}
}
function chequearSiMiPosicionEsValida(position){
	let secondsAgo = Date.now() - (20*1000); //valida por 20 segundos
	if(position.timestamp > secondsAgo){
		console.log('valida');
		return true; 
	}
	return false;
}
function guardarMiPosicionEnLocalStorage(position){
	localStorage.setObject(position);
}
function obtenerMiPosicionEnLocalStorage(){
	return localStorage.getObject("miPosicion");
}

function mostrarMiPosicionEnMapa(position){
	//alert("Latitud: " + position.coords.latitude + ", Longitud: " + position.coords.longitude);
      var loc={
          title:'Aqui estoy',location:{lat:position.coords.latitude, lng:position.coords.longitude}
      };
      var pos=loc.location;
              var tit=loc.title;
      var marker=new google.maps.Marker({
                  map:map,
                  position:pos,
                 title:tit,
                 //contentString:contentString,
                 animation:google.maps.Animation.DROP,
                  
              });
}

function mostrarError(error) {
    var errores = {1: 'Permiso denegado', 2: 'Posición no disponible', 3: 'Expiró el tiempo de respuesta', 4:'Navegador no compatible'};
	alert("Error: " + errores[error.code]);
}
