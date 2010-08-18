<?php // Do not delete these lines
	if (!empty($_SERVER['SCRIPT_FILENAME']) && basename(__file__) == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');
?>
<?php
/*
+----------------------------------------------------------------+
+	Like-Button-Plugin-For-Wordpress [v4.1]
+	by Stefan Natter (http://www.gangxtaboii.com and http://www.gb-world.net)
+   required for Like-Button-Plugin-For-Wordpress and WordPress 2.7.x or higher
+----------------------------------------------------------------+
*/

####################################################
####################################################
###########								 ###########
###########								 ###########
###########	  LIKE-BUTTON ACTION-CLASS	 ###########
###########								 ###########
###########								 ###########
####################################################
##################### by gb-world.net   ############
####################################################

if (!class_exists('gxtb_fb_lB_Class')) {
class gxtb_fb_lB_Class {

	private $java = false;
	private $meta = false;

function gxtb_fb_lB_Class() {
	
	$gxtb_fb_lB_settings = get_option('gxtb_fb_lB_settings');
	
	// this security-if is new since v4.0 because we got some errors without this if-statement
	if ( !isset($gxtb_fb_lB_settings['addfooter_activate']) || empty($gxtb_fb_lB_settings['addfooter_activate']) )
		$gxtb_fb_lB_settings['addfooter_activate'] = false;			
			
	if ($gxtb_fb_lB_settings['activate']) {
		
		// generates the header before the site is loaded
		// add_action('wp_head', array( $this, 'gxtb_fb_lB_flush' )); ## Testweise noch eingebaut!
		
		// adding the like-button before/after the content
		add_action('the_content', array( $this, 'gxtb_fb_lB_add_after_post' ),98);
		
		// adding the java-code for the fb-like-button into the footer
		add_action('wp_footer', array( $this, 'gxtb_fb_lB_java'));
		
		// checking if the user wants to add the like-button after/before the footer
		if($gxtb_fb_lB_settings['addfooter_activate']) {
		
			if ($gxtb_fb_lB_settings['addfooter'] == __('Before the Footer', 'gb_like_button') || $gxtb_fb_lB_settings['addfooter'] == __('Vor dem Footer', 'gb_like_button')) {
				
				add_action('get_footer', array( $this, 'gxtb_fb_lB_footer_function'));
				
			} else {
			
				add_action('wp_footer', array( $this, 'gxtb_fb_lB_footer_function'));
				
			}
		}
	}
	
}

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


function gxtb_fb_lB_flush() {
	
	ob_start(array( $this, 'gxtb_fb_lB_header_flush_function' ));
	ob_end_flush();
}

## with flush-function since v1.3.7.6 - Beta 2
function gxtb_fb_lB_header_flush_function($content) {


if (!$this -> meta) {
	
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
	
	$this-> meta = true;
	return $meta . $this -> gxtb_using_message() . $content;	
	
	} // end if-meta
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
###########								 ###########
###########								 ###########
###########	  ADD THE LIKE-BUTTON		 ###########
###########			AFTER THE CONTENT	 ###########
###########								 ###########
####################################################
##################### by gb-world.net   ############
####################################################

function gxtb_fb_lB_add_after_post($content) {

	$gxtb_fb_lB_settings = get_option('gxtb_fb_lB_settings');
	$like_button_shown = false;

	if ( $gxtb_fb_lB_settings['activate'] ) {
				
		$text = "";
		
		/* PAGE - OPTIONS */
		$gxtb_frontpage = $gxtb_fb_lB_settings['frontpage'];
		$gxtb_page = $gxtb_fb_lB_settings['page'];
		$gxtb_post = $gxtb_fb_lB_settings['post'];
		$gxtb_category = $gxtb_fb_lB_settings['category'];
		$gxtb_archiv = $gxtb_fb_lB_settings['archiv'];
	
		if($gxtb_frontpage) {
			if(is_home()) {
				$text = $this -> gxtb_fb_lB_generate();
				$like_button_shown = true;
			}
		}
		
		if($gxtb_page) {
			if(is_page()) {
				if($this-> gxtb_fb_lB_exclude_check("page")) {
					$text = $this -> gxtb_fb_lB_generate();
					$like_button_shown = true;
				}
			}
		}
		
		if($gxtb_post) {
			if(is_single()){
				if($this-> gxtb_fb_lB_exclude_check("post")) {
					$text = $this -> gxtb_fb_lB_generate();
					$like_button_shown = true;
				}
			}
		}
		
		if($gxtb_category) {
			if(is_category()) {
				if($this-> gxtb_fb_lB_exclude_check("category")) {
					$text = $this -> gxtb_fb_lB_generate();
					$like_button_shown = true;
				}
			}
		}
		
		if($gxtb_archiv) {
			if(is_archive()) {
				if($this-> gxtb_fb_lB_exclude_check("archiv")) {
					$text = $this -> gxtb_fb_lB_generate();
					$like_button_shown = true;
				}
			}
		}
			
	}
	
if( $like_button_shown && ( isset($gxtb_fb_lB_settings['position_before']) || isset($gxtb_fb_lB_settings['position_after']) ) ) {	### Position im nächsten Update entfernen

	$gxtb_fb_lB_settings_both = false;

	if ( $gxtb_fb_lB_settings['position_before'] && $gxtb_fb_lB_settings['position_after'] ) {
	
		$text = $this -> gxtb_fb_lB_breaks("before") . $text . $this -> gxtb_fb_lB_breaks("after") . $content . $this -> gxtb_fb_lB_breaks("before") . $text;
		$gxtb_fb_lB_settings_both = true;
		
	} else if ( $gxtb_fb_lB_settings['position_before'] && !$gxtb_fb_lB_settings_both ) {

		$text = $this -> gxtb_fb_lB_breaks("before")  . $text . $this -> gxtb_fb_lB_breaks("after") . $content;
		
	} else if ( $gxtb_fb_lB_settings['position_after'] && !$gxtb_fb_lB_settings_both ) {
	
		$text = $content . $this -> gxtb_fb_lB_breaks("before") . $text;

	} 
	
	// returning the content of the post
	return $text;
	
} else {
	$text = $content;
	// returning the content of the post
	return $text;
}
	
}

####################################################
####################################################
###########								 ###########
###########								 ###########
###########	  ADDs the <br> BEFORE or	 ###########
###########			AFTER the BUTTON	 ###########
###########								 ###########
####################################################
##################### by gb-world.net   ############
####################################################

function gxtb_fb_lB_breaks($code) {

$gxtb_fb_lB_settings = get_option('gxtb_fb_lB_settings');
$br = "";

if ($code == "before") {

	for($count = 1; $count <= $gxtb_fb_lB_settings['br_before']; $count++)
	{
		$br .= "<br>";
	}
	
}

if ($code == "after") {

	for($count = 1; $count <= $gxtb_fb_lB_settings['br_after']; $count++)
	{
		$br .= "<br>";
	}
}

return $br;

} // end gxtb_fb_lB_breaks

####################################################
####################################################
###########								 ###########
###########								 ###########
###########	  CHECKS IF YOU CHOOSE THE	 ###########
###########		FB-LIKE-BUT-GENERATOR	 ###########
###########								 ###########
####################################################
##################### by gb-world.net   ############
####################################################

function gxtb_fb_lB_generate() {

	// get all the needed options
	$gxtb_fb_lB_generator = get_option('gxtb_fb_lB_generator');
	$gxtb_fb_lB_settings = get_option('gxtb_fb_lB_settings');
	$gxtb_fb_lB_meta = get_option('gxtb_fb_lB_meta');
	$gxtb_fb_lB_analytics = get_option('gxtb_fb_lB_analytics');
	
	################################################
	### SECURTIY IFs [v4.0] ### development-mode ###
	################################################

	// security-if-statement if some array-variables are empty
	if ( isset($gxtb_fb_lB_generator['scrolling']) || empty($gxtb_fb_lB_generator['scrolling']) )
		$gxtb_fb_lB_generator['scrolling'] = false;
		
	if ( isset($gxtb_fb_lB_generator['trans']) || empty($gxtb_fb_lB_generator['trans']) )
		$gxtb_fb_lB_generator['trans'] = false;

	################################################
	### SECURTIY IFs [v4.0] ### development-mode ###
	################################################	
		
	/* GENERATOR-CONTENT */
	$gxtb_generator_content = array();
		
	/* get all the options the generator needs */
	
	#generates the link
	if( ( is_single() || is_page() || is_category() || is_home() || is_archive() ) && $gxtb_fb_lB_generator['dynamic']) {
		$gxtb_generator_content['url'] = get_permalink($post->ID);
	} else {
		$gxtb_generator_content['url'] = $gxtb_fb_lB_generator['url'];
	}
	#generates the link

	#generates the faces
	$gxtb_generator_content['faces'] = $gxtb_fb_lB_generator['faces'];
	
	if($gxtb_generator_content['faces'] == "")
		$gxtb_generator_content['faces'] = "false";
	else
		$gxtb_generator_content['faces'] = "true";
	#generates the faces

	$gxtb_generator_content['layout'] = $gxtb_fb_lB_generator['layout'];
	$gxtb_generator_content['width'] = $gxtb_fb_lB_generator['width'];
	$gxtb_generator_content['height'] = $gxtb_fb_lB_generator['height'];
	$gxtb_generator_content['verb'] = $gxtb_fb_lB_generator['verb'];
	$gxtb_generator_content['color'] = $gxtb_fb_lB_generator['color'];
	$gxtb_generator_content['font'] = $gxtb_fb_lB_generator['font'];

	## iframe-settings ##
	$gxtb_generator_content['scrolling'] = $gxtb_fb_lB_generator['scrolling'];
	$gxtb_generator_content['frameborder'] = $gxtb_fb_lB_generator['frameborder'];
	$gxtb_generator_content['trans']  = $gxtb_fb_lB_generator['trans'];
	$gxtb_generator_content['borderstyle'] = $gxtb_fb_lB_generator['borderstyle'];
	$gxtb_generator_content['overflow'] = $gxtb_fb_lB_generator['overflow'];

	################################################
	### FB-Analytics [v4.0] ### development-mode ###
	################################################
	
	// checks if the ref-definitons are activated
	if($gxtb_fb_lB_analytics['on']) {
	
		$ref = "";
	
		// generates the ref-definiton
		if ( is_home() && $gxtb_fb_lB_analytics['frontpage_activ'] && $gxtb_fb_lB_analytics['frontpage'] != "" ) {
			$ref = $gxtb_fb_lB_analytics['frontpage'];
		}
		if ( is_page() && $gxtb_fb_lB_analytics['page_activ'] && $gxtb_fb_lB_analytics['page'] != "" ) {
			$ref = $gxtb_fb_lB_analytics['page'];
		}	
		if ( is_single() && $gxtb_fb_lB_analytics['post_activ'] && $gxtb_fb_lB_analytics['post'] != "" ) {
			$ref = $gxtb_fb_lB_analytics['post'];
		}
		if ( is_category() && $gxtb_fb_lB_analytics['category_activ'] && $gxtb_fb_lB_analytics['category'] != "" ) {
			$ref = $gxtb_fb_lB_analytics['category'];
		}	
		if ( is_archive() && $gxtb_fb_lB_analytics['archiv_activ'] && $gxtb_fb_lB_analytics['archiv'] != "" ) {
			$ref = $gxtb_fb_lB_analytics['archiv'];
		}
	
	} // end ref-def-if
	
	################################################
	### FB-Analytics [v4.0] ### development-mode ###
	################################################


	// Abfrage ob JDK aktiviert ist und die App-ID vorhanden ist!
	if( $gxtb_fb_lB_settings['JDK'] && $gxtb_fb_lB_meta['app_id'] != "" ) { 
	
		// generiert die Schriften für die JDK-Variante
		 if($gxtb_generator_content['font'] != "") {
			 	$font = ' font="' . $gxtb_generator_content['font'] . '" ';
			} else {
				 $font = '';
			}
			
	################################################
	### FB-Analytics [v4.0] ### development-mode ###
	################################################	
		// generiert die FB-Insights-Analyse (REL)
		if(isset($ref) && $ref != "") {
			$ref = 'ref="'. $ref .'"';
		}
		else {
			$ref = "";
		}
	################################################
	### FB-Analytics [v4.0] ### development-mode ###
	################################################
			
			
	// Zusammenbau des fb:like-Outputs
	$text = '<fb:like href="'. urlencode($gxtb_generator_content['url']) .'" layout="'. $gxtb_generator_content['layout'] .'" show_faces="'. $gxtb_generator_content['faces'] .'" width="'. $gxtb_generator_content['width'] .'" action="'. $gxtb_generator_content['verb'] .'"' . $font .'colorscheme="'. $gxtb_generator_content['color'] .'" '. $ref .'></fb:like>';

	$text .= $this -> gxtb_fb_lB_java();

	} else {
	
	################################################
	##### i-Frame ##### if JDK is not activated ####
	################################################	
		
	## enable fonts
	 if($gxtb_generator_content['font'] != "") {
		 
		 switch ($gxtb_generator_content['font']) {
			 case "luciada grande":
			 	$font = "lucida+grande";
			 break;
			 
			 case "segoe ui":
			 	$font = "segoe+ui";
			 break;
			 
			 case "trebuchet ms":
			 	$font = "trebuchet+ms";
			 break;
			 
			 default:
			 	$font = $gxtb_generator_content['font'];
			 break;
		 }
		 
		$font = 'font=' . $font . '&amp;';
	} else {
		$font = '';	
	}
	
	// setting defaults if sth. is empty
	if ($gxtb_generator_content['width'] == "") {
		$width = "450";
	} else{
		$width = $gxtb_generator_content['width'];
	}

	// setting defaults if sth. is empty
	if ($gxtb_generator_content['frameborder'] == "") {
		$frameborder = "0";
	} else{
		$frameborder = $gxtb_generator_content['frameborder'];
	}
	
	// setting defaults if sth. is empty	
	if ($gxtb_generator_content['borderstyle'] == "") {
		$borderstyle = "none";
	} else{
		$borderstyle = $gxtb_generator_content['borderstyle'];
	}
	
	if ($gxtb_generator_content['trans']) {
		$trans = "true";
	} else{
		$trans = "false";
	}	
	
	if ($gxtb_generator_content['scrolling']) {
		$scrolling = "yes";
	} else{
		$scrolling = "no";
	}		

	################################################
	### FB-Analytics [v4.0] ### development-mode ###
	################################################	
		// generiert die FB-Insights-Analyse (REF)
		if(isset($ref) && $ref != "") {
			$ref = '&amp;ref='. $ref;
		}
		else {
			$ref = "";
		}
	################################################
	### FB-Analytics [v4.0] ### development-mode ###
	################################################
	
	$text = '<iframe src="http://www.facebook.com/plugins/like.php?href='. urlencode($gxtb_generator_content['url']) .'&amp;layout='. $gxtb_generator_content['layout'] .'&amp;show_faces='. $gxtb_generator_content['faces'] .'&amp;width='. $width .'&amp;action='. $gxtb_generator_content['verb'] .'&amp;' . $font . 'colorscheme='. $gxtb_generator_content['color'] .''.$ref.'" scrolling="'. $scrolling .'" frameborder="'. $frameborder .'" allowTransparency="'. $trans .'" style="border:'. $borderstyle .'; overflow:'. $gxtb_generator_content['overflow'] .'; width:'. $width .'px; height:'. $gxtb_generator_content['height'] .'px"></iframe>';

	}
	
	/* returns the generated code and generates the final output*/
	
	// CSS-Class
	$div_before = "";
	$div_after = "";
	
	if ( isset($gxtb_fb_lB_settings['css']) && $gxtb_fb_lB_settings['css'] != "" ) {
		$div_before = '<div class="' . $gxtb_fb_lB_settings['css'] . '">';
		$div_after = '</div>';
	}
	
	return $this -> gxtb_using_message() . $div_before . $text . $div_after . $this -> gxtb_using_message();
}

####################################################
####################################################
###########								 ###########
###########								 ###########
###########	  CHECKS IF YOU CHOOSE 		 ###########
###########			EXCLUDED IDs	 	 ###########
###########								 ###########
####################################################
##################### by gb-world.net   ############
####################################################

function gxtb_fb_lB_exclude_check($def) {

	$gxtb_fb_lB_settings = get_option('gxtb_fb_lB_settings');

	/* EXCLUDE - OPTIONS */
	$gxtb_page = $gxtb_fb_lB_settings['page_exclude'];
	$gxtb_post = $gxtb_fb_lB_settings['post_exclude'];
	$gxtb_category = $gxtb_fb_lB_settings['category_exclude'];
	$gxtb_archiv = $gxtb_fb_lB_settings['archiv_exclude'];

	$array = array();

	switch ($def) {
	
		case "page":
		
			if ((strpos($gxtb_page, ",")) > 0) {
				$array = $this -> ArrayTrim($gxtb_page);
				
				if(!is_page($array))
					return true;
				else
					return false;
					
			} elseif ($gxtb_page != "") {
				
				if(!is_page($gxtb_page))
					return true;
					
			} else {
				
				return true;
			}
			
		break;
				
		case "post":
		
			if ((strpos($gxtb_post, ",")) > 0) {
				$array = $this -> ArrayTrim($gxtb_post);
				
				if(!is_single($array))
					return true;
				else
					return false;
					
			} elseif ($gxtb_post != "") {
				
				if(!is_single($gxtb_post))
					return true;
					
			} else {
				
				return true;
			}				
		break;
				
		case "category":
			if ((strpos($gxtb_category, ",")) > 0) {
				$array = $this -> ArrayTrim($gxtb_category);
				
				if(!is_category($array))
					return true;
				else
					return false;
					
			} elseif ($gxtb_category != "") {
				
				if(!is_category($gxtb_category))
					return true;
					
			} else {
				
				return true;
			}				
		break;
				
		case "archiv":
			if ((strpos($gxtb_archiv, ",")) > 0) {
				$array = $this -> ArrayTrim($gxtb_archiv);
				
				if(!is_archive($array))
					return true;
				else
					return false;
					
			} elseif ($gxtb_archiv != "") {
				
				if(!is_archive($gxtb_archiv))
					return true;
					
			} else {
				
				return true;
			}				
		break;
								
		default:
			return false;
	}
}

function ArrayTrim($content) {

	if ($content != "") {

		$array = array();
		$i = 0;
	
		##echo "BEFORE: " . $content . "<br>";
		
		while (!$this -> ArrayCheck($content)){
			
			$i += 1;
			
			$pos = strpos($content, ",", 0);
			$array[strval($i)] = substr($content, 0, $pos);
			
			$content = strstr($content, ",");
			##echo "STRSTR: " . $content . "<br>";
			
			$content = trim($content, ",");
			##echo "TRIM: " .  $content  . "<br>";
			
			if(!strpos($content,","))
				$array[strval($i + 1)] = substr($content, 0);
		}
		
			return $array;
	} else {
		return "";
	}
}


function ArrayCheck($content) {

	$find = strpos($content, ",");
	
	if($find > 0) {
		return false;
	} else {
		return true;
	}
}

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

function gxtb_fb_lB_add_lShortcode() {

	$gxtb_fb_lB_settings = get_option('gxtb_fb_lB_settings');

	if ( $gxtb_fb_lB_settings['activate'] )
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

function gxtb_fb_lB_function() {

	return $this -> gxtb_fb_lB_generate();
	
	// header-action
	/*if (is_front_page() || is_single() || is_home() || is_page() || is_category() || is_tag()  || is_tax() || is_taxonomy() || is_author() || is_date()  || is_year() || is_month() || is_day() || is_time() || is_archive() || is_search() ||is_404() || is_paged() || is_attachment() || is_singular() || is_feed() || is_preview())*/
	
}

####################################################
####################################################
###########								 ###########
###########								 ###########
###########	  LIKE-BUTTON (SHORTCODE)	 ###########
###########			FOOTER-ACTION		 ###########
###########								 ###########
####################################################
##################### by gb-world.net   ############
####################################################

function gxtb_fb_lB_footer_function() {

	$gxtb_fb_lB_settings = get_option('gxtb_fb_lB_settings');
	$gxtb_fb_lB_meta = get_option('gxtb_fb_lB_meta');

	echo $this -> gxtb_fb_lB_generate();
	
	$this -> gxtb_fb_lB_java();
	
	echo $this -> gxtb_using_message();
	
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

	$gxtb_fb_lB_settings = get_option('gxtb_fb_lB_settings');
	$gxtb_fb_lB_meta = get_option('gxtb_fb_lB_meta');
	
	## second if-statement since [v.1.3.7.2] ##
if($gxtb_fb_lB_settings['JDK'] && $gxtb_fb_lB_meta['app_id'] != "" || $gxtb_fb_lB_meta['app_id'] != "") {

	$gxtb_fb_lB_generator = get_option('gxtb_fb_lB_generator');
	$lang = $gxtb_fb_lB_generator['language'];
?>

<div id="fb-root"></div>
<script>
  window.fbAsyncInit = function() {
    FB.init({appId: '<?php echo $gxtb_fb_lB_meta['app_id']; ?>', status: true, cookie: true,
             xfbml: true});
  };
  (function() {
    var e = document.createElement('script');
	e.type = 'text/javascript';
    e.src = document.location.protocol +
      '//connect.facebook.net/<?php ## the user can choose the language since [v.1.4.5]
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