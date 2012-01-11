<?php
/*
Plugin Name: Sidebar Generator
Plugin URI: http://www.getson.info
Description: This plugin generates as many sidebars as you need. Then allows you to place them on any page you wish.
Version: 1.0.1
Author: Kyle Getson
Author URI: http://www.kylegetson.com
Copyright (C) 2009 Clickcom, Inc.
*/

/*
Copyright (C) 2009 Kyle Robert Getson, kylegetson.com and getson.info

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/

class sidebar_generator_freshserve {
	
	function sidebar_generator_freshserve() {
		add_action('init',array('sidebar_generator_freshserve','init'));		
	}
	
	function init(){
		// Register each custom sidebar
	    $sidebars = sidebar_generator_freshserve::get_sidebars();
	    
	    if(is_array($sidebars)){
			$z=1;
			foreach($sidebars as $sidebar){
				$sidebar_class = sidebar_generator_freshserve::name_to_class($sidebar);
				register_sidebar(array(
			    	'name'=>$sidebar,
					'id'=> "freshserve_sidebar-$z",
			    	'before_widget' => '<div id="%1$s" class="widget scg_widget '.$sidebar_class.' %2$s">',
		   			'after_widget' => '</div>',
		   			'before_title' => '<h3 class="widgettitle">',
					'after_title' => '</h3>',
		    	));	 $z++;
			}
		}
	}
	
	// Get the sidebar and inject it into the theme
	function get_sidebar($index){
		wp_reset_query();
		global $wp_query;
		$post = $wp_query->get_queried_object();
		$selected_sidebar = get_post_meta($post->ID, 'selected_sidebar', true);
		if($selected_sidebar != '' && $selected_sidebar != "0"){
			echo "\n\n<!-- Start Generated Sidebar: $selected_sidebar -->\n";
			dynamic_sidebar($selected_sidebar);
			echo "\n<!-- End Generated Sidebar -->\n\n";			
		}else{
			if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar($index) ) :
			endif;
		}
	}
	
	// Find the sidebar
	function get_sidebars(){
		global $shortname;
		$sidebars = get_option( $shortname. '_sidebar_generator');
		return $sidebars;
	}
	function name_to_class($name){
		$class = str_replace(array(' ',',','.','"',"'",'/',"\\",'+','=',')','(','*','&','^','%','$','#','@','!','~','`','<','>','?','[',']','{','}','|',':',),'',$name);
		return $class;
	}
}
$sbg = new sidebar_generator_freshserve;

function generated_dynamic_sidebar_freshserve($index){
	sidebar_generator_freshserve::get_sidebar($index);	
	return true;
}
?>