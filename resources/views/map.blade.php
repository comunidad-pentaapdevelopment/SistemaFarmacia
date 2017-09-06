<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SISTEMA FARMACIA</title>

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="vendor/bootstrap/css/miEstilo.css" rel="stylesheet">

    <!-- Theme CSS -->
    <link href="{{asset('css/freelancer.min.css')}}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{asset('vendor/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
      <!--<link href="{{asset('css/home.css')}}" rel="stylesheet"> -->
      <link href="{{asset('css/bxslider.css')}}" rel="stylesheet">

      <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

</head>

<body id="page-top" class="index">

  <div id="skipnav"><a href="#maincontent">Skip to main content</a></div>

    <nav id="mainNav" id="nav" class="navbar navbar-default navbar-fixed-top navbar-custom">
        <div class="container" >
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="#page-top">Encontra tu Farmacia</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li class="page-scroll">
                        <a href="http://localhost:8000/#cerca">Buscar Cerca mio</a>
                    </li>
                    <li class="page-scroll">
                        <a href="http://localhost:8000/#ubicacion">Buscar En Una Ubicación</a>
                    </li>
                    <li class="page-scroll">
                        <a href="#">Mapa</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

  <div id="map">
  </div>

    <!-- jQuery -->
    <script src="vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>

    <!-- Contact Form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>

    <!-- Theme JavaScript -->
    <script src="js/freelancer.min.js"></script>
    <script src="js/bxslider.js"></script>  

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
              zoom:0
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
