<?php
get_header(); 
?>
<div class='home_slider'>
    <?php get_template_part( 'slider' ); ?>
    <div class='home_thumbs<? if (get_theme_mod('mcbra_pages_setting')==1) { echo " alle-active";} ?>'>
		<?php get_template_part( 'teaser' ); ?>
        <?php get_template_part( 'pages' ); ?>
        <div style='clear:both'></div>
    </div>
</div>
<?php get_template_part( 'menu', 'home' ); ?>
<div style="background:#fff; padding:0 14px 14px">
    <div class="sidebar sidebar-home" id="sidebar-block1">
        <h2>
            <?=((get_theme_mod('mcbra_block_setting_1')!='') ? get_theme_mod('mcbra_block_setting_1') : 'Novidades')?>
        </h2>
        <?php get_template_part('sidebar','block1'); ?>
    </div>
    <div class="sidebar sidebar-home" id="sidebar-block2">
        <h2>
            <?=((get_theme_mod('mcbra_block_setting_2')!='') ? get_theme_mod('mcbra_block_setting_2') : 'Servi&ccedil;os')?>
        </h2>
        <?php get_template_part('sidebar','block2'); ?>
    </div>
    <div class="sidebar sidebar-home" id="sidebar-block3">
        <h2>
            <?=((get_theme_mod('mcbra_block_setting_3')!='') ? get_theme_mod('mcbra_block_setting_3') : 'Not&iacute;cias')?>
        </h2>
        <?php get_template_part('sidebar','block3'); ?>
    </div>
	<div style="clear:both"></div>
</div>
<?php get_footer(); ?>