;(function($){
  var iHeight=$(window).height();
  var nHeightDoc = (($(window).height())/3)*2;
  var headerHeight = $('header').height();
  var aImg= [/*"img/wall.png","img/wall1.png","img/wall2.png"*/];
  var aBackground = [/*"img/background.png","img/background2.png","img/background3.png"*/];

  $('.bulle>figure').hide();

function resizeImage()
{

var nHeightDoc = (($(window).height())/3)*2;
var nWidthDoc = ($(window).width())/3;
$('#gmap').css({
  height:nHeightDoc,
  width:nWidthDoc,
});
};
function ShowHideNavBar()
{
  $(document).load()
  {
    if($('#accueil').size())
    {
      $('header').css({
        marginTop:0
      });
      $('.top-bar.fixed').css({
        position:'relative',
        boxShadow:'0 0 0 0 ',
      });
      $(window).scroll(function(){

        if($(window).scrollTop()>=440)
        {
          $('.top-bar.fixed').css({
            position:"fixed",
            boxShadow:'0 0 10px 0 ',
          });
        }
        else
        {
          $('.top-bar.fixed').css({
            position:"relative",
            boxShadow:'0 0 0 0 ',
          });
        }

      });
    }
  }
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

var sLink = $('img.voir').attr('href');
$('img.voir').css({
  backgroundImage:"url("+sLink+")",
  backgroundRepeat:"no-repeat",
  backgroundPosition:'center 20px',
  overflow:"hidden",
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
 /* $('.image').css({
    height:(iHeight/3)*2,
    width:'100%',
  });*/
var nHeightDoc = (($(window).height())/3)*2;
var nWidthDoc = ($(window).width())/3;
$('#gmap').css({
  height:nHeightDoc,
  width:nWidthDoc,
});



});   


orbit();
ShowHideNavBar();

}).call(this,jQuery);


