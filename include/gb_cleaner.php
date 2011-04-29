<?php // Do not delete these lines
	if (!empty($_SERVER['SCRIPT_FILENAME']) && basename(__file__) == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');
?>
<?php
/*
+----------------------------------------------------------------+
+	Like-Button-Plugin-For-Wordpress [v4.3.3] - GB-Cleaner [v1.1.4.1 FINAL]
+	by Stefan Natter (http://www.gb-world.net)
+   required for Like-Button-Plugin-For-Wordpress and WordPress 2.7.x or higher
+----------------------------------------------------------------+
*/
####################################################
####################################################
###########								 ###########
###########								 ###########
###########	       CLEANER-CLASS		 ###########
###########								 ###########
###########								 ###########
####################################################
####################### by gb-world.net ############
####################################################
if (!class_exists('gxtb_fb_lB_Cleaner')) {
class gxtb_fb_lB_Cleaner {
	
	var $GBLikeButton;
	
function gxtb_fb_lB_Cleaner() { $this->GBLikeButton = get_option('GBLikeButton');} // end konstruktor
function RunGBCleaner() {

	$this->GBLikeButton = get_option('GBLikeButton');
	
	if ( ( version_compare($GBLikeButton['PluginInfo']['lVersion'], '4.4.3.1', '<=') || $GBLikeButton['PluginInfo']['lVersion'] == "" ) &&  $this->GBLikeButton['PluginSetting']['GBCleaner'] == 0 ){
		
		$this->RunGBChanger44();
	}

} // end function
function RunGBChanger44() {
	
	$this->GBLikeButton = get_option('GBLikeButton');
		
try
{
  if ( ((get_option('gxtb_fb_lB_settings') && get_option('gxtb_fb_lB_design') && get_option('gxtb_fb_lB_analytics') && get_option('gxtb_fb_lB_generator') || get_option('gxtb_fb_lB_meta')) || get_option('gxtb_fb_lB')) && $this->GBLikeButton['PluginSetting']['GBCleaner'] == 0)
  {
	  $gxtb_fb_lB_settings = get_option('gxtb_fb_lB_settings');
	  $gxtb_fb_lB_design = get_option('gxtb_fb_lB_design');
	  $gxtb_fb_lB_analytics = get_option('gxtb_fb_lB_analytics');
	  $gxtb_fb_lB_generator = get_option('gxtb_fb_lB_generator');
	  $gxtb_fb_lB_meta = get_option('gxtb_fb_lB_meta');
	  $gxtb_fb_lB = get_option('gxtb_fb_lB');
		
	$this->GBLikeButton = array (
			'PluginSetting' => array ( 
                'Userlevel' => $this->GBLikeButton['PluginSetting']['Userlevel'],
				'GBCleaner' => 1,
				'GBWidgetCleaner' => 0, ## deaktiviert den GB-Cleaner am Anfang by default (0 nie gelaufen | 1 bereits ausgeführt )	
                'jQuery' => $this->GBLikeButton['PluginSetting']['jQuery'],
                'Message' => array ( 
					'Update' => $this->GBLikeButton['PluginSetting']['Message']['Update'],
					'Installation' => $this->GBLikeButton['PluginSetting']['Message']['Installation'],
					'Help' => $this->GBLikeButton['PluginSetting']['Message']['Help'],
					'Support' => $this->GBLikeButton['PluginSetting']['Message']['Support'],
					'Warning' => $this->GBLikeButton['PluginSetting']['Message']['Warning']
				 ),
                'Bugreport' => $this->GBLikeButton['PluginSetting']['Bugreport']
			),
            'EditorSetting' => array (
				'PostButton' => $this->GBLikeButton['EditorSetting']['PostButton'],
				 'IndividualPost' => $this->GBLikeButton['EditorSetting']['IndividualPost'] 
			),
			'PluginInfo' => array (
				'cVersion' => gxtb_fb_lB_version,
				'lVersion' => gxtb_fb_lB_version
			),
			'General' => array (
				'on' => (isset($gxtb_fb_lB_settings['activate']) && $gxtb_fb_lB_settings['activate']==true) ? '1':'0',
				'addfooter_activate' => (isset($gxtb_fb_lB_settings['addfooter_activate']) && $gxtb_fb_lB_settings['addfooter_activate']==true) ? '1':'0',
				'addfooter' => (isset($gxtb_fb_lB_settings['addfooter']) && $gxtb_fb_lB_settings['addfooter']==true) ? '1':'0',
				'position_before' => (isset($gxtb_fb_lB_settings['position_before']) && $gxtb_fb_lB_settings['position_before']==true) ? '1':'0',
				'position_after' => (isset($gxtb_fb_lB_settings['position_after']) && $gxtb_fb_lB_settings['position_after']==true) ? '1':'0',
				'frontpage' =>(isset($gxtb_fb_lB_settings['frontpage']) && $gxtb_fb_lB_settings['frontpage']==true) ? '1':'0',
				'page' => (isset($gxtb_fb_lB_settings['page']) && $gxtb_fb_lB_settings['page']==true) ? '1':'0',
				'page_exclude' => (isset($gxtb_fb_lB_settings['page_exclude'])) ? $gxtb_fb_lB_settings['page_exclude']:'',
				'post' => (isset($gxtb_fb_lB_settings['post']) && $gxtb_fb_lB_settings['post']==true) ? '1':'0',
				'post_exclude' => (isset($gxtb_fb_lB_settings['page_exclude'])) ? $gxtb_fb_lB_settings['page_exclude']:'',
				'category' => (isset($gxtb_fb_lB_settings['category']) && $gxtb_fb_lB_settings['category']==true) ? '1':'0',
				'category_exclude' => (isset($gxtb_fb_lB_settings['category_exclude'])) ? $gxtb_fb_lB_settings['category_exclude']:'',
				'archiv' => (isset($gxtb_fb_lB_settings['archiv']) && $gxtb_fb_lB_settings['archiv']==true) ? '1':'0',
				'archiv_exclude' => (isset($gxtb_fb_lB_settings['archiv_exclude'])) ? $gxtb_fb_lB_settings['archiv_exclude']:'',
				'jdk' => (isset($gxtb_fb_lB_settings['JDK']) && $gxtb_fb_lB_settings['JDK']==true) ? '1':'0',
				'language' => (isset($gxtb_fb_lB_settings['language'])) ? $gxtb_fb_lB_settings['language']:'en_US',
				'dynamic' => (isset($gxtb_fb_lB_settings['dynamic']) && $gxtb_fb_lB_settings['dynamic']==true) ? '1':'0',
				'shortcode' => (isset($gxtb_fb_lB_settings['shortcode']) && $gxtb_fb_lB_settings['shortcode']==true) ? '1':'0'
			),
			'Design' => array (
				'css' => (isset($gxtb_fb_lB_design['css'])) ? $gxtb_fb_lB_design['css']:'',
				'cssbox' => (isset($gxtb_fb_lB_design['cssbox'])) ? $gxtb_fb_lB_design['cssbox']:'',
				'br_before' => (isset($gxtb_fb_lB_design['br_before'])) ? $gxtb_fb_lB_design['br_before']:'0',
				'br_after' => (isset($gxtb_fb_lB_design['br_after'])) ? $gxtb_fb_lB_design['br_after']:'0'
			),
			'FBInsights' => array (
				'on' => (isset($gxtb_fb_lB_analytics['on']) && $gxtb_fb_lB_analytics['on']==true) ? '1':'0',
				'frontpage' => (isset($gxtb_fb_lB_analytics['frontpage'])) ? $gxtb_fb_lB_analytics['frontpage']:'',
				'frontpage_activ' => (isset($gxtb_fb_lB_analytics['frontpage_activ']) && $gxtb_fb_lB_analytics['frontpage_activ']==true) ? '1':'0',
				'category' => (isset($gxtb_fb_lB_analytics['category'])) ? $gxtb_fb_lB_analytics['category']:'',
				'category_activ' => (isset($gxtb_fb_lB_analytics['category_activ']) && $gxtb_fb_lB_analytics['category_activ']==true) ? '1':'0',
				'page' => (isset($gxtb_fb_lB_analytics['page'])) ? $gxtb_fb_lB_analytics['page']:'',
				'page_activ' => (isset($gxtb_fb_lB_analytics['page_activ']) && $gxtb_fb_lB_analytics['page_activ']==true) ? '1':'0',
				'post' => (isset($gxtb_fb_lB_analytics['post'])) ? $gxtb_fb_lB_analytics['post']:'',
				'post_activ' => (isset($gxtb_fb_lB_analytics['post_activ']) && $gxtb_fb_lB_analytics['post_activ']==true) ? '1':'0',
				'archiv' => (isset($gxtb_fb_lB_analytics['archiv'])) ? $gxtb_fb_lB_analytics['archiv']:'',
				'archiv_activ' => (isset($gxtb_fb_lB_analytics['archiv_activ']) && $gxtb_fb_lB_analytics['archiv_activ']==true) ? '1':'0'
			),
			'Generator' => array (
				'url' => get_home_url(),
				'layout' => (isset($gxtb_fb_lB_generator['layout'])) ? $gxtb_fb_lB_generator['layout']:'standard',
				'faces' => (isset($gxtb_fb_lB_generator['faces']) && $gxtb_fb_lB_generator['faces']==true) ? '1':'0',
				'width' => (isset($gxtb_fb_lB_generator['width'])) ? $gxtb_fb_lB_generator['width']:'250',
				'height' => (isset($gxtb_fb_lB_generator['height'])) ? $gxtb_fb_lB_generator['height']:'100',
				'verb' => (isset($gxtb_fb_lB_generator['verb'])) ? $gxtb_fb_lB_generator['verb']:'like',
				'color' => (isset($gxtb_fb_lB_generator['color'])) ? $gxtb_fb_lB_generator['color']:'light',
				'font' => (isset($gxtb_fb_lB_generator['font'])) ? $gxtb_fb_lB_generator['font']:'arial',
				'scrolling' => (isset($gxtb_fb_lB_generator['scrolling']) && $gxtb_fb_lB_generator['scrolling']==true) ? '1':'0',
				'frameborder' => (isset($gxtb_fb_lB_generator['frameborder'])) ? $gxtb_fb_lB_generator['frameborder']:'0',
				'borderstyle' => (isset($gxtb_fb_lB_generator['borderstyle'])) ? $gxtb_fb_lB_generator['borderstyle']:'none',
				'overflow' => (isset($gxtb_fb_lB_generator['overflow'])) ? $gxtb_fb_lB_generator['overflow']:'hidden',
				'trans' => (isset($gxtb_fb_lB_generator['trans']) && $gxtb_fb_lB_generator['trans']==true) ? '1':'0',
				'send' => 0
			),
			'OpenGraph' => array (
				'on' => 1, # gab es in den alten Optionen noch gar nicht #
				'w3c' => 0,
				'site_name' => (isset($gxtb_fb_lB_meta['site_name'])) ? $gxtb_fb_lB_meta['site_name']:"&#036;binfo",
				'blogtype' => (isset($gxtb_fb_lB_meta['blogtype'])) ? $gxtb_fb_lB_meta['blogtype']:"blog",
				'pagetype' => (isset($gxtb_fb_lB_meta['blogtype'])) ? $gxtb_fb_lB_meta['blogtype']:"blog",
				'posttype' => (isset($gxtb_fb_lB_meta['blogtype'])) ? $gxtb_fb_lB_meta['blogtype']:"article",
				'categorytype' => "blog",
				'archivetype' => "blog",
				'admins' => (isset($gxtb_fb_lB_meta['admins'])) ? $gxtb_fb_lB_meta['admins']:"",
				'app_id' => (isset($gxtb_fb_lB_meta['app_id'])) ? $gxtb_fb_lB_meta['app_id']:"",
				'page_id' => (isset($gxtb_fb_lB_meta['page_id'])) ? $gxtb_fb_lB_meta['page_id']:"",
				'title' => (isset($gxtb_fb_lB_meta['title'])) ? $gxtb_fb_lB_meta['title']:"&#036;ptitle",
				'url' => (isset($gxtb_fb_lB_meta['url'])) ? $gxtb_fb_lB_meta['url']:"&#036;plink",
				'description' => (isset($gxtb_fb_lB_meta['description'])) ? $gxtb_fb_lB_meta['description']:"",
				'dusage' => (isset($gxtb_fb_lB_meta['dusage'])) ? $gxtb_fb_lB_meta['dusage']:"blogd",
				'image' => (isset($gxtb_fb_lB_meta['image'])) ? $gxtb_fb_lB_meta['image']:"",
				'frontpage_default' => 0,
				'page_default' => 0,
				'post_default' => 0,
				'category_default' => 0,
				'archive_default' => 0,
				'plz' => (isset($gxtb_fb_lB_meta['plz'])) ? $gxtb_fb_lB_meta['plz']:"",
				'mail' => (isset($gxtb_fb_lB_meta['mail'])) ? $gxtb_fb_lB_meta['mail']:"",
				'street' => (isset($gxtb_fb_lB_meta['street'])) ? $gxtb_fb_lB_meta['street']:"",
				'phone' => (isset($gxtb_fb_lB_meta['phone'])) ? $gxtb_fb_lB_meta['phone']:"",
				'locality' => (isset($gxtb_fb_lB_meta['locality'])) ? $gxtb_fb_lB_meta['locality']:"",
				'fax' => (isset($gxtb_fb_lB_meta['fax'])) ? $gxtb_fb_lB_meta['fax']:"",
				'region' => (isset($gxtb_fb_lB_meta['region'])) ? $gxtb_fb_lB_meta['region']:"",
				'country' => (isset($gxtb_fb_lB_meta['country'])) ? $gxtb_fb_lB_meta['country']:"",
				'latitude' => (isset($gxtb_fb_lB_meta['latitude'])) ? $gxtb_fb_lB_meta['latitude']:"",
				'longitude' => (isset($gxtb_fb_lB_meta['longitude'])) ? $gxtb_fb_lB_meta['longitude']:""
			),
			'Expert' => array( ## wird hier, in der extend-datei sowie output verwendet #
				'besidebutton' => "",
				'besideposition' => "right"
			)
			);
			
	/* alle Alten Optionen löschen - Beta-Phase nocht nicht abgeschlossen */
	#delete_option('gxtb_fb_lB_settings');
	#delete_option('gxtb_fb_lB_design');
	#delete_option('gxtb_fb_lB_analytics');
	#delete_option('gxtb_fb_lB_generator');
	#delete_option('gxtb_fb_lB_meta');
	#delete_option('gxtb_fb_lB');
	
	update_option('GBLikeButton',$this->GBLikeButton); 
?>
  <div id="message" class="updated fade"><p><strong><?php echo sprintf( "%s '%s' [v%s] %s!", __('Successfully cleaned all the', gxtb_fb_lB_lang), gxtb_fb_lB_name,  gxtb_fb_lB_version, __('Settings', gxtb_fb_lB_lang)); ?></strong></p></div>
<?php  
  } else {
	  global $wp_version;
	  $this->GBLikeButton = array (
			'PluginSetting' => array ( 
                'Userlevel' => 'administrator', # min. Userlevel für alle Like-Seiten
				'GBCleaner' => 0, ## deaktiviert den GB-Cleaner am Anfang by default (0 nie gelaufen | 1 bereits ausgeführt )
				'GBWidgetCleaner' => 0, ## deaktiviert den GB-Cleaner am Anfang by default (0 nie gelaufen | 1 bereits ausgeführt )	
                'jQuery' => 0, ## aktivieren/deaktivieren der Google-jQuery-Library (0 - WP | 1 - Google)
                'Message' => array ( 
					'Update' => 0, ## Update-Messages: Update-Messages für Hinweise nach dem Update (x Anzahl für Anzeige - Default: 0)
					'Installation' => 2, ## Installation-Messages (x Anzahl für Anzeige - Default: 2)
					'Help' => 3, ## Help-Messages (x Anzahl für Anzeige - Default: 2)
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
				'width' => "250",
				'height' => "100",
				'verb' => "like",
				'color' => "light",
				'font' => "arial",
				'scrolling' => 0,
				'frameborder' => "0",
				'borderstyle' => "none",
				'overflow' => "hidden",
				'trans' => 1,
				'send' => 0
			),
			'OpenGraph' => array (
				'on' => 1,
				'w3c' => 0,
				'site_name' => "&#036;binfo",
				'blogtype' => "blog",
				'pagetype' => "blog",
				'posttype' => "article",
				'categorytype' => "blog",
				'archivetype' => "blog",
				'admins' => "",
				'app_id' => "",
				'page_id' => "",
				'title' => "&#036;ptitle",
				'url' => "&#036;plink",
				'description' => "",
				'dusage' => "blogd",
				'image' => "",
				'frontpage_default' => 0,
				'page_default' => 0,
				'post_default' => 0,
				'category_default' => 0,
				'archive_default' => 0,
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
			'Expert' => array( ## wird hier, in der extend-datei sowie output verwendet #
				'besidebutton' => "",
				'besideposition' => "right"
			));
	  
	  update_option('GBLikeButton',$this->GBLikeButton);
    #throw new Exception('You already cleaned all the old');
  }
}
catch (Exception $e)
{?>  
  <div id="message" class="updated fade"><p><strong><?php echo sprintf( "%s '%s' [v%s] %s!", __($e->getMessage(), gxtb_fb_lB_lang), gxtb_fb_lB_name,  gxtb_fb_lB_version, __('Settings', gxtb_fb_lB_lang)); ?></strong></p></div>
<?php }
} // end function

function GBRestore() {
	global $wp_version;
	$GBLikeButton = array (
			'PluginSetting' => array ( 
                'Userlevel' => 'administrator', # min. Userlevel für alle Like-Seiten
				'GBCleaner' => 0, ## deaktiviert den GB-Cleaner am Anfang by default (0 deaktiviert | 1 aktiviert)
				'GBWidgetCleaner' => 0, ## deaktiviert den GB-Cleaner am Anfang by default (0 nie gelaufen | 1 bereits ausgeführt )	
                'jQuery' => 0, ## aktivieren/deaktivieren der Google-jQuery-Library (0 - WP | 1 - Google)
                'Message' => array ( 
					'Update' => 0, ## Update-Messages: Update-Messages für Hinweise nach dem Update (x Anzahl für Anzeige - Default: 0)
					'Installation' => 2, ## Installation-Messages (x Anzahl für Anzeige - Default: 2)
					'Help' => 3, ## Help-Messages (x Anzahl für Anzeige - Default: 2)
					'Support' => 4, ## Support-Message for all the Hardwork I did (x Anzahl der Anzeige - Default:4 )
					'Warning' => 1 ## Warning-Sys (0 - Warnungen aus | 1 - Warnungen an)
				 ),
                'Bugreport' => 0 ## Bugreport: noch offen - wird für die Expertmod verwendet (Textbox mit allen Variablen usw)
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
				'url' => (version_compare( $wp_version, '3.0', '>=' )) ? get_home_url() : get_bloginfo('siteurl'),
				'layout' => "standard",
				'faces' => 0,
				'width' => "250",
				'height' => "100",
				'verb' => "like",
				'color' => "light",
				'font' => "arial",
				'scrolling' => 0,
				'frameborder' => "0",
				'borderstyle' => "none",
				'overflow' => "hidden",
				'trans' => 1,
				'send' => 0
			),
			'OpenGraph' => array (
				'on' => 1,
				'w3c' => 0,
				'site_name' => "&#036;binfo",
				'blogtype' => "blog",
				'pagetype' => "blog",
				'posttype' => "article",
				'categorytype' => "blog",
				'archivetype' => "blog",
				'admins' => "",
				'app_id' => "",
				'page_id' => "",
				'title' => "&#036;ptitle",
				'url' => "&#036;plink",
				'description' => "",
				'dusage' => "blogd",
				'image' => "",
				'frontpage_default' => 0,
				'page_default' => 0,
				'post_default' => 0,
				'category_default' => 0,
				'archive_default' => 0,
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
			'Expert' => array( ## wird hier, in der extend-datei sowie output verwendet #
				'besidebutton' => "",
				'besideposition' => "right"
			));
			
	update_option('GBLikeButton',$GBLikeButton);
	
} // end function
} // end class
} // end if-class

####################################################
####################################################
###########								 ###########
###########								 ###########
###########	   WIDGET-CLEANER-CLASS		 ###########
###########								 ###########
###########								 ###########
####################################################
####################### by gb-world.net ############
####################################################
if (!class_exists('GBLikeButtonWidgetCleaner')) {
class GBLikeButtonWidgetCleaner {
	
	var $GBLikeButtonWidget;
	
function GBLikeButtonWidgetCleaner() { if(get_option('GBLikeButtonWidget')) { $this->GBLikeButtonWidget = get_option('GBLikeButtonWidget'); } } // end konstruktor
function WidgetCleaner() {
	
if( get_option('gxtb_fb_lB_data') ) {
	
	$gxtb_fb_lB_data = get_option('gxtb_fb_lB_data');
	global $wp_version;
	$this->GBLikeButtonWidget = array ( # alle Optionen auf 0 setzten falls es zu Fehlern kam #
				'LikeButton' => array ( 
					'title' => (isset($gxtb_fb_lB_data['title'])) ? $gxtb_fb_lB_data['title']:'',
					'url' => (isset($gxtb_fb_lB_data['url'])) ? $gxtb_fb_lB_data['url']:(version_compare( $wp_version, '3.0', '>=' )) ? get_home_url() : get_bloginfo('siteurl'),
					'dynamic' => (isset($gxtb_fb_lB_data['dynamic'])) ? $gxtb_fb_lB_data['dynamic']:1,
					'layout' => (isset($gxtb_fb_lB_data['layout'])) ? $gxtb_fb_lB_data['layout']:'standard',
					'faces' => (isset($gxtb_fb_lB_data['faces'])) ? $gxtb_fb_lB_data['faces']:1,
					'width' => (isset($gxtb_fb_lB_data['width'])) ? $gxtb_fb_lB_data['width']:'',
					'height' => (isset($gxtb_fb_lB_data['height'])) ? $gxtb_fb_lB_data['height']:'',
					'verb' => (isset($gxtb_fb_lB_data['verb'])) ? $gxtb_fb_lB_data['verb']:'like',
					'color' => (isset($gxtb_fb_lB_data['color'])) ? $gxtb_fb_lB_data['color']:'',
					'font' => (isset($gxtb_fb_lB_data['font'])) ? $gxtb_fb_lB_data['font']:'',
					'scrolling' => (isset($gxtb_fb_lB_data['scrolling'])) ? $gxtb_fb_lB_data['scrolling']:0,
					'frameborder' => (isset($gxtb_fb_lB_data['frameborder'])) ? $gxtb_fb_lB_data['frameborder']:'',
					'borderstyle' => (isset($gxtb_fb_lB_data['borderstyle'])) ? $gxtb_fb_lB_data['borderstyle']:'',
					'overflow' => (isset($gxtb_fb_lB_data['overflow'])) ? $gxtb_fb_lB_data['overflow']:'hidden',
					'trans' => (isset($gxtb_fb_lB_data['trans'])) ? $gxtb_fb_lB_data['trans']:1,
					'css' => (isset($gxtb_fb_lB_data['css'])) ? $gxtb_fb_lB_data['css']:'',
					'ref' => (isset($gxtb_fb_lB_data['ref'])) ? $gxtb_fb_lB_data['ref']:''
				),
				'Recommendation' => array ( 
					'title' => (isset($gxtb_fb_lB_data['rec_title'])) ? $gxtb_fb_lB_data['rec_title']:'',
					'site' => (isset($gxtb_fb_lB_data['rec_domain'])) ? $gxtb_fb_lB_data['rec_domain']:(version_compare( $wp_version, '3.0', '>=' )) ? get_home_url() : get_bloginfo('siteurl'),
					'header' => (isset($gxtb_fb_lB_data['rec_header'])) ? $gxtb_fb_lB_data['rec_header']:1,
					'width' => (isset($gxtb_fb_lB_data['rec_width'])) ? $gxtb_fb_lB_data['rec_width']:'',
					'height' => (isset($gxtb_fb_lB_data['rec_height'])) ? $gxtb_fb_lB_data['rec_height']:'',
					'colorscheme' => (isset($gxtb_fb_lB_data['rec_color'])) ? $gxtb_fb_lB_data['rec_color']:'light',
					'font' => (isset($gxtb_fb_lB_data['rec_font'])) ? $gxtb_fb_lB_data['rec_font']:'',
					'border_style' => (isset($gxtb_fb_lB_data['rec_border'])) ? $gxtb_fb_lB_data['rec_border']:'',
					'border_color' => '',
					'scrolling' => 0,
					'frameborder' => '',
					'overflow' => 'hidden',
					'trans' => '',
					'css' => (isset($gxtb_fb_lB_data['rec_css'])) ? $gxtb_fb_lB_data['rec_css']:'',
					'ref' => ''
				),
				'ActivityFeed' => array (
					'title' => '',
					'site' => (version_compare( $wp_version, '3.0', '>=' )) ? get_home_url() : get_bloginfo('siteurl'),
					'width' => '',
					'height' => '',
					'header' => 0,
					'colorscheme' => 'light',
					'font' => '',
					'border_style' => '',
					'border_color' => '',
					'scrolling' => 0,
					'frameborder' => '',
					'overflow' => 'hidden',
					'trans' => 0,
					'recommendations' => 0,
					'filter' => '',
					'css' => '',
					'ref' => ''
				)
			);
	update_option('GBLikeButtonWidget', $this->GBLikeButtonWidget);
	delete_option('gxtb_fb_lB_data');	
?>
  <div id="message" class="updated fade"><p><strong><?php echo sprintf( "%s '%s' [v%s] %s!", __('Successfully cleaned all the', gxtb_fb_lB_lang), gxtb_fb_lB_name,  gxtb_fb_lB_version, __('Widget-Settings', gxtb_fb_lB_lang)); ?></strong></p></div>
<?php	
} // end if
} // end function
function WidgetResetAndAdd() {

	$GBLikeButton = get_option('GBLikeButton');
	
	if ( get_option('gxtb_fb_lB_data') && ($GBLikeButton['PluginSetting']['GBWidgetCleaner'] == 0 || !isset($GBLikeButton['PluginSetting']['GBWidgetCleaner'])) ) { ## Übernahme aller alten Werte #
		$this->GBLikeButtonWidget = get_option('GBLikeButtonWidget');
		$this->WidgetCleaner();
		# GBWidgetCleaner auf 1 setzten (das er bereits ausgeführt worden ist #
		$GBLikeButton['PluginSetting']['GBWidgetCleaner'] = 1;
		update_option('GBLikeButton',$GBLikeButton);
		
	} elseif (!get_option('GBLikeButtonWidget')) {
		
		global $wp_version;
		$this->GBLikeButtonWidget = array ( # alle Optionen auf 0 setzten falls es zu Fehlern kam #
				'LikeButton' => array ( 
					'title' => '',
					'url' => (version_compare( $wp_version, '3.0', '>=' )) ? get_home_url() : get_bloginfo('siteurl'),
					'dynamic' => 1,
					'layout' => 'standard',
					'faces' => 1,
					'width' => '',
					'height' => '',
					'verb' => 'like',
					'color' => 'light',
					'font' => '',
					'scrolling' => 0,
					'frameborder' => '',
					'borderstyle' => '',
					'overflow' => 'hidden',
					'trans' => 1,
					'css' => '',
					'ref' => ''
				),
				'Recommendation' => array ( 
					'title' => '',
					'site' => (version_compare( $wp_version, '3.0', '>=' )) ? get_home_url() : get_bloginfo('siteurl'),
					'header' => 1,
					'width' => '',
					'height' => '',
					'colorscheme' => 'light',
					'font' => '',
					'border_style' => '',
					'border_color' => '',
					'scrolling' => 0,
					'frameborder' => '',
					'overflow' => 'hidden',
					'trans' => 0,
					'css' => '',
					'ref' => ''
				),
				'ActivityFeed' => array (
					'title' => '',
					'site' => (version_compare( $wp_version, '3.0', '>=' )) ? get_home_url() : get_bloginfo('siteurl'),
					'width' => '',
					'height' => '',
					'header' => 0,
					'colorscheme' => 'light',
					'font' => '',
					'border_style' => '',
					'border_color' => '',
					'scrolling' => 0,
					'frameborder' => '',
					'overflow' => 'hidden',
					'trans' => 0,
					'recommendations' => 0,
					'filter' => '',
					'css' => '',
					'ref' => ''
				)
			);
		add_option('GBLikeButtonWidget', $this->GBLikeButtonWidget);
	}
	
} // end function
function WidgetReset() {
	/* $this->GBLikeButtonWidget = get_option('GBLikeButtonWidget');
	
	foreach ($this->GBLikeButtonWidget as $key => $value) { 
	   	foreach ($this->GBLikeButtonWidget[$key] as $key1 => $value1) {
			$this->GBLikeButtonWidget[$key][$key1] = "";
		}
	}
	update_option('GBLikeButtonWidget', $this->GBLikeButtonWidget); */
	delete_option('GBLikeButtonWidget');
	$this->WidgetResetAndAdd();
?>
  <div id="message" class="updated fade"><p><strong><?php echo sprintf( "%s '%s' [v%s] %s!", __('Successfully reset all the', gxtb_fb_lB_lang), gxtb_fb_lB_name,  gxtb_fb_lB_version, __('Widget-Settings', gxtb_fb_lB_lang)); ?></strong></p></div>
<?php	
} // end function
} // end class
} // end if-class
?>