<?php // Do not delete these lines
	if (!empty($_SERVER['SCRIPT_FILENAME']) && basename(__file__) == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');
?>
<?php
/*
+----------------------------------------------------------------+
+	Like-Button-Plugin-For-Wordpress [v4.3]
+	by Stefan Natter (http://www.gangxtaboii.com and http://www.gb-world.net)
+   required for Like-Button-Plugin-For-Wordpress and WordPress 2.7.x or higher
+----------------------------------------------------------------+
*/

####################################################
####################################################
###########								 ###########
###########								 ###########
###########	       GB-World-Settings	 ###########
###########								 ###########
###########								 ###########
####################################################
####################### by gb-world.net ############
####################################################

if (!class_exists('gxtb_fb_lB_Settings')) {
class gxtb_fb_lB_Settings {
## Konstruktor
function gxtb_fb_lB_Settings() {
?>

<h4><?php _e('General Plugin-Settings', gxtb_fb_lB_lang) ?></h4>

<?php _e('Now you can change some important general settings of this Plugin.', gxtb_fb_lB_lang) ?>
<br /><br />
<?php 

## General-Settings ##
$gxtb_fb_lB = get_option('gxtb_fb_lB');
$gxtb_fb_lB_warning = get_option('gxtb_fb_lB_warning');
/* 
?>
<span class="hotspot" onmouseover="tooltip.show('<?php _e('Activate or Deactivate the very informative InfoPage of our Website and Plugins.', gxtb_fb_lB_lang) ?>');" onmouseout="tooltip.hide();">
<?php _e('GB-World-InfoPage:', gxtb_fb_lB_lang) ?></span> <input type="checkbox" class="checkbox" name="gxtb_fb_lB_infopage" id="gxtb_fb_lB_infopage" <?php if ($gxtb_fb_lB["InfoPage"]) {echo("checked"); } ?> /> 
<br />
<span class="hotspot" onmouseover="tooltip.show('<?php _e('Activate or Deactivate the GB-FavIcon <b>on the Option-Page</b>.', gxtb_fb_lB_lang) ?>');" onmouseout="tooltip.hide();">
<?php _e('GB-FavIcon:', gxtb_fb_lB_lang) ?></span> <input type="checkbox" class="checkbox" name="gxtb_fb_lB_favicon" id="gxtb_fb_lB_favicon" <?php if ($gxtb_fb_lB["FavIcon"]) {echo("checked"); } ?> /> 
<br />
<span class="hotspot" onmouseover="tooltip.show('<?php _e('Activate or Deactivate jQuery-Plugins <b>on the Option-Page</b>. We will activate jQuery-based Option-Page as default as soon as we know there will be no bugs or issues with jQuery and our work.', gxtb_fb_lB_lang) ?>');" onmouseout="tooltip.hide();">
<?php _e('jQuery:', gxtb_fb_lB_lang) ?></span> <input type="checkbox" class="checkbox" name="gxtb_fb_lB_jquery" id="gxtb_fb_lB_jquery" <?php if ($gxtb_fb_lB["jQuery"]) {echo("checked"); } ?> /> (<?php _e('recommended', gxtb_fb_lB_lang) ?>)
<br />
<span class="hotspot" onmouseover="tooltip.show('<?php _e('Activate or Deactivate the GB-Warnigns.', gxtb_fb_lB_lang) ?>');" onmouseout="tooltip.hide();">
<?php _e('GB-Warnings:', gxtb_fb_lB_lang) ?></span> <input type="checkbox" class="checkbox" name="gxtb_fb_lB_warning_aktiv" id="gxtb_fb_lB_warning_aktiv" <?php if ($gxtb_fb_lB_warning["warning_aktiv"]) {echo("checked"); } ?> /> (<?php _e('recommended', gxtb_fb_lB_lang) ?>)
<br /> */ ?>
<span class="hotspot" onmouseover="tooltip.show('<?php _e('Delete and update options which became senseless because of an plugin-update or anything else!', gxtb_fb_lB_lang) ?>');" onmouseout="tooltip.hide();">
<?php _e('Run GB-Cleaner:', gxtb_fb_lB_lang) ?></span> <input type="checkbox" class="checkbox" name="gxtb_run_cleaner" id="gxtb_run_cleaner" /> 
<?php 
 if ( isset( $_POST['gxtb_run_cleaner'] ) ) {

	// cleanes all the senseless variables for this new update
	include( dirname(dirname(__FILE__)) . '/include/gb_cleaner.php' );
	$gxtb_fb_lB_Cleaner = new gxtb_fb_lB_Cleaner();
}

} // end konstruktor
} // end class
} // end if-class
?>