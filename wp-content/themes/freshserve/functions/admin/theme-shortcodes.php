<?php

// Custom FreshServe Formatter
function freshserve_formatter($content) {

	$new_content = '';
	$pattern_full = '{(\[raw\].*?\[/raw\])}is';
	$pattern_contents = '{\[raw\](.*?)\[/raw\]}is';
	$pieces = preg_split($pattern_full, $content, -1, PREG_SPLIT_DELIM_CAPTURE);

	foreach ($pieces as $piece) {
		if (preg_match($pattern_contents, $piece, $matches)) {
			$new_content .= $matches[1];
		} else {
			$new_content .= wptexturize(wpautop($piece));
		}
	}
	return $new_content;
}

// Remove Wordpress Filters
remove_filter('the_content',	'wpautop');
remove_filter('the_content',	'wptexturize');

// Apply FreshServe Formatter
add_filter('the_content', 'freshserve_formatter', 99);
add_filter('widget_text', 'freshserve_formatter', 99);

function fs_section_title($atts, $content = null) {
	extract(shortcode_atts(array(
		"align" => ''
	), $atts));
	return '<div class="section_title '.$align.'"><h3>'.$content.'</h3></div>';
}
add_shortcode("section_title", "fs_section_title");

function fs_word_wrap_left($atts, $content = null) {
	extract(shortcode_atts(array(
		"image" => ''
	), $atts));
	
	return'<div class="wrap_image_left"><img src="'.$image.'" alt="" /></div><p>'.$content.'</p>';
}
add_shortcode("word_wrap_left", "fs_word_wrap_left");

function fs_text_highlight($atts, $content = null) {
	extract(shortcode_atts(array(
		"style" => 'dark'
	), $atts));
	return '<span class="highlight_'.$style.'">'.$content.'</span>';
}
add_shortcode("text_highlight", "fs_text_highlight");

function fs_button($atts, $content) {
	extract(shortcode_atts(array(
		"type" => 'normal',
		"image" => get_template_directory_uri().'/wp-content/themes/freshserve/images/go_icon.png',
		"href" => '',
		"onclick" => '',
		"id" => '',
		"class" => ''
	), $atts));	
	
	if($type == "image") {
		return '<a href="'.$href.'" id="'.$id.'" onclick="'.$onclick.'" class="button icon '.$class.'"><img src="'.$image.'" alt="" /><span>'.$content.'</span></a>';
	} else {
		return '<a href="'.$href.'" id="'.$id.'" onclick="'.$onclick.'" class="button '.$class.'"><span>'.$content.'</span></a>';
	}
}
add_shortcode("button", "fs_button");

function fs_spacer() {
	return '<div class="clear"></div>';
}
add_shortcode("spacer", "fs_spacer");

//function fs_blog_post_image($atts, $content = null) {
//	return '<div class="blog_img"><img src="'.get_template_directory_uri().'/scripts/timthumb.php?src='.$content.'&h=150&w=584&zc=1" alt="" /></div>';
//}
//add_shortcode("post_image", "fs_blog_post_image");

function fs_homepage_feature($atts, $content = null) {
	extract(shortcode_atts(array(
		"title" => '',
		"icon" => ''
	), $atts));
	if($icon != '') { $icon = '<img src="'.$icon.'" alt="" />';  }
	return '<p class="hp_feature"><b>'.$title.'</b>'.$icon.$content.'</p>';
}
add_shortcode("homepage_feature", "fs_homepage_feature");

function fs_team_member_left($atts, $content = null) {
	return '<div class="team member_left">'.do_shortcode($content).'</div>';
}
add_shortcode("team_member_left", "fs_team_member_left");

function fs_team_member_right($atts, $content = null) {
	return '<div class="team member_right">'.do_shortcode($content).'</div>';
}
add_shortcode("team_member_right", "fs_team_member_right");

function fs_photo($atts, $content = null) {
	return '<img src="'.$content.'" alt="" />';
}
add_shortcode("photo", "fs_photo");

function fs_contact_form($atts, $content) {
	extract(shortcode_atts(array(
		"subjects" => 'General Support,Press Inquiries,Sales'
	), $atts));
	
	$subjects = explode(",", $subjects);
	
	$out .= '<p class="validation"></p>';
	$out .= '<form action="'.get_template_directory_uri().'/scripts/send_email.php" method="post" id="contact_form">';
	$out .= '<p><label>Your Name</label>';
	$out .= '<input type="text" id="name" name="name" class="text_field" /></p>';
	$out .= '<p><label>Your Email</label>';
	$out .= '<input type="text" id="email" name="email" class="text_field" /></p>';
	$out .= '<p class="last"><label>Subject</label>';
	$out .= '<select name="subject" id="subject" class="text_field">';
	foreach ($subjects as $subject) {	
		$out .= '<option value="'.$subject.'">'.$subject.'</option>';
	}
	$out .= '</select></p>';
	$out .= '<div class="clear"></div>';
	$out .= '<p class="message"><label>Message</label>';
	$out .= '<textarea name="message" id="message" class="text_field" rows="" cols=""></textarea></p>';
	$out .= '<div class="send_form">';
	$out .= '<a href="javascript:;" class="button" id="send"><span>Send Email</span></a>';
	$out .= '</div>';
	$out .= '<div class="clear"></div>';
	$out .= '</form>';
	
	return $out;
}
add_shortcode("contact_form", "fs_contact_form");

