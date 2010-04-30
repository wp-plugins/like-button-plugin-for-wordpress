<?php // Do not delete these lines
	if (!empty($_SERVER['SCRIPT_FILENAME']) && basename(__file__) == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');
?>
<?php
/*
+----------------------------------------------------------------+
+	Like-Button-Plugin-For-Wordpress [v1.3.7.5]
+	by Stefan Natter (http://www.gangxtaboii.com)
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
##################### by ganxtaboii.com ############
####################################################

class gxtb_fb_lB_Class {

function gxtb_fb_lB_Class() {
	
	$gxtb_fb_lB_settings = get_option('gxtb_fb_lB_settings');
	
	if ($gxtb_fb_lB_settings['activate']) {
		
		// Adding the meta-tags
		add_action('wp_head', array( $this, 'gxtb_fb_lB_header_function' ));
		
		// adding the like-button when a [like]-Shortcode is detected
		add_action('the_content', array( $this, 'gxtb_fb_lB_add_after_post' ),98);
		
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
###########	  ADD THE LIKE-BUTTON		 ###########
###########			AFTER THE CONTENT	 ###########
###########								 ###########
####################################################
##################### by ganxtaboii.com ############
####################################################

function gxtb_fb_lB_add_after_post($content) {

	$gxtb_fb_lB_settings = get_option('gxtb_fb_lB_settings');

	if ($gxtb_fb_lB_settings['activate']) {
				
		$text = "";
		
		/* PAGE - OPTIONS */
		$gxtb_frontpage = $gxtb_fb_lB_settings['frontpage'];
		$gxtb_page = $gxtb_fb_lB_settings['page'];
		$gxtb_post = $gxtb_fb_lB_settings['post'];
	
		if($gxtb_frontpage) {
			if(is_home()) {
				$text = $this -> gxtb_fb_lB_generate();
			}
		}
		
		if($gxtb_page) {
			if(is_page()) {
				if($this-> gxtb_fb_lB_exclude_check("page")) {
					$text = $this -> gxtb_fb_lB_generate();
				}
			}
		}
		
		if($gxtb_post) {
			if(is_single()){
				if($this-> gxtb_fb_lB_exclude_check("post")) {
					$text = $this -> gxtb_fb_lB_generate();
				}
			}
		}
			
	}
	
	$text = $content . "<br><br>" . $text . $this -> gxtb_fb_lB_java();
	
	// returning the content of the post
	return $text;
}


####################################################
####################################################
###########								 ###########
###########								 ###########
###########	  CHECKS IF YOU CHOOSE THE	 ###########
###########		FB-LIKE-BUT-GENERATOR	 ###########
###########								 ###########
####################################################
##################### by ganxtaboii.com ############
####################################################

function gxtb_fb_lB_generate() {

	$gxtb_fb_lB_generator = get_option('gxtb_fb_lB_generator');
	$gxtb_fb_lB_settings = get_option('gxtb_fb_lB_settings');
	$gxtb_fb_lB_meta = get_option('gxtb_fb_lB_meta');
	
	/* GENERATOR-CONTENT */
	$gxtb_generator_content = array();
		
	/* get all the options the generator needs */
	
	#generates the link (since v1.3.7.5)
	if(is_single() || is_page()) {
		$gxtb_generator_content['url'] = get_permalink($post->ID);
	} else {
		$gxtb_generator_content['url'] = $gxtb_fb_lB_generator['url'];
	}
		
	$gxtb_generator_content['layout'] = $gxtb_fb_lB_generator['layout'];
	$gxtb_generator_content['faces'] = $gxtb_fb_lB_generator['faces'];
	$gxtb_generator_content['width'] = $gxtb_fb_lB_generator['width'];
	$gxtb_generator_content['heigth'] = $gxtb_fb_lB_generator['height'];
	$gxtb_generator_content['verb'] = $gxtb_fb_lB_generator['verb'];
	$gxtb_generator_content['color'] = $gxtb_fb_lB_generator['color'];
	
	## get_permalink(); or get_permalink($post->ID)
	
	## since [v1.3.7.2] ##
	if($gxtb_fb_lB_settings['JDK'] && $gxtb_fb_lB_meta['app_id'] != "") { 
	
	$text = '<fb:like href="'. $gxtb_generator_content['url'] .'" layout="'. $gxtb_generator_content['layout'] .'" show_faces="'. $gxtb_generator_content['faces'] .'" width="'. $gxtb_generator_content['width'] .'" action="'. $gxtb_generator_content['verb'] .'" colorscheme="'. $gxtb_generator_content['color'] .'"></fb:like>';
	
	} else {
	
	$text = '<iframe src="http://www.facebook.com/plugins/like.php?href='. $gxtb_generator_content['url'] .'&layout='. $gxtb_generator_content['layout'] .'&amp;show_faces='. $gxtb_generator_content['faces'] .'&amp;width='. $gxtb_generator_content['width'] .'&amp;action='. $gxtb_generator_content['verb'] .'&amp;colorscheme='. $gxtb_generator_content['color'] .'" scrolling="no" frameborder="0" allowTransparency="true" style="border:none; overflow:hidden; width:'. $gxtb_generator_content['width'] .'px; height:'. $gxtb_generator_content['height'] .'px"></iframe>';
	
	}
	
	/* returns the generated code */
	return $text;
}

####################################################
####################################################
###########								 ###########
###########								 ###########
###########	  CHECKS IF YOU CHOOSE 		 ###########
###########			EXCLUDED IDs	 	 ###########
###########								 ###########
####################################################
##################### by ganxtaboii.com ############
####################################################

