<?php // Do not delete these lines
	if (!empty($_SERVER['SCRIPT_FILENAME']) && basename(__file__) == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');
?>
<?php
/*
+----------------------------------------------------------------+
+	Like-Button-Plugin-For-Wordpress [v1.4]
+	by Stefan Natter (http://www.gangxtaboii.com)
+   required for Like-Button-Plugin-For-Wordpress and WordPress 2.7.x or higher
+----------------------------------------------------------------+
*/

class gxtb_fb_lB_mBGClass {

## http://wefunction.com/2009/10/revisited-creating-custom-write-panels-in-wordpress/
########################################################################################################
											## GENERATOR-BOX  ##
	
## LIKE-BUTTON-GENERATOR
	public static  function gxtb_contentbox_3() {
		$gxtb_fb_lB_generator = get_option('gxtb_fb_lB_generator');
		?>
			<p><label><?php _e('URL - (Example: http://example.com)', 'gb_like_button'); ?><br />
					<input name="gxtb_fb_lB_generator_url" type="text" value="<?php if ($gxtb_fb_lB_generator['url'] != "") {echo $gxtb_fb_lB_generator['url'];} else {echo "";} ?>" />
			</label></p>
			
			<p><label><?php _e('Layout Style', 'gb_like_button'); ?><br />
					<SELECT NAME="gxtb_fb_lB_generator_layout">
					<?php
					$i = array( "standard", "button_count" );
					  foreach($i as $variable) {
						if($variable == $gxtb_fb_lB_generator['layout']) {
							echo '<OPTION selected>' . $variable .'</OPTION>';
						} else {
							echo '<OPTION>' . $variable .'</OPTION>';
						}
					}
					?>
					</SELECT>
			</label></p>
			
			<p><label><?php _e('Show Faces?', 'gb_like_button'); ?><br />
					<input name="gxtb_fb_lB_generator_faces" type="checkbox" class="checkbox" <?php if ($gxtb_fb_lB_generator['faces']) echo("checked"); ?>  />
			</label></p>
			
			<p><label><?php _e('Width', 'gb_like_button'); ?><br />
					<input name="gxtb_fb_lB_generator_width" type="text" value="<?php if ($gxtb_fb_lB_generator['width'] != "") {echo $gxtb_fb_lB_generator['width'];} else {echo "";} ?>" size="4" maxlength="4"/>px
			</label></p>
			
			<p><label><?php _e('Height', 'gb_like_button'); ?><br />
					<input name="gxtb_fb_lB_generator_heigth" type="text" value="<?php echo $gxtb_fb_lB_generator['height']; ?>" size="4" maxlength="4"/>px
			</label></p>
			
			<p><label><?php _e('Verb to display', 'gb_like_button'); ?><br />
					<SELECT NAME="gxtb_fb_lB_generator_verb">
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
			</label></p>
			
			<p><label><?php _e('Color Scheme', 'gb_like_button'); ?><br />
					<SELECT NAME="gxtb_fb_lB_generator_color">
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
	<?php
	}


} ?>