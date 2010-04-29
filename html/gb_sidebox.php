<?php // Do not delete these lines
	if (!empty($_SERVER['SCRIPT_FILENAME']) && basename(__file__) == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');
?>
<?php
/*
+----------------------------------------------------------------+
+	Like-Button-Plugin-For-Wordpress-Metaboxes [v1.3]
+	by Stefan Natter (http://www.gangxtaboii.com)
+   required for Like-Button-Plugin-For-Wordpress and WordPress 2.7.x or higher
+----------------------------------------------------------------+
*/

########################################################################################################

class gxtb_fb_lB_mBSBClass {

########################################################################################################
											## SIDEBOX  ##
	
	public static function gxtb_sidebox_1() {
		$gxtb_fb_lB_meta = get_option('gxtb_fb_lB_meta');
		?>
		<ul style="list-style-type:disc;margin-left:20px;">
			yeah
		</ul>
		<?php
	}
	public static  function gxtb_sidebox_2() {
		$gxtb_fb_lB_meta = get_option('gxtb_fb_lB_meta');
		?>
		<p>You can also use static text or any markup to be shown inside the boxes.</p>
		<?php
	}

} ?>