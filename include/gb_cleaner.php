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

####################################################
####################################################
###########								 ###########
###########								 ###########
###########	       CLEANER-CLASS		 ###########
###########								 ###########
###########								 ###########
####################################################
####################### by gb-world.net ############
####################################################


if (!class_exists('gxtb_fb_lB_Cleaner')) {
class gxtb_fb_lB_Cleaner {

function gxtb_fb_lB_Cleaner() {

$gxtb_fb_lB = get_option('gxtb_fb_lB');

if ( isset($gxtb_fb_lB['lVersion']) && version_compare($gxtb_fb_lB['lVersion'], '4.0', '<=') ){
	
	if(get_option('gxtb_fb_lB_settings')) {
	
		// siehe Changelog 4.0 - Position des Like-Buttons
		$gxtb_fb_lB_settings = get_option('gxtb_fb_lB_settings');
		unset( $gxtb_fb_lB_settings['position'] );
		update_option('gxtb_fb_lB_settings', $gxtb_fb_lB_settings);
		
	}

}
?>
<div id="message" class="updated fade"><p><strong><?php _e("Successfully cleaned up all your 'Like-Button-Plugin-For-Wordpress'-Settings!", gxtb_fb_lB_lang) ?></strong></p></div>
<?php
} // end konstruktor
} // end class
} // end if-class
?>