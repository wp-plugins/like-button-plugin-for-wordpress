<?php
/*
	Plugin Name: Like-Button-Plugin-For-Wordpress
	Plugin URI: http://www.gb-world.net/like-button-plugin-for-wordpress/
	Description: Adds a Facebook-Like-Button, Shortcode [like] for the Button and a Like-Button-Widget to your Blog which you could add to every post/page. A Like-Button widget is available as well as a Like-Button after every post/page you choose.
	Version: 3.1
	Author: Stefan Natter
	Author URI: http://www.gb-world.net
	Update Server: http://wordpress.org/extend/plugins/like-button-plugin-for-wordpress
	Min WP Version: 2.7.x
	Max WP Version: 2.9.x
*/

/* Copyright (C) 2010 Stefan Natter (http://www.gb-world.net and http://www.gangxtaboii.com)

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA

<http://www.gnu.org/licenses/>.
http://www.gnu.org/licenses/gpl.txt
*/

/* -NOTICE- Some things are still in GERMAN -NOTICE-

-gangxtaboii.com-DEV-NOTICE-
	all our functions are available at all levels in wp - except they are in classes. other plugins could possibly use your functions. but we recommend to do not
	use them because all of them were just written for our own several plugins and they will properly do not work as they should work
	if you use it in combination with your own plugins/themes.
-gangxtaboii.com-DEV-NOTICE-

some important pages for you:
	http://sudarmuthu.com/wordpress/wp-readme
	http://wordpress.org/extend/plugins/about/validator/
*/

####################################################
####################################################
###########								 ###########
###########								 ###########
###########	      STOP DIRECT CALL		 ###########
###########								 ###########
###########								 ###########
####################################################
##################### by gb-world.net   ############
####################################################

if(preg_match('#' . basename(__FILE__) . '#', $_SERVER['PHP_SELF'])) { die('You are not allowed to call this page directly.'); }

####################################################
####################################################
###########								 ###########
###########								 ###########
###########	      GB-NEWSBOX [v1.5]		 ###########
###########								 ###########
###########								 ###########
####################################################
##################### by gb-world.net   ############
####################################################

$gxtb_fb_like_button_active = "off";

####################################################
####################################################
###########								 ###########
###########								 ###########
###########	       DEFINITIONS			 ###########
###########								 ###########
###########								 ###########
####################################################
##################### by gb-world.net   ############
####################################################

## look at the main-class
$gb_fb_lB_path = WP_PLUGIN_URL.'/'.str_replace(basename( __FILE__),"",plugin_basename(__FILE__));

####################################################
####################################################
###########								 ###########
###########								 ###########
###########	      MAIN-CLASS			 ###########
###########								 ###########
###########								 ###########
####################################################
##################### by gb-world.net   ############
####################################################

