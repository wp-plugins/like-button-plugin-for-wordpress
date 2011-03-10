<?php // Do not delete these lines
	if (!empty($_SERVER['SCRIPT_FILENAME']) && basename(__file__) == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');
?>
<?php 
/*
+----------------------------------------------------------------+
+	GB-World-PayPalBox [v1.5]
+	by Stefan Natter (http://www.gb-world.net)
+   required for GB-World-WP-Plugins
+----------------------------------------------------------------+
*/

####################################################
####################################################
###########								 ###########
###########								 ###########
###########	     PayPal-CLASS			 ###########
###########								 ###########
###########								 ###########
####################################################
##################### by gb-world.net   ############
####################################################
if(!class_exists('gxtb_NewsPClass')) {
class gxtb_NewsPClass {
function gxtb_NewsPClass() {
?>

<!-- ######################################################################################################## -->
<!-- 										## GB-Newsbox 3.0  ##											  -->

	                <p><?php if ( isset($_GET['page']) && !$_GET['page'] == "fb-like-gbworld" ) { ?> '<?php echo gxtb_fb_lB_name; ?>' <?php _e('was', gxtb_fb_lB_lang) ?> <?php } else { _e("The GB-World-Plugins were", gxtb_fb_lB_lang); } ?> 
					<?php _e('created by', gxtb_fb_lB_lang) ?> <a href="http://wiki.gb-world.net/wiki/User:GangXtaBoii?ref=like-button-plugin-for-wordpress" target="_blank">Stefan Natter</a>. 
           			<?php _e('The development of this plugin(s) took a lot of time and effort, so please don&rsquo;t forget to donate if you found this plugin(s) useful.', gxtb_fb_lB_lang) ?></p>
                    
                    <p><?php _e('There are also other ways of supporting this plugin(s) to ensure it is maintained and well supported in the future!', gxtb_fb_lB_lang) ?>
                    <?php _e('Rating the plugin(s) on wordpress.org (if you like it), linking/spreading the word, and submitting code contributions will all help.', gxtb_fb_lB_lang) ?> </p>
                    
					<a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=SB94MEM9ATTBG"><img src="https://www.paypal.com/en_GB/i/btn/btn_donate_LG.gif" /></a>
<?php
# https://www.paypal.com/en_US/i/btn/btn_donateCC_LG.gif
	}
} // end class
} // end if-class
?>