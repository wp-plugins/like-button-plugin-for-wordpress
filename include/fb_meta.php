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
###########	       META-OUTPUT-Class	 ###########
###########								 ###########
###########								 ###########
####################################################
####################### by gb-world.net ############
####################################################


if (!class_exists('gxtb_fb_lB_MetaAction')) {
class gxtb_fb_lB_MetaAction {

####################################################
####################################################
###########								 ###########
###########								 ###########
###########	       FLUSH-ADDING			 ###########
###########								 ###########
###########								 ###########
####################################################
##################### by gb-world.net   ############
####################################################

function gxtb_fb_lB_MetaAction() {

	ob_start(array( $this, 'gxtb_fb_lB_header_flush' ));
	ob_end_flush();
}

function gxtb_fb_lB_header_flush($content) {

	$gxtb_fb_lB_meta = get_option('gxtb_fb_lB_meta');
	
	// filter/action adden die folgendes in den <html> tag schreibt:
			 /*xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="de-DE"
		xmlns:og="http://opengraphprotocol.org/schema/"
		xmlns:fb="http://www.facebook.com/2008/fbml">
		<head profile="http://gmpg.org/xfn/11"*/
		
		$meta = "";
		$title = false;
			
	foreach($gxtb_fb_lB_meta as $key => $value) {
	
		if($value != "") { 
		
			if(strstr($value, '$')) {
			
				switch ($value) {
					case strstr($value, '$binfo'):
$meta .= '
<meta property="og:site_name" content="' . get_bloginfo('name') . '"/>';
					break;
						
					case strstr($value, '$ptitle'):
					if(is_home()){
$meta .= '
<meta property="og:title" content="' . get_bloginfo ( 'name' ). '"/>';
						$title = true;
					} else if (!is_category()) {
$meta .= '
<meta property="og:title" content="' . get_the_title($post->ID) . '"/>';
						$title = true;
					}
						break;
						
					case strstr($value, '$plink'):

	if(is_single()){
 		$permalink = get_permalink($post->ID);
	}elseif(is_page()){
 		$permalink = get_page_link($post->ID);
	}elseif(is_home()) {
	 	$permalink = get_bloginfo('url');
	}else {
		$permalink = "http://" . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
	}

	if( is_page() || is_single() ) {
$meta .= '
<meta property="og:url" content="' . $permalink .'"/>';
	}
						break;
					default:
						break;
				}
## maybe there'll be some problemes with the app_id and admins-meta tags when both appear. we'll see #
			} elseif ($key == "app_id") {
$meta .= '
<meta property="fb:' . $key . '" content="' . $value . '"/>';

		} elseif ($key == "admins") {
$meta .= '
<meta property="fb:' . $key . '" content="' . $value . '"/>';
		
		} elseif ($key == "description") {
			$this -> gxtb_meta_description($key, $value, &$meta);
		} elseif ($key == "title" && !$title) {
$meta .= '
<meta property="og:' . $key . '" content="' . $value . '"/>';
		} 
		elseif ($key != "post_focus" && $key != "description" && $key != "dusage") {
$meta .= '
<meta property="og:' . $key . '" content="' . $value . '"/>';
		}
		}
	}
	
	return $meta . $this -> gxtb_using_message() . $content;	
}

####################################################
####################################################
###########								 ###########
###########								 ###########
###########	    ADDs the DESCRIPTION	 ###########
###########			META-TAG			 ###########
###########								 ###########
####################################################
##################### by gb-world.net   ############
####################################################

function gxtb_meta_description($key, $value, $meta) {

	$gxtb_fb_lB_meta = get_option('gxtb_fb_lB_meta');

	switch($gxtb_fb_lB_meta['dusage']) {
			
			case "blogd":
				$content = get_bloginfo('description');
				$bloginfo = get_bloginfo('description');
				break;
				
			case "bloge":
				$content = get_the_excerpt();
				break;
				
			case "blogn":
				$content = $gxtb_fb_lB_meta['description'];
				$bloginfo = $gxtb_fb_lB_meta['description'];
				break;
		}

	if((is_home() || is_category()) && $bloginfo != "") {
$meta .= '
<meta property="og:' . $key . '" content="' . $bloginfo . '"/>';


	} else if(is_single() || is_page() ) {
$meta .= '
<meta property="og:' . $key . '" content="' . $content . '"/>';	
	}
	
}

####################################################
####################################################
##### YOU ARE NOT ALLOWED TO DELETE THIS LINE ######
####################################################
##################### by gb-world.net   ############
####################################################
function gxtb_using_message() {

return '
<!-- using ' . gxtb_fb_lB_name . ' [v' . gxtb_fb_lB_version . '] | by http://www.gb-world.net -->
';
}
####################################################
####################################################
##### YOU ARE NOT ALLOWED TO DELETE THIS LINE ######
####################################################
##################### by gb-world.net   ############
####################################################




} // end class
} // end if-class
?>