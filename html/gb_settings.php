<?php // Do not delete these lines
	if (!empty($_SERVER['SCRIPT_FILENAME']) && basename(__file__) == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');
?>
<?php
/*
+----------------------------------------------------------------+
+	Like-Button-Plugin-For-Wordpress [v2.5]
+	by Stefan Natter (http://www.gangxtaboii.com and http://www.gb-world.net)
+   required for Like-Button-Plugin-For-Wordpress and WordPress 2.7.x or higher
+----------------------------------------------------------------+
*/

class gxtb_fb_lB_mBSClass {

########################################################################################################
											## SETTINGS-BOX  ##

public static  function gxtb_contentbox_1() {
	$gxtb_fb_lB_settings = get_option('gxtb_fb_lB_settings');
	?>
<table class="form-table" style="width: 70%;" border="0">
		        <tbody>
           
                    <tr>
                    	<td width="20%" rowspan="2" valign="middle"><strong><?php _e('Activate the Like-Button', 'gb_like_button') ?></strong></td>
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
                         </td>
                    </tr>
                    <tr>
                        <td><small><?php _e('Activate this option if you want to activate the Like-Button for your Blog', 'gb_like_button') ?></small></td>
                    </tr>
                    <tr>
                    	<td width="20%" rowspan="2" valign="middle"><strong><?php _e('Activate the JavaScript SDK', 'gb_like_button') ?></strong></td>
                        <td width="80%" valign="bottom">
                        	<input type="checkbox" class="checkbox" name="gxtb_fb_lB_jdk" id="gxtb_fb_lB_jdk" onchange="appID();" <?php if ($gxtb_fb_lB_settings['JDK']) {echo("checked"); } ?> />
                         </td>
                    </tr>
                    <tr>
                        <td>
							<small>
								<?php _e('Activate this option if you want to enable all the FB-Like-Button-Functions which are available.', 'gb_like_button') ?><br />
								<?php _e('<b>Notice:</b> You must have a valid AppID if you want to use the JavaScript SDK.', 'gb_like_button') ?>
							</small>
						</td>
                    </tr>
                    <tr>
                    	<td width="20%" rowspan="2" valign="middle"><strong><?php _e('Add the Like-Button in the Footer', 'gb_like_button') ?></strong></td>
                        <td width="80%" valign="bottom">
                         <input type="checkbox" class="checkbox" name="gxtb_fb_lB_addfooter_activate" <?php if ($gxtb_fb_lB_settings['addfooter_activate']) echo("checked"); ?>  />
                                <select name="gxtb_fb_lB_addfooter">
                                  <option <?php if($gxtb_fb_lB_settings['addfooter'] == __('Before the Footer', 'gb_like_button')) echo "selected"; ?> ><?php _e('Before the Footer', 'gb_like_button') ?></option>
                                  <option <?php if($gxtb_fb_lB_settings['addfooter'] == __('After the Footer', 'gb_like_button')) echo "selected"; ?> ><?php _e('After the Footer', 'gb_like_button') ?></option>
   							 </select>
                         </td>
                    </tr>
                    <tr>
                        <td><small><?php _e('Activate this option if you want to activate the Like-Button for your Blog', 'gb_like_button') ?></small></td>
                    </tr>
                    <tr>
                    	<td width="20%" rowspan="2" valign="middle"><strong><?php _e('Like-Button-Position', 'gb_like_button') ?></strong></td>
                        <td width="80%" valign="bottom">
                             <select name="gxtb_fb_lB_position">
                                  <option <?php if($gxtb_fb_lB_settings['position'] == __('Before the Content', 'gb_like_button')) echo "selected"; ?> ><?php _e('Before the Content', 'gb_like_button') ?></option>
                                  <option <?php if($gxtb_fb_lB_settings['position'] == __('After the Content', 'gb_like_button')) echo "selected"; ?> ><?php _e('After the Content', 'gb_like_button') ?></option>
   							 </select>
                         </td>
                    </tr>
                    <tr>
                        <td><small><?php _e('Choose the position of your Like-Button.', 'gb_like_button') ?></small></td>
                    </tr>
					 <tr>
                    	<td width="20%" rowspan="2" valign="middle"><strong><?php _e('Show the Like-Button on every', 'gb_like_button') ?></strong></td>
                        <td width="80%" valign="bottom">
						
						<table border="1" cellspacing="0" cellpadding="0">
							<tr>
								<td valign="bottom">
									<?php _e('Front-Page', 'gb_like_button') ?>:
									<input type="checkbox" class="checkbox" name="gxtb_fb_lB_frontpage" <?php if ($gxtb_fb_lB_settings['frontpage']) echo("checked"); ?>  />
								</td>
							</tr>
							<tr>
								<td valign="bottom">							
                        			<?php _e('Page', 'gb_like_button') ?>: <input type="checkbox" class="checkbox" name="gxtb_fb_lB_page" <?php if ($gxtb_fb_lB_settings['page']) echo("checked"); ?>  />
								</td>
								<td valign="bottom">
								<?php _e('Exclude IDs', 'gb_like_button') ?>: <input name="gxtb_fb_lB_page_exclude" type="text" value="<?php if ($gxtb_fb_lB_settings['page_exclude'] != "") { echo stripslashes($gxtb_fb_lB_settings['page_exclude']); } else {echo "";} ?>" size="10" /> <small><?php _e('Example', 'gb_like_button') ?>: <?php _e('1,84', 'gb_like_button') ?></small>
								</td>
							</tr>
							<tr>
								<td valign="bottom">							
									<?php _e('Post', 'gb_like_button') ?>: <input type="checkbox" class="checkbox" name="gxtb_fb_lB_post" <?php if ($gxtb_fb_lB_settings['post']) echo("checked"); ?>  />
								</td>
								<td valign="bottom">
								<?php _e('Exclude IDs', 'gb_like_button') ?>: <input name="gxtb_fb_lB_post_exclude" type="text" value="<?php if ($gxtb_fb_lB_settings['post_exclude'] != "") { echo stripslashes($gxtb_fb_lB_settings['post_exclude']); } else {echo "";} ?>" size="10" /> <small><?php _e('Example', 'gb_like_button') ?>: <?php _e('55,56', 'gb_like_button') ?></small>
								</td>
							</tr>
						</table>	
							
                         </td>
                    </tr>
                    <tr>
                        <td><small><?php _e('Activate this option if you want to activate the Like-Button on every selected post, page...', 'gb_like_button') ?></small></td>
                    </tr>
				</tbody>
	</table>
	
	<?php
}



}
?>