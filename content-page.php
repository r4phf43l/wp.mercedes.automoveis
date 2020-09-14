<?php
if (get_post_thumbnail_id( $post->ID )) :
	$thumb = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
	$pos_text = ' style="padding-top:19px"';	
	$thumbed = ' style="background: #FFF url('.$thumb[0].') no-repeat center top"';
endif
?>
<div class='entry'<?=$thumbed?>>
<div class="widgts-pages corppages">

<?php if (is_page('Veﾃｭculos Novos') || is_page('Veﾃｭculos AMG Novos') || is_page('ﾃ馬ibus Novos') || is_page('Caminhﾃｵes Novos')) {  get_template_part('sidebar-novos'); } else { get_template_part('sidebar','sidebar'); }  ?>


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
            </article>
        </div>
    </div>
    <div style="clear:both"></div>
</div>
<?
$post = $wp_query->get_queried_object();  
$pagename = $post->post_name;
$pageparent = get_post($post->post_parent)->post_name;

//echo "PAGENAME:: " . $pagename;
//echo "PARENT:: " . $pageparent;

if ($pagename == 'seminovos' || $pagename == 'destaques-do-mes') {
	get_template_part('content-seminovos');
}

if ($pagename == 'mercedes-collection' || $pageparent == 'mercedes-collection') {
	get_template_part('content-collection');
}

?>