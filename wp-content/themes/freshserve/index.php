<?php get_header(); ?>

<div class="header header_home page">
	<?php if(get_option('fs_homepage_pt_disable') == "true") { } else { ?>	
	<div class="price_tag"></div>
	<?php } ?>
	
	<!-- 
	<img src="<?php //echo get_option($shortname.'_homepage_main_img'); ?>" alt="" class="main_screenshot" />
	-->

	<!-- Start App Info -->
	<div class="info">
		<h1>Make More Money From The Customers You Already Have</h1>
		
		
		<!-- <h1><?php //echo get_option($shortname.'_homepage_title'); ?></h1> -->
		<!--  <p><?php //echo get_option($shortname.'_homepage_description'); ?></p> -->
		
		<h3>Trackpattern Will Increase Your Sales and Reduce Your Costs. Dramatically.</h3>
		
		<!--
		<a href="<?php //echo fs_page_link(get_option($shortname.'_homepage_button_link')); ?>" class="button icon"><img src="<?php //bloginfo('template_url'); ?>/images/go_icon.png" alt="<?php //echo get_option($shortname.'_homepage_button_text'); ?>" /><span><?php //echo get_option($shortname.'_homepage_button_text'); ?></span></a>
		<span class="trial"><?php //echo get_option($shortname.'_homepage_trial_text'); ?></span>
		-->

	</div>
	

	
	<!-- End App Info -->
	<div class="clear"></div>
	
</div>

<div id="home" class="padding">
	
	<div id="screenshots">
	
	<!--
		<div class="section_title">
			<h3>Take a Look...</h3>
		</div>
	-->
		<!-- <a href="javascript:;" class="controls prev">Previous</a> -->
	
		 <div class="scrollable">
			<div class="items">
			<?php
				$blurbs = array(0 => "It shows you the health of your biz", 1=> "It shows you who your best customers are", 2=> "It shows you which clients need a push",3=>"It shows which clients are not profitable", 4=>"It tells you lots about your customers");

				$screenshots_options = get_option($shortname.'_screenshots_settings');
				$screenshots_count = ($screenshots_options[$shortname.'_screenshots_count'])<=0 ? 1 : $screenshots_options[$shortname.'_screenshots_count'];
				
				//HACK
				$screenshots_count = 5;
				
				$count = $screenshots_count;
				for($z = 0; $z < $count; $z++) {
			?>	
				<div><a href="<?php echo $screenshots_options[$shortname.'_screenshots_url_'.$z] ?>" class="screenshot" rel="group" title="<?php echo $screenshots_options[$shortname.'_screenshots_caption_'.$z] ?>"><img src="<?php bloginfo('template_directory'); ?>/scripts/timthumb.php?src=<?php echo $screenshots_options[$shortname.'_screenshots_url_'.$z] ?>&h=100&w=145&zc=1" alt="" /></a>
<p class="triangle-right topa"><?php echo $blurbs[$z]; ?>  </p>
</div>
			<?php } ?>
			</div> 
		</div> 
		

		<!--  <a href="javascript:;" class="controls next">Next</a> -->
		
		<div class="clear"></div>
	</div>
	
	
	<!-- <div id="features"> -->
	<div id="writeup">
		<?php 
		//$content = get_option($shortname.'_homepage_content');
		//$content = stripslashes($content); $content = do_shortcode($content); $content = apply_filters('the_content', $content);
		//echo $content;
		?>
		<div id="writeup-content">
			

			<side-item><span class="sideform">
		<form id="subForm-side" action="http://www.aweber.com/scripts/addlead.pl" class="subForm-side">
		<h2>Try Trackpattern For Free </h2> 

	<p>Sign up now as a first user and we'll help you collect your data and show you in a detailed way how you can increase your profits. This one-on-one attention won't be available to users that sign up later.  </p>
		 <input type="hidden" name="listname" value="trackpattern" />
   		 <input type="email" name="email" placeholder="Enter your email" id="email">
		<input type="hidden" name="redirect" value="http://www.trackpattern.com" />
		<input type="hidden" name="meta_adtracking" value="custom form" />
		<input type="hidden" name="meta_message" value="1" />
		<input type="hidden" name="meta_required" value="email" />
		<input type="hidden" name="meta_forward_vars" value="1" />

   	 <input type="submit" value="Sign-up and get started"><br>
