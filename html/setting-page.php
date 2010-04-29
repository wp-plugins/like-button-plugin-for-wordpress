<?php // Do not delete these lines
	if (!empty($_SERVER['SCRIPT_FILENAME']) && basename(__file__) == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');
?>
<?php
/*
+----------------------------------------------------------------+
+	Like-Button-Plugin-For-Wordpress [v1.3]
+	by Stefan Natter (http://www.gangxtaboii.com)
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
##################### by ganxtaboii.com ############
####################################################

class gxtb_fb_lB_spClass {

########################################################################################################
											## CONSTRUCTOR  ##
	function gxtb_fb_lB_spClass() {
	
		//add filter for WordPress 2.8 changed backend box system !
		add_filter('screen_layout_columns', array(&$this, 'on_screen_layout_columns'), 10, 2);
		
		//register callback for admin menu  setup
		add_action('admin_menu', array(&$this, 'on_admin_menu'));

		// including the gb_metaboxes [v0.5-Beta]
		include_once('gb_settings.php');
		include_once('gb_metaboxes.php');
		include_once('gb_meta.php');
		include_once('gb_generator.php');
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
		$this->pagehook =  add_options_page('Like-Button-Plugin-For-Wordpress', "FB-Like Button", 10, 'fb-like-button', array(&$this, 'on_show_page'));
		
		//register callback gets call prior your own page gets rendered
		add_action('load-'.$this->pagehook, array(&$this, 'on_load_page'));
	}

########################################################################################################
			## will be executed if wordpress core detects this page has to be rendered ##

	function on_load_page() {

		//add several metaboxes now, all metaboxes registered during load page can be switched off/on at "Screen Options" automatically, nothing special to do therefore
		//add_meta_box('gxtb_fb_lb_metabox-sidebox-1', __('Settings', 'gb_like_button') , array(&$this, 'gxtb_sidebox_1'), $this->pagehook, 'side', 'core');
		//add_meta_box('gxtb_fb_lb_metabox-sidebox-2', 'Sidebox 2 Title', array(&$this, 'gxtb_sidebox_2'), $this->pagehook, 'side', 'core');
		
		// MAIN-BOXES
		add_meta_box('gxtb_fb_lb_metabox-contentbox-1', __('Plugin-Settings', 'gb_like_button'), array(&$this, 'gxtb_contentbox_1'), $this->pagehook, 'first', 'core');
					
		if(IS_GB_FB_2_0){
			add_meta_box('gxtb_fb_lb_metabox-contentbox-2', __('Your Like-Button-Code', 'gb_like_button'), array(&$this, 'gxtb_contentbox_2'), $this->pagehook, 'normal', 'core');
		}
		
		add_meta_box('gxtb_fb_lb_metabox-contentbox-3', __('Like-Button-Generator', 'gb_like_button'), array(&$this, 'gxtb_contentbox_3'), $this->pagehook, 'normal', 'core');
		add_meta_box('gxtb_fb_lb_metabox-contentbox-4', __('Open Graph Protocol - Meta-Tags', 'gb_like_button') , array(&$this, 'gxtb_contentbox_4'), $this->pagehook, 'normal', 'core');
	}

########################################################################################################
					## executed to show the plugins complete admin page  ##

	function on_show_page() {
		
		//we need the global screen column value to beable to have a sidebar in WordPress 2.8
		global $screen_layout_columns, $gxtb_fb_like_button_active;
				 		
		//boxes added at start of page rendering can't be switched on/off, 
		//may be needed to ensure that a special box is always available
		add_meta_box('gxtb_fb_lb_metabox-contentbox-5', __('Plugin-FAQ', 'gb_like_button') . ' [v ' . gxtb_fb_lB_version .  ']' , array(&$this, 'gxtb_contentbox_5'), $this->pagehook, 'normal', 'core');

		#### GB-NEWS-BOX [v2.0] ##
		add_meta_box('gxtb_fb_lb_additional-metabox-contentbox-1',  __('Support', 'gb_like_button'), array(&$this, 'gxtb_additional_contentbox_1'), $this->pagehook, 'additional', 'core');
		add_meta_box('gxtb_fb_lb_additional-metabox-contentbox-2', 'GB-News', array(&$this, 'gxtb_additional_contentbox_2'), $this->pagehook, 'additional', 'core');

####################################################
####################################################
###########								 ###########
###########								 ###########
###########	     CONTENT-OPTION-PAGE	 ###########
###########								 ###########
###########								 ###########
####################################################
##################### by ganxtaboii.com ############
####################################################
	$key = "TEST";
?>

<div class="wrap">
		<h2><?php echo gxtb_fb_lB_name; ?> - Version <?php echo gxtb_fb_lB_version; ?></h2>

	<?php require_once( 'gb_save.php' ); ?>

<form method="post" action="<?php echo admin_url( 'options-general.php?page=fb-like-button' ); ?>" name="settingpage">

	<?php wp_nonce_field('closedpostboxes', 'closedpostboxesnonce', false ); ?>
	<?php wp_nonce_field('meta-box-order', 'meta-box-order-nonce', false ); ?>

<div id="poststuff" class="metabox-holder<?php echo 2 == $screen_layout_columns ? ' has-right-sidebar' : ''; ?>">
            
<!-- <form method="post"> -->
		<div id="poststuff" class="metabox-holder" style="width: 100%;">

				<!-- Sidebar -->
				<div id="side-info-column" class="inner-sidebar">
				
					<?php do_meta_boxes($this->pagehook, 'side', ""); ?>
					
				</div>
				<!-- /Sidebar -->
				
				<!-- Content -->
					<div id="post-body" class="has-sidebar">
						<div id="post-body-content" class="has-sidebar-content">
							
							<?php do_meta_boxes($this->pagehook, 'first', ""); ?>
							<?php do_meta_boxes($this->pagehook, 'normal', ""); ?>
							
							<!-- <h4>Static text and input section</h4>
							<p>Here is some static paragraph or your own static content. Can be placed where ever you want.</p>
								<textarea name="static-textarea" style="width:100%;">Change this text ....</textarea>
							<br/> -->
							
							<!-- Additional -->
							<?php do_meta_boxes($this->pagehook, 'additional', ""); ?>
						</div>
					</div>
				<!-- /Content -->
					
				<br class="clear"/>	
		</div>
	</div>

<?php 
	include_once('gb_submit.php');
?>

		</div>
	</div>
	
	<script type="text/javascript">
		//<![CDATA[
		jQuery(document).ready( function($) {
			// close postboxes that should be closed
			$('.if-js-closed').removeClass('if-js-closed').addClass('closed');
			// postboxes setup (works)
			//postboxes.add_postbox_toggles('<?php //echo $this->pagehook; ?>');

		// postboxes-experimental
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
##################### by ganxtaboii.com ############
####################################################

	function gxtb_sidebox_1() {
		gxtb_fb_lB_mBSBClass::gxtb_sidebox_1();
	}
	function on_sidebox_2_content() {
		gxtb_fb_lB_mBSBClass::gxtb_sidebox_2();
	}
	## SETTINGS-BOX
	function gxtb_contentbox_1() {
		gxtb_fb_lB_mBSClass::gxtb_contentbox_1();
	}
	## YOUR-CODE-BOX
	function gxtb_contentbox_2() {
		gxtb_fb_lB_mBClass::gxtb_contentbox_2();
	}
	## LIKE-BUTTON-GENERATOR
	function gxtb_contentbox_3() {
		gxtb_fb_lB_mBGClass::gxtb_contentbox_3();
	}
	## META-TAGS
	function gxtb_contentbox_4() {
		gxtb_fb_lB_mBMClass::gxtb_contentbox_4();
	}
	## FAQ-BOX
	function gxtb_contentbox_5() {
		gxtb_fb_lB_mBClass::gxtb_contentbox_5();
	}
	## GB-NEWS-BOX
	function gxtb_additional_contentbox_1() {
		$this -> gxtb_box("0");
	}
	function gxtb_additional_contentbox_2() {
		$this -> gxtb_box("1");
	}
	## GB-NEWS-BOX
	
####################################################
####################################################
###########								 ###########
###########								 ###########
###########	     GB-NEWSBOX [v2.0]		 ###########
###########			FIXED-BOXES			 ###########
###########								 ###########
####################################################
##################### by ganxtaboii.com ############
####################################################

	function gxtb_box($boxID) {
		// global GB-Variable
		global $gxtb_fb_like_button_active;
		
		// initialize the newsbox
		require_once('gb_newsbox.php');
		
		// Newsbox-Array
		$gxtb_NewsClass_iArray = array(
			"active" => $gxtb_fb_like_button_active,
			"language" => "gb_like_button",
			"name" => gxtb_fb_lB_name,
			"version" => gxtb_fb_lB_version,
			"def" => "Plugin"
		);
		
		//call the News-Class
		switch($boxID) {
			case "0";
				$gxtb_NewsPClass = new gxtb_NewsPClass($gxtb_NewsClass_iArray);
				break;
			case "1";
				$gxtb_NewsClass = new gxtb_NewsClass($gxtb_NewsClass_iArray);
				break;
		}
	}
####################################################
############ by ganxtaboii.com #####################
####################################################
###########								 ###########
###########			FIXED-BOXES			 ###########
###########	     GB-NEWSBOX [v2.0]		 ###########
###########								 ###########
###########								 ###########
####################################################
####################################################

}
?>