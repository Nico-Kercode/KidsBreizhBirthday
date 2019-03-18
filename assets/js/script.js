
// Script navbar

$(function() {
    $('.response--main-navigation').basicResponsiveMenu({
        browserWidth: 960,
        slideDir: 'left',
        slideSpeed: 400
    });
});


// SLIDER 

$(function() {
  $(window).load(function() {
     
      $("#slider").slider({
          visibleItems: 8,
          itemsToScroll: 1,         
          autoPlay: {
              enable: true,
              interval: 1500,
              pauseOnHover: true
          }        
      });
    
      
  });
  });
  
  // VALIDATION 
  $.validate({
    modules : 'file'
  });

  // COOKIES 

  window.addEventListener("load", function(){
    window.cookieconsent.initialise({
      "palette": {
        "popup": {
          "background": "#ffdb5c",
          "text": "#2e4eec"
        },
        "button": {
          "background": "#ffe15c",
          "text": "#2e4eec"
        }
      },
      "content": {
        "message": "En poursuivant votre navigation sur ce site, vous acceptez l’utilisation de Cookies .",
        "dismiss": "Acceptez !",
        "link": "En savoir plus"
      }
    })});