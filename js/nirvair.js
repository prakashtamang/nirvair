(function($) {
  "use strict"; // Start of use strict
  // Closes the sidebar menu
  $(".menu-toggle").click(function(e) {
    e.preventDefault();
    $("#sidebar-wrapper").toggleClass("active");
    $(".menu-toggle > .fa-bars, .menu-toggle > .fa-times").toggleClass("fa-bars fa-times");
    $(this).toggleClass("active");
  });

  // Smooth scrolling using jQuery easing
  $('a.js-scroll-trigger[href*="#"]:not([href="#"])').click(function() {
    if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
      if (target.length) {
        $('html, body').animate({
          scrollTop: target.offset().top
        }, 1000, "easeInOutExpo");
        return false;
      }
    }
  });

  // Closes responsive menu when a scroll trigger link is clicked
  $('#sidebar-wrapper .js-scroll-trigger').click(function() {
    $("#sidebar-wrapper").removeClass("active");
    $(".menu-toggle").removeClass("active");
    $(".menu-toggle > .fa-bars, .menu-toggle > .fa-times").toggleClass("fa-bars fa-times");
  });

  // Animations

  // Masthead
  var homeAnimate = function() {
		if ( $('.masthead').length > 0 ) {	

			$('.masthead').waypoint( function( direction ) {
										
				if( direction === 'down' && !$(this.element).hasClass('animated') ) {


					setTimeout(function() {
						$('.masthead .to-animate').each(function( k ) {
							var el = $(this);
							
							setTimeout ( function () {
								el.addClass('fadeInUp animated');
							},  k * 200, 'easeInOutExpo' );
							
						});
					}, 200);

					
					$(this.element).addClass('animated');
						
				}
			} , { offset: '80%' } );

		}
  };

   // About
  var aboutAnimate = function() {
		if ( $('#about').length > 0 ) {	

			$('#about').waypoint( function( direction ) {
										
				if( direction === 'down' && !$(this.element).hasClass('animated') ) {


					setTimeout(function() {
						$('#about .to-animate').each(function( k ) {
							var el = $(this);
							
							setTimeout ( function () {
								el.addClass('fadeInUp animated');
							},  k * 200, 'easeInOutExpo' );
							
						});
					}, 200);

					
					$(this.element).addClass('animated');
						
				}
			} , { offset: '80%' } );

		}
  };

  // Service  
  var servicesAnimate = function() {
		if ( $('#services').length > 0 ) {	

			$('#services').waypoint( function( direction ) {
										
				if( direction === 'down' && !$(this.element).hasClass('animated') ) {


					setTimeout(function() {
						$('#services .to-animate').each(function( k ) {
							var el = $(this);
							
							setTimeout ( function () {
								el.addClass('fadeInUp animated');
							},  k * 200, 'easeInOutExpo' );
							
						});
					}, 200);

					
					$(this.element).addClass('animated');
						
				}
			} , { offset: '80%' } );

		}
  };

  // Portfolio  
  var portfolioAnimate = function() {
		if ( $('#portfolio').length > 0 ) {	

			$('#portfolio').waypoint( function( direction ) {
										
				if( direction === 'down' && !$(this.element).hasClass('animated') ) {


					setTimeout(function() {
						$('#portfolio .to-animate').each(function( k ) {
							var el = $(this);
							
							setTimeout ( function () {
								el.addClass('fadeInUp animated');
							},  k * 200, 'easeInOutExpo' );
							
						});
					}, 200);

					
					$(this.element).addClass('animated');
						
				}
			} , { offset: '80%' } );

		}
  };

  // Testimonials  
  var testimonialAnimate = function() {
		if ( $('#testimonial').length > 0 ) {	

			$('#testimonial').waypoint( function( direction ) {
										
				if( direction === 'down' && !$(this.element).hasClass('animated') ) {


					setTimeout(function() {
						$('#testimonial .to-animate').each(function( k ) {
							var el = $(this);
							
							setTimeout ( function () {
								el.addClass('fadeInUp animated');
							},  k * 200, 'easeInOutExpo' );
							
						});
					}, 200);

					
					$(this.element).addClass('animated');
						
				}
			} , { offset: '80%' } );

		}
  };  

  // Articles  
  var articleAnimate = function() {
		if ( $('#blog').length > 0 ) {	

			$('#blog').waypoint( function( direction ) {
										
				if( direction === 'down' && !$(this.element).hasClass('animated') ) {


					setTimeout(function() {
						$('#blog .to-animate').each(function( k ) {
							var el = $(this);
							
							setTimeout ( function () {
								el.addClass('fadeInUp animated');
							},  k * 200, 'easeInOutExpo' );
							
						});
					}, 200);

					
					$(this.element).addClass('animated');
						
				}
			} , { offset: '80%' } );

		}
  };    
  
  // CTA  
  var ctaAnimate = function() {
    if ( $('.call-to-action').length > 0 ) {	

      $('.call-to-action').waypoint( function( direction ) {
                    
        if( direction === 'down' && !$(this.element).hasClass('animated') ) {


          setTimeout(function() {
            $('.call-to-action .to-animate').each(function( k ) {
              var el = $(this);
              
              setTimeout ( function () {
                el.addClass('fadeInUp animated');
              },  k * 200, 'easeInOutExpo' );
              
            });
          }, 200);

          
          $(this.element).addClass('animated');
            
        }
      } , { offset: '80%' } );

    }
  };

  // Article  
  var articleAnimate = function() {
    if ( $('#blog').length > 0 ) {	

      $('#blog').waypoint( function( direction ) {
                    
        if( direction === 'down' && !$(this.element).hasClass('animated') ) {


          setTimeout(function() {
            $('#blog .to-animate').each(function( k ) {
              var el = $(this);
              
              setTimeout ( function () {
                el.addClass('fadeInUp animated');
              },  k * 200, 'easeInOutExpo' );
              
            });
          }, 200);

          
          $(this.element).addClass('animated');
            
        }
      } , { offset: '80%' } );

    }
  };

  // Contact  
  var contactAnimate = function() {
    if ( $('#contact').length > 0 ) {	

      $('#contact').waypoint( function( direction ) {
                    
        if( direction === 'down' && !$(this.element).hasClass('animated') ) {


          setTimeout(function() {
            $('#contact .to-animate').each(function( k ) {
              var el = $(this);
              
              setTimeout ( function () {
                el.addClass('fadeInUp animated');
              },  k * 200, 'easeInOutExpo' );
              
            });
          }, 200);

          
          $(this.element).addClass('animated');
            
        }
      } , { offset: '80%' } );

    }
  };
  

  // Animations
  homeAnimate();
  aboutAnimate();
  servicesAnimate();
  portfolioAnimate();
  testimonialAnimate();
  articleAnimate();
  ctaAnimate();
  articleAnimate();
  contactAnimate();

  //Initial mixitup, used for animated filtering portgolio.
  mixitup('#portfolio-grid', {
    callbacks: {
        onMixStart: function(state, futureState) {
          $('div.toggleDiv').hide();
        }
    }
  });

  //Function for show or hide portfolio desctiption.
  $.fn.showHide = function (options) {
    var defaults = {
        speed: 1000,
        easing: '',
        changeText: 0,
        showText: 'Show',
        hideText: 'Hide'
    };
    var options = $.extend(defaults, options);
    $(this).click(function () {
        $('.toggleDiv').slideUp(options.speed, options.easing);
        var toggleClick = $(this);
        var toggleDiv = $(this).attr('rel');
        $(toggleDiv).slideToggle(options.speed, options.easing, function () {
            if (options.changeText == 1) {
                $(toggleDiv).is(":visible") ? toggleClick.text(options.hideText) : toggleClick.text(options.showText);
            }
        });
        //return false;
    });
  };

  //Initial Show/Hide portfolio element.
  $('div.toggleDiv').hide();
  $('.show_hide').showHide({
      speed: 500,
      changeText: 0,
      showText: 'View',
      hideText: 'Close'
  });

   // Scroll to top button appear
   $(document).scroll(function() {
    var scrollDistance = $(this).scrollTop();
    if (scrollDistance > 100) {
      $('.scroll-to-top').fadeIn();
    } else {
      $('.scroll-to-top').fadeOut();
    }
  });

})(jQuery); // End of use strict
