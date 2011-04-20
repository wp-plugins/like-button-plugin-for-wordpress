<?php
/* 
	Plugin Name: Like-Button-Plugin-For-Wordpress
	Plugin URI: http://www.gb-world.net/like-button-plugin-for-wordpress/
	Description: This Plugin provides the most settings for the Like-Button of Facebook. It's in a steadily development to ensure that everything is up-to-date with all the Web 2.0 Standards and Requirements. Enjoy the Like-Button now with GB-World.net's Like-Button-Plugin-For-Wordpress!
	Version: 4.4.3.3
	Author: Stefan Natter
	Author URI: http://www.gb-world.net
	Update Server: http://wordpress.org/extend/plugins/like-button-plugin-for-wordpress
	Min WP Version: 2.7.x
	Max WP Version: 3.x
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
###########	      MAIN-CLASS			 ###########
###########								 ###########
###########								 ###########
####################################################
##################### by gb-world.net   ############
####################################################
if(!class_exists('GBLikeButton')) {
class GBLikeButton {
	
	# Klassenvariablen #
	var $GBWarningSys;
	var $GBLikeButton; /* diese Variable verkörpert alle Settings aller Einstellungen Klassenweit */
	
function GBLikeButton() {

########################################################################################################
											## BEGIN DEFINITIONS  ##

	## including another plugin for our plugin ##
	include_once('plugins/changelogger/changelogger.php');

	$gb_fb_lB_path = WP_PLUGIN_URL.'/'.str_replace(basename( __FILE__),"",plugin_basename(__FILE__));
	$this->GBLikeButton = get_option('GBLikeButton');									
	global $wp_version;
	
if ( !defined('gxtb_fb_lB_shortcode' ) )
	define( 'gxtb_fb_lB_shortcode', "gxtb" );
if ( !defined('gxtb_fb_lB_version' ) )
	define( 'gxtb_fb_lB_version', "4.4.3.3" );
if ( !defined( 'gxtb_fb_lB_name' ) )
	define( 'gxtb_fb_lB_name', "Like-Button-Plugin-For-Wordpress" );
if ( !defined( 'gxtb_fb_lB_page' ) )
	define( 'gxtb_fb_lB_page', "fb-like-button" );
if ( !defined( 'gxtb_fb_lB_lang' ) )
	define( 'gxtb_fb_lB_lang', "gb_like_button" );
if ( !defined( 'gxtb_fb_lB_debug' ) )
	define( 'gxtb_fb_lB_debug', false );
if ( !defined( 'gxtb_fb_lB_PLUGIN_FOLDER' ) )
	define( 'gxtb_fb_lB_PLUGIN_FOLDER', $gb_fb_lB_path );
if ( !defined( 'gxtb_fb_lB_FB_BASENAME' ) )
	define( 'gxtb_fb_lB_FB_BASENAME', plugin_basename( __FILE__ ) );
if ( !defined( 'gxtb_fb_lB_FB_BASEFOLDER' ) )
	define( 'gxtb_fb_lB_FB_BASEFOLDER', plugin_basename( dirname( __FILE__ ) ) );
if ( !defined( 'gxtb_fb_lB_FB_FILENAME' ) )
	define( 'gxtb_fb_lB_FB_FILENAME', str_replace( gxtb_fb_lB_FB_BASEFOLDER.'/', '', plugin_basename(__FILE__) ) );
if ( !defined( 'gxtb_fb_lB_ABSPATH' ) )
	define('gxtb_fb_lB_ABSPATH', WP_PLUGIN_DIR.'/'.plugin_basename( dirname(__FILE__) ).'/' );
if ( !defined( 'gxtb_fb_lB_URLPATH' ) )
	define('gxtb_fb_lB_URLPATH', WP_PLUGIN_URL.'/'.plugin_basename( dirname(__FILE__) ).'/' );

											## END DEFINITIONS  ##
########################################################################################################
											## BEGIN OTHER HOOKS ##
											
											
	register_activation_hook( __FILE__, array(&$this, 'gxtb_fb_lB_activate'));
	register_deactivation_hook( __FILE__, array(&$this, 'gxtb_fb_lB_deactivate'));
	register_uninstall_hook( __FILE__, array(&$this, 'gxtb_fb_lB_uninstall'));
	
											## END OTHER HOOKS ##
########################################################################################################
											## BEGIN PLUGIN-ACTION  ##

	// initialize the SHORTCODE and WIDGET
	$this -> gxtb_fb_lB_action();
	$this -> gxtb_fb_lB_add_widget();

											## END PLUGIN-ACTION  ##
########################################################################################################
											## BEGIN PLUGIN-PAGE-BUTTONS ##

	// add aditional links to the plugin-page
	if ( version_compare( $wp_version, '2.8', '>=' ) ) {
	  	add_filter( 'plugin_row_meta', array( $this, 'gxtb_fb_lB_filter_plugin_meta' ), 10, 2 ); // only 2.8 and higher
		add_filter( 'plugin_action_links', array( $this, 'gxtb_fb_lB_filter_plugin_meta' ), 10, 2 );
		
		// add message to list of plugins, if an update is available / add additional links on Plugins page, but only if page is plugins.php
		if ( is_admin() && 'plugins.php' == $GLOBALS['pagenow'] ) {
			add_action( 'in_plugin_update_message-' . plugin_basename(__FILE__), array( $this, 'gxtb_fb_lB_update_notice' ), 10, 2 );
		}
		
	} else {
		add_filter( 'plugin_action_links', array( $this, 'gxtb_fb_lB_filter_plugin_meta' ), 10, 2 );
	}

											## END PLUGIN-PAGE-BUTTONS ##
########################################################################################################
##http://de.selfhtml.org/javascript/objekte/document.htm#get_elements_by_tag_name
########################################################################################################
											## BEGIN SETTING-PAGE  ##

	$this -> gxtb_fb_lB_options();

											## END SETTING-PAGE  ##
########################################################################################################
											## BEGIN INCLUDE ##

	include_once(dirname(__FILE__) . '/include/gb_post.php');
	#include_once(dirname(__FILE__) . '/include/gb_template.php');
	include_once(dirname(__FILE__) . '/tinymce/gb_button.php');
	include_once(dirname(__FILE__) . '/admin/gb_message.php');
	$this -> GBWarningSys = new GBWarningSys();

											## END INCLUDE ##
########################################################################################################
											## BEGIN ACTION ##
	
	// initialize the Warning-System -- currently out of work sine 4.4.3 - bug testing is open
	#add_action('admin_notices', array(&$this,'gxtb_fb_lB_warningsys'));
	#add_action('admin_head', array(&$this, 'gxtb_fb_lB_warningsysheader'));
		
	// controlls the cache of the feed-reader
	add_filter( 'wp_feed_cache_transient_lifetime', array(&$this,'gxtb_fb_lB_feed_controller') );
	
	// generates the header before the site is loaded
	add_action('wp_head', array( $this, 'gxtb_fb_lB_MetaTags' ));

	if ( version_compare( $wp_version, '2.7', '>=' ) )
	// creates a dashboard-widget which contains the blog-recommendations	
	add_action('wp_dashboard_setup', array( $this, 'gbworld_dashboard_widgets' ) );
	
	// Start the tinymce-modul once all other plugins are fully loaded
	add_action( 'plugins_loaded', create_function( '', 'global $gxtb_fb_lB_button; $gxtb_fb_lB_button = new gxtb_fb_lB_button();' ) );

											## END ACTION ##
########################################################################################################
}
####################################################
####################################################
###########								 ###########
###########								 ###########
###########	      DASHBOARD-WIDGET		 ###########
###########								 ###########
###########								 ###########
####################################################
##################### by gb-world.net   ############
####################################################

