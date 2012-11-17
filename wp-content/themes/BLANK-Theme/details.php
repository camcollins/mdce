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
		$checkalreadyexist=mysql_query("select * from users where username='".$_POST['username']."'");
		if(mysql_num_rows($checkalreadyexist) == 0)
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
			$msg="Username already Exist Please Try Another one.";
		}
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

if($_GET['type'] == "schedule")
{
	$id="1";
}
if($_GET['type'] == "speakers")
{
	$id="2";
}
if($_GET['type'] == "exhibitor")
{
	$id="3";
}
if($_GET['type'] == "sponsors")
{
	$id="4";
}
		
get_header();
?>
<div data-role="header" data-theme="a">
    <h1 style="text-transform:capitalize;"><?php echo $_GET['type']; ?></h1>
    <a href="<?php echo bloginfo('siteurl'); ?>" data-icon="home" data-iconpos="notext" data-direction="reverse">Home</a>
	<a href="#" data-icon="search" data-iconpos="notext" data-rel="dialog" data-transition="fade">Search</a>
</div><!-- /header -->

<div data-role="content" data-theme="a">
	<?php
	if(isset($_GET['like'] ) && $_GET['like'] == 'yes')
	{
		if(isset($_SESSION['user_id']) && $_SESSION['user_id'] != "")
		{
			$checkexist=mysql_query("select * from like_cnt where user_id='".$_SESSION['user_id']."' and event_id='".$_GET['id']."' and program_type='".$id."'" );
	
			if(mysql_num_rows($checkexist) >= 1)
			{
				echo '<div id="errormsg" style="top: 150px; width: 70%; padding: 4px; background-color: #FFF; color: #000; border-radius: 5px 5px 5px 5px; border-width: 0px; position: absolute; z-index: 100; left: 15%; display: block;">You have Already Liked. <div align="right"><a href="javascript: closediv(\'errormsg\');">[Close]</a></div></div>';
			echo '<div id="fadout" style="width: 100%; border: 0px none; padding: 0px; margin: 0px; background: none repeat scroll 0% 0% rgb(102, 102, 102); opacity: 0.4; z-index: 99; position: fixed; top: 0px; left: 0px; height: 768px; display: block;"></div>';
			}
			else
			{
				$insert=mysql_query("INSERT INTO  like_cnt (user_id, program_type, event_id) VALUES ('".$_SESSION['user_id']."', '".$id."', '".$_GET['id']."')");
//				header("Location: ".$_SERVER['HTTP_REFERER']);
				/*echo "<script>window.location='".$_SERVER['HTTP_REFERER']."';</script>";*/
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
        </ul>
       </form>
		<?php
			exit();
		}
	}
	
	if($_GET['type'] == "schedule")
	{
    $qry=mysql_query("select * from events where event_id=".$_GET['id']);
	while($rs=mysql_fetch_array($qry))
	{
     ?>
        <div style="font-size:36px; text-align:center; margin-top: 20px;">
        	<?php echo $rs['title']; ?>
        </div>
        <div style="height: 20px;"></div>
        <div style="font-weight:bold; float: left; margin-left: 10%;"><?php echo $rs['from_to_time']; ?></div>
        <div style="font-weight:bold; float:right; margin-right: 10%;"><?php echo $rs['location']; ?></div>
        <div style="clear: both;"></div>

		<div style="float:left; margin-left:10%; margin-top:40px;">
        		<img src="<?php echo bloginfo('template_directory'); ?>/images/<?php 
				if($rs['image']==".")
				{
					echo "noimage.jpg"; 					
				} 
				else 
				{ 
					echo $rs['image'];  
				}
				?>"height="150" width="150" />
        </div>
        
		<div style="float:left; margin-top:35px; margin-left:4%;">
            <a data-inline="true" data-mini="true" data-iconpos="right" data-icon="delete" data-role="button" href="add?type=Schedule&add=save&program_code=<?php echo $_GET['id']; ?>" data-corners="true" data-shadow="true" data-iconshadow="true" data-wrapperels="span" data-theme="c" class="ui-btn ui-btn-inline ui-shadow ui-btn-corner-all ui-mini ui-btn-icon-right ui-btn-up-c">
                <span class="ui-btn-inner ui-btn-corner-all">
                    <span class="ui-btn-text">Add</span>
                    <span class="ui-icon ui-icon-arrow-r ui-icon-shadow">&nbsp;</span>
                </span>
            </a>
            <br>
            <?php if($rs["sh_id"]>=1)
			{
			?>
            <a data-inline="true" data-mini="true" data-iconpos="right" data-icon="delete" data-role="button" href="<?php echo bloginfo('siteurl'); ?>/details?id=<?php echo $rs['sh_id']; ?>&type=speakers" data-corners="true" data-shadow="true" data-iconshadow="true" data-wrapperels="span" data-theme="c" class="ui-btn ui-btn-inline ui-shadow ui-btn-corner-all ui-mini ui-btn-icon-right ui-btn-up-c">
                <span class="ui-btn-inner ui-btn-corner-all">
                    <span class="ui-btn-text">Bio</span>
                    <span class="ui-icon ui-icon-arrow-r ui-icon-shadow">&nbsp;</span>
                </span>
            </a>
            <?php 
			}
			?>
            <br>
			 <a href="<?php echo bloginfo('siteurl'); ?>/social?id=<?php echo $rs['event_id']; ?>" data-mini="true" data-role="button" data-icon="arrow-r" data-rel="dialog" data-transition="slideup" data-inline="true" data-iconpos="right" data-theme="c">Share</a>
            <br>
            <?php
			if($_GET['type'] == "schedule")
			{
				$type="1";
			}
			  $sqry=mysql_query("SELECT count(event_id) as cnt FROM `like_cnt` where program_type='".$type."' and event_id=".$_GET['id']);
			  $res=mysql_fetch_array($sqry);
			  if($res['cnt']==1)
			  {
				  //like_cnt.php?type=Exhibitor&likes=<?php echo $_GET['id'];
				 //like.php?type=exhibitor&id=<?php echo $_GET['id'];?>
			<a href="<?php echo bloginfo('siteurl'); ?>/details?id=<?php echo $_GET['id'];?>&type=schedule&like=yes" data-mini="true" data-role="button" data-icon="star" data-iconpos="right"  data-theme="b">
				Like
			   <span class="ui-li-count">(<?php echo $res['cnt'];?>)</span>
			</a>
		   <?php
			  }else{
		   ?>
		   <a href="<?php echo bloginfo('siteurl'); ?>/details/?id=<?php echo $_GET['id'];?>&type=schedule&like=yes" data-mini="true" data-role="button" data-icon="star" data-iconpos="right" data-theme="c">
			Like
				 <span class="ui-li-count">(<?php  echo $res['cnt'];?>)</span>
			</a>
		   <?php } ?>
        </div>
        <div style="clear:both;"></div>
        <div style="border:1px solid #FFF; width:80%; margin-left: 9%; margin-top: 30px; border-radius: 10px 10px 10px 10px; padding:5px 5px 5px 5px;">
        	<?php 
			if($rs['desc']=="")
			{ echo "No Description";}
			else
			{ echo $rs['desc']; } ?>
        </div>
        
        <div style="margin-top:30px;"></div>
        
    	<p><a href="<?php echo bloginfo('siteurl'); ?>/schedule" data-direction="reverse" data-role="button" data-theme="b" style="margin-left: 0.5em; margin-right: 0.5em;" rel="external">Back</a></p>
         <p>
            <?php
			if(isset($_SESSION['user_id']) && $_SESSION['user_id'] != "")
			{
			?>
			<a href="<?php echo bloginfo('siteurl'); ?>/logout" data-role="button" data-theme="b" style="margin-left: 0.5em; margin-right: 0.5em;" rel="external">Logout</a>
			<?php
			}
			?>
           </p>
            
    <?php 
     }
	}
	else if($_GET['type'] == "speakers")
	{
    $qry=mysql_query("select * from speakers where speaker_id=".$_GET['id']);
	while($rs=mysql_fetch_array($qry))
	{
?>
		<div style="font-size:36px; text-align:center; margin-top: 20px;">
        	<?php echo $rs['name']; ?>
        </div>
        
		<div style="float:left; margin-left:10%; margin-top:40px;">
        	<img src="<?php echo bloginfo('template_directory'); ?>/images/<?php	
				if($rs['image']==".")
				{
					echo "noimage.jpg"; 
				}else
				{
					echo $rs['image']; 
				}?>" height="180" width="180" border="0" />
        </div>
        
		<div style="float:left; margin-top:50px; margin-left:5%;">
            <a data-inline="true" data-mini="true" data-iconpos="right" data-icon="delete" data-role="button" href="add?add=save&program_code=<?php echo $_GET['id'];?>&type=Speakers" data-corners="true" data-shadow="true" data-iconshadow="true" data-wrapperels="span" data-theme="c" class="ui-btn ui-btn-inline ui-shadow ui-btn-corner-all ui-mini ui-btn-icon-right ui-btn-up-c">
                <span class="ui-btn-inner ui-btn-corner-all">
                    <span class="ui-btn-text">Add</span>
                    <span class="ui-icon ui-icon-arrow-r ui-icon-shadow">&nbsp;</span>
                </span>
            </a>
            <br><br>
            <a href="<?php echo bloginfo('siteurl'); ?>/social?id=<?php echo $rs['speaker_id']; ?>" data-mini="true" data-role="button" data-icon="arrow-r" data-rel="dialog" data-transition="slideup" data-inline="true" data-iconpos="right" data-theme="c">Share</a>
        </div>
        <div style="clear:both;"></div>
        <div style="border:1px solid #FFF; width:80%; margin-left: 9%; margin-top: 30px; border-radius: 10px 10px 10px 10px; padding:5px 5px 5px 5px;">
        	<?php echo $rs['name']; ?>
            <br>
            <?php echo $rs['title']." / ".$rs['company']; ?>
            <br>
            Bio : <?php echo $rs['bio']; ?>
        </div>
        
        <div style="margin-top:30px;"></div>
        
    	<p><a href="<?php echo bloginfo('siteurl'); ?>/speakers" data-direction="reverse" data-role="button" data-theme="b" style="margin-left: 0.5em; margin-right: 0.5em;" rel="external">Back</a></p>
         <p>
            <?php
			if(isset($_SESSION['user_id']) && $_SESSION['user_id'] != "")
			{
			?>
			<a href="<?php echo bloginfo('siteurl'); ?>/logout" data-role="button" data-theme="b" rel="external">Logout</a>
			<?php
			}
			?>
           </p>
            
	<?php
	}
	}
	else if($_GET['type'] == "exhibitor")
	{
		$qry=mysql_query("select * from exhibitor where id=".$_GET['id']);
		while($rs=mysql_fetch_array($qry))
		{
			?>
			<div style="font-size:36px; text-align:center; margin-top: 20px;">
				<?php echo $rs['ex_name']; ?>
			</div>
			
			<div style="float:left; margin-left:10%; margin-top:40px;">
             <?php 	if($rs['image']!="") {	?>
				<img src="<?php echo bloginfo('template_directory'); ?>/images/<?php 
				if($rs['image']==".")
				{
					echo "noimage.jpg"; 
				}else
				{
					echo $rs['image']; 
				}?>" height="130" width="130" />
                <?php } ?>
			</div>
			
			<div style="float:left; margin-top:50px; margin-left:5%;">
			<?php
			 
			   $sqry=mysql_query("SELECT count(event_id) as cnt FROM `like_cnt` where program_type='".$id."' and event_id=".$_GET['id']);
				  $res=mysql_fetch_array($sqry);
				  if($res['cnt']==1)
				  {
				  ?>
				   <a href="<?php echo bloginfo('siteurl'); ?>/details?id=<?php echo $_GET['id'];?>&type=exhibitor&like=yes" data-role="button" data-icon="star" data-iconpos="right"  data-theme="b">
			  
					Like
				   <span class="ui-li-count">(<?php echo $res['cnt'];?>)</span>
				</a>
			   <?php
				  }else{
			   ?>
			   <a href="<?php echo bloginfo('siteurl'); ?>/details?id=<?php echo $_GET['id'];?>&type=exhibitor&like=yes" data-role="button" data-icon="star" data-iconpos="right" data-theme="c">
					Like
					 <span class="ui-li-count">(<?php  echo $res['cnt'];?>)</span>
				</a>
			   <?php } ?>
			   <a href="<?php echo bloginfo('siteurl'); ?>/add?add=save&program_code=<?php echo $_GET['id'];?>&type=Exhibitor" data-role="button" data-icon="arrow-r" data-iconpos="right"  data-theme="c">
					Visit
				</a>
			   
			 
			</div>
	   
			<div style="clear:both;"></div>
			<div style="border:1px solid #FFF; width:80%; margin-left: 9%; margin-top: 30px; border-radius: 10px 10px 10px 10px; padding:5px 5px 5px 5px;">
				
				Booth no:<?php echo $rs['booth_no'];?>
				<br>
				<?php echo $rs['title']; ?>
				<br>
				Desc : <?php echo $rs['description']; ?>
			</div>
            <div style="margin-top:30px;"></div>
            <p><a href="<?php echo bloginfo('siteurl'); ?>/exhibitor" data-direction="reverse" data-role="button" data-theme="b" style="margin-left: 0.5em; margin-right: 0.5em;" rel="external">Back</a></p>
           <p>
            <?php
			if(isset($_SESSION['user_id']) && $_SESSION['user_id'] != "")
			{
			?>
			<a href="<?php echo bloginfo('siteurl'); ?>/logout" data-role="button" data-theme="b" rel="external">Logout</a>
			<?php
			}
			?>
           </p>
              
		<?php
		}
	}
	else if($_GET['type'] == "sponsors")
	{
		$qry=mysql_query("select * from sponsors where sp_id=".$_GET['id']);
		while($rs=mysql_fetch_array($qry))
		{
		?>
        	<div style="font-size:36px; text-align:center; margin-top: 20px;">
				<?php echo $rs['cmp_name']; ?>
            </div>
            
            <div style="float:left; margin-left:10%; margin-top:40px;">
            <?php 	if($rs['image']!="") {	?>
                <img src="<?php echo bloginfo('template_directory'); ?>/images/sponsors/<?php
				if($rs['image']==".")
				{
					echo "noimage.jpg"; 
				}else
				{
					 echo $rs['image']; 
				}?>" height="130" width="130" />
                <?php } ?>
            </div>
            
            <div style="float:left; margin-top:50px; margin-left:5%;">
            <?php

               $sqry=mysql_query("SELECT count(event_id) as cnt FROM `like_cnt` where program_type=4 and event_id=".$_GET['id']);
                  $res=mysql_fetch_array($sqry);
                  if($res['cnt']==1)
                  {
                      //like_cnt.php?type=Exhibitor&likes=<?php echo $_GET['id'];
                     //like.php?type=exhibitor&id=<?php echo $_GET['id'];?>
               <a href="<?php echo bloginfo('siteurl'); ?>/details?id=<?php echo $_GET['id'];?>&type=sponsors&like=yes" data-role="button" data-icon="star" data-iconpos="right" data-theme="b">
                    Like
                   <span class="ui-li-count">(<?php echo $res['cnt'];?>)</span>
                </a>
               <?php
                  }else{
               ?>
               <a href="<?php echo bloginfo('siteurl'); ?>/details?id=<?php echo $_GET['id'];?>&type=sponsors&like=yes" data-role="button" data-icon="star" data-iconpos="right" data-theme="c">
                    Like
                     <span class="ui-li-count">(<?php  echo $res['cnt'];?>)</span>
                </a>
               <?php } ?>
               <a href="<?php echo bloginfo('siteurl'); ?>/add?add=save&type=Sponsors&program_code=<?php echo $_GET['id']; ?>" data-role="button" data-icon="arrow-r" data-iconpos="right"  data-theme="c">
                    Visit
                </a>
               
             
            </div>
       
            <div style="clear:both;"></div>
            <div style="border:1px solid #FFF; width:80%; margin-left: 9%; margin-top: 30px; border-radius: 10px 10px 10px 10px; padding:5px 5px 5px 5px;">
                <?php echo $rs['cmp_name']; ?>
                <br>
                Booth no:<?php echo $rs['booth_no'];?>
                <br>
                <?php echo $rs['url']; ?>
                <br>
                Desc : <?php echo $rs['description']; ?>
            </div>
            <div style="margin-top:30px;"></div>
            <p><a href="<?php echo bloginfo('siteurl'); ?>/sponsors" data-direction="reverse" data-role="button" data-theme="b" style="margin-left: 0.5em; margin-right: 0.5em;">Back</a></p>
             <p>
            <?php
			if(isset($_SESSION['user_id']) && $_SESSION['user_id'] != "")
			{
			?>
			<a href="<?php echo bloginfo('siteurl'); ?>/logout" data-role="button" data-theme="b" rel="external" style="margin-left: 0.5em; margin-right: 0.5em;">Logout</a>
			<?php
			}
			?>
           </p>
            
        <?php
		}
	}
	?>
</div><!-- /content -->
<?php get_footer(); ?>