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

class gxtb_fb_lB_mBMClass {


## META-TAGS	
public static function gxtb_contentbox_4() {
	$gxtb_fb_lB_meta = get_option('gxtb_fb_lB_meta');
	global $gb_fb_lB_path;
		?>
        	<table class="form-table" border="0" style="width:70%">
		        <tbody>

<?php ## META-TAGS ## ?>	
                    <tr>
                    	<td width="20%" rowspan="2" valign="top"><strong><?php _e('Open Graph Protocol - Needed Meta-Tags', 'gb_like_button') ?></strong></td>
                        <td width="80%" valign="bottom">

							<?php gxtb_fb_lB_mBMClass::gb_contentbox_4_meta(); ?>

                         </td>
                    </tr>
                    <tr>
                        <td>
							<small>
									<?php _e('Insert all meta-tags you need into this textboxes', 'gb_like_button') ?><br />
                        		   	<?php _e('You&prime;ll find examples here: <a href="http://developers.facebook.com/docs/opengraph" target="_blank">http://developers.facebook.com/docs/opengraph</a>', 'gb_like_button') ?><br />
                        			<?php _e('<b>Important:</b> You can put GB-Shortcodes into this boxes! This Shortcodes will then work as php-Code in the Background.', 'gb_like_button') ?><br />
									<?php _e('<b>GB-Meta-Shortcodes:</b>  Site-Name => <b>$binfo</b> || Page-Title => <b>$ptitle</b> || Page-URL => <b>$plink</b>', 'gb_like_button') ?><br />
									<?php _e('<b>Example:</b> If you use: Page-Title => $ptitle || If a visitor visits a page or post of your blog the title of this page/post will be the content of this meta-tag dynamically. The same will happen with the $purl-GB-Shortocde.', 'gb_like_button') ?>
                        	</small>
						</td>
                    </tr>
                    
<?php ## ADITIONAL-META-TAGS ## ?>								
                    <tr>
                    	<td width="20%" rowspan="2" valign="top"><strong><?php _e('Open Graph Protocol - Aditional-Meta-Tags', 'gb_like_button') ?></strong></td>
                        <td width="80%" valign="bottom">

							<?php gxtb_fb_lB_mBMClass::gb_contentbox_4_meta_aditional(); ?>

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
                    	<td width="20%" rowspan="3" valign="top"><strong><?php _e('Link-Relation', 'gb_like_button') ?></strong> <img src="<?php echo $gb_fb_lB_path; ?>/images/rot17a.gif"  onmouseover="tooltip.show('<?php _e('<b>Important:</b> If you activate this option you have to add some attributes to your html-tag.', 'gb_like_button'); ?>');" onmouseout="tooltip.hide();"></td>
                        <td width="80%" valign="bottom">
                        	<input type="checkbox" class="checkbox" name="gxtb_fb_lB_meta_post_focus" onchange="post_focus();" <?php if ($gxtb_fb_lB_meta['post_focus']) echo("checked"); ?> />
                         </td>
                    </tr>
                    <tr>
                        <td>
							<small>
								<?php _e('Activate this option if you want to show "Likes" like this on facebook:', 'gb_like_button') ?> <i><a href="http://www.gangxtaboii.com" target="_blank"  onmouseover="tooltip.show('<?php _e('Author of this plugin', 'gb_like_button'); ?>');" onmouseout="tooltip.hide();">GangXtaBoii</a> likes <a href="http://www.gb-world.net" target="_blank">Like-Button-Plugin-For-Wordpress</a> on <a href="http://www.gb-world.net" target="_blank">GB-World.net</a></i><br />
                                <?php _e('<b>Notice:</b> You must fill in the Page-URL-Meta-Tag.', 'gb_like_button') ?>
							</small>
						</td>
                    </tr>
					<tr>
                        <td colspan="5">
							<div id="gxtb_fb_lB_meta_post_focus_div">
                            <?php if($gxtb_fb_lB_meta['post_focus']) { 
							
							echo "<img class='gxtb_image' src=". get_bloginfo('wpurl') ."/wp-content/plugins/like-button-plugin-for-wordpress/screenshot-2.png></img><br><br>";
							_e('You have to enter this two attributes to the &lt;head&gt;-tag in your &quot;Template-header.php&quot;-file.', 'gb_like_button');
							echo "<br><br><b>";
							echo "xmlns:og=&quot;http://opengraphprotocol.org/schema/&quot;";
							echo "<br>";
							echo "xmlns:fb=&quot;http://www.facebook.com/2008/fbml&quot;&gt;";
							echo "</b><br><br>";
							_e('If you do not do this the Open-Graph-Protocol will not work with all its functions.', 'gb_like_button'); 
							 }?>&nbsp;
                            </div>
						</td>
                    </tr>
               </tbody>
            </table>
    <?php
	}

static function gb_contentbox_4_meta() {
	$gxtb_fb_lB_meta = get_option('gxtb_fb_lB_meta');
	$gxtb_fb_lB_settings = get_option('gxtb_fb_lB_settings');
	global $gb_fb_lB_path;
	
	$blogtype = array(
		"",
		"blog",
		"website",
		"article",
		"activity",
		"sport",
		"bar",
		"company",
		"cafe",
		"hotel",
		"restaurant",
		"cause",
		"sports_league",
		"sports_team",
		"band",
		"government",
		"non_profit",
		"school",
		"university",
		"actor",
		"athlete",
		"author",
		"director",
		"musician",
		"politician",
		"public_figure",
		"city",
		"country",
		"landmark",
		"state_province",
		"album",
		"book",
		"drink",
		"food",
		"game",
		"product",
		"song",
		"movie",
		"tv_show"
);
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
									<?php _e('Admin-IDs', 'gb_like_button') ?>:
								</td>
								<td valign="bottom">
									<input type="text" name="gxtb_fb_lB_meta_admins" value="<?php if ($gxtb_fb_lB_meta['admins'] != "") {echo $gxtb_fb_lB_meta['admins'];} else {echo "";} ?>" /> <img src="<?php echo $gb_fb_lB_path; ?>/images/rot17a.gif"  onmouseover="tooltip.show('<?php _e('<b>Important:</b> The AdminID is your Facebook-Profile-ID or the FB-Profile-IDs of the other admins of this Like-Button.', 'gb_like_button'); ?>');" onmouseout="tooltip.hide();">
								</td>
							</tr>
							
							<tr>
								<td valign="bottom" onmouseover="gxtb_blogtype()">							
									<?php _e('Blog-Type', 'gb_like_button') ?>:
 								</td>
								<td valign="bottom" onmouseover="gxtb_blogtype()">                             
                                    <SELECT NAME="gxtb_fb_lB_meta_type" id="gxtb_fb_lB_meta_type" onchange="gxtb_blogtype()" onblur="gxtb_blogtype()" onfocus="gxtb_blogtype()">
                                    <?php
                                    $i = $blogtype;
                                      foreach($i as $variable) {
                                        if($variable == $gxtb_fb_lB_meta['type']) {
                                            echo '<OPTION selected>' . $variable .'</OPTION>';
                                        } else {
                                            echo '<OPTION>' . $variable .'</OPTION>';
                                        }
                                    }
                                    ?>
                                    </SELECT> <img src="<?php echo $gb_fb_lB_path; ?>/images/rot17a.gif" style="visibility:hidden" id="gxtb_fb_lB_meta_type_img" onmouseover="" onmouseout="tooltip.hide();">
                    			</td>
								
								<td valign="bottom">							
									<div id="gxtb_fb_lB_meta_appid_div">
										<?php if(!$gxtb_fb_lB_settings['JDK']) { _e('AppID', 'gb_like_button'); } else { ?> <b><?php _e('AppID: (required)', 'gb_like_button'); ?></b>:<?php } ?>
                                    </div>
								</td>
								<td valign="bottom">
									<input type="text" name="gxtb_fb_lB_meta_appid" value="<?php if ($gxtb_fb_lB_meta['app_id'] != "") {echo $gxtb_fb_lB_meta['app_id'];} else {echo "";} ?>" /> <img src="<?php echo $gb_fb_lB_path; ?>/images/rot17a.gif"  onmouseover="tooltip.show('<?php _e('<b>Notice:</b> Visit the Page mentioned below to get a valid AppID if you do not have one.', 'gb_like_button'); ?>');" onmouseout="tooltip.hide();">
								</td>
							</tr>	
												
							<tr>
								<td valign="bottom">							
									<?php _e('Page-Title', 'gb_like_button') ?>:
								</td>
								<td valign="bottom">
									<input type="text" name="gxtb_fb_lB_meta_title" value="<?php if ($gxtb_fb_lB_meta['title'] != "") {echo $gxtb_fb_lB_meta['title'];} else {echo "";} ?>" />
								</td>
								<td valign="bottom" colspan="2" rowspan="2">							
									<?php _e('You only have to enter one of this to Meta-Tags (Admin-ID or AppID) as long as you don not use XFBML (Java-SDK).', 'gb_like_button') ?><br />
                                    <?php _e('<b>APPID:</b> If you want to use XFBML (Java-SDK) you have to enter a valid Facebook-App-ID (<a href="http://developers.facebook.com/setup/" target="_blank">GET an APPID</a>).', 'gb_like_button') ?><br />
                                	<?php _e('<b>Admin-ID:</b> Facebook-Profile-IDs of all Administrators of this Like-Button. (<a href="http://apps.facebook.com/whatismyid/" target="_blank">WhatsMyID</a>)', 'gb_like_button') ?><br />
								</td>
							</tr>
							
							<tr>
								<td valign="top">							
									<?php _e('Page-URL', 'gb_like_button') ?>:
								</td>
								<td valign="top">
									<input type="text" name="gxtb_fb_lB_meta_url" value="<?php if ($gxtb_fb_lB_meta['url'] != "") {echo $gxtb_fb_lB_meta['url'];} else {echo "";} ?>" />
								</td>
							</tr>	

							<tr>
								<td valign="top">
									<?php _e('Page-Description', 'gb_like_button') ?>:
								</td>
								<td valign="bottom" colspan="4">
									<textarea name="gxtb_fb_lB_meta_description" rows="5"/ style="width:100%"><?php if ($gxtb_fb_lB_meta['description'] != "") {echo $gxtb_fb_lB_meta['description'];} else {echo "";} ?></textarea><br />
                                    <input type='Radio' Name='gxtb_fb_lB_meta_description_usage' value='blogd' <?php if($gxtb_fb_lB_meta['dusage'] == "blogd") echo "checked"; ?> >
                                    	<span class="hotspot" onmouseover="tooltip.show('<?php _e('The Blog-Description will be used for this Meta-Tag', 'gb_like_button') ?>');" onmouseout="tooltip.hide();">
											<?php _e('Use Blog-Description', 'gb_like_button') ?>
                                        </span><br />
									<input type='Radio' Name='gxtb_fb_lB_meta_description_usage' value='bloge' <?php if($gxtb_fb_lB_meta['dusage'] == "bloge") echo "checked"; ?>>
										<span class="hotspot" onmouseover="tooltip.show('<?php _e('<u>Example:</u> If a user visits Post A this Meta-Tag will display the Excerpt of Post A.<br><br><small><u>Recommended</u>: because with this option every post has its unique description.</small>', 'gb_like_button') ?>');" onmouseout="tooltip.hide();">
											<?php _e('Use the excerpt of the shown page/post', 'gb_like_button') ?>
                                        </span><br />
                                    <input type='Radio' Name='gxtb_fb_lB_meta_description_usage' value='blogn' <?php if($gxtb_fb_lB_meta['dusage'] == "blogn") echo "checked"; ?>>
										<span class="hotspot" onmouseover="tooltip.show('<?php _e('The text in the textarea above will be displayed', 'gb_like_button') ?>');" onmouseout="tooltip.hide();">
											<?php _e('Use this description', 'gb_like_button') ?>
                                        </span>
								</td>
							</tr>

							<tr>
								<td valign="top">							
									<?php _e('Image', 'gb_like_button') ?>: 
								</td>
								<td valign="top" colspan="5">
									<input type="text" onchange="gxtb_image_src()" onselect="gxtb_image_src()" onfocus="gxtb_image_src()" id="gxtb_fb_lB_meta_image" name="gxtb_fb_lB_meta_image" value="<?php if ($gxtb_fb_lB_meta['image'] != "") {echo $gxtb_fb_lB_meta['image'];} else {echo "";} ?>" size="50"/> <img src="<?php echo $gb_fb_lB_path; ?>/images/rot17a.gif"  onmouseover="tooltip.show('<?php _e('Complete URL of your Blog-Image which will appear on facebook if somebody posts his like-action on his wall.<br><b>Example:</b> if you use an facebook-app and post it on your wall there is always a little image on the left side of this post. And the same will happen with your image.', 'gb_like_button'); ?>');" onmouseout="tooltip.hide();">
								</td>
							</tr>

							<tr>
								<td valign="top" colspan="1">							
									<?php _e('Preview', 'gb_like_button') ?>:
								</td>
								<td valign="top" colspan="4">
                                
                                <table class="gxtb_img_preview">
                                    <tr>
                                   		<td>
                                            <div id="gxtb_img_preview_div"><?php gxtb_fb_lB_mBMClass::gxtb_maxImage($gxtb_fb_lB_meta['image']);?></div>
                                        </td>
                                    </tr>
                                    <tr>
                                    	<td>
                                    		<small><?php _e('(real image-output may vary - previews are only available until 400px (width))', 'gb_like_button') ?></small>
                                    	</td>
                                    </tr>
                                </table>
                                    
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

	var div = document.getElementById("gxtb_fb_lB_meta_appid_div");
	
	if(document.settingpage.gxtb_fb_lB_jdk.checked == true) {
		div.innerHTML =
		"<b><?php _e('AppID: (required)', 'gb_like_button') ?></b>";

		gxtb_generator_elements_disable();
	}else {
		div.innerHTML =
		"<?php _e('AppID', 'gb_like_button') ?>:";
		
		gxtb_generator_elements_enable();
	}
}

function post_focus() {

	var div = document.getElementById("gxtb_fb_lB_meta_post_focus_div");
	
	if(document.settingpage.gxtb_fb_lB_meta_post_focus.checked == true) {
		div.innerHTML =
		"<img class='gxtb_image' src=<?php echo bloginfo('wpurl'); ?>/wp-content/plugins/like-button-plugin-for-wordpress/screenshot-2.png>"
		+ "<br><br>"
		+ "<?php _e('You have to enter this two attributes to the &lt;head&gt;-tag in your &quot;Template-header.php&quot;-file.', 'gb_like_button') ?>"
		+ "<br><br><b>"
		+ "xmlns:og=&quot;http://opengraphprotocol.org/schema/&quot;"
		+ "<br>"
		+ "xmlns:fb=&quot;http://www.facebook.com/2008/fbml&quot;&gt;"
	  	+ "</b><br><br>"
	  	+ "<?php _e('If you do not do this the Open-Graph-Protocol will not work with all its functions.', 'gb_like_button') ?>";
	} else {
		div.innerHTML = "";
	}
}

</script>

<?php } 

