<!DOCTYPE html>

<!--[if IE 9 ]><html class="ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--><html <?php language_attributes(); ?>><!--<![endif]-->

<head><meta http-equiv="Content-Type" content="text/html; charset=gb18030">
	<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <?php	
            wp_enqueue_script( 'Nano', get_template_directory_uri() . '/js/nano.js', array(), '1.0.0', true );
			wp_enqueue_style('CorporateS', get_template_directory_uri() . '/fonts/CorporateS.css');	
			wp_enqueue_style('CorporateA-C', get_template_directory_uri() . '/fonts/CorporateA-C.css');			
			wp_enqueue_script( 'AL-js', get_template_directory_uri() . '/js/almenus.js');
			wp_enqueue_style('style', get_stylesheet_uri() );
			wp_enqueue_style('Mega-Menu-CSS', get_template_directory_uri() . '/css/menus.css');
			
wp_enqueue_style('d-style', get_template_directory_uri() . '/css/d-style.css');			
			wp_head();
	?>
    <meta name="viewport" content="width=device-width">
    
 	<title><?php wp_title(); ?></title>
</head>

<body id="<?php print get_stylesheet(); ?>" <?php body_class('ct-body'); ?>>

<div id="overflow-container" class="overflow-container">
    <header id="site-header" class="site-header" role="banner">
        <div class='meta-navigation'>
			<?php if( has_nav_menu( 'meta' ) ) : get_template_part( 'menu', 'meta' ); endif; ?>
        </div>

        <div id='img_logo_site'>
            <a href="<?=get_theme_mod('mcbra_general_portal');?>" title="Portal <?php esc_attr( get_bloginfo( 'name' ) ) ?>">
            <img src='<?=get_template_directory_uri(). "/imgs/m.mb.2018.40.fw.png"; ?>'  alt='' /></a>
        </div>

        <div id="img-logo">
            <a href="<?=get_theme_mod('mcbra_general_portal');?>" title="Portal <?php esc_attr( get_bloginfo( 'name' ) ) ?>">
            <img src='<?=get_template_directory_uri()?>/imgs/d.mb.2018.64.fw.png' alt='' /></a>
        </div>
            
        <div id="menu-primary" class="menu-container menu-primary" role="navigation">
        	 
        	<div class='nm-mp'>
                <div class='nmmodels'>
                    <a href='<?=get_home_url();?>/modelos'>
                        <div class='mn-md-img'></div>
                        <span class='nocqi'>Modelos</span>
                    </a>
                </div>
                <div class='nmmenu'>
                    <a href='javascript:;'>
                        <div class='mn-mn-img'></div>
                        <span class='nocqi'>Menu</span>
                    </a>
                </div>
            </div>

        </div>
        <div id="title-info" class="title-info">
			<?php get_template_part('logo')  ?>
			<div id="blog-descrp">
				<?php bloginfo('description'); ?>Automóveis
            </div>
        </div>

        <div class="model_navigation" id="model_navigation">
            <?php get_template_part( 'menu', 'model' ); ?>
            <div id="menu_novo" style='display:none; padding:0 30px 100px 30px; width:auto; background: #fff; clear:both; color: #666;'>
                <div style='padding:20px 10px 20px 0'><div class='closeimg' style='left: 100%;position: relative;' ><!-- onclick='$(function() { $("#menu_novo").slideToggle(); })' --></div></div>
                <?php get_template_part( 'menu', 'novo' ); ?>
                <div style='clear:both'></div>
            </div>
        </div>
    </header>
    <div id="main" class="main" role="main">