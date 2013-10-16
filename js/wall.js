;(function($){
  var iHeight=$(window).height();
  var nHeightDoc = (($(window).height())/3)*2;
  var headerHeight = $('header').height();
  var aImg= ["img/wall.png","img/wall1.png","img/wall2.png"];
  var aBackground = ["img/background.png","img/background2.png","img/background3.png"];

  $('.bulle>figure').hide();

  if($('.image > img').attr("src"))
  {
    resizeImage();
  }
  else
  {
    addImage();
  }
  function addImage()
  {
    if($('#accueil').size())
    {

      if($('.ban:visible'))
      {
       $('.image').css({
        backgroundImage:'url(./wp-content/themes/portfolio/'+aImg[Math.floor(Math.random()*3)]+')',
        backgroundSize:"cover", 

      });
     }

     else{
      $('.image').css({
        backgroundColor:"white",

      });
    }
    $('.image>img').remove();
    resizeImage();
  }
  else
  {
    if($('.ban:visible'))
    {
     $('.image').css({
      backgroundImage:'url(../wp-content/themes/portfolio/'+aBackground[Math.floor(Math.random()*3)]+')',
      backgroundSize:"cover", 

    });
   }

   else{
    $('.image').css({
      backgroundColor:"white",

    });
  }
  $('.image>img').remove();
  resizeImage();
}
};
/*function searchBar(){
  $('.search-submit').hide();
  $('.screen-reader-text').css({
    textIndent:'-9999ppx',
    position:"absolute",
  });
}*/
function resizeImage()
{
  if($('.image').size())
  {
    $('.image').css({
      height:(iHeight/3)*2,
      width:'100%',
      backgroundRepeat:'no-repeat',
    });
  }
  var nHeightDoc = (($(window).height())/3)*2;
  var nWidthDoc = ($(window).width())/3;
  $('#gmap').css({
    height:nHeightDoc,
    width:nWidthDoc,
  });
};
function hideLogo()
{
  var logo = $('.logo');
  if(iHeight<=350)
  {
    logo.hide();
  }
  else
  {
    logo.show();
  }

};
function ShowHideNavBar()
{
  $(document).load()
  {
    if($('#accueil').size())
    {
      var nHeightMenuAccueil = ($('ul.mainMenu p').height())*2;
      if($(window).scrollTop()<=nHeightDoc-nHeightMenuAccueil)
      {
        $('.top-bar').hide();
      }
      else
      {
        $('.top-bar').show();
      }
      $(window).scroll(function(){

        if($(window).scrollTop()<=nHeightDoc-nHeightMenuAccueil)
        {
          $('.top-bar').fadeOut('fast');
        }
        else
        {
          $('.top-bar').fadeIn('normal');
        }

      });
    }
  }
};
function resizeMainIcon(){
  var nWidthIcon = $('.mainMenu>li').width();
  $('.mainMenu>li').css({
    height:(nWidthIcon/100)*80,
  });
};

$('#imgTracker li.th').hover(function(){
 var oP =  $(this).find('img').attr('src');

 $('.track').css({
  backgroundImage:"url("+oP+")",
  backgroundRepeat:"no-repeat",
  backgroundPosition:'center 20px',
  overflow:"hidden",
});
});
$.fn.goTo =function()
{
  $('html, body').animate({
    scrollTop: $(this).offset().top + 'px'
  }, 'normal');
  return this;
  
};
var sLink = $('img.voir').attr('href');
$('img.voir').css({
  backgroundImage:"url("+sLink+")",
  backgroundRepeat:"no-repeat",
  backgroundPosition:'center 20px',
  overflow:"hidden",
});
/*if($('#container').size()&&$('#accueil').size())
{
  $('.ban li:first-child').click(function(e){
   e.preventDefault();
   $('#container').css({
    minHeight:iHeight,
    display:"block",
  }).goTo();
 });
}*/
if($('#container').size()&&!$('#accueil').size())
{
  $('a[href="#accueil"]').click(function(e){
   $('#container').css({
    minHeight:iHeight,
    display:"block",
  }).goTo();
 });
  $('a[href="#top"]').click(function(e){
   e.preventDefault();
   $('#top').goTo();
 });
  $('a[href="#down"]').click(function(e){
    e.preventDefault;
    $('#down').goTo();
  });
}


$('a[href~="index"]').on("click",function(e){
  $('#container').goTo();

});

function orbit(){
  var iHeight=$(window).height();
  if(!$('.ban').size()){
    var oSlider=  $('.orbit-slides-container');
    oSlider.show().css({  
      top:0,
      right:0,
      left:0,
      bottom:0,
      margin:"auto",
      overflow:"hidden",
    });
  }
  else
  {
    var oSlider=  $('.orbit-container>ul');
    oSlider.hide();
  }

};
$(window).resize(function()
{
  var iHeight=$(window).height();
  $('.image').css({
    height:(iHeight/3)*2,
    width:'100%',
  });
  var nHeightDoc = (($(window).height())/3)*2;
  var nWidthDoc = ($(window).width())/3;
  $('#gmap').css({
    height:nHeightDoc,
    width:nWidthDoc,
  });
  if(iHeight<=400)
  {
    $('.ban').css({
      top:160,
    });

  }
  else
  {
    $('.ban').css({
      top:"auto",
    });
  }
  if($('#container').size())
  {

    $('#container').css({
      minHeight:iHeight,
    });
  }
  var nWidthIcon = $('.mainMenu>li').width();
  $('.mainMenu>li').css({
    height:(nWidthIcon/100)*80,
  });

});   


orbit();
ShowHideNavBar();
resizeMainIcon();
/*searchBar();*/

}).call(this,jQuery);


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
    /* generateImageMap();*/
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