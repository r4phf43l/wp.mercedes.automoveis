<?php
$acat = single_cat_title("", false) ? strtolower(single_cat_title("", false)) : get_theme_mod('mcbra_models_cat_default');
$acat = (strpos($acat, 'autom')) ? 'automoveis' : $acat;
$acat = (strpos($acat, 'nibus')) ? 'onibus' : $acat;
$acat = (strpos($acat, 'camin')) ? 'caminhoes' : $acat;

$models = get_theme_mod('mcbra_models_count_setting')!="" && get_theme_mod('mcbra_models_count_setting')>0 ? get_theme_mod('mcbra_models_count_setting') : 10;

for ($i=1; $i<=$models; $i++) {
	if (get_theme_mod('mcbra_models_active_setting_' . $i)!=1) {
		$im[get_theme_mod('mcbra_models_classe_setting_' . $i)]++;
		$c[$i] = (str_replace("_".$acat, "", get_theme_mod('mcbra_models_classe_setting_' . $i)));
		$cn[$i] = ((($acat=='automoveis') && (strlen($c[$i])==1)) ? "Classe " : "");
		$cn[$i] .= $c[$i];	
		
		$fly[get_theme_mod('mcbra_models_classe_setting_' . $i)] .=	"
            <div class='swiper-slide flyout_content'>
                <div class='swiper-img'>
                    <img src='" . get_theme_mod('mcbra_models_img_setting_' . $i) . "' />
                </div>
                <div class='swiper-id'>
                    <h2>" . $cn[$i] . ".</h2><!--
                    <strong>" . get_theme_mod('mcbra_models_url_4_setting_' . $i) . "</strong><br>
                    " . get_theme_mod('mcbra_models_url_5_setting_' . $i) . "<br><br>--> 
                    <div>
                        <a href='" . get_theme_mod('mcbra_models_url_3_setting_' . $i) . "' target='_blank'>
                            <!--<div>" .
                                $cn[$i] . ((get_theme_mod('mcbra_models_title_setting_' . $i)!=$cn[$i]) ? " " . get_theme_mod('mcbra_models_title_setting_' . $i) : "") . "
                            </div>-->
                            <div>" . get_theme_mod('mcbra_models_url_4_setting_' . $i) . "</div>
                        </a>
                        <!--
                      	<a href='" . get_theme_mod('mcbra_models_url_1_setting_' . $i) . "' target='" . ((get_theme_mod('mcbra_models_link_1_setting_' . $i)!=1)?'_self':'_blank') . "'><div>Dados Técnicos</div></a>
                      	<a href='" . get_theme_mod('mcbra_models_url_2_setting_' . $i) . "' target='" . ((get_theme_mod('mcbra_models_link_2_setting_' . $i)!=1)?'_self':'_blank') . "'><div>Galeria de Fotos</div></a>
                      	-->" . (get_theme_mod('mcbra_models_url_6_setting_' . $i)!='' ? 
                      	"<a href='" . get_theme_mod('mcbra_models_url_6_setting_' . $i) . "' target='" . ((get_theme_mod('mcbra_models_link_6_setting_' . $i)!=1)?'_self':'_blank') . "'>
                      	    <div>" . get_theme_mod('mcbra_models_url_7_setting_' . $i) . "</div></a>" : "") .
                    "</div>
                </div>
			</div>
		";
		
		if (get_theme_mod('mcbra_models_active_0_setting_' . $i)!=1) {
		    $count_model[get_theme_mod('mcbra_models_classe_setting_' . $i)]++; //style='width: calc(--PCLFM--% - 30px)' 
			$modelos[get_theme_mod('mcbra_models_classe_setting_' . $i)] .= "<td><div class='mslide" . (($count_model[get_theme_mod('mcbra_models_classe_setting_' . $i)]==1) ? " active" : "") . "' rel='". $count_model[get_theme_mod('mcbra_models_classe_setting_' . $i)] ."'>" . get_theme_mod('mcbra_models_title_setting_' . $i) . "</div></td>";
		}
		$cfly[get_theme_mod('mcbra_models_classe_setting_' . $i)]++;
	}	
}

$cclasses = get_theme_mod('mcbra_classes_count_setting')!="" && get_theme_mod('mcbra_classes_count_setting')>0 ? get_theme_mod('mcbra_classes_count_setting') : 10;
echo "<div id='openmodels'><a href='#'>Modelos</a></div><ul class='lista_modelos'><div id='closemodels'><a href='#'>Fechar</a></div><div style='clear:both'></div>";

