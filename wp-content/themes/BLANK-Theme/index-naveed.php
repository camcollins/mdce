<?php get_header(); ?>
<div class="content-primary" data-theme="c">
    <div id="mdce-header">
        <div id="mdce-logo">      
        </div>
    </div><!-- /header -->
    
    <div class="box-top-border card" style="text-align:center;">
        <a href="<?php echo bloginfo('siteurl'); ?>/schedule"><img src="<?php echo bloginfo('template_directory'); ?>/images/buttons/schedule.png"/></a>
        <a href="<?php echo bloginfo('siteurl'); ?>/speakers"><img src="<?php echo bloginfo('template_directory'); ?>/images/buttons/speakers.png"/></a>
        <a href="<?php echo bloginfo('siteurl'); ?>/exhibitor"><img src="<?php echo bloginfo('template_directory'); ?>/images/buttons/exhibitors.png"/></a>
    </div>
    
    <div class="box-bottom-border card" style="text-align:center;">
        <a href="<?php echo bloginfo('siteurl'); ?>/sponsors"><img src="<?php echo bloginfo('template_directory'); ?>/images/buttons/sponsors.png"/></a>
        <a href="<?php echo bloginfo('siteurl'); ?>/social"><img src="<?php echo bloginfo('template_directory'); ?>/images/buttons/social.png"/></a>
        <a href="<?php echo bloginfo('siteurl'); ?>/maps"><img src="<?php echo bloginfo('template_directory'); ?>/images/buttons/maps.png"/></a>
    </div>
    <div>
   				 <p data-mce-style="text-align: center;" style="text-align: center;">
                        <strong>
                            <span style="font-size: x-small; font-family: verdana, geneva; " data-mce-style="font-size: x-small; font-family: verdana, geneva;">
                                <span id="_mce_caret" data-mce-bogus="1"><span data-mce-bogus="1"></span></span>
                                Powered by Sponsors
                            </span>
                        </strong>
                    </p>
                </div>
 <div id="SliderName" align="center">
		  <ul id="rotator"> 
            <li>
              <div class="rotator-image img1"></div>
              <div class="rotator-image img2"></div>
              <div class="rotator-image img3"></div>
              <div class="rotator-image img4"></div>
              <div class="rotator-image img5"></div>
               <div class="rotator-image img6"></div>
            </li>
          </ul>
    </div>

     <br />
   <!-- <script type="text/javascript">
		// we created new effect and called it 'demo01'. We use this name later.
		Sliderman.effect({name: 'demo01', cols: 10, rows: 5, delay: 10, fade: true, order: 'straight_stairs'});

		var demoSlider = Sliderman.slider({container: 'SliderName', width: 200, height: 100, effects: 'demo01',
		display: {
			pause: true, // slider pauses on mouseover
			autoplay: 3000, // 3 seconds slideshow
			always_show_loading: 200, // testing loading mode
/*			description: {background: '#ffffff', opacity: 0.5, height: 50, position: 'bottom'}, // image description box settings
			loading: {background: '#000000', opacity: 0.2, image: 'img/loading.gif'}, // loading box settings
			buttons: {opacity: 1, prev: {className: 'SliderNamePrev', label: ''}, next: {className: 'SliderNameNext', label: ''}}, // Next/Prev buttons settings
			navigation: {container: 'SliderNameNavigation', label: '&nbsp;'} // navigation (pages) settings */
		}});

	</script>-->
  <div class="ui-grid-a">
                    <div class="ui-block-a">
                        <div>
                            <p style="text-align: center; ">
                                <span style="font-family: tahoma, arial, helvetica, sans-serif; font-size: x-small; "
                                data-mce-style="font-family: tahoma, arial, helvetica, sans-serif; font-size: x-small;">
                                    <b>
                                        Mobile site by: &nbsp;
                                    </b>
                                </span>
                            </p>
                        </div>
                    </div>
                    <div class="ui-block-b">
                        <div>
                        <p style="text-align: center; margin-left:-30px; ">
                           <a href="http://dockmaster.com"> <img style="width: 175px; height: 32px" src="<?php echo bloginfo('template_directory'); ?>/images/buttons/dockmaster-trans-175x32.png"></a>
                            </p>
                        </div>
                    </div>
                </div> 
</div>

<?php get_footer(); ?>