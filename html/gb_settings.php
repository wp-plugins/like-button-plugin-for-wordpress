<?php // Do not delete these lines
	if (!empty($_SERVER['SCRIPT_FILENAME']) && basename(__file__) == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');
?>
<?php
/*
+----------------------------------------------------------------+
+	Like-Button-Plugin-For-Wordpress [v4.2]
+	by Stefan Natter (http://www.gangxtaboii.com and http://www.gb-world.net)
+   required for Like-Button-Plugin-For-Wordpress and WordPress 2.7.x or higher
+----------------------------------------------------------------+
*/

class gxtb_fb_lB_mBSClass {

########################################################################################################
											## SETTINGS-BOX  ##

public static  function gxtb_contentbox_1() {
	$gxtb_fb_lB_settings = get_option('gxtb_fb_lB_settings');
	$gxtb_fb_lB_generator = get_option('gxtb_fb_lB_generator');
	?>
<table class="form-table" style="width:70%;" border="0" id="gb-table">

		        <tbody>
           
                    <tr>
                    	<td width="20%" rowspan="2" valign="middle" class="gb-table-header"><strong><?php _e('Activate the Like-Button', 'gb_like_button') ?></strong></td>
                        <td width="80%" valign="bottom">
                        	<input type="checkbox" class="checkbox" name="gxtb_fb_lB_activate" 
							<?php 
							
							global $gxtb_fb_like_button_active;
							
							if ($gxtb_fb_lB_settings['activate']) {
								echo("checked");
								$gxtb_fb_like_button_active = "on";
							} else {
								$gxtb_fb_like_button_active = "off";
							} ?> /> 
                            <img src="<?php echo gxtb_fb_lB_PLUGIN_FOLDER; ?>images/rot17a.gif"  onmouseover="tooltip.show('<?php _e('Activate this checkbox if you want that your Like-Button appears on your blog.', 'gb_like_button'); ?>');" onmouseout="tooltip.hide();">
                         </td>
                    </tr>
                    <tr>
                        <td class="gb-table-tipp"><small><?php _e('Activate this option if you want to activate the Like-Button for your Blog', 'gb_like_button') ?></small></td>
                    </tr>
                    
					<!--<tr><td colspan="2"><HR SIZE=1></td></tr>-->

                   <tr>
                    	<td width="20%" rowspan="2" valign="top" class="gb-table-header"><strong><?php _e('Activate XFBML (JavaScript SDK)', 'gb_like_button') ?></strong></td>
                        <td width="80%" valign="bottom">
                        	<input type="checkbox" class="checkbox" name="gxtb_fb_lB_jdk" id="gxtb_fb_lB_jdk" onchange="appID();" <?php if ($gxtb_fb_lB_settings['JDK']) {echo("checked"); } ?> /> 
                             <img src="<?php echo gxtb_fb_lB_PLUGIN_FOLDER; ?>images/rot17a.gif"  onmouseover="tooltip.show('<?php _e('For some additional functions of the Like-Button you need this Java-Enviroment. Read more at the FAQ.', 'gb_like_button'); ?>');" onmouseout="tooltip.hide();">
                         </td>
                    </tr>
                    <tr>
                        <td class="gb-table-tipp">
							<small>
								<?php _e('Activate this option if you want to enable all the FB-Like-Button-Functions which are available.', 'gb_like_button') ?><br />
								<?php _e('<b>Notice:</b> You must have a valid AppID if you want to use XFBML (JavaScript SDK).', 'gb_like_button') ?><br />
                                <?php _e('<b>Important:</b> If you do not activate the XFBML your Like-Button will be inside of a iFrame (see FAQ).', 'gb_like_button') ?>
							</small>
						</td>
                    </tr>
					
					<!--<tr><td colspan="2"><HR SIZE=1></td></tr>-->

                    <tr>
                    	<td width="20%" rowspan="2" valign="middle" class="gb-table-header"><strong><?php _e('Like-Button-Position', 'gb_like_button') ?></strong></td>
                        <td width="80%" valign="middle">
						<input type="checkbox" class="checkbox" name="gxtb_fb_lB_position_before" <?php if ($gxtb_fb_lB_settings['position_before']) echo("checked"); ?>  /> <?php _e('Before the Content', 'gb_like_button')?><br />
						<input type="checkbox" class="checkbox" name="gxtb_fb_lB_position_after" <?php if ($gxtb_fb_lB_settings['position_after']) echo("checked"); ?>  /> <?php _e('After the Content', 'gb_like_button')?><br />
                         </td>
                    </tr>
                    <tr>
                        <td class="gb-table-tipp"><small><?php _e('Choose the position of your Like-Button.', 'gb_like_button') ?></small></td>
                    </tr>
					
					<!--<tr><td colspan="2"><HR SIZE=1></td></tr>-->
					
					<tr>
                    	<td width="20%" rowspan="2" valign="middle" class="gb-table-header"><strong><?php _e('Add the Like-Button in the Footer', 'gb_like_button') ?></strong> <img src="<?php echo gxtb_fb_lB_PLUGIN_FOLDER; ?>images/rot17a.gif"  onmouseover="tooltip.show('<?php _e('This may not work with all themes. Report any bugs with your themes in our forum or bugtracker please. thanks.', 'gb_like_button'); ?>');" onmouseout="tooltip.hide();"></td>
                        <td width="80%" valign="bottom">
                         <input type="checkbox" class="checkbox" name="gxtb_fb_lB_addfooter_activate" <?php if ($gxtb_fb_lB_settings['addfooter_activate']) echo("checked"); ?>  />
                             <select name="gxtb_fb_lB_addfooter">
                                  <option <?php if($gxtb_fb_lB_settings['addfooter'] == __('Before the Footer', 'gb_like_button')) echo "selected"; ?> ><?php _e('Before the Footer', 'gb_like_button') ?></option>
                                  <option <?php if($gxtb_fb_lB_settings['addfooter'] == __('After the Footer', 'gb_like_button')) echo "selected"; ?> ><?php _e('After the Footer', 'gb_like_button') ?></option>
   							 </select>
                         </td>
                    </tr>
                    <tr>
                        <td class="gb-table-tipp"><small><?php _e('Activate this option if you want to activate the Like-Button for your Blog', 'gb_like_button') ?></small></td>
                    </tr>
					
					<!--<tr><td colspan="2"><HR SIZE=1></td></tr>-->
					
					 <tr>
                    	<td width="20%" rowspan="2" valign="middle" class="gb-table-header"><strong><?php _e('Show the Like-Button on every', 'gb_like_button') ?></strong></td>
                        <td width="80%" valign="bottom">
						
						<table border="1" cellspacing="0" cellpadding="0">
							<tr>
								<td valign="bottom">
									<input type="checkbox" class="checkbox" name="gxtb_fb_lB_frontpage" <?php if ($gxtb_fb_lB_settings['frontpage']) echo("checked"); ?>  /> <?php _e('Front-Page', 'gb_like_button') ?>
								</td>
							</tr>                         
							<tr>
								<td valign="bottom">							
                        			<input type="checkbox" class="checkbox" name="gxtb_fb_lB_page" <?php if ($gxtb_fb_lB_settings['page']) echo("checked"); ?>  /> <?php _e('Page', 'gb_like_button') ?>
								</td>
								<td valign="bottom">
								<?php _e('Exclude IDs', 'gb_like_button') ?>: <input name="gxtb_fb_lB_page_exclude" type="text" value="<?php if ($gxtb_fb_lB_settings['page_exclude'] != "") { echo stripslashes($gxtb_fb_lB_settings['page_exclude']); } else {echo "";} ?>" size="10" /> <small><?php _e('Example', 'gb_like_button') ?>: <?php _e('1,84', 'gb_like_button') ?></small>
								</td>
							</tr>
							<tr>
								<td valign="bottom">							
									<input type="checkbox" class="checkbox" name="gxtb_fb_lB_post" <?php if ($gxtb_fb_lB_settings['post']) echo("checked"); ?>  /> <?php _e('Post', 'gb_like_button') ?>
								</td>
								<td valign="bottom">
								<?php _e('Exclude IDs', 'gb_like_button') ?>: <input name="gxtb_fb_lB_post_exclude" type="text" value="<?php if ($gxtb_fb_lB_settings['post_exclude'] != "") { echo stripslashes($gxtb_fb_lB_settings['post_exclude']); } else {echo "";} ?>" size="10" /> <small><?php _e('Example', 'gb_like_button') ?>: <?php _e('55,56', 'gb_like_button') ?></small>
								</td>
							</tr>
							<tr>
								<td valign="bottom">							
									<input type="checkbox" class="checkbox" name="gxtb_fb_lB_category" <?php if ($gxtb_fb_lB_settings['category']) echo("checked"); ?>  /> <?php _e('Category', 'gb_like_button') ?> <img src="<?php echo gxtb_fb_lB_PLUGIN_FOLDER; ?>images/rot17a.gif"  onmouseover="tooltip.show('<?php _e('Some themes have problems to display our generated Like-Button on this kind of Site. Please report this in our Forum if you have a problem with your current theme. We will then try to help you to fix that problem.', 'gb_like_button'); ?>');" onmouseout="tooltip.hide();">
								</td>
								<td valign="bottom">
								<?php _e('Exclude IDs', 'gb_like_button') ?>: <input name="gxtb_fb_lB_category_exclude" type="text" value="<?php if ($gxtb_fb_lB_settings['category_exclude'] != "") { echo stripslashes($gxtb_fb_lB_settings['category_exclude']); } else {echo "";} ?>" size="10" /> <small><?php _e('Example', 'gb_like_button') ?>: <?php _e('22,36', 'gb_like_button') ?></small>
								</td>
							</tr>
							<tr>
								<td valign="bottom">							
									<input type="checkbox" class="checkbox" name="gxtb_fb_lB_archiv" <?php if ($gxtb_fb_lB_settings['archiv']) echo("checked"); ?>  /> <?php _e('Archive', 'gb_like_button') ?> <img src="<?php echo gxtb_fb_lB_PLUGIN_FOLDER; ?>images/rot17a.gif"  onmouseover="tooltip.show('<?php _e('Some themes have problems to display our generated Like-Button on this kind of Site. Please report this in our Forum if you have a problem with your current theme. We will then try to help you to fix that problem.', 'gb_like_button'); ?>');" onmouseout="tooltip.hide();">
								</td>
								<td valign="bottom">
								<?php _e('Exclude IDs', 'gb_like_button') ?>: <input name="gxtb_fb_lB_archiv_exclude" type="text" value="<?php if ($gxtb_fb_lB_settings['archiv_exclude'] != "") { echo stripslashes($gxtb_fb_lB_settings['archiv_exclude']); } else {echo "";} ?>" size="10"/> <small><?php _e('Example', 'gb_like_button') ?>: <?php _e('3,83', 'gb_like_button') ?></small>
								</td>
							</tr>
							
						</table>	
							
                         </td>
                    </tr>
                    <tr>
                        <td class="gb-table-tipp"><small><?php _e('Activate this option if you want to activate the Like-Button on every selected post, page...', 'gb_like_button') ?></small></td>
                    </tr>
					
					<!--<tr><td colspan="2"><HR SIZE=1></td></tr>-->
					
                    <tr>
                    	<td width="20%" rowspan="2" valign="top" class="gb-table-header"><strong><?php _e('Post-Specific Button <small>(Dynamic Buttons)</small>', 'gb_like_button') ?></strong></td>
                        <td width="80%" valign="middle">
					<input name="gxtb_fb_lB_generator_dynamic" type="checkbox" class="checkbox" <?php if ($gxtb_fb_lB_generator['dynamic']) echo("checked"); ?>  /> 
                    <img src="<?php echo gxtb_fb_lB_PLUGIN_FOLDER; ?>/images/rot17a.gif"  onmouseover="tooltip.show('<?php _e('Read the instructions below please. This is an important option.', 'gb_like_button'); ?>');" onmouseout="tooltip.hide();">
                         </td>
                    </tr>
                    <tr>
                        <td class="gb-table-tipp">
						<small>
			<u><?php _e('Activated', 'gb_like_button'); ?>:</u> <?php _e('Every Post/Page has its own Like-Button. Which means for every page on your side there will be a unique Like-Button.', 'gb_like_button'); ?> <?php _e('(recommended)', 'gb_like_button'); ?><br />
				<u><?php _e('Deactivated', 'gb_like_button'); ?>:</u> <?php _e('Every Post/Page has the same Like-Button. Which means if you click on it, it looks like you like/recommend every post even if you have not read it before.', 'gb_like_button'); ?>
            		</small>
						</td>
                    </tr>
					
					<!--<tr><td colspan="2"><HR SIZE=1></td></tr>-->
					
                    <tr>
                    	<td width="20%" rowspan="2" valign="top" class="gb-table-header"><strong><?php _e('Language', 'gb_like_button'); ?></strong></td>
                        <td width="80%" valign="middle">
					<input name="gxtb_fb_lB_generator_language" type="text" value="<?php if ($gxtb_fb_lB_generator['language'] != "") {echo $gxtb_fb_lB_generator['language'];} else {echo "en_US";} ?>" size="6" maxlength="6"/> 
                    <img src="<?php echo gxtb_fb_lB_PLUGIN_FOLDER; ?>/images/rot17a.gif"  onmouseover="tooltip.show('<?php _e('You only need this if you activate XFBML (Java-SDK)', 'gb_like_button'); ?>');" onmouseout="tooltip.hide();">
                         </td>
                    </tr>
                    <tr>
                        <td class="gb-table-tipp">
						<small><?php _e('You only have to choose this option if you activate <b>XFBML (Java-SDK)</b> and if you have a valid AppID. Otherwise the FB-Like-Button chooses its language by itself.', 'gb_like_button'); ?><br />
                <?php _e('<b>Examples:</b> All available languages could be looked up here: <a href="http://www.facebook.com/translations/FacebookLocales.xml" target="_blank">FacebookLocales</a>', 'gb_like_button'); ?><br />
                <?php _e('<b>Default:</b> en_US', 'gb_like_button'); ?>
            		</small>
						</td>
                    </tr>
					
					<!--<tr><td colspan="2"><HR SIZE=1></td></tr>-->
					
                    <tr>
                    	<td width="20%" rowspan="2" valign="top" class="gb-table-header"><strong><?php _e('CSS-Design', 'gb_like_button'); ?></strong></td>
                        <td width="80%" valign="middle">
							<input name="gxtb_fb_lB_css" type="text" value="<?php if ($gxtb_fb_lB_settings['css'] != "") {echo $gxtb_fb_lB_settings['css'];} else {echo "";} ?>" size="20" maxlength="50"/>
                         </td>
                    </tr>
                    <tr>
                        <td class="gb-table-tipp">
							<small>
								<?php _e('Now it is possible to design your like-button like you want. If you enter something into this box it will work as a css-class and you can design it like you want in your css-file. You must configurate this css-class in the css-file and not here.', 'gb_like_button'); ?><br />
								<u><?php _e('Example:', 'gb_like_button'); ?></u><br />
								.classname { property:value; }
            				</small>
						</td>
                    </tr>
					
					<!--<tr><td colspan="2"><HR SIZE=1></td></tr>-->
					
                    <tr>
                    	<td width="20%" rowspan="2" valign="top" class="gb-table-header"><strong><?php _e('breaks before/after Like-Button <small>(&lt;br&gt;)</small>', 'gb_like_button'); ?></strong></td>
                        <td width="80%" valign="middle">
                             <select name="gxtb_fb_lB_br_before" size="1"><?php						 
							 	  for($count = 0; $count <= 5; $count++)
								  { ?>
									<option <?php if($gxtb_fb_lB_settings['br_before'] == $count) echo "selected"; ?>><?php echo $count; ?></option>
								  <?php }

							 	?>
   							 </select> <?php _e('before the Like-Button', 'gb_like_button'); ?>
							 <br />
							 <select name="gxtb_fb_lB_br_after" size="1"><?php						 
							 	  for($count = 0; $count <= 5; $count++)
								  { ?>
									<option <?php if($gxtb_fb_lB_settings['br_after'] == $count) echo "selected"; ?>><?php echo $count; ?></option>
								  <?php }

							 	?>
   							 </select> <?php _e('after the Like-Button', 'gb_like_button'); ?>
                         </td>
                    </tr>
                    <tr>
                        <td class="gb-table-tipp">
							<small>
								<?php _e('You can choose how many breaks you wanna have before or after the Like Button. You can choose breaks here or define the margin and padding within the css-file.', 'gb_like_button'); ?>
            				</small>
						</td>
                    </tr>

				</tbody>
	</table>
<?php
} // end function
} // end class
?>