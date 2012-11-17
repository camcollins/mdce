<?php get_header(); ?>

<div data-role="content">
	<div data-role="header">
    	<h1>Social</h1>
	    <a href="<?php echo bloginfo('siteurl'); ?>" data-icon="home" data-iconpos="notext" data-direction="reverse" rel="external">Home</a>
	</div>
    <div data-role="content" data-theme="b">
        <div style="float:left; margin-top:50px; margin-left:15%; width:70%;" id="sharebuttons">
	        <div class="navgroup">
	        	<a href="http://m.facebook.com/sharer.php?u=<?php echo urlencode($_SERVER['HTTP_REFERER']); ?>"><img src="<?php echo bloginfo('template_directory'); ?>/images/fb-share.png"/></a>
	        	<a href="https://twitter.com/intent/tweet?hashtags=MDCE&original_referer=<?php echo urlencode($_SERVER['HTTP_REFERER']); ?>&related=boatingindustry&source=tweetbutton&text=2012%20Marine%20Dealer%20Conference%20%26%20Expo&url=<?php echo urlencode($_SERVER['HTTP_REFERER']); ?>&via=boatingindustry"><img src="<?php echo bloginfo('template_directory'); ?>/images/tweet.png"/></a>
	        </div>
            <br><br><br>
            <p><a href="<?php echo bloginfo('siteurl'); ?>" data-direction="reverse" data-role="button" data-theme="b" rel="external" style="margin-left: 0.5em; margin-right: 0.5em;">Back</a></p>	
        </div>
    </div>
</div>