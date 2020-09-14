<?
if (get_theme_mod('mcbra_pages_setting')==1) {
//$slides = get_theme_mod('pages_count_setting')!="" && get_theme_mod('pages_count_setting')>0 ? get_theme_mod('pages_count_setting') : 5;
$i=1;
for ($i=1; $i<=5; $i++) {
	if((get_theme_mod('mcbra_pages_active_setting_'.$i)!=1) && (get_theme_mod('mcbra_pages_url_setting_'.$i)!='')) {	    	
	    	
		if(get_theme_mod('mcbra_pages_img_setting_'.$i)) { $thumbnail = get_theme_mod('mcbra_pages_img_setting_'.$i); } else { $thumbnail = ""; }
		
		if ($thumbnail=='') { $css=' class="pageslink"'; } else { $css=''; }
		
		$pagespanel .= '<li' . $css . '><a href="' . get_theme_mod('mcbra_pages_url_setting_'.$i) . '" target="' . ((get_theme_mod('mcbra_pages_link_setting_'.$i)==1) ? '_blank' : '_self' ) . '">';
		
		if ($thumbnail!='') {
			$pagespanel .= '<img src="' . $thumbnail . '" alt="'. get_theme_mod('mcbra_pages_title_setting_'.$i) . '" />';
		}
		
		$pagespanel .= '<span>'.get_theme_mod('mcbra_pages_title_setting_'.$i).'</span>';		
		$pagespanel .= '</a></li>';
	}
	
	
}

$pagespanel = trim(preg_replace('/\s\s+/', ' ', $pagespanel));
//$menu_list .= '<li><a href="' . $url . '">' . $thumbnail . '</a></li>';

wp_enqueue_script( 'Page-Menu', get_template_directory_uri() . '/js/pages_menu.js', array(), '1.0.0', true );

if ($pagespanel!='') { ?>

<div id='alle'><div id='fahrzeugue'><div id='alltitle'>Todos os Veículos</div></div><ul id="menu-pages">

<?=$pagespanel; ?>

</ul><div id='imgb'><img src='<?=get_template_directory_uri()?>/imgs/pages-icon.jpeg?fit=186%2C77'/></div><div style='clear:both'></div></div>

<? } } ?>