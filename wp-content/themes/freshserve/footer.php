</div>
<div class="bottom"></div>
</div>

<div id="footer" class="page">
  <?php if(get_option('fs_footer_disable') == "true") { } else { ?>	
	<p><?php echo stripslashes(get_option('fs_footer_copyright')); ?></p>
	<?php freshserve_menu(); ?>
	<div class="clear"></div>
  <?php } ?>
</div>
<?php echo get_option('fs_ga_code'); ?>
<?php /* Always have wp_footer() just before the closing </bod?>
     * tag of your theme, or you will break many plugins, which
     * generally use this hook to reference JavaScript files.
     */
    wp_footer();
?>
</body>
</html>