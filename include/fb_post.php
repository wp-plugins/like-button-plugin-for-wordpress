<?php // Do not delete these lines
	if (!empty($_SERVER['SCRIPT_FILENAME']) && basename(__file__) == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');
?>
<?php
/*
+----------------------------------------------------------------+
+	Like-Button-Plugin-For-Wordpress [v4.4.4] - GB-Post-Option [v1.5]
+	by Stefan Natter (http://www.gangxtaboii.com and http://www.gb-world.net)
+   required for Like-Button-Plugin-For-Wordpress and WordPress 2.7.x or higher
+----------------------------------------------------------------+
*/
# FAQ: http://net.tutsplus.com/tutorials/wordpress/creating-custom-fields-for-attachments-in-wordpress/
####################################################
####################################################
###########								 ###########
###########								 ###########
###########	      CUSTOM-Field-CLASS	 ###########
###########								 ###########
###########								 ###########
####################################################
####################### by gb-world.net ############
####################################################

if (!class_exists('GBLikeButton_CustomPost')) {
class GBLikeButton_CustomPost {

function GBLikeButton_CustomPost() {

	add_action('admin_menu', array( $this, 'gxtb_fb_lB_add_custom_box' ));
	add_action('save_post', array( $this, 'gxtb_fb_lB_save_postdata' ));
	
	if ( strpos($_SERVER['REQUEST_URI'], "post.php") || strpos($_SERVER['REQUEST_URI'], "post.php") || strpos($_SERVER['REQUEST_URI'], "post-new.php") )
		add_action('admin_head', array(&$this, 'gxtb_fb_lB_header'));
}

function gxtb_fb_lB_header($content) {

echo '
<!-- using ' . gxtb_fb_lB_name . ' [v' . gxtb_fb_lB_version . '] | by Stefan Natter (http://www.gb-world.net) -->';
echo '
<script type="text/javascript" src="' . gxtb_fb_lB_PLUGIN_FOLDER . 'admin/js/gb_generator.js"></script>
';
echo '<link rel="stylesheet" type="text/css" href="' . gxtb_fb_lB_PLUGIN_FOLDER . 'admin/css/tooltips.css" />
';
echo '<!-- using ' . gxtb_fb_lB_name . ' [v' . gxtb_fb_lB_version . '] | by Stefan Natter (http://www.gb-world.net) -->
';
}

function gxtb_fb_lB_add_custom_box() {

	$headline = __( 'Like-Button-Settings', gxtb_fb_lB_lang );

	if (is_admin())
		$headline .= " | <a href='admin.php?page=fb-like-button'>" . __( 'Settings', gxtb_fb_lB_lang ) ."</a>";

  if( function_exists( 'add_meta_box' )) {
    add_meta_box( 'gxtb_fb_lB_sectionid', $headline,
                array( $this, 'gxtb_fb_lB_inner_custom_box' ), 'post', 'side', 'high' );
    add_meta_box( 'gxtb_fb_lB_sectionid', $headline, 
                array( $this, 'gxtb_fb_lB_inner_custom_box' ), 'page', 'side', 'high' );
	}
}
   
/* Prints the inner fields for the custom post/page section */
function gxtb_fb_lB_inner_custom_box() {

    global $post, $wp_version;
	$GBLikeButton = get_option('GBLikeButton');
    $post_id = $post;
    
    if (is_object($post_id)) 
    	$post_id = $post_id->ID;
    
    $fbpic = get_post_meta($post_id, '_fbpic', true); ## Wenn != "" dann benutzen
	$fbnone = get_post_meta($post_id, '_fbnone', true); ## Wenn == 1 dann keinen Like-Button-Output
	$fbnometa = get_post_meta($post_id, '_fbnometa', true); ## Wenn == 1 dann kein Meta-Output
	$fbnodefault = get_post_meta($post_id, '_fbnodefault', true); ## Wenn == 1 dann kein Default-Image-Tag
	$fbnotemplate = get_post_meta($post_id, '_fbnotemplate', true); ## Wenn == 1 dann kein Template-Button
		
	_e("Check the OpenGraph Meta-Tags with the", gxtb_fb_lB_lang );
?><br>
<a href="http://developers.facebook.com/tools/lint/?url=<?php echo get_permalink( $post_id ); ?>" target="_blank">Facebook URL Linter</a>
<?php if (isset($GBLikeButton['OpenGraph']['w3c']) && $GBLikeButton['OpenGraph']['w3c']) {
	echo "<br><br>";
	_e("You have activated the <a href='". get_bloginfo('siteurl') ."/wp-admin/admin.php?page=fb-like-expert#w3c' target='_blank'>W3C-Validation</a> Option. The Facebook URL Linter will not work as long as you have activate this option.", gxtb_fb_lB_lang );
	echo "<br>";
}
?>
<?php
if (version_compare( $wp_version, '2.9', '>=' )) {
	if (current_theme_supports('post-thumbnails')) {	
	$fbfeatured = get_post_meta($post_id, '_fbfeatured', true);
?><br><br>
    	<input name="GBLikeButton_fbfeatured" type="checkbox" class="checkbox" <?php if ($fbfeatured) echo("checked"); ?> value="1" />&nbsp; <?php _e("Use the Featured Image for the Image-Tag.", gxtb_fb_lB_lang ) ?>
        <br /><br />
<?php } } ?>
        <input name="GBLikeButton_fbnone" type="checkbox" class="checkbox" <?php if ($fbnone) echo("checked"); ?>  value="1" />&nbsp; <?php  echo sprintf("<b>%s</b> %s", __("Disable", gxtb_fb_lB_lang ), __("Like-Button for this post/page.", gxtb_fb_lB_lang )); ?>
        <br /><br />
        <input name="GBLikeButton_fbnometa" type="checkbox" class="checkbox" <?php if ($fbnometa) echo("checked"); ?>  value="1" />&nbsp; <?php  echo sprintf("<b>%s</b> %s", __("Disable", gxtb_fb_lB_lang ), __("the Meta-Tags on this page/post.", gxtb_fb_lB_lang )); ?>
        <br /><br />
        <input name="GBLikeButton_fbnodefault" type="checkbox" class="checkbox" <?php if ($fbnodefault) echo("checked"); ?>  value="1" />&nbsp; <?php  echo sprintf("<b>%s</b> %s", __("Disable", gxtb_fb_lB_lang ), __("the Default-Image on this page/post.", gxtb_fb_lB_lang )); ?>
        <br /><br />
        <input name="GBLikeButton_fbnotemplate" type="checkbox" class="checkbox" <?php if ($fbnotemplate) echo("checked"); ?>  value="1" />&nbsp; <?php  echo sprintf("<b>%s</b> %s", __("Disable", gxtb_fb_lB_lang ), __("the Template-Function on this page/post.", gxtb_fb_lB_lang )); ?>
        <br /><br />
<?php
	echo '<label for="GBLikeButton_post_description">' . __("Enter the full path to an image you want to connect with this Post/Page.", gxtb_fb_lB_lang ) . '</label><br/><br/>';
	echo sprintf("<b>%s</b>: %s: <br><br><i>%s <small>(%s)</small></i><br/><br/>", __("Important", gxtb_fb_lB_lang ), __("Keep in mind that Facebook does only supports the following images", gxtb_fb_lB_lang ), __("The image must be at least 50px by 50px and have a maximum aspect ratio of 3:1. We support PNG, JPEG and GIF formats.", gxtb_fb_lB_lang ),  __("by Facebook", gxtb_fb_lB_lang ));
	echo '<input type="text" name="GBLikeButton_post_image" id="GBLikeButton_post_image" value="' . $fbpic . '" size="25" />';
	?>
	<img src="<?php echo gxtb_fb_lB_PLUGIN_FOLDER; ?>images/rot17a.gif"  onmouseover="tooltip.show('<?php _e('Every single post/page can have its own individuel image if you like!', 'gb_like_button'); ?>');" onmouseout="tooltip.hide();">
	<?php
	if ( isset($fbpic) && !empty($fbpic)) {
			if (!preg_match('#^(.*)\.(png|gif|jpg|jpeg)$#i', $fbpic) ) {
				$datentyp = substr (strrchr ($fbpic, "."), 1);
		echo sprintf( '<br /><br /><div id="message" class="error"><p><b>%s:</b> %s <i>%s</i> %s! <small>[%s]</small></p></div>', __('Warning', gxtb_fb_lB_lang), __('The Image-Type', gxtb_fb_lB_lang), $datentyp, __('is not allowed', gxtb_fb_lB_lang), __('Like-Button-Image #1', gxtb_fb_lB_lang) );
			}
	}
	if (isset($fbpic) && !empty($fbpic)) {
		if(!preg_match('#^http:\/\/#', substr($fbpic,0, 8))) { $fbpic = "http://" . $fbpic; }
		echo sprintf( '<br /><br /><a href="' . $fbpic . '" target="_blank">%s</a>', __('See Post-Image', gxtb_fb_lB_lang));
	}
}

function gxtb_fb_lB_save_postdata( $post_id ) {

	if ( strpos($_SERVER['REQUEST_URI'], "post.php") || strpos($_SERVER['REQUEST_URI'], "post.php") || strpos($_SERVER['REQUEST_URI'], "post-new.php") ) { ## Save only on this pages ##

		$fbpic = $_POST['GBLikeButton_post_image'];
		$fbnone = $_POST['GBLikeButton_fbnone'];
		$fbnometa = $_POST['GBLikeButton_fbnometa'];
		$fbfeatured = $_POST['GBLikeButton_fbfeatured'];
		$fbnodefault = $_POST['GBLikeButton_fbnodefault'];
		$fbnotemplate = $_POST['GBLikeButton_fbnotemplate'];
			
		if (isset($fbpic)) {
			
			if($fbpic != "" && !preg_match('#^http:\/\/#', substr($fbpic,0, 8))) { $fbpic = "http://" . $fbpic; }
					#delete_post_meta($post_id, '_fbpic');
					update_post_meta($post_id, '_fbpic', $fbpic);
		}
		if ($fbnone || !$fbnone) {
					#delete_post_meta($post_id, '_fbnone');
					update_post_meta($post_id, '_fbnone', $fbnone);
		}
		if ($fbfeatured || !$fbfeatured) {
					#delete_post_meta($post_id, '_fbfeatured');
					update_post_meta($post_id, '_fbfeatured', $fbfeatured);
		}
		if ($fbnometa || !$fbnometa) {
					#delete_post_meta($post_id, '_fbnometa');
					update_post_meta($post_id, '_fbnometa', $fbnometa);
		}
		if ($fbnodefault || !$fbnodefault) {
					#delete_post_meta($post_id, '_fbnodefault');
					update_post_meta($post_id, '_fbnodefault', $fbnodefault);
		}
		if ($fbnotemplate || !$fbnotemplate) {
					#delete_post_meta($post_id, '_fbnotemplate');
					update_post_meta($post_id, '_fbnotemplate', $fbnotemplate);
		}
	}
}

} // end class
} // end if-class

if (class_exists('GBLikeButton_CustomPost'))
	$GBLikeButton_CustomPost = new GBLikeButton_CustomPost();
?>