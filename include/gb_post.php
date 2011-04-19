<?php // Do not delete these lines
	if (!empty($_SERVER['SCRIPT_FILENAME']) && basename(__file__) == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');
?>
<?php
/*
+----------------------------------------------------------------+
+	Like-Button-Plugin-For-Wordpress [v4.3] - GB-Post-Option [v1.2]
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
echo '
<link rel="stylesheet" type="text/css" href="' . gxtb_fb_lB_PLUGIN_FOLDER . 'admin/css/tooltips.css" />
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

    global $post;
    $post_id = $post;
    
    if (is_object($post_id)) 
    	$post_id = $post_id->ID;
    
	$fbdefault = get_post_meta($post_id, '_fbdefault', true); ## Default Variable for the FB-Featured Option
    $value = get_post_meta($post_id, '_fbpic', false);
	$fbnone = get_post_meta($post_id, '_fbnone', true);
	$fbnometa = get_post_meta($post_id, '_fbnometa', true);
	$fbfeatured = get_post_meta($post_id, '_fbfeatured', true);

	# OFFEN: Tooltip geht nicht mehr -> Fehler im jQuery Dings! OFFEN #

	# Datumabfrage um sicher zu gehen, dass nur "neue" Posts die Featured Option standardmäßig aktiviert haben #
	global $wp_version;
	if (version_compare( $wp_version, '3.0', '>=' ) ){
			$date = get_the_date("Y-m-d"); }
	else {
			$date = the_time('Y-m-d');
	}
	if ($date >= "2011-04-19") {
		# Abfrage wie Default-Value aggiert und setzt den Default-Wert #
		if( $fbdefault == 0 && isset($fbdefault) ) { $fbfeatured = 1; }
	}
	
?><br>
    	<input name="gxtb_fb_lB_fbfeatured" type="checkbox" class="checkbox" <?php if ($fbfeatured) echo("checked"); ?> value="1" />&nbsp; <?php _e("Use the Featured Image for the Image-Tag.", gxtb_fb_lB_lang ) ?>
        <br /><br />
        <input name="gxtb_fb_lB_fbnone" type="checkbox" class="checkbox" <?php if ($fbnone) echo("checked"); ?>  />&nbsp; <?php  echo sprintf("<b>%s</b> %s", __("Disable", gxtb_fb_lB_lang ), __("Like-Button for this post/page.", gxtb_fb_lB_lang )); ?>
        <br /><br />
        <input name="gxtb_fb_lB_fbnometa" type="checkbox" class="checkbox" <?php if ($fbnometa) echo("checked"); ?>  value="1" />&nbsp; <?php  echo sprintf("<b>%s</b> %s", __("Disable", gxtb_fb_lB_lang ), __("the Meta-Tags on this page/post.", gxtb_fb_lB_lang )); ?>
        <br /><br />
<?php
	echo '<label for="gxtb_fb_lB_post_description">' . __("Enter the full path to an image you wanna connect with this Post/Page.", gxtb_fb_lB_lang ) . '</label><br/><br/>';
	echo '<input type="text" name="gxtb_fb_lB_post_image" id="gxtb_fb_lB_post_image" value="' . $value[0] . '" size="25" />';
	?>
	<img src="<?php echo gxtb_fb_lB_PLUGIN_FOLDER; ?>images/rot17a.gif"  onmouseover="tooltip.show('<?php _e('Every single post/page can have its own individuel image if you like!', 'gb_like_button'); ?>');" onmouseout="tooltip.hide();">
	<?php
	if ( isset($value[0]) && !empty($value[0]) && !strstr($value[0], "http://")) {
		echo sprintf( '<br /><br /><div id="message" class="error"><p><b>%s:</b> <i>%s</i> %s! <small>[%s]</small></p></div>', __('Warning', gxtb_fb_lB_lang),  __('http://', gxtb_fb_lB_lang), __('is missing', gxtb_fb_lB_lang), __('Like-Button-Image #1', gxtb_fb_lB_lang) );
	}
	if ( isset($value[0]) && !empty($value[0]) && strstr($value[0], "http://")) {
		echo sprintf( '<br /><br /><a href="' . $value[0] . '" target="_blank">%s</a>', __('See Post-Image', gxtb_fb_lB_lang));
	}
}

function gxtb_fb_lB_save_postdata( $post_id ) {

  // Check permissions
 /*  if ( 'page' == $_POST['post_type'] ) {
    if ( !current_user_can( 'edit_page', $post_id ) )
      return $post_id;
  } else {
    if ( !current_user_can( 'edit_post', $post_id ) )
      return $post_id;
  } */
    $value = $_POST['gxtb_fb_lB_post_image'];
	$fbnone = $_POST['gxtb_fb_lB_fbnone'];
	$fbnometa = ( isset($_POST['gxtb_fb_lB_fbnometa']) ) ? $_POST['gxtb_fb_lB_fbnometa']:0;
	$fbfeatured = ( isset($_POST['gxtb_fb_lB_fbfeatured']) ) ? $_POST['gxtb_fb_lB_fbfeatured']:0;
		
    if (isset($value)) {
				delete_post_meta($post_id, '_fbpic');
		   		add_post_meta($post_id, '_fbpic', $value);
	}
	if (($fbnone || !$fbnone)) {
				delete_post_meta($post_id, '_fbnone');
		    	add_post_meta($post_id, '_fbnone', $fbnone);
    }
	if ($fbfeatured || !$fbfeatured) {
				delete_post_meta($post_id, '_fbfeatured');
		    	add_post_meta($post_id, '_fbfeatured', $fbfeatured);
    }
	if ($fbnometa || !$fbnometa) {
				delete_post_meta($post_id, '_fbnometa');
		    	add_post_meta($post_id, '_fbnometa', $fbnometa);
    }
	if ( isset($_POST['gxtb_fb_lB_fbfeatured'] ) && $_POST['gxtb_fb_lB_fbfeatured'] != 0 ) {
		$fbdefault = "1";
		#delete_post_meta($post_id, '_fbdefault');
		update_post_meta($post_id, '_fbdefault', $fbdefault);
	}

}

} // end class
} // end if-class

if (class_exists('GBLikeButton_CustomPost'))
	$GBLikeButton_CustomPost = new GBLikeButton_CustomPost();
?>