jQuery.noConflict();

function remove_sidebar_ajax() {
	jQuery("input[name^='sidebar_rm']").bind("click",function(){
		
		var $sidebarId = jQuery(this).attr("id");
		var $sidebarName = jQuery("#sidebar_generator_"+$sidebarId).val();
		jQuery("#sidebar_generator_"+$sidebarId).remove();
		
		var $arraySidebarInputs = new Array;
		jQuery("input[name^='sidebar_generator_']").each(function(id) {
                     $updateSidebars = jQuery("input[name^='sidebar_generator_']").get(id);
                     $arraySidebarInputs.push($updateSidebars.value);
                    });
		
		var $sidebarInputsStr = $arraySidebarInputs.join(",");
		jQuery.ajax({
			type: "post",url: $removeSidebarURL,data: { action: "remove_sidebar", sidebar: $sidebarInputsStr, sidebar_id: $sidebarId, sidebar_name: $sidebarName, _ajax_nonce: $ajaxNonce },
			beforeSend: function() {jQuery(".sidebar_rm_"+$sidebarId).css({display:""});},
			success: function(html){ 
				jQuery("#sidebar_table_"+$sidebarId).fadeOut("fast"); 
			}
		}); 
		return false;
	});
}
function copy_screenshot_row() {

		var $add_next = jQuery('.add_row');
		var $del_this = jQuery('.del_row');
		var $count = jQuery('.screenshots_counter');
		var $current_table = jQuery('.multitables');
		
		$add_next.unbind('click').bind('click',function() {
			$count.val(parseInt($count.val())+1);
			$current_number = $count.val();
			$newclone = jQuery('.clone_row').clone().insertBefore(jQuery('.clone_row'));
			$newclone.removeClass('hidden').removeClass('clone_row');
			
			fix_numbers($current_table)
			copy_screenshot_row();
			table_sort();
			
			return false;
			});
		$del_this.unbind('click').bind('click',function() {
			$count.val(parseInt($count.val())-1);
			jQuery(this).parents('.multitable').remove();
			fix_numbers($current_table);
			return false;
			});
	
}
function fix_numbers($current_table) {
	jQuery('.multitable').each(function(i){
		var $current_sub_table = jQuery(this);
		$current_sub_table.find('.changenumber').html(i+1);
		$current_sub_table.find('.correct_num').each(function(){
				var $multiply_me = '';
				var $newname = jQuery(this).attr('name').replace(/\d+/,i);
				if (jQuery(this).hasClass('multiply_me')) $multiply_me = 'multiply_me';
				jQuery(this).attr({'name': $newname,'id': $newname, 'class': $newname + " correct_num"});
			});
	});
}
function table_sort() {
		jQuery(".table_sort").tableDnD({
		    onDragClass: "myDragClass",
		    onDrop: function(table, row) {
			
				var $multitable_wrap = jQuery('.multitable');
				$multitable_wrap.each(function(i) {
					var $current_sub_table = jQuery(this);
					$current_sub_table.find('.correct_num').each(function(){
							var $newname = jQuery(this).attr('name').replace(/\d+/,i);
							jQuery(this).attr({'name': $newname,'id': $newname, 'class': $newname + " correct_num"});
						});
					});
		    },
			onDragStart: function(table, row) {	
			}
		});
}
jQuery(document).ready(function() {
	jQuery("ul.tabs").tabs("div.pane", { history: false });
	setTimeout(function() { jQuery(".fade").fadeOut(800); }, 1200);
	remove_sidebar_ajax();
	copy_screenshot_row();
	table_sort();
});