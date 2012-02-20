<script type="text/javascript">var _tid="e21ca42c873ea6d6cededce3de0dd9a7";(function(){var ts=document.createElement("script");ts.type="text/javascript";ts.async=true;ts.src="http://analytics.linkalert.io/la.js";var s=document.getElementsByTagName("script")[0];s.parentNode.insertBefore(ts,s);})(); </script> 

$(document).ready(function() {
	
	// CSS3 rounded corners / shadows
	$("#commentform textarea, #commentform input[type=text]").addClass("text_field");
	$("#commentform span.required").remove();
	$("#commentform #submit").remove();
	$("#commentform .form-submit")
	 .prepend('<a class="button " href="javascript:;"><span>Post Comment</span></a>')
	 .click(function() {
		$("#commentform").submit();
	});
	
	$("div#header li.current_page_item a, div#header li.current-page-ancestor a").css({ '-moz-border-radius': '6px', '-webkit-border-radius': '6px', 'border-radius': '6px' });
	$("div.widget").css({ '-moz-border-radius': '8px', '-webkit-border-radius': '8px', 'border-radius': '8px' });
	$("div#price_table table").css({ '-moz-border-radius': '8px', '-webkit-border-radius': '8px', 'border-radius': '8px' });
	$("span.highlight_dark, span.highlight_light").css({ '-moz-border-radius': '2px', '-webkit-border-radius': '2px', 'border-radius': '2px' });
	$("div.team ul li a").css({ '-moz-border-radius': '8px', '-webkit-border-radius': '8px', 'border-radius': '8px' });
	$("form .text_field, form #s").css({ '-moz-border-radius': '8px', '-webkit-border-radius': '8px', 'border-radius': '8px' });
	$("a.button span").css({ 'text-shadow': '#000 0px -0px 2px' });
	$("div#page .section_title h3").css({ 'text-shadow': '#3e2828 0px 0px 2px' });

	// Default text field values
	$(".text_field").focus(function(srcc)
  {
      if ($(this).val() == $(this)[0].title)
      {
          $(this).addClass("default_text_active");
          $(this).val("");
      }
  });
  $(".text_field").blur(function()
  {
      if ($(this).val() == "")
      {
          $(this).removeClass("default_text_active");
          $(this).val($(this)[0].title);
      }
  });
  $(".text_field").blur();
	
	$("#features p.hp_feature").each(function(i) {
		if(i == 2 || i == 5 || i == 8) {
			$(this).addClass("last");
			$(this).after('<div class="clear spacer"></div>');
		}
	});
	
	$("#price_table table thead td:last").addClass("last");
	
	$("#price_table table tbody tr").each(function() {
		$("td:last", this).addClass("last");
	});
	
	var plans = $("#price_table table thead td");
	
	switch (plans.size()) {
		case 1 : plans.width("100%"); break;
		case 2 : plans.width("50%"); break;
		case 3 : plans.width("33%"); break;
		case 4 : plans.width("25%"); break;
		case 5 : plans.width("20%"); break;
		case 6 : plans.width("16%"); break;
		case 7 : plans.width("14%"); break;
	}
	
	// Button Hover
	if($.browser.msie && $.browser.version == "7.0") {
		$(".button").css("padding-top", "0px");
	} else {
		jQuery('.button').hover(
			function() { jQuery(this).stop().animate({opacity:0.8},400); },
			function() { jQuery(this).stop().animate({opacity:1},400); }
		);
	}
	
	// Add form submit capability to buttons
	$("a.submit").click(function() {
		$(this).parent().parent().submit();
	});
	
	// Remove border after last tweet in twitter widget
	$("#twitter_update_list li:last").css({'border-bottom' : 'none' });
	
	// Ajax contact form
	$('#send').click(function() {
       var name = $('input#name').val();
       var email = $('input#email').val();
			 var subject = $('select#subject').val();
       var message = $('textarea#message').val();
       $.ajax({
           type: 'post',
           url: $("form#contact_form").attr("action"),
           data: 'name=' + name + '&email=' + email + '&topic=' + subject + '&message=' + message,

           success: function(results) {
							if(results == "error") {
								$('p.validation').html("Please fill in all fields").addClass("error");
							} else {
								$("form#contact_form").fadeOut("fast");
               $('p.validation').html(results);
							}
           }
       }); // end ajax
   });

});
