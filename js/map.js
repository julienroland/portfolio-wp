
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