<?php // Do not delete these lines
	if (!empty($_SERVER['SCRIPT_FILENAME']) && basename(__file__) == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');
?>
<?php
/*
+----------------------------------------------------------------+
+	Like-Button-Plugin-For-Wordpress [v4.2.1]
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
##################### by gb-world.net 	############
####################################################

class gxtb_fb_lB_mBClass {

########################################################################################################
											## FAQ-BOX  ##	
## FAQ-BOX
	public static  function gxtb_contentbox_5() {
	global $gb_fb_lB_path;
		?>

<table class="form-table" style="width:80%;" border="0" id="gb-table">

		        <tbody>
           
                    <tr>
                    	<td width="20%" rowspan="2" valign="middle" class="gb-table-header">
							<strong>
								<?php _e('How do I activate the Like-Button?', gxtb_fb_lB_lang) ?>
							</strong>
						</td>
                        <td width="80%" valign="middle">
							<ol>
								<li><?php _e('Install the Plugin', gxtb_fb_lB_lang) ?></strong></li>
								<li><?php _e('Go to the Settings-Page and complete all the required information and activate the Plugin with the first checkbox on this site.', gxtb_fb_lB_lang) ?></li>
							</ol>
                         </td>
                    </tr>
                    <tr>
                        <td class="gb-table-tipp">
						</td>
                    </tr>
					
					<tr>
                    	<td width="20%" rowspan="2" valign="middle" class="gb-table-header">
							<strong>
								<?php _e('FB Button Settings', gxtb_fb_lB_lang) ?>
							</strong>
						</td>
                        <td width="80%" valign="middle">
							<ol>
             		        	<li><u><?php _e('Dynamic Like-Button', gxtb_fb_lB_lang); ?>:</u> <?php _e('Every page will have its own unique like-button if you activate this checkbox. Otherwise every page will use the same facebook-like-button.', gxtb_fb_lB_lang); ?></li>
                                <li><u><?php _e('Language', gxtb_fb_lB_lang); ?>:</u> <?php _e('It is possible to choose a language for your button. But keep in mind that you have to activate XFBML (Java-SDK) and you must have a valid appID.', gxtb_fb_lB_lang); ?></li>
							</ol>
                         </td>
                    </tr>
                    <tr>
                        <td class="gb-table-tipp">
						</td>
                    </tr>
					
					<tr>
                    	<td width="20%" rowspan="2" valign="middle" class="gb-table-header">
							<strong>
								<?php _e('XFBML (Java-SDK) or iFrame', gxtb_fb_lB_lang) ?>
							</strong>
						</td>
                        <td width="80%" valign="middle">
							<ol>
             		        	<li><?php _e('The basic Like button is available via a simple <b>iframe</b> you can drop into your page easily. A fuller-featured Like button is available via the <b>&lt;fb:like&gt; XFBML tag</b> and requires you use the new <b>JavaScript SDK</b>. The XFBML version allows users to add a <b>comment to their like as it is posted back to Facebook</b>. The XFBML version also <b>dynamically sizes its height</b>; for example, if there are no profile pictures to display, the plugin will only be tall enough for the button itself.', gxtb_fb_lB_lang) ?> <small>(<?php _e('definition by Facebook', gxtb_fb_lB_lang) ?>)</small>
								</li>
							</ol>
                         </td>
                    </tr>
                    <tr>
                        <td class="gb-table-tipp">
						</td>
                    </tr>
					
					<tr>
                    	<td width="20%" rowspan="2" valign="middle" class="gb-table-header">
							<strong id="meta_app">
								<?php _e('Meta-Tag: App-ID', gxtb_fb_lB_lang) ?>
							</strong>
						</td>
                        <td width="80%" valign="middle">
							<ol>
             		        	<li><?php _e('You have to enable your domain as Connect-Domain of your FB-App. Visit the developer-page of your Facebook-App (<a href="http://www.facebook.com/developers" target="_blank">http://www.facebook.com/developers</a>) and then click on your App and then on "Edit Settings". After that Step you have to visit "Web Site" and fill in the "Site Domain"-Option and also the "Site URL". After that your Domain is connected with your App.', gxtb_fb_lB_lang); ?>
								<br /><br />
								<?php echo sprintf( '%s <a href="http://www.gb-world.net/forum/viewforum.php?f=22" target="_blank">%s</a>.', __('Write us a little support-topic if you need help with that meta-tag in our', gxtb_fb_lB_lang), __('Forum', gxtb_fb_lB_lang)); ?>
								</li>
							</ol>
                         </td>
                    </tr>
                    <tr>
                        <td class="gb-table-tipp">
						</td>
                    </tr>
					
					<tr>
                    	<td width="20%" rowspan="2" valign="middle" class="gb-table-header">
							<strong>
								<?php _e('How does it look on Facebook if someone likes something?', gxtb_fb_lB_lang) ?>
							</strong>
						</td>
                        <td width="80%" valign="middle">
							<ol>
             		           <li>
							   	<?php _e('If you want that the "Likes" appear on facebook like this:', 'gb_like_button'); ?> <i><a href="http://www.gb-world.net" target="_blank"  onmouseover="tooltip.show('<?php _e('Author of this plugin', 'gb_like_button'); ?>');" onmouseout="tooltip.hide();">GangXtaBoii</a> likes <a href="http://www.gb-world.net" target="_blank">Like-Button-Plugin-For-Wordpress</a> on <a href="http://www.gb-world.net" target="_blank">GB-World.net</a></i><br />
                               	 <?php echo sprintf('%s <a href="#gxtb_fb_lB_meta_site_name">%s</a>.', __('you have to fill in a ', 'gb_like_button'), __('Sitename (Meta-Tag)', 'gb_like_button')); ?>
								</li>
							</ol>
                         </td>
                    </tr>
                    <tr>
                        <td class="gb-table-tipp">
						</td>
                    </tr>
					
					<tr>
                    	<td width="20%" rowspan="2" valign="middle" class="gb-table-header">
							<strong>
								<?php _e('Facebook-Generator-FAQ:', gxtb_fb_lB_lang) ?>
							</strong>
						</td>
                        <td width="80%" valign="middle">
							<ol>
             		        	<li><?php _e('The URL must look like this -> http://example.com. Otherwise the Button will not work properly.', gxtb_fb_lB_lang); ?></li>
                                <li><?php _e('Now choose your layout style, width, height, font, verb to display, color scheme and if faces should be shown.', gxtb_fb_lB_lang); ?></li>
							</ol>
                         </td>
                    </tr>
                    <tr>
                        <td class="gb-table-tipp">
						</td>
                    </tr>
					
					<tr>
                    	<td width="20%" rowspan="2" valign="middle" class="gb-table-header">
							<strong>
								<?php _e('[like]-Shortcode', gxtb_fb_lB_lang) ?>
							</strong>
						</td>
                        <td width="80%" valign="middle">
							<ol>
             		        	<li><?php _e('You only have to insert <strong>[like]</strong> into a post/article and your like-Button (generated on this Option-Page) will appear', gxtb_fb_lB_lang) ?></li>
							</ol>
                         </td>
                    </tr>
                    <tr>
                        <td class="gb-table-tipp">
						</td>
                    </tr>
					
					<tr>
                    	<td width="20%" rowspan="2" valign="middle" class="gb-table-header">
							<strong>
								<?php _e('Facebook-Like-Button-Widget', gxtb_fb_lB_lang) ?>
							</strong>
						</td>
                        <td width="80%" valign="middle">
							<ol>
             		           <li><?php _e('Go to the Widgets-Page on the left. Add the "Facebook-Like-Button" Widget and add the required information.', gxtb_fb_lB_lang) ?></li>
							   <li><?php _e('The URL must look like the URL for the Facebook-Generator on this site.', gxtb_fb_lB_lang) ?></li>
							</ol>
                         </td>
                    </tr>
                    <tr>
                        <td class="gb-table-tipp">
						</td>
                    </tr>
					
					<tr>
                    	<td width="20%" rowspan="2" valign="middle" class="gb-table-header">
							<strong>
								<?php _e('The Tooltips do not work', gxtb_fb_lB_lang) ?>  <img src="<?php echo gxtb_fb_lB_PLUGIN_FOLDER; ?>/images/rot17a.gif" onmouseover="tooltip.show('<?php _e('It works :)', gxtb_fb_lB_lang); ?>');" onmouseout="tooltip.hide();">
							</strong>
						</td>
                        <td width="80%" valign="middle">
							<ol>
             		           <li><?php _e('Press F5, load the page again or delete your cache and try it again.', gxtb_fb_lB_lang) ?></li>
							</ol>
                         </td>
                    </tr>
                    <tr>
                        <td class="gb-table-tipp">
						</td>
                    </tr>
					
					<tr>
                    	<td width="20%" rowspan="2" valign="middle" class="gb-table-header">
							<strong>
								<?php _e('What is Facebook Insights Tools?', gxtb_fb_lB_lang) ?>
							</strong>
						</td>
                        <td width="80%" valign="middle">
							<ol>
             		           <li><?php _e('If you visit <a href="http://www.facebook.com/insights" target="_blank">facebook.com/insights</a> and register your domain, you can see the number of likes on your domain each day and the demographics of who is clicking the Like button.', gxtb_fb_lB_lang) ?></li>
							</ol>
                         </td>
                    </tr>
                    <tr>
                        <td class="gb-table-tipp">
						</td>
                    </tr>
					
					<tr>
                    	<td width="20%" rowspan="2" valign="middle" class="gb-table-header">
							<strong>
								<?php _e('What can I do if I need help?', gxtb_fb_lB_lang) ?>
							</strong>
						</td>
                        <td width="80%" valign="middle">
							<ol>
             		           <li><?php echo sprintf( '%s <a href="http://www.gb-world.net/forum" target="_blank">%s</a>, <a href="http://www.gb-world.net/" target="_blank">%s</a>, <a href="http://bugs.gb-world.net/" target="_blank">%s</a> <b>(%s)</b> %s <a href="http://www.facebook.com/pages/GB-World/119752364716058" target="_blank">%s</a>!', __('Contact us in our', gxtb_fb_lB_lang), __('Forum', gxtb_fb_lB_lang), __('Blog', gxtb_fb_lB_lang), __('BugTracker', gxtb_fb_lB_lang), __('only for Bugreports', gxtb_fb_lB_lang),  __('or', gxtb_fb_lB_lang), __('Facebook-Fanpage', gxtb_fb_lB_lang)  ) ?></li>
							</ol>
                         </td>
                    </tr>
                    <tr>
                        <td class="gb-table-tipp">
						</td>
                    </tr>

			</tbody>
</table>	
	<?php
	}
}
?>