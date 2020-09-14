<?

$acat = single_cat_title("", false);;
$cat = get_category_by_slug($acat); 
$catID = $cat->term_id;
$c = ( $catID ) ? $catID : '0';

//echo "--" . $c . "--";

$slides = get_theme_mod('slide_count_setting')!="" && get_theme_mod('slide_count_setting')>0 ? get_theme_mod('slide_count_setting') : 5; //receber num de slides das confs
for ($i=1; $i<=$slides; $i++) {
	if ((get_theme_mod('mcbra_slide_img_setting_'.$c.'_'.$i)!= "") && (get_theme_mod('mcbra_slide_active_setting_'.$c.'_'.$i)!=1)) {
		$featpanel .= '
		<div class="swiper-slide featsc-slide"><!--'.$c.'-->
			<div class="contt">
				<div class="img_feat" style="background-image: url(' .  get_theme_mod('mcbra_slide_img_setting_'.$c.'_'.$i) . ')">
					<div class="details ' . ((get_theme_mod('mcbra_slide_text_color_'.$c.'_'.$i)==1) ? 'light' : 'dark'). '">' .
						((get_theme_mod('mcbra_slide_title_setting_'.$c.'_'.$i)!='') ? '<h2>' .  get_theme_mod('mcbra_slide_title_setting_'.$c.'_'.$i) . '</h2>' : '') .
						((get_theme_mod('mcbra_slide_text_setting_'.$c.'_'.$i)!='') ? '<h3>' .  get_theme_mod('mcbra_slide_text_setting_'.$c.'_'.$i) . '</h3>' : '') .			
						((get_theme_mod('mcbra_slide_url_setting_'.$c.'_'.$i)!='') ? '<a href="' .  get_theme_mod('mcbra_slide_url_setting_'.$c.'_'.$i) . '" target="' . ((get_theme_mod('mcbra_slide_link_setting_'.$c.'_'.$i)==1) ? '_blank' : '_self' ) . '">' : '') .					
						((get_theme_mod('mcbra_slide_button_setting_'.$c.'_'.$i)!='') ? 
						'<button><span>' .  get_theme_mod('mcbra_slide_button_setting_'.$c.'_'.$i) . '</span></button>' : ((get_theme_mod('mcbra_slide_url_setting_'.$c.'_'.$i)=='') ? '' : '<button><span>Saiba Mais</span></button>')) .					
						((get_theme_mod('mcbra_slide_url_setting_'.$c.'_'.$i)!='') ? '</a>' : '') .
						'<div class="clear"></div>
					</div>
				</div>
			</div>
		</div>';
	}
}

$featpanel = trim(preg_replace('/\s\s+/', ' ', $featpanel));

wp_enqueue_script( 'Swiper', get_template_directory_uri() . '/js/swiper.min.js', array(), '1.0.0', true );
wp_enqueue_style('Swiper', get_template_directory_uri() . '/css/swiper.css');

?>

<div class="featsc"> 
    <div class="swiper-wrapper" style="display:none"><?=$featpanel; ?></div>
    <div class="featsc-pagination swiper-pagination"></div>
</div>

<script>

$(function(){

    var featSwiper = new Swiper('.featsc', {	
        pagination: { el: '.featsc-pagination', clickable: true },        
        slidesPerView: 1, 
		spaceBetween: 0,
        loop: true,
		preloadImages: true,
		autoplay: 5000
    });
	
	$('.featsc .swiper-wrapper').fadeIn('fast')
	
	featSwiper.on('slideChangeStart', function () {
    	$(".img_feat .details").fadeOut('fast');
	});
	featSwiper.on('slideChangeEnd', function () {
    	$(".swiper-slide-active .img_feat .details").fadeIn('slow');
	});	

})

</script>

