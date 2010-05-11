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

class gxtb_fb_lB_mBGClass {

## http://wefunction.com/2009/10/revisited-creating-custom-write-panels-in-wordpress/
########################################################################################################
											## GENERATOR-BOX  ##
	
## LIKE-BUTTON-GENERATOR
	public static  function gxtb_contentbox_3() {
		$gxtb_fb_lB_generator = get_option('gxtb_fb_lB_generator');
		?>
 <table>
        <tr>
        	<td>
        
			<p><label><?php _e('URL - (Example: http://example.com)', 'gb_like_button'); ?><br />
					<input name="gxtb_fb_lB_generator_url" type="text" onchange="gxtb_generator()" value="<?php if ($gxtb_fb_lB_generator['url'] != "") {echo $gxtb_fb_lB_generator['url'];} else {echo "";} ?>" size="30"/>
			</label></p>
			
			<p><label><?php _e('Layout Style', 'gb_like_button'); ?><br />
					<SELECT NAME="gxtb_fb_lB_generator_layout" onchange="gxtb_generator()">
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
					<input name="gxtb_fb_lB_generator_faces" type="checkbox" class="checkbox" onchange="gxtb_generator()" <?php if ($gxtb_fb_lB_generator['faces']) echo("checked"); ?>  />
			</label></p>
			
			<p><label><?php _e('Width', 'gb_like_button'); ?><br />
					<input name="gxtb_fb_lB_generator_width" type="text" onchange="gxtb_generator()" value="<?php if ($gxtb_fb_lB_generator['width'] != "") {echo $gxtb_fb_lB_generator['width'];} else {echo "";} ?>" size="4" maxlength="4"/>px
			</label></p>
			
			<p><label><?php _e('Height', 'gb_like_button'); ?><br />
					<input name="gxtb_fb_lB_generator_heigth" type="text" onchange="gxtb_generator()" value="<?php echo $gxtb_fb_lB_generator['height']; ?>" size="4" maxlength="4"/>px
			</label></p>
			
			<p><label><?php _e('Verb to display', 'gb_like_button'); ?><br />
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
			</label></p>
			
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
          
          <td width="20px">
          </td>
          
          <td valign="top">
      
      		<p><label><?php _e('Language', 'gb_like_button'); ?><br />
					<input name="gxtb_fb_lB_generator_language" type="text" value="<?php if ($gxtb_fb_lB_generator['language'] != "") {echo $gxtb_fb_lB_generator['language'];} else {echo "en_US";} ?>" size="6" maxlength="6"/>
			</label></p>
            <small>
				<?php _e('You only have to choose this option if you activate the <b>Java-SDK</b> and if you have a valid AppID. Otherwise the FB-Like-Button chooses its language by itself.', 'gb_like_button'); ?><br />
                <?php _e('<b>Examples:</b> All available languages could be looked up here: <a href="http://www.facebook.com/translations/FacebookLocales.xml" target="_blank">FacebookLocales</a>', 'gb_like_button'); ?><br />
                <?php _e('<b>Default:</b> en_US', 'gb_like_button'); ?>
            </small>
            
          	<br />
			<br />
            
       		<p><label><?php _e('Dynamic Like-Button', 'gb_like_button'); ?><br />
					<input name="gxtb_fb_lB_generator_dynamic" type="checkbox" class="checkbox" <?php if ($gxtb_fb_lB_generator['dynamic']) echo("checked"); ?>  />
			</label></p>
            <small>
			<u><?php _e('Activated', 'gb_like_button'); ?>:</u> <?php _e('Every Post/Page has its own Like-Button. Which means for every page on your side there will be a unique Like-Button.', 'gb_like_button'); ?> <?php _e('(recommended)', 'gb_like_button'); ?><br />
				<u><?php _e('Deactivated', 'gb_like_button'); ?>:</u> <?php _e('Every Post/Page has the same Like-Button. Which means if you click on it, it looks like you like/recommend every post even if you have not read it before.', 'gb_like_button'); ?><br />
            </small>
            
          	<br />
			<br />
            
       		<p><b><?php _e('Preview', 'gb_like_button'); ?></b></p><br />
			
            <div id="gxtb_fb_lB_preview"></div>
			
            <script type="text/javascript"> gxtb_generator(); </script>          
          </td>      
      </tr>
</table>      
            
	<?php
	}


} ?>