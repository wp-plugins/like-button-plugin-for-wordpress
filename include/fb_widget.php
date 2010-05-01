<?php // Do not delete these lines
	if (!empty($_SERVER['SCRIPT_FILENAME']) && basename(__file__) == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');
?>
<?php
/*
+----------------------------------------------------------------+
+	Like-Button-Plugin-For-Wordpress [v1.3.7.5]
+	by Stefan Natter (http://www.gangxtaboii.com)
+   required for Like-Button-Plugin-For-Wordpress and WordPress 2.7.x or higher
+----------------------------------------------------------------+
*/

class gxtb_fb_lB_WidgetClass {

function gxtb_fb_lB_WidgetClass() {
	add_action('plugins_loaded', array( $this, 'gxtb_fb_lB_widget_sidebar_init' ));
}

####################################################
####################################################
###########								 ###########
###########								 ###########
###########	    DESIGN WIDGET			 ###########
###########								 ###########
###########								 ###########
####################################################
####################################################

function gxtb_fb_lB_widget($args) {
	
	$gxtb_fb_lB_data = get_option('gxtb_fb_lB_data');
	extract($args);
	echo $before_widget;
	echo $before_title; 
	
	if ($gxtb_fb_lB_data['title'] != "")
		echo $gxtb_fb_lB_data['title'];
	else
		echo "Facebook-Like-Button";
	
	echo $after_title;
	$this -> gxtb_fb_lB_Content();
	echo $after_widget;
}

####################################################
####################################################
###########								 ###########
###########								 ###########
###########		    CONTENT 			 ###########
###########								 ###########
###########								 ###########
####################################################
####################################################

 
// Content-Funktion
function gxtb_fb_lB_Content() {
	
$gxtb_fb_lB_data = get_option('gxtb_fb_lB_data');
//$gxtb_fb_lB_data['code'] = stripslashes($gxtb_fb_lB_data['code']); << html-code without /"
?>
<iframe src="http://www.facebook.com/plugins/like.php?href=<?php echo $gxtb_fb_lB_data['url']; ?>&layout=<?php echo $gxtb_fb_lB_data['layout']; ?>&amp;show_faces=<?php echo $gxtb_fb_lB_data['faces']; ?>&amp;width=<?php echo $gxtb_fb_lB_data['width']; ?>&amp;action=<?php echo $gxtb_fb_lB_data['verb']; ?>&amp;colorscheme=<?php echo $gxtb_fb_lB_data['color']; ?>" scrolling="no" frameborder="0" allowTransparency="true" style="border:none; overflow:hidden; width:<?php echo $gxtb_fb_lB_data['width']; ?>px; height:<?php echo $gxtb_fb_lB_data['height']; ?>px"></iframe>

<?php	
	// until [v0.7]
	/*if ($gxtb_fb_lB_data['code'] != "")
		echo $gxtb_fb_lB_data['code'];
	else
		echo "Facebook-Like-Button-Code"; */
}


####################################################
####################################################
###########								 ###########
###########								 ###########
###########		    OPTIONS				 ###########
###########								 ###########
###########								 ###########
####################################################
####################################################


// Control-Function
function gxtb_fb_lB_widget_control() {

$gxtb_fb_lB_data = get_option('gxtb_fb_lB_data');
//$gxtb_fb_lB_data['code'] = stripslashes($gxtb_fb_lB_data['code']); << html-code without /"
?>

<p><label><?php _e('Title', 'gb_like_button'); ?> <?php _e('(required)', 'gb_like_button'); ?><br />
<input name="gxtb_fb_lB_widget_title" type="text" value="<?php echo $gxtb_fb_lB_data['title']; ?>" />
</label></p>
<p><label><?php _e('URL', 'gb_like_button'); ?><br />
<input name="gxtb_fb_lB_widget_url" type="text" value="<?php echo $gxtb_fb_lB_data['url']; ?>" />
</label></p>
<p><label><?php _e('Layout Style', 'gb_like_button'); ?><br />
<SELECT NAME="gxtb_fb_lB_widget_layout">
<?php
$i = array( "standard", "button_count" );
  foreach($i as $variable) {
  	if($variable == $gxtb_fb_lB_data['layout']) {
		echo '<OPTION selected>' . $variable .'</OPTION>';
	} else {
		echo '<OPTION>' . $variable .'</OPTION>';
	}
}
?>
</SELECT>
</label></p>
<p><label><?php _e('Show Faces?', 'gb_like_button'); ?><br />
<input name="gxtb_fb_lB_widget_faces" type="checkbox" class="checkbox" <?php if (get_option(gxtb_fb_lB_widget_faces)) echo("checked"); ?>  />
</label></p>
<p><label><?php _e('Width', 'gb_like_button'); ?><br />
<input name="gxtb_fb_lB_widget_width" type="text" value="<?php echo $gxtb_fb_lB_data['width']; ?>" size="4" maxlength="4"/>px
</label></p>
<p><label><?php _e('Height', 'gb_like_button'); ?><br />
<input name="gxtb_fb_lB_widget_height" type="text" value="<?php echo $gxtb_fb_lB_data['height']; ?>" size="4" maxlength="4"/>px
</label></p>
<p><label><?php _e('Verb to display', 'gb_like_button'); ?><br />
<SELECT NAME="gxtb_fb_lB_widget_verb">
<?php
$i = array( "Like", "Recommend" );
  foreach($i as $variable) {
  	if($variable == $gxtb_fb_lB_data['verb']) {
		echo '<OPTION selected>' . $variable .'</OPTION>';
	} else {
		echo '<OPTION>' . $variable .'</OPTION>';
	}
}
?>
<?php
 /*<option <?php if($gxtb_fb_lB_data['verb'] == __('Like', 'gb_like_button')) echo "selected"; ?> ><?php _e('Like', 'gb_like_button') ?></option>
   <option <?php if($gxtb_fb_lB_data['verb'] == __('Recommend', 'gb_like_button')) echo "selected"; ?> ><?php _e('Recommend', 'gb_like_button') ?></option> */?>
</SELECT>
</label></p>
<p><label><?php _e('Color Scheme', 'gb_like_button'); ?><br />
<SELECT NAME="gxtb_fb_lB_widget_color">
<?php
$i = array( "light", "dark", "evil" );
  foreach($i as $variable) {
  	if($variable == $gxtb_fb_lB_data['color']) {
		echo '<OPTION selected>' . $variable .'</OPTION>';
	} else {
		echo '<OPTION>' . $variable .'</OPTION>';
	}
}
?>
</SELECT>
</label></p>
<?php
   if (isset($_POST['gxtb_fb_lB_widget_title'])){
    $gxtb_fb_lB_data['title'] = attribute_escape($_POST['gxtb_fb_lB_widget_title']);
	$gxtb_fb_lB_data['code'] = attribute_escape($_POST['gxtb_fb_lB_widget_code']);
	$gxtb_fb_lB_data['url'] = attribute_escape($_POST['gxtb_fb_lB_widget_url']);
	$gxtb_fb_lB_data['layout'] = attribute_escape($_POST['gxtb_fb_lB_widget_layout']);
	$gxtb_fb_lB_data['faces'] = attribute_escape($_POST['gxtb_fb_lB_widget_faces']);
	$gxtb_fb_lB_data['width'] = attribute_escape($_POST['gxtb_fb_lB_widget_width']);
	$gxtb_fb_lB_data['height'] = attribute_escape($_POST['gxtb_fb_lB_widget_height']);
	$gxtb_fb_lB_data['verb'] = attribute_escape($_POST['gxtb_fb_lB_widget_verb']);
	$gxtb_fb_lB_data['color'] = attribute_escape($_POST['gxtb_fb_lB_widget_color']);
    update_option('gxtb_fb_lB_data', $gxtb_fb_lB_data);
  }

}

####################################################
####################################################
###########								 ###########
###########								 ###########
###########	    REGISTER WIDGET 		 ###########
###########								 ###########
###########								 ###########
####################################################
####################################################

function gxtb_fb_lB_widget_sidebar_init()
{
  register_sidebar_widget(__('Facebook-Like-Button-Generator', 'gb_like_button'), array( $this, 'gxtb_fb_lB_widget' ) );
  register_widget_control (__('Facebook-Like-Button-Generator', 'gb_like_button'), array( $this, 'gxtb_fb_lB_widget_control' ), 300, 440);
  register_activation_hook( __FILE__,  array( $this,  'gxtb_fb_lB_widget_activate'));
  register_deactivation_hook( __FILE__,  array( $this,  'gxtb_fb_lB_widget_deactivate'));
}

 function gxtb_fb_lB_widget_activate(){
    $gxtb_fb_lB_data = array( 'code' => '', 'title' => '', 'url' => '', 'layout' => '', 'faces' => '', 'width' => '', 'height' => '', 'verb' => '', 'color' => '');
	
    if ( ! get_option('gxtb_fb_lB_data')){
      add_option('gxtb_fb_lB_data' , $gxtb_fb_lB_data);
    } else {
      update_option('gxtb_fb_lB_data' , $gxtb_fb_lB_data);
    }
  }
  
function gxtb_fb_lB_widget_deactivate(){
    delete_option('gxtb_fb_lB_data');
  }

}
?>