function fs_pricing_table($atts, $content = null) {
	return do_shortcode($content).'</tbody></table></div><div class="clear"></div>';
}
add_shortcode("pricing_table", "fs_pricing_table");

function fs_pricing_categories($atts, $content = null) {
	return '<div id="row_names">'.$content.'</div>';
}
add_shortcode("pricing_categories", "fs_pricing_categories");

function fs_pricing_plans($atts, $content = null) {
	$out .= '<div id="price_table">';
	$out .= '<table cellpadding="0" cellspacing="0">';
	$out .= '<thead>';
	$out .= '<tr>';
	$out .= do_shortcode($content);
	$out .= '</tr>';
	$out .= '</thead>';
	$out .= '<tbody>';
	
	return $out;
}
add_shortcode("pricing_plans", "fs_pricing_plans");

function fs_pricing_plan($atts, $content = null) {
	extract(shortcode_atts(array(
		"name" => '',
		"price" => '',
		"popular" => ''
	), $atts));
	if($popular != '') { $class_name = '<span class="popular">Most Popular</span>'; }
	return '<td><div class="relative"><h2>'.$name.'</h2>[raw]<span>'.$price.'</span>'.$class_name.'[/raw]</div></td>';
}
add_shortcode("plan", "fs_pricing_plan");

function fs_pricing_rows($atts, $content = null) {
	extract(shortcode_atts(array(
		"type" => ''
	), $atts));
	return '<tr class="'.$type.'">'.do_shortcode($content).'</tr>';
}
add_shortcode("pricing_row", "fs_pricing_rows");

function fs_pricing_row($atts, $content = null) {
	return '<td>'.do_shortcode($content).'</td>';
}
add_shortcode("row", "fs_pricing_row");

function fs_checked($atts, $content = null) {
	return '<img src="'.get_template_directory_uri().'/images/check.png" alt="Included" />';
}
add_shortcode("checked", "fs_checked");

function fs_unchecked($atts, $content = null) {
	return '<img src="'.get_template_directory_uri().'/images/x.png" alt="Not Included" />';
}
add_shortcode("unchecked", "fs_unchecked");


function fs_faqs($atts, $content = null) {
	return '<div id="faq">'.do_shortcode($content).'</div>';
}
add_shortcode("faqs", "fs_faqs");

function fs_left_column($atts, $content = null) {
	return '<div class="left">'.$content.'</div>';
}
add_shortcode("left_column", "fs_left_column");

function fs_right_column($atts, $content = null) {
	return '<div class="right">'.$content.'</div>';
}
add_shortcode("right_column", "fs_right_column");

function fs_price_link($atts, $content = null) {
	return fs_signup_page();
}
add_shortcode("price_link", "fs_price_link");

function fs_small_circle_list($atts, $content = null) {
	extract(shortcode_atts(array(
		"color" => ''
	), $atts));
	$colors = array("blue", "green", "orange", "red", "yellow", "pink");
	if (in_array($color, $colors)) { } else { $color = "blue"; }
	return '<ul class="list small_circle '.$color.'">'.do_shortcode($content).'</ul>';
}
add_shortcode("small_circle_list", "fs_small_circle_list");

function fs_large_circle_list($atts, $content = null) {
	extract(shortcode_atts(array(
		"color" => ''
	), $atts));
	$colors = array("blue", "green", "orange", "red", "yellow", "pink");
	if (in_array($color, $colors)) { } else { $color = "blue"; }
	return '<ul class="list large_circle '.$color.'">'.do_shortcode($content).'</ul>';
}
add_shortcode("large_circle_list", "fs_large_circle_list");

function fs_arrow_list($atts, $content = null) {
	extract(shortcode_atts(array(
		"color" => ''
	), $atts));
	$colors = array("green", "black", "grey");
	if (in_array($color, $colors)) { } else { $color = "green"; }
	return '<ul class="list arrow '.$color.'">'.do_shortcode($content).'</ul>';
}
add_shortcode("arrow_list", "fs_arrow_list");

?>