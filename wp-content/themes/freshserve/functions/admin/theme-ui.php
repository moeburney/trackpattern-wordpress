<?php

function fs_signup_page() {
	$page = get_page_by_title(get_option("fs_signup_page"));
	return get_permalink($page->ID);
}

function fs_page_link($page) {
	$page = get_page_by_title($page);
	return get_permalink($page->ID);
}

function freshserve_register_menus() {
	global $themename;
	
	//If WP 3.0 or > include support for wp_nav_menu()
	if(fs_check_wp_version()){
		register_nav_menus(
			array('primary-menu' => __( $themename. ' Menu' ))
		);
	}
}
add_action( 'init', 'freshserve_register_menus' );

function freshserve_menu() {
	global $show_hide_pg;
	
	//If WP 3.0 or > include support for wp_nav_menu()
	if(fs_check_wp_version()){
		
		if ( has_nav_menu( 'primary-menu' ) ) {
			wp_nav_menu( array( 'menu' => 'primary-menu', 'container_id' => 'main_navigation', 'menu_class' => '', 'fallback_cb' => '' ) );
			return;
		}
	}
	
	//HACK: all the links now have shaded backgrounds
	//$active_class = (is_front_page()) ? 'class="current_page_item"' : '';
	$active_class = (1) ? 'class="current_page_item"' : '';
	$out = '';
	$out .= '<ul>';
	//NOV 2011 HACK BY MOE: REMOVED 'HOME' LINK
	//$out .= '<li><a ' .$active_class. ' href="' .get_option('home'). '">Home</a></li>';

	//HACK: MANUAL MENU
	//$out .= wp_list_pages("sort_column=menu_order&title_li=&echo=0&depth=1");

/*
	if (is_front_page()) 
	{
		$out .= '<li class="current_page_item"><a ' .$active_class. ' href="' .'http://trackpattern.com/blog'. '">Read The Trackpattern Blog</a></li>';
	}
	else
	{
		$out .= '<li class="current_page_item"><a ' .$active_class. ' href="' .'http://trackpattern.com/'. '">Try The Trackpattern Software</a></li>';

	}
*/
		$out .= '<li class="current_page_item"><a ' .$active_class. ' href="' .'http://app.trackpattern.com/signup'. '">Sign Up</a></li>';
		$out .= '<li class="current_page_item"><a ' .$active_class. ' href="' .'http://app.trackpattern.com/'. '">Log In</a></li>';

	$out .= '</ul>';
	
	echo $out;
}

function freshserve_get_template() {
	global $wpdb, $post;
	
	$bp_id = get_option("fs_blog_page"); 
	$blog_page = $wpdb->get_var("SELECT ID FROM $wpdb->posts WHERE post_name = '".$bp_id."'");
	
	$get_template = get_post_meta($blog_page, '_wp_page_template', true);
	
	return $get_template;
	
}

function freshserve_page_layout() {
	
	global $wpdb, $post;
	
	$get_template = get_post_meta($post->ID, '_wp_page_template', true);
	
	if(is_single()){
		
		$bp_id = get_option("fs_blog_page"); 
		$blog_page = $wpdb->get_var("SELECT ID FROM $wpdb->posts WHERE post_name = '".$bp_id."'");
		
		$get_template = get_post_meta($blog_page, '_wp_page_template', true);
		
		$sidebar = 'right_sidebar';
		$sidebar = ($get_template == 'template-full.php') ? 'full_width' : $sidebar;
		$sidebar = ($get_template == 'template-left-sidebar.php') ? 'left_sidebar' : $sidebar;
	
		echo $sidebar;
		return;			
	} else {
		$sidebar = 'right_sidebar';
		$sidebar = ($get_template == 'template-full.php') ? 'full_width' : $sidebar;
		$sidebar = ($get_template == 'template-left-sidebar.php') ? 'left_sidebar' : $sidebar;
	
		echo $sidebar;
		return;
	}
}

?>
