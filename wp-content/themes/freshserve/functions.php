<?php

$themename = "FreshServe";
$shortname = "fs";

// Define Directory Constants
define('FS_FUNCTIONS', TEMPLATEPATH . '/functions/admin');
define('FS_IMAGES', get_template_directory_uri() . '/images' );

// Load Theme Options
require_once(FS_FUNCTIONS . '/admin-options.php');

// Load Theme Sidebars
require_once(FS_FUNCTIONS . '/admin-sidebars.php');

// Load Admin Theme UI
require_once(FS_FUNCTIONS . '/admin-ui.php');

// Load Post Options
require_once(FS_FUNCTIONS . '/admin-post-options.php');

// Load Activation Options
require_once(FS_FUNCTIONS . '/admin-activation.php');

// Load Theme UI
require_once(FS_FUNCTIONS . '/theme-ui.php');

// Load Theme Shortcodes
require_once(FS_FUNCTIONS . '/theme-shortcodes.php');

// Load Theme Widgets
require_once(FS_FUNCTIONS . '/theme-widgets.php');

// Redirect To Theme Options Page on Activation
if (is_admin() && $_GET['activated']){
	wp_redirect(admin_url("admin.php?page=functions.php"));
}

// If WP 3.0 or > include support for wp_nav_menu()
if(fs_check_wp_version()){
	add_theme_support('menus');
}

// Add Comment Reply JS
function theme_queue_js(){
  if (!is_admin()){
    if ( is_singular() AND comments_open() AND (get_option('thread_comments') == 1))
      wp_enqueue_script( 'comment-reply' );
  }
}
add_action('wp_print_scripts', 'theme_queue_js');

if ( function_exists( 'add_theme_support' ) ) {
	add_theme_support( 'post-thumbnails', array( 'post' ) );
	set_post_thumbnail_size( 585, 150, true );
}

// Add FreshServe Admin Functions
function freshserve_add_admin() {

global $themename, $shortname, $options;

if ($_GET['page'] == basename(__FILE__) ) {

	if ( 'save' == $_REQUEST['action'] ) {
		
		// Updates screenshots settings
		foreach ($_POST as $key => $value) {
			if ( preg_match("/(fs_screenshots_)/i", $key) ) {
				$options_screenshots[$key] = $value;	
			}
		}
		update_option( $shortname.'_screenshots_settings', $options_screenshots);

		//Updates sidebar settings
		$get_sidebar_options = sidebar_generator_freshserve::get_sidebars();
		$sidebar_name = str_replace(array("\n","\r","\t"),'',$_POST['fs_sidebar_generator_0']);
		$sidebar_id = sidebar_generator_freshserve::name_to_class($sidebar_name);
		if($sidebar_id == '' ){
			$options_sidebar = $get_sidebar_options;
		}else{
			if(isset($get_sidebar_options[$sidebar_id])){
				header("Location: admin.php?page=$send&error=true$hidden_anchor");	
				die;
			}
			if ( is_array($get_sidebar_options) ) {
				$new_sidebar_gen[$sidebar_id] = $sidebar_id;
				$options_sidebar = array_merge($get_sidebar_options, (array) $new_sidebar_gen);	
			}else{
				$options_sidebar[$sidebar_id] = $sidebar_id;
			}		
		 }

		update_option( $shortname.'_sidebar_generator', $options_sidebar);

		foreach ($options as $value) {
			//if ($value['id'] != "fs_sidebar_generator_0") {
				update_option( $value['id'], $_REQUEST[ $value['id'] ] ); 
			//}
		}

		foreach ($options as $value) {
			if( isset( $_REQUEST[ $value['id'] ] ) ) { update_option( $value['id'], $_REQUEST[ $value['id'] ]  ); } else { delete_option( $value['id'] ); } }

			header("Location: admin.php?page=functions.php&saved=true");
		die;

}
else if( 'reset' == $_REQUEST['action'] ) {
	foreach ($options as $value) {
		delete_option( $value['id'] ); }

	header("Location: admin.php?page=functions.php&reset=true");
die;
}
}

	add_menu_page($themename, $themename, 'administrator', basename(__FILE__), 'freshserve_admin');
}

function freshserve_add_init() {
	$file_dir=get_bloginfo('template_directory');
	wp_enqueue_style("functions", $file_dir."/functions/stylesheets/fs_admin.css", false, "1.0", "all");
	wp_enqueue_script("jq_tools", $file_dir."/functions/javascripts/jquery.tools.js", false, "1.0");
	wp_enqueue_script("jq_dnd", $file_dir."/functions/javascripts/jquery.tablednd.js", false, "1.0");
	wp_enqueue_script("fs_admin", $file_dir."/functions/javascripts/fs_admin.js", false, "1.0");
}

function freshserve_admin_print_scripts($hook) {
	global $page_handle;
	$nonce = wp_create_nonce('sidebar_rm');
		
	echo '<script type="text/javascript">
	//<![CDATA[
	var $removeSidebarURL = "' .admin_url('admin-ajax.php'). '";
	var $ajaxNonce = "' .$nonce. '";
	//]]></script>';
}

add_action('admin_print_scripts', 'freshserve_admin_print_scripts');
 
function show_tinyMCE() {
    wp_enqueue_script( 'common' );
    wp_enqueue_script( 'jquery-color' );
    wp_print_scripts('editor');
    if (function_exists('add_thickbox')) add_thickbox();
    wp_print_scripts('media-upload');
    if (function_exists('wp_tiny_mce')) wp_tiny_mce();
    wp_admin_css();
    wp_enqueue_script('utils');
    do_action("admin_print_styles-post-php");
    do_action('admin_print_styles');
    remove_all_filters('mce_external_plugins');
}
add_filter('admin_head','show_tinyMCE');

function ajax_remove_sidebar() {	
	global $shortname, $wpdb;
	$sidebar = $_POST['sidebar'];
	$sidebar_id = $_POST['sidebar_id'];
	$sidebar_name = $_POST['sidebar_name'];
	$pieces = explode(",", $sidebar);

	foreach ($pieces as $key => $value) {
		if($value != '')
			$options_sidebar_rm[ $value ] = $value;
		}
		update_option( $shortname.'_sidebar_generator', $options_sidebar_rm);

		$sidebar_meta = $wpdb->get_results("SELECT post_id FROM $wpdb->postmeta WHERE meta_value = '$sidebar_name'", ARRAY_A);
		if ( is_array($sidebar_meta) ){
			foreach ($sidebar_meta as $key => $value) {
				delete_post_meta($value['post_id'], 'selected_sidebar');
		}
	}
}

add_action('wp_ajax_remove_sidebar', 'ajax_remove_sidebar');
add_action('admin_init', 'freshserve_add_init');
add_action('admin_menu', 'freshserve_add_admin');

?>