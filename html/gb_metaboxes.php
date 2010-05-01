<?php // Do not delete these lines
	if (!empty($_SERVER['SCRIPT_FILENAME']) && basename(__file__) == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');
?>
<?php
/*
+----------------------------------------------------------------+
+	Like-Button-Plugin-For-Wordpress [v1.3.7.5]
+	by Stefan Natter (http://www.gangxtaboii.com)
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

## YOUR-CODE-BOX
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
		?>
					<middle>
					<ol>
                        <li><?php _e('Install the Plugin', 'gb_like_button') ?></strong></li>
					<br>
                        <li><?php _e('Go to the Settings-Page and complete all the required information and activate the Plugin with the first checkbox on this site.', 'gb_like_button') ?></li>
					<br>
                        <li><?php _e('Facebook-Generator-FAQ:', 'gb_like_button') ?></li>
							<ul>
                       			<li><?php _e('The URL must look like this -> http://example.com. Otherwise the Button will not work properly.', 'gb_like_button'); ?></li>
							</ul>
					<br>
                        <li><?php _e('[like]-Shortcode', 'gb_like_button') ?></li>
							<ul>
								<li><?php _e('Y only have to insert <strong>[like]</strong> into a post/article and your like-Button (generated on this Option-Page) will appear', 'gb_like_button') ?></li>
							</ul>
					<br>
                        <li><?php _e('Facebook-Like-Button-Widget', 'gb_like_button') ?></li>
							<ul>
             		           <li><?php _e('Go to the Widgets-Page on the left. Add the "Facebook-Like-Button" Widget and add the required information.', 'gb_like_button') ?></li>
							   <li><?php _e('The URL must look like the URL for the Facebook-Generator on this site.', 'gb_like_button') ?></li>
							</ul>
					</ol>
				</middle>		
	<?php
	}
}
?>