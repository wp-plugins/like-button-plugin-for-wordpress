<?php // Do not delete these lines
	if (!empty($_SERVER['SCRIPT_FILENAME']) && basename(__file__) == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');
?>
<?php
/*
+----------------------------------------------------------------+
+	Like-Button-Plugin-For-Wordpress [v4.4.4] - GB-Expertmod [v0.5 - FINAL]
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
	var $GBLikeButtonWidget;
	
function gxtb_fb_lB_EXMClass() {

		global $screen_layout_columns;
		$screen_layout_columns = 2;
		$this->GBLikeButton = get_option('GBLikeButton');
		$this->GBLikeButtonWidget = get_option('GBLikeButtonWidget');

		add_meta_box('gb_fb_expert', __('FB-Expert Mod', gxtb_fb_lB_lang), array(&$this, 'gb_expert'), $this->pagehook, 'first', 'core');	
		add_meta_box('gb_fb_beta', __('Beta-Functions and requested Functions [v'. gxtb_fb_lB_version .']', gxtb_fb_lB_lang), array(&$this, 'gb_beta'), $this->pagehook, 'second', 'core');		
#########################################################
		include('gb_admin_sidebar.php');
#########################################################	
?>
<div class="wrap"><div id="gxtb_lb_fB_options">
<?php gb_admin_header::gb_admin_title(); ?>
<?php include( 'gb_message.php' ); 
	  $GBMessage = new GBMessage();
?>
<?php include( 'gb_save.php' ); ?>
<form method="post" action="<?php echo admin_url( 'admin.php?page=fb-like-expert' ); ?>" name="settingpage" id="settingpage" class="settingpage">

	<?php wp_nonce_field('closedpostboxes', 'closedpostboxesnonce', false ); ?>
	<?php wp_nonce_field('meta-box-order', 'meta-box-order-nonce', false ); ?>
    <?php wp_nonce_field('fb-like-button'); ?>

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
                            <?php do_meta_boxes($this->pagehook, 'second', ""); ?>				
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
	$this->GBLikeButton = get_option('GBLikeButton');
	$this->GBLikeButtonWidget = get_option('GBLikeButtonWidget');
?>
<table class="form-table gb-table">
	<tbody>
		<tr>
            <td width="20%" rowspan="2" valign="top" class="gb-table-header">
				<strong>
					<?php _e('Information', gxtb_fb_lB_lang ); ?>
				</strong>
			</td>		
            <td width="80%" valign="middle">
			<?php _e('This new function will be published completly at version [v5.0]. Until then this will be in beta-mode. We will publish how you can use this new function within the next weeks on our GB-World Facebook Fanpage.', gxtb_fb_lB_lang ); ?><br />
            <?php _e('You will be able to implement some own functionalities like you can do within wordpress. With some filters/actions and hooks like Wordpress uses them.', gxtb_fb_lB_lang ); ?>
             </td>
        </tr>
        <tr>
            <td class="gb-table-tipp">
			</td>
        </tr>
		
		<?php if (gxtb_fb_lB_debug || version_compare( gxtb_fb_lB_version, '4.4.3', '>=' ) || $this->GBLikeButton['PluginSetting']['Bugreport'] == 1) { ?>
        <tr>
            <td width="20%" rowspan="2" valign="top" class="gb-table-header">
				<strong>
					<?php _e('Debug Options', gxtb_fb_lB_lang ); ?>
				</strong>
			</td>		
            <td width="80%" valign="middle">
<textarea><?php if(!empty($this->GBLikeButton)) {
$string = "";
foreach ($this->GBLikeButton as $key => $value) { 

if($key != "PluginSetting" && $key != "EditorSetting" && $key != "PluginInfo") {
$string.= "" . $key . " => " . $value;
$string.= "\n";
	foreach ($this->GBLikeButton[$key] as $key1 => $value1) { 
				$string.= "   " . $key1 . " => ";
				switch ($value1) {
					case "":
						$string.="not set";
						break;
					case "0":
					case "off":
						$string.="false";
						break;
					case "1":
					case "on":
						$string.="true";
						break;
					default:
						$string.=$value1;
						break;	
				}
				$string.= "\n";
	}
}
}
echo $string; } ?></textarea>
             </td>
        </tr>
        <tr>
            <td class="gb-table-tipp">
			</td>
        </tr>
		
		 <tr>
            <td width="20%" rowspan="2" valign="top" class="gb-table-header">
				<strong>
					<?php _e('Debug Widget-Options', gxtb_fb_lB_lang ); ?>
				</strong>
			</td>		
            <td width="80%" valign="middle">
<textarea><?php if(!empty($this->GBLikeButtonWidget)) {
$string = "";
foreach ($this->GBLikeButtonWidget as $key => $value) { 

$string.= "" . $key . " => " . $value;
$string.= "\n";
	foreach ($this->GBLikeButtonWidget[$key] as $key1 => $value1) { 
				$string.= "   " . $key1 . " => ";
				switch ($value1) {
					case "":
						$string.="not set";
						break;
					case "0":
					case "off":
						$string.="false";
						break;
					case "1":
					case "on":
						$string.="true";
						break;
					default:
						$string.=$value1;
						break;	
				}
				$string.= "\n";
	}

}
echo $string; } ?></textarea>
             </td>
        </tr>
        <tr>
            <td class="gb-table-tipp">
			</td>
        </tr> 	
		
		
		<?php } ?>
	</tbody>
</table>

<?php
} // end function

function gb_beta() {
?>
<table class="form-table gb-table">
	<tbody>
<?php
	global $wp_version;
	if (version_compare( $wp_version, '3.0', '>=' ) ) {   
?> 
         <tr>
            <td width="20%" rowspan="2" valign="top" class="gb-table-header">
				<strong>
					<?php _e('Beta-Functions Information', gxtb_fb_lB_lang ); ?>
				</strong>
			</td>		
            <td width="80%" valign="middle">
			<?php _e('As you can see below there are some options you can use now at your own risk to extend some functions of this plugin. But keep in mind that this are just Beta-Functions and no release stuff. This options may be implemented later if the demand is high enough to complete it.', gxtb_fb_lB_lang ); ?>
             </td>
        </tr>
        <tr>
            <td class="gb-table-tipp">
			</td>
        </tr>
    
		<tr>
            <td width="20%" rowspan="2" valign="top" class="gb-table-header">
				<strong>
					<?php _e('Add something beside the Like-Button', gxtb_fb_lB_lang ); ?>
				</strong>
                <br />
                <input type='Radio' class="radio" Name='expert_besideposition' value='left' <?php if(isset($this->GBLikeButton['Expert']['besideposition']) && $this->GBLikeButton['Expert']['besideposition'] == "left") echo "checked"; ?> > <?php _e('left', gxtb_fb_lB_lang ); ?>
                <br />
                <input type='Radio' class="radio" Name='expert_besideposition' value='right' <?php if(isset($this->GBLikeButton['Expert']['besideposition']) && $this->GBLikeButton['Expert']['besideposition'] == "right") echo "checked"; ?> > <?php _e('right', gxtb_fb_lB_lang ); ?>
                
			</td>		
            <td width="80%" valign="middle">
<textarea name="expert_besidebutton"><?php if(isset($this->GBLikeButton['Expert']['besidebutton']) && $this->GBLikeButton['Expert']['besidebutton'] != "") { echo stripslashes($this->GBLikeButton['Expert']['besidebutton']); } ?></textarea><br />
<?php _e('You can either add some html-stuff into this box or a simple text.', gxtb_fb_lB_lang ); ?>
             </td>
        </tr>
        <tr>
            <td class="gb-table-tipp">
			</td>
        
        <tr>
            <td width="20%" rowspan="2" valign="top" class="gb-table-header">
				<strong>
					<?php _e('W3C-Validated Code Output', gxtb_fb_lB_lang ); ?>
				</strong>
			</td>		
            <td width="80%" valign="middle"><a name="w3c"></a>
			<input type="checkbox" class="checkbox" name="opengraph_w3c" id="opengraph_w3c" value="1" <?php if (isset($this->GBLikeButton['OpenGraph']['w3c']) && $this->GBLikeButton['OpenGraph']['w3c']) {echo("checked"); } ?> /> 
                             <img src="<?php echo gxtb_fb_lB_PLUGIN_FOLDER; ?>images/rot17a.gif"  onmouseover="tooltip.show('<?php _e('When you activate this option the meta tags will only appear on your blog if the Facebook Crawler is visiting/caching your site! Nobody else (except if you are an admin and logged in) will see it anymore.', gxtb_fb_lB_lang); ?>');" onmouseout="tooltip.hide();">
             </td>
        </tr>
        <tr>
            <td class="gb-table-tipp">
          	 <?php _e('When you activate this option the meta tags will only appear on your blog if the Facebook Crawler is visiting/caching your site! Nobody else (except if you are an admin and logged in) will see it anymore.', gxtb_fb_lB_lang); ?><br />
          	 <?php echo sprintf( '<b>%s:</b> %s!', __('Important', gxtb_fb_lB_lang), __('When this option is activated the Facebook URL Linter will not work because only the Crawler and logged in admins will see the Meta-Tags', gxtb_fb_lB_lang)); ?>
			</td>
        </tr>
<?php } else { ?>
         <tr>
            <td width="20%" rowspan="2" valign="top" class="gb-table-header">
				<strong>
					<?php _e('Beta-Functions Information', gxtb_fb_lB_lang ); ?>
				</strong>
			</td>		
            <td width="80%" valign="middle">
			<?php _e('The Beta-Functions and also the requested Functions are only available if you have Wordpress 3.x or higher.', gxtb_fb_lB_lang ); ?>
             </td>
        </tr>
        <tr>
            <td class="gb-table-tipp">
			</td>
        </tr>
<?php } ?>
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