</form></span></side-item>
		<h2>
			Here's how Trackpattern reports give you actionable, money-making insights:
			</h2>
			<br/>
			
			<ul id="actionlist" style="width:480px;">
			
			<li>
			Know the top 20% of your customers: the awesome ones that will buy more of your stuff, give you more referrals, spread your brand, and grow your business. 
			</li>
			<li>
			Know your "on the fence" customers: the ones that might buy again, but need a special push. If you don't take action, you will LOSE these customers. Trackpattern will tell you who they are so you can take action and keep them, so they become part of your loyal customer base.
		</li>
			<li>
			Know which customers haven't bought much of your stuff, so you don't waste too much money/time marketing to them.
			</li>
			<li>
			Know everything you need to know about each customer, and each customer segment. So you can market to each customer individually.
			</li>
			<li>
			Know the order in which products were bought, so you can spot patterns that lead to more sales.
			</li>
			<li>
			Know the health of your biz: track your revenue and customer engagement growth, so you can have a picture of how well your business is growing and how you can improve it. 
			</li>
			</ul>

<br/>
			<side-item><span class="stat">You want more conversions. You want more sales. <br/><br/>Trackpattern can increase your marketing ROI between 70% and 400% by identifying customer segments so you can market to your customers in a connection-building, targeted way.  </span></side-item>
			<h2>If you run an online product or professional service business</h2> 

			
			<p>
			and already have some customers or clients, your sales process typically works like this: you launch your product or service. Then you run campaigns to sell that product or service. 
			</p>
			
			<p>
			After a while, the momentum slows down. And you come up with another product or service, or maybe you launch another campaign to re-sell a previous product or service. And once again you try to get new buyers.
			</p>
			
			<p>
			The launch cycle. 
			</p>
			
			<p>
			What lots biz of owners often don't realize is that this can become <span style="font-style:italic;">vicious</span> cycle. </p>

<p>Because you are only focused on selling. Indiscriminately. And you have to keep fighting the same uphill battle again and again: the battle of making conversions.
			</p>
			
			<p>
			So what do you do? You find yourself constantly reminding your subscribers about your product. Constantly trying to gain traffic and sign-ups. Constantly checking your aWeber or Mailchimp control panel for open rates. Constantly trying to find out ways to make the launch more successful. 
			</p>
