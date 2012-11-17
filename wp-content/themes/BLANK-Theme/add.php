<?php
	session_start();
	error_reporting(0);
	if(isset($_POST['submit']))
	{
		$checkuser=mysql_query("select * from users where username='".$_POST['username']."' and password='".md5($_POST['password'])."'");
		$row=mysql_fetch_array($checkuser);
		
		if(mysql_num_rows($checkuser) == 1)
		{
			$_SESSION['user_id']=$row['user_id'];
			$_SESSION['name']=$row['name'];
		}
		else
		{
			$msg="The Username or Password is incorrect";
		}
	}
	else if(isset($_POST['register']))
	{
		if(isset($_POST['username']) && $_POST['username'] != "" && isset($_POST['password']) && $_POST['password'] != "")
		{
			$insert=mysql_query("insert into users(`username`, `password`, `name`) values ('".$_POST['username']."', '".md5($_POST['password'])."', '".$_POST['username']."')");
			
			$getlastid=mysql_query("select max(user_id) as user_id from users");
			$row_userid=mysql_fetch_array($getlastid);
			
			$getname=mysql_query("select * from users where user_id='".$row_userid['user_id']."'");
			$rowname=mysql_fetch_array($getname);
			
			$_SESSION['user_id']=$row_userid['user_id'];
			$_SESSION['name']=$rowname['name'];
		}
		else
		{
			$msg="Please Fill All Fields Carefully";
		}
	}
	else
	{
		$msg="";
	}
	
	if(isset($_POST['cancel']))
	{
		$breakurl=explode("&like=yes", "http://mdce.dockmaster.dev/".$_SERVER['REQUEST_URI']);
		echo "<script>window.location='".$breakurl[0]."';</script>";
	}
	
