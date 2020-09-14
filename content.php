<?php
if (get_post_thumbnail_id( $post->ID )) :
	$thumb = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
	$pos_text = ' style="padding-top:19px"';	
	$thumbed = ' style="background: #FFF url('.$thumb[0].') no-repeat center top"';
endif
?>

<div class='entry'<?=$thumbed?>>
<div class="widgts-pages">
<?php get_template_part('sidebar','sidebarpage'); ?>
</div>
    <div class="entry-container"<?=$pos_text?>>

        <div class='entry-header'>
                <h1 class='entry-title'><?php the_title(); ?></h1>
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
		$i=1;
        if ( $attachments ) {
            foreach ( $attachments as $attachment ) {
				$chkurl = wp_get_attachment_image_src( $attachment->ID, 'single-post-thumbnail', true );
				if ($chkurl[0] != $thumb[0]) {
					//$class = "post-attachment mime-" . sanitize_title( $attachment->post_mime_type );
					$thumbimg = wp_get_attachment_image_src( $attachment->ID, 'img_gal', true );
					//$ligals .= '<li class="' . $class . ' data-design-thumbnail ' . $chkurl[0] . ' ' . $thumb[0] .'">' . $thumbimg . '</li>';
					$class = ($i % 2 == 0) ? 'par' : 'impar';
					$ligals .= '<li class="'.$class.'" style="background: #FFF url('.$thumbimg[0].') no-repeat center center"></li>';
					$i++;
				}
            }

        }
		/*if ( $ligals != '' ) {
			echo "<ul id='galeria'>" . $ligals . "</ul>";
		}*/
		
?>
               
                <?php // wp_link_pages(array('before' => '<p class="singular-pagination">' . __('P&aacute;ginas:','mcbra'), 'after' => '</p>', ) ); ?>
            </article>
        </div>   
    </div>
    <div style="clear:both"></div>
</div>