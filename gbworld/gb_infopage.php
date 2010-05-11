<?php // Do not delete these lines
	if (!empty($_SERVER['SCRIPT_FILENAME']) && basename(__file__) == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');
?>
<?php
/*
+----------------------------------------------------------------+
+	gb-INFOPAGE [v1.0]
+	by Stefan Natter (http://www.gangxtaboii.com and http://www.gb-world.net)
+   required for GB-World-Wordpress-Plugins 2.7.x or higher
+----------------------------------------------------------------+
*/

####################################################
####################################################
###########								 ###########
###########								 ###########
###########	       gb-INFOPAGE			 ###########
###########								 ###########
###########								 ###########
####################################################
##################### by ganxtaboii.com ############
####################################################

class gxtb_infoPageClass {

########################################################################################################
											## CONSTRUCTOR  ##
// Newsbox-Array
var $gxtb_infoPageClassArray;
// Newsbox-Array

function gxtb_infoPageClass($gxtb_InfoPageArray) {

	global $gxtb_infoPageClassArray;

	add_action('admin_menu', array(&$this, 'on_admin_menu'));

	$optionpagename[0] = 'gb-world';
	$optionpagename[1] = 'gb-news';
	
	if ($_GET['page'] == $optionpagename[0] || $_GET['page'] == $optionpagename[1]) { $ismypluginoptionpage = 'true'; } else { $ismypluginoptionpage = 'false'; }
		 
	if ( $ismypluginoptionpage == 'true' )
		add_action('admin_head', array(&$this, 'gxtb_world_header'));

	foreach($gxtb_InfoPageArray as $key => $value) { 
		$this -> gxtb_infoPageClassArray[$key] = $value;
	}
	
}

function gxtb_world_header() {

$gxtb_info_path = WP_PLUGIN_URL.'/'.str_replace(basename( __FILE__),"",plugin_basename(__FILE__));
echo '<link rel="stylesheet" href="'. $gxtb_info_path . 'gbworld.css" type="text/css" media="screen" />';

if ($_GET['page'] == 'gb-world') { echo '<script type="text/javascript" src="'. $gxtb_info_path . 'gbworld.js"></script>'; } 

}

function on_admin_menu() {

$gxtb_info_path = WP_PLUGIN_URL.'/'.str_replace(basename( __FILE__),"",plugin_basename(__FILE__));

	## ADD gxtb-Infopage v0.5##
	$this->pagehook = add_menu_page('GB-World', "GB-World", 0, 'gb-world', array(&$this, 'gxtb_info'), $gxtb_info_path .'images/admin.png');
	//$this->pagehook = add_submenu_page("gb-world", 'GB-News', 'GB-News', 0, 'gb-news', array(&$this, 'gxtb_news'));
	## ADD gxtb-Infopage v0.5##
	
}

########################################################################################################
											## gxtb-WORLD INFOPAGE 0.5 ##


function gxtb_info() {

  	add_meta_box('gxtb_world_like_box', 'GB-World on Facebook', array(&$this, 'gxtb_initialize_fb_box'), $this->pagehook, 'like', 'core');
  	add_meta_box('gxtb_world_feed_news', 'GB-World-Wordpress-News', array(&$this, 'gxtb_initialize_feed_news'), $this->pagehook, 'feed_news', 'core');
  	add_meta_box('gxtb_world_feed_wp', 'GB-World.net', array(&$this, 'gxtb_initialize_feed_wp'), $this->pagehook, 'feed_wp', 'core');	
	add_meta_box('gxtb_world_paypalbox', 'GB-World', array(&$this, 'gxtb_initialize_infobox'), $this->pagehook, 'additional', 'core');
	
	// currently everything is on one page
	add_meta_box('gxtb_world_newsbox', 'GB-News', array(&$this, 'gxtb_initialize_newsbox'), $this->pagehook, 'additional', 'core');

	require_once( dirname(__FILE__) .'/gb_feedreader.php' );
?>

<div class="wrap"><div id="gb_world">

<h2>GB-World.net</h2>

    <div id="poststuff" class="metabox-holder<?php echo 2 == $screen_layout_columns ? ' has-right-sidebar' : ''; ?>">
                
            <div id="poststuff" class="metabox-holder" style="width: 100%;">
            
                    <!-- Content -->
                        <div id="post-body" class="has-sidebar">
                            <div id="post-body-content" class="has-sidebar-content" style="width:80%">
                                 
                                 <table>
                                 <tr><td valign="top" colspan="2" align="center">
                                 <?php  $this -> gxtb_initialize_fb_box(); ?><br /><br />
                                 <a href="http://www.gb-world.net" target="_blank"><img src="http://www.gb-world.net/images/wp/plugins/banner.gif" class="gb_world"/></a>
                                 </td><td width="25px"></td><td valign="top" rowspan="3">
                                 <?php //do_meta_boxes($this->pagehook, 'like', ""); ?>
                                 
                                 <table width="100%">
                                 <tr>
                                 <td valign="top">
                                 	<?php do_meta_boxes($this->pagehook, 'feed_news', ""); ?>
                                 </td>
                                 <td valign="top">
								 	<?php do_meta_boxes($this->pagehook, 'feed_wp', ""); ?>
                                 </td>
                                 </tr>
                                 </table>
                                 
								 <?php do_meta_boxes($this->pagehook, 'additional', ""); ?> </td>
                                 </tr>
                                 </table>                 
                                 
                            </div>
                        </div>
                    <!-- /Content -->
                        
                    <div class="gxtb-clearer"/>	</div>
            </div>
    </div>

</div></div>
	
<?php $this -> gxtb_infopage_java();

} 

function gxtb_initialize_fb_box() {
	
	require_once( dirname(__FILE__) .'/gb_fb_box.php' ); 
	$gxtb_FBClass = new gxtb_FBClass();
	$gxtb_FBClass -> gxtb_get_box();
	
}

function gxtb_initialize_infobox() {
	
	$this -> gxtb_infobox("0");
}

function gxtb_initialize_feed_news() {

	$gxtb_FRClass = new gxtb_FRClass();
	$gxtb_FRClass -> gxtb_reader(0);
}

function gxtb_initialize_feed_wp() {

	$gxtb_FRClass = new gxtb_FRClass();
	$gxtb_FRClass -> gxtb_reader(1);
}

function gxtb_infobox($boxID) {

		// initialize the newsbox now in the main-plugin-file (since v3.0)
		require_once(dirname(__FILE__) .'\gb_newsbox.php');
				
		//call the News-Class
		switch($boxID) {
			case "0";
				$gxtb_NewsPClass = new gxtb_NewsPClass($this -> gxtb_infoPageClassArray);
				break;
			case "1";
				$gxtb_NewsPClass = new gxtb_NewsPClass($this -> gxtb_infoPageClassArray);
				break;
		}	
}





											## gxtb-WORLD INFOPAGE 0.5 ##
########################################################################################################


########################################################################################################
											## gxtb-NEWS-BOX 2.5  ##

function gxtb_news() {
	
  	add_meta_box('gxtb_world_newsbox', 'GB-News', array(&$this, 'gxtb_initialize_newsbox'), $this->pagehook, 'additional', 'core');
	
?>

<div class="wrap"><div id="gb_world">
		<h2>GB-News</h2>

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
							<?php do_meta_boxes($this->pagehook, 'additional', ""); ?>
						</div>
					</div>
				<!-- /Content -->
					
				<br class="clear"/>	
		</div>
</div>

</div></div>
	
<?php $this -> gxtb_infopage_java();
} 


function gxtb_initialize_newsbox() {
	
	$this -> gxtb_newsbox("1");
}


function gxtb_newsbox($boxID) {

		// global gxtb-Variable
		global $gxtb_fb_like_button_active;
		global $gxtb_fb_lB_path;

		// initialize the newsbox now in the main-plugin-file (since v3.0)
		require_once(dirname(__FILE__) .'\gb_newsbox.php');
		
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

											## gxtb-NEWS-BOX 2.5  ##
########################################################################################################


function gxtb_infopage_java() {
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
}

} ?>