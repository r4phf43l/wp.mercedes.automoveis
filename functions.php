<?php
if( ! function_exists( 'ct_mcbra_theme_setup' ) ) {
    function ct_mcbra_theme_setup() {
        register_nav_menus( array(
            'meta'       => __( 'Topo', 'mcbra' ),
			'main'   => __( 'Principal', 'mcbra' ),
            'home'      => __( 'Link Direto', 'mcbra' ),
			'dealers' => __( 'Concessionárias', 'mcbra' ),
        ) );
			/*			
			'model' => __( 'Modelos', 'mcbra' ),
			*/

        // add inc folder files
        foreach ( glob( trailingslashit( get_template_directory() ) . 'inc/*.php' ) as $filename ) {
            include $filename;
        }
    }
}

add_action( 'after_setup_theme', 'ct_mcbra_theme_setup', 10 );

if (function_exists('register_sidebar')) {
	register_sidebar( array(
		'name'         => __( 'Corporativo/Institucional', 'mcbra' ),
		'id'           => 'sidebar',
		'description'  => __( 'Widgets nesta área aparecerão nos posts corporativos do site', 'mcbra' )
	) );

	register_sidebar( array(
		'name'         => __( 'Páginas', 'mcbra' ),
		'id'           => 'sidebarpage',
		'description'  => __( 'Widgets nesta área aparecerão nas páginas do site', 'mcbra' )
	) );


	register_sidebar( array(
		'name'         => __( 'Bloco 1', 'mcbra' ),
		'id'           => 'block1',
		'description'  => __( 'Widgets desta área aparecebrão no bloco 1 da página inicial', 'mcbra' ),
	) );

	register_sidebar( array(
		'name'         => __( 'Bloco 2', 'mcbra' ),
		'id'           => 'block2',
		'description'  => __( 'Widgets desta área aparecebrão no bloco 2 da página inicial', 'mcbra' ),
	) );	
	
	register_sidebar( array(
		'name'         => __( 'Bloco 3', 'mcbra' ),
		'id'           => 'block3',
		'description'  => __( 'Widgets desta área aparecebrão no bloco 3 da página inicial', 'mcbra' ),
	) );	
}

if ( function_exists( 'add_theme_support' ) ) {
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 1000, 1000, true );
	
	add_image_size( 'thumbnail', 150, 9999 ); // Thumbnail (default 150px x 150px max)
	add_image_size( 'img_gal', 230, 130 ); // Thumbnail (default 230px x 130px max)
	add_image_size( 'medium', 300, 9999 ); // Medium resolution (default 300px x 300px max)
	add_image_size( 'large', 640, 9999 ); // Large resolution (default 640px x 640px max)
	add_image_size( 'full', 9999, 9999 ); // Original image resolution (unmodified)	

}

add_filter( 'wp_title', 'title_for_home' );

function title_for_home( $title ) {
  if ( empty( $title ) && ( is_home() || is_front_page() ) ) {
    $title = get_bloginfo( 'name' );
  } else {
	$title = the_title() . ' :: ' . get_bloginfo( 'name' );
  }

  return $title;
}

/* function default_image() {
	$files = get_children('post_parent='.get_the_ID().'&post_type=attachment&post_mime_type=image&order=desc');
	if($files) :
		$keys = array_reverse(array_keys($files));
		$j=0;
		$num = $keys[$j];
		$image=wp_get_attachment_image($num, 'large', true);
		$imagepieces = explode('"', $image);
		$imagepath = $imagepieces[1];
		$main=wp_get_attachment_url($num);
		return trim(preg_replace('/\s\s+/', ' ', $main));
	endif;
} */

add_action('after_setup_theme', 'linkable_text');

function linkable_text() {
	if (!class_exists('LinkableTitleHtmlAndPhpWidget')) {
		include_once(TEMPLATEPATH.'/plugins/linkable_text.php');
	}
}

add_action('after_setup_theme', 'category_featured');

function category_featured() {
	if (!class_exists('category_featured_images')) {
		include_once(TEMPLATEPATH.'/plugins/category-featured-images.php');
	}
}

//Set Default Meta Value
function set_default_meta($post_ID){
        $current_field_value = get_post_meta($post_ID,'Sort Order',true);
        $default_meta = '100'; // value
        if ($current_field_value == '' && !wp_is_post_revision($post_ID)){
                add_post_meta($post_ID,'Sort Order',$default_meta,true);
        }
        return $post_ID;
}
add_action('wp_insert_post','set_default_meta');

//Create Cats
function create_my_cat () {
    if (file_exists (ABSPATH.'/wp-admin/includes/taxonomy.php')) {
        require_once (ABSPATH.'/wp-admin/includes/taxonomy.php'); 
 
       if ( ! get_cat_ID( 'Automóveis' ) ) {
            wp_create_category( 'Automóveis' );
        }
        if ( ! get_cat_ID( 'Ônibus' ) ) {
            wp_create_category( 'Ônibus' );
        }
        if ( ! get_cat_ID( 'Vans' ) ) {
            wp_create_category( 'Vans' );
        }
        if ( ! get_cat_ID( 'AMG' ) ) {
            wp_create_category( 'AMG' );
        }
        if ( ! get_cat_ID( 'Caminhões' ) ) {
            wp_create_category( 'Caminhões' );
        }

    }
}
add_action ( 'after_setup_theme', 'create_my_cat' );