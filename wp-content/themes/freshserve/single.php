<?php get_header(); ?>

<div class="header page">
	<h1><?php echo get_option("fs_blog_page"); ?></h1>
</div>

<div id="blog" class="padding">
	
	<div class="page_content">

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<div class="post" id="post_id_<?php the_ID(); ?>">
			
			<h1><?php the_title(); ?></h1>
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
				<?php the_content(); ?>
			</div>
			
		</div>

		<div id="comments">	
			<h3>Comments</h3>
			<?php comments_template('', true); ?>
		</div>

		<?php endwhile; else : ?>
			<p>Sorry, no posts matched your criteria.</p>
		<?php endif; ?>

	</div>

	<!-- Start Sidebar -->
	<?php if(freshserve_get_template() == 'template-full.php') { }else{ get_sidebar(); } ?>
	<div class="clear"></div>
	
</div>

<?php get_footer(); ?>