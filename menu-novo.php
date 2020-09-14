<?php
$menu_name = 'main';
$locations = get_nav_menu_locations();
$menu = wp_get_nav_menu_object( $locations[ $menu_name ] );
$menuitems = wp_get_nav_menu_items( $menu->term_id, array( 'order' => 'DESC' ) );
?>
    <ul class='menu-wrap-<? echo $menu_name ?>'>
        <?php get_template_part( 'menu', 'dealers' ); ?>
        <div class='clr'></div>
        <?php
	$count = 0;
	$submenu = false;
	foreach( $menuitems as $item ):
		$link = $item->url;
		$title = $item->title;
		$target = !empty( $item->target ) ? " target='" . esc_attr($item->target) ."'" : "";
		if ( !$item->menu_item_parent ):
			$parent_id = $item->ID;
			$nmenu .= "<li[%class%]><a href='". $link . "'" . $target . ">" . $title . "</a>";
		endif;
		if ( $parent_id == $item->menu_item_parent ):
            if ( !$submenu ):
                $submenu = true;
            	$smenu = "<ul>";
            endif;
            $smenu .= "<li[%sclass%]><a href='" . $link . "'" . $target . ">" . $title . "</a></li>";
            if ( $menuitems[ $count + 1 ]->menu_item_parent != $parent_id && $submenu ):
                $smenu .= "</ul>";
                $smenu = str_replace("[%sclass%]", " class='last'", $smenu);
                $nmenu .= $smenu;
                $smenu = "";
                $submenu = false;
            else:
                $smenu = str_replace("[%sclass%]", "", $smenu);
            endif;
     	endif;
	    if ( $menuitems[ $count + 1 ]->menu_item_parent != $parent_id ):
			$nmenu = str_replace("[%class%]", " class='active has-sub'", $nmenu);
			$clear++;
			$nmenu .= "</li><div class='clr'></div>";
			$submenu = false;
		else:
			$nmenu = str_replace("[%class%]", "", $nmenu);
		endif;         	
		$count++;
	endforeach;
	$nmenu = str_replace("[%class%]", " class='last'", $nmenu);
	echo $nmenu;
	?>
	
    </ul>