<?php
if (get_post_thumbnail_id( $post->ID )) :
	$thumb = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
	$pos_text = ' style="padding-top:19px"';	
	$thumb = ' style="background: #FFF url('.$thumb[0].') no-repeat center top"';
endif
?>

<div class='entry'<?=$thumb?>>
<div class="widgts-pages">
<?php get_template_part('sidebar','sidebarpage'); ?>
</div>
    <div class="entry-container"<?=$pos_text?>>

        <!--<div class="entry-meta">
            <?php get_template_part('content/post-meta'); ?>
        </div>-->

        <div class='entry-header'>
                <h1 class='entry-title'>;)<?php the_title(); ?></h1>
        </div>

        <div class='entry-content'>
            <article>
            
                <?php the_content(); ?>
              
<?
        $attachments = get_posts( array(
            'post_type' => 'attachment',
            'posts_per_page' => -1,
            'post_parent' => $post->ID,             
        ) );
        if ( $attachments ) {
            foreach ( $attachments as $attachment ) {
				$chkurl = wp_get_attachment_image_src( $attachment->ID, 'single-post-thumbnail', true );
				if ($chkurl != $thumb[0]) {
					$class = "post-attachment mime-" . sanitize_title( $attachment->post_mime_type );
					$thumbimg = wp_get_attachment_link( $attachment->ID, 'thumbnail', true );
					echo '<li class="' . $class . ' data-design-thumbnail">' . $thumbimg . '</li>';
				}
            }

        }
?>
                
                <?php wp_link_pages(array('before' => '<p class="singular-pagination">' . __('P&aacute;ginas:','mcbra'), 'after' => '</p>', ) ); ?>
            </article>
        </div>
        
        <div class='entry-meta-bottom'>
            <?php //get_template_part('content/further-reading'); ?>
            <?php //get_template_part('content/category-links'); ?>
            <?php //get_template_part('content/tag-links'); ?>
        </div>
        
        <?php /*
        if(get_theme_mod('additional_options_author_meta_settings') != 'hide'){ ?>
            <div class="author-meta">
                <div class="author">
                    <?php echo get_avatar( get_the_author_meta( 'ID' ), 72, '', get_the_author() ); ?>
                    <span><?php
                            _e( 'Escrito por:', 'mcbra');
                            the_author_posts_link();
                          ?>
                    </span>
                </div>
                <div class="bio">
                    <p><?php the_author_meta( 'description' ); ?></p>
                    <?php get_template_part('content/author-social-icons'); ?>
                </div>
            </div>
        <?php } */ ?>      
    </div>
    <div style="clear:both"></div>
</div>