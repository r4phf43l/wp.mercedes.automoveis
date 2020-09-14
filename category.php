<?php
get_header(); 
get_template_part('content/archive-header');
//$c = (get_category_by_slug( single_cat_title() )) ? get_category_by_slug( single_cat_title() ) : '0';

$acat = single_cat_title("", false);;
$cat = get_category_by_slug($acat); 
$catID = $cat->term_id;
$c = ( $catID ) ? $catID : '0';

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
<div style="background:#fff; padding:0 20px 20px">
    <div class="sidebar sidebar-home" id="sidebar-block1">
        <h2>
            <?=((get_theme_mod('mcbra_block_setting_'.$c.'1')!='') ? get_theme_mod('mcbra_block_setting_'.$c.'_1') : 'Novidades')?>
        </h2>
        <?php get_template_part('sidebar','block1'); ?>
    </div>
    <div class="sidebar sidebar-home" id="sidebar-block2">
        <h2>
            <?=((get_theme_mod('mcbra_block_setting_'.$c.'2')!='') ? get_theme_mod('mcbra_block_setting_'.$c.'_2') : 'Servi&ccedil;os')?>
        </h2>
        <?php get_template_part('sidebar','block2'); ?>
    </div>
    <div class="sidebar sidebar-home" id="sidebar-block3">
        <h2>
            <?=((get_theme_mod('mcbra_block_setting_'.$c.'3')!='') ? get_theme_mod('mcbra_block_setting_'.$c.'_3') : 'Not&iacute;cias')?>
        </h2>
        <?php get_template_part('sidebar','block3'); ?>
    </div>
	<div style="clear:both"></div>
</div>
<?php get_footer(); ?>

<?php /* get_header(); ?> 
<div class='entry' style="background-image:">
<div class="widgts-pages">
<?php get_template_part('sidebar','sidebarpage'); ?>
</div>

<?php if ( have_posts() ) : ?>
    <div class="entry-container">
        <div class='entry-header'>
            <h1 class='entry-title'>
                <?php single_cat_title(); ?>
            </h1>
            <?php if ( category_description() ) : ?>
            <div class="descr">
                <?php echo category_description(); ?>
            </div>
            <?php endif; ?>
        </div>
<?php while ( have_posts() ) : the_post(); ?>
    <h1 class='entry-title'>
        <a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">
            <?php the_title(); ?>
        </a>
    </h1>
    <!--<div class='entry-content'>
        <article>
            <?php the_content(); ?>
        </article>
    </div>-->
<?php endwhile; else: ?>
    <div class="entry-container">
        <div class='entry-header'>
                <h1 class='entry-title'>Categoria: <?php single_cat_title(); ?></h1>
                <?php if ( category_description() ) : ?><h2><?php echo category_description(); ?></h2><?php endif; ?>
        </div>
        <div class='entry-content'>
            <article>
				Desculpe-nos, mas ainda não há nada aqui.
            </article>
        </div>
<?php endif; ?>
    </div>
    <div style="clear:both"></div>
</div>

<?php

$_thumb = cfi_featured_image_url( array( 'size' => 'large' ) );

echo $_thumb;

if ($_thumb!='') :
		$thumb = '#FFF url('.$_thumb.') no-repeat center top';
?>
<script>
$( document ).ready(function() {
	$('.entry-container').css({ "margin-top": "262px", "padding-top": "19px" });
	$('.entry').css({ "background": "<?=$thumb?>" });
})
</script>
<?php endif; get_footer(); */?>