// will resize all the images - will be finished maybe at v3.5 //
public static function gxtb_imageResize($id, $img) {

$target_w = 500;
$target_h = 200;
							
$mysock = getimagesize($img);
$width = $mysock[0];
$height = $mysock[1];

	if ($width > $height) {
		$percentage = ($target_w / $width);
	} else {
		$percentage = ($target_h / $height);
	}

$width = round($width * $percentage);
$height = round($height * $percentage);

	if ($id == 0) {
		echo 'width="'. $width .'"';
	} else if ($id == 1) {
		echo 'height="' . $height .'"';
	}

}

public static function gxtb_maxImage($img) {
	
	if (@getimagesize($img)) {
		
		$mysock = getimagesize($img);
		$width = $mysock[0];
		$height = $mysock[1];
		
		if($width <= 400) {
		
			echo '<img id="gxtb_fb_lB_meta_image_preview" '
			.'src="'. $img .'"/>';
		} else {
			echo "<small>The image is to big to show a preview - but you can click <a href='". $img ."' target='_blank'>". __('here', 'gb_like_button')  ."</a> to see the choosen Image.</small>";	
		}
		
	} else {
		echo '<img id="gxtb_fb_lB_meta_image_preview" '
			.'src="'. $img .'"/>';
	}
}

} ?>