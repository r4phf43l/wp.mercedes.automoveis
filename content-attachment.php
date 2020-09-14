<div class='entry' style="background: #FFF url(<?=$thumb?>) no-repeat center top">
<div class="widgts-pages">
<?php get_template_part('sidebar','sidebar'); ?>
</div>
    <div class="entry-container">
        <div class='entry-header'>
                <h1 class='entry-title'><?php the_title(); ?></h1>
        </div>

        <div class='entry-content'>
            <div class="entry-meta">
                <span class="date"><?php echo get_the_date('F j'); ?> / </span>
                <span class="author"><?php the_author_posts_link(); ?></span>
            </div> 
            <div style="clear:both"></div>       
            <article>
                <?php
                $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
                $image = $image[0];
                echo "<img src='$image' style='width:100%' />";
                ?>
            </article>
            <nav class='further-reading'>
                <p class='prev'>
                    <span><?php previous_image_link( false, __( 'Imagem Anterior', 'mcbra' ) ); ?></span>
                </p>
                <p class='next'>
                    <span><?php next_image_link(false, __( 'Pr&oacute;xima Imagem', 'mcbra' )); ?></span>
                </p>
            </nav>            
        </div>
    </div>
    <div style="clear:both"></div>
</div>



