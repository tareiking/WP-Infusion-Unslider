jQuery(document).ready(function ($) {
	$(function() {
	    $('.infusion-unslider').unslider({
	    	fluid: true,
	    	dots: true,
	    });
	     if(window.chrome) {
          $('.infusion-unslider').css('background-size', '100% 100%');
        };
	});
});
console.log( 'here' );3