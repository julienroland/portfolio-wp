/*
 *
 * JS Document - /js/script.js
 *
 * coded by [YOUR NAME]
 * started at [DATE]
 */

 /* jshint boss: true, curly: true, eqeqeq: true, eqnull: true, immed: true, latedef: true, newcap: true, noarg: true, browser: true, jquery: true, noempty: true, sub: true, undef: true, unused: true, white: false */

// start your work here.
/*;(function($){

  var oMyPosition,
  gGeocoder,
  gMap;
  var villeCentre = [50.4329476, 4.855423]
  var nHeightDoc = (($(window).height())/3)*2;
  var nWidthDoc = ($(window).width())/3;
  /*var generateImageMap = function(){
    var sMapURL = "http://maps.googleapis.com/maps/api/staticmap?",aMapOptions= [];
    aMapOptions.push("center=" + oMyPosition.latitude + ","+oMyPosition.longitude);
    aMapOptions.push("zoom=14");
    aMapOptions.push("size=500x400");
    aMapOptions.push('sensor=false');
    aMapOptions.push('maptype=roadmap');
    $('#imgmap img').attr('src',sMapURL + aMapOptions.join("&"));

  };*/

  /*var fillInformations = function(){
    $('dl.dl-horizontal')
    .find("dt:contains(Latitude)+dd")
    .text(oMyPosition.latitude || "Erreur de calcul")
    .end()
    .find("dt:contains(Longitude)+dd")
    .text(oMyPosition.longitude || "Erreur de calcul")
    .end()
    .find("dt:contains(Altitude)+dd")
    .text(oMyPosition.altitude || "Erreur de calcul")
    .end()

    gGeocoder.geocode({
      location:new google.maps.LatLng(oMyPosition.latitude,oMyPosition.longitude),
    },function(aResults,sStatus){
      if(sStatus ===google.maps.GeocoderStatus.OK)
      {
        $('#map').attr('value',(aResults[0].formatted_address));
      }
      console.log(aResults,sStatus);
    });
  };
  var getPositionSucces = function(oPosition){
    oMyPosition = oPosition.coords;
    fillInformations();
     generateImageMap();
    updateGoogleMapPosition();
  };
  var getPositionError = function(oError){
    console.error(oError);
  };
  var updateGoogleMapPosition= function(){
    var gMyPosition= new google.maps.LatLng(oMyPosition.latitude,oMyPosition.longitude);
    gMap.panTo(gMyPosition);
    createMarker(gMyPosition);
    showMeMyPlace(aResults[0].formatted_address);

  };
  var createMarker = function(position){
    gMarker = new google.maps.Marker({
      position:position,
      map:gMap,
      draggable:true,

    });
  };
  var showMeMyPlace = function (sAddress){
    gGeocoder.geocode({
      address:sAddress,
      content  : contentMarker,
      region:"BE"
    },function(aResults,sStatus){
      if(sStatus === google.maps.GeocoderStatus.OK)
      {
       gMarker.setPosition( aResults[ 0 ].geometry.location);
       gMap.panTo(aResults[0].geometry.location);
     }

   } );
  };

  var generateGoogleMaps = function(){
    gMap = new google.maps.Map(document.getElementById('gmap'),
    {
      center:new google.maps.LatLng(villeCentre[0],villeCentre[1]),
      zoom:9,
      disableDefaultUI:true,
      scrollwheel:false,
      zoomControl:true,
      mapTypeId:google.maps.MapTypeId.ROADMAP,
    });
    var gMyPositionP= new google.maps.LatLng(villeCentre[0],villeCentre[1]);
    createMarker(gMyPositionP);

  };
  $(function(){

    gGeocoder= new google.maps.Geocoder();
    if(navigator.geolocation){
      navigator.geolocation.getCurrentPosition(getPositionSucces,getPositionError);
    }
    generateGoogleMaps();
  });

}).call(this,jQuery);*/

