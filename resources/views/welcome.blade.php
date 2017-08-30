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
        height: 100%;
    }
</style>
    <title></title>
</head>
<body>
<div id="map">
</div>
<script>
    var map;
    var markers=[];
    function initMap(){
        map=new google.maps.Map(document.getElementById('map'),{
            center:{lat: -26.8331542, lng: -65.2037953},
            zoom:13
        });

        var locations=[
        @foreach($farmacias as $far)
        {title:'{{$far->nombre}}',location: {lat:{{$far->latitud}},lng:{{$far->longitud}}  }},
       
         @endforeach
        ];
             var largeInfowindow=new google.maps.InfoWindow({
  });
     
        var bounds= new google.maps.LatLngBounds();
       for(var i=0;i < locations.length; i++){
            var position=locations[i].location;
            var title=locations[i].title;
            var contentString=locations[i].contentString;
            var marker=new google.maps.Marker({
                map:map,
                position:position,
               title:title,
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
                infowindow.setContent('<div>'+marker.title+'</div>');
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
