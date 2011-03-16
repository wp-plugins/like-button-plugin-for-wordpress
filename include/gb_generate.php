<?php // Do not delete these lines
	if (!empty($_SERVER['SCRIPT_FILENAME']) && basename(__file__) == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');
?>
<?php
/*
+----------------------------------------------------------------+
+	Like-Button-Plugin-For-Wordpress [v4.3] - Like-Button-Generator [v0.5 FINAL]
+	by Stefan Natter (http://www.gb-world.net)
+   required for Like-Button-Plugin-For-Wordpress and WordPress 2.7.x or higher
+----------------------------------------------------------------+
*/
####################################################
####################################################
###########								 ###########
###########								 ###########
###########	   LIKE-Generate-CLASS		 ###########
###########								 ###########
###########								 ###########
####################################################
####################### by gb-world.net ############
####################################################
if (!class_exists('gxtb_fb_lB_GenerateLike')) {
class gxtb_fb_lB_GenerateLike {

	var $java = false; # früher private
	var $GBLikeButton;
	
function gxtb_fb_lB_GenerateLike() {
	$this->GBLikeButton = get_option('GBLikeButton');
}

####################################################
####################################################
###########								 ###########
###########								 ###########
###########	  GENERATES THE LIKE-BUTTON	 ###########
###########		FB-LIKE-BUT-GENERATOR	 ###########
###########								 ###########
####################################################
##################### by gb-world.net   ############
####################################################

function gxtb_fb_lB_Generate($url, $style) {

	# deactivate the like-button if the option 'fbnone' is true
	global $post, $wp_query;
   	$page_id = $wp_query->post->ID;
    $fbnone = get_post_meta($page_id, '_fbnone', true);
	
	if ($fbnone)
		return "";
	# end deactivate the like-button

	// get all the needed options
	$this->GBLikeButton = get_option('GBLikeButton');
			
	/* GENERATOR-CONTENT */
	$generator_content = array();
	$generator_content['url'] = $url;
			
	#generates the link
	if ($generator_content['url'] == "") {
		if( ( is_single() || is_page() || is_category() || is_home() || is_archive() ) && $this->GBLikeButton['General']['dynamic']) {
			$generator_content['url'] = get_permalink($post->ID);
		} else {
			$generator_content['url'] = $this->GBLikeButton['Generator']['url'];
		}
	}
	#generates the link

	#generates the faces
	$generator_content['faces'] = $this->GBLikeButton['Generator']['faces'];
	if($generator_content['faces'] == 0)
		$generator_content['faces'] = "false";
	else
		$generator_content['faces'] = "true";
	#generates the faces

	$generator_content['layout'] = $this->GBLikeButton['Generator']['layout'];
	$generator_content['width'] = $this->GBLikeButton['Generator']['width'];
	$generator_content['height'] = $this->GBLikeButton['Generator']['height'];
	$generator_content['verb'] = $this->GBLikeButton['Generator']['verb'];
	$generator_content['color'] = $this->GBLikeButton['Generator']['color'];
	$generator_content['font'] = $this->GBLikeButton['Generator']['font'];
	
	// setting defaults if sth. is empty
	if ($generator_content['width'] == "") {
		$generator_content['width'] = "150";
	}

	################################################
	### FB-Analytics [v4.0] ### release-mode ###
	################################################
	
	// checks if the ref-definitons are activated
	if($this->GBLikeButton['FBInsights']['on']) {
	
		$ref = "";
	
		// generates the ref-definiton
		if ( is_home() && $this->GBLikeButton['FBInsights']['frontpage_activ'] && $this->GBLikeButton['FBInsights']['frontpage'] != "" ) {
			$ref = $this->GBLikeButton['FBInsights']['frontpage'];
		}
		if ( is_page() && $this->GBLikeButton['FBInsights']['page_activ'] && $this->GBLikeButton['FBInsights']['page'] != "" ) {
			$ref = $this->GBLikeButton['FBInsights']['page'];
		}	
		if ( is_single() && $this->GBLikeButton['FBInsights']['post_activ'] && $this->GBLikeButton['FBInsights']['post'] != "" ) {
			$ref = $this->GBLikeButton['FBInsights']['post'];
		}
		if ( is_category() && $this->GBLikeButton['FBInsights']['category_activ'] && $this->GBLikeButton['FBInsights']['category'] != "" ) {
			$ref = $this->GBLikeButton['FBInsights']['category'];
		}	
		if ( is_archive() && $this->GBLikeButton['FBInsights']['archiv_activ'] && $this->GBLikeButton['FBInsights']['archiv'] != "" ) {
			$ref = $this->GBLikeButton['FBInsights']['archiv'];
		}
	
	} // end ref-def-if

	################################################
	### FB-Analytics [v4.0] ### release-mode ###
	################################################
	
	// Abfrage ob JDK aktiviert ist und die App-ID vorhanden ist!
	if($this->GBLikeButton['General']['jdk'] && $this->GBLikeButton['OpenGraph']['app_id'] != "" ) { 
	
		// generiert die Schriften für die JDK-Variante
		 if($generator_content['font'] != "") {
			 	$font = ' font="' . $generator_content['font'] . '" ';
			} else {
				 $font = '';
			}
			
	################################################
	### FB-Analytics [v4.0] ### release-mode ###
	################################################	
		// generiert die FB-Insights-Analyse (REL)
		if(isset($ref) && $ref != "") {
			$ref = 'ref="'. $ref .'"';
		} else {
			$ref = "";
		}
	################################################
	### FB-Analytics [v4.0] ### release-mode ###
	################################################
	
	$lang = $this->GBLikeButton['General']['language'];
	if ($lang == "") { $lang = "en_US"; }
	
	// Zusammenbau des fb:like-Outputs
	$text = '<script src="http://connect.facebook.net/' . $lang . '/all.js#xfbml=1"></script><fb:like href="'. urlencode($generator_content['url']) .'" layout="'. $generator_content['layout'] .'" show_faces="'. $generator_content['faces'] .'" width="'. $generator_content['width'] .'" action="'. $generator_content['verb'] .'"' . $font .'colorscheme="'. $generator_content['color'] .'" '. $ref .'></fb:like>';
	
	$text .=  gxtb_fb_lB_GenerateLike::gxtb_fb_lB_java();

	} else {
	
	################################################
	##### i-Frame ##### if JDK is not activated ####
	################################################	
	
	// security-if-statement if some array-variables are empty
	if ($this->GBLikeButton['Generator']['scrolling'] == 0 || !isset($this->GBLikeButton['Generator']['scrolling']))
		$generator_content['scrolling'] = "no";
	else 
		$generator_content['scrolling'] = "yes";
		
	if ($this->GBLikeButton['Generator']['trans'] == 0 || !isset($this->GBLikeButton['Generator']['trans']))
		$generator_content['trans'] = "false";
	else 
		$generator_content['trans'] = "true";	
	
	## enable fonts
	 if($generator_content['font'] != "") {
		 
		 switch ($generator_content['font']) {
			 case "luciada grande":
			 	$generator_content['font'] = "lucida+grande";
			 break;
			 
			 case "segoe ui":
			 	$generator_content['font'] = "segoe+ui";
			 break;
			 
			 case "trebuchet ms":
			 	$generator_content['font'] = "trebuchet+ms";
			 break;
			 
			 default:
			 	$generator_content['font'] = $generator_content['font'];
			 break;
		 }
		 
		$generator_content['font'] = 'font=' . $generator_content['font'] . '&amp;';
	} else {
		$generator_content['font'] = '';	
	}
	
	// setting defaults if sth. is empty	
	if ($generator_content['height'] == "") {
		$generator_content['height'] = "150";
	}

	$generator_content['frameborder'] = $this->GBLikeButton['Generator']['frameborder'];
	// setting defaults if sth. is empty
	if ($generator_content['frameborder'] == "") {
		$generator_content['frameborder'] = "0";
	}
	
	$generator_content['borderstyle'] = $this->GBLikeButton['Generator']['borderstyle'];
	// setting defaults if sth. is empty	
	if ($generator_content['borderstyle'] == "") {
		$generator_content['borderstyle'] = "none";
	}	

	$generator_content['overflow'] = $this->GBLikeButton['Generator']['overflow'];
	// setting defaults if sth. is empty	
	if ($generator_content['overflow'] == "" || isset($generator_content['overflow'])) {
		$generator_content['overflow'] = "hidden";
	}	

	################################################
	### FB-Analytics [v4.0] ### release-mode ###
	################################################	
		// generiert die FB-Insights-Analyse (REF)
		if(isset($ref) && $ref != "") {
			$ref = '&amp;ref='. $ref;
		}
		else {
			$ref = "";
		}
	################################################
	### FB-Analytics [v4.0] ### release-mode ###
	################################################
	
	$text = '<iframe src="http://www.facebook.com/plugins/like.php?href='. urlencode($generator_content['url']) .'&amp;layout='. $generator_content['layout'] .'&amp;show_faces='. $generator_content['faces'] .'&amp;width='. $generator_content['width'] .'&amp;action='. $generator_content['verb'] .'&amp;' . $generator_content['font'] . 'colorscheme='. $generator_content['color'] .'&amp;height='. $generator_content['height'] .''.$ref.'" scrolling="'. $generator_content['scrolling'] .'" frameborder="'. $generator_content['frameborder'] .'" allowTransparency="'. $generator_content['trans'] .'" style="border:'. $generator_content['borderstyle'] .'; overflow:'. $generator_content['overflow'] .'; width:'. $generator_content['width'] .'px; height:'. $generator_content['height'] .'px"></iframe>';

	}
	
	# creates the css-elements (class and style)
	$div_before = "<div";
	$div_after = "</div>";
	
	if ( isset($this->GBLikeButton['Design']['css']) && $this->GBLikeButton['Design']['css'] != "" && !$div) {
		$div_before .= ' class="' . $this->GBLikeButton['Design']['css'] . '"';
	}
	if ( isset($this->GBLikeButton['Design']['cssbox']) && $this->GBLikeButton['Design']['cssbox'] != "" && !$div) {
		$div_before .= ' style="' . $this->GBLikeButton['Design']['cssbox'] . '"';
	}
	
	if ( strstr($div_before, "class") || strstr($div_before, "style") )
		$div_before .= ">";
	else {
		$div_before = "";
		$div_after = "";
	}
		/* returns the generated code and generates the final output*/
		return $this -> gxtb_using_message() . $div_before . $text . $div_after . $this -> gxtb_using_message();
}

####################################################
####################################################
###########								 ###########
###########								 ###########
###########	  GENERATES THE JAVA-CODE	 ###########
###########								 ###########
###########								 ###########
####################################################
##################### by gb-world.net   ############
####################################################
function gxtb_fb_lB_java() {

if(!$this->java) {

if($this->GBLikeButton['General']['jdk'] && $this->GBLikeButton['OpenGraph']['app_id'] != "" || $this->GBLikeButton['OpenGraph']['app_id'] != "") {

	$lang = $this->GBLikeButton['General']['language'];
?>

<div id="fb-root"></div>
<script>
  window.fbAsyncInit = function() {
    FB.init({appId: '<?php echo $this->GBLikeButton['OpenGraph']['app_id']; ?>', status: true, cookie: true,
             xfbml: true});
  };
  (function() {
    var e = document.createElement('script');
	e.type = 'text/javascript';
    e.src = document.location.protocol +
      '//connect.facebook.net/<?php
	  if ($lang != "") { echo $lang; } else { echo "en_US"; }  ?>/all.js';
	  e.async = true;
    document.getElementById('fb-root').appendChild(e);
  }());
</script>

<?php
	}
	$this-> java = true;
	## fixes the bug of multiple java-codes (v3.0)##
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
<!-- using ' . gxtb_fb_lB_name . ' [v' . gxtb_fb_lB_version . '] | by Stefan Natter (http://www.gb-world.net) -->
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