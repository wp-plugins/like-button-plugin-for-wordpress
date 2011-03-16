<?php // Do not delete these lines
	if (!empty($_SERVER['SCRIPT_FILENAME']) && basename(__file__) == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');
?>
<?php
/*
+----------------------------------------------------------------+
+	Like-Button-Plugin-For-Wordpress [v4.3] - Like-Button-Shortcode [v0.3 - OPEN BETA] - OFFEN: 1x style
+	by Stefan Natter (http://www.gb-world.net)
+   required for Like-Button-Plugin-For-Wordpress and WordPress 2.7.x or higher
+----------------------------------------------------------------+
*/
####################################################
####################################################
###########								 ###########
###########								 ###########
###########	      ShortCode-CLASS		 ###########
###########								 ###########
###########								 ###########
####################################################
####################### by gb-world.net ############
####################################################

if (!class_exists('GBLikeButton_Shortcode')) {
class GBLikeButton_Shortcode extends gxtb_fb_lB_GenerateLike {

	var $GBLikeButton;

####################################################
####################################################
###########								 ###########
###########								 ###########
###########	  LIKE-BUTTON (SHORTCODE)	 ###########
###########				ADDING			 ###########
###########								 ###########
####################################################
##################### by gb-world.net   ############
####################################################
function GBLikeButton_Shortcode() {

	$this->GBLikeButton = get_option('GBLikeButton');

	if ( $this->GBLikeButton['General']['on'] == 1 || $this->GBLikeButton['General']['shortcode'] == 1)
		add_shortcode('like', array( &$this, 'gxtb_fb_lB_function' ) );
}
####################################################
####################################################
###########								 ###########
###########								 ###########
###########	  LIKE-BUTTON (SHORTCODE)	 ###########
###########				ACTION			 ###########
###########								 ###########
####################################################
##################### by gb-world.net   ############
####################################################
function gxtb_fb_lB_function($atts) {

	extract(shortcode_atts(array(
			'url' 		=> "",
			'style'		=> ""
		), $atts ));

	if (esc_attr($style) != "")
		#return "<div style='" . esc_attr($style) . "'>" . $this -> gxtb_fb_lB_Generate(esc_attr($url), esc_attr($style)) . "</div>";
		return $this -> gxtb_fb_lB_Generate(esc_attr($url), esc_attr($style)); # OFFEN
	else
		return $this -> gxtb_fb_lB_Generate(esc_attr($url), "");
}
} // end class
} // end if-class

if (class_exists('GBLikeButton_Shortcode'))
	$GBLikeButton_Shortcode = new GBLikeButton_Shortcode();
?>