<p>
Not to mention, you spend your energy on lots of expensive, time-consuming activities to acquire customers. Adwords, SEO, and all the rest.
</p>
			
			<h2>You could be making more money with less time</h2>
			
			<p>
			The way you're doing things now -- you may be surviving. You may even be growing. But you're not making nearly as much money as you could be. And you're spending way too much time and money in the wrong areas. After all, the point of your small biz was to make a growing income doing what you love, without stressing yourself out. Right?
			</p>
			
			<side-item><span class="stat">You want to apply what you've learned from the marketing gurus about customer relationships...<br /> <br /> ...the stuff that Seth Godin, Naomi Dunford, and Sonia Simone write about on their blogs. <br /><br />Trackpattern is software that lets you directly apply those principles to your biz. </span></side-item>
			<p>
			As the marketing experts would tell you, you need to improve your ROI -- your Return On Investment. 
			</p>
			<p>
 			And how can you do that?
			</p>

			<h2>You gotta start following the 80/20 rule</h2> 
			<p>
			You know, the rule that we hear in marketing all the time: 80% of the results come from 20% of your stuff.  80% of your business comes from 20% of the customers. 80% of your profit comes from the top 20% of your products and services.
			</p>
			
			<p>
			But figuring out that 20% -- the right 20% -- is not easy.
			</p>
			
			<p>
			
			No wonder you keep having to stress out about getting more and more leads, visits, fame, and mailing list sign-ups.
			
			</p>
			
			<p>
			Fortunately, there is a solution. And it is easier than you might think.
			</p>
			
			<h2>
			There is way more profit to be made by targeting your marketing and your products to your current customers...but you have to segment them right and know their behaviors
			</h2>
			
			<p>
			How?
			</p>
			
			<side-item><span class="stat">You have a life outside of work. You want to spend less time doing the painful marketing stuff.  <br/><br/>Trackpattern will help you get your life back without sacrificing your income. By showing you the most important (and least important) clients, customers, and products so you can cut the fat from your biz and focus on doing what you love. </span></side-item>
			<p>
			You break up your customers into segments based on their behaviors. You gain insight into what they want or how much they are open to buying. Then you take action based on that.
			</p>
			
			<p>
			For example, your top 20% top of buyers who have bought in the past 3 months is one segment of your customers: your GOLD customers.
			</p>
			
			<p>
			If you knew who that top 20% were, you could give them some special attention and sell them a premium product. You could feel comfortable asking them for quality referrals. And imagine if you knew some more characteristics about them : what they've mostly bought in the past, what kind of pitch works well on them, and what promotions will make them buy. And if you know how you acquired them, you could find even more customers just like them. Quality customers.
			</p>
			
			<p>
			If you knew all that stuff, you'd know how to grow your biz in the long-term with very little time and money wasted.
			</p>
			
			<p>
			But HOW can you know all that stuff?
			</p>
			
			<p>
			There is only one way : you gotta measure it. As the saying goes: you can't manage what you don't measure.
			</p>



			<side-item><span class="stat">You want to make a certain income, but you're not there yet. <br/><br/>Trackpattern will help you reach your goal. By knowing your revenue growth overall, by product, and by customer segment, you can figure out where to optimize and reach the level you desire. </span></side-item>
			<h2>
			The best companies go through a lot of pain to get this 80/20 stuff measured. With Trackpattern, you don't have to
			</h2>
			
			<p>
			There are companies spending thousands of dollars on this new thing called customer analytics -- this means lots of consultants, boring meetings, and scary looking databases.
			</p>
			
			<p>
			So why do these big corps go through all this pain?
			</p>
			
			<p>
			They do it because it brings results. It makes them more money.
			</p>
			
			<p>
			It will make more money for your small business too, but you don't have the time to do all the crap they do. 
			</p>
			
			<p>
			Fortunately as a small biz, you don't need to go through the crap to get the same results. All you need is a tool that can do it for you. Trackpattern is that tool.
			</p>
			
			<h2>
			All you need is a list of your customers and Trackpattern will do the rest
			</h2>
			
			<p>
			This is not based on wishy-washy marketing tips. 
			</p>
			
			<p>
			This is hard math, statistics, and facts. This is not an ebook on "How to make your customers love you" or "How to become famous". It is not a bunch of tips on how to be a cool marketing authority with fancy webinars. That stuff is great, but so is making more money. And we can probably agree on which of those two things is more urgent for your biz.
			</p>
			
			<p>
			Trackpattern is a real intelligent (but easy-to-use) software that makes you more money and saves you time. 
			</p>
			
			<side-item><span class="stat">If you want to start seriously kicking some ass, you don't need another marketing coach. You don't need to read more ebooks or take more masterclasses. Yes, those can help, but only marginally now that your biz is up and running. <br /><br /> If you've got as far as you have (even if you think you haven't gotten too far), that means you already have the talent, the dedication, and the expertise to take your business to a remarkable level. <br /><br/> All you need is the right tool. <br/><br/>Sign up now to try Trackpattern for free and find out why it's the perfect tool for you.  </span></side-item>
	
		</div>
		<div class="clear"></div>
	</div>
	<form action="" method="post" action="http://www.aweber.com/scripts/addlead.pl" id="subForm">
  		  <h2>
    		  Sign up as one of the first users of Trackpattern<br>
		  <br />
		  and use it for free
   		 </h2>
		 <input type="hidden" name="listname" value="trackpattern" />
   		 <input type="email" name="email" placeholder="Enter your email" id="email">
   		 <input type="submit" value="Get Started!">
		<br> <span style="font-size:12px; margin-top:20px;">Spam is not cool. We will never spam you or share your email address with others. </span>
  </form>
</div>
<?php get_footer(); ?>
