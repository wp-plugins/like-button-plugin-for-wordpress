<?php // Do not delete these lines
	if (!empty($_SERVER['SCRIPT_FILENAME']) && basename(__file__) == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');
?>
<?php
/*
+----------------------------------------------------------------+
+	Like-Button-Plugin-For-Wordpress [v4.0]
+	by Stefan Natter (http://www.gangxtaboii.com and http://www.gb-world.net)
+   required for Like-Button-Plugin-For-Wordpress and WordPress 2.7.x or higher
+----------------------------------------------------------------+
*/

########################################################################################################

if (!class_exists('gxtb_fb_lB_mAClass')) {
class gxtb_fb_lB_mAClass {

########################################################################################################
											## FB-Analytics-Box  ##
	
public static function gxtb_fb_analytics_box() {
	
	if( get_option('gxtb_fb_lB_analytics') ) {
		$gxtb_fb_lB_analytics = get_option('gxtb_fb_lB_analytics');
	} else {
		$gxtb_fb_lB_analytics = array( "on" == false );
	}

	// Path of the Plugin - currently it is a global variable
	global $gb_fb_lB_path;
	
	?>
<!-- Analytics-Table -->
<table class="form-table" style="width: 70%;" border="0" id="gb-table">
		        <tbody>
           
                    <tr>
                    	<td width="20%" rowspan="2" valign="top" class="gb-table-header">
							<strong>
								<a name="reldefinitions" style="color:#000000"><?php _e('Add the REF-Attribute', 'gb_like_button') ?></a>
							</strong>
						</td>
                        <td width="80%" valign="top">
                        	<input type="checkbox" class="checkbox" name="gxtb_fb_lB_analytics_on" 
							<?php if ($gxtb_fb_lB_analytics['on']) { echo("checked"); } ?> /> 
                            <img src="<?php echo $gb_fb_lB_path; ?>/images/rot17a.gif"  onmouseover="tooltip.show('<?php _e('Activate this checkbox if you want to analyse the effectivity of your like-buttons.', 'gb_like_button'); ?>');" onmouseout="tooltip.hide();">
                         </td>
                    </tr>
				
                    <tr>
                        <td><?php /*
						<small><?php _e('Activate this option if you want to analyse your like-buttons. This will work like Google-Analytics. If someone clicks on your like Button the ref-attribute will contain your definition you choose here and this will let you know on which site they like sth. most (archive, pages, posts, index,...).', 'gb_like_button') ?></small> */ ?>
						</td>
                    </tr>
					
					
					 <tr>
                    	<td width="20%" rowspan="2" valign="middle" class="gb-table-header">
							<strong>
								<?php _e('REF-Definitions', 'gb_like_button') ?>
							</strong>
						</td>
                        <td width="80%" valign="bottom">
						
						<!-- inner table -->
						<table border="1" cellspacing="0" cellpadding="0">
							<tr>
								<td valign="bottom">
									<input type="checkbox" class="checkbox" name="gxtb_fb_lB_analytics_frontpage_activ" <?php if ($gxtb_fb_lB_analytics['frontpage_activ']) echo("checked"); ?> onmouseover="tooltip.show('<?php _e('Activate this checkbox if you want to use this ref-definition at the frontpage (index) of your blog.', 'gb_like_button'); ?>');" onmouseout="tooltip.hide();"/> <?php _e('Front-Page', 'gb_like_button') ?>
								</td>
								<td valign="bottom">
								<input name="gxtb_fb_lB_analytics_frontpage" type="text" value="<?php if ($gxtb_fb_lB_analytics['frontpage'] != "") { echo stripslashes($gxtb_fb_lB_analytics['frontpage']); } else {echo "";} ?>" size="49" /> <small><i><?php _e('For example: top_post', 'gb_like_button') ?></i></small>
								</td>
							</tr>                        
							<tr>
								<td valign="bottom">
									<input type="checkbox" class="checkbox" name="gxtb_fb_lB_analytics_page_activ" <?php if ($gxtb_fb_lB_analytics['page_activ']) echo("checked"); ?> onmouseover="tooltip.show('<?php _e('Activate this checkbox if you want to use this ref-definition on every page where the Like-Button appears.', 'gb_like_button'); ?>');" onmouseout="tooltip.hide();"/> <?php _e('Page', 'gb_like_button') ?>
								</td>
								<td valign="bottom">
								<input name="gxtb_fb_lB_analytics_page" type="text" value="<?php if ($gxtb_fb_lB_analytics['page'] != "") { echo stripslashes($gxtb_fb_lB_analytics['page']); } else {echo "";} ?>" size="49" />
								</td>
							</tr>
							<tr>
								<td valign="bottom">
									<input type="checkbox" class="checkbox" name="gxtb_fb_lB_analytics_post_activ" <?php if ($gxtb_fb_lB_analytics['post_activ']) echo("checked"); ?> onmouseover="tooltip.show('<?php _e('Activate this checkbox if you want to use this ref-definition on every post where the Like-Button appears.', 'gb_like_button'); ?>');" onmouseout="tooltip.hide();"/> <?php _e('Post', 'gb_like_button') ?>
								</td>
								<td valign="bottom">
								<input name="gxtb_fb_lB_analytics_post" type="text" value="<?php if ($gxtb_fb_lB_analytics['post'] != "") { echo stripslashes($gxtb_fb_lB_analytics['post']); } else {echo "";} ?>" size="49" />
								</td>
							</tr>							
							<tr>
								<td valign="bottom">
									<input type="checkbox" class="checkbox" name="gxtb_fb_lB_analytics_category_activ" <?php if ($gxtb_fb_lB_analytics['category_activ']) echo("checked"); ?> onmouseover="tooltip.show('<?php _e('Activate this checkbox if you want to use this ref-definition for category-sites.', 'gb_like_button'); ?>');" onmouseout="tooltip.hide();"/> <?php _e('Category', 'gb_like_button') ?>
								</td>
								<td valign="bottom">
								<input name="gxtb_fb_lB_analytics_category" type="text" value="<?php if ($gxtb_fb_lB_analytics['category'] != "") { echo stripslashes($gxtb_fb_lB_analytics['category']); } else {echo "";} ?>" size="49" />
								</td>
							</tr> 							
							<tr>
								<td valign="bottom">
									<input type="checkbox" class="checkbox" name="gxtb_fb_lB_analytics_archiv_activ" <?php if ($gxtb_fb_lB_analytics['archiv_activ']) echo("checked"); ?> onmouseover="tooltip.show('<?php _e('Activate this checkbox if you want to use this ref-definition for archive-sites.', 'gb_like_button'); ?>');" onmouseout="tooltip.hide();"/> <?php _e('Archive', 'gb_like_button') ?>
								</td>
								<td valign="bottom">
								<input name="gxtb_fb_lB_analytics_archiv" type="text" value="<?php if ($gxtb_fb_lB_analytics['archiv'] != "") { echo stripslashes($gxtb_fb_lB_analytics['archiv']); } else {echo "";} ?>" size="49" />
								</td>
							</tr>
						</table>	
							
                         </td>
                    </tr>
					
                    <tr>
                        <td class="gb-table-tipp"><small><?php _e('Use the ref attribute to help you test different placements and types of Like buttons. Append the ref="" attribute to the Like button, making sure that the value you choose is <b>less than 50 characters (a-z, A-Z, 0-9, + / = - . : _)</b>.', 'gb_like_button') ?></small></td>
                    </tr>
					
				    <tr>
                    	<td width="20%" rowspan="2" valign="top" class="gb-table-header">
							<strong>Facebook-Information</strong>
						</td>
                        <td width="80%" valign="top"><i>
							<?php _e('We recently added the ref and source parameters to help you test and optimize Like button performance on your website (<a href="http://developers.facebook.com/docs/reference/plugins/like">read more</a> about the attributes). For instance, you can now easily A/B test different types and placements of the Like button to determine the implementation that maximizes referral traffic to your site. ', 'gb_like_button') ?>
                         </i></td>
                    </tr>
                    <tr>
                        <td>
						</td>
                    </tr>
					
					
					 <tr>
                    	<td width="20%" rowspan="2" valign="top" class="gb-table-header">
							<strong>
								<?php _e('How can I analyse this?', 'gb_like_button') ?>
							</strong>
						</td>
                        <td width="80%" valign="top">
								<?php _e('If you visit <a href="http://www.facebook.com/insights" target="_blank">facebook.com/insights</a> and register your domain, you can see the number of likes on your domain each day and the demographics of who is clicking the Like button.', 'gb_like_button') ?>
                         </td>
                    </tr>
                    <tr>
                        <td class="gb-table-tipp">
						<small><strong><?php _e('published by Facebook', 'gb_like_button') ?></strong></small>
						</td>
                    </tr>

					
				</tbody>
	</table>

<?php 

//} // end if
} // end function
} // end class
} // end of Class-if
?>