for ($i=1; $i<=$cclasses; $i++) {
    $actslider = 0;
    $pclfm = 1;
    //if ((get_theme_mod('mcbra_classes_cats_setting_' . $i)==$acat) && (get_theme_mod('mcbra_classes_active_setting_' . $i)!=1)) {
    if (get_theme_mod('mcbra_classes_cats_setting_' . $i)==$acat) {

        $lfm = "<table class='slider-pag'><tr rel='" . $i . "'>" . $modelos[get_theme_mod('mcbra_classes_count_setting_' . $i)."_".$acat] . "</tr></table>";
        if (get_theme_mod('mcbra_classes_count_setting_' . $i)!='AMG') {
            $lcm.="<li class='flayout_nav' rel='" . $i . "'><a href='#'>" . get_theme_mod('mcbra_classes_count_setting_' . $i) . "</a></li>";
            if ($cfly[get_theme_mod('mcbra_classes_count_setting_' . $i)."_".$acat] > 1) {
                $lsp .= "
                    menuSwiper[" . $i . "]  = new Swiper('.slider_" . $i . "', {	
                        pagination: '.sp-" . $i . "', 
                        wrapperClass: 'sw-" . $i . "',
                        slidesPerView: 1, 
                        spaceBetween: 1,
                        preloadImages: true,
                        effect: 'fade',
                        navigation: {
                            nextEl: '.swiper-button-next',
                            prevEl: '.swiper-button-prev',
                        }
                    });
                    menuSwiper[" . $i . "].on('slideChange', function () {
                        console.log('in')
                        $('[id^=\"slider_\"] > .slider-pag .mslide').removeClass('active');
                        $('[id^=\"slider_\"] > .slider-pag  .mslide[rel=' + (menuSwiper[" . $i . "].realIndex + 1) + ']').addClass('active');
                        console.log('out')
                    });
                ";
                $actslider = 1;
            }
            $lfo.= "
                <div id='slider_" . $i . "' act='" . $actslider ."'>
                    <div class='closemodel'><div class='closeimg'></div></div>
                    " . $lfm . "
                    <div class='slider_" . $i . "' rel='" . $i . "'>
                        <div class='swiper-button-next' style='opacity: 0 !important'></div>
                        <div class='swiper-button-prev' style='opacity: 0 !important'></div>
                        
                        <div class='swiper-wrapper sw-" . $i . "'>
                            " . $fly[get_theme_mod('mcbra_classes_count_setting_' . $i)."_".$acat] ."
                        </div>
                        <div class='swiper-pagination sp-" . $i . "'></div>
                    </div>
                </div>
            ";
        } else {
            $lcm.="<li class='flayout_nav' rel='" . $i . "'><a href='" . get_theme_mod('mcbra_classes_url_setting_' . $i) . "' target='_blank'>" . get_theme_mod('mcbra_classes_count_setting_' . $i) . "</a></li>";
        }
	}
}

$lfo = trim(preg_replace('/\s\s+/', ' ', $lfo));

wp_enqueue_script( 'Swiper', get_template_directory_uri() . '/js/swiper.min.js', array(), '1.0.0', true );
wp_enqueue_style('Swiper', get_template_directory_uri() . '/css/swiper.css');

echo $lcm . $lfo . "</ul>";
?>