?>
<!-- <div data-role="content" data-theme="a"> -->
<?php get_header(); ?>
    <div data-role="header">  	 
		<h1>My <?php echo $_GET['type']; ?></h1>
        <a href="<?php echo bloginfo('siteurl'); ?>" data-icon="home" data-iconpos="notext" data-direction="reverse">Home</a>
		
        <a href="#" data-icon="search" data-iconpos="notext" data-rel="dialog" data-transition="fade">Search</a>
         	
	</div>
    <?php
	if(isset($_GET['add']) && $_GET['add'] == "save" && isset($_SESSION['user_id']) && $_SESSION['user_id'] != "")
	{
		if($_GET['type'] == "Schedule")
		{
			$id="1";
		}
		if($_GET['type'] == "Speakers")
		{
			$id="2";
		}
		if($_GET['type'] == "Exhibitor")
		{
			$id="3";
		}
		if($_GET['type'] == "Sponsors")
		{
			$id="4";
		}
		
		$checkexist=mysql_query("select * from user_adds where user_id='".$_SESSION['user_id']."' and program_type='".$id."' and program_code='".$_GET['program_code']."'");
		
		if(mysql_num_rows($checkexist) == 0)
		{
			$insert=mysql_query("INSERT INTO user_adds (user_id, program_type, program_code) VALUES ('".$_SESSION['user_id']."', '".$id."', '".$_GET['program_code']."')");
			echo '<div id="errormsg" style="top: 150px; width: 70%; padding: 4px; background-color: #FFF; color: #000; border-radius: 5px 5px 5px 5px; border-width: 0px; position: absolute; z-index: 100; left: 15%; display: block;">Successfully Added.<div align="right"><a href="javascript: closediv(\'errormsg\');">[Close]</a></div></div>';
			
			echo '<div id="fadout" style="width: 100%; border: 0px none; padding: 0px; margin: 0px; background: none repeat scroll 0% 0% rgb(102, 102, 102); opacity: 0.4; z-index: 99; position: fixed; top: 0px; left: 0px; height: 768px; display: block;"></div>';
		}
		else
		{
			echo '<div id="errormsg" style="top: 150px; width: 70%; padding: 4px; background-color: #FFF; color: #000; border-radius: 5px 5px 5px 5px; border-width: 0px; position: absolute; z-index: 100; left: 15%; display: block;">You have Already Added. <div align="right"><a href="javascript: closediv(\'errormsg\');">[Close]</a></div></div>';
			echo '<div id="fadout" style="width: 100%; border: 0px none; padding: 0px; margin: 0px; background: none repeat scroll 0% 0% rgb(102, 102, 102); opacity: 0.4; z-index: 99; position: fixed; top: 0px; left: 0px; height: 768px; display: block;"></div>';
		}
	}
	
					if(isset($_GET['delete']) && $_GET['delete'] == "true")
					{		
					
						if(isset($_GET['type']) && $_GET['type'] == "Schedule")
						{
							$sql = mysql_query("delete  from `user_adds` where program_type=1 and program_code='".$_GET['id']."'") or die(mysql_error());
							header("Location:bloginfo('siteurl')/add/?type=Schedule");
							
						}
						else if(isset($_GET['type']) && $_GET['type'] == "Speakers")
						{
							$sql = mysql_query("delete  from `user_adds` where program_type=2 and program_code='".$_GET['id']."'") or die(mysql_error());
							header("Location:bloginfo('siteurl')/add/?type=Speakers");
						}
						else if(isset($_GET['type']) && $_GET['type'] == "Exhibitor")
						{
							$sql = mysql_query("delete  from `user_adds` where program_type=3 and program_code='".$_GET['id']."'") or die(mysql_error());
							header("Location:bloginfo('siteurl')/add/?type=Exhibitor");
						}
						else if(isset($_GET['type']) && $_GET['type'] == "Sponsors")
						{
							$sql = mysql_query("delete  from `user_adds` where program_type=4 and program_code='".$_GET['id']."'") or die(mysql_error());
							header("Location:bloginfo('siteurl')/add/?type=Sponsors");							
						}
					}
    ?>
    
	<div data-role="content" data-theme="a">	
    	<ul data-role="listview" data-inset="true" data-theme="d" data-split-icon="delete">
        	<?php
			if(isset($_SESSION['user_id']) && $_SESSION['user_id'] != "")
			{
				if(isset($_GET['type']) && $_GET['type'] == "Speakers")
				{
					
					$checkadded=mysql_query("select b.* from user_adds a, speakers b where a.program_type='2' and user_id='".$_SESSION['user_id']."' and a.program_code=b.speaker_id") or die(mysql_error());
				
					while($speaker=mysql_fetch_array($checkadded))
					{
					?>
					<li>
						<a href="<?php echo bloginfo('siteurl'); ?>/details?id=<?php echo $speaker['speaker_id']; ?>&type=speakers">
							<h2 style="font-size:18px;"><?php echo $speaker['name'];?></h2>
							<h2 style="font-size:14px;"><?php echo $speaker['company']." / ".$speaker['title']; ?></h2>
						</a>
                        <a href="<?php echo bloginfo('siteurl'); ?>/add/?type=Speakers&id=<?php echo $speaker['speaker_id'];?>&delete=true"  data-iconpos="left">Delete</a>
					</li>
                 
                    
				<?php
					}
				}
				elseif(isset($_GET['type']) && $_GET['type'] == "Schedule")
				{
					$checkadded=mysql_query("select b.* from user_adds a, events b where a.program_type='1' and user_id='".$_SESSION['user_id']."' and a.program_code=b.event_id") or die(mysql_error());
					
					while($schedule=mysql_fetch_array($checkadded))
					{
				?>
                	<li>
                        <a href="<?php echo bloginfo('siteurl'); ?>/details?id=<?php echo $schedule['event_id']; ?>&type=schedule">
                            <h2 style="font-size:18px;"><?php echo $schedule['title'];?></h2>
                            <h2 style="font-size:14px;"><?php echo $schedule['from_to_time'];?></h2>
                            <h2 style="font-size:14px;"><?php echo $schedule['location'];?></h2>
                        </a>
                        
                        <a href="<?php echo bloginfo('siteurl'); ?>/add/?type=Schedule&id=<?php echo $schedule['event_id'];?>&delete=true" data-iconpos="left">Delete</a>
                    </li>
               
                   
                <?php
					}
				}
				elseif(isset($_GET['type']) && $_GET['type'] == "Exhibitor")
				{
					$checkadded=mysql_query("select b.* from user_adds a, exhibitor b where a.program_type='3' and user_id='".$_SESSION['user_id']."' and a.program_code=b.id") or die(mysql_error());
					
					while($exhibitor=mysql_fetch_array($checkadded))
					{
				?>
                	<li>
                        <a href="<?php echo bloginfo('siteurl'); ?>/details?id=<?php echo $exhibitor['id']; ?>&type=exhibitor">
                         <h2 style="font-size:14px;"><?php echo $exhibitor['ex_name'];?></h2>
                            <h2 style="font-size:18px;"><?php echo $exhibitor['booth_no'];?></h2>
                            <h2 style="font-size:14px;"><?php echo $exhibitor['title'];?></h2>
                        </a>
                         <a href="<?php echo bloginfo('siteurl'); ?>/add/?type=Exhibitor&id=<?php echo $exhibitor['id'];?>&delete=true"  data-iconpos="left">Delete</a>
                    </li>
                 
                    
                <?php
					}
				}
				elseif(isset($_GET['type']) && $_GET['type'] == "Sponsors")
				{
					$checkadded=mysql_query("select b.* from user_adds a, sponsors b where a.program_type=4 and user_id='".$_SESSION['user_id']."' and a.program_code=b.sp_id") or die(mysql_error());
				
					while($sponsor=mysql_fetch_array($checkadded))
					{
					?>
					<li>
						<a href="<?php echo bloginfo('siteurl'); ?>/details?id=<?php echo $sponsor['sp_id']; ?>&type=sponsors">
							<h2 style="font-size:18px;"><?php echo $sponsor['cmp_name'];?></h2>
							<h2 style="font-size:14px;"><?php echo $sponsor['booth_no']." / ".$sponsor['url']; ?></h2>
						</a>
                        <a href="<?php echo bloginfo('siteurl'); ?>/add/?type=Sponsors&id=<?php echo $sponsor['sp_id'];?>&delete=true"  data-iconpos="left">Delete</a>
					</li>
                   
                     
                    <?php
					}
				}
			}
			else
			{
			?>
            	<form name="login" method="post" data-ajax="false">
                <ul data-role="listview" data-inset="true" data-theme="c">
                    <li data-role="list-divider">Login</li>
                    	<li>
                        	<label for="name">Username :</label>
                        	<input type="text" name="username" id="username" value=""  />
                    	</li>
                    	<li>
                        	<label for="name">Password :</label>
                        	<input type="password" name="password" id="password" value=""  />
                    	</li>
                    	<li><input type="submit" name="submit" data-theme="b" value="Login" /></li>
                    	<li><input type="submit" name="register" data-theme="b" value="Register" /></li>
                    	<li><input type="submit" name="cancel" data-theme="b" value="Cancel" /></li>
                        <li><?php echo $msg; ?></li>
                    </li>
                </ul>
                </form>
            <?php
			}
			?>
            </ul>
            <?php 
			if(isset($_GET['type']) && $_GET['type'] == "Speakers")
			{
			?>
             <p><a href="<?php echo $_SERVER['HTTP_REFERER']; ?>" data-direction="reverse" data-role="button" data-theme="b" style="margin-left: 0.5em; margin-right: 0.5em;">Back</a></p>
             <?php
			}else if(isset($_GET['type']) && $_GET['type'] == "Schedule")
			{
				?>
             <p><a href="<?php echo bloginfo('siteurl'); ?>/schedule" data-direction="reverse" data-role="button" data-theme="b" style="margin-left: 0.5em; margin-right: 0.5em;">Back</a></p>
             <?php
			}else if(isset($_GET['type']) && $_GET['type'] == "Exhibitor")
			{
				?>
             <p><a href="<?php echo bloginfo('siteurl'); ?>/exhibitor" data-direction="reverse" data-role="button" data-theme="b" style="margin-left: 0.5em; margin-right: 0.5em;">Back</a></p>
             <?php
			}else if(isset($_GET['type']) && $_GET['type'] == "Sponsors")
			{
				?>
             <p><a href="<?php echo bloginfo('siteurl'); ?>/sponsors" data-direction="reverse" data-role="button" data-theme="b" style="margin-left: 0.5em; margin-right: 0.5em;">Back</a></p>
             <?php
			}
			 ?>
            
            <p>
            <?php
			if(isset($_SESSION['user_id']) && $_SESSION['user_id'] != "")
			{
			?>
			<a href="<?php echo bloginfo('siteurl'); ?>/logout" data-role="button" data-theme="b" style="margin-left: 0.5em; margin-right: 0.5em;">Logout</a>
			<?php
			}
			?>
           </p>
        </div>
            
	</div>