
function obtenerMiPosicion(callback){
	if (navigator.geolocation) {
    var tiempo_de_espera = 3000;
    navigator.geolocation.getCurrentPosition(callback);
  }
  else {
    alert("La Geolocalización no es soportada por este navegador");
  }
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
        var errores = {1: 'Permiso denegado', 2: 'Posición no disponible', 3: 'Expiró el tiempo de respuesta'};
        alert("Error: " + errores[error.code]);
      }

Storage.prototype.setObject = function(key,value){
	this.setItem(key,
		JSON.stringify(value));
}

Storage.prototype.getObject = function(key){
	var value = this.getItem(key);
	return value && JSON.parse(value);
}