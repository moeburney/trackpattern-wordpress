<?php

// Register Default Widget Area
function freshserve_widgets_init() {
	register_sidebar( array(
		'name' =>  'Default Widget Area',
		'description' => 'The default widget area',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	) );

}
add_action('widgets_init', 'freshserve_widgets_init');

// Custom Twitter Widget
class FreshServe_Twitter_Widget extends WP_Widget {
	function FreshServe_Twitter_Widget() {
		global $themename;
        $widget_ops = array('classname' => 'freshserve_twitter_widget', 'description' => __( "Grabs your most recent tweets from Twitter"));
		$control_ops = array('width' => 200, 'height' => 200);
		$this->WP_Widget('twitter', __($themename.' - Twitter'), $widget_ops, $control_ops);
	}

	function widget($args, $instance) {
		global $shortname;
        extract( $args );
		$title = apply_filters('widget_title', empty($instance['title']) ? __('Recent Tweets') : $instance['title'], $instance, $this->id_base);
		$id = $instance['id'];
		
		if ( !$number = (int) $instance['number'] )
			$number = 5;
		else if ( $number < 1 )
			$number = 1;
		else if ( $number > 15 )
			$number = 15;
		
		$limit = $number;
        ?>

			<?php echo $before_widget; ?>
				<?php echo $before_title . $title . $after_title; ?>
					<ul id="twitter_update_list" ><li><script type="text/javascript" src="http://twitter.com/javascripts/blogger.js"></script>
					</ul>
					<script type="text/javascript" src="http://twitter.com/statuses/user_timeline/<?php echo $id; ?>.json?callback=twitterCallback2&amp;count=<?php echo $limit + 1; ?>"></script>
			<?php echo $after_widget; ?>

        <?php
	}

	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['id'] = strip_tags($new_instance['id']);
		$instance['number'] = (int) $new_instance['number'];
				
        return $instance;
	}

	function form($instance) {
		$title = isset($instance['title']) ? esc_attr($instance['title']) : '';
		$id = isset($instance['id']) ? esc_attr($instance['id']) : '';
		if ( !isset($instance['number']) || !$number = (int) $instance['number'] )
			$number = 5;
        ?>

		<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></p>

		<p><label for="<?php echo $this->get_field_id('id'); ?>">Twitter Username:</label>
		<input class="widefat" id="<?php echo $this->get_field_id('id'); ?>" name="<?php echo $this->get_field_name('id'); ?>" type="text" value="<?php echo $id; ?>" /></p>
			
		<p><label for="<?php echo $this->get_field_id('number'); ?>">Number of Tweets to Display:</label>
		<input class="widefat" id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="text" value="<?php echo $number; ?>" /></p>
		
		<?php
	}
}
register_widget('FreshServe_Twitter_Widget');


// Custom Flickr Widget
class FreshServe_Flickr_Widget extends WP_Widget {
	function FreshServe_Flickr_Widget() {
		global $themename;
        $widget_ops = array('classname' => 'freshserve_flickr_widget', 'description' => __( "Grabs your photos from Flickr"));
		$control_ops = array('width' => 200, 'height' => 200);
		$this->WP_Widget('flickr', __($themename.' - Flickr'), $widget_ops, $control_ops);
	}

	function widget($args, $instance) {
		global $shortname;
        extract( $args );
		$title = apply_filters('widget_title', empty($instance['title']) ? __('Flickr') : $instance['title'], $instance, $this->id_base);
		$id = $instance['id'];
		
		$number = (int) $instance['number'];
		if(!$number) { $number = 5; } 
		else if($number < 1) { $number = 1; }
		else if($number > 15) { $number = 15; }
		$limit = $number;
		
        ?>

			<?php echo $before_widget; ?>
				<?php echo $before_title . $title . $after_title; ?>
				<div class="flickr_wrap">
					<script type="text/javascript" src="http://www.flickr.com/badge_code_v2.gne?count=<?php echo $limit; ?>&amp;display=latest&amp;size=s&amp;layout=x&amp;source=user&amp;user=<?php echo $id; ?>"></script> 
					<div class="clear"></div>
				</div>
			<?php echo $after_widget; ?>

        <?php
	}

	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['id'] = strip_tags($new_instance['id']);
		$instance['number'] = (int) $new_instance['number'];
				
        return $instance;
	}

	function form($instance) {
		$title = isset($instance['title']) ? esc_attr($instance['title']) : '';
		$id = isset($instance['id']) ? esc_attr($instance['id']) : '';
		if ( !isset($instance['number']) || !$number = (int) $instance['number'] )
			$number = 5;
        ?>

		<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></p>

		<p><label for="<?php echo $this->get_field_id('id'); ?>">Flickr ID:</label>
		<input class="widefat" id="<?php echo $this->get_field_id('id'); ?>" name="<?php echo $this->get_field_name('id'); ?>" type="text" value="<?php echo $id; ?>" /></p>
			
		<p><label for="<?php echo $this->get_field_id('number'); ?>">Number of Photos to Display:</label>
		<input class="widefat" id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="text" value="<?php echo $number; ?>" /></p>
		
		<?php
	}
}
register_widget('FreshServe_Flickr_Widget');

?>