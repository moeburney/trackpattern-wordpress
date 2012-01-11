<?php

function freshserve_meta_boxes($meta_name = false) {
	global $themename;

	$meta_boxes = array(
	
'generalpost' => array(
	'id' => 'freshserve_generalpost_meta',
	'title' => $themename . ' Post Options',
	'function' => 'freshserve_generalpost_meta_box',
	'noncename' => 'freshserve_generalpost',
			
	'fields' => array(
		'selected_sidebar_meta' => array(
			'name' => 'selected_sidebar',
			'type' => 'select_sidebar',
			'width' => '',
			'default' => '',
			'title' => 'Custom Sidebar',
			'description' => 'Select the sidebar that you\'d like to be displayed on this post.',
			'label' => '',
			'margin' => true,
			)
  )
),

'generalpage' => array(
	'id' => 'freshserve_generalpage_meta',
	'title' => $themename . ' Page Options',
	'function' => 'freshserve_generalpage_meta_box',
	'noncename' => 'freshserve_generalpage',
			
	'fields' => array(
		'selected_sidebar_meta' => array(
			'name' => 'selected_sidebar',
			'type' => 'select_sidebar',
			'width' => '',
			'default' => '',
			'title' => 'Custom Sidebar',
			'description' => 'Select the sidebar that you\'d like to be displayed on this page.',
			'label' => '',
			'margin' => true,
			)
  )
),
);
	if ($meta_name)
		return $meta_boxes[$meta_name];
	else
		return $meta_boxes;
}

function freshserve_add_meta_box($box_name) {
global $post;

$meta_box = freshserve_meta_boxes($box_name);

foreach ($meta_box['fields'] as $meta_id => $meta_field){
	
$existing_value = get_post_meta($post->ID, $meta_field['name'], true);
$value = ($existing_value != '') ? $existing_value : $meta_field['default'];
$margin = ($meta_field['margin']) ? ' class="add_margin"' : '';

if ($meta_field['description']) {
	$description = '<p class="description">' . $meta_field['description'] . '</p>' . "\n";
}else{
	$switch = '';
	$description = '';
}
	
?>
<div id="<?php echo $meta_id; ?>" class="freshserve-post-control">
<p><strong><?php echo $meta_field['title']; ?></strong></p><?php if ($description){echo $description;}?>

<?php switch ( $meta_field['type'] ) { 

case "select_sidebar":
?>
<p<?php echo $margin; ?>>
<select name="<?php echo $meta_field['name']; ?>">
	<option value=""<?php if($existing_value == ''){ echo " selected";} ?>>Select A Sidebar</option>
<?php
$sidebars = sidebar_generator_freshserve::get_sidebars();
if(is_array($sidebars) && !empty($sidebars)){
	foreach($sidebars as $sidebar){
		if($existing_value == $sidebar){
			echo "<option value='$sidebar' selected>$sidebar</option>\n";
		}else{
			echo "<option value='$sidebar'>$sidebar</option>\n";
		}
	}
}
?>
</select>
</p>
<?php

break;
}
?>

</div>
<?php } ?>
<input type="hidden" value="<?php echo wp_create_nonce(plugin_basename(__FILE__)); ?>" id="<?php echo $meta_box['noncename']; ?>_noncename" name="<?php echo $meta_box['noncename']; ?>_noncename"/>
<?php 
}

function freshserve_save_meta($post_id) {
	$meta_boxes = freshserve_meta_boxes();
	
	if ($_POST['post_type'] == 'page') {
		if (!current_user_can('edit_page', $post_id))
			return $post_id;
	}
	else {
		if (!current_user_can('edit_post', $post_id))
			return $post_id;
	}
		if ( isset($_GET['post']) && isset($_GET['bulk_edit']) )
			return $post_id;

	foreach ($meta_boxes as $meta_box) {
		foreach ($meta_box['fields'] as $meta_field) {
			$current_data = get_post_meta($post_id, $meta_field['name'], true);	
			$new_data = $_POST[$meta_field['name']];

			if ($current_data) {
				if ($new_data == '')
					delete_post_meta($post_id, $meta_field['name']);
				elseif ($new_data == $meta_field['default'])
					delete_post_meta($post_id, $meta_field['name']);
				elseif ($new_data != $current_data)
					update_post_meta($post_id, $meta_field['name'], $new_data);
			}
			elseif ($new_data != '')
				add_post_meta($post_id, $meta_field['name'], $new_data, true);
		}
	}
}

function freshserve_generalpost_meta_box() {
	freshserve_add_meta_box('generalpost');
}

function freshserve_generalpage_meta_box() {
	freshserve_add_meta_box('generalpage');
}

function freshserve_add_meta_boxes() {
	$meta_boxes = freshserve_meta_boxes();
	
	$i=1;
	foreach ($meta_boxes as $meta_box) {	
		if($i != 2){
		add_meta_box($meta_box['id'], $meta_box['title'], $meta_box['function'], 'post', 'normal', 'high');
		}
		if ($i == 2){
		add_meta_box($meta_box['id'], $meta_box['title'], $meta_box['function'], 'page', 'normal', 'high');	
		}
		$i++;	
	}
	
	add_action('save_post', 'freshserve_save_meta');
}
	add_action('admin_menu', 'freshserve_add_meta_boxes')
?>