<?php if ( has_nav_menu( 'home' ) ) { ?>
<div id="menu-home" class="menu-container menu-home" role="navigation">
<?php wp_nav_menu( array( 'theme_location' => 'home', 'container_class' => 'menu-home-container', 'menu_class' => 'menu-home-items', 'menu_id' => 'menu-home-items', 'items_wrap' => '<ul id="menu-home-items" class="menu-home-items"> %3$s </ul>', 'fallback_cb' => '') ); ?>

<div class='social_links'>
    <?php
		// Social ICONS
		$social_sites = array(
            'twitter',
            'facebook',
            'instagram',
            'youtube'
        );

		foreach($social_sites as $social_site) {		
			if (get_theme_mod('mcbra_social_'.$social_site.'_setting')!=''):
				echo '<a href="' . get_theme_mod('mcbra_social_'.$social_site.'_setting') . '" class="'.$social_site.'">'.ucfirst($social_site).'</a>';
			endif;
		}
    ?>
</div>
</div>
<?php } ?>