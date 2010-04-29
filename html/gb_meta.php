<?php // Do not delete these lines
	if (!empty($_SERVER['SCRIPT_FILENAME']) && basename(__file__) == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');
?>
<?php
/*
+----------------------------------------------------------------+
+	Like-Button-Plugin-For-Wordpress-Metaboxes [v1.3.5]
+	by Stefan Natter (http://www.gangxtaboii.com)
+   required for Like-Button-Plugin-For-Wordpress and WordPress 2.7.x or higher
+----------------------------------------------------------------+
*/

########################################################################################################

class gxtb_fb_lB_mBMClass {


## META-TAGS	
public static function gxtb_contentbox_4() {
	$gxtb_fb_lB_meta = get_option('gxtb_fb_lB_meta');
		?>
        	<table class="form-table" style="width: 70%;" border="0">
		        <tbody>

<?php ## META-TAGS ## ?>	
                    <tr>
                    	<td width="20%" rowspan="2" valign="top"><strong><?php _e('Open Graph Protocol - Needed Meta-Tags', 'gb_like_button') ?></strong></td>
                        <td width="80%" valign="bottom">

							<?php include_once('gb_meta.php');
							gxtb_fb_lB_mBMClass::gb_contentbox_4_meta(); ?>

                         </td>
                    </tr>
                    <tr>
                        <td>
							<small>
									<?php _e('Insert all meta-tags you need into this textboxes', 'gb_like_button') ?><br />
                        		   	<?php _e('You&prime;ll find examples here: <a href="http://developers.facebook.com/docs/opengraph" target="_blank">http://developers.facebook.com/docs/opengraph</a>', 'gb_like_button') ?><br />
                        			<?php _e('<b>Important:</b> You can put GB-Shortcodes into this boxes! This Shortcodes will then work as php-Code in the Background.', 'gb_like_button') ?><br />
									<?php _e('<b>GB-Meta-Shortcodes:</b>  Site-Name => $bname || Page-Title => $ptitle || Page-URL => $plink', 'gb_like_button') ?><br />
									<?php _e('<b>Example:</b> If you use: Page-Title => $ptitle || If a visitor visits a page or post of your blog the title of this page/post will be the content of this meta-tag dynamically. The same will happen with the 
											$purl-GB-Shortocde.', 'gb_like_button') ?>
                        	</small>
						</td>
                    </tr>	
<?php ## ADITIONAL-META-TAGS ## ?>								
                    <tr>
                    	<td width="20%" rowspan="2" valign="top"><strong><?php _e('Open Graph Protocol - Aditional-Meta-Tags', 'gb_like_button') ?></strong></td>
                        <td width="80%" valign="bottom">

							<?php include_once('gb_meta.php');
							gxtb_fb_lB_mBMClass::gb_contentbox_4_meta_aditional(); ?>

                         </td>
                    </tr>
                    <tr>
                        <td>
							<small>
								<?php _e('You don&acute;t have to use this meta-tags. But they are additional if you want to specify your blog/content.', 'gb_like_button') ?><br />
							</small>
						</td>
                    </tr>	

                    <tr>
                    	<td width="20%" rowspan="2" valign="top"><strong><?php _e('Link-Relation', 'gb_like_button') ?></strong></td>
                        <td width="80%" valign="bottom">
                        	<input type="checkbox" class="checkbox" name="gxtb_fb_lB_meta_post_focus" <?php if ($gxtb_fb_lB_meta['post_focus']) echo("checked"); ?> />
                         </td>
                    </tr>
                    <tr>
                        <td>
							<small>
								<?php _e('Activate this option if you want to show "Likes" like this on facebook:', 'gb_like_button') ?> <i><a href="http://www.gangxtaboii.com" target="_blank">GangXtaBoii</a> likes <a href="http://www.gangxtaboii.com" target="_blank">Like-Button-Plugin-For-Wordpress</a> on <a href="http://www.gangxtaboii.com" target="_blank">GangXtaBoii.com</a></i>
							</small>
						</td>
                    </tr>
               </tbody>
            </table>
    <?php
	}

static function gb_contentbox_4_meta() {
	$gxtb_fb_lB_meta = get_option('gxtb_fb_lB_meta');
?>

						<table border="1" cellspacing="0" cellpadding="0">
							<tr>
								<td valign="bottom">							
									<?php _e('Site-Name', 'gb_like_button') ?>:
								</td>
								<td valign="bottom">
									<input type="text" name="gxtb_fb_lB_meta_site_name" value="<?php if ($gxtb_fb_lB_meta['site_name'] != "") {echo $gxtb_fb_lB_meta['site_name'];} else {echo "";} ?>" />
								</td>

								<td valign="bottom">							
									<?php _e('Admins', 'gb_like_button') ?>:
								</td>
								<td valign="bottom">
									<input type="text" name="gxtb_fb_lB_meta_admins" value="<?php if ($gxtb_fb_lB_meta['admins'] != "") {echo $gxtb_fb_lB_meta['admins'];} else {echo "";} ?>" />
								</td>
							</tr>
							
							<tr>
								<td valign="bottom">							
									<?php _e('Blog-Type', 'gb_like_button') ?>:
 								</td>
								<td valign="bottom">
									<input type="text" name="gxtb_fb_lB_meta_type" value="<?php if ($gxtb_fb_lB_meta['type'] != "") {echo $gxtb_fb_lB_meta['type'];} else {echo "";} ?>" />
								</td>
								
								<td valign="bottom">							
									<div id="gxtb_fb_lB_meta_appid_div"><?php _e('AppID', 'gb_like_button') ?>:</div>
								</td>
								<td valign="bottom">
									<input type="text" name="gxtb_fb_lB_meta_appid" value="<?php if ($gxtb_fb_lB_meta['appid'] != "") {echo $gxtb_fb_lB_meta['appid'];} else {echo "";} ?>" />
								</td>
							</tr>	
												
							<tr>
								<td valign="bottom">							
									<?php _e('Page-Title', 'gb_like_button') ?>:
								</td>
								<td valign="bottom">
									<input type="text" name="gxtb_fb_lB_meta_title" value="<?php if ($gxtb_fb_lB_meta['title'] != "") {echo $gxtb_fb_lB_meta['title'];} else {echo "";} ?>" />
								</td>
								<td valign="bottom" colspan="2">							
									<?php _e('You only have to enter one of this to Meta-Tags (Admin or AppID).', 'gb_like_button') ?>
								</td>
							</tr>
							
							<tr>
								<td valign="bottom">							
									<?php _e('Page-URL', 'gb_like_button') ?>:
								</td>
								<td valign="bottom">
									<input type="text" name="gxtb_fb_lB_meta_url" value="<?php if ($gxtb_fb_lB_meta['url'] != "") {echo $gxtb_fb_lB_meta['url'];} else {echo "";} ?>" />
								</td>
							</tr>	

							<tr>
								<td valign="top">
									<?php _e('Page-Description', 'gb_like_button') ?>:
								</td>
								<td valign="bottom" colspan="3">
									<textarea name="gxtb_fb_lB_meta_description" rows="5"/ style="width:100%"><?php if ($gxtb_fb_lB_meta['description'] != "") {echo $gxtb_fb_lB_meta['description'];} else {echo "";} ?></textarea>
								</td>
							</tr>

							<tr>
								<td valign="bottom">							
									<?php _e('Image', 'gb_like_button') ?>: 
								</td>
								<td valign="bottom">
									<input type="text" name="gxtb_fb_lB_meta_image" value="<?php if ($gxtb_fb_lB_meta['image'] != "") {echo $gxtb_fb_lB_meta['image'];} else {echo "";} ?>" />
								</td>
							</tr>												
						</table>

<?php
}

static function gb_contentbox_4_meta_aditional() {
	$gxtb_fb_lB_meta = get_option('gxtb_fb_lB_meta');
?>
						<table border="1" cellspacing="0" cellpadding="0">

							<tr>
								<td valign="bottom">
									<?php _e('Postal-Code', 'gb_like_button') ?>:
								</td>
								<td valign="bottom">
									<input type="text" name="gxtb_fb_lB_meta_plz" value="<?php if ($gxtb_fb_lB_meta['plz'] != "") {echo $gxtb_fb_lB_meta['plz'];} else {echo "";} ?>" />
								</td>
								
								<td valign="bottom">
									<?php _e('E-Mail', 'gb_like_button') ?>:						
								</td>
								<td valign="bottom">
									<input type="text" name="gxtb_fb_lB_meta_mail" value="<?php if ($gxtb_fb_lB_meta['mail'] != "") {echo $gxtb_fb_lB_meta['mail'];} else {echo "";} ?>" />
								</td>
							</tr>							
							<tr>
								<td valign="bottom">							
									<?php _e('Street-Address', 'gb_like_button') ?>:
								</td>
								<td valign="bottom">
									<input type="text" name="gxtb_fb_lB_meta_street" value="<?php if ($gxtb_fb_lB_meta['street'] != "") {echo $gxtb_fb_lB_meta['street'];} else {echo "";} ?>" />
								</td>


								<td valign="bottom">
									<?php _e('Phone-Number', 'gb_like_button') ?>:
								</td>
								<td valign="bottom">
									<input type="text" name="gxtb_fb_lB_meta_phone" value="<?php if ($gxtb_fb_lB_meta['phone'] != "") {echo $gxtb_fb_lB_meta['phone'];} else {echo "";} ?>" />
								</td>
							</tr>					
							<tr>
								<td valign="bottom">							
									<?php _e('Locality', 'gb_like_button') ?>:
								</td>
								<td valign="bottom">
									<input type="text" name="gxtb_fb_lB_meta_locality" value="<?php if ($gxtb_fb_lB_meta['locality'] != "") {echo $gxtb_fb_lB_meta['locality'];} else {echo "";} ?>" />
								</td>

								<td valign="bottom">							
									<?php _e('Fax-Number', 'gb_like_button') ?>:
								</td>
								<td valign="bottom">
									<input type="text" name="gxtb_fb_lB_meta_fax" value="<?php if ($gxtb_fb_lB_meta['fax'] != "") {echo $gxtb_fb_lB_meta['fax'];} else {echo "";} ?>" />
								</td>
							</tr>							
							<tr>
								<td valign="bottom">							
									<?php _e('Region', 'gb_like_button') ?>:
								</td>
								<td valign="bottom">
									<input type="text" name="gxtb_fb_lB_meta_region" value="<?php if ($gxtb_fb_lB_meta['region'] != "") {echo $gxtb_fb_lB_meta['region'];} else {echo "";} ?>" />
								</td>
							</tr>							
							<tr>
								<td valign="bottom">							
									<?php _e('Country', 'gb_like_button') ?>:
								</td>
								<td valign="bottom">
									<input type="text" name="gxtb_fb_lB_meta_country" value="<?php if ($gxtb_fb_lB_meta['country'] != "") {echo $gxtb_fb_lB_meta['country'];} else {echo "";} ?>" />
								</td>
							</tr>							
							<tr>
								<td valign="bottom">							
									<?php _e('Latitude', 'gb_like_button') ?>:
								</td>
								<td valign="bottom">
									<input type="text" name="gxtb_fb_lB_meta_latitude" value="<?php if ($gxtb_fb_lB_meta['latitude'] != "") {echo $gxtb_fb_lB_meta['latitude'];} else {echo "";} ?>" />
								</td>
								<td valign="bottom">							
									<?php _e('Longitude', 'gb_like_button') ?>:
								</td>
								<td valign="bottom">
									<input type="text" name="gxtb_fb_lB_meta_longitude" value="<?php if ($gxtb_fb_lB_meta['longitude'] != "") {echo $gxtb_fb_lB_meta['longitude'];} else {echo "";} ?>" />
								</td>
							</tr>
						</table>
						
<script type="text/javascript">
function appID() {

	var checkbox = document.getElementById("gxtb_fb_lB_jdk");
	var div = document.getElementById("gxtb_fb_lB_meta_appid_div");
	
	if(document.settingpage.gxtb_fb_lB_jdk.checked == true)
		div.innerHTML =
		"<b><?php _e('AppID', 'gb_like_button') ?>: required</b>";
	else
		div.innerHTML =
		"<?php _e('AppID', 'gb_like_button') ?>:";
}
</script>

<?php } 

}?>