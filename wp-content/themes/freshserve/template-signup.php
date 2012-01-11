<div class="header page">
	<h1>Signup</h1>
</div>

<div id="signup" class="padding">
	
	<div class="page_content">
		
		<form action="<?php echo get_option('home'); ?>/wp-content/themes/freshserve/scripts/signup_example.php" method="post" id="signup_form">
			
			<h2><span>Personal Info</span></h2>
			
			<p><label>First Name</label>
			<input type="text" id="f_name" name="signup[first_name]" class="text_field required" /></p>
			
			<p><label>Last Name</label>
			<input type="text" id="l_name" name="signup[last_name]" class="text_field required" /></p>
			
			<p><label>E-mail Address</label>
			<input type="text" id="email" name="signup[email]" class="text_field required email" /></p>
			
			<p><label>Company</label>
			<input type="text" id="company" name="signup[company]" class="text_field required" /></p>
			
			<div class="clear margin"></div>
			
			<h2><span>Account Info</span></h2>
			
			<p><label>Subdomain</label>
			<input type="text" id="subdomain" name="signup[subdomain]" class="text_field" /><b>.freshserve.com</b></p>
			
			<p><label>Password</label>
			<input type="password" id="password" name="signup[password]" class="text_field required" /></p>
			
			<div class="clear margin"></div>
			
			<h2><span>Billing Info</span></h2>
			
			<p class="card_type"><label>Card Type</label>
			<select name="signup[cc_type]" class="text_field" style="width: auto;">
				<option>Visa</option>
				<option>MasterCard</option>
				<option>Discover</option>
			</select>
			<img src="images/card_types.png" alt="" class="card_types" />
			</p>
			<div class="clear"></div>
			
			<p><label>Card Number</label>
			<input type="text" id="cc_num" name="signup[cc_num]" class="text_field" /></p>
			
			<p><label>Card Expiration</label>
			<select name="signup[cc_month]" class="text_field" style="width: 125px;">
				<option>Month</option>
			</select> / 
			<select name="signup[cc_year]" class="text_field" style="width: 125px;">
				<option>Year</option>
			</select>
			</p>
			
			<div class="clear"></div>
			
			<div class="send_form">
				<a href="javascript:;" class="button submit"><span>Complete Signup</span></a>
			</div>
		</form>
		
	</div>

	<!-- Start Sidebar -->
	<?php get_sidebar(); ?>
	<div class="clear"></div>
	
</div>
<script type="text/javascript" src="<?php echo bloginfo('template_url'); ?>/javascripts/jquery.validate.js"></script>
<script type="text/javascript" charset="utf-8">
	$(document).ready(function() {
		$("#signup_form").validate();
	});
</script>