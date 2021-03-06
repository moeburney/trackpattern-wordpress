<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>  
	<title><?php bloginfo('name'); ?><?php wp_title('-'); ?></title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="description" content="<?php the_excerpt(); ?>" />
	
	<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php echo stripslashes(get_option('fs_feedburner')); ?>" />
	<link rel="shortcut icon" href="<?php echo stripslashes(get_option('fs_favicon')); ?>" />
	<link rel="pingback" href="<?php bloginfo('pingback_url') ?>" />
	
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" />
	<link rel="stylesheet" type="text/css" href="<?php echo bloginfo('template_url'); ?>/themes/<?php echo get_option('fs_color_scheme'); ?>" media="screen" />
	<script type="text/javascript" src="<?php echo bloginfo('template_url'); ?>/javascripts/jquery.js"></script>
	<?php if(is_home()) { ?>
		<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/javascripts/fancybox/jquery.fancybox-1.3.1.css" />
		<script type="text/javascript" src="<?php echo bloginfo('template_url'); ?>/javascripts/jquery.tools.js"></script>
		<script type="text/javascript" src="<?php echo bloginfo('template_url'); ?>/javascripts/fancybox/jquery.fancybox-1.3.1.pack.js"></script>
		<script type="text/javascript" charset="utf-8">
			$(document).ready(function() {
				// Configure fancybox plugin
				$("a.screenshot").fancybox({
					'transitionIn'	:	'elastic',
					'transitionOut'	:	'elastic',
					'speedIn'		:	400, 
					'speedOut'		:	400, 
					'overlayShow'	:	false
				});

				// Configure scrollable plugin
				$(".scrollable").scrollable({ });
			});
		</script>
	<?php } ?>
	<script type="text/javascript" src="<?php echo bloginfo('template_url'); ?>/javascripts/site.js"></script>
	<?php wp_head(); ?>
</head>
<body>
	
	<div id="header">
		<div class="page">
			<a href="<?php echo get_option('home'); ?>" class="logo">
				<?php if(!get_option('fs_logo')) { ?>
					<img src="<?php echo bloginfo('template_url'); ?>/images/logo.jpg" alt="<?php bloginfo('name'); ?>" /><?php
				 }else{ ?>
					<img src="<?php echo get_option('fs_logo'); ?>" alt="<?php bloginfo('name'); ?>" /><?php 
				 } ?>
			</a>
			
			<?php freshserve_menu(); ?>
			<div class="clear"></div>
		</div>
	</div>
	
	<div id="page" class="<?php freshserve_page_layout(); ?>">
				
		<div class="top"></div>
		<div class="content">
