<?php // Do not delete these lines
	if (!empty($_SERVER['SCRIPT_FILENAME']) && basename(__file__) == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');
?>
<?php  ## ÜBERSICHTLICHER GESTALTEN ##
/*
+----------------------------------------------------------------+
+	Like-Button-Plugin-For-Wordpress [v4.2.3]
+	by Stefan Natter (http://www.gangxtaboii.com and http://www.gb-world.net)
+   required for Like-Button-Plugin-For-Wordpress and WordPress 2.7.x or higher
+----------------------------------------------------------------+
*/
class gxtb_fb_lB_mBGClassJQuery {
## http://wefunction.com/2009/10/revisited-creating-custom-write-panels-in-wordpress/
########################################################################################################
											## GENERATOR-BOX  ##
## LIKE-BUTTON-GENERATOR

function gxtb_contentbox_3_jquery() { 

		$gxtb_fb_lB_generator = get_option('gxtb_fb_lB_generator');
		$gxtb_fb_lB_settings = get_option('gxtb_fb_lB_settings');
		$gxtb_fb_lB = get_option('gxtb_fb_lB');
		global $gb_fb_lB_path;
		
		if( $gxtb_fb_lB['jQuery'] ) { $width = "100%"; } else { $width = "70%"; }
?>
<table class="form-table" style="width:<?php echo $width;?>;" border="0" id="gb-table-generator">
		        <tbody>
<?php //if( $gxtb_fb_lB['jQuery'] ) { ?>
           			<tr>
                    	<td width="20%" rowspan="2" valign="top" class="gb-table-header">
							<strong>
								<?php _e('Generator', 'gb_like_button'); ?>
							</strong>
						</td>
                        <td width="80%" valign="bottom">
								<!-- Tabs -->
		<div class="ui-tabs-panel ui-widget-content ui-corner-bottom ui-tabs ui-widget ui-corner-all" id="tabs2">
			<ul class="ui-tabs-nav ui-helper-reset ui-helper-clearfix ui-widget-header ui-corner-all">
				<li class="ui-state-default ui-corner-top ui-tabs-selected ui-state-active ui-state-focus"><a href="#tabs-5" class="ui-state-default ui-corner-top"><?php _e('General Settings', 'gb_like_button'); ?></a></li>
				<li class="ui-state-default ui-corner-top"><a href="#tabs-6" class="ui-state-default ui-corner-top"><?php _e('Design', 'gb_like_button'); ?></a></li>
				<li class="ui-state-default ui-corner-top"><a href="#tabs-7" class="ui-state-default ui-corner-top"><?php _e('iFrame Settings', 'gb_like_button'); ?></a></li>
			</ul>
			<div class="ui-tabs-panel ui-widget-content ui-corner-bottom" id="tabs-5">
			<table class="form-table">
			 <tr>
                    	<td width="20%" rowspan="2" valign="top" class="gb-table-header">
							<strong>
								URL
							</strong>
						</td>
                        <td width="80%" valign="bottom">
							<input name="gxtb_fb_lB_generator_url" type="text" onchange="gxtb_generator()" value="<?php if ($gxtb_fb_lB_generator['url'] != "") {echo $gxtb_fb_lB_generator['url'];} else {echo "";} ?>" size="30"/><br />
							<small>
								<?php _e('(Example: http://example.com)', 'gb_like_button'); ?>
								<br /><br /><b><?php _e('Changes since 10th of September 2010:', 'gb_like_button'); ?></b><br />
								<?php _e('You can now also like your Facebook Pages and Application. Just enter the URL to your Facebook Page or Application (for example: <a href="http://www.facebook.com/gbworldnet" target="_blank">http://www.facebook.com/gbworldnet</a>)', 'gb_like_button'); ?>
							</small>
                         </td>
                    </tr>
                    <tr>
                        <td class="gb-table-tipp">
						</td>
                    </tr>

					<tr>
                    	<td width="20%" rowspan="2" valign="top" class="gb-table-header">
							<strong>
								<?php _e('Layout Style', 'gb_like_button'); ?>
								<br /><br />
								<?php _e('Show Faces?', 'gb_like_button'); ?>
							</strong>
						</td>
                        <td width="80%" valign="bottom">
							<SELECT NAME="gxtb_fb_lB_generator_layout" onchange="gxtb_generator()">
								<?php
								$i = array( "standard", "button_count", "box_count" );
								  foreach($i as $variable) {
									if($variable == $gxtb_fb_lB_generator['layout']) {
										echo '<OPTION selected>' . $variable .'</OPTION>';
									} else {
										echo '<OPTION>' . $variable .'</OPTION>';
									}
								}
								?>
							</SELECT>
							<br /><br />
						<input name="gxtb_fb_lB_generator_faces" type="checkbox" class="checkbox" onchange="gxtb_generator()" <?php if ($gxtb_fb_lB_generator['faces']) echo("checked"); ?>  />
							
                         </td>
                    </tr>
                    <tr>
                        <td class="gb-table-tipp">
						</td>
                    </tr>
					                    <tr>
                    	<td width="20%" rowspan="2" valign="top" class="gb-table-header">
							<strong>
								<?php _e('Verb to display', 'gb_like_button'); ?>
							</strong>
						</td>
                        <td width="80%" valign="top">
					<SELECT NAME="gxtb_fb_lB_generator_verb" onchange="gxtb_generator()">
					<?php
					$i = array( "like", "recommend" );
					  foreach($i as $variable) {
						if($variable == $gxtb_fb_lB_generator['verb']) {
							echo '<OPTION selected>' . $variable .'</OPTION>';
						} else {
							echo '<OPTION>' . $variable .'</OPTION>';
						}
					}
					?>
					</SELECT>
                         </td>
                    </tr>
                    <tr>
                        <td class="gb-table-tipp">
						</td>
                    </tr>
			</table>
			
			</div>
			<div class="ui-tabs-panel ui-widget-content ui-corner-bottom ui-tabs-hide" id="tabs-6"><table class="form-table">
			 <tr>
                    	<td width="20%" rowspan="2" valign="top" class="gb-table-header">
							<strong>
								<?php _e('Width', 'gb_like_button'); ?>
								<br />
								<?php _e('Height', 'gb_like_button'); ?>
							</strong>
						</td>
                        <td width="80%" valign="top">
						<input name="gxtb_fb_lB_generator_width" type="text" onchange="gxtb_generator()" value="<?php if ($gxtb_fb_lB_generator['width'] != "") {echo $gxtb_fb_lB_generator['width'];} else {echo "";} ?>" size="4" maxlength="4"/> px
							<br />
							<input name="gxtb_fb_lB_generator_heigth" type="text" onchange="gxtb_generator()" value="<?php echo $gxtb_fb_lB_generator['height']; ?>" size="4" maxlength="4"/> px
                         </td>
                    </tr>
                    <tr>
                        <td class="gb-table-tipp">
						</td>
                    </tr>
					 <tr>
                    	<td width="20%" rowspan="2" valign="top" class="gb-table-header">
							<strong>
								<?php _e('Like-Button-Design', 'gb_like_button'); ?>
							</strong>
						</td>
                        <td width="80%" valign="top">
					<p><label><?php _e('Color Scheme', 'gb_like_button'); ?><br />
					<SELECT NAME="gxtb_fb_lB_generator_color" onchange="gxtb_generator()">
					<?php
					$i = array( "light", "dark", "evil" );
					  foreach($i as $variable) {
						if($variable == $gxtb_fb_lB_generator['color']) {
							echo '<OPTION selected>' . $variable .'</OPTION>';
						} else {
							echo '<OPTION>' . $variable .'</OPTION>';
						}
					}
					?>
					</SELECT>
			</label></p>
            
			<p><label><?php _e('Font', 'gb_like_button'); ?><br />
					<SELECT NAME="gxtb_fb_lB_generator_font" onchange="gxtb_generator()">
					<?php
					$i = array( "" ,"arial", "luciada grande", "segoe ui", "tahoma", "trebuchet ms", "verdana" );
					  foreach($i as $variable) {
						if($variable == $gxtb_fb_lB_generator['font']) {
							echo '<OPTION selected>' . $variable .'</OPTION>';
						} else {
							echo '<OPTION>' . $variable .'</OPTION>';
						}
					}
					?>
					</SELECT>
			</label></p>
                         </td>
                    </tr>
                    <tr>
                        <td class="gb-table-tipp">
						</td>
                    </tr>
					
			</table></div>
			
			<div class="ui-tabs-panel ui-widget-content ui-corner-bottom ui-tabs-hide" id="tabs-7">				
				<table class="form-table">
				<tr>
                    	<td width="20%" rowspan="2" valign="top" class="gb-table-header">
							<strong>
								<?php _e('Like-Button-Design', 'gb_like_button'); ?>
							</strong>
						</td>
                        <td width="80%" valign="top">
<!-- BEGIN generator-settings for the iframe -->
<div id="xtraIframe" style="visibility:visible">          
          <p><label><?php _e('Scrolling', 'gb_like_button'); ?><br />
					<input name="gxtb_fb_lB_generator_scrolling" <?php if($gxtb_fb_lB_settings['JDK'] == true) { echo "disabled"; }?> type="checkbox" class="checkbox" onchange="gxtb_generator()" <?php if ($gxtb_fb_lB_generator['scrolling']) echo("checked"); ?>  />
			</label></p>

          <p><label><?php _e('Frameborder', 'gb_like_button'); ?><br />
					<input name="gxtb_fb_lB_generator_frameborder" <?php if($gxtb_fb_lB_settings['JDK'] == true) { echo "disabled"; }?>  type="text" onchange="gxtb_generator()" value="<?php if ($gxtb_fb_lB_generator['frameborder'] != "") {echo $gxtb_fb_lB_generator['frameborder'];} else {echo "";} ?>" size="4" maxlength="4"/>px
			</label></p>

          <p><label><?php _e('Style (of the Border)', 'gb_like_button'); ?><br />
					<input name="gxtb_fb_lB_generator_borderstyle" <?php if($gxtb_fb_lB_settings['JDK'] == true) { echo "disabled"; }?>  type="text" onchange="gxtb_generator()" value="<?php if ($gxtb_fb_lB_generator['borderstyle'] != "") {echo $gxtb_fb_lB_generator['borderstyle'];} else {echo "";} ?>" size="20" maxlength="20"/><br />
					<?php _e('Example: none or solid', 'gb_like_button'); ?>
			</label></p>

          <p><label><?php _e('Overflow', 'gb_like_button'); ?></label><br />
					<select name="gxtb_fb_lB_generator_overflow" <?php if($gxtb_fb_lB_settings['JDK'] == true) { echo "disabled"; }?>  onchange="gxtb_generator()">
					<?php
					$i = array( "hidden", "scroll");
					  foreach($i as $variable) {
						if($variable == $gxtb_fb_lB_generator['overflow']) {
							echo '<OPTION selected>' . $variable .'</OPTION>';
						} else {
							echo '<OPTION>' . $variable .'</OPTION>';
						}
					}
					?>
					</select>
             </p>

          <p><label><?php _e('Allow Transparency', 'gb_like_button'); ?><br />
					<input name="gxtb_fb_lB_generator_trans" <?php if($gxtb_fb_lB_settings['JDK'] == true) { echo "disabled"; }?>  type="checkbox" class="checkbox" onchange="gxtb_generator()" <?php if ($gxtb_fb_lB_generator['trans']) echo("checked"); ?>  />
			</label></p>
</div>

<div id="iframe_info" style="visibility:visible"><small>
	<?php if ($gxtb_fb_lB_settings['JDK']) { _e('You do not need this disabled options if you use the XFBML (Java-SDK).', 'gb_like_button'); } ?></small>
</div>
<!-- END generator-settings for the iframe -->
                         </td>
                    </tr>
                    <tr>
                        <td class="gb-table-tipp">
						</td>
                    </tr>
					
			</table>
				
			</div>

		</div>
                         </td>
                    </tr>
                    <tr>
                        <td class="gb-table-tipp">
						</td>
                    </tr>
<?php //} ?>
					<tr>
                    	<td width="20%" rowspan="2" valign="top" class="gb-table-header-preview"><br />
							<strong>
<p><b><?php _e('Preview', 'gb_like_button'); ?></b> <img src="<?php echo $gb_fb_lB_path; ?>/images/rot17a.gif"  onmouseover="tooltip.show('<?php _e('It will show a preview of a iFrame-FB-Like-Button. If XFBML (Java-SDK) is enabled it will act a little bit different like this preview. Because the preview is always without XFBML (Java-SDK).', 'gb_like_button'); ?>');" onmouseout="tooltip.hide();"></p>
							</strong>
						</td>
                        <td width="80%" valign="bottom"><br />
							<div id="gxtb_fb_lB_preview"></div>
							<script type="text/javascript"> gxtb_generator(""); </script>
                         </td>
                    </tr>
                    <tr>
                        <td class="gb-table-tipp">
						</td>
                    </tr>

					
			</tbody>
</table>

<?php
} // end function
} // end class ?>