<?php
$menu_name = 'meta';
if ( has_nav_menu( $menu_name ) ) {
	if ( ( $locations = get_nav_menu_locations() ) && isset( $locations[ $menu_name ] ) ) {
		$menu = wp_get_nav_menu_object( $locations[ $menu_name ] );
		$menu_items = wp_get_nav_menu_items($menu->term_id);
		$menu_list = '<ul id="menu-' . $menu_name . '">';
		foreach ( (array) $menu_items as $key => $menu_item ) {
			$title = $menu_item->title;
			$url = $menu_item->url;
			$mid = $menu_item->object_id;
			$menu_list .= '<li id="menu-item-' . $mid . '"><a href="' . $url . '">' . $title . '</a></li>';
		}
		$menu_list .= '</ul>';
		 echo "<div id='menu-wrap-" . $menu_name . "'>";
		 echo $menu_list . "</div>";		 
	}
 }
?>