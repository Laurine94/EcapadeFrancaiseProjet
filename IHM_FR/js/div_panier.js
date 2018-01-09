        $(function(){ // document ready
   if (!!$('#sticky').length) { // make sure "#sticky" element exists
       
       var el = $('#sticky');
       el.css({ position: 'fixed', bottom: 0 });
       var footerHeight = $('#footer').height();
       var stickyHeight = $('#sticky').height();
       var stickyBottom = $('#sticky').offset().bottom;
       var footerTop = $('#footer').offset().top;
       var windowHeight = $(window).height();
       
       
      $(window).scroll(function(){ // scroll event
          var windowTop = $(window).scrollTop();
          if ($(window).scrollTop() + $(window).height() > $(document).height() - footerHeight)
              el.css({ position: 'fixed', bottom: footerHeight + 15 });
          else
              el.css({ position: 'fixed', bottom: 0 });
      });
   }
});