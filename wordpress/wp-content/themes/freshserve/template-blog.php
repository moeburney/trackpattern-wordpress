<div class="header page">
	<h1><?php echo $page->post_title ?></h1>
</div>

<div id="blog" class="padding">
	
	<div class="page_content">
		
		<?php 
		query_posts('');
		if (have_posts()) : while (have_posts()) : the_post(); 
		?>
		
		<!-- Start Blog Post -->
		<div class="post" id="post_id_<?php the_ID(); ?>">
			
			<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
			<span class="meta">Posted by <?php the_author(); ?> on <?php the_time('F j, Y') ?></span>
			
			<div class="content">
				<?php
					if (has_post_thumbnail()) {
					
						$image_id = get_post_thumbnail_id();  
			     		$image_url = wp_get_attachment_image_src($image_id,'large');  
			     		$image_url = $image_url[0];
				 		echo do_shortcode('[post_image]'.$image_url.'[/post_image]');
					}
				?>
				<?php
				if (get_option("fs_blog_excerpt_or_full")) {
					$more = 0;
					the_content();
				}else{ 
					the_excerpt(); ?>
				<?php } ?>
			</div>
			
			<div class="read_more"><a href="<?php the_permalink(); ?>" class="button"><span>Read More</span></a></div>
			<?php comments_popup_link('No Comments', '1 Comment', '% Comments'); ?>
			<?php edit_post_link(' Edit', '-', ''); ?>
			<div class="clear"></div>
			
		</div>
		<!-- End Blog Post -->
		
		<?php endwhile; ?>
		
		<div class="navigation">
			<div class="alignleft"><?php next_posts_link('&laquo; Older Entries') ?></div>
			<div class="alignright"><?php previous_posts_link('Newer Entries &raquo;') ?></div>
		</div>
		
		<?php endif; ?>
		
	</div>


	<!-- Start Sidebar -->
	<?php if(freshserve_get_template() == 'template-full.php') { }else{ get_sidebar(); } ?>

	<div class="clear"></div>
	
</div>