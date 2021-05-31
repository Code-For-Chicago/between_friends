jQuery(function ($) {
	
	$(function() {
	$('a[href*="#"]:not([href="#"])' ).click( function() {
	    if (location.pathname.replace(/^\// , '') == this.pathname.replace(/^\// , '') && location.hostname == this.hostname) {
	      var target = $(this.hash);
	      target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
	      if (target.length) {
	        $('html,body').animate({
	          scrollTop: target.offset().top - 120
	        }, 1000);
	        return false;
	      }
	    }
	  });
	});
	
	$(function() {
	var transBtn = $('.engSpan');
	  $(transBtn).click(function() { 
	    $(transBtn).not(this).removeClass('active')
	    $(this).toggleClass('active')
	  })
	});
	

	
	$(function() {
		$('ul.navbar-nav li.dropdown').hover(function() {
		  $(this).find('.dropdown-menu').stop(true, true).delay(500).slideDown(300);
		}, function() {
		  $(this).find('.dropdown-menu').stop(true, true).delay(200).slideUp(500);
		});
		
	});
	
	
	var maxHeight = 0;

	$(".latest-holder, .post-holder").each(function(){
	   if ($(this).height() > maxHeight) { maxHeight = $(this).height(); }
	});
	
	$(".latest-holder, .post-holder").height(maxHeight);

	
	$('.panic-button').click(function(){
		 window.location='http://google.com';
		 window.open('http://google.com', '_blank');
	});
	
	$('#nav-icon').click(function(){
		$(this).toggleClass('open');
		$("#masthead").addClass('lightenup');
		$('.hidden-side-nav').toggleClass('showme');
		$('.black-cover').toggleClass('show');
		
		$('.move-left').removeClass('move-left');
	});
	
		
	function checkWidth() {
	    if ($(window).width() > 992)
	        $('.black-cover').removeClass('show');
	}		
	$(window).resize(checkWidth);
	
	
	$('.sub-1-click').click(function(){
		$('#main-sub').addClass('move-left');
		$('#sub-1').addClass('move-left');
	});
	
	$('.sub-2-click').click(function(){
		$('#main-sub').addClass('move-left');
		$('#sub-2').addClass('move-left');
	});
	
	$('.sub-3-click').click(function(){
		$('#main-sub').addClass('move-left');
		$('#sub-3').addClass('move-left');
	});
	
	$('.sub-4-click').click(function(){
		$('#main-sub').addClass('move-left');
		$('#sub-4').addClass('move-left');
	});
	
	
	$('.main-sub-click').click(function(){
		$('#main-sub').removeClass('move-left');
		$(this).closest('.move-left').removeClass('move-left');
	});
	

	
   	$(window).scroll(function() {    
		var scroll = $(window).scrollTop();
	
		if (scroll >= 25) {
			$("#masthead").addClass("lightenup");
		} else {
			$("#masthead").removeClass("lightenup");
		}
	});
	
	var alterClass = function() {
    var ww = document.body.clientWidth;
	    if (ww < 992) { //smaller
	      $('#masthead').addClass('lightenup');
	      if($('.hidden-side-nav').hasClass('showme')){
		      $('.black-cover').addClass('show');
	      }
	    } else if (ww > 992) {
	      $('#masthead').removeClass('lightenup');	
	    };
	  };
	  $(window).resize(function(){
	    alterClass();
	  });
	  alterClass();
	


	$('.home-slider').slick({
	  dots: false,
	  autoplay:true,
	  autoplaySpeed: 5500,
	  speed: 1500,
	  lazyLoad: 'ondemand',
	  infinite: true,
	  slidesToShow: 1,
	  slidesToScroll: 1,
	  prevArrow: false,
	  nextArrow: false
	 });
	 
	 
	 //add titles to phone number links in footer
	 $( "#menu-phone-numbers li a" ).each(function( index ) {
		 var titleHeader = $(this).attr('title');		 
		 $(this).parent('li').prepend(titleHeader + '<br />' );
	});
	 
			
		

});
