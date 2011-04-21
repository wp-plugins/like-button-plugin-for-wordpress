<?php // Do not delete these lines
	if (!empty($_SERVER['SCRIPT_FILENAME']) && basename(__file__) == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');
?>
<?php
/*
+----------------------------------------------------------------+
+	Like-Button-Plugin-For-Wordpress [v4.4.3.1] - GB-TemplateCode [v0.1 - BETA]
+	by Stefan Natter (http://www.gb-world.net)
+   required for Like-Button-Plugin-For-Wordpress and WordPress 2.7.x or higher
+----------------------------------------------------------------+
*/
####################################################
####################################################
###########								 ###########
###########								 ###########
###########	       TEMPLATE-CODE		 ###########
###########								 ###########
###########								 ###########
####################################################
##################### by gb-world.net ##############
####################################################

function GBLikeButtonTemplateShort(){
	include_once('gb_generate.php');
	$gxtb_fb_lB_GenerateLike = new gxtb_fb_lB_GenerateLike();
	echo $gxtb_fb_lB_GenerateLike->gxtb_fb_lB_Generate("","");
}
function GBLikeButtonTemplateMiddle($url, $style) { # This function will generate the Like Button wherever this code is ##
	include_once('gb_generate.php');
	$gxtb_fb_lB_GenerateLike = new gxtb_fb_lB_GenerateLike();
	echo $gxtb_fb_lB_GenerateLike->gxtb_fb_lB_Generate($url,$style);
}

# OFFEN ab hier #
function GBLikeButtonTemplateExtend($url, $colorscheme, $width, $height, $verb, $font, $style, $css, $faces, $scrolling, $borderstyle, $ref, $jdk) { # This function will generate the Like Button wherever this code is ##
	
	global $wp_version;
	
	# Überprüfugnslogik #:
	if ($url != "") {
		if (strstr($url, "http://")) {
			$url = $url;
		} else {
			$url = "http://" . $url;	
		}
	} else {
		$url = ((version_compare( $wp_version, '3.0', '>=' )) ? get_home_url() : get_bloginfo('siteurl'));
	}
	$ref = ($ref != "") ? "&amp;ref=".$ref:"";
	$trans = ($trans == true || $trans == 1) ? "true":"false";
	$scrolling = ($scrolling == true || $scrolling == 1) ? "on":"off";
	$faces = ($faces == true || $faces == 1) ? "true":"false";
	$colorscheme = ($colorscheme != "" || !is_numeric($colorscheme) ) ? $colorscheme:"light";
	$width = ($width != "" || is_numeric($width) ) ? $width:"150";
	$height = ($height != "" || is_numeric($height) ) ? $height:"150";
	$frameborder = ($frameborder != "" || is_numeric($frameborder) ) ? $frameborder:"0";
	
	if($css != "") { $text.='<div class="' . $css . '">'; }
	
	if($jdk != true && $trans != 1) { # IFRAME-Version
	$text.= '<iframe src="http://www.facebook.com/plugins/like.php?href='. urlencode($url) .'&amp;layout='. $layout .'&amp;show_faces='. $faces .'&amp;width='. $width .'&amp;action='. $verb .'&amp;' . $font . 'colorscheme='. $colorscheme .'&amp;height='. $height .''.$ref.'" scrolling="'. $scrolling .'" frameborder="'. $frameborder .'" allowTransparency="'. $trans .'" style="border:'. $borderstyle .'; overflow:'. $overflow .'; width:'. $width .'px; height:'. $height .'px"></iframe>';
	} else { # JDK-Version
	}
	
	if($css != "") { $text.='</div>'; }
	
	echo $text; # Output
}