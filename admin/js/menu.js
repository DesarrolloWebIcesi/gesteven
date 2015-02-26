/**
 *  Script utilizado para la gestión de los eventos del menu de navegación.
 *
 *  @author David Andrés Manzano - damanzano
 *  @since 22/02/11
 **/
/**
* hoverIntent r6 // 2011.02.26 // jQuery 1.5.1+
* <http://cherne.net/brian/resources/jquery.hoverIntent.html>
* 
* @param  f  onMouseOver function || An object with configuration options
* @param  g  onMouseOut function  || Nothing (use configuration options object)
* @author    Brian Cherne brian(at)cherne(dot)net
*/
(function($){$.fn.hoverIntent=function(f,g){var cfg={sensitivity:7,interval:100,timeout:0};cfg=$.extend(cfg,g?{over:f,out:g}:f);var cX,cY,pX,pY;var track=function(ev){cX=ev.pageX;cY=ev.pageY};var compare=function(ev,ob){ob.hoverIntent_t=clearTimeout(ob.hoverIntent_t);if((Math.abs(pX-cX)+Math.abs(pY-cY))<cfg.sensitivity){$(ob).unbind("mousemove",track);ob.hoverIntent_s=1;return cfg.over.apply(ob,[ev])}else{pX=cX;pY=cY;ob.hoverIntent_t=setTimeout(function(){compare(ev,ob)},cfg.interval)}};var delay=function(ev,ob){ob.hoverIntent_t=clearTimeout(ob.hoverIntent_t);ob.hoverIntent_s=0;return cfg.out.apply(ob,[ev])};var handleHover=function(e){var ev=jQuery.extend({},e);var ob=this;if(ob.hoverIntent_t){ob.hoverIntent_t=clearTimeout(ob.hoverIntent_t)}if(e.type=="mouseenter"){pX=ev.pageX;pY=ev.pageY;$(ob).bind("mousemove",track);if(ob.hoverIntent_s!=1){ob.hoverIntent_t=setTimeout(function(){compare(ev,ob)},cfg.interval)}}else{$(ob).unbind("mousemove",track);if(ob.hoverIntent_s==1){ob.hoverIntent_t=setTimeout(function(){delay(ev,ob)},cfg.timeout)}}};return this.bind('mouseenter',handleHover).bind('mouseleave',handleHover)}})(jQuery);
$(document).ready(function(){
    /*Deshabilita el click derecho*/
    $(document).bind("contextmenu",function(e){
        //return false;
    });

    /*begin menujs*/
    $("ul.subnav").parent().append("<span></span>"); //Only shows drop down trigger when js is enabled (Adds empty span tag after ul.subnav*)

    $("ul#menu li.node").click(
        function() { //When trigger is clicked...
            //Following events are applied to the subnav itself (moving subnav up and down)
            $(this).find("ul.subnav").slideDown('fast').show(); //Drop down the subnav on click
            $(this).find("ul.subnav").attr('style', 'visibility:visible; z-index:10;');

            $(this).hoverIntent({
              over: function() {
                $(this).find("ul.subnav li").hoverIntent({
                  over: function(){
                    $(this).find("ul").slideDown('fast').show();
                    $(this).find("ul").attr('style', 'visibility:visible; left:180px; z-index:10');
                  },
                  timeout: 500,
                  out: function(){
                    $(this).find("ul").slideUp('slow');
                  }
                });
              },
              timeout: 500,
              out: function(){
                  $(this).find("ul.subnav").slideUp('slow'); //When the mouse hovers out of the subnav, move it back up
              }
            });

        //Following events are applied to the trigger (Hover events for the trigger)
        });
/*end menujs*/
});

