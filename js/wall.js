;(function($){
  var iHeight=$(window).height();
  var nHeightDoc = (($(window).height())/3)*2;
  var headerHeight = $('header').height();
  var aImg= [/*"img/wall.png","img/wall1.png","img/wall2.png"*/];
  var aBackground = [/*"img/background.png","img/background2.png","img/background3.png"*/];

  $('.bulle>figure').hide();

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
orbit();
ShowHideNavBar();
}).call(this,jQuery);