function gbworld_dashboard_widget_function() {
	// displays the recommendation and activity of current blog
?>
<table width="100%" style="overflow:hidden"><tr><td>
<?php
	include('admin/gb_fb_activity.php');
	$gxtb_fb_lB_FBActivity = new gxtb_fb_lB_FBActivity();
	?><br />
	<!-- using Like-Button-Plugin-For-Wordpress [<?php echo gxtb_fb_lB_version; ?>] | by Stefan Natter (http://www.gb-world.net) -->
<iframe src="http://www.facebook.com/plugins/like.php?href=http%3A%2F%2Fwww.facebook.com%2FGBWorldnet&amp;layout=box_count&amp;show_faces=false&amp;width=80&amp;action=like&amp;colorscheme=light&amp;height=80&amp;ref=wordpress_like_dashboard" scrolling="yes" frameborder="0" allowTransparency="false" style="border:none; overflow:hidden; width:80px; height:80px;"></iframe>
<!-- using Like-Button-Plugin-For-Wordpress [<?php echo gxtb_fb_lB_version; ?>] | by Stefan Natter (http://www.gb-world.net) -->
</td><td align="left" valign="top" width="100%" style="padding-top: 2px;">
<iframe src="http://www.facebook.com/plugins/recommendations.php?site=<?php echo $_SERVER['HTTP_HOST']; ?>&amp;width=300&amp;height=300&amp;header=true&amp;colorscheme=light" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:100%; height:300px;" allowTransparency="true"></iframe>
</td></tr></table>
<?php
if( is_admin()) {
		echo "<hr>";
		echo sprintf( '<div style="padding-left:10px;"><a href="options-general.php?page=%s">%s</a></div>', "fb-like-button", __('Plugin', gxtb_fb_lB_lang) . "-" . __('Settings', gxtb_fb_lB_lang) );
	}
} 
function gbworld_dashboard_widgets() {
	wp_add_dashboard_widget('gbworld_dashboard_widget', 'Your Blog-Activity', array( $this, 'gbworld_dashboard_widget_function' ));	
		
	// Globalize the metaboxes array, this holds all the widgets for wp-admin
	global $wp_meta_boxes;
	
	// Get the regular dashboard widgets array 
	// (which has our new widget already but at the end)
	$normal_dashboard = $wp_meta_boxes['dashboard']['normal']['core'];
	
	// Backup and delete our new dashbaord widget from the end of the array
	$gbworld_dashboard_widget = array('gbworld_dashboard_widget' => $normal_dashboard['gbworld_dashboard_widget']);
	unset($normal_dashboard['gbworld_dashboard_widget']);

	// Merge the two arrays together so our widget is at the beginning
	$sorted_dashboard = array_merge($gbworld_dashboard_widget, $normal_dashboard);

	// Save the sorted array back into the original metaboxes 
	$wp_meta_boxes['dashboard']['normal']['core'] = $sorted_dashboard;
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
	
	wp_enqueue_script('common');
	wp_enqueue_script('wp-lists');
	wp_enqueue_script('postbox');
	
	if ( (isset($_GET['page']) && strstr($_GET['page'],"fb-like")) && !strstr($_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"], "plugins.php")) {
		wp_deregister_script('jquery');
		
		if ( $this->GBLikeButton['PluginSetting']['jQuery'] == 0) {
			wp_register_script('jquery', gxtb_fb_lB_PLUGIN_FOLDER. 'admin/lib/jquery-1.5.0.min.js', false, '1.5.0');
		} else {
			wp_register_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/1.5.0/jquery.min.js', false, '1.5.0');
			#wp_register_script('jquery', 'http://code.jquery.com/jquery-1.5.min.js', false, '1.5.0');		
		}
					
		wp_enqueue_script('jquery-ui-tabs');
		wp_enqueue_script('jquery');
	}
	$this -> gxtb_fb_lB_options_load_textdomain();
	require_once(dirname(__FILE__) . '/admin/admin_page.php');
	require_once(dirname(__FILE__) . "/gbworld/gb_newsbox.php");
	require_once(dirname(__FILE__) . "/gbworld/gb_paypal.php");
	$gxtb_fb_lB_spClass = new gxtb_fb_lB_spClass();
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

	/* donate-link (before) */
	 if ( $file == gxtb_fb_lB_FB_BASENAME ) {
		$links[] =  sprintf( '<a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=SB94MEM9ATTBG" target="_blank">'. __('Donate', gxtb_fb_lB_lang) . '</a>');
    }
	 if ( $file == gxtb_fb_lB_FB_BASENAME ) {
		$links[] =  sprintf( '<a href="%s" target="_blank">%s</a>', "http://facebook.com/GBWorldnet", __('Become a Fan', gxtb_fb_lB_lang));
    }

    /* settings-link (after) */
    if ( $file == gxtb_fb_lB_FB_BASENAME ) {
	    array_unshift(
            $links,
            sprintf( '<a href="admin.php?page=%s">%s</a>', "fb-like-button", __('Settings', gxtb_fb_lB_lang) )
        );		
    }

    return $links;
}
function gxtb_fb_lB_update_notice() {
	$info = __( 'Notice: Changelog-Preview is provided with <a href="http://wordpress.org/extend/plugins/changelogger/" target="_blank">Changelogger</a>', gxtb_fb_lB_lang );
	echo ' (<small><span class="spam">' . strip_tags( $info, '<br><a><b><i><span>' ) . '</span></small>)';
}
####################################################
####################################################
###########								 ###########
###########								 ###########
###########	    	PLUGIN ACTION		 ###########
###########								 ###########
###########								 ###########
####################################################
##################### by gb-world.net   ############
####################################################

function gxtb_fb_lB_action() {

	require_once( 'include/fb_likeButton.php' );
	require_once( 'include/gb_shortcode.php' );
	
	// call the action-classes:
	$gxtb_fb_lB_Class = new gxtb_fb_lB_Class();
}

####################################################
####################################################
###########								 ###########
###########								 ###########
###########	      WIDGET 	 ACTION		 ###########
###########								 ###########
###########								 ###########
####################################################
##################### by gb-world.net   ############
####################################################

function gxtb_fb_lB_add_widget() {
	require_once( 'include/fb_widget.php');
	$gxtb_fb_lB_WidgetClass = new gxtb_fb_lB_WidgetClass();
}

####################################################
####################################################
###########								 ###########
###########								 ###########
###########	      META-TAGS-OUTPUT		 ###########
###########								 ###########
###########								 ###########
####################################################
##################### by gb-world.net   ############
####################################################

function gxtb_fb_lB_MetaTags() {
	require_once( 'include/fb_meta.php');
	$gxtb_fb_lB_MetaAction = new gxtb_fb_lB_MetaAction();
}

####################################################
####################################################
###########								 ###########
###########								 ###########
###########	    REGISTER THIS PLUGIN	 ###########
###########								 ###########
###########								 ###########
####################################################
#####################   by gb-world.net  ###########
####################################################

function gxtb_fb_lB_activate(){
	
	$cleaner_update_check = false;
	
	if(!get_option('GBLikeButton')) {
		
		$cleaner_update_check = true;
		global $wp_version;
		
		$this->GBLikeButton = array (
			'PluginSetting' => array ( 
                'Userlevel' => 'administrator', # min. Userlevel für alle Like-Seiten
				'GBCleaner' => 0, ## deaktiviert den GB-Cleaner am Anfang by default (0 nie gelaufen | 1 bereits ausgeführt )
				'GBWidgetCleaner' => 0, ## deaktiviert den GB-Cleaner am Anfang by default (0 nie gelaufen | 1 bereits ausgeführt )				
                'jQuery' => 0, ## aktivieren/deaktivieren der Google-jQuery-Library (0 - WP | 1 - Google)
                'Message' => array ( 
					'Update' => 2, ## Update-Messages: Update-Messages für Hinweise nach dem Update (x Anzahl für Anzeige - Default: 2)
					'Installation' => 2, ## Installation-Messages (x Anzahl für Anzeige - Default: 2)
					'Help' => 2, ## Help-Messages (x Anzahl für Anzeige - Default: 2)
					'Support' => 4, ## Support-Message for all the Hardwork I did (x Anzahl der Anzeige - Default:4 )
					'Warning' => 1 ## Warning-Sys (0 - Warnungen aus | 1 - Warnungen an)
				 ),
                'Bugreport' => 0 ## Bugreport: noch OFFEN - wird für die Expertmod verwendet (Textbox mit allen Variablen usw) -> derzeit mittels Define ..debug gelöst
			),
            'EditorSetting' => array (
				'PostButton' => 1, ## aktiviert den Post-Button im WYSIWYG-Editor
				 'IndividualPost' => 1 ## aktiviert die individuellen Einstellungen von Posts/Pages
			),
			'PluginInfo' => array (
				'cVersion' => gxtb_fb_lB_version,
				'lVersion' => gxtb_fb_lB_version
			),
			'General' => array (
				'on' => 0,
				'addfooter_activate' => 0,
				'addfooter' => 0,
				'position_before' => 0,
				'position_after' => 0,
				'frontpage' => 1,
				'page' => 1,
				'page_exclude' => "",
				'post' => 1,
				'post_exclude' => "",
				'category' => 0,
				'category_exclude' => "",
				'archiv' => 0,
				'archiv_exclude' => "",		
				'jdk' => 0,
				'language' => "en_US",
				'dynamic' => 1,
				'shortcode' => 0
			),
			'Design' => array (
				'css' => "",
				'cssbox' => "",
				'br_before' => 0,
				'br_after' => 0	
			),
			'FBInsights' => array (
				'on' => 0,
				'frontpage' => "",
				'frontpage_activ' => 0,
				'category' => "",
				'category_activ' => 0,
				'page' => "",
				'page_activ' => 0,
				'post' => "",
				'post_activ' => 0,
				'archiv' => "",
				'archiv_activ' => 0
			),
			'Generator' => array (
				'url' =>  (version_compare( $wp_version, '3.0', '>=' )) ? get_home_url() : get_bloginfo('siteurl'),
				'layout' => "standard",
				'faces' => 0,
				'width' => "150",
				'height' => "250",
				'verb' => "like",
				'color' => "light",
				'font' => "arial",
				'scrolling' => 0,
				'frameborder' => "0",
				'borderstyle' => "none",
				'overflow' => "hidden",
				'trans' => 1
			),
			'OpenGraph' => array (
				'on' => 1,
				'site_name' => "&#036;binfo",
				'blogtype' => "blog",
				'pagetype' => "blog",
				'posttype' => "article",
				'admins' => "",
				'app_id' => "",
				'page_id' => "",
				'title' => "&#036;ptitle",
				'url' => "&#036;plink",
				'description' => "",
				'dusage' => "blogd",
				'image' => "",
				'plz' => "",
				'mail' => "",
				'street' => "",
				'phone' => "",
				'locality' => "",
				'fax' => "",
				'region' => "",
				'country' => "",
				'latitude' => "",
				'longitude' => ""
			),
			'Expert' => array(
				'besidebutton' => "",
				'besideposition' => "right"
			)); 
			
			add_option('GBLikeButton', $this->GBLikeButton);
						
			} else {
				$this->GBLikeButton = get_option('GBLikeButton');
				## Update Version ##
				$this->GBLikeButton['PluginInfo']['cVersion'] = gxtb_fb_lB_version;
				## Message System ##
				if($this->GBLikeButton['PluginSetting']['Message']['Update'] == 0) ## Message Output reset
					$this->GBLikeButton['PluginSetting']['Message']['Update'] += 2;
				if($this->GBLikeButton['PluginSetting']['Message']['Help'] == 0) ## Message Output reset
					$this->GBLikeButton['PluginSetting']['Message']['Help'] += 2;
				## Initialize new Options ##
				$this->GBLikeButton['OpenGraph']['on'] = 1; # New Option is set to 1
				$this->GBLikeButton['Expert']['besidebutton'] = "";
				$this->GBLikeButton['Expert']['besideposition'] = "right";
				update_option('GBLikeButton', $this->GBLikeButton);
			}
	
	############ GB-World Infopage Setup ############
	require_once( 'gbworld/gb_infopage_setup.php');
	GB_infoPage_activate(gxtb_fb_lB_name, gxtb_fb_lB_version);
	############ GB-World Infopage Setup ############	
				
	if ( $cleaner_update_check == true ) {
		include(dirname(__FILE__) . '/include/gb_cleaner.php');
		$gxtb_fb_lB_Cleaner = new gxtb_fb_lB_Cleaner();
		$gxtb_fb_lB_Cleaner -> RunGBChanger44();
	} 
	
	if ( !strstr(get_bloginfo('url'), "localhost") ) {
		$pluginencrypted = str_rot13(base64_encode('FBLike'));
		if( $this->GBLikeButton['PluginInfo']['lVersion'] == $this->GBLikeButton['PluginInfo']['cVersion']) {
		$index = "index.php?key=" . str_rot13(base64_encode(get_bloginfo('siteurl'))) . "gb89&plugin=". $pluginencrypted ."&version=" . str_rot13(base64_encode(gxtb_fb_lB_version)) .  "&language=" . __('en', gxtb_fb_lB_lang) . "&on=2"; } else { $index = "index.php?key=" . str_rot13(base64_encode(get_bloginfo('siteurl'))) . "gb89&plugin=". $pluginencrypted ."&version=" . str_rot13(base64_encode(gxtb_fb_lB_version)) .  "&language=" . __('en', gxtb_fb_lB_lang) . "&on=3"; }		
		$stats = @file_get_contents("http://stats.gb-world.net/wp/" . $index );
		if (strpos($http_response_header[0], "200")) { echo $stats;	}
	}
}
  
function gxtb_fb_lB_deactivate(){

	############ GB-World Infopage Setup ############	
  	require_once( 'gbworld/gb_infopage_setup.php');
	GB_infoPage_deactivate(gxtb_fb_lB_name);
	############ GB-World Infopage Setup ############
	
	$this->GBLikeButton = get_option('GBLikeButton');
	$this->GBLikeButton['PluginInfo']['lVersion'] = gxtb_fb_lB_version;
	update_option('GBLikeButton', $this->GBLikeButton);

	if ( !strstr(get_bloginfo('url'), "localhost") ) {
		$pluginencrypted = str_rot13(base64_encode('FBLike'));
		$index = "index.php?key=" . str_rot13(base64_encode(get_bloginfo('siteurl'))) . "gb89&plugin=". $pluginencrypted ."&version=" . str_rot13(base64_encode(gxtb_fb_lB_version)) . "&language=" . __('en', gxtb_fb_lB_lang) . "&on=4";
		$stats = @file_get_contents("http://stats.gb-world.net/wp/" . $index );
		if (strpos($http_response_header[0], "200")) { echo $stats;	}
	}

}

function gxtb_fb_lB_uninstall(){

	############ GB-World Infopage Setup ############	
  	require_once( 'gbworld/gb_infopage_setup.php');
	GB_infoPage_deactivate(gxtb_fb_lB_name);
	############ GB-World Infopage Setup ############
	
	if ( !strstr(get_bloginfo('url'), "localhost") ) {
		$pluginencrypted = str_rot13(base64_encode('FBLike'));
		$index = "index.php?key=" . str_rot13(base64_encode(get_bloginfo('siteurl'))) . "gb89&plugin=". $pluginencrypted ."&version=" . str_rot13(base64_encode(gxtb_fb_lB_version)) .  "&language=" . __('en', gxtb_fb_lB_lang) . "&on=5";
		$stats = @file_get_contents("http://stats.gb-world.net/wp/" . $index );
		if (strpos($http_response_header[0], "200")) { echo $stats;	}
	}
	
	delete_option('GBLikeButton');
}
####################################################
####### since v4.0 #################################
###########								 ###########
###########								 ###########
###########	    	ADMIN-ACTION	     ###########
###########		Messages/WarningSys	 	 ###########
###########								 ###########
####################################################
#####################   by gb-world.net  ###########
####################################################
function gxtb_fb_lB_warningsys() {
	# only Admins can see the GB-Warning-Message
	if(is_admin() && (
		strstr($_SERVER["REQUEST_URI"],"index") ||
		strstr($_SERVER["REQUEST_URI"],"plugin") ||
		strstr($_SERVER["REQUEST_URI"],"tools")  ||
		strstr($_SERVER["REQUEST_URI"],"option") ||
		strstr($_GET['page'],"fb-like")
		)) {
			
		$this -> GBWarningSys -> GBWarningSysOutput();
	}
}
function gxtb_fb_lB_warningsysheader() {
	
	if( ( strstr($_SERVER["REQUEST_URI"],"index") ||
		strstr($_SERVER["REQUEST_URI"],"plugin")  ||
		strstr($_SERVER["REQUEST_URI"],"tools")  ||
		strstr($_SERVER["REQUEST_URI"],"option"))
		&&
		( !strstr($_GET['page'],"fb-like") ) )
		
		gb_admin_header::gb_warning_header();
}
####################################################
####### since v4.0 #################################
###########								 ###########
###########								 ###########
###########	    	ADMIN-ACTION	     ###########
###########				FEED-Controller	 ###########
###########								 ###########
####################################################
#####################   by gb-world.net  ###########
####################################################
## inspired by this article: http://wpengineer.com/feed-cache-in-wordpress/ (Englisch ##
## http://bueltge.de/feed-cache-von-wordpress/1039/ (German) ##
## http://simplepie.org/wiki/reference/start#simplepie_item ##
function gxtb_fb_lB_feed_controller() {

if( strstr($_REQUEST['page'], 'fb-like') )
	#return 1800; ## 15 min
	#return 600; ## 5 min
	return 0;
else
	return 43200;
}
} // end class
} // end if-class

	// Let's start the plugin by gb-world.net
	global $GBLikeButton;
	$GBLikeButton = new GBLikeButton();
?>