<!DOCTYPE html>
<html>
<head>
<style>
    html,body{
        font-family: Arial,sans-serif;
        height: 100%;
        margin: 0;
        padding: 0;
    }
    #map{
        height: 90%;
        width: 70%;
        margin-left: 202px;
        margin-top: 30px;
    }
</style>
    <title></title>
</head>
<body>
<div id="map">
</div>
<script type="text/javascript">// <![CDATA[
if (navigator.geolocation) {
  var tiempo_de_espera = 3000;
  navigator.geolocation.getCurrentPosition(mostrarCoordenadas, mostrarError, { enableHighAccuracy: true, timeout: tiempo_de_espera, maximumAge: 0 } );
}
else {
  alert("La Geolocalización no es soportada por este navegador");
}

function mostrarCoordenadas(position) {
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
</script>

<script>
var map;
    var markers=[];

    function initMap(){
        map=new google.maps.Map(document.getElementById('map'),{
            center:{lat: -26.8331542, lng: -65.2037953},
            zoom:10
        });

        var locations=[
       
        {title:'{{$farm->nombre}}',location: {lat:{{$farm->latitud}},lng:{{$farm->longitud}} } },
    
        ];
             var largeInfowindow=new google.maps.InfoWindow({});
     
        var bounds= new google.maps.LatLngBounds();
  //var iconBase = 'https://maps.google.com/mapfiles/kml/shapes/';
       for(var i=0;i < locations.length; i++){
            var position=locations[i].location;
            var title=locations[i].title;
            var contentString=locations[i].contentString;
            var marker=new google.maps.Marker({
                map:map,
                position:position,
               title:title,
                icon: "{{asset('img/farm.png')}}",
               //contentString:contentString,
               animation:google.maps.Animation.DROP,
                id:i
            });
            markers.push(marker);
            bounds.extend(marker.position);
            marker.addListener('click',function(){
               populateInfoWindow(this,largeInfowindow);
         });
        }
        map.fitBounds(bounds);
        function populateInfoWindow(marker,infowindow){
            if(infowindow.marker!=marker){
                infowindow.marker=marker;
                infowindow.setContent('<div>'+marker.title+'</div>' );
            
                infowindow.open(map,marker);
                infowindow.addListener('closeclick',function(){
                    infowindow.setMarker(null);
                });
            }
        }
    }
        
    
</script>

<script async defer src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDGWDtVZrVceFt6SZrg3GI8YRVms4C-j0c&v=3&callback=initMap"></script>
</body>
</html>
