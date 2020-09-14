<?php /* Template Name: Veiculos */ ?>
<?php get_header(); ?>

<div class='entry'>

<?php
    
$acat = single_cat_title("", false) ? strtolower(single_cat_title("", false)) : get_theme_mod('mcbra_models_cat_default');

$acat = (strpos($acat, 'autom')) ? 'automoveis' : $acat;
$acat = (strpos($acat, 'nibus')) ? 'onibus' : $acat;
$acat = (strpos($acat, 'camin')) ? 'caminhoes' : $acat;

$models = get_theme_mod('mcbra_models_count_setting');

for ($i=1; $i<=$models; $i++) {
	if (get_theme_mod('mcbra_models_active_setting_' . $i)!=1) {
        if (get_theme_mod('mcbra_models_active_0_setting_' . $i)!=1) {
            if (get_theme_mod('mcbra_models_title_setting_' . $i)!='') {
                $ce = explode("_", get_theme_mod('mcbra_models_classe_setting_' . $i));
                if (($ce[1]==$acat)) {
                    $im[get_theme_mod('mcbra_models_classe_setting_' . $i)]++;
                    $c[$i] = $ce[0];
                    $cn[$i] = ((($acat=='automoveis') && (strlen($c[$i])==1)) ? "Classe " : "");
                    $cn[$i] .= $c[$i];
                    $chk_fly = "<li><a href='" . get_theme_mod('mcbra_models_url_3_setting_' . $i) . "'><img src='" . get_theme_mod('mcbra_models_mini_setting_' . $i) . "' /><p>" . $cn[$i] . ".</p></a></li>";
                    $fly[get_theme_mod('mcbra_models_title_setting_' . $i)] .= $chk_fly;
                }
            }
        }
	}	
}

wp_enqueue_script( 'Swiper', get_template_directory_uri() . '/js/swiper.min.js', array(), '1.0.0', true );
wp_enqueue_style('Swiper', get_template_directory_uri() . '/css/swiper.css');
//wp_enqueue_script( 'Nano', get_template_directory_uri() . '/js/nano.js', array(), '1.0.0', true );
//wp_enqueue_style('Nano', get_template_directory_uri() . '/css/nano.css');
?>

<script>
$( document ).ready(function() {
    var featSwiper = new Swiper('.models-slider', {	
        slidesPerView: 'auto', 
		spaceBetween: 0,
        loop: true,
		preloadImages: true,
		speed: 600,
        parallax: true
    });

    $('.aslide').on( "click", function (e) {
      e.preventDefault();
      featSwiper.slideTo(($(this).attr('rel') - 1), 600);
    });
    //jQuery(".nano").nanoScroller();
})
</script>

<?
uksort($fly, "strnatcasecmp");
//ksort($fly);
$ai=1;
foreach ( $fly as $key => $value ) {
    $lcm.="<li class='colunm_nav swiper-slide nano'><h3>" . $key . "</h3><ul class='nano-content'>" . $value . "</ul></li>";
    $lfo.="<li class='colunm_lnk'><a class='aslide' href='javascript:;' rel='" . $ai . "'>" . $key . "s</a></li>";
    $ai++;
}

echo "  <div class='models-slider'><ul class='slider-models swiper-wrapper'>" . $lcm . "</ul></div>
        <div class='slide_nav'><ul>" . $lfo . "</ul></div>

";
?>
<style>
<!--
.entry { padding-top:15px !important; }
.models-slider {
    height:401px;
    overflow:hidden;
    width:100%;
    background: url(<?=get_template_directory_uri()?>/imgs/model_overview_background_1000x470_12-2011.jpg) no-repeat center center;
}
.slider-models {
    margin-top: 1px;
    list-style: none;
    height: 401px !important;
}
.colunm_nav h3 { font-weight: 400; font-size: 26px; padding-bottom: 10px; }
.slider-models > li { margin: 0 40px !important; float: left; min-width:272px; display:block; cursor: grab; width:auto !important; overflow:hidden;}
.slider-models > li > ul { height:340px; clear:both; display:block; list-style: none; top:44px !important;}
.slider-models > li > ul li { margin-right:10px; float:left; height:170px; } 
.slider-models > li > ul li a img { height:124px; width:271px; padding-bottom: 8px  } 
.slider-models > li > ul li a { width:271px; }
.slider-models > li > ul li a p { font-weight: 700; color: #333; font-size: 12px; color: #666; display: block; line-height: 1.3; padding:0; margin:0; }

.slide_nav {
line-height: 1.3;
background: linear-gradient(to bottom,#6d6e72 21%,#2e3034 79%);
padding-top: 10px;
min-height:43px;
display: flex;
}
.slide_nav ul {
list-style: none;
border-bottom: 0;
margin: 0 0 20px 18px !important;
clear:both;
}
.slide_nav ul li {
    float: left;
    background-color: #666;
    border-color: #999 #333 #333 #999;
    border-style: solid;
    border-width: 1px;
    z-index: 5;
}
.slide_nav ul li a {
    font-size: 12px !important;
    display: block;
    float: left;
    margin-left: 1px;
    height: 17px;
    padding: 3px 12px;
}
-->
</style>
<div style='clear:both'></div>
</div>
<?php get_footer(); ?>