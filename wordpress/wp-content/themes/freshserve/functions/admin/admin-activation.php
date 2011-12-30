<?php

if(get_option($shortname.'_screenshots_settings') == false) {
	
	if ( is_admin() && isset($_GET['activated'] ) && $pagenow == 'themes.php' ) {
	
		$options_screenshots = array(
			"fs_screenshots_count" => 8,
			
			"fs_screenshots_url_0" => FS_IMAGES . "/screenshots/screen_1.jpg",
			"fs_screenshots_caption_0" => "Screenshot 1",
			
			"fs_screenshots_url_1" => FS_IMAGES . "/screenshots/screen_2.jpg",
			"fs_screenshots_caption_1" => "Screenshot 2",
			
			"fs_screenshots_url_2" => FS_IMAGES . "/screenshots/screen_3.jpg",
			"fs_screenshots_caption_2" => "Screenshot 3",
			
			"fs_screenshots_url_3" => FS_IMAGES . "/screenshots/screen_4.jpg",
			"fs_screenshots_caption_3" => "Screenshot 4",
			
			"fs_screenshots_url_4" => FS_IMAGES . "/screenshots/screen_5.jpg",
			"fs_screenshots_caption_4" => "Screenshot 5",
			
			"fs_screenshots_url_5" => FS_IMAGES . "/screenshots/screen_1.jpg",
			"fs_screenshots_caption_5" => "Screenshot 6",
			
			"fs_screenshots_url_6" => FS_IMAGES . "/screenshots/screen_2.jpg",
			"fs_screenshots_caption_6" => "Screenshot 7",
			
			"fs_screenshots_url_7" => FS_IMAGES . "/screenshots/screen_3.jpg",
			"fs_screenshots_caption_7" => "Screenshot 8",
		);
		
		update_option( $shortname.'_screenshots_settings', $options_screenshots);
		
		update_option( $shortname.'_color_scheme', "blue-green.css");
		
		update_option( $shortname.'_homepage_main_img', FS_IMAGES . "/screenshot.jpg");
		
		update_option( $shortname.'_homepage_title', "Your App, Freshly Served.");
		
		update_option( $shortname.'_homepage_description', "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc pellentesque tempus est, a interdum lacus dignissim quis. Donec fermentum vehicula sapien ac congue. Morbi risus nunc, semper non cursus ac, scelerisque consequat eros. Aliquam urna magna, facilisis at pharetra nec, commodo a lacus. Fusce malesuada mauris eget neque posuere porta. Mauris bibendum, lectus ac posuere pretium.");
		
		update_option( $shortname.'_homepage_trial_text', "14-day free trial. No credit card required.");
		
		update_option( $shortname.'_homepage_button_text', "Signup Now!");
		
		$homepage_content .= "[section_title]Features & Specs[/section_title]\r\r";
		$homepage_content .= '[homepage_feature title="Track tasks, time and more" icon="'.FS_IMAGES.'/icons/track.gif"]Lorem ipsum dolor sit amet sit nsectetur adipiscing elit. Nunc et tempus est, a interdum lacus dignissim quis. Nunc pellentesque tempus est, a interdum lacus dignissim quis.';
		$homepage_content .= "[/homepage_feature]\r\r";
		$homepage_content .= '[homepage_feature title="Always stay on schedule" icon="'.FS_IMAGES.'/icons/schedule.gif"]Lorem ipsum dolor sit amet sit nsectetur adipiscing elit. Nunc et tempus est, a interdum lacus dignissim quis. Nunc pellentesque tempus est, a interdum lacus dignissim quis.';
		$homepage_content .= "[/homepage_feature]\r\r";
		$homepage_content .= '[homepage_feature title="Keep yourself organized" icon="'.FS_IMAGES.'/icons/organize.gif"]Lorem ipsum dolor sit amet sit nsectetur adipiscing elit. Nunc et tempus est, a interdum lacus dignissim quis. Nunc pellentesque tempus est, a interdum lacus dignissim quis.';
		$homepage_content .= "[/homepage_feature]\r\r";
		$homepage_content .= '[homepage_feature title="Track tasks, time and more" icon="'.FS_IMAGES.'/icons/time.gif"]Lorem ipsum dolor sit amet sit nsectetur adipiscing elit. Nunc et tempus est, a interdum lacus dignissim quis. Nunc pellentesque tempus est, a interdum lacus dignissim quis.';
		$homepage_content .= "[/homepage_feature]\r\r";
		$homepage_content .= '[homepage_feature title="Always stay on schedule" icon="'.FS_IMAGES.'/icons/dude.gif"]Lorem ipsum dolor sit amet sit nsectetur adipiscing elit. Nunc et tempus est, a interdum lacus dignissim quis. Nunc pellentesque tempus est, a interdum lacus dignissim quis.';
		$homepage_content .= "[/homepage_feature]\r\r";
		$homepage_content .= '[homepage_feature title="Keep yourself organized" icon="'.FS_IMAGES.'/icons/task.gif"]Lorem ipsum dolor sit amet sit nsectetur adipiscing elit. Nunc et tempus est, a interdum lacus dignissim quis. Nunc pellentesque tempus est, a interdum lacus dignissim quis. [/homepage_feature]';
		
		update_option( $shortname.'_homepage_content', $homepage_content);
		
		update_option( $shortname.'_footer_copyright', "Copyright &copy; 2010 FreshServe.com. A ThemeForest theme.");
	
	}
}

?>