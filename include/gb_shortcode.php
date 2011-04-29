<?php // Do not delete these lines
	if (!empty($_SERVER['SCRIPT_FILENAME']) && basename(__file__) == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');
?>
<?php
/*
+----------------------------------------------------------------+
+	Like-Button-Plugin-For-Wordpress [v4.4.4] - Like-Button-Shortcode [v0.5 - FINAL]
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
			'action'    => "",
			'width'		=> "",
			'height'	=> "",
			'style'		=> ""
		), $atts ));
		
if (gxtb_fb_lB_debug == true) {	
	echo "<b>Shortcode</b> <br><br>";
	echo 'url => ' . esc_attr($url) . " " . 'action => ' . esc_attr($action) . " " . 'width => ' . esc_attr($width) . " ".  'height => ' . esc_attr($height) . " ". 'style => ' . esc_attr($style);
	echo "<br><br>";
	echo "gxtb_fb_lB_Generate(" . esc_attr($url) .",". esc_attr($action).",". esc_attr($width).",". esc_attr($height).",". esc_attr($style).")"; # DEBUG
	echo "<br><br>";
}

	$parameter = array();
	$parameter['url'] = (isset($url)) ? $url:'';
	$parameter['action'] = (isset($action)) ? $action:'';
	$parameter['width'] = (isset($width)) ? $width:'';
	$parameter['height'] = (isset($height)) ? $height:'';
	$parameter['style'] = (isset($style)) ? $style:'';
	$parameter['enabled'] = true; ## enables the shortcode even if you deactivate the dynamic buttons on the post/page

	return $this -> GBLikeButtonGenerate($parameter);
}
} // end class
} // end if-class

if (class_exists('GBLikeButton_Shortcode'))
	$GBLikeButton_Shortcode = new GBLikeButton_Shortcode();
?>