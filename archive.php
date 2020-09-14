<?php get_header(); ?> 
<div class='entry' style="background-image:">
<div class="widgts-pages">
<?php get_template_part('sidebar','sidebarpage'); ?>
</div>

<?php if ( have_posts() ) : ?>
    <div class="entry-container" style="margin-top: 0px">
        <div class='entry-header'>
            <h1 class='entry-title'>
                <?php the_archive_title(); ?>
            </h1>
        </div>
<?php while ( have_posts() ) : the_post(); ?>
    <h1 class='entry-title'>
        <a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">
            <?php the_title(); ?>
        </a>
    </h1>
    <div class='entry-content'>
        <article>
           <?php // the_content(); ?>
        </article>
    </div>
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
<?php get_footer(); ?>