function gxtb_fb_lB_exclude_check($def) {

	$gxtb_fb_lB_settings = get_option('gxtb_fb_lB_settings');

	/* EXCLUDE - OPTIONS */
	$gxtb_page = $gxtb_fb_lB_settings['page_exclude'];
	$gxtb_post = $gxtb_fb_lB_settings['post_exclude'];

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
##################### by ganxtaboii.com ############
####################################################

function gxtb_fb_lB_add_lShortcode() {

	$gxtb_fb_lB_settings = get_option('gxtb_fb_lB_settings');

	if ($gxtb_fb_lB_settings['activate'])
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
##################### by ganxtaboii.com ############
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
###########			META-ACTION			 ###########
###########								 ###########
####################################################
##################### by ganxtaboii.com ############
####################################################

function gxtb_fb_lB_header_function() {
	
	$gxtb_fb_lB_meta = get_option('gxtb_fb_lB_meta');
	
	// filter/action adden die folgendes in den <html> tag schreibt:
			 /*xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="de-DE"
		xmlns:og="http://opengraphprotocol.org/schema/"
		xmlns:fb="http://www.facebook.com/2008/fbml">
		<head profile="http://gmpg.org/xfn/11"*/
			
	foreach($gxtb_fb_lB_meta as $key => $value) { 
	
		if($value != "") { 
		
			if(strstr($value, '$')) {
			
				switch ($value) {
					case strstr($value, '$binfo'): ?>
<meta property=og:"site_name" content="<?php echo bloginfo('name'); ?>"/>
						<?php break;
						
					case strstr($value, '$ptitle')?>
<meta property="og:title" content="<?php echo get_the_title($post->ID) ?>"/>
						<?php break;
						
					case strstr($value, '$plink'):?>
<meta property="og:url" content="<?php echo get_permalink($post->ID) ?>"/>
						<?php break;
					default:
						break;
				}
				
				## maybe there'll be some problemes with the app_id and admins-meta tags when both appear. we'll see #
			} elseif ($key == "app_id") {
		?>
<meta property="fb:<?php echo $key; ?>" content="<?php echo $value; ?>"/>
		<?php
			} elseif ($key == "admins") {
		?>
<meta property="fb:<?php echo $key; ?>" content="<?php echo $value; ?>"/>
		<?php  ## new since v1.3.7.5 ##
			} elseif ($key == "description" ) { 
				if(is_home()) {
					if( $value != "") {
			?>
<meta property="og:<?php echo $key; ?>" content="<?php echo $value; ?>"/>
	
			<?php } else { ?>
			
<meta property="og:<?php echo $key; ?>" content="<?php get_bloginfo('description'); ?>"/>
	
			<?php }
				}   ## new since v1.3.7.5 ##
			} elseif ($key != "post_focus") {
		?>
<meta property="og:<?php echo $key; ?>" content="<?php echo $value; ?>"/>
		<?php } 
		}	
	} 
			
	$this -> gxtb_using_message();		
}

####################################################
####################################################
###########								 ###########
###########								 ###########
###########	  LIKE-BUTTON (SHORTCODE)	 ###########
###########			FOOTER-ACTION		 ###########
###########								 ###########
####################################################
##################### by ganxtaboii.com ############
####################################################

function gxtb_fb_lB_footer_function() {

	$gxtb_fb_lB_settings = get_option('gxtb_fb_lB_settings');
	$gxtb_fb_lB_meta = get_option('gxtb_fb_lB_meta');

	echo $this->gxtb_fb_lB_generate();
	
	$this -> gxtb_fb_lB_java();
	
	$this -> gxtb_using_message();
	
}

####################################################
####################################################
###########								 ###########
###########								 ###########
###########	  GENERATES THE JAVA-CODE	 ###########
###########								 ###########
###########								 ###########
####################################################
##################### by ganxtaboii.com ############
####################################################

function gxtb_fb_lB_java() {
	
	$gxtb_fb_lB_settings = get_option('gxtb_fb_lB_settings');
	$gxtb_fb_lB_meta = get_option('gxtb_fb_lB_meta');
	
	## second if-statement since [v.1.3.7.2] ##
if($gxtb_fb_lB_settings['JDK'] && $gxtb_fb_lB_meta['app_id'] != "" || $gxtb_fb_lB_meta['app_id'] != "") {
?>
<div id="fb-root"></div>
<script>
  window.fbAsyncInit = function() {
    FB.init({appId: '<?php echo $gxtb_fb_lB_meta['app_id']; ?>', status: true, cookie: true,
             xfbml: true});
  };
  (function() {
    var e = document.createElement('script'); e.async = true;
    e.src = document.location.protocol +
      '//connect.facebook.net/en_US/all.js';
    document.getElementById('fb-root').appendChild(e);
  }());
</script>

<?php
	
	}
}

####################################################
####################################################
##### YOU ARE NOT ALLOWED TO DELETE THIS LINE ######
####################################################
##################### by ganxtaboii.com ############
####################################################
function gxtb_using_message() {

echo '
<!-- using ' . gxtb_fb_lB_name . ' [v' . gxtb_fb_lB_version . '] | by http://www.gangxtaboii.com -->
';
}
####################################################
####################################################
##### YOU ARE NOT ALLOWED TO DELETE THIS LINE ######
####################################################
##################### by ganxtaboii.com ############
####################################################
}
?>