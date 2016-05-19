(function ($, root, undefined) {
  
  $(function () {
    
    'use strict';
    
    // DOM ready, take it away
    $('#hero-carousel').flickity({
      // options
      autoPlay: 5000,
      pageDots: false,
      wrapAround: true
    });

    // init controller
    // var controllerHeader = new ScrollMagic.Controller({globalSceneOptions: {triggerHook: "onEnter", duration: "0"}});
    // var controllerHeader2 = new ScrollMagic.Controller({globalSceneOptions: {triggerHook: "onCenter", duration: "0"}});

    // build scenes
    // new ScrollMagic.Scene({triggerElement: "#home-trust"})
    //   .setClassToggle("#site-header-lg", "slide-up") // add class toggle
    //   //.addIndicators() // add indicators (requires plugin)
    //   .addTo(controllerHeader);

    // build scenes
    // new ScrollMagic.Scene({triggerElement: "#home-trust"})
    //   .setClassToggle("#site-header", "slide-down") // add class toggle
    //   //.addIndicators() // add indicators (requires plugin)
    //   .addTo(controllerHeader2);

    

  });
  
})(jQuery, this);
