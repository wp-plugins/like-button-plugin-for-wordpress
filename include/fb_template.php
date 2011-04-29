<?php // Do not delete these lines
	if (!empty($_SERVER['SCRIPT_FILENAME']) && basename(__file__) == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');
?>
<?php
/*
+----------------------------------------------------------------+
+	Like-Button-Plugin-For-Wordpress [v4.4.4] - GB-TemplateCode [v1.0 FINAL]
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

# Help: http://de3.php.net/manual/de/function.func-num-args.php | http://de3.php.net/manual/de/function.func-get-arg.php | http://de3.php.net/manual/de/function.func-get-args.php | http://www.traum-projekt.com/forum/19-traum-dynamik/50439-php-uberladen-von-funktionen.html
# http://www.php.net/manual/de/function.preg-match.php
# http://php.net/manual/en/function.in-array.php (http://www.abakus-internet-marketing.de/foren/viewtopic/t-43493.html)

function GBLikeButtonTemplate() { # Available: url, action, width, height, style (any css-styling code - for example: border => solid) #

if ( is_single() || is_page() ) {
	
	global $post, $wp_query, $wp_version;
   	$page_id = $wp_query->post->ID;	
	
	$fbnotemplate = get_post_meta($page_id, '_fbnotemplate', true);	
}

	if (isset($fbnotemplate) && $fbnotemplate == 1) { return ""; }

	include_once('gb_generate.php');
	$GBLikeButtonGenerate = new gxtb_fb_lB_GenerateLike();
	$GBLikeButton = array();
    $numargs = func_num_args();
	$parameter = array();

if (gxtb_fb_lB_debug == true) {		
    echo "<b>Argumente</b>";
	echo "<br><br>";
}

	if ($numargs > 0) {
		$arg_list = func_get_args();
		foreach ($arg_list[0] as $key => $value) {
			switch ($key) {
				case ($key == "url" && $value != ""):
					$GBLikeButton['Generator'][$key] = $value;
				break;
				
				case ($key == "width" && $value != ""):
					$GBLikeButton['Generator'][$key] = $value;
				break;
				
				case ($key == "height" && $value != ""):
					$GBLikeButton['Generator'][$key] = $value;
				break;
				
				case "action":
					if( in_array($value, array('like', 'LIKE', 'recommend', 'RECOMMEND' )) ) {
						$GBLikeButton['Generator'][$key] = $value;
					} else {
						$GBLikeButton['Generator'][$key] = "like";
					}
				break;
				
				case ($key == "style" && is_array($arg_list[0][$key]) ):
					foreach ($arg_list[0][$key] as $keystyle => $valuestyle) {
						$GBLikeButton['Generator'][$key] .= $keystyle.":".$valuestyle.";";
					}
				break;
				
				default:			
				break;
				
			}
		}
		
	  foreach ($GBLikeButton['Generator'] as $key => $value) {
		  $parameter[$key] = $value;
		 if (gxtb_fb_lB_debug == true) {
			 echo 'parameter['.$key.'] => ' . $value;
			 echo "<br>";
		 }
	  }
	}
	$parameter['enabled'] = true;
	echo $GBLikeButtonGenerate->GBLikeButtonGenerate($parameter);
}