(function($) {
    "use strict";

    var win = $(window);

    //jQuery to collapse the navbar on scroll
    win.on('scroll', function() {
        var nav = $(".navbar");
        var navTop =  $(".navbar-fixed-top");
        if (nav.offset().top > 20) {
            navTop.addClass("top-nav-collapse");
            navTop.css({"background-color" : "#333"});
        } else {
            navTop.addClass("top-nav-collapse");
            navTop.css({"background-color" : "#333"});
        }
    });

    //carousel slider (testimonial)
      var quote = $('#quote-carousel');
      quote.carousel({
        pause: true, interval: 4000,
      });

    //jQuery for page scrolling feature - requires jQuery Easing plugin
        var pageScroll = $('a.page-scroll');
        pageScroll.on('click', function(event) {
            var anchor = $(this);
            $('html, body').stop().animate({
                scrollTop: $(anchor.attr('href')).offset().top
            }, 1500, 'easeInOutExpo');
            event.preventDefault();
        });


    $(function() {
      $(".remove").on("click", function(e) {
        e.preventDefault();
        console.log( $(this).data());
        var $link = $(this), // save for later
          username = $(this).data("userid"),
          track = $(this).data("track");
                  $.ajax
            ({
              type:'post',
              url: 'delete_proc_admin.php',
              data: 
              {
                 user_name:username,
                 user_track:track
              },
              success: function (response) 
              {
                document.getElementById("music").innerHTML=response;
                return alert ( username +" - "+ track + " has been deleted!");
              }
            });

      });
    });

    $(function() {
      $(".approve").on("click", function(e) {
        e.preventDefault();
        console.log( $(this).data());
        var $link = $(this), // save for later
        username = $(this).data("userid"),
        track = $(this).data("track");
        
        $.ajax
            ({
              type:'post',
              url: 'approve_proc_admin.php',
              data: 
              {
                 user_name:username,
                 user_track:track
              },
              success: function (response) 
              {
                document.getElementById("music").innerHTML=response;
               /* return alert ( username +" - "+ track + " has been approved!");*//*this line Only for test*/
              }
            });

      });
    });

  //script for player
    $(function(){
      $('#music a').click(function(){
          event.preventDefault();
          var value = $(this).attr('href');
          $('source').attr("src", value);
          $("#aud").load();

            $.ajax
                ({
                  type:'post',
                  url: 'view_update.php',
                  data: 
                  {
                     track_link: value
                  },
                  success: function (response) 
                  {
                  
                    
                  }
                }); 
      });
  });

})(jQuery);
