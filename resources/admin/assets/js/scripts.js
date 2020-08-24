// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function () {
    scrollFunction()
};

$('body').on('change', '#selectCategory', function() {
    var url = window.location.href.split('?');
    if($(this).val() == '0') {
        window.location.href = url[0];
    } else {
        window.location.href = url[0] + '?category_id=' + $(this).val();
    }
});

function resetFilter() {
    var url = window.location.href.split('?');
    window.location.href = url[0];
}

function scrollFunction() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        document.getElementById("movetop").style.display = "block";
    } else {
        document.getElementById("movetop").style.display = "none";
    }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
}

var closebtns = document.getElementsByClassName("close-grid");
var i;

for (i = 0; i < closebtns.length; i++) {
    closebtns[i].addEventListener("click", function () {
        this.parentElement.style.display = 'none';
    });
}

$(function () {
    $('.sidebar-menu-collapsed').click(function () {
        $('body').toggleClass('noscroll');
    })
});

$(window).load(function () {
    // Animate loader off screen
    $(".se-pre-con").fadeOut("slow");;
});


(function () {
   "use strict";

   // Toggle Left Menu
   jQuery('.menu-list > a').click(function () {

      var parent = jQuery(this).parent();
      var sub = parent.find('> ul');

      if (!jQuery('body').hasClass('sidebar-menu-collapsed')) {
         if (sub.is(':visible')) {
            sub.slideUp(200, function () {
               parent.removeClass('nav-active');
               jQuery('.main-content').css({
                  height: ''
               });
               mainContentHeightAdjust();
            });
         } else {
            visibleSubMenuClose();
            parent.addClass('nav-active');
            sub.slideDown(200, function () {
               mainContentHeightAdjust();
            });
         }
      }
      return false;
   });

   function visibleSubMenuClose() {
      jQuery('.menu-list').each(function () {
         var t = jQuery(this);
         if (t.hasClass('nav-active')) {
            t.find('> ul').slideUp(200, function () {
               t.removeClass('nav-active');
            });
         }
      });
   }

   function mainContentHeightAdjust() {
      // Adjust main content height
      var docHeight = jQuery(document).height();
      if (docHeight > jQuery('.main-content').height())
         jQuery('.main-content').height(docHeight);
   }

   //  class add mouse hover
   jQuery('.custom-nav > li').hover(function () {
      jQuery(this).addClass('nav-hover');
   }, function () {
      jQuery(this).removeClass('nav-hover');
   });

   //  class add mouse hover
   jQuery('.mail-nav > li').hover(function () {
      jQuery(this).addClass('nav-hover');
   }, function () {
      jQuery(this).removeClass('nav-hover');
   });


   // Menu Toggle
   jQuery('.toggle-btn').click(function () {
      $(".sidebar-menu").getNiceScroll().hide();

      if ($('body').hasClass('sidebar-menu-collapsed')) {
         $(".sidebar-menu").getNiceScroll().hide();
      }
      var body = jQuery('body');
      var bodyposition = body.css('position');

      if (bodyposition != 'relative') {

         if (!body.hasClass('sidebar-menu-collapsed')) {
            body.addClass('sidebar-menu-collapsed');
            jQuery('.custom-nav ul').attr('style', '');

            jQuery(this).addClass('menu-collapsed');

         } else {
            body.removeClass('sidebar-menu-collapsed chat-view');
            jQuery('.custom-nav li.active ul').css({
               display: 'block'
            });

            jQuery(this).removeClass('menu-collapsed');

         }
      } else {

         if (body.hasClass('sidebar-menu-show'))
            body.removeClass('sidebar-menu-show');
         else
            body.addClass('sidebar-menu-show');

         mainContentHeightAdjust();
      }

   });


   searchform_reposition();

   jQuery(window).resize(function () {

      if (jQuery('body').css('position') == 'relative') {

         jQuery('body').removeClass('sidebar-menu-collapsed');

      } else {

         jQuery('body').css({
            left: '',
            marginRight: ''
         });
      }

      searchform_reposition();

   });

   function searchform_reposition() {
      if (jQuery('.searchform').css('position') == 'relative') {
         jQuery('.searchform').insertBefore('.sidebar-menu-inner .logged-user');
      } else {
         jQuery('.searchform').insertBefore('.menu-right');
      }
   }
})(jQuery);

// Dropdowns Script
// $(document).ready(function () {
//    $(document).on('click', function (ev) {
//       ev.stopImmediatePropagation();
//       $(".dropdown-toggle").dropdown("active");
//    });
// });



/************** Search ****************/
$(function () {
   var button = $('#loginButton');
   var box = $('#loginBox');
   var form = $('#loginForm');
   button.removeAttr('href');
   button.mouseup(function (login) {
      box.toggle();
      button.toggleClass('active');
   });
   form.mouseup(function () {
      return false;
   });
   $(this).mouseup(function (login) {
      if (!($(login.target).parent('#loginButton').length > 0)) {
         button.removeClass('active');
         box.hide();
      }
   });
});