;(function($){
  google.maps.visualRefresh = true;

  var map;

  var geocoder = new google.maps.Geocoder();

  var mapOptions = {
    disableDefaultUI:true,
    scrollwheel:false,
    zoom: 8,
    mapTypeId: google.maps.MapTypeId.HYBRID
  };
  var map = new google.maps.Map(document.getElementById('gmap'),mapOptions);
  var initialize = function(){
   var mapOptions = {
    disableDefaultUI:true,
    scrollwheel:false,
    zoom: 8,
    mapTypeId: google.maps.MapTypeId.HYBRID,
    center:geocoder.geocode({
      address:'Rue Basse-Montagne 40, 5100 Wépion, Belgique',
      region:'BE'
    },function(aResults,sStatus)
    {
     if(sStatus === google.maps.GeocoderStatus.OK)
     {
       map.panTo(aResults[0].geometry.location);

       var myLat = aResults[0].geometry.location.lb;
       var myLg = aResults[0].geometry.location.mb;
       var homePosition= new google.maps.LatLng(myLat,myLg); 
       var content = "J'habite ici !"
       display.setPosition(homePosition);
       display.setContent(content);

       console.log(aResults);
     }
   })
  }
  var map = new google.maps.Map(document.getElementById('gmap'),mapOptions);
  if(navigator.geolocation)
  {  
    navigator.geolocation.getCurrentPosition(PositionSucces,PositionFailed);
  }
  var display = new google.maps.InfoWindow({
    content:"J'habite ici",
    position: new google.maps.LatLng(50,4)
  });
  display.open(map);

  console.log(display);

};
var PositionSucces = function(position){
 var mapOptions = {
  disableDefaultUI:true,
  scrollwheel:false,
  zoom: 8,
  mapTypeId: google.maps.MapTypeId.HYBRID
};
/*var drawLine = function(position){
  var path =[
  new google.maps.LatLng(50.4329476,4.855422999999973),
  position
  ]
  var line = new google.maps.Polyline({
    path:path, 
    strokeColor: '#FF0000',
    strokeOpacity: 1.0,
    strokeWeight: 2,
    geodesic:true,    
  });
  console.log(line);
  line.setMap(map);
};*/
$('#map').change(function(){
 var directionsService = new google.maps.DirectionsService();

 directionsDisplay = new google.maps.DirectionsRenderer();

  var position =document.getElementById('map').value;

 var start = 'Rue Basse-Montagne 40,5100 Wépion,Belgique';
 var end = position;
 var request = {
  origin: start,
  destination: end,
  travelMode: google.maps.TravelMode.DRIVING
};
directionsService.route(request, function(response, status) {
  if (status == google.maps.DirectionsStatus.OK) {
    directionsDisplay.setDirections(response);
  }
});
directionsDisplay.setMap(map);

})
var drawLine = function(position) {
  var directionsService = new google.maps.DirectionsService();

  directionsDisplay = new google.maps.DirectionsRenderer();

  var start = 'Rue Basse-Montagne 40,5100 Wépion,Belgique';
  var end = position;
  var request = {
    origin: start,
    destination: end,
    travelMode: google.maps.TravelMode.DRIVING
  };
  directionsService.route(request, function(response, status) {
    if (status == google.maps.DirectionsStatus.OK) {
      directionsDisplay.setDirections(response);
    }
  });
  directionsDisplay.setMap(map);

};

var map = new google.maps.Map(document.getElementById('gmap'),mapOptions);

var position = new google.maps.LatLng(position.coords.latitude,position.coords.longitude);
var display = new google.maps.InfoWindow({
  content:"J'habite ici",
  position: new google.maps.LatLng(50.4329476,4.855422999999973)
});
display.open(map);
var displayU = new google.maps.Marker({
  title:"Tu habites ici",
  position: position,
  map:map,
});
drawLine(position);
map.setCenter(position);
console.log(displayU);
};



var PositionFailed = function (){
  handleNoGeolocation(true);
  console.log('failed');
};
var handleNoGeolocation = function(error){
  if(error){
    var content = 'Error: The Geolocation service failed.';
  } else {
    var content = 'Error: Your browser doesn\'t support geolocation.';
  }

};


google.maps.event.addDomListener(window, 'load', initialize);

}).call(this,jQuery);