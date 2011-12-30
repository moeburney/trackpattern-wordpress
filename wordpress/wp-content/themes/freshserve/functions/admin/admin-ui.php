<?php
function freshserve_admin() {

global $themename, $shortname, $options;
$i=0;

if ( $_REQUEST['saved'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings saved.</strong></p></div>';
if ( $_REQUEST['reset'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings reset.</strong></p></div>';

?>

<div class="wrap fs_wrap">
<div class="icon32" id="icon-options-general"><br></div>
<h2><?php echo $themename; ?> Theme Settings</h2>

<ul class="tabs">
	<?php foreach ($options as $value) { 
		  if($value['type'] == "section") {	
	?>
	<li><a href="#<?php echo strtolower($value['name']); ?>"><?php echo $value['name']; ?></a></li>
	<?php } }?>
</ul>
<div class="clear"></div>

<div class="panes">
<form method="post">

<?php foreach ($options as $value) {
switch ( $value['type'] ) {

case "open":

?>
<table class="form-table fs-table">
	<tbody>
<?php break;

case "close":
?>
</tbody>
</table>
</div>
</div>

<?php break;

case "screenshots":
?>

<?php
	$screenshots_options = get_option($shortname.'_screenshots_settings');
	$screenshots_count = ($screenshots_options[$shortname.'_screenshots_count'])<=0 ? 1 : $screenshots_options[$shortname.'_screenshots_count'];
?>

<p>Add/edit/remove screenshots that will appear in the homepage screenshots section. Drag rows up and down to reorder.</p>

<div class="multitables">
	
<input name="<?php echo $shortname; ?>_screenshots_count" class="screenshots_counter count_hide_rm" type="hidden" value="<?php echo $screenshots_count; ?>" />


<p><input type="button" class="button-secondary apply add_row" value="Add a new row" /></p>

<table class="widefat fs_screenshots table_sort">
<thead>
	<tr>
		<th width="100">Reorder</th>
		<th width="100">Remove</th>
		<th>Settings</th>
	</tr>
</thead>
<tfoot>
	<tr>
		<th width="100">&nbsp;</th>
		<th width="100"></th>
		<th></th>
	</tr>
</tfoot>
<tbody>
<?php 
$count = $screenshots_count +1;
for($z = 0; $z < $count; $z++) {
?>	
   <tr class="multitable <?php if($z+1 == $count) { echo 'clone_row hidden'; } ?>">
     <td class="slider_drag" valign="middle"><span class="changenumber"><?php echo $z+1; ?></span></td>
     <td class="remove"><a href='javascript:;' title="Delete Row" class='del_row' id='del_number_<?php echo $z + 1; ?>'>Remove</a></td>
     <td>
		<label>Image URL:</label> 
		<input class="correct_num" type="text" id="<?php echo $value['id']; ?>_url_<?php echo $z; ?>" name="<?php echo $value['id']; ?>_url_<?php echo $z; ?>" value="<?php echo $screenshots_options[$shortname.'_screenshots_url_'.$z] ?>" /> 
		<br/>
		<label>Caption:</label> 
		<input class="correct_num" type="text" id="<?php echo $value['id']; ?>_caption_<?php echo $z; ?>" name="<?php echo $value['id']; ?>_caption_<?php echo $z; ?>" value="<?php echo $screenshots_options[$shortname.'_screenshots_caption_'.$z] ?>" /> 
	</td>
   </tr>
<?php } ?>
</tbody>
</table>
</div>
</div>
</div>

<?php break;
case 'sidebar':
?>
<tr valign="top">
<th align="left"><?php echo $value['name']; ?></th>
<td><input size="<?php echo $value['size']; ?>" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="text" value="<?php echo $value['std']; ?>" />
<br /><span><?php echo $value['desc']; ?></span></td>
</tr>
<?php 

break;
case 'sidebar_delete':
?>
<?php
$get_sidebar_options = sidebar_generator_freshserve::get_sidebars();
if($get_sidebar_options != "") {
$i=1;

foreach ($get_sidebar_options as $sidebar_gen) { ?>
<?php if($i == 1) { ?>
<tr valign="top">
<th align="left"></th>
<td><div align="left"><h4 style="margin-bottom:0px; font-size: 14px; border-bottom: 1px solid #ccc;"><?php echo $value['desc']; ?></h4></div></td>
</tr>
<?php } ?>

<tr id="sidebar_table_<?php echo $i; ?>">
<th align="left"></th>
<td>
<div align="left" style="float:left;font-size:13px;width:150px;overflow:hidden;"><?php echo $sidebar_gen; ?></div>
<div style="float:left;"><input type="submit" name="sidebar_rm_<?php echo $i; ?>" id="<?php echo $i; ?>" class="button" value="Delete" /></div>
<div style="margin:3px 0 0 8px;float:left;"><img class="sidebar_rm_<?php echo $i; ?>" style="display:none;" src="images/wpspin_light.gif" alt="Loading" /></div>
</td>
<th align="left"><input id="<?php echo 'sidebar_generator_'.$i ?>" type="hidden" name="<?php echo 'sidebar_generator_'.$i ?>" value="<?php echo $sidebar_gen; ?>" /></th>
</tr>
<?php $i++;  
} 
}

break;
case 'text':
?>
<tr>
<th><?php echo $value['name']; ?></th>
<td><input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value='<?php if ( get_option( $value['id'] ) != "") { echo stripslashes(get_option( $value['id'])  ); } else { echo $value['std']; } ?>' />
	<br/>
 	<span><?php echo $value['desc']; ?></span>
</td>
</tr>
<?php
break;

case 'textarea':
?>
<tr>
<th><?php echo $value['name']; ?></th>
<td><textarea name="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" cols="" rows="<?php echo $value['height']; ?>"><?php if ( get_option( $value['id'] ) != "") { echo stripslashes(get_option( $value['id']) ); } else { echo $value['std']; } ?></textarea>
<br/>
<span><?php echo $value['desc']; ?></span>
</td>
</tr>

<?php
break;

case 'editor':
?>
<tr>
<th><?php echo $value['name']; ?></th>
<td>
	<?php if ( get_option( $value['id'] ) != "") { $content = stripslashes(get_option( $value['id']) ); } else { $content = $value['std']; } ?>
	<div id="<?php echo user_can_richedit() ? 'postdivrich' : 'postdiv'; ?>" class="postarea">
		<?php the_editor(stripslashes($content), $value['id'], $value['id'], true); ?>
	</div>
<span><?php echo $value['desc']; ?></span>
</td>
</tr>

<?php
break;

case 'select':
?>
<tr>
<th><?php echo $value['name']; ?></th>
<td>
<select name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>">
		<option value="">Select</option>
<?php foreach ($value['options'] as $option) { ?>
		<option <?php if (get_option( $value['id'] ) == $option) { echo 'selected="selected"'; } ?>><?php echo $option; ?></option><?php } ?>
</select>
<br/>
	<span><?php echo $value['desc']; ?></span>
</td>
</tr>
<?php
break;

case "checkbox":
?>
<tr>
	<th><?php echo $value['name']; ?></th>

	<td><?php if(get_option($value['id'])){ $checked = "checked=\"checked\""; }else{ $checked = "";} ?>
		<input type="checkbox" class="checkbox" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" value="true" <?php echo $checked; ?> /><br/>
		<span><?php echo $value['desc']; ?></span>
	</td>
</tr>
<?php break;
case 'radio':
?>
<tr>
<th valign="top"><?php echo $value['name']; ?></th>
<td>
	
<?php
$get_options[$id] = (get_option($value['id'])) ? get_option($value['id']) : $value['std'];
foreach ($value['desc'] as $desc => $value) { ?>

<label><input name="fs_blog_excerpt_or_full" id="fs_blog_excerpt_or_full" class="radio" type="radio" value="<?php echo $value; ?>" <?php echo $selector; ?> <?php if ($get_options[$id] == $value){echo 'checked="checked"';}?> /> <?php echo $desc; ?></label><br /> 

<?php } ?>	

</td>
</tr>
<?php

break;
case "section":

$i++;

?>

<div class="pane" id="<?php echo strtolower($value['name']); ?>_settings">
	<div class="rm_title">
		<h3><?php echo $value['name']; ?></h3>
	</div>
<div class="rm_options">

<?php break;

}
}
?>
<div class="fs_submit"><input class="button-primary" name="save<?php echo $i; ?>" type="submit" value="Save changes" /></div>
<input type="hidden" name="action" value="save" />
</form>
</div> 

<div class="fs_footer">
	<span class="fs_version">FreshServe v1.1</span>
	<span class="fs_built">Built by <a href="http://themeforest.net/user/two2twelve?ref=two2twelve">Two2Twelve</a></span>
	<div style="clear:both;"></div>
</div>

<?php
}
?>
