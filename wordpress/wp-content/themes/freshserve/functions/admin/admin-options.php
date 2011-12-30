<?php

// Check WP version
function fs_check_wp_version(){
	global $wp_version;
	
	$minium_WP   = '3.0';
	$wp_ok  =  version_compare($wp_version, $minium_WP, '>=');
	
	if ( ($wp_ok == FALSE) ) {
		return false;
	}
	
	return true;
}

// Get categories in select box
$categories = get_categories('hide_empty=0&orderby=name');
$wp_cats = array();
foreach ($categories as $category_list ) {
       $wp_cats[$category_list->cat_ID] = $category_list->cat_name;
}
array_unshift($wp_cats, "Choose a category");

// Get Pages into a drop-down list
$pages_list = get_pages();
$getpagnav = array();
foreach($pages_list as $apage) {
	$getpagnav[$apage->ID] = $apage->post_title;
}

// Get Stylesheets into a drop-down list
$styles = array();
if(is_dir(TEMPLATEPATH . "/themes/")) {
	if($open_dirs = opendir(TEMPLATEPATH . "/themes/")) {
		while(($style = readdir($open_dirs)) !== false) {
			if(stristr($style, ".css") !== false) {
				$styles[] = $style;
			}
		}
	}
}
$style_dropdown = sort($styles);

$options = array (

// Start General

array( "name" => "General",
	"type" => "section"),
array( "type" => "open"),

array(	"name" => "Style Variation",
	"desc" => "Select a style variation",
	"id" => $shortname."_color_scheme",
	"std" => "blue-green.css",
	"type" => "select",
	"options" => $styles),	

array( "name" => "Logo URL",
	"desc" => "Enter the full URL of your logo image here (e.g. http://www.yoursite.com/logo.png)",
	"id" => $shortname."_logo",
	"type" => "text",
	"std" => ""),

array( "name" => "Google Analytics Code",
	"desc" => "Paste your Google Analytics or other tracking code here. This will be automatically added to the footer.",
	"id" => $shortname."_ga_code",
	"type" => "textarea",
	"std" => ""),	

array( "name" => "Custom Favicon",
	"desc" => "Enter the full URL of your custom favicon image here (e.g. http://www.yoursite.com/favicon.ico)",
	"id" => $shortname."_favicon",
	"type" => "text",
	"std" => get_bloginfo('url') ."/favicon.ico"),

array( "type" => "close"),

// Start Homepage

array( "name" => "Homepage",
	"type" => "section"),
array( "type" => "open"),

array( "name" => "Main Image URL",
	"desc" => "Enter the link to an image used for the main homepage screenshot (Maximum of 400x300px).",
	"id" => $shortname."_homepage_main_img",
	"type" => "text",
	"std" => ""),
	
array( "name" => "Title",
	"desc" => "Enter the link to your logo image.",
	"id" => $shortname."_homepage_title",
	"type" => "text",
	"std" => ""),	
	
array( "name" => "Description",
	"desc" => "Enter a 1 paragraph description of your app / service.",
	"id" => $shortname."_homepage_description",
	"type" => "textarea",
	"std" => ""),		
	
array( "name" => "Signup Button Label",
	"desc" => "The label for the signup button displayed under the Description.",
	"id" => $shortname."_homepage_button_text",
	"type" => "text",
	"std" => ""),	

array( "name" => "Signup Button Link",
	"desc" => "Select the page you would like the signup button to link to.",
	"id" => $shortname."_homepage_button_link",
	"type" => "select",
	"options" => $getpagnav,
	"std" => "Select a page"),	
	
array( "name" => "Trial Text",
	"desc" => "Text to let your visitors know that you offer a trial or display any other useful information (optional).",
	"id" => $shortname."_homepage_trial_text",
	"type" => "text",
	"std" => ""),
	
array( "name" => "Hide Price Tag?",
	"desc" => "Check this to hide the price tag that appears on the top right side of the homepage.",
	"id" => $shortname."_homepage_pt_disable",
	"type" => "checkbox",
	"std" => ""),	
	
array( "name" => "Homepage Content",
	"desc" => "The main content for the homepage. Appears directly under the screenshots section.",
	"id" => $shortname."_homepage_content",
	"height" => "15",
	"type" => "editor",
	"std" => ""),			

array( "type" => "close"),

// Start Screenshots

array( "name" => "Screenshots",
	"type" => "section"),


array( "name" => "Screenshots",
	"desc" => "The page you select here will display the blog.",
	"id" => $shortname."_screenshots",
	"type" => "screenshots"),

// Start Blog

array( "name" => "Blog",
	"type" => "section"),
array( "type" => "open"),

array( "name" => "Blog Page",
	"desc" => "The page you select here will display the blog.",
	"id" => $shortname."_blog_page",
	"type" => "select",
	"options" => $getpagnav,
	"std" => "Select a page"),
	
array(	"name" => "Display Full Posts or Excerpts?",
	"desc" =>
		array( "Display excerpts" => "",
			   "Display full posts" => "1"), 
	"id" => $shortname."_blog_excerpt_or_full",
	"std" => null,
	"type" => "radio"),	

array( "type" => "close"),

// Start Signup

array( "name" => "Signup",
	"type" => "section"),
array( "type" => "open"),

array( "name" => "Signup Page",
	"desc" => "The page you select here will display the signup form.",
	"id" => $shortname."_signup_page",
	"type" => "select",
	"options" => $getpagnav,
	"std" => "Select a page"),

array( "type" => "close"),

// Start Sidebars

array( "name" => "Sidebars",
	"type" => "section"),
array( "type" => "open"),

array(	"name" => "Add Sidebar",
	"desc" => "Enter a name for the new sidebar that you'd like to create.",
	"id" => $shortname."_sidebar_generator_0",
	"std" => null,
	"type" => "sidebar",
	"size" => "70"),

array(	"name" => "Sidebars created",
	"desc" => "Sidebars You've Created",
	"std" => null,
	"type" => "sidebar_delete"),

array( "type" => "close"),

// Start Footer

array( "name" => "Footer",
	"type" => "section"),
array( "type" => "open"),

array( "name" => "Footer Copyright Text",
	"desc" => "Enter text used in the right side of the footer. It can be HTML",
	"id" => $shortname."_footer_copyright",
	"type" => "text",
	"std" => ""),

array( "name" => "Feedburner URL",
	"desc" => "Feedburner is a Google service that takes care of your RSS feed. Paste your Feedburner URL here to let readers see it in your website",
	"id" => $shortname."_feedburner",
	"type" => "text",
	"std" => get_bloginfo('rss2_url')),
	
array( "name" => "Disable Footer?",
	"desc" => "Check this to completely disable the footer.",
	"id" => $shortname."_footer_disable",
	"type" => "checkbox",
	"std" => ""),	

array( "type" => "close")

);


?>