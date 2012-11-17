<?php get_header(); ?>

<div data-role="header" data-theme="a">
    <h1>Exhibitors</h1>
    <a href="<?php echo bloginfo('siteurl'); ?>" data-icon="home" data-iconpos="notext" data-direction="reverse">Home</a>
<!--    <a href="#" data-icon="search" data-iconpos="notext" data-rel="dialog" data-transition="fade">Search</a> -->
</div><!-- /header -->

<div data-role="content">
<div class="content-primary" style="margin-top: 15px;">
	<ul data-role="listview" data-inset="true" data-theme="c" data-filter="true">
        <?php 
        $exqry=mysql_query("select * from exhibitor Order By ex_name ASC");
        while($exrs=mysql_fetch_array($exqry))
        {
        //mysql_query("UPDATE exhibitor SET counter = counter + 1 WHERE id = '".$exrs['id']."'");
        ?>
            <li>
                <a href="<?php echo bloginfo('siteurl'); ?>/details?id=<?php echo $exrs['id']; ?>&type=exhibitor">
                    <?php if($exrs['image']!="") { ?>
                        <img src="<?php echo bloginfo('template_directory'); ?>/images/<?php echo $exrs['image']; ?>" />
                    <?php } ?>
                    <div class="blockit">
                        <p><strong><?php echo $exrs['ex_name']; ?></strong></p>
                        <p><?php echo $exrs['booth_no']; ?></p>
                    </div>
                </a>
            </li>
        <?php 
        }
        ?>
    </ul>

<div class="navgroup" data-role="controlgroup" data-type="horizontal" >
    <a href="add?type=Exhibitor" data-role="button">My Exhibitors</a>
    <a href="<?php echo bloginfo('siteurl'); ?>/exhibitor" data-role="button">All Events</a>
</div>
        
<p><a href="<?php echo bloginfo('siteurl'); ?>" data-direction="reverse" data-role="button" data-theme="b" rel="external" style="margin-left: 0.5em; margin-right: 0.5em;">Back</a></p>	

</div>
</div>

<?php get_footer(); ?>