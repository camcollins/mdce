<?php get_header(); ?>
<div data-role="header">
    <h1>Schedule</h1>
    <a href="<?php echo bloginfo('siteurl'); ?>" data-icon="home" data-iconpos="notext" data-direction="reverse">Home</a>
    <a href="#" data-icon="search" data-iconpos="notext" data-rel="dialog" data-transition="fade">Search</a>
</div><!-- /header -->

<div data-role="content" data-theme="b">
	<?php 
    $qry=mysql_query("select * from schedule");
    while($res=mysql_fetch_array($qry))
    {
		$qryd=mysql_query("select * from events where day_id=".$res['id']);
     ?>
        <div data-role="collapsible" data-content-theme="b" data-iconpos="right">
            <h3><?php echo $res['days'];?></h3>
            <ul data-role="listview" data-inset="true" data-theme="c">
                <?php 
                while($res1=mysql_fetch_array($qryd))
                {
                ?>
                    <li>
                        <a href="<?php echo bloginfo('siteurl'); ?>/details?id=<?php echo $res1['event_id']; ?>&type=schedule">
                            <h1 style="font-size:18px;"><?php echo $res1['title'];?></h1>
                            <h1 style="font-size:14px;"><?php echo $res1['from_to_time'];?></h1>
                            <h1 style="font-size:14px;"><?php echo $res1['location'];?></h1>
                        </a>
                    </li>
        <?php } ?>
            </ul>
        </div>
    
    <?php 
     }
    ?>
</div><!-- /content -->
<div data-role="controlgroup" data-type="horizontal">
    <a href="add?type=Schedule" data-role="button" style="width:47%; margin-left: 0.5em;">My Schedule</a>
    <a href="<?php echo bloginfo('siteurl'); ?>/schedule" data-role="button" style="width:47%">All Events</a>
</div>
<p><a href="<?php echo bloginfo('siteurl'); ?>" data-direction="reverse" data-role="button" data-theme="b" rel="external" style="margin-left: 0.5em; margin-right: 0.5em;">Back</a></p>	
<?php get_footer(); ?>