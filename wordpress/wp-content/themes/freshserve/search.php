<?php get_header(); ?>

<div class="header page">
	<h1>Search Results</h1>
</div>

<div class="padding">
	
	<div id="search_results" class="left">

		
		<?php if (have_posts()) : while (have_posts()) : the_post();  ?>
			
			<div class="post" id="post_id_<?php the_ID(); ?>">

				<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
				<span class="meta">Posted by <?php the_author(); ?> on <?php the_time('F j, Y') ?></span>
				<div class="content">
				<?php the_excerpt(); ?>
				</div>
				
				<div class="read_more"><a href="<?php the_permalink(); ?>" class="button"><span>Read More</span></a></div>
				<div class="clear"></div>

			</div>
			
		<?php endwhile; ?>
		
		<div class="navigation">
			<div class="alignleft"><?php next_posts_link('&laquo; Older Entries') ?></div>
			<div class="alignright"><?php previous_posts_link('Newer Entries &raquo;') ?></div>
		</div>
		
		<?php else : ?>

			<p>Sorry, no posts could be found.</p>

		<?php endif; ?>

	</div>
	
	
	<?php get_sidebar(); ?>
	
	<div class="clear"></div>
	
</div>

<?php get_footer(); ?>