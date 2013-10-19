/*
 *
 * JS Document - /js/script.js
 *
 * coded by [YOUR NAME]
 * started at [DATE]
 */

 /* jshint boss: true, curly: true, eqeqeq: true, eqnull: true, immed: true, latedef: true, newcap: true, noarg: true, browser: true, jquery: true, noempty: true, sub: true, undef: true, unused: true, white: false */

// start your work here.
;(function($){

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

  var fillInformations = function(){
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
     /*generateImageMap();*/
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

}).call(this,jQuery);