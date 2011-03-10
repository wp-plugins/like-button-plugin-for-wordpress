<?php // Do not delete these lines
	if (!empty($_SERVER['SCRIPT_FILENAME']) && basename(__file__) == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');
?>
<?php
/*
+----------------------------------------------------------------+
+	Like-Button-Plugin-For-Wordpress [v4.3.3] - GB-Expertmod [v0.2 - FINAL]
+	by Stefan Natter (http://www.gb-world.net)
+   required for Like-Button-Plugin-For-Wordpress and WordPress 2.7.x or higher
+----------------------------------------------------------------+
*/
####################################################
####################################################
###########								 ###########
###########								 ###########
###########	       EXPERT-MODE			 ###########
###########								 ###########
###########								 ###########
####################################################
##################### by gb-world.net ##############
####################################################
if (!class_exists('gxtb_fb_lB_EXMClass')) {
class gxtb_fb_lB_EXMClass {
	
	var $GBLikeButton;
	
function gxtb_fb_lB_EXMClass() {

		global $screen_layout_columns;
		$screen_layout_columns = 2;
		$this->GBLikeButton = get_option('GBLikeButton');

		add_meta_box('gb_fb_expert', __('FB-Expert Mod', gxtb_fb_lB_lang), array(&$this, 'gb_expert'), $this->pagehook, 'first', 'core');			
#########################################################
		include('gb_admin_sidebar.php');
#########################################################	
?>
<div class="wrap"><div id="gxtb_lb_fB_options">
<?php gb_admin_header::gb_admin_title(); ?>
<?php include( 'gb_save.php' ); ?>
<form method="post" action="<?php echo admin_url( 'admin.php?page=fb-like-beta' ); ?>" name="settingpage" id="settingpage" class="settingpage">

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
						do_meta_boxes($this->pagehook, 'additional_fans', "");
					?>
				</div>
				<!-- /Sidebar -->
				<!-- Content -->
					<div id="post-body" class="has-sidebar">
						<div id="post-body-content" class="has-sidebar-content">
							<?php do_meta_boxes($this->pagehook, 'first', ""); ?>					
						</div>
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

function gb_expert() {
?>

<table class="form-table" border="0" id="gb-table">
	<tbody>
		<tr>
            <td width="20%" rowspan="2" valign="top" class="gb-table-header">
				<strong>
					<?php _e('Information', gxtb_fb_lB_lang ); ?>
				</strong>
			</td>		
            <td width="80%" valign="middle">
             <small>
			<?php _e('This new function will be published completly at version [v5.0]. Until then this will be in beta-mode. We will publish how you can use this new function within the next weeks on our GB-World Facebook Fanpage.', gxtb_fb_lB_lang ); ?><br /><br />
            <?php _e('You will be able to implement some own functionalities like you can do within wordpress. With some filters/actions and hooks like Wordpress uses them.', gxtb_fb_lB_lang ); ?>
            </small>
             </td>
        </tr>
        <tr>
            <td class="gb-table-tipp">
			</td>
        </tr> <?php if (gxtb_fb_lB_debug || version_compare( gxtb_fb_lB_version, '5.0', '>=' ) || $this->GBLikeButton['PluginSetting']['Bugreport'] == 1) { ?>
        		<tr>
            <td width="20%" rowspan="2" valign="top" class="gb-table-header">
				<strong>
					<?php _e('Debug Options', gxtb_fb_lB_lang ); ?>
				</strong>
			</td>		
            <td width="80%" valign="middle">
<textarea rows="10" cols="100"><?php if(!empty($this->GBLikeButton)) {
$string = "";
foreach ($this->GBLikeButton as $key => $value) { 

if($key != "PluginSetting" && $key != "EditorSetting" && $key != "PluginInfo") {
$string.= "" . $key . " => " . $value;
$string.= "\n";
	foreach ($this->GBLikeButton[$key] as $key1 => $value1) { 
				$string.= $key1 . " => " . $value1;
				$string.= "\n";
				if($key1 == "Message") {
					foreach ($this->GBLikeButton[$key][$key1] as $key2 => $value2) { 
						$string.= $key2 . " => " . $value2;
						$string.= "\n";
					}
				}
	}
}
}
echo $string; } ?></textarea>
             </td>
        </tr>
        <tr>
            <td class="gb-table-tipp">
			</td>
        </tr> <?php } ?>
	</tbody>
</table>

<?php
} // end function
} // end class
} // end if-class

/* 
OFFEN:
+ http://de2.php.net/manual/de/function.str-rot13.php#93385
+ Output-Variable für Fehlersuche (Textbox mit diesem Output unten und dies soll für Fehlersuche verwendet werden
<?php 

foreach ($this->GBLikeButton as $key => $value) { 
echo $key . " => " . $value;
echo "<br>";
	foreach ($this->GBLikeButton[$key] as $key1 => $value1) { 
				echo $key1 . " => " . $value1;
				echo "<br>";
				if($key1 == "Message") {
				foreach ($this->GBLikeButton[$key][$key1] as $key2 => $value2) { 
					echo $key2 . " => " . $value2;
					echo "<br>";
				}
				}
	}
}
?>
*/
?>