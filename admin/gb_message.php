<?php // Do not delete these lines
	if (!empty($_SERVER['SCRIPT_FILENAME']) && basename(__file__) == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');
?>
<?php
/*
+----------------------------------------------------------------+
+	Like-Button-Plugin-For-Wordpress [v4.4.3.1] - GB-MESSAGE-SYSTEM [v0.2a FINAL] - GB-WARNING-SYSTEM [v0.3 BETA] [mit global $GBLikeButton]
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
	$GBLikeButton = get_option('GBLikeButton');

if( (isset($GBLikeButton['PluginInfo']['lVersion']) && ( 
isset($GBLikeButton['PluginSetting']['Message']['Update']) || 
isset($GBLikeButton['PluginSetting']['Message']['Installation']) || 
isset($GBLikeButton['PluginSetting']['Message']['Help']) || 
isset($GBLikeButton['PluginSetting']['Message']['Support']))) && (
$GBLikeButton['PluginSetting']['Message']['Update'] > 0 ||
$GBLikeButton['PluginSetting']['Message']['Installation'] > 0 ||
$GBLikeButton['PluginSetting']['Message']['Help'] > 0  ||
$GBLikeButton['PluginSetting']['Message']['Support'] > 0)
&& version_compare( $GBLikeButton['PluginInfo']['lVersion'], gxtb_fb_lB_version, '<=')) {  

	$this->GBMessageOutput();

	if($GBLikeButton['PluginSetting']['Message']['Update'] >= 1)
		$GBLikeButton['PluginSetting']['Message']['Update'] -= 1;
	
	if($GBLikeButton['PluginSetting']['Message']['Installation'] >= 1)
		$GBLikeButton['PluginSetting']['Message']['Installation'] -= 1;
	
	if($GBLikeButton['PluginSetting']['Message']['Help'] >= 1)
		$GBLikeButton['PluginSetting']['Message']['Help'] -= 1;
	
	if($GBLikeButton['PluginSetting']['Message']['Support'] >= 1)
		$GBLikeButton['PluginSetting']['Message']['Support'] -= 1;
	
	update_option('GBLikeButton', $GBLikeButton);

} # end if Abfrage

} // end constructor
function GBMessageOutput() {
		$GBLikeButton = get_option('GBLikeButton');

$text = "";	
				foreach ($GBLikeButton['PluginSetting']['Message'] as $key => $value) { 
					switch($key) {
						
					 case ($key == "Update" && $GBLikeButton['PluginSetting']['Message']['Update'] > 0 && version_compare( gxtb_fb_lB_version, '4.4.3.6', '=') ):
					 	$text .= sprintf( "<strong>%s:</strong> %s",
						
						__('Update', gxtb_fb_lB_lang),
						__('It is now possible to add the Send-Button beside the Like Button (only if you use XFBML) and also the language of the iFrame-Button works now!', gxtb_fb_lB_lang)					
						);
						$text .= "<br /><br />";
					 break;
						
					 case ($key == "Update" && $GBLikeButton['PluginSetting']['Message']['Update'] > 0 && version_compare( gxtb_fb_lB_version, '4.4.3.1', '=') ):
					 	$text .= sprintf( "<strong>%s:</strong> %s<br/><b>%s:</b> %s",
						
						__('Update', gxtb_fb_lB_lang),
						__('This new Update includes many new backend but also frontend changes. For example the widgets were totally new organized and updated. There is also a new widget available: Activity Feed. You are also able to add some other stuff beside the Like Button now. Just visit the Expert-Mode page and take a look at the new Options.', gxtb_fb_lB_lang),
						__('Also new', gxtb_fb_lB_lang),
						__('You can now reset and clean your Widget Settings too. Read more in the Changelog to see whats new too.', gxtb_fb_lB_lang)
						
						);
						$text .= "<br /><br />";
					 break;
					 
					 case ($key == "Update" && $GBLikeButton['PluginSetting']['Message']['Update'] > 0 && version_compare( gxtb_fb_lB_version, '4.4.3', '<=') ):
					 	$text .= sprintf( "<strong>%s:</strong> %s - <b>%s:</b> %s",
						
						__('Update', gxtb_fb_lB_lang),
						__('After this Update/Reactivation <b>please check all your FB-Like Settings</b> if they are all the same! Because since [v4.3] there are many new things in the Backend. Thanks. Because there is a new function which copies all the old options into a new one but there is a chance that there is a problem after updating the Plugin. Please check all the options! <b>Instant Help: Run the GBCleaner on the Settings Page (in the menu on the left) to prevent bugs.</b>', gxtb_fb_lB_lang),
						__('Especially', gxtb_fb_lB_lang),
						__('Dynamic Button Setting, Meta-Tags and Design-Options. And do also update your header.php-file if you use XFBML (see more information below the XFBML-Checkbox).', gxtb_fb_lB_lang)
						
						);
						$text .= "<br /><br />";
					 break;
					 
					 case ($key == "Installation" && gxtb_fb_lB_version == $GBLikeButton['PluginInfo']['lVersion'] && $GBLikeButton['PluginSetting']['Message']['Installation'] > 0):
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
					 
					 case ($key == "Help" && $GBLikeButton['PluginSetting']['Message']['Help'] > 0):
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
					 
					 case ($key == "Support" && $GBLikeButton['PluginSetting']['Message']['Support'] > 0):
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
} // end if text
} // end function

} // end class
} // end if-class

if(!class_exists('GBWarningSys')) {
class GBWarningSys {
	
	#var $GBLikeButton;
	var $warningtext;
	var $likevisible;
	var $butposition;
	
function GBWarningSys() {
	$this -> warningtext = array();
	unset($this->warningtext);
	$this->likevisible = false;
	$this->butposition = false;
	$this -> GBWarningSysCheck();
} // end konstruktor

/* 
	the SysCheck checks all the available options if there are some things not set correctly. 
	if there is a Warning the Warning-Option [Message][Warning] must be 1 or more. If this option
	is 0 then there is everything correct. The messages were generated here and are not saved in any
	option because this is redundand.
*/
function GBWarningSysCheck() {
	
	#$GBLikeButton = get_option('GBLikeButton');
	$GBLikeButton = get_option('GBLikeButton');

if ($GBLikeButton['PluginSetting']['Message']['Warning'] == 1) {
	
	if ($GBLikeButton['General']['on'] == 1) {
		
		/* OFFEN
		# Anzeige des FB-Buttons kontrollieren
		$this->likevisible = false;
		
		$this->likevisible = ($this->likevisible == false && $GBLikeButton['General']['frontpage'] == 1 ) ? true:false;
		$this->likevisible = ($this->likevisible == false && $GBLikeButton['General']['page'] == 1 ) ? true:false;
		$this->likevisible = ($this->likevisible == false && $GBLikeButton['General']['post'] == 1 ) ? true:false;
		$this->likevisible = ($this->likevisible == false && $GBLikeButton['General']['category'] == 1 ) ? true:false;
		$this->likevisible = ($this->likevisible == false && $GBLikeButton['General']['archiv'] == 1 ) ? true:false;
		
		if($this->likevisible == false) {
			$this -> warningtext[__('Button Appearance', gxtb_fb_lB_lang )] = array( __('You must choose either frontpage, page, post, category or archive if you activate the plugin. Otherwise the Like-Button will not be displayed!', gxtb_fb_lB_lang ) => array("General" => "fb-like-button#tabs-2") );
		}
		
		# Überprüfen ob eine Position ausgewählt worden ist #	
		#$butposition = ($butposition == false && $GBLikeButton['General']['position_before'] == 1 ) ? true:false;
		#$butposition = ($butposition == false && $GBLikeButton['General']['position_after'] == 1 ) ? true:false;
		
		if($this->butposition == false) {
			$this -> warningtext[__('Button Position', gxtb_fb_lB_lang )] = array( __('You must either choose if the Button appears <i>before</i> or <i>after</i> the content!', gxtb_fb_lB_lang ) => array("General" => "fb-like-button#tabs-2") );
		} */
				
		# Überprüft die Eingabe des Generators (http usw) #
		if($GBLikeButton['Generator']['url'] == "" || !strstr($GBLikeButton['Generator']['url'], "http://") ) {
			$this -> warningtext[__('Like-Button-Generator', gxtb_fb_lB_lang )] = array( __('You must enter a valid URL for your like-Button! Either your URL-Box is empty or you forget to enter http://', gxtb_fb_lB_lang ) => array("General" => "fb-like-button#tabs-5") );
		}
		
		# Meta-Tags überprüfen (speziell AdminID usw) #!is_numeric($gxtb_fb_lB_meta['admins']) && !empty($gxtb_fb_lB_meta['admins'])
		if( empty($GBLikeButton['OpenGraph']['admins']) || $GBLikeButton['OpenGraph']['admins'] == "" ) {
			$this -> warningtext[__('AdminID', gxtb_fb_lB_lang )] = array( __('You did not enter a valid Admin-ID. Please visit <a href="http://apps.facebook.com/whatismyid/" target="_blank">this site</a> to get your Facebook-ID (which is used as Admin-ID).', gxtb_fb_lB_lang ) => array("OpenGraph" => "fb-like-opengraph#tabs-10") );
		}
		
		if( ( empty($GBLikeButton['OpenGraph']['app_id']) || $GBLikeButton['OpenGraph']['app_id'] == "" ) && $GBLikeButton['General']['jdk'] == 1 ) {
			$this -> warningtext[__('AppID', gxtb_fb_lB_lang )] = array( __('You have to enter a valid AppID if you use XFBML. Please visit <a href="http://developers.facebook.com/setup/" target="_blank">this site</a> to get your App-ID.', gxtb_fb_lB_lang ) => array("OpenGraph" => "fb-like-opengraph#tabs-10") );
		}
				
		# Alle Blog-Specific Tags müssen ausgefüllt sein #
		if($GBLikeButton['OpenGraph']['site_name'] == "" || $GBLikeButton['OpenGraph']['title'] == "" || $GBLikeButton['OpenGraph']['url'] == "" || ( isset($GBLikeButton['OpenGraph']['dusage']) && $GBLikeButton['OpenGraph']['dusage'] == "blogn" && isset($GBLikeButton['OpenGraph']['description']) && $GBLikeButton['OpenGraph']['description'] == "") || $GBLikeButton['OpenGraph']['image'] == "") {
			$this -> warningtext[__('Blog Tags', gxtb_fb_lB_lang )] = array( __('Please set all the required Tags like the Examples show on the Tags-Page.', gxtb_fb_lB_lang ) => array("OpenGraph" => "fb-like-opengraph#tabs-11") );
		}		
					
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