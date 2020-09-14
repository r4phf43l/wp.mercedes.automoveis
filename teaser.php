<?

$acat = single_cat_title("", false);;
$cat = get_category_by_slug($acat); 
$catID = $cat->term_id;
$c = ( $catID ) ? $catID : '0';

$slides = get_theme_mod('teaser_count_setting')!="" && get_theme_mod('teaser_count_setting')>0 ? get_theme_mod('teaser_count_setting') : 6;

$i=0;
for ($i=1; $i<=$slides; $i++) {
	if(get_theme_mod('mcbra_teaser_active_setting_'.$c.'_'.$i)!=1) {
	    if(get_theme_mod('mcbra_teaser_img_setting_'.$c.'_'.$i)) {			
			$thumbnail = get_theme_mod('mcbra_teaser_img_setting_'.$c.'_'.$i);
        	} else {
			$thumbnail = get_template_directory_uri(). "/imgs/favicon-192x192.png?fit=192%2C192";
		}
		
		$teaserpanel .= '
		<div>		
			<a href="' . get_theme_mod('mcbra_teaser_url_setting_'.$c.'_'.$i) . '" target="' . ((get_theme_mod('mcbra_teaser_link_setting_'.$c.'_'.$i)==1) ? '_blank' : '_self' ) . '">
				<div class="img" style="background:url(' . $thumbnail . ');">					
					<div>' . get_theme_mod('mcbra_teaser_text_setting_'.$c.'_'.$i) . '</div>					
				</div>
				<span>' . get_theme_mod('mcbra_teaser_title_setting_'.$c.'_'.$i) . '</span>				
			</a>		
		</div>';
	}
}

$teaserpanel = trim(preg_replace('/\s\s+/', ' ', $teaserpanel));

wp_enqueue_style('Swiper', get_template_directory_uri() . '/css/swiper.css');

?>

<div id="menu-teaser">
	<div><?=$teaserpanel; ?></div> 
</div>

<script>
    $( document ).ready(function() {
	$( window ).resize(function() {
		six_thumbs();
	})
	six_thumbs();
    })    
    function six_thumbs () {
	if ($( window ).width()>=1024) {
		$('.home_thumbs.alle-active #menu-teaser > div > div:last-child').hide()
	} else {
		$('.home_thumbs.alle-active #menu-teaser > div > div:last-child').show()
	}
    }
</script>