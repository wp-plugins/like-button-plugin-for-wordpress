<?php // Do not delete these lines
	if (!empty($_SERVER['SCRIPT_FILENAME']) && basename(__file__) == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');
?>
<?php
/*
+----------------------------------------------------------------+
+	Like-Button-Plugin-For-Wordpress [v4.2.1]
+	by Stefan Natter (http://www.gangxtaboii.com and http://www.gb-world.net)
+   required for Like-Button-Plugin-For-Wordpress and WordPress 2.7.x or higher
+----------------------------------------------------------------+
*/
########################################################################################################
											## FAQ  ##
##	http://www.code-styling.de/downloads/howto-metabox-plugin.zip
##  register_activation_hook( dirname(__FILE__) . '/nggallery.php', array(&$this, 'activate') );
##	http://andrewferguson.net/2008/09/26/using-add_meta_box/
##	http://wordpress.org/support/topic/356788 (EDITOR)
##  http://wefunction.com/2009/10/revisited-creating-custom-write-panels-in-wordpress/ (GOOD)
											## FAQ  ##
########################################################################################################

####################################################
####################################################
###########								 ###########
###########								 ###########
###########	       OPTION-CLASS			 ###########
###########								 ###########
###########								 ###########
####################################################
###################### by gb-world.net #############
####################################################

if(!class_exists('gxtb_fb_lB_spClass')) {
class gxtb_fb_lB_spClass {

########################################################################################################
											## CONSTRUCTOR  ##
	function gxtb_fb_lB_spClass() {
	
		//add filter for WordPress 2.8 changed backend box system !
		add_filter('screen_layout_columns', array(&$this, 'on_screen_layout_columns'), 10, 2);
		
		//register callback for admin menu setup
		add_action('admin_menu', array(&$this, 'on_admin_menu'));

		//add the js-file to the backend-admin-menu
		//add_action('admin_head', array($this, 'gxtb_settings_header'));
		//$mypluginoptionpageslug = 'fb-like-button';
		$mypluginoptionpageslug = gxtb_fb_lB_page;
		if ($_GET['page'] == $mypluginoptionpageslug) { $ismypluginoptionpage = 'true'; } else { $ismypluginoptionpage = 'false'; }
		 
		if ( $ismypluginoptionpage == 'true' )
			 add_action('admin_head', array(&$this, 'gxtb_settings_header'));
			 
		// including the gb_metaboxes
		include_once('jquery/gb_settings_jquery.php'); ## jQuery-Design
		include_once('gb_settings.php'); ## normal-Design
		include_once('gb_faq.php');
		include_once('jquery/gb_meta_jquery.php'); ## jQuery-Design
		include_once('gb_meta.php'); ## normal-Design
		include_once('jquery/gb_generator_jquery.php'); ## jQuery-Design
		include_once('gb_generator.php'); ## normal-Design
		include_once('gb_insights.php');
		include_once('gb_bugs.php');
		include_once('gb_ad.php');
		include_once('gb_plugin.php');
		include_once('gb_fb.php');
		include_once('gb_fb_activity.php');
}

########################################################################################################
											## ADDING THE JS-File  ##

function gxtb_settings_header() {

$gxtb_fb_lB = get_option('gxtb_fb_lB');
//ob_start();

echo '

<!-- using ' . gxtb_fb_lB_name . ' [v' . gxtb_fb_lB_version . '] | by http://www.gb-world.net -->
';
/* if($gxtb_fb_lB["jQuery"]) { */
echo '<link rel="stylesheet" type="text/css" href="' . gxtb_fb_lB_PLUGIN_FOLDER. 'css/jquery-ui-1.8.4.custom.css" />
';
echo '<script type="text/javascript" src="' . gxtb_fb_lB_PLUGIN_FOLDER . 'js/gb_js.js"></script>
';
if($gxtb_fb_lB["jQuery"]) {
echo '<script type="text/javascript" src="' . gxtb_fb_lB_PLUGIN_FOLDER . 'js/gb_jquery.js"></script>
';
}
echo '<link rel="stylesheet" type="text/css" href="' . gxtb_fb_lB_PLUGIN_FOLDER. 'css/jquery.fancybox-1.3.1.css" />
'; /*}*/
echo '<script type="text/javascript" src="' . gxtb_fb_lB_PLUGIN_FOLDER . 'js/gb_generator.js"></script>
';
/* if($gxtb_fb_lB["jQuery"]) {
echo '<script type="text/javascript" src="' . gxtb_fb_lB_PLUGIN_FOLDER . 'lib/jquery.validate.js"></script>
';
echo '<script type="text/javascript" src="' . gxtb_fb_lB_PLUGIN_FOLDER . 'lib/jquery.metadata.js"></script>
'; } --> currently out of work will probably work on v4.5 */
echo '<link rel="stylesheet" type="text/css" href="' . gxtb_fb_lB_PLUGIN_FOLDER. 'css/tooltips.css" />
';
echo '<link rel="stylesheet" type="text/css" href="' . gxtb_fb_lB_PLUGIN_FOLDER. 'css/admin.css" />
';
/* if($gxtb_fb_lB["jQuery"]) { */
echo '<link rel="stylesheet" type="text/css" href="' . gxtb_fb_lB_PLUGIN_FOLDER. 'css/jquery.css" />
'; /* } */
echo '<script type="text/javascript" src="'. gxtb_fb_lB_PLUGIN_FOLDER .'js/gb_js.php?page=fb-like-button"></script>
';
/* if($gxtb_fb_lB["jQuery"]) { */
echo '<script type="text/javascript" src="' . gxtb_fb_lB_PLUGIN_FOLDER . 'lib/jquery.fancybox-1.2.5.js"></script>
';
echo '<script type="text/javascript" src="' . gxtb_fb_lB_PLUGIN_FOLDER . 'lib/jquery.mousewheel-3.0.2.pack.js"></script>
'; 
echo '<script type="text/javascript" src="' . gxtb_fb_lB_PLUGIN_FOLDER . 'lib/jquery.preview.script.js"></script>
';
echo '<script type="text/javascript" src="' . gxtb_fb_lB_PLUGIN_FOLDER . 'lib/jquery.thumbs.js"></script>
'; /* } */
if($gxtb_fb_lB["FavIcon"]) {
echo '<link rel="shortcut icon" href="'. gxtb_fb_lB_PLUGIN_FOLDER .'gbworld/images/gbworld.ico">
'; }
echo '<!-- using ' . gxtb_fb_lB_name . ' [v' . gxtb_fb_lB_version . '] | by http://www.gb-world.net -->
';
wp_print_scripts( array( 'sack' ));
if( version_compare($GLOBALS['wp_version'], '2.7.999', '>') ) {
?>
<script type="text/javascript">
var clos_ajaxurl = ajaxurl;
</script>
<?php
} else {
?>
<script type="text/javascript">
var clos_ajaxurl = "<?php echo $this->_esc_js( get_bloginfo( 'wpurl' ) . '/wp-admin/admin-ajax.php' ); ?>";
</script>
<?php
}

}
########################################################################################################
											## ADDING THE COLUMNS  ##

	function on_screen_layout_columns($columns, $screen) {
		//for WordPress 2.8 we have to tell, that we support 2 columns !
		if ($screen == $this->pagehook) {
			$columns[$this->pagehook] = 2;
		}
		return $columns;
	}

########################################################################################################
											## ADMIN-FUNCTION  ##
	function on_admin_menu() {
	
		## ADD OPTION-PAGE ##
		global $wp_version;
		
		if ( version_compare( $wp_version, '2.8', '>=' ) ) {
			$this->pagehook =  add_options_page('Like-Button-Plugin-For-Wordpress', "FB-Like Button", 'administrator', 'fb-like-button', array(&$this, 'on_show_page'));

		} elseif ( version_compare( $wp_version, '2.8', '<' ) ) {
			$this->pagehook =  add_options_page('Like-Button-Plugin-For-Wordpress', "FB-Like Button", 10, 'fb-like-button', array(&$this, 'on_show_page'));
		}
				
		//register callback gets call prior your own page gets rendered
		add_action('load-'.$this->pagehook, array(&$this, 'on_load_page'));
	}

########################################################################################################
			## will be executed if wordpress core detects this page has to be rendered ##

	function on_load_page() {
		
		// MAIN-BOXES
		add_meta_box('gxtb_fb_lb_metabox-contentbox-1', __('FB-Button-Settings', gxtb_fb_lB_lang), array(&$this, 'gxtb_contentbox_1'), $this->pagehook, 'first', 'core');
					
		add_meta_box('gxtb_fb_lb_metabox-contentbox-3', __('Like-Button-Generator', gxtb_fb_lB_lang), array(&$this, 'gxtb_contentbox_3'), $this->pagehook, 'normal', 'core');
		add_meta_box('gxtb_fb_lb_metabox-contentbox-4', __('Open Graph Protocol - Meta-Tags', gxtb_fb_lB_lang) , array(&$this, 'gxtb_contentbox_4'), $this->pagehook, 'meta', 'core');
		
		add_meta_box('gxtb_fb_lb_metabox-contentbox-5', __('Plugin-FAQ', gxtb_fb_lB_lang) . ' [v' . gxtb_fb_lB_version .  ']' , array(&$this, 'gxtb_contentbox_5'), $this->pagehook, 'last', 'core');
				
		add_meta_box('gxtb_fb_lb_metabox-contentbox-6', __('FB-Insights Tools', gxtb_fb_lB_lang) , array(&$this, 'gxtb_contentbox_6'), $this->pagehook, 'normal', 'core');
	}

########################################################################################################

	function on_show_page() {
		
		global $screen_layout_columns, $gxtb_fb_like_button_active;

		add_meta_box('gxtb_fb_lb_additional-fb-box',  __('Become a Fan', gxtb_fb_lB_lang), array(&$this, 'gxtb_additional_contentbox_0'), $this->pagehook, 'additional_fb', 'core');
		add_meta_box('gxtb_fb_lb_additional-paypal-box',  __('Please Support us', gxtb_fb_lB_lang), array(&$this, 'gxtb_additional_contentbox_1'), $this->pagehook, 'additional_support', 'core');
		add_meta_box('gxtb_fb_lb_additional-fb_activity',  __('Analyse your Blog', gxtb_fb_lB_lang), array(&$this, 'gxtb_additional_activity'), $this->pagehook, 'additional_fb_activity', 'core');
		add_meta_box('gxtb_fb_lb_additional-metabox-contentbox-2',  __('GB-News', gxtb_fb_lB_lang), array(&$this, 'gxtb_additional_contentbox_2'), $this->pagehook, 'additional_news', 'core');
		add_meta_box('gxtb_fb_lb_additional-metabox-contentbox-3',  __('BugTracker', gxtb_fb_lB_lang), array(&$this, 'gxtb_additional_contentbox_3'), $this->pagehook, 'additional_bugs', 'core');
		add_meta_box('gxtb_fb_lb_additional-voting',  __('GB-Voting', gxtb_fb_lB_lang), array(&$this, 'gxtb_additional_voting'), $this->pagehook, 'additional_voting', 'core');
		add_meta_box('gxtb_fb_lb_additional-metabox-contentbox-4',  __('Plugin-Supporter and Fans', gxtb_fb_lB_lang), array(&$this, 'gxtb_additional_contentbox_4'), $this->pagehook, 'additional_fans', 'core');
		add_meta_box('gxtb_fb_lb_additional-plugin-settings-box',  __('Plugin-Settings', gxtb_fb_lB_lang), array(&$this, 'gxtb_additional_contentbox_5'), $this->pagehook, 'additional_settings', 'core');	

####################################################
####################################################
###########								 ###########
###########								 ###########
###########	     CONTENT-OPTION-PAGE	 ###########
###########								 ###########
###########								 ###########
####################################################
###################### by gb-world.net #############
####################################################
/* <script type='text/javascript'>
		document.body.style.visibility= 'hidden';
        window.onload= function() { document.body.style.visibility= 'visible'; };
</script> */ ?>
<div class="wrap"><div id="gxtb_lb_fB_options">
<h2><?php echo gxtb_fb_lB_name; /* ?> - Version <?php echo gxtb_fb_lB_version; */ ?> <img src="<?php echo gxtb_fb_lB_PLUGIN_FOLDER; ?>images/fb_like_4.png" onmouseover="tooltip.show('<?php _e('Facebook-Button: all rights reserved by Facebook.com - this is only a modified variant of the button for this plugin.', 'gb_like_button'); ?>');" onmouseout="tooltip.hide();"/></h2>
<?php require_once( 'gb_save.php' ); ?>
<form method="post" action="<?php echo admin_url( 'options-general.php?page=fb-like-button' ); ?>" name="settingpage" id="settingpage" class="settingpage">

	<?php wp_nonce_field('closedpostboxes', 'closedpostboxesnonce', false ); ?>
	<?php wp_nonce_field('meta-box-order', 'meta-box-order-nonce', false ); ?>

<div id="poststuff" class="metabox-holder<?php echo 2 == $screen_layout_columns ? ' has-right-sidebar' : ''; ?>">

		<div id="poststuff" class="metabox-holder" style="width: 100%;">

				<!-- Sidebar -->
				<div id="side-info-column" class="inner-sidebar">
					<?php
					    do_meta_boxes($this->pagehook, 'additional_fb', "");
						do_meta_boxes($this->pagehook, 'additional_support', "");
						do_meta_boxes($this->pagehook, 'additional_fb_activity', "");
						do_meta_boxes($this->pagehook, 'additional_bugs', "");
						
						if( date("d.m.y", time()) <= "30.09.2010" )
						do_meta_boxes($this->pagehook, 'additional_voting', "");
						
						do_meta_boxes($this->pagehook, 'additional_fans', "");
						do_meta_boxes($this->pagehook, 'additional_settings', "");
					?>
					<?php //do_meta_boxes($this->pagehook, 'side', ""); ?>
				</div>
				<!-- /Sidebar -->
				
				<!-- Content -->
					<div id="post-body" class="has-sidebar">
						<div id="post-body-content" class="has-sidebar-content">

							<?php do_meta_boxes($this->pagehook, 'first', ""); ?>
							<?php do_meta_boxes($this->pagehook, 'normal', ""); ?>
							<?php //ob_start(); ?>
							<?php do_meta_boxes($this->pagehook, 'meta', ""); ?>
							<?php //ob_end_flush(); ?>
							<?php do_meta_boxes($this->pagehook, 'last', ""); ?>
							<?php do_meta_boxes($this->pagehook, 'additional_news', ""); ?>							
						</div>
					</div>
				<!-- /Content -->
				<br class="clear"/>
		</div>
<div class="plugin-version">
	<a href="#plugin-info" class="fancylink" title="Created by Stefan N."><?php echo gxtb_fb_lB_name; ?> - v<?php echo gxtb_fb_lB_version; ?></a>
</div>
</div>
		</div>
	</div>
<?php 
	include_once('gb_submit.php');
/* <!--<br />
	<h3 id="warning">Your form contains tons of errors! Please try again.</h3>--> */
?>
</div>
<div id="plugin-info" style="display:none">
	<h2><?php _e('Plugin-Information', gxtb_fb_lB_lang) ?></h2>
		<p><?php echo sprintf( '%s <b>%s.</b> (<a href="#">%s</a>)', __('This Plugin was created by', gxtb_fb_lB_lang),  __(' Stefan N', gxtb_fb_lB_lang), __('GB-World.net', gxtb_fb_lB_lang)); ?></p>
		<p><?php _e('I use a lot of different (jQuery-)Plugins to make this page as easy as it could be for you. For example i use jQuery to make the Option-Page even smaller and better.', gxtb_fb_lB_lang);
		echo " ";
		echo sprintf( '%s <a href="#">%s</a>. %s <a href="#">%s</a> %s.', __('I hope you like my plugin and you', gxtb_fb_lB_lang), __('report any bugs', gxtb_fb_lB_lang), __('I have invested a lot of time to get this plugin as good as it is now. I would appreciate it if you would ', gxtb_fb_lB_lang), __('support', gxtb_fb_lB_lang), __('my work', gxtb_fb_lB_lang)); ?>
		<br /><br />
		<?php _e('yours', gxtb_fb_lB_lang) ?><br /><em>Stefan N.</em></p>
		<br />
		<p><em><?php _e('Notice', gxtb_fb_lB_lang) ?>: <?php _e('Some of my impressions and ideas I got from other sites, plugins and tutorials. They are all listed beside the code snippets I got from their work or tutorials.', gxtb_fb_lB_lang) ?></em></p>
</div>
<script type="text/javascript">
		//<![CDATA[
		jQuery(document).ready( function($) {
			// close postboxes that should be closed
			$('.if-js-closed').removeClass('if-js-closed').addClass('closed');
			<?php /* // postboxes setup (works)
			//postboxes.add_postbox_toggles('<?php //echo $this->pagehook; ?>');

		// postboxes-experimental */ ?>
		<?php
		global $wp_version;
		if(version_compare($wp_version,"2.7-alpha", "<")){
			echo "add_postbox_toggles('" . $this->pagehook . "');"; //For WP2.6 and below
		}
		else{
			echo "postboxes.add_postbox_toggles('" . $this->pagehook . "');"; //For WP2.7 and above
		}
		?>
			});
			//]]>
</script>
<script src="http://www.google-analytics.com/urchin.js" type="text/javascript">
</script>
<script type="text/javascript">
_uacct = "UA-11334432-3";
urchinTracker();
</script>
<?php
}
####################################################
####################################################
###########								 ###########
###########								 ###########
###########	      CALLBACK METHODS		 ###########
###########								 ###########
###########								 ###########
####################################################
###################### by gb-world.net #############
####################################################

	## SIDE-BOX
	function gxtb_sidebox_1() {
		gxtb_fb_lB_mBSBClass::gxtb_sidebox_1();
	}
	function on_sidebox_2_content() {
		gxtb_fb_lB_mBSBClass::gxtb_sidebox_2();
	}
	## SETTINGS-BOX
	function gxtb_contentbox_1() {
	$gxtb_fb_lB = get_option('gxtb_fb_lB');
	if( $gxtb_fb_lB['jQuery'] ) { gxtb_fb_lB_mBSClassJQuery::gxtb_contentbox_1_jquery(); } else { gxtb_fb_lB_mBSClass::gxtb_contentbox_1(); }
	}
	## YOUR-CODE-BOX
	function gxtb_contentbox_2() {
		gxtb_fb_lB_mBClass::gxtb_contentbox_2();
	}
	## LIKE-BUTTON-GENERATOR
	function gxtb_contentbox_3() {
		$gxtb_fb_lB = get_option('gxtb_fb_lB');
		
		if( $gxtb_fb_lB['jQuery'] ) { 
		
			$gxtb_fb_lB_mBGClassJQuery = new gxtb_fb_lB_mBGClassJQuery();
			$gxtb_fb_lB_mBGClassJQuery -> gxtb_contentbox_3_jquery(); 
		
		} else { gxtb_fb_lB_mBGClass::gxtb_contentbox_3_html(); }
	}
	## META-TAGS
	function gxtb_contentbox_4() {
		$gxtb_fb_lB = get_option('gxtb_fb_lB');
		if( $gxtb_fb_lB['jQuery'] ) { gxtb_fb_lB_mBMClassJQuery::gxtb_contentbox_4_jquery(); } else { gxtb_fb_lB_mBMClass::gxtb_contentbox_4(); }
	}
	## FB-ANALYTICS-BOX
	function gxtb_contentbox_6() {
		gxtb_fb_lB_mAClass::gxtb_fb_analytics_box();
	}
	## FAQ-BOX
	function gxtb_contentbox_5() {
		gxtb_fb_lB_mBClass::gxtb_contentbox_5();
	}
	## FB-Box
	function gxtb_additional_contentbox_0() {
		$gxtb_fb_lB_FB = new gxtb_fb_lB_FB();
	}
	## GB-PayPal-Box
	function gxtb_additional_contentbox_1() {
		
		// global GB-Variable
		global $gxtb_fb_like_button_active;
		global $gb_fb_lB_path;
				
		// initialize the newsbox now in the main-plugin-file (since v3.0)
		//require_once("gb_newsbox.php");
		
		// Newsbox-Array
		$gxtb_NewsClass_iArray = array(
			"active" => $gxtb_fb_like_button_active,
			"language" => "gb_like_button",
			"name" => gxtb_fb_lB_name,
			"version" => gxtb_fb_lB_version,
			"def" => "Plugin"
		);
		
		$gxtb_NewsPClass = new gxtb_NewsPClass($gxtb_NewsClass_iArray); ## PayPal-Box
		
	}
	## GB-NEWS-BOX
	function gxtb_additional_contentbox_2() {
	
		// global GB-Variable
		global $gxtb_fb_like_button_active;
		global $gb_fb_lB_path;
				
		// initialize the newsbox now in the main-plugin-file (since v3.0)
		//require_once("gb_newsbox.php");
		
		// Newsbox-Array
		$gxtb_NewsClass_iArray = array(
			"active" => $gxtb_fb_like_button_active,
			"language" => "gb_like_button",
			"name" => gxtb_fb_lB_name,
			"version" => gxtb_fb_lB_version,
			"def" => "Plugin"
		);
		
		$gxtb_NewsClass = new gxtb_NewsClass($gxtb_NewsClass_iArray); ## News-Box		
	}
	## BUG-TRACKER
	function gxtb_additional_contentbox_3() {
		gxtb_fb_lB_BuGClass::gxtb_fb_lB_BugBox();
	}
	## FANs
	function gxtb_additional_contentbox_4() {
		gxtb_fb_lB_Ad::gxtb_fb_lB_AddAD();
	}
	## Plugin-Settings
	function gxtb_additional_contentbox_5() {
		gxtb_fb_lB_Settings::gxtb_fb_lB_GetSettingsList();
	}
	## GB-Voting
	function gxtb_additional_voting() { ?>
	<div style="padding-left:2px;">
	<iframe src="http://142449.vote.onetwomax.de/?output=htmldoc"><?php _e('Currently there are no votings available.', gxtb_fb_lB_lang)?></iframe>
	</div>
	<em>
	<?php 
		_e('Voting until 30th of September 2010', gxtb_fb_lB_lang);
	?></em>
	<?php }
	
	## FB-Activity
	function gxtb_additional_activity() {
		$gxtb_fb_lB_FBActivity = new gxtb_fb_lB_FBActivity();
	}

####################################################
############ by gb-world.net #######################
####################################################
###########								 ###########
###########			FIXED-BOXES			 ###########
###########	     GB-NEWSBOX [v2.5]		 ###########
###########								 ###########
###########								 ###########
####################################################
####################################################

} // end class
} // end if-class
?>