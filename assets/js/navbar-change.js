$(document).ready(function(){       
   var scroll_start = 0;
   var startchange = $('#startchange');
   var offset = startchange.offset();
    if (startchange.length){
   $(document).scroll(function() { 
      scroll_start = $(this).scrollTop();
      if(scroll_start > offset.top) {
          $(".navbar.navbar-inverse.navbar-fixed-top").css('background-color', 'rgba(0, 0, 0, 0.59)');
       } else {
          $('.navbar.navbar-inverse.navbar-fixed-top').css('background-color', 'transparent');
       }
   });
    }
});