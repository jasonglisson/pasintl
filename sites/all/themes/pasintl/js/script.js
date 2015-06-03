jQuery(document).ready(function(){

	function parallax(){
	    var scrolled = jQuery(window).scrollTop();
	    jQuery('.front-header').css('background-position-y', -(scrolled * 0.5) + 'px');	 
	}
	
	jQuery(window).scroll(function(e){
	    parallax();
	});
    
    jQuery('.col-5').hover(function(){
        jQuery(this).find('.pro-summary-wrapper').stop().animate({'top': '0px'}, 350);
    }, function(){
        jQuery(this).find('.pro-summary-wrapper').stop().animate({'top': '200px'}, 350);
    });
    
    jQuery('.categories-menu li').hover(function() {
    	jQuery(this).find('ul').show();
    }, function(){
    	jQuery(this).find('ul').hide();	    
    });	
  
	jQuery('#edit-attributes-10-40--2').prop("checked", true);
  
jQuery('.categories-menu ul > li > div > span > a').click(function(e){
    e.preventDefault();
});  

  
jQuery('.categories-menu ul li ul').each(function(index, element){
  var count = jQuery(element).find('li').length;
  var content = '<span class="cnt">' + count + '</span>';
  jQuery(element).closest('li').children('a').append(content);
});
    
jQuery('.categories-menu ul ul li:odd').addClass('odd');
jQuery('.categories-menu ul ul li:even').addClass('even');    
    
jQuery('.categories-menu ul li').click(function() {

  var checkElement = jQuery(this).next();

  jQuery('.categories-menu li').removeClass('active');
  jQuery(this).closest('li').addClass('active'); 

  if((checkElement.is('ul')) && (checkElement.is(':visible'))) {
    jQuery(this).closest('li').removeClass('active');
    checkElement.slideUp('normal');
  }
  if((checkElement.is('ul')) && (!checkElement.is(':visible'))) {
    jQuery('.categories-menu ul ul:visible').slideUp('normal');
    checkElement.slideDown('normal');
  }

  if(jQuery(this).closest('li').find('ul').children().length == 0) {
    return true;
  } else {
    return false; 
  }

});    
    
    jQuery('.front-header .visible-xs a').wrapInner("<button type='button' class='btn btn-primary btn-lg btn-block'></button>");   
    
    jQuery('.main-item').hover(function() {
	   jQuery(this).find('.main-icon1 img').fadeOut(350); 
	   jQuery(this).find('.main-icon2 img').fadeIn(350);
	   jQuery(this).find('a').css({'color': '#428bca'});
    },function() {
	   jQuery(this).find('.main-icon1 img').fadeIn(350); 
	   jQuery(this).find('.main-icon2 img').fadeOut(350); 
	   jQuery(this).find('a').css({'color': '#6d6d6d'});
    });
    
    jQuery('.node-type-product-showcase section').removeClass('col-sm-8').addClass('col-lg-12');
    
    jQuery('<div class="thumb-wrap">').insertAfter( ".view-product-images .first" );
    jQuery('</div>').insertAfter( ".view-product-images .last" );
    
    jQuery('#block-accordion-menu-1').fadeIn(250);   
    
    jQuery('.accordion-content-7.accordion-content-depth-2.ui-accordion-content').css('display', 'none');
    
/*
	jQuery('.accordion-header-7.has-children.item-depth-2').click(function(){
    	jQuery('.accordion-content-7.accordion-content-depth-2.ui-accordion-content').css('display', 'block');
		jQuery('.accordion-header-7.has-children.item-depth-2').toggleClass('ui-state-active');    	
	});
*/

jQuery('.accordion-header.no-children.item-depth-2').click(function(){
     window.location=jQuery(this).find('a').attr('href'); 
     return false;
});

jQuery('.accordion-header.no-children.item-depth-3').click(function(){
     window.location=jQuery(this).find('a').attr('href'); 
     return false;
});

jQuery('.accordion-header-7.has-children.item-depth-2').toggle(function () {
    	jQuery('.accordion-content-7.accordion-content-depth-2.ui-accordion-content').css('display', 'block');
		jQuery('.accordion-header-7.has-children.item-depth-2').addClass('ui-state-active');    	
}, function () {
    	jQuery('.accordion-content-7.accordion-content-depth-2.ui-accordion-content').css('display', 'none');
		jQuery('.accordion-header-7.has-children.item-depth-2').removeClass('ui-state-active');    	
});
    
    jQuery('.accordion-header-7.has-children.item-depth-2').removeClass('ui-state-active');
    
    jQuery('#taxonomy_accordion_2 .ui-accordion').on('click', function(e) {
      jQuery(this).toggleClass("active"); //you can list several class names 
      e.preventDefault();
    });    
    
    //jQuery('#block-accordion-menu-1').addClass('well');
    jQuery('.region-sidebar-first').removeClass('well');
   
    jQuery("#search-form").hover(function(){
        jQuery(this).stop().animate({'width': '300px'}, 350);
        jQuery('#cart-lg').hide();
    }, function(){
        jQuery(this).stop().animate({'width': '114px'}, 300);
        jQuery('#cart-lg').fadeIn();        
    });
   
/*
	jQuery('#fixed-footer-toggle').click(function(){
	  jQuery(this).animate({'top':'-165px'}, 350); 	  	  
	  jQuery('#fixed-footer').stop().animate({'bottom':'0px'}, 350); 	  
	  jQuery(this).addClass('active');  
	});
	jQuery('#fixed-footer-toggle.active').click(function(){
      jQuery(this).animate({'top':'-20px'}, 340);
	  jQuery('#fixed-footer').animate({'bottom':'-152px'}, 350); 
	  jQuery(this).removeClass('active');
    });	
*/ 
    
    jQuery('#fixed-footer-toggle').click(function() {
		jQuery('#fixed-footer').animate({'bottom':'0'}, 350);
		jQuery('#inner-footer-toggle').fadeIn(2);
    }); 
    jQuery('#inner-footer-toggle').click(function() {
		jQuery('#fixed-footer').animate({'bottom':'-152px'}, 350); 
		jQuery(this).fadeOut(2);		
    });    

	jQuery(".node-type-product-showcase td:contains('Yes')").html('<span class="glyphicon glyphicon-ok"></span>');
	jQuery(".node-type-product-showcase td:contains('No')").html('<span class="glyphicon glyphicon-remove"></span>');


//	Microsite scripts

	jQuery("#section-1").waypoint(function(){
		jQuery("#section1btn").toggleClass('active');
		jQuery("#micro-to-top").fadeIn();		
	});

	jQuery('#section-1').waypoint(  
	    function(direction) {	
	        if (direction ==='up') {
				jQuery("#micro-to-top").fadeOut();
	        }
	 }, { offset: 200 });

	jQuery("#micro-to-top").click(function() {
		jQuery('html, body').animate({
		    scrollTop: (jQuery('html, body').offset().top+0)
		},500);			
	});

	jQuery('#micro-menu').waypoint('sticky');
	jQuery('#micro-menu-small').waypoint('sticky');
		
	jQuery('#menu-toggle').click(function(){
		jQuery('.micro-menu').slideToggle(200, "swing");
	});		
	
	jQuery('#section-2-menu').waypoint('sticky', {
		offset:75
	});
	jQuery('#section-3-menu').waypoint('sticky', {
		offset:75
	});
	jQuery('#section-4-menu').waypoint('sticky', {
		offset:75
	});
	jQuery('#section-5-menu').waypoint('sticky', {
		offset:75
	});

	jQuery('#drawer-toggle').click(function(){
    	jQuery("#micro-top-drawer").slideToggle(500);
    	jQuery("#drawer-toggle").toggleClass('active');
    });
 
	jQuery('#drawer-stoggle').click(function(){
    	jQuery("#micro-top-drawer").slideToggle(500);
    	jQuery("#drawer-stoggle").toggleClass('active');
    });
    
/*
    jQuery('#micro-menu li').click(function(){
		jQuery(this).toggleClass('active');		
    });
*/

    
    jQuery(".micro-slide-obj2").fadeIn().animate({ marginLeft: "0"}, 1500);
    jQuery(".micro-slide-obj1").fadeIn().animate({ marginLeft: "-74"}, 2300);
    
	jQuery("#s1i1").click(function() {
		jQuery(this).toggleClass("active");
		jQuery("#s1i2").removeClass("active");
		jQuery("#s1i3").removeClass("active");	
		jQuery("#item1-content").fadeIn(); 		
		jQuery("#dark-overlay").fadeIn();			
	});

	jQuery("#s1i2").click(function() {
		jQuery(this).toggleClass("active");
		jQuery("#s1i1").removeClass("active");
		jQuery("#s1i3").removeClass("active");	
		jQuery("#item2-content").fadeIn(); 		
		jQuery("#dark-overlay").fadeIn();													
	});

	jQuery("#s1i3").click(function() {
		jQuery(this).toggleClass("active");
		jQuery("#s1i1").removeClass("active");
		jQuery("#s1i2").removeClass("active");	
		jQuery("#item3-content").fadeIn(); 		
		jQuery("#dark-overlay").fadeIn();								
	});
			
	jQuery("#micro-tagline").delay(500).fadeIn(500);
	jQuery("#micro-sub-video-text").delay(700).fadeIn(500);	
	jQuery("#micro-video-link").delay(900).fadeIn(500);
		
	jQuery("#close-drawer").click(function() {		
		jQuery("#drawer-toggle").click();
	});
	
	jQuery("#micro-video-link").click(function() {
		jQuery("#micro-video").fadeIn();
		jQuery("#dark-overlay").fadeIn();
		player.playVideo();			
	});

	jQuery("#micro-video-link-small").click(function() {
		jQuery("#micro-video").fadeIn();
		jQuery("#dark-overlay").fadeIn();
		player.playVideo();			
	});

	jQuery(".close").click(function() {
		jQuery("#item1-content").fadeOut(); 
		jQuery("#item2-content").fadeOut();
		jQuery("#item3-content").fadeOut();
		jQuery("#s1i1").removeClass("active");
		jQuery("#s1i2").removeClass("active");	
		jQuery("#s1i3").removeClass("active");					
		jQuery("#dark-overlay").fadeOut();				 		
	});
	
	jQuery("#dark-overlay").click(function() {
		jQuery(this).fadeOut();
		jQuery("#item1-content").fadeOut(); 
		jQuery("#item2-content").fadeOut();
		jQuery("#item3-content").fadeOut();		
		jQuery("#micro-video").fadeOut();
		player.stopVideo();		 		
	});
	jQuery("#close-player").click(function() {
		jQuery("#dark-overlay").fadeOut();
		jQuery("#micro-video").fadeOut();		 				
		player.stopVideo();		
	});	

/* Facebook Section */
	jQuery('#block-facebook-wall-facebook-wall').find('.facebook_wall_outer').addClass('container');	
	jQuery('#block-facebook-wall-facebook-wall').find('.facebook_wall').addClass('col-lg-4 col-md-12 col-sm-12');

/* Section 1 */
	
	jQuery('#section1btn').click(function() {
		jQuery('html, body').animate({
		    scrollTop: (jQuery('#section-1').offset().top+20)
		},500);
	});

	jQuery('#section1sbtn').click(function() {
		jQuery('html, body').animate({
		    scrollTop: (jQuery('#section-1').offset().top-50)
		},500);
		jQuery('.micro-menu').slideToggle(200, "swing");		
	});	

/* Section 2 */

	jQuery("#section-2").waypoint(function(){
		jQuery(this).addClass('stuck');	
		jQuery("#section1btn").toggleClass('active');
		jQuery("#section2btn").toggleClass('active');					
		jQuery('#section-2-menu').removeClass('stuck');
	});
		
	jQuery('#section2btn').click(function() {
		jQuery('html, body').animate({
		    scrollTop: (jQuery('#section-2').offset().top+20)
		},500);
	});

	jQuery('#section2sbtn').click(function() {
		jQuery('html, body').animate({
		    scrollTop: (jQuery('#section-2').offset().top-50)
		},500);
		jQuery('.micro-menu').slideToggle(200, "swing");		
	});


	jQuery('#s2item1').click(function() {
		jQuery('html, body').animate({
		    scrollTop: (jQuery('#section-2-content-1').offset().top-114)
		},500);
	});	

	jQuery("#section-2-content-1").waypoint(function(){
		jQuery("#s2item1").toggleClass('active');		
	}, {
        offset: 120
    });

	jQuery('#s2item2').click(function() {
		jQuery('html, body').animate({
		    scrollTop: (jQuery('#section-2-content-2').offset().top-114)
		},500);
	});	
	
	jQuery("#section-2-content-2").waypoint(function(){
		jQuery("#s2item1").toggleClass('active');
		jQuery("#s2item2").toggleClass('active');					
	}, {
        offset: 120
    });
	
	jQuery("#section-2-content-3").waypoint(function(){
		jQuery("#s2item2").toggleClass('active');
		jQuery("#s2item3").toggleClass('active');					
	}, {
        offset: 120
    });	
	
	jQuery('#s2item3').click(function() {
		jQuery('html, body').animate({
		    scrollTop: (jQuery('#section-2-content-3').offset().top-114)
		},500);
	});	

	
	
/* Section 3 */	
	
	jQuery('#section3btn').click(function() {
		jQuery('html, body').animate({
		    scrollTop: (jQuery('#section-3').offset().top+20)
		},500);
	});

/*
	jQuery('#section3sbtn').click(function() {
		jQuery('html, body').animate({
		    scrollTop: (jQuery('#section-3').offset().top-50)
		},500);
		jQuery('.micro-menu').slideToggle(200, "swing");		
	});
*/

	jQuery("#section-3").waypoint(function(){
		jQuery(this).addClass('stuck');	
		jQuery("#section2btn").toggleClass('active');
		jQuery("#section3btn").toggleClass('active');					
		jQuery('#section-3-menu').removeClass('stuck');
	});

	jQuery('#s3item1').click(function() {
		jQuery('html, body').animate({
		    scrollTop: (jQuery('#section-3-content-1').offset().top-114)
		},500);
	});	
	
	jQuery("#section-3-content-1").waypoint(function(){
		jQuery("#s3item1").toggleClass('active');		
	}, {
        offset: 120
    });
    
	jQuery('#s3item2').click(function() {
		jQuery('html, body').animate({
		    scrollTop: (jQuery('#section-3-content-2').offset().top-114)
		},500);
	});	

	jQuery("#section-3-content-2").waypoint(function(){
		jQuery("#s3item1").toggleClass('active');	
		jQuery("#s3item2").toggleClass('active');				
	}, {
        offset: 120
    });

	jQuery('#s3item3').click(function() {
		jQuery('html, body').animate({
		    scrollTop: (jQuery('#section-3-content-3').offset().top-114)
		},500);
	});	

	jQuery("#section-3-content-3").waypoint(function(){
		jQuery("#s3item2").toggleClass('active');	
		jQuery("#s3item3").toggleClass('active');				
	}, {
        offset: 120
    });

	jQuery('#s3item4').click(function() {
		jQuery('html, body').animate({
		    scrollTop: (jQuery('#section-3-content-4').offset().top-114)
		},500);
	});	

	jQuery("#section-3-content-4").waypoint(function(){
		jQuery("#s3item3").toggleClass('active');	
		jQuery("#s3item4").toggleClass('active');				
	}, {
        offset: 120
    });
	
/* Section 4 */	
		
	jQuery('#section4btn').click(function() {
		jQuery('html, body').animate({
		    scrollTop: (jQuery('#section-4').offset().top+20)
		},500);
	});

	jQuery('#section4sbtn').click(function() {
		jQuery('html, body').animate({
		    scrollTop: (jQuery('#section-4').offset().top-55)
		},500);
		jQuery('.micro-menu').slideToggle(200, "swing");		
	});

	jQuery('#section-4').waypoint(function(){
		jQuery(this).addClass('stuck');	
		jQuery('#section3btn').toggleClass('active');
		jQuery('#section4btn').toggleClass('active');					
		jQuery('#section-4-menu').removeClass('stuck');
	});

	jQuery('#s4item1').click(function() {
		jQuery('html, body').animate({
		    scrollTop: (jQuery('#section-4-content-1').offset().top-114)
		},500);
	});	

	jQuery("#section-4-content-1").waypoint(function(){
		jQuery("#s4item1").toggleClass('active');		
	}, {
        offset: 120
    });

	jQuery('#s4item2').click(function() {
		jQuery('html, body').animate({
		    scrollTop: (jQuery('#section-4-content-2').offset().top-114)
		},500);
	});	
	
	jQuery("#section-4-content-2").waypoint(function(){
		jQuery("#s4item1").toggleClass('active');
		jQuery("#s4item2").toggleClass('active');					
	}, {
        offset: 120
    });
	
	jQuery("#section-4-content-3").waypoint(function(){
		jQuery("#s4item2").toggleClass('active');
		jQuery("#s4item3").toggleClass('active');					
	}, {
        offset: 120
    });	
	
	jQuery('#s4item3').click(function() {
		jQuery('html, body').animate({
		    scrollTop: (jQuery('#section-4-content-3').offset().top-114)
		},500);
	});	

		
/* Section 5 */	

		
	jQuery('#section5btn').click(function() {
		jQuery('html, body').animate({
		    scrollTop: (jQuery('#section-5').offset().top+20)
		},500);
	});

	jQuery('#section5sbtn').click(function() {
		jQuery('html, body').animate({
		    scrollTop: (jQuery('#section-5').offset().top-50)
		},500);
		jQuery('.micro-menu').slideToggle(200, "swing");		
	});

	jQuery('#section-5').waypoint(function(){
		jQuery(this).addClass('stuck');	
		jQuery('#section4btn').toggleClass('active');
		jQuery('#section5btn').toggleClass('active');					
		jQuery('#section-5-menu').removeClass('stuck');
	});

	jQuery('#s5item1').click(function() {
		jQuery('html, body').animate({
		    scrollTop: (jQuery('#section-5-content-1').offset().top-114)
		},500);
	});	

	jQuery("#section-5-content-1").waypoint(function(){
		jQuery("#s5item1").toggleClass('active');		
	}, {
        offset: 120
    });

	jQuery('#s5item2').click(function() {
		jQuery('html, body').animate({
		    scrollTop: (jQuery('#section-5-content-2').offset().top-114)
		},500);
	});	
	
	jQuery("#section-5-content-2").waypoint(function(){
		jQuery("#s5item1").toggleClass('active');
		jQuery("#s5item2").toggleClass('active');					
	}, {
        offset: 120
    });
	
	jQuery("#section-5-content-3").waypoint(function(){
		jQuery("#s5item2").toggleClass('active');
		jQuery("#s5item3").toggleClass('active');					
	}, {
        offset: 120
    });	
	
	jQuery('#s5item3').click(function() {
		jQuery('html, body').animate({
		    scrollTop: (jQuery('#section-5-content-3').offset().top-114)
		},500);
	});		
	
});	


jQuery(document).ajaxComplete(function(){

 	if(jQuery('#uc-order-total-preview .line-item-fee .title:contains("Hazmat Shipping Fee:")').length > 0) {
		jQuery('#quote').find(':input').not('#edit-panes-quotes-quotes-quote-option-fedex-ground-fedex-ground').attr("disabled", true);
	} else {
		jQuery('#quote').find(':input').attr("enabled", true);		
	}

});

