<?php get_header(); ?>
<?php
/*get_template_part('content/archive-header');*/
if ( have_posts() ) :
    while (have_posts() ) :
        the_post();
        if(is_singular('post')){
            get_template_part('content');
            
        }
        elseif(is_page()){
            get_template_part('content', 'page');
            
        }
        else {
            get_template_part('content');
        }
    endwhile;
endif; ?>
<?php get_footer(); ?>