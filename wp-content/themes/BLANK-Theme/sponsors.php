<?php get_header(); ?>
<div data-role="header">
    <h1>Sponsors</h1>
    <a href="<?php echo bloginfo('siteurl'); ?>" data-icon="home" data-iconpos="notext" data-direction="reverse">Home</a>
<!--    <a href="#" data-icon="search" data-iconpos="notext" data-rel="dialog" data-transition="fade">Search</a> -->
</div><!-- /header -->

<div data-role="content">
    <ul data-role="listview" data-inset="true" >
        <?php 
        $spqry=mysql_query("select * from sponsors");
        while($sprs=mysql_fetch_array($spqry))
        {
        ?>
            <li>
            	<a href="<?php echo bloginfo('siteurl'); ?>/details?id=<?php echo $sprs['sp_id']; ?>&type=sponsors">
                	<img src="<?php echo bloginfo('template_directory'); ?>/images/sponsors/<?php
					if($sprs['image']==".")
					{
						echo "noimage.jpg"; 
					}
					else
					{
					 	echo $sprs['image']; 
					}?>" />
                    
                    <h3><?php echo $sprs['cmp_name']; ?></h3>
                 </a>
             </li>
        <?php 
        }
        ?>
    </ul>
</div>
        
<div class="navgroup" data-role="controlgroup" data-type="horizontal" >
    <a href="add?type=Sponsors" data-role="button">My Sponsors</a>
    <a href="<?php echo bloginfo('siteurl'); ?>/exhibitor" data-role="button">All Events</a>
</div>
        
<p><a href="<?php echo bloginfo('siteurl'); ?>" data-direction="reverse" data-role="button" data-theme="b" rel="external" style="margin-left: 0.5em; margin-right: 0.5em;">Back</a></p>	
<?php get_footer(); ?>