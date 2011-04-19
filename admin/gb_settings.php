<?php // Do not delete these lines
	if (!empty($_SERVER['SCRIPT_FILENAME']) && basename(__file__) == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');
?>
<?php
/*
+----------------------------------------------------------------+
+	Like-Button-Plugin-For-Wordpress [v4.3.3] - GB-Settings-Page [v0.3.2 - FINAL]
+	by Stefan Natter (http://www.gb-world.net)
+   required for Like-Button-Plugin-For-Wordpress and WordPress 2.7.x or higher
+----------------------------------------------------------------+
*/
####################################################
####################################################
###########								 ###########
###########								 ###########
###########	       Plugin-Settings		 ###########
###########								 ###########
###########								 ###########
####################################################
##################### by gb-world.net ##############
####################################################
if (!class_exists('gxtb_gb_settings')) {
class gxtb_gb_settings {
	
	var $pagehook;
	var $gxtb_fb_lB_Settings;
	var $gxtb_fb_lB_Cleaner;
	var $GBLikeButtonWidgetCleaner;
	
function gxtb_gb_settings() {
	
		include('gb_plugin.php');	
		$this->gxtb_fb_lB_Settings = new gxtb_fb_lB_Settings;
		include( dirname(dirname(__FILE__)) . '/include/gb_cleaner.php' );
		$this->gxtb_fb_lB_Cleaner = new gxtb_fb_lB_Cleaner();
		$this->GBLikeButtonWidgetCleaner = new GBLikeButtonWidgetCleaner();

		global $screen_layout_columns;
		$screen_layout_columns = 2;

		add_meta_box('gb_fb_tools',  __('Like-Button-Plugin-For-Wordpress Tools', gxtb_fb_lB_lang), array(&$this, 'gb_tools'), $this->pagehook, 'first', 'core');
		if (version_compare( gxtb_fb_lB_version, '4.4.4', '>=' )) {
			add_meta_box('gb_fb_plugin',  __('Plugin-Settings - available soon', gxtb_fb_lB_lang), array(&$this, 'gb_plugin'), $this->pagehook, 'first', 'core');
			add_meta_box('gb_fb_editor',  __('Editor-Settings - available soon', gxtb_fb_lB_lang), array(&$this, 'gb_editor'), $this->pagehook, 'first', 'core');
			#add_meta_box('gb_fb_help',  __('Support', gxtb_fb_lB_lang), array(&$this, 'gb_support'), $this->pagehook, 'first', 'core');
		}
				
		
		if ( isset( $_POST['gxtb_run_cleaner'] ) ) {
			// cleanes all the senseless variables for this new update
			$this->gxtb_fb_lB_Cleaner -> RunGBCleaner();
		}
		
		if (isset( $_POST['gxtb_reset'] ) ) {
			$this->gxtb_fb_lB_Cleaner -> RunGBChanger44();	
		}
		
		if (isset( $_POST['gxtb_widgetcleaner'] ) ) {
			$this->GBLikeButtonWidgetCleaner->WidgetResetAndAdd();	
		}
		
		if (isset( $_POST['gxtb_widgetreset'] ) ) {
			$this->GBLikeButtonWidgetCleaner->WidgetReset();	
		}
				
#########################################################
		include('gb_admin_sidebar.php');
#########################################################	
?>
<div class="wrap"><div id="gxtb_lb_fB_options">
<?php gb_admin_header::gb_admin_title(); ?>
<?php include( 'gb_save.php' ); ?>
<form method="post" action="<?php echo admin_url( 'admin.php?page=fb-like-settings' ); ?>" name="settingpage" id="settingpage" class="settingpage">
	<?php wp_nonce_field('closedpostboxes', 'closedpostboxesnonce', false ); ?>
	<?php wp_nonce_field('meta-box-order', 'meta-box-order-nonce', false ); ?>
    <?php wp_nonce_field('fb-like-button'); ?>
<div class="ui-widget">
			<div class="ui-state-highlight ui-corner-all" style="margin-top: 20px; padding: 0 .7em;"> 
				<p><span class="ui-icon ui-icon-info" style="float: left; margin-right: .3em;"></span>
				<strong><?php _e("Information", gxtb_fb_lB_lang); ?> [v<?php echo gxtb_fb_lB_version; ?>]:</strong><br /><br /><?php 
		_e("Currently there are only the GB-Cleaners available but there will be a lot more options soon!", gxtb_fb_lB_lang);
?></p>
			</div>
		</div>
<div id="poststuff" class="metabox-holder<?php echo 2 == $screen_layout_columns ? ' has-right-sidebar' : ''; ?>">
		<div id="poststuff" class="metabox-holder" style="width: 100%;">
				<!-- Sidebar -->
				<div id="side-info-column" class="inner-sidebar">
					<?php
					    do_meta_boxes($this->pagehook, 'additional_fb', "");
						do_meta_boxes($this->pagehook, 'additional_support', "");
					?>
				</div>
				<!-- /Sidebar -->
				<!-- Content -->
					<div id="post-body" class="has-sidebar">
						<div id="post-body-content" class="has-sidebar-content">
							<?php do_meta_boxes($this->pagehook, 'first', ""); ?>					
						</div><?php 
									include('gb_submit.php');
								?>
					</div>
				<!-- /Content -->
				<br class="clear"/>
		</div>
<div class="plugin-version">
	<a href="#plugininfo" class="fancylink" title="Created by Stefan N."><?php echo gxtb_fb_lB_name; ?> - v<?php echo gxtb_fb_lB_version; ?></a>
</div>
</div>
		</div>
	</div>
<?php 
	#include('gb_submit.php');
?>
</div>
<?php
	include('gb_admin_footer.php');
?>
<script type="text/javascript">
		//<![CDATA[
		jQuery(document).ready( function($) {
			// close postboxes that should be closed
			$('.if-js-closed').removeClass('if-js-closed').addClass('closed');
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
include('gb_admin_footer.php');
} // end konstruktor
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
function gb_tools() {
		$this->gxtb_fb_lB_Settings -> gxtb_fb_lB_Tools();
	}
function gb_plugin() {
		$this->gxtb_fb_lB_Settings -> gxtb_fb_lB_Setting();
	}
function gb_editor() {
		$this->gxtb_fb_lB_Settings -> gxtb_fb_lB_EditorSettings();
	}	
function gb_support() {
		$this->gxtb_fb_lB_Settings -> gxtb_fb_lB_help();
	}	
} // end class
} // end if-class
?>