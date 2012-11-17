<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>	
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<?php if (is_search()) { ?>
	   <meta name="robots" content="noindex, nofollow" /> 
	<?php } ?>

	<title>
		   <?php
		      if (function_exists('is_tag') && is_tag()) {
		         single_tag_title("Tag Archive for &quot;"); echo '&quot; - '; }
		      elseif (is_archive()) {
		         wp_title(''); echo ' Archive - '; }
		      elseif (is_search()) {
		         echo 'Search for &quot;'.wp_specialchars($s).'&quot; - '; }
		      elseif (!(is_404()) && (is_single()) || (is_page())) {
		         wp_title(''); echo ' - '; }
		      elseif (is_404()) {
		         echo 'Not Found - '; }
		      if (is_home()) {
		         bloginfo('name'); echo ' - '; bloginfo('description'); }
		      else {
		          bloginfo('name'); }
		      if ($paged>1) {
		         echo ' - page '. $paged; }
		   ?>
	</title>
	
	<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
	
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

	<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>

	<?php wp_head(); ?>

	<link rel="apple-touch-icon-precomposed" href="<?php echo bloginfo('template_directory'); ?>/images/eventman.jpg"/> />
    <link rel="stylesheet" href="http://code.jquery.com/mobile/1.2.0/jquery.mobile-1.2.0.min.css" />
  	<link rel="stylesheet" href="<?php echo bloginfo('template_directory'); ?>/css/mdce.css"/>
    <script src="http://code.jquery.com/jquery-1.8.1.min.js"></script>
    <script src="http://code.jquery.com/mobile/1.2.0/jquery.mobile-1.2.0.min.js"></script>
    <script src="<?php echo bloginfo('template_directory'); ?>/js/swipe.min.js">  // Swipe script </script>
	<script src="<?php echo bloginfo('template_directory'); ?>/js/mdce.js"></script>
    <script type="text/javascript" src="<?php echo bloginfo('template_directory'); ?>/js/sliderman.1.3.7.js"></script>
	<link rel="stylesheet" type="text/css" href="<?php echo bloginfo('template_directory'); ?>/css/sliderman.css" />
    <script type="text/javascript">  // Function to output HTML for card style button images
        $(document).ready(function() {
            $("#mdce-home img").load(function() {
                $(this).wrap(function() {
                    return '<span class="image-wrap ' + $(this).attr('class') + '" style=" display:inline-block; background:url(' + $(this).attr('src') + ') no-repeat center center; width: ' + $(this).width() + 'px; height: ' + $(this).height() + 'px;" />';
                });
                $(this).css("opacity","0");
            });
        });
    </script>
    <script language="javascript" type="text/javascript">
        function closediv(divid)
        {
            document.getElementById(divid).style.display='none';
            document.getElementById('fadout').style.display='none';
        }
    </script>
    <script>
			$(function(){
		  // time between image rotate
		  var delay = 2000;
		  
		  // for each list item in 
		  // the rotator ul, generate
		  // show a random list item
		  $('#rotator > li').each(function(){
			// save images in an array
			var $imgArr = $(this).children();
			// show a random image
			$imgArr.eq(Math.floor(Math.random()*$imgArr.length)).show();
		  });
		  // run the changeImage function after every (delay) miliseconds
		  setInterval(function(){
			changeImage();
		  },delay);
		  
		  function changeImage(){
			// save list items in an array
			var $liArr = $('#rotator > li');
			// select a random list item
			var $currLi = $liArr.eq(Math.floor(Math.random()*$liArr.length));
			// get the currently visible image
			var $currImg = $('.rotator-image:visible', $currLi);
			if ($currImg.next().length == 1) {
			  var $next = $currImg.next();
			} else {
			  var $next = $('.rotator-image:first', $currLi);
			}
			$currImg.fadeOut();
			$next.fadeIn();
		  }  
		});

	</script>
    <style type="text/css">

		#SliderName{
			width: 270px;
			height: 120px;
			margin: auto auto auto;
		}
		
  ul#rotator, ul#rotator li{
	text-decoration:none;
	list-style:none;
  }
  ul#rotator li{
    position: relative;
  }
  .rotator-image{
    position: absolute;
    display: none;
    width: 270px;
    height: 120px;
  }
  .img1{
		background:url(wp-content/themes/BLANK-Theme/images/buttons/sponsors_new/1.png); background-repeat:no-repeat;
  }
  .img2{
		background:url(wp-content/themes/BLANK-Theme/images/buttons/sponsors_new/2.png); background-repeat:no-repeat; 
  }
  .img3{
    background:url(wp-content/themes/BLANK-Theme/images/buttons/sponsors_new/3.png); background-repeat:no-repeat;
  }
  .img4{
     background:url(wp-content/themes/BLANK-Theme/images/buttons/sponsors_new/4.png);  background-repeat:no-repeat;
  }
  .img5{
      background:url(wp-content/themes/BLANK-Theme/images/buttons/sponsors_new/5.png); background-repeat:no-repeat;
  } 
   .img6{
      background:url(wp-content/themes/BLANK-Theme/images/buttons/sponsors_new/6.png); background-repeat:no-repeat;
  } 
	</style>
</head>

<body <?php body_class(); ?>>
    <div data-role="page" data-theme="c" id="mdce-home"  class="type-home">
    		
            
       