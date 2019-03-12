$(window).load(function() {
   
    $("#slider").slider({
        visibleItems: 6,
        itemsToScroll: 2,         
        autoPlay: {
            enable: true,
            interval: 3000,
            pauseOnHover: true
        }        
    });
  
    
});