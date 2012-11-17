<?php
/*
Plugin Name: Enhance Admin Bar
Version: 1.0
Plugin URI: http://www.priteshgupta.com/plugins/admin-bar/
Description: This Plugin Truly Enhances WordPress Admin Bar By Adding Many Useful Options For It, Like, Bit.ly Shortlink, Custom Menu in Admin Bar and a lot more. 
Author: Pritesh Gupta
Author URI: http://www.priteshgupta.com/
*/
        add_action('activate_enhance_admin_bar.php', 'enhance_admin_bar');
		function enhance_admin_bar(){
			add_option("enhance_admin_bar", "testwp");
			add_option("enhance_admin_bar2", "R_874b2bc04c698154b3e2485817ad7bbd");
			add_option("enhance_admin_bar_display", "no");
			add_option("enhance_admin_bar_display2", "no");
			add_option("enhance_admin_bar_display3", "no");
			add_option("enhance_admin_bar_display4", "no");
			add_option("enhance_admin_bar_display5", "no");
			add_option("enhance_admin_bar_display6", "no");
			add_option("enhance_admin_bar_display7", "no");
			add_option("enhance_admin_bar_display8", "no");
			add_option("enhance_admin_bar_display9", "no");
			add_option("enhance_admin_bar_display10", "no");
			add_option("enhance_admin_bar_display11", "no");
			add_option("enhance_admin_bar_display12", "no");
			add_option("enhance_admin_bar_display13", "no");
			add_option("enhance_admin_bar_display14", "no");
		}
	add_action('wp_head', 'enhance_admin_bar_session');
	function enhance_admin_bar_session(){$_SESSION['enhance_admin_bar_nri'] = 0;}
	
    add_action('admin_menu', 'enhance_admin_bar_menu');
    function enhance_admin_bar_menu() {
        if (function_exists('add_options_page')) {
            add_options_page('Enhance Admin Bar', 'Enhance Admin Bar', 9, 'enhance_admin_bar', 'enhance_admin_bar_display');
        }
    }
    function enhance_admin_bar_display(){
		
        if($_POST['Submit']){
			$enhance_admin_bar = $_POST['enhance_admin_bar'];
			$enhance_admin_bar2 = $_POST['enhance_admin_bar2'];
			update_option("enhance_admin_bar", $enhance_admin_bar);
			update_option("enhance_admin_bar2", $enhance_admin_bar2);
			update_option("enhance_admin_bar_display", $_POST['enhance_admin_bar_display']);
			update_option("enhance_admin_bar_display2", $_POST['enhance_admin_bar_display2']);
			update_option("enhance_admin_bar_display3", $_POST['enhance_admin_bar_display3']);
			update_option("enhance_admin_bar_display4", $_POST['enhance_admin_bar_display4']);
			update_option("enhance_admin_bar_display5", $_POST['enhance_admin_bar_display5']);
			update_option("enhance_admin_bar_display6", $_POST['enhance_admin_bar_display6']);
			update_option("enhance_admin_bar_display7", $_POST['enhance_admin_bar_display7']);
			update_option("enhance_admin_bar_display8", $_POST['enhance_admin_bar_display8']);
			update_option("enhance_admin_bar_display9", $_POST['enhance_admin_bar_display9']);
			update_option("enhance_admin_bar_display10", $_POST['enhance_admin_bar_display10']);
			update_option("enhance_admin_bar_display11", $_POST['enhance_admin_bar_display11']);
			update_option("enhance_admin_bar_display12", $_POST['enhance_admin_bar_display12']);
			update_option("enhance_admin_bar_display13", $_POST['enhance_admin_bar_display13']);
			update_option("enhance_admin_bar_display14", $_POST['enhance_admin_bar_display14']);
			
			echo '<div id="message" class="updated fade"><p>Update Successful!</p></div>';
		}
		$output = '<form method="post" action="'.$_SERVER['REQUEST_URI'].'">';
		?>
<style type="text/css">
.author {
	text-decoration:none;
}
table {
	width:60%;
	border-collapse:collapse;
	table-layout:auto;
	vertical-align:top;
	margin-bottom:15px;
	border:1px solid #CCCCCC;
}
table thead th {
	color:#FFFFFF;
	background-color:#666666;
	border:1px solid #CCCCCC;
	border-collapse:collapse;
	text-align:center;
	table-layout:auto;
	vertical-align:middle;
}
table tbody td {
	vertical-align:top;
	border-collapse:collapse;
	border-left:1px solid #CCCCCC;
	border-right:1px solid #CCCCCC;
}
table thead th, table tbody td {
	padding:5px;
	border-collapse:collapse;
}
table tbody tr.light {
	color:#333333;
	background-color:#F7F7F7;
}
table tbody tr.dark {
	color:#333333;
	background-color:#E8E8E8;
}
input[type=text] {
	background: #cecdcd; /* Fallback */
	background: rgba(206, 205, 205, 0.6);
	border: 2px solid #666;
	padding: 6px 5px;
	line-height: 1em;
	-webkit-box-shadow: inset -1px 1px 1px rgba(255, 255, 255, 0.65);
	-moz-box-shadow: inset -1px 1px 1px rgba(255, 255, 255, 0.65);
	box-shadow: inset -1px 1px 1px rgba(255, 255, 255, 0.65);
	-webkit-border-radius: 8px !important;
	-moz-border-radius: 8px !important;
	border-radius: 8px !important;
	margin-bottom: 10px;
	width: 300px;
}
select {
	background: #cecdcd; /* Fallback */
	background: rgba(206, 205, 205, 0.6);
	border: 2px solid #666;
	padding: 6px 5px;
	height: 2.8em !important;
	-webkit-box-shadow: inset -1px 1px 1px rgba(255, 255, 255, 0.65);
	-moz-box-shadow: inset -1px 1px 1px rgba(255, 255, 255, 0.65);
	box-shadow: inset -1px 1px 1px rgba(255, 255, 255, 0.65);
	-webkit-border-radius: 8px !important;
	-moz-border-radius: 8px !important;
	border-radius: 8px !important;
	margin-bottom: 10px;
	width: 300px;
	text-align:center;
}
</style>
<?php
		$output .= '<div class="wrap">'."\n";
		$output .= '<div id="icon-options-general" class="icon32"></div>	<h2>Enhance Admin Bar Plugin Options</h2>'."\n";
		$output .= '	by <strong><a href="http://www.priteshgupta.com" target="_blank" class="author">Pritesh Gupta</a></strong> || <strong><a href="http://www.priteshgupta.com/plugins/admin-bar" target="_blank" class="author">Visit Release Page</a></strong>'."\n";
		$output .= '	<br /> <br />'."\n";
		$output .= '	<table border="0" cellspacing="0" cellpadding="6">'."\n";
		
		$enhance_admin_bar_display = get_option('enhance_admin_bar_display',"no");
		$output .= '		<tr class="light">'."\n";
		$output .= '			<td width="75%">Hide Admin Bar?</td>'."\n";
		$output .= '			<td width="25%">';
		$output .= '				<select name="enhance_admin_bar_display">'."\n";
		$output .= '					<option value="no"';if ($enhance_admin_bar_display == 'no') $output .= 'selected="selected"';$output .= '>No</option>'."\n";
		$output .= '					<option value="yes"';if ($enhance_admin_bar_display == 'yes') $output .= 'selected="selected"';$output .= '>Yes</option>'."\n";
		$output .= '				</select>'."\n";
		$output .= '			</td>';
		$output .= '		</tr>'."\n";
		
		$enhance_admin_bar_display2 = get_option('enhance_admin_bar_display2',"no");
		$output .= '		<tr class="dark">'."\n";
		$output .= '			<td width="75%">Show Bit.ly Shortlink Options?</td>'."\n";
		$output .= '			<td width="25%">';
		$output .= '				<select name="enhance_admin_bar_display2">'."\n";
		$output .= '					<option value="no"';if ($enhance_admin_bar_display2 == 'no') $output .= 'selected="selected"';$output .= '>No</option>'."\n";
		$output .= '					<option value="yes"';if ($enhance_admin_bar_display2 == 'yes') $output .= 'selected="selected"';$output .= '>Yes</option>'."\n";
		$output .= '				</select>'."\n";
		$output .= '			</td>';
		$output .= '		</tr>'."\n";
		
		$enhance_admin_bar_display3 = get_option('enhance_admin_bar_display3',"no");
		$output .= '		<tr class="light">'."\n";
		$output .= '			<td width="75%">Show "<strong>Move To Trash</strong>" Link?</td>'."\n";
		$output .= '			<td width="25%">';
		$output .= '				<select name="enhance_admin_bar_display3">'."\n";
		$output .= '					<option value="no"';if ($enhance_admin_bar_display3 == 'no') $output .= 'selected="selected"';$output .= '>No</option>'."\n";
		$output .= '					<option value="yes"';if ($enhance_admin_bar_display3 == 'yes') $output .= 'selected="selected"';$output .= '>Yes</option>'."\n";
		$output .= '				</select>'."\n";
		$output .= '			</td>';
		$output .= '		</tr>'."\n";
		
		$enhance_admin_bar_display14 = get_option('enhance_admin_bar_display14',"no");
		$output .= '		<tr class="dark">'."\n";
		$output .= '			<td width="75%">Add Custom Menu To Admin Bar?</td>'."\n";
		$output .= '			<td width="25%">';
		$output .= '				<select name="enhance_admin_bar_display14">'."\n";
		$output .= '					<option value="no"';if ($enhance_admin_bar_display14 == 'no') $output .= 'selected="selected"';$output .= '>No</option>'."\n";
		$output .= '					<option value="yes"';if ($enhance_admin_bar_display14 == 'yes') $output .= 'selected="selected"';$output .= '>Yes</option>'."\n";
		$output .= '				</select>'."\n";
		$output .= '			</td>';
		$output .= '		</tr>'."\n";
		
		$enhance_admin_bar_display4 = get_option('enhance_admin_bar_display4',"no");
		$output .= '		<tr class="light">'."\n";
		$output .= '			<td width="75%">Show Codex Search?</td>'."\n";
		$output .= '			<td width="25%">';
		$output .= '				<select name="enhance_admin_bar_display4">'."\n";
		$output .= '					<option value="no"';if ($enhance_admin_bar_display4 == 'no') $output .= 'selected="selected"';$output .= '>No</option>'."\n";
		$output .= '					<option value="yes"';if ($enhance_admin_bar_display4 == 'yes') $output .= 'selected="selected"';$output .= '>Yes</option>'."\n";
		$output .= '				</select>'."\n";
		$output .= '			</td>';
		$output .= '		</tr>'."\n";
		
		$enhance_admin_bar_display10 = get_option('enhance_admin_bar_display10',"no");
		$output .= '		<tr class="dark">'."\n";
		$output .= '			<td width="75%">Show Media Search?</td>'."\n";
		$output .= '			<td width="25%">';
		$output .= '				<select name="enhance_admin_bar_display10">'."\n";
		$output .= '					<option value="no"';if ($enhance_admin_bar_display10 == 'no') $output .= 'selected="selected"';$output .= '>No</option>'."\n";
		$output .= '					<option value="yes"';if ($enhance_admin_bar_display10 == 'yes') $output .= 'selected="selected"';$output .= '>Yes</option>'."\n";
		$output .= '				</select>'."\n";
		$output .= '			</td>';
		$output .= '		</tr>'."\n";
		
		$enhance_admin_bar_display11 = get_option('enhance_admin_bar_display11',"no");
		$output .= '		<tr class="light">'."\n";
		$output .= '			<td width="75%">Show Plugins Search?</td>'."\n";
		$output .= '			<td width="25%">';
		$output .= '				<select name="enhance_admin_bar_display11">'."\n";
		$output .= '					<option value="no"';if ($enhance_admin_bar_display11 == 'no') $output .= 'selected="selected"';$output .= '>No</option>'."\n";
		$output .= '					<option value="yes"';if ($enhance_admin_bar_display11 == 'yes') $output .= 'selected="selected"';$output .= '>Yes</option>'."\n";
		$output .= '				</select>'."\n";
		$output .= '			</td>';
		$output .= '		</tr>'."\n";
		
		$enhance_admin_bar_display12 = get_option('enhance_admin_bar_display12',"no");
		$output .= '		<tr class="dark">'."\n";
		$output .= '			<td width="75%">Show Themes Search?</td>'."\n";
		$output .= '			<td width="25%">';
		$output .= '				<select name="enhance_admin_bar_display12">'."\n";
		$output .= '					<option value="no"';if ($enhance_admin_bar_display12 == 'no') $output .= 'selected="selected"';$output .= '>No</option>'."\n";
		$output .= '					<option value="yes"';if ($enhance_admin_bar_display12 == 'yes') $output .= 'selected="selected"';$output .= '>Yes</option>'."\n";
		$output .= '				</select>'."\n";
		$output .= '			</td>';
		$output .= '		</tr>'."\n";
		
		$enhance_admin_bar_display13 = get_option('enhance_admin_bar_display13',"no");
		$output .= '		<tr class="light">'."\n";
		$output .= '			<td width="75%">Add "<strong>Settings</strong>" Link?</td>'."\n";
		$output .= '			<td width="25%">';
		$output .= '				<select name="enhance_admin_bar_display13">'."\n";
		$output .= '					<option value="no"';if ($enhance_admin_bar_display13 == 'no') $output .= 'selected="selected"';$output .= '>No</option>'."\n";
		$output .= '					<option value="yes"';if ($enhance_admin_bar_display13 == 'yes') $output .= 'selected="selected"';$output .= '>Yes</option>'."\n";
		$output .= '				</select>'."\n";
		$output .= '			</td>';
		$output .= '		</tr>'."\n";
		
		$enhance_admin_bar_display5 = get_option('enhance_admin_bar_display5',"no");
		$output .= '		<tr class="dark">'."\n";
		$output .= '			<td width="75%">Move Admin Bar To Bottom?</td>'."\n";
		$output .= '			<td width="25%">';
		$output .= '				<select name="enhance_admin_bar_display5">'."\n";
		$output .= '					<option value="no"';if ($enhance_admin_bar_display5 == 'no') $output .= 'selected="selected"';$output .= '>No</option>'."\n";
		$output .= '					<option value="yes"';if ($enhance_admin_bar_display5 == 'yes') $output .= 'selected="selected"';$output .= '>Yes</option>'."\n";
		$output .= '				</select>'."\n";
		$output .= '			</td>';
		$output .= '		</tr>'."\n";
		
		$enhance_admin_bar_display6 = get_option('enhance_admin_bar_display6',"no");
		$output .= '		<tr class="light">'."\n";
		$output .= '			<td width="75%">Remove "<strong>Comments</strong>" Link?</td>'."\n";
		$output .= '			<td width="25%">';
		$output .= '				<select name="enhance_admin_bar_display6">'."\n";
		$output .= '					<option value="no"';if ($enhance_admin_bar_display6 == 'no') $output .= 'selected="selected"';$output .= '>No</option>'."\n";
		$output .= '					<option value="yes"';if ($enhance_admin_bar_display6 == 'yes') $output .= 'selected="selected"';$output .= '>Yes</option>'."\n";
		$output .= '				</select>'."\n";
		$output .= '			</td>';
		$output .= '		</tr>'."\n";
		
		$enhance_admin_bar_display7 = get_option('enhance_admin_bar_display7',"no");
		$output .= '		<tr class="dark">'."\n";
		$output .= '			<td width="75%">Remove "<strong>Updates</strong>" Link?</td>'."\n";
		$output .= '			<td width="25%">';
		$output .= '				<select name="enhance_admin_bar_display7">'."\n";
		$output .= '					<option value="no"';if ($enhance_admin_bar_display7 == 'no') $output .= 'selected="selected"';$output .= '>No</option>'."\n";
		$output .= '					<option value="yes"';if ($enhance_admin_bar_display7 == 'yes') $output .= 'selected="selected"';$output .= '>Yes</option>'."\n";
		$output .= '				</select>'."\n";
		$output .= '			</td>';
		$output .= '		</tr>'."\n";
		
		$enhance_admin_bar_display8 = get_option('enhance_admin_bar_display8',"no");
		$output .= '		<tr class="light">'."\n";
		$output .= '			<td width="75%">Remove Default "<strong>Shortlink</strong>" Link?</td>'."\n";
		$output .= '			<td width="25%">';
		$output .= '				<select name="enhance_admin_bar_display8">'."\n";
		$output .= '					<option value="no"';if ($enhance_admin_bar_display8 == 'no') $output .= 'selected="selected"';$output .= '>No</option>'."\n";
		$output .= '					<option value="yes"';if ($enhance_admin_bar_display8 == 'yes') $output .= 'selected="selected"';$output .= '>Yes</option>'."\n";
		$output .= '				</select>'."\n";
		$output .= '			</td>';
		$output .= '		</tr>'."\n";
		
		$enhance_admin_bar_display9 = get_option('enhance_admin_bar_display9',"no");
		$output .= '		<tr class="dark">'."\n";
		$output .= '			<td width="75%">Remove Search?</td>'."\n";
		$output .= '			<td width="25%">';
		$output .= '				<select name="enhance_admin_bar_display9">'."\n";
		$output .= '					<option value="no"';if ($enhance_admin_bar_display9 == 'no') $output .= 'selected="selected"';$output .= '>No</option>'."\n";
		$output .= '					<option value="yes"';if ($enhance_admin_bar_display9 == 'yes') $output .= 'selected="selected"';$output .= '>Yes</option>'."\n";
		$output .= '				</select>'."\n";
		$output .= '			</td>';
		$output .= '		</tr>'."\n";
		
		$output .= '		<tr class="light">'."\n";
		$output .= '			<td width="75%">Enter Your Bit.ly Username: </td>'."\n";
		$output .= '			<td width="25%"><input type="text" name="enhance_admin_bar" value="'.get_option('enhance_admin_bar', "testwp").'" /></td>';
		$output .= '		</tr>'."\n";

		$output .= '		<tr class="dark">'."\n";
		$output .= '			<td width="75%">Enter Your Bit.ly API Key : </td>'."\n";
		$output .= '			<td width="25%"><input type="text" name="enhance_admin_bar2" value="'.get_option('enhance_admin_bar2', "R_874b2bc04c698154b3e2485817ad7bbd").'" /></td>';
		$output .= '		</tr>'."\n";

		$output .= '	</table>'."\n";
		$output .= "\n";
		$output .= '				<input type="submit" name="Submit" class="button-primary" value="Update Options &raquo;" />&nbsp;&nbsp;'."\n";
		$output .= '</form>';
		$output .= '</div>'."\n";
        echo $output;
    }

	if (get_option("enhance_admin_bar_display") == 'yes'){ include ("remove-admin-menu.php");}
	if (get_option("enhance_admin_bar_display2") == 'yes'){ include ("bitly-shortlink.php");}
	if (get_option("enhance_admin_bar_display3") == 'yes'){ include ("move-to-trash.php");}
	if (get_option("enhance_admin_bar_display4") == 'yes'){ include ("search-codex.php");}
	if (get_option("enhance_admin_bar_display5") == 'yes'){ include ("move-admin-bar.php");}
	if (get_option("enhance_admin_bar_display6") == 'yes'){ include ("remove-comments.php");}
	if (get_option("enhance_admin_bar_display7") == 'yes'){ include ("remove-updates.php");}
	if (get_option("enhance_admin_bar_display8") == 'yes'){ include ("remove-shortlink.php");}
	if (get_option("enhance_admin_bar_display9") == 'yes'){ include ("remove-search.php");}
	if (get_option("enhance_admin_bar_display10") == 'yes'){ include ("search-media.php");}
	if (get_option("enhance_admin_bar_display11") == 'yes'){ include ("search-plugins.php");}
	if (get_option("enhance_admin_bar_display12") == 'yes'){ include ("search-themes.php");}
	if (get_option("enhance_admin_bar_display13") == 'yes'){ include ("settings.php");}
	if (get_option("enhance_admin_bar_display14") == 'yes'){ include ("add-custom-menu.php");}
	
