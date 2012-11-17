<?php get_header(); ?>
<div data-role="header">
    <h1>Speakers</h1>
    <a href="<?php echo bloginfo('siteurl'); ?>" data-icon="home" data-iconpos="notext" data-direction="reverse">Home</a>
    <a href="#" data-icon="search" data-iconpos="notext" data-rel="dialog" data-transition="fade">Search</a>
</div><!-- /header -->

<div data-role="content" data-theme="b">
	<?php 
    $speakers=mysql_query("SELECT * FROM speakers Order by name ASC");
	while($speaker=mysql_fetch_array($speakers))
	{
		if($speaker['name']!=="")
		{
     ?>
        <div data-role="collapsible" data-content-theme="b" data-iconpos="right">
            <h3><?php echo $speaker['name']; ?></h3>
            <ul data-role="listview" data-inset="true" data-theme="c">
                <li>
                    <a href="<?php echo bloginfo('siteurl'); ?>/details?id=<?php echo $speaker['speaker_id']; ?>&type=speakers">
                        <img src="<?php echo bloginfo('template_directory'); ?>/images/<?php echo $speaker['image']; ?>" width="100" height="100" />
                        <h1 style="font-size:18px;"><?php echo $speaker['name'];?></h1>
                        <h1 style="font-size:14px;"><?php echo $speaker['company']." / ".$speaker['title']; ?></h1>
                    </a>
                </li>
              </ul>
          </div>
    <?php 
		}
     }
    ?>
</div><!-- /content -->
<div data-role="controlgroup" data-type="horizontal" >
    <a href="add?type=Speakers" data-role="button" style="width:47%; margin-left: 0.5em;">My Speakers</a>
    <a href="<?php echo bloginfo('siteurl'); ?>/schedule" data-role="button"  style="width:47%">All Events</a>
</div>
<p><a href="<?php echo bloginfo('siteurl'); ?>" data-direction="reverse" data-role="button" data-theme="b" style="margin-left: 0.5em; margin-right: 0.5em;" rel="external">Back</a></p>	
<?php get_footer(); ?>