<style>
    <!--
    .flyout_content a:link { color: #00adef !important; font-weight: 700; }
    .flyout_content { background: #FFF !important; }
    .flyout_content { display:block }
    .flyout_content > .swiper-id { width:225px; height:325px; margin: 20px 10px 0 35px; float:left }
    .flyout_content > .swiper-id > h2 { width:225px; height:45px; font-size:36px; margin-bottom:9px; top: 0; left: 0; color: #333; position: initial }
    .flyout_content > .swiper-img { width:705px; height:325px; padding: 20px 20px 0 0; float:right }
    .flyout_content > .swiper-img > img { width:705px; height:325px }
    [id^="slider_"] { display:none; width:100%; overflow:hidden; background: #FFF; height: 424px; }
    
    #openmodels, #closemodels { display:none }
    .closemodel { margin: 20px 20px 0 0; position: absolute; right:0; top:44px; z-index:9; width: 16px; height: 16px; }
    [class^="swiper-button-"] { display: none }
    .closemodel .closeimg { background:url(<?=get_template_directory_uri()?>/imgs/ic8-x-d.svg) no-repeat center center; width: 16px; height: 16px; }
    .closemodel .closeimg:hover { background:url(<?=get_template_directory_uri()?>/imgs/ic8-x-a.svg) no-repeat center center; }
    
    [id^="slider_"] .swiper-button-next { right: 20px !important; background:url(<?=get_template_directory_uri()?>/imgs/arrow-right-a.svg) no-repeat center center !important; }
    [id^="slider_"] .swiper-button-prev { left: 275px !important; background:url(<?=get_template_directory_uri()?>/imgs/arrow-left-a.svg) no-repeat center center !important; }
    [id^="slider_"] .swiper-button-next:hover, [id^="slider_"] .swiper-button-prev:hover { opacity: 1 }
    
    [id^="slider_"] [class^="swiper-button-"] { width: 32px; height: 100px}
    
    .swiper-id a:first-of-type div {
        
        /*background-color: #00adef !important;
        border-color:#43b7ea #0d516e #0d516e #43b7ea !important;*/
        
    margin-top: 25px;
    font-size: 14px;
    line-height: 30px;
    padding: 0 10px 0 20px;
    border: 0;
    border-radius: 1px;
    width: auto;
    height: auto;
    background-image: url(<?=get_template_directory_uri()?>/imgs/arrow-right-white-d.svg);
    background-position: 7px 50%;
    background-size: 7px 10px;
    background-repeat: no-repeat;
    background-color: inherit;
    }
    
    .swiper-id > div > a {
        background-image: linear-gradient(to bottom, #00adef, #0887be);
        display: block;
        
    }
    .swiper-id > div > a:hover {
        background-image: linear-gradient(to bottom, #0088c6, #066ea4);
    }
    .swiper-id a div {
        line-height:14px;
        padding: 10px 8px 10px 20px;
        text-align:left;
        margin-bottom: 6px;
        background-color: #1f1f1f;
        border-color: #333 #000 #000 #333 !important;
        border: 1px solid;
        background-image: url(<?=get_template_directory_uri()?>/imgs/arrow-right-white-d.svg);
        background-size: 7px 12px;
        background-position: 4% 50%;
        background-repeat: no-repeat;
    }
    .swiper-id a:link div {
        color: #FFF;
        font-size: 14px;
        font-weight: normal;
    }
    .swiper-id a:hover div {
        color: #FFF;
        background-color:inherit;
    }
    .swiper-id a:hover:first-of-type div {
        background-color: #0088c6 !important
    }
    
    [id^="slider_"] > .slider-pag { width:714px; height: 42px; right: 30px; position: absolute; margin: 0; border:0; padding:0; border-spacing: 10px 0; border-collapse: initial; bottom: 40px;}
    [id^="slider_"] > .slider-pag td { width:auto; border:0; font-size:16px; padding: 0 10px;  }
    [id^="slider_"] > .slider-pag .mslide { width:100%; color: #000; font-weight: 700; border-bottom: 3px solid #000; margin: 5px; font-style: normal !important; padding:5px 10px 2px 10px; cursor: pointer; }
    [id^="slider_"] > .slider-pag .active { color: #00adef; border-bottom: 3px solid #00adef }
    
    @media only screen and (max-width:479px){ 
        #model_navigation > ul > li {
            padding: 10px !important;
        } 
        .closemodel {
            position: inherit;
            float: right;
            margin: 20px 20px 20px 0;
        }
        [id^="slider_"] {
            height: auto;
        }
        .flyout_content > .swiper-id {
            width: calc(100% - 40px);
            height: auto;
            margin: 20px 20px 0 20px;
        }
        .flyout_content > .swiper-img, .flyout_content > .swiper-img > img {
            width: 360px;
            height: 166px;
            padding: 0;
        }
        [id^="slider_"] > .slider-pag {
            position: inherit;
            width: 340px;
            border-spacing: 5px 0;
        }
        [id^="slider_"] > .slider-pag td {
            font-size: 12px;
        }
        [id^="slider_"] > .slider-pag .mslide {
            margin:0
        }
    }
    @media only screen and (min-width:480px) and (max-width:639px){
        #model_navigation > ul > li {
            padding: 10px !important;
        } 
        .closemodel {
            position: inherit;
            float: right;
            margin: 20px 20px 20px 0;
        }
        [id^="slider_"] {
            height: auto;
        }
        .flyout_content > .swiper-id {
            width: calc(100% - 40px);
            height: auto;
            margin: 20px 20px 0 20px;
        }
        .flyout_content > .swiper-img, .flyout_content > .swiper-img > img {
            width: 480px;
            height: 221px;
            padding: 0;
        }
        [id^="slider_"] > .slider-pag {
            position: inherit;
            width: 460px;
            border-spacing: 5px 0;
        }
        [id^="slider_"] > .slider-pag td {
            font-size: 12px;
        }
        [id^="slider_"] > .slider-pag .mslide {
            margin:0
        }
    }
    @media only screen and (min-width:640px) and (max-width:811px){
        #model_navigation > ul > li {
            padding: 0 8px !important;
        } 
        .closemodel {
            position: inherit;
            float: right;
            margin: 20px 20px 20px 0;
        }
        [id^="slider_"] {
            height: auto;
        }
        .flyout_content > .swiper-id {
            width: calc(100% - 40px);
            height: auto;
            margin: 20px 20px 0 20px;
        }
        
        .flyout_content > .swiper-img, .flyout_content > .swiper-img > img {
            width: 640px;
            height: 295px;
            padding: 0;
        }
        [id^="slider_"] > .slider-pag {
            position: inherit;
            width: 620px;
            border-spacing: 5px 0;
        }
        [id^="slider_"] > .slider-pag td {
            font-size: 12px;
        }
        [id^="slider_"] > .slider-pag .mslide {
            margin:0
        }
    }
    @media only screen and (min-width:812px) and (max-width:1043px){
        #model_navigation > ul > li {
            padding: 0 12px !important;
        } 
        [id^="slider_"] {
            height:300px;
        }
        .flyout_content > .swiper-id {
            margin: 10px 10px 0 20px;
            height:auto;
        }
        .swiper-id > div { top: 100px; position: absolute; width: 230px; }
        .flyout_content > .swiper-img {
            width: 503px;
            height: 231px;
            padding: 10px 10px 0 0;
        }
        .flyout_content > .swiper-img > img {
            width: 503px;
            height: 231px;
        }
        [id^="slider_"] > .slider-pag {
            width: 503px;
            /*position: inherit;*/
            bottom: 10px;
        }
    }
    @media only screen and (min-width:1044px) {
        .swiper-id > div { top: 170px; position: absolute; width: 230px; }
    }
    -->
</style>

<script>

$( document ).ready(function() {
    var menuSwiper = [];
    <?=$lsp?>
    $('.slider-pag .mslide').on( "click", function (e) {
      e.preventDefault();
      menuSwiper[$(this).parent().parent().attr('rel')].slideTo(($(this).attr('rel') - 1), 600);     
    });
   $('.flayout_nav a').click(
       	function () {
            $('div[id^="slider_"]').slideUp();
            var p = $(this).parent().attr('rel');
            var page = '#slider_' + p;
            $(page).slideDown("slow", function(){
                $('[class^="swiper-button-"]').hide(0);
                if ($(page).attr('act')==1) {
                    $('[class^="swiper-button-"]').show(0);
                    menuSwiper[p].update();
                }
            });
        }
    )
    $('#openmodels a').click(    
        function () {  
		$('.lista_modelos').fadeIn("slow", function() {
                $('.lista_modelos').slideDown() 
            });	
        }
    )
    $('.lista_modelos #closemodels a').click(    
        function () {
		$('.lista_modelos').fadeOut(0, function() {
                $('.lista_modelos').slideUp() 
            }); 	
        }
    )
    $('.closemodel .closeimg').click(    
        function () {
            $('[class^="swiper-button-"]').hide(0);
            $('div[id^="slider_"]').slideUp()        		
        }
    )
    $('.flyout_content > .swiper-img img').mouseenter(
        function () {
            $('[id^=\"slider_\"] [class^=\"swiper-button-\"]:not(.swiper-button-disabled)').css({ opacity: 0.8 })
            $('[id^=\"slider_\"] .swiper-button-disabled').css({ opacity: 0.1 })
        }
    ).mouseleave(
        function () {
            $('[id^=\"slider_\"] [class^=\"swiper-button-\"]').css({ opacity: 0 })
        }
    )
    $('[id^=\"slider_\"] [class^=\"swiper-button-\"]').mouseenter(
        function () {
            $('[id^=\"slider_\"] [class^=\"swiper-button-\"]:not(.swper-button-disabled)').css({ opacity: 0.8 })
            $('[id^=\"slider_\"] .swiper-button-disabled').css({ opacity: 0.1 })
            $(this).css({ opacity: 1 })
        }
    ).mouseleave(
        function () {
            $(this).css({ opacity: 1 })
        }
    )
})
</script>