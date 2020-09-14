<script>
$( document ).ready(function() {

	$("[id*='menu-item-'] a:contains('Seminovos')").parent().removeClass(function() {
			return $( this ).prev().attr( "class" );
		}).addClass( "menu-item menu-item-type-custom menu-item-object-custom current-menu-item menu-item-has-children" );
	
	$("[id*='menu-item-'] a:contains('Seminovos')").show();
	$("[id*='menu-item-'] a:contains('Seminovos')").parent().show();
	$('.widget_nav_menu:last-child').hide();

<? if (isset($_GET['single_prod_id'])) { ?>
	if ($( window ).width()>639) {	
		$('.main-image-block img').attr('style', 'width: 150px !important');
	}
	if ($( window ).width()>767) {	
		$('.main-image-block img').attr('style', 'width: 200px !important');
	}
	if ($( window ).width()>999) {	
		$('.main-image-block img').attr('style', 'width: 300px !important');
	}
	if ($( window ).width()<640) {	
		$('.main-image-block').attr('style', 'display: block !important');
		$('.main-image-block img').attr('style', 'width: 100% !important');
		$('.huge_it_catalog_view_tabs_contents li').last().attr('style', 'display: none !important');
		$('.huge_it_catalog_view_tabs_contents li h4').attr('style', 'display: none !important');
	}	

	$(".huge-it-catalog-bottom-block").appendTo(".right-block");
	$(".title-block").prependTo(".huge_it_catalog_container");
	$(".description-block").appendTo(".right-block");
	$('.huge_it_catalog_view_tabs_contents').attr('style', 'padding: 0 !important');
	$('.parameter-block').attr('style', 'padding-left: 0 !important');
	$('.value-block:last-child').attr('style', 'padding-left: 0 !important; padding-bottom: 10px !important');
	$('.parameter-block').last().attr('style', 'padding-left: 0 !important; padding-top: 10px !important');

	if ($( window ).width()>639) {
		$("#form-seminovos").appendTo(".left-block");
	} else {
		$("#form-seminovos").appendTo(".right-block:after");
	}
	
	$("input[name='modelo']").attr('value', $(".title-block h2").text());
	$("input[name='modelo']").prop('readonly', true);

<? } else { ?>
	$("[class*='element_'] [class*='image-block_'] img").attr('style', 'width: auto !important; height: auto !important');
	$("#form-seminovos").hide();			
<? } ?>
})
</script>