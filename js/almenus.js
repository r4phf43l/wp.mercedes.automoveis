( function( $ ) {
$( document ).ready(function() {

	/*$('#cssmenu').prepend('<div id="menu-button"></div>');*/
	$('#menu_novo .closeimg').on('click', function(){
	   $('.nmmenu a').trigger('click');
	})
	
	$('.nmmenu a').on('click', function(){
	    //alert('click')
	    $("#menu_novo").slideToggle();
		var menu = $('.mn-mn-img');
		if (menu.hasClass('sel')) {
			menu.removeClass('sel');
			window.location.href='#site-header'
		}
		else {
			menu.addClass('sel');
			window.location.href='#menu_novo'
		}
	});
	
	$('#menu-primary').fadeIn('slow');
	$('#menu-meta').fadeIn('slow');
});
} )( jQuery );