class gxtb_fb_like_button_Class {

function gxtb_fb_like_button_Class() {
	
########################################################################################################
											## BEGIN DEFINITIONS  ##

	$gxt_fb_like_button_shortcode = "gxtb_fb_lB";

if ( !defined( $gxt_fb_like_button_shortcode . '_version' ) )
	define( $gxt_fb_like_button_shortcode . '_version', "3.1" );

if ( !defined( $gxt_fb_like_button_shortcode . '_name' ) )
	define( $gxt_fb_like_button_shortcode . '_name', "Like-Button-Plugin-For-Wordpress" );

if ( !defined( $gxt_fb_like_button_shortcode . '_shortcode' ) )
	define( $gxt_fb_like_button_shortcode . '_shortcode', "gxtb" );

if ( !defined( 'gxtb_fb_lB_FB_BASENAME' ) )
	define( 'gxtb_fb_lB_FB_BASENAME', plugin_basename( __FILE__ ) );

if ( !defined( 'gxtb_fb_lB_FB_BASEFOLDER' ) )
	define( 'gxtb_fb_lB_FB_BASEFOLDER', plugin_basename( dirname( __FILE__ ) ) );

if ( !defined( 'gxtb_fb_lB_FB_FILENAME' ) )
	define( 'gxtb_fb_lB_FB_FILENAME', str_replace( gxtb_fb_lB_FB_BASEFOLDER.'/', '', plugin_basename(__FILE__) ) );

	// Check for GB_FB-V4.0 installation
if (!defined ('IS_GB_FB_4_0'))
		define('IS_GB_FB_4_0', version_compare(gxtb_fb_lB_version, '4.0', '>=') );

											## END DEFINITIONS  ##
########################################################################################################
											## BEGIN SETTING-PAGE  ##

	$this -> gxtb_fb_lB_options();
	$this -> gxtb_fb_lB_info_page();

											## END SETTING-PAGE  ##
########################################################################################################
											## BEGIN PLUGIN-ACTION  ##

	// initialize the actions (SHORTCODE)
	$this -> gxtb_fb_lb_action();
	
	// ainitialize the widget
	$this -> gxtb_fb_lb_add_widget();


											## END PLUGIN-ACTION  ##
########################################################################################################
											## BEGIN PLUGIN-BUTTONS ##

	// add aditional links to the plugin-page
	global $wp_version;
	if ( version_compare( $wp_version, '2.8', '>=' ) )
	  add_filter( 'plugin_row_meta', array( $this, 'gxtb_fb_lB_filter_plugin_meta' ), 10, 2 ); // only 2.8 and higher
	add_filter( 'plugin_action_links', array( $this, 'gxtb_fb_lB_filter_plugin_meta' ), 10, 2 );

											## END PLUGIN-BUTTONS ##
########################################################################################################
											## BEGIN OTHER HOOKS ##

	// hooks for deactivation and activation of the plugin - currently out of use!
	register_activation_hook( __FILE__, array(&$this, 'gxtb_fb_lB_activate'));
	register_deactivation_hook( __FILE__, array(&$this, 'gxtb_fb_lB_deactivate'));
	
											## END OTHER HOOKS ##
########################################################################################################
##http://de.selfhtml.org/javascript/objekte/document.htm#get_elements_by_tag_name
}

####################################################
####################################################
###########								 ###########
###########								 ###########
###########	      INTERNATIONALIZE		 ###########
###########								 ###########
###########								 ###########
####################################################
##################### by gb-world.net   ############
####################################################

function gxtb_fb_lB_options_load_textdomain() {
		
	// Load up the localization file if we're using WordPress in a different language
	// Place it in this plugin's "lang" folder and name it "gb_like_button-[value in wp-config].mo"
	load_plugin_textdomain( 'gb_like_button', FALSE, plugin_basename( dirname(__FILE__) ).'/languages' );
	
	
	/* Notice from the gb-dev-team:
	Examples for language-translating:
	(German):  http://www.texto.de/wordpress-theme-lokalisieren-sprachdatei-erstellen-schritt-fuer-schritt-anleitung-553/
	(English): http://weblogtoolscollection.com/archives/2007/08/27/localizing-a-wordpress-plugin-using-poedit/
	(English): http://www.lost-in-code.com/platforms/wordpress/wordpress-translate-a-plugin/	*/
}

####################################################
####################################################
###########								 ###########
###########								 ###########
###########	      OPTION PAGE			 ###########
###########								 ###########
###########								 ###########
####################################################
##################### by gb-world.net   ############
####################################################

function gxtb_fb_lB_options() {

	/* these scripts are needed to create the meta-boxes */
	wp_enqueue_script('common');
	wp_enqueue_script('wp-lists');
	wp_enqueue_script('postbox');
	
	$this -> gxtb_fb_lB_options_load_textdomain();
	
	// initialize the settings-page
	require_once(dirname(__FILE__) . '/html/setting-page.php');
	require_once(dirname(__FILE__) . "/gbworld/gb_newsbox.php");
	$gxtb_fb_lB_spClass = new gxtb_fb_lB_spClass();
}

####################################################
####################################################
###########								 ###########
###########								 ###########
###########	      INFO PAGE				 ###########
###########		 (since v3.0)	    	 ###########
###########								 ###########
####################################################
##################### by gb-world.net   ############
####################################################

function gxtb_fb_lB_info_page() {

	global $gxtb_fb_like_button_active;

	/* these scripts are needed to create the meta-boxes */
	wp_enqueue_script('common');
	wp_enqueue_script('wp-lists');
	wp_enqueue_script('postbox');
	
	$this -> gxtb_fb_lB_options_load_textdomain();

	$gxtb_InfoPageArray = array(
	  "active" => $gxtb_fb_like_button_active,
	  "language" => "gb_like_button",
	  "name" => gxtb_fb_lB_name,
	  "version" => gxtb_fb_lB_version,
	  "def" => "Plugin"
	);
			
	// initialize the settings-page
	require_once(dirname(__FILE__) . '/gbworld/gb_infopage.php');
	$gxtb_infoPageClass = new gxtb_infoPageClass($gxtb_InfoPageArray);
}



####################################################
####################################################
###########								 ###########
###########								 ###########
###########	      PLUGIN PAGE			 ###########
###########								 ###########
###########								 ###########
####################################################
##################### by gb-world.net   ############
####################################################
## http://striderweb.com/nerdaphernalia/2008/06/wp-use-action-links/ ##

// Additional Plugin-Buttons
function gxtb_fb_lB_filter_plugin_meta($links, $file) {

	/* donate-link */
	    if ( $file == gxtb_fb_lB_FB_BASENAME ) {
		$links[] =  sprintf( '<a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=SB94MEM9ATTBG" target="_blank">'. __('Donate') . '</a>'); // ... or after other links
    }

    /* settings-link */
    if ( $file == gxtb_fb_lB_FB_BASENAME ) {
	    array_unshift(
            $links,
            sprintf( '<a href="options-general.php?page=%s">%s</a>', "fb-like-button", __('Settings') )
        );		
    }
	
    return $links;
}

####################################################
####################################################
###########								 ###########
###########								 ###########
###########	    PLUGIN ACTION			 ###########
###########								 ###########
###########								 ###########
####################################################
##################### by gb-world.net   ############
####################################################

function gxtb_fb_lb_action() {

	require_once( 'include/fb_likeButton.php' );

	//call the action-classes:
	$gxtb_fb_lB_Class = new gxtb_fb_lB_Class();
	$gxtb_fb_lB_Class -> gxtb_fb_lB_add_lShortcode();

}

####################################################
####################################################
###########								 ###########
###########								 ###########
###########	    REGISTER WIDGET 		 ###########
###########								 ###########
###########								 ###########
####################################################
##################### by gb-world.net   ############
####################################################

function gxtb_fb_lb_add_widget() {

	require_once( 'include/fb_widget.php');
	
	$gxtb_fb_lB_WidgetClass = new gxtb_fb_lB_WidgetClass();
}

####################################################
####################################################
###########								 ###########
###########								 ###########
###########	    REGISTER THIS PLUGIN	 ###########
###########								 ###########
###########								 ###########
####################################################
##################### by gb-world.net   ############
####################################################

function gxtb_fb_lB_activate(){
	
	$gb_world_plugins = array(
		gxtb_fb_lB_name => gxtb_fb_lB_version
	);
    
	if ( !get_option('gb_world_plugins')){
      add_option('gb_world_plugins' , $gb_world_plugins);
    } else {
      update_option('gb_world_plugins' , $gb_world_plugins);
    }

  }
  
  function gxtb_fb_lB_deactivate(){

	$gb_world_plugins = array(
		gxtb_fb_lB_name => false
	);

    update_option('gb_world_plugins' , $gb_world_plugins);
		
  }
  
}

// Let's start the plugin by gb-world.net
	global $gxtb_fb_lB_but;
	$gxtb_fb_lB_but = new gxtb_fb_like_button_Class();
?>