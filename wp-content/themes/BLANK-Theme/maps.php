<?php get_header(); ?>

<div data-role="header">
    <h1>Maps</h1>
     <a href="<?php echo bloginfo('siteurl'); ?>" data-icon="home" data-iconpos="notext" data-direction="reverse">Home</a>
<!--	<a href="#" data-icon="search" data-iconpos="notext" data-rel="dialog" data-transition="fade">Search</a> -->
</div>

<div data-role="content">
    <div class="content-primary" data-theme="c">
        <div class="box-top-border card" style="text-align:center;">
            <a href="#map1" data-rel="popup" data-position-to="window" data-transition="fade" >
                <img src="<?php echo bloginfo('template_directory'); ?>/images/maps/map-expo-top-left-thumb.jpg"/ style="width:140px; height:140px;"></a>
            <a href="#map2" data-rel="popup" data-position-to="window" data-transition="fade" >
                <img src="<?php echo bloginfo('template_directory'); ?>/images/maps/map-expo-top-right-thumb.jpg"/ style="width:140px; height:140px;"></a>

            <div data-role="popup" id="map1" class="photopopup" data-overlay-theme="a" data-corners="false" data-tolerance="30,15" >
                <a href="#" data-rel="back" data-role="button" data-theme="a" data-icon="delete" data-iconpos="notext" class="ui-btn-right">Close</a>
                    <img src="<?php echo bloginfo('template_directory'); ?>/images/maps/map-expo-top-left.jpg"/ alt="Expo Map Top Left">
            </div>
            <div data-role="popup" id="map2" class="photopopup" data-overlay-theme="a" data-corners="false" data-tolerance="30,15" >
                <a href="#" data-rel="back" data-role="button" data-theme="a" data-icon="delete" data-iconpos="notext" class="ui-btn-right">Close</a>
                    <img src="<?php echo bloginfo('template_directory'); ?>/images/maps/map-expo-top-right.jpg"/ alt="Expo Map Top Right">
            </div>
        </div>
        <div class="box-bottom-border card" style="text-align:center;">
            <a href="#map3" data-rel="popup" data-position-to="window" data-transition="fade" >
                <img src="<?php echo bloginfo('template_directory'); ?>/images/maps/map-expo-bottom-left-thumb.jpg"/ style="width:140px; height:140px;"></a>
            <a href="#map4" data-rel="popup" data-position-to="window" data-transition="fade" >
                <img src="<?php echo bloginfo('template_directory'); ?>/images/maps/map-expo-bottom-right-thumb.jpg"/ style="width:140px; height:140px;"></a>
            <div data-role="popup" id="map3" class="photopopup" data-overlay-theme="a" data-corners="false" data-tolerance="30,15" >
                <a href="#" data-rel="back" data-role="button" data-theme="a" data-icon="delete" data-iconpos="notext" class="ui-btn-right">Close</a>
                    <img src="<?php echo bloginfo('template_directory'); ?>/images/maps/map-expo-bottom-left.jpg"/ alt="Expo Map Bottom Left">
            </div>
            <div data-role="popup" id="map4" class="photopopup" data-overlay-theme="a" data-corners="false" data-tolerance="30,15" >
                <a href="#" data-rel="back" data-role="button" data-theme="a" data-icon="delete" data-iconpos="notext" class="ui-btn-right">Close</a>
                    <img src="<?php echo bloginfo('template_directory'); ?>/images/maps/map-expo-bottom-right.jpg"/ alt="Expo Map Bottom Right">
            </div>
        </div>
        <div class="mapfooter">Tap section of map to enlarge</div>
    </div>
</div>

<script type="text/javascript" src="<?php echo bloginfo('template_directory'); ?>/js/popup.js"></script>