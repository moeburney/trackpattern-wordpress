<?php get_header();

if (have_posts()) : while (have_posts()) : the_post();
	$page = get_page($post->ID);
endwhile; endif;

if ($page->post_title == get_option("fs_blog_page")) {
	require("template-blog.php");
} elseif($page->post_title == get_option("fs_signup_page")) {
	require("template-signup.php");	
}else{
?>

<div class="header page">
	<h1><?php echo $page->post_title; ?></h1>
	<ul>
	<?php
	  if($post->post_parent)
	  $children = wp_list_pages("title_li=&child_of=".$post->post_parent."&echo=0");
	  else
	  $children = wp_list_pages("title_li=&child_of=".$post->ID."&echo=0");
	  if ($children) { ?>

	  <?php echo $children; ?>

	  <?php } ?>
	</ul>
</div>

<div id="" class="padding">
	
	<div class="page_content">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<?php the_content(); ?>
		<?php endwhile; endif; ?>
		
	</div>

	<?php get_sidebar(); ?>
	
	<div class="clear"></div>
	
</div>

<?php } ?>
<?php get_footer(); ?>