<?php // Do not delete these lines
	if (!empty($_SERVER['SCRIPT_FILENAME']) && basename(__file__) == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');
?>
<?php
/*
+----------------------------------------------------------------+
+	Like-Button-Plugin-For-Wordpress [v3.1]
+	by Stefan Natter (http://www.gangxtaboii.com and http://www.gb-world.net)
+   required for Like-Button-Plugin-For-Wordpress and WordPress 2.7.x or higher
+----------------------------------------------------------------+
*/

########################################################################################################
											## FAQ  ##
// How-to-Call a function:
// gxtb_fb_lB_mBClass::gxtb_sidebox_1();

//below you will find for each registered metabox the callback method, that produces the content inside the boxes
//i did not describe each callback dedicated, what they do can be easily inspected and compare with the option page displayed

											## FAQ  ##
########################################################################################################


####################################################
####################################################
###########								 ###########
###########								 ###########
###########	   STATIC METABOX-CLASS		 ###########
###########								 ###########
###########								 ###########
####################################################
##################### by ganxtaboii.com ############
####################################################

class gxtb_fb_lB_mBClass {

########################################################################################################
											## YOUR-CODE-BOX & FAQ-BOX  ##

## YOUR-CODE-BOX - out of use
	public static  function gxtb_contentbox_2() {
		?>
        	<table class="form-table" style="width: 70%;" border="0">
		        <tbody>
                    <tr>
                    	<td width="20%" rowspan="2" valign="middle"><strong><?php _e('Code of your Like-Button', 'gb_like_button') ?></strong></td>
                        <td width="80%" valign="bottom">
                        	<textarea name="gxtb_fb_lB_code" rows="10"/ style="width:100%"><?php if (get_option('gxtb_fb_lB_code') != "") {echo get_option('gxtb_fb_lB_code');} else {echo "";} ?></textarea>
                         </td>
                    </tr>
                    <tr>
                        <td><small><?php _e('iFrame-Code of your generated Like-Button', 'gb_like_button') ?><br />
                        		   <?php _e('You&prime;ll get your Code here: <a href="http://developers.facebook.com/docs/reference/plugins/like" target="_blank">http://developers.facebook.com/docs/reference/plugins/like</a>', 'gb_like_button') ?></small></td>
                    </tr>

               </tbody>
            </table>				
			<?php
	}
	
## FAQ-BOX
	public static  function gxtb_contentbox_5() {
	global $gb_fb_lB_path;
		?>
					<middle>
					<ol>
                        <li><?php _e('Install the Plugin', 'gb_like_button') ?></strong></li>
					<br>
                        <li><?php _e('Go to the Settings-Page and complete all the required information and activate the Plugin with the first checkbox on this site.', 'gb_like_button') ?></li>
					<br>
                        <li><b><?php _e('XFBML (Java-SDK) or iFrame', 'gb_like_button') ?></b></li>
						<ul>
             		        <li><?php _e('The basic Like button is available via a simple <b>iframe</b> you can drop into your page easily. A fuller-featured Like button is available via the <b>&lt;fb:like&gt; XFBML tag</b> and requires you use the new <b>JavaScript SDK</b>. The XFBML version allows users to add a <b>comment to their like as it is posted back to Facebook</b>. The XFBML version also <b>dynamically sizes its height</b>; for example, if there are no profile pictures to display, the plugin will only be tall enough for the button itself.', 'gb_like_button') ?> <small>(<?php _e('definition by Facebook', 'gb_like_button') ?>)</small></li>
						</ul>
                     <br />
                        <li><b><?php _e('Facebook-Generator-FAQ:', 'gb_like_button') ?></b></li>
							<ul>
                       			<li><?php _e('The URL must look like this -> http://example.com. Otherwise the Button will not work properly.', 'gb_like_button'); ?></li>
                                <li><?php _e('Now choose your layout style, width, height, font, verb to display, color scheme and if faces should be shown.', 'gb_like_button'); ?></li>
                                <li><u><?php _e('Language', 'gb_like_button'); ?>:</u> <?php _e('It is possible to choose a language for your button. But keep in mind that you have to activate XFBML (Java-SDK) and you must have a valid appID.', 'gb_like_button'); ?></li>
                                <li><u><?php _e('Dynamic Like-Button', 'gb_like_button'); ?>:</u> <?php _e('Every page will have its own unique like-button if you activate this checkbox. Otherwise every page will use the same facebook-like-button.', 'gb_like_button'); ?></li>
							</ul>
					<br>
                        <li><b><?php _e('[like]-Shortcode', 'gb_like_button') ?></b></li>
							<ul>
								<li><?php _e('You only have to insert <strong>[like]</strong> into a post/article and your like-Button (generated on this Option-Page) will appear', 'gb_like_button') ?></li>
							</ul>
					<br>
                        <li><b><?php _e('Facebook-Like-Button-Widget', 'gb_like_button') ?></b></li>
							<ul>
             		           <li><?php _e('Go to the Widgets-Page on the left. Add the "Facebook-Like-Button" Widget and add the required information.', 'gb_like_button') ?></li>
							   <li><?php _e('The URL must look like the URL for the Facebook-Generator on this site.', 'gb_like_button') ?></li>
							</ul>
                    <br />
                        <li><b><?php _e('The Tooltips do not work', 'gb_like_button') ?>  <img src="<?php echo $gb_fb_lB_path; ?>/images/rot17a.gif" onmouseover="tooltip.show('<?php _e('It works :)', 'gb_like_button'); ?>');" onmouseout="tooltip.hide();"></b></li>
							<ul>
             		           <li><?php _e('Press F5 and refresh the page or delete your cache and try it again.', 'gb_like_button') ?></li>
							</ul>
					</ol>
				</middle>		
	<?php
	}
}
?>