// JavaScript Document

$(document).ready(function(){
	$(window).resize(function(){
		var resizeTimer;
		if (resizeTimer) { clearTimeout(resizeTimer) }
		resizeTimer = setTimeout(function() {
			resizeTimer = null;
			if ($("body").width()>640) {
				load_cats();
			} else {
				$(".home_thumbs #alle #menu-pages li").slideDown({ duration: 500, queue: false });
			}
		}, 500);
	});
	if ($("body").width()>640) {
		load_cats();
	}
});

var timer;

$("body").on("mouseenter", "#alle",
	function(){
		if ($("body").width()>639) {
			timer = setTimeout(function () {
				$("#imgb").slideUp({ duration: 600, queue: false });
				$(".home_thumbs #alle #menu-pages li").slideDown({ duration: 500, queue: false });		
			}, 300);
		}

	}).on("mouseleave", "#alle",
		function(){
			if ($("body").width()>639) {
				clearTimeout(timer);
				$("#imgb").slideDown({ duration: 600, queue: false });
				$(".home_thumbs #alle #menu-pages li").slideUp({ duration: 500, queue: false });
			}
	});

function load_cats(){
	var oldsz = $(".home_thumbs").width();
	if ($("body").width()>799) {		
		var newsz = oldsz-225;
	}
	if (($("body").width()>639) && (($("body").width()<800))) {
		var newsz = oldsz-205;
	}
	$(".home_thumbs #menu-teaser").width(newsz);
	$(".home_thumbs #alle").mouseenter();
	$(".home_thumbs #alle").mouseleave();
	$(".home_thumbs #alle").fadeIn('slow');
}