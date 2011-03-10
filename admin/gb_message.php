<?php // Do not delete these lines
	if (!empty($_SERVER['SCRIPT_FILENAME']) && basename(__file__) == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');
?>
<?php
/*
+----------------------------------------------------------------+
+	Like-Button-Plugin-For-Wordpress [v4.3.3] - GB-MESSAGE-SYSTEM [v0.1 FINAL] - GB-WARNING-SYSTEM [v0.1 BETA] [mit global $GBLikeButton]
+	by Stefan Natter (http://www.gb-world.net)
+   required for Like-Button-Plugin-For-Wordpress and WordPress 2.7.x or higher
+----------------------------------------------------------------+
*/

####################################################
####################################################
###########								 ###########
###########								 ###########
###########	       GB-MESSAGE-SYSTEM  	 ###########
###########								 ###########
###########								 ###########
####################################################
####################### by gb-world.net ############
####################################################
if(!class_exists('GBMessage')) {
class GBMessage {
function GBMessage() {

### Info-Messages (Update, Information and everything else) ###
global $GBLikeButton;

if( (isset($GBLikeButton->GBLikeButton['PluginInfo']['lVersion']) && ( 
isset($GBLikeButton->GBLikeButton['PluginSetting']['Message']['Update']) || 
isset($GBLikeButton->GBLikeButton['PluginSetting']['Message']['Installation']) || 
isset($GBLikeButton->GBLikeButton['PluginSetting']['Message']['Help']) )) && (
$GBLikeButton->GBLikeButton['PluginSetting']['Message']['Update'] > 0 ||
$GBLikeButton->GBLikeButton['PluginSetting']['Message']['Installation'] > 0 ||
$GBLikeButton->GBLikeButton['PluginSetting']['Message']['Help'] > 0  ||
$GBLikeButton->GBLikeButton['PluginSetting']['Message']['Support'] > 0)
) {  

$text = "";	
				foreach ($GBLikeButton->GBLikeButton['PluginSetting']['Message'] as $key => $value) { 
					switch($key) {
						
					 case ($key == "Update" && gxtb_fb_lB_version != $GBLikeButton->GBLikeButton['PluginInfo']['lVersion'] && $GBLikeButton->GBLikeButton['PluginSetting']['Message']['Update'] > 0):
					 	$text .= sprintf( "<strong>%s:</strong> %s - <b>%s:</b> %s",
						
						__('Update', gxtb_fb_lB_lang),
						__('After this Update/Reactivation <b>please check all your FB-Like Settings</b> if they are all the same! Because since [v4.3] there are many new things in the Backend. Thanks. Because there is a new function which copies all the old options into a new one but there is a chance that there is a problem after updating the Plugin. Please check all the options!', gxtb_fb_lB_lang),
						__('Especially', gxtb_fb_lB_lang),
						__('Dynamic Button Setting, Meta-Tags and Design-Options. And do also update your header.php-file if you use XFBML (see more information below the XFBML-Checkbox).', gxtb_fb_lB_lang)
						
						);
						$text .= "<br /><br />";
					 break;
					 
					 case ($key == "Installation" && gxtb_fb_lB_version == $GBLikeButton->GBLikeButton['PluginInfo']['lVersion'] && $GBLikeButton->GBLikeButton['PluginSetting']['Message']['Installation'] > 0):
					 	$text .=  sprintf( "<strong>%s:</strong> %s %s. %s <a href='admin.php?page=fb-like-button'>%s</a> %s <a href='admin.php?page=fb-like-button#tabs-1'>%s</a>, <a href='admin.php?page=fb-like-button#tabs-2'>%s</a>, %s <a href='admin.php?page=fb-like-button#tabs-5'>%s</a> %s",
						__('Installation', gxtb_fb_lB_lang),
						__('Hello and welcome to the', gxtb_fb_lB_lang),
						gxtb_fb_lB_name,
						__('First of all set the Default Settings on the',gxtb_fb_lB_lang),
						__('General Page', gxtb_fb_lB_lang),
						__('including the', gxtb_fb_lB_lang),
						__('General Settings', gxtb_fb_lB_lang),
						__('Position Settings', gxtb_fb_lB_lang),
						__('and the', gxtb_fb_lB_lang),
						__('Generator', gxtb_fb_lB_lang),
						__('at the bottom. After that you can check your Blog to see that it works.', gxtb_fb_lB_lang)
						
						);
						$text .= "<br /><br />";
					 break;
					 
					 case ($key == "Help" && $GBLikeButton->GBLikeButton['PluginSetting']['Message']['Help'] > 0):
					 	$text .=  sprintf( "<strong>%s:</strong> %s <br>%s <b><a href='http://facebook.com/GBWorldnet'>%s</a></b> %s <b><a href='http://www.gb-world.net'>%s</a></b>.",
						
						__('Help', gxtb_fb_lB_lang),
						__('If you have any questions, need help, found a bug or you just have a feature request then contact us please!', gxtb_fb_lB_lang),
						__('Get in touch with us on', gxtb_fb_lB_lang),
						__('Facebook', gxtb_fb_lB_lang),
						__('or on our', gxtb_fb_lB_lang),
						__('Website', gxtb_fb_lB_lang)
						
						);
						$text .= "<br /><br />";
					 break;
					 
					 case ($key == "Support" && $GBLikeButton->GBLikeButton['PluginSetting']['Message']['Support'] > 0):
					 	$text .=  sprintf( "<strong>%s:</strong> %s <br>%s <b><a href='https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=SB94MEM9ATTBG'>%s</a></b>.",
						
						__('Support', gxtb_fb_lB_lang),
						__('I have invested a lot of time to update this Plugin to [v4.4] and I would appreciate it if you could support my work.', gxtb_fb_lB_lang),
						__('Support my work with a little', gxtb_fb_lB_lang),
						__('Donation', gxtb_fb_lB_lang)
						
						);
						$text .= "<br /><br />";
					 break;
					 
					 default:
						break;
					} // end switch
				} // end foreach
				
if($text != "") {
?>
		<div class="ui-widget">
			<div class="ui-state-highlight ui-corner-all" style="padding: 0 .7em;"> 
				<p><span class="ui-icon ui-icon-info" style="float: left; margin-right: .3em;"></span> 
					<strong><?php _e("Information", gxtb_fb_lB_lang); ?></strong><br /><br /><?php 
						echo $text;
					?></p>
			</div>
		</div>
<?php

	if($GBLikeButton->GBLikeButton['PluginSetting']['Message']['Update'] >= 1)
		$GBLikeButton->GBLikeButton['PluginSetting']['Message']['Update'] -= 1;
	
	if($GBLikeButton->GBLikeButton['PluginSetting']['Message']['Installation'] >= 1)
		$GBLikeButton->GBLikeButton['PluginSetting']['Message']['Installation'] -= 1;
	
	if($GBLikeButton->GBLikeButton['PluginSetting']['Message']['Help'] >= 1)
		$GBLikeButton->GBLikeButton['PluginSetting']['Message']['Help'] -= 1;
	
	if($GBLikeButton->GBLikeButton['PluginSetting']['Message']['Support'] >= 1)
		$GBLikeButton->GBLikeButton['PluginSetting']['Message']['Support'] -= 1;
	
	update_option('GBLikeButton', $GBLikeButton->GBLikeButton);

	} // end if-text
	
} // end if Abfrage

} // end constructor
} // end class
} // end if-class

if(!class_exists('GBWarningSys')) {
class GBWarningSys {
	
	#var $GBLikeButton;
	var $warningtext;
	
function GBWarningSys() {
	$this -> GBWarningSysCheck();
} // end konstruktor

/* 
	the SysCheck checks all the available options if there are some things not set correctly. 
	if there is a Warning the Warning-Option [Message][Warning] must be 1 or more. If this option
	is 0 then there is everything correct. The messages were generated here and are not saved in any
	option because this is redundand.
*/
function GBWarningSysCheck() {
	
	$this -> warningtext = array();
	#$GBLikeButton = get_option('GBLikeButton');
	global $GBLikeButton;

if ($GBLikeButton->GBLikeButton['PluginSetting']['Message']['Warning'] == 1) {
	
	if ($GBLikeButton->GBLikeButton['General']['on'] == 1) {
		
		# Anzeige des FB-Buttons kontrollieren
		$likevisible = false;
		
		$likevisible = ($likevisible == false && $GBLikeButton->GBLikeButton['General']['frontpage'] == 1 ) ? true:false;
		$likevisible = ($likevisible == false && $GBLikeButton->GBLikeButton['General']['page'] == 1 ) ? true:false;
		$likevisible = ($likevisible == false && $GBLikeButton->GBLikeButton['General']['post'] == 1 ) ? true:false;
		$likevisible = ($likevisible == false && $GBLikeButton->GBLikeButton['General']['category'] == 1 ) ? true:false;
		$likevisible = ($likevisible == false && $GBLikeButton->GBLikeButton['General']['archiv'] == 1 ) ? true:false;
		
		if($likevisible = false) {
			$this -> warningtext[__('Position Settings', gxtb_fb_lB_lang )] = array( __('You must choose either frontpage, page, post, category or archive if you activate the plugin. Otherwise the Like-Button will not be displayed!', gxtb_fb_lB_lang ) => array("General" => "fb-like-button#tabs-2") );
		}
		
		# Überprüfen ob eine Position ausgewählt worden ist #
		if($GBLikeButton->GBLikeButton['General']['position_before'] == 0 || $GBLikeButton->GBLikeButton['General']['position_after'] == 0) {
			$this -> warningtext[__('Position Settings', gxtb_fb_lB_lang )] = array( __('You must either choose if the Button appears <i>before</i> or <i>after</i> the content!', gxtb_fb_lB_lang ) => array("General" => "fb-like-button#tabs-2") );
		}
				
		# Überprüft die Eingabe des Generators (http usw) #
		if($GBLikeButton->GBLikeButton['Generator']['url'] == "" || !strstr($GBLikeButton->GBLikeButton['Generator']['url'], "http://") ) {
			$this -> warningtext[__('Like-Button-Generator', gxtb_fb_lB_lang )] = array( __('You must enter a valid URL for your like-Button! Either your URL-Box is empty or you forget to enter http://', gxtb_fb_lB_lang ) => array("General" => "fb-like-button#tabs-5") );
		}
		
		# Meta-Tags überprüfen (speziell AdminID usw) #!is_numeric($gxtb_fb_lB_meta['admins']) && !empty($gxtb_fb_lB_meta['admins'])
		if( empty($GBLikeButton->GBLikeButton['OpenGraph']['admins']) || $GBLikeButton->GBLikeButton['OpenGraph']['admins'] == "" ) {
			$this -> warningtext[__('AdminID', gxtb_fb_lB_lang )] = array( __('You did not enter a valid Admin-ID. Please visit <a href="http://apps.facebook.com/whatismyid/" target="_blank">this site</a> to get your Facebook-ID (which is used as Admin-ID).', gxtb_fb_lB_lang ) => array("OpenGraph" => "fb-like-opengraph#tabs-10") );
		}
		
		if( ( empty($GBLikeButton->GBLikeButton['OpenGraph']['app_id']) || $GBLikeButton->GBLikeButton['OpenGraph']['app_id'] == "" ) && $GBLikeButton->GBLikeButton['General']['JDK'] == 1 ) {
			$this -> warningtext[__('AppID', gxtb_fb_lB_lang )] = array( __('You have to enter a valid AppID if you use XFBML. Please visit <a href="http://developers.facebook.com/setup/" target="_blank">this site</a> to get your App-ID.', gxtb_fb_lB_lang ) => array("OpenGraph" => "fb-like-opengraph#tabs-10") );
		}
				
		# Alle Blog-Specific Tags müssen ausgefüllt sein #
		if($GBLikeButton->GBLikeButton['OpenGraph']['site_name'] == "" || $GBLikeButton->GBLikeButton['OpenGraph']['title'] == "" || $GBLikeButton->GBLikeButton['OpenGraph']['url'] == "" || ($GBLikeButton->GBLikeButton['OpenGraph']['dusage'] == "blogn" && $GBLikeButton->GBLikeButton['OpenGraph']['description'] == "") ) {
			$this -> warningtext[__('Blog-Specific Tags', gxtb_fb_lB_lang )] = array( __('Please set all the required Tags like the Examples show on the Tags-Page.', gxtb_fb_lB_lang ) => array("OpenGraph" => "fb-like-opengraph#tabs-11") );
		}		
				
				 ## AppID != "" wenn jdk -- blog specific tags müssen ausgefült sein
				
	
	# Wenn Plugin bzw. Button nicht aktiviert ist #						
	} else {
		$this -> warningtext[__('Activation', gxtb_fb_lB_lang )] = array( __('Please activate the Like Button in order to use and see the Button on your Blog.', gxtb_fb_lB_lang ) => array("General" => "fb-like-button#tabs-1") );

	} // end if on
	
} // end if-Warning = 1	
}

/* the Output generates the Message which is displayed on every Admin-Page */
function GBWarningSysOutput() { 
$this -> GBWarningSysCheck();

if ( !empty($this -> warningtext) ) {
?>
<br />
		<div class="ui-widget">
			<div class="ui-state-error ui-corner-all" style="padding: 0 .7em;"> 
				<p><span class="ui-icon ui-icon-info" style="float: left; margin-right: .3em;"></span> 
					<strong><?php _e("GB-Warning-System", gxtb_fb_lB_lang); ?></strong> <small>(<a href="<?php echo $_SERVER["REQUEST_URI"]; ?>"><?php _e("Refresh for Update", gxtb_fb_lB_lang); ?></a>)</small><br />
					<ul style="list-style-type:disc; padding-left: 20px;"><?php 
							foreach ($this -> warningtext as $title => $value) {
								echo "<li><b>" . $title . ":</b> ";
								foreach ($value as $text => $link) {
									echo $text;
									foreach ($link as $page => $url) {
										echo " <a href='admin.php?page=". $url ."'>[" . $page . "]</a></li>";
									}
								}
							}
					?></ul></p>
			</div>
		</div>
<?php } }

} // end class
} // end if-class
?>