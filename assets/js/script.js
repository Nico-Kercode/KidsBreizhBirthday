
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