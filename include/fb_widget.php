<?php // Do not delete these lines
	if (!empty($_SERVER['SCRIPT_FILENAME']) && basename(__file__) == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');
?>
<?php
/*
+----------------------------------------------------------------+
+	Like-Button-Plugin-For-Wordpress [v3.0]
+	by Stefan Natter (http://www.gangxtaboii.com and http://www.gb-world.net)
+   required for Like-Button-Plugin-For-Wordpress and WordPress 2.7.x or higher
+----------------------------------------------------------------+
*/

class gxtb_fb_lB_WidgetClass {

function gxtb_fb_lB_WidgetClass() {
	
	add_action('plugins_loaded', array( $this, 'gxtb_fb_lB_widget_sidebar_init' ));
	
	$mypluginoptionpageslug = 'widgets.php';
	if (strpos($_SERVER['REQUEST_URI'],$mypluginoptionpageslug)) { $ismypluginoptionpage = 'true'; } else { $ismypluginoptionpage = 'false'; }
		 
	if ( $ismypluginoptionpage == 'true' )
		add_action('admin_head', array(&$this, 'gxtb_fb_lB_widget_header'));
}

function gxtb_fb_lB_widget_header() {

	global $gb_fb_lB_path;
echo '<script type="text/javascript" src="' . $gb_fb_lB_path. 'js/gb_generator.js"></script>';
echo '<link rel="stylesheet" type="text/css" href="' . $gb_fb_lB_path. '/css/tooltips.css" />';

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

## more individual options since v3.0 ##
	if($gxtb_fb_lB_data['dynamic']) {
		if(is_single()){
			$permalink = get_permalink($post->ID);
		}elseif(is_page()){
			$permalink = get_page_link($post->ID);
		}elseif(is_home()) {
			$permalink = get_bloginfo('url');
		}else {
			$permalink = "http://" . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
		}
	} else {
		$permalink = $gxtb_fb_lB_data['url'];
	}

	if ($gxtb_fb_lB_data['width'] == "") {
		$width = "450";
	} else{
		$width = $gxtb_fb_lB_data['width'];
	}

	if ($gxtb_fb_lB_data['frameborder'] == "") {
		$frameborder = "0";
	} else{
		$frameborder = $gxtb_fb_lB_data['frameborder'];
	}
	
	if ($gxtb_fb_lB_data['borderstyle'] == "") {
		$borderstyle = "none";
	} else{
		$borderstyle = $gxtb_fb_lB_data['borderstyle'];
	}
		
	if ($gxtb_fb_lB_data['trans']) {
		$trans = "true";
	} else{
		$trans = "false";
	}	
	
	if ($gxtb_fb_lB_data['scrolling']) {
		$scrolling = "yes";
	} else{
		$scrolling = "no";
	}		
	
	 if($gxtb_fb_lB_data['font'] != "") {
		 
		 switch ($gxtb_fb_lB_data['font']) {
			 case "luciada grande":
			 	$font = "lucida+grande";
			 break;
			 
			 case "segoe ui":
			 	$font = "segoe+ui";
			 break;
			 
			 case "trebuchet ms":
			 	$font = "trebuchet+ms";
			 break;
			 
			 default:
			 	$font = $gxtb_fb_lB_data['font'];
			 break;
		 }
		 
		$font = 'font=' . $font . '&amp;';
	} else {
		$font = '';	
	}
## more individual options since v3.0 ##

?>
<iframe src="http://www.facebook.com/plugins/like.php?href=<?php echo urlencode($permalink); ?>&layout=<?php echo $gxtb_fb_lB_data['layout']; ?>&amp;show_faces=<?php echo $gxtb_fb_lB_data['faces']; ?>&amp;width=<?php echo $width; ?>&amp;action=<?php echo $gxtb_fb_lB_data['verb']; ?>&amp;<?php echo $font; ?>colorscheme=<?php echo $gxtb_fb_lB_data['color']; ?>" scrolling="<?php echo $scrolling; ?>" frameborder="<?php echo $frameborder; ?>" allowTransparency="<?php echo $trans; ?>" style="border:<?php echo $borderstyle; ?>; overflow:<?php echo $gxtb_fb_lB_data['overflow']; ?>; width:<?php echo $width; ?>px; height:<?php echo $gxtb_fb_lB_data['height']; ?>px"></iframe>
<?php echo '<!-- using ' . gxtb_fb_lB_name . '-Sidebar-Widget [v' . gxtb_fb_lB_version . '] | by http://www.gb-world.net -->'; ?>

<?php	

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

global $gb_fb_lB_path;
$gxtb_fb_lB_data = get_option('gxtb_fb_lB_data');

?>

    <p><label><?php _e('Title', 'gb_like_button'); ?> <?php _e('(required)', 'gb_like_button'); ?><br />
    <input name="gxtb_fb_lB_widget_title" type="text" value="<?php echo $gxtb_fb_lB_data['title']; ?>" />
    </label></p>

    <p><label><?php _e('URL (required)', 'gb_like_button'); ?><br />
    <input name="gxtb_fb_lB_widget_url" type="text" value="<?php echo $gxtb_fb_lB_data['url']; ?>" />
    </label></p>

<p><label><?php _e('Dynamic Links', 'gb_like_button'); ?><br />
<input name="gxtb_fb_lB_widget_dynamic" type="checkbox" class="checkbox" <?php if ($gxtb_fb_lB_data['dynamic']) echo("checked"); ?>/>  <img src="<?php echo $gb_fb_lB_path; ?>/images/rot17a.gif"  onmouseover="tooltip.show('			<u><?php _e('Activated', 'gb_like_button'); ?>:</u> <?php _e('Every Post/Page has its own Like-Button. Which means for every page on your side there will be a unique Like-Button.', 'gb_like_button'); ?> <?php _e('(recommended)', 'gb_like_button'); ?><br /><u><?php _e('Deactivated', 'gb_like_button'); ?>:</u> <?php _e('Every Post/Page has the same Like-Button. Which means if you click on it, it looks like you like/recommend every post even if you have not read it before.', 'gb_like_button'); ?>');" onmouseout="tooltip.hide();">
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
    <input name="gxtb_fb_lB_widget_faces" type="checkbox" class="checkbox" <?php if ($gxtb_fb_lB_data['faces']) echo("checked"); ?>  />
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

      <p><label><?php _e('Font', 'gb_like_button'); ?><br />
              <SELECT NAME="gxtb_fb_lB_widget_font">
              <?php
              $i = array( "" ,"arial", "luciada grande", "segoe ui", "tahoma", "trebuchet ms", "verdana" );
                foreach($i as $variable) {
                  if($variable == $gxtb_fb_lB_data['font']) {
                      echo '<OPTION selected>' . $variable .'</OPTION>';
                  } else {
                      echo '<OPTION>' . $variable .'</OPTION>';
                  }
              }
              ?>
      </SELECT>
	</label></p>

          <p><label><?php _e('Scrolling', 'gb_like_button'); ?><br />
					<input name="gxtb_fb_lB_widget_scrolling" type="checkbox" class="checkbox" <?php if ($gxtb_fb_lB_data['scrolling']) echo("checked"); ?>  />
			</label></p>

          <p><label><?php _e('Frameborder', 'gb_like_button'); ?><br />
					<input name="gxtb_fb_lB_widget_frameborder" type="text" value="<?php if ($gxtb_fb_lB_data['frameborder'] != "") {echo $gxtb_fb_lB_data['frameborder'];} else {echo "";} ?>" size="4" maxlength="4"/>px
			</label></p>

          <p><label><?php _e('Style (of the Border)', 'gb_like_button'); ?><br />
					<input name="gxtb_fb_lB_widget_borderstyle" type="text" value="<?php if ($gxtb_fb_lB_data['borderstyle'] != "") {echo $gxtb_fb_lB_data['borderstyle'];} else {echo "";} ?>" size="20" maxlength="20"/><br />
					<?php _e('Example: none or solid', 'gb_like_button'); ?>
			</label></p>

          <p><label><?php _e('Overflow', 'gb_like_button'); ?></label><br />
					<select name="gxtb_fb_lB_widget_overflow">
					<?php
					$i = array( "hidden", "scroll");
					  foreach($i as $variable) {
						if($variable == $gxtb_fb_lB_data['overflow']) {
							echo '<OPTION selected>' . $variable .'</OPTION>';
						} else {
							echo '<OPTION>' . $variable .'</OPTION>';
						}
					}
					?>
					</select>
             </p>

          <p><label><?php _e('Allow Transparency', 'gb_like_button'); ?><br />
					<input name="gxtb_fb_lB_widget_trans" type="checkbox" class="checkbox" <?php if ($gxtb_fb_lB_data['trans']) echo("checked"); ?>  />
			</label></p>

<?php
   if (isset($_POST['gxtb_fb_lB_widget_url'])){
    $gxtb_fb_lB_data['title'] = attribute_escape($_POST['gxtb_fb_lB_widget_title']);
	$gxtb_fb_lB_data['url'] = attribute_escape($_POST['gxtb_fb_lB_widget_url']);
	$gxtb_fb_lB_data['dynamic'] = attribute_escape($_POST['gxtb_fb_lB_widget_dynamic']);
	$gxtb_fb_lB_data['layout'] = attribute_escape($_POST['gxtb_fb_lB_widget_layout']);
	$gxtb_fb_lB_data['faces'] = attribute_escape($_POST['gxtb_fb_lB_widget_faces']);
	$gxtb_fb_lB_data['width'] = attribute_escape($_POST['gxtb_fb_lB_widget_width']);
	$gxtb_fb_lB_data['height'] = attribute_escape($_POST['gxtb_fb_lB_widget_height']);
	$gxtb_fb_lB_data['verb'] = attribute_escape($_POST['gxtb_fb_lB_widget_verb']);
	$gxtb_fb_lB_data['color'] = attribute_escape($_POST['gxtb_fb_lB_widget_color']);
	$gxtb_fb_lB_data['font'] = attribute_escape($_POST['gxtb_fb_lB_widget_font']);
	
	$gxtb_fb_lB_data['scrolling'] = attribute_escape($_POST['gxtb_fb_lB_widget_scrolling']);
	$gxtb_fb_lB_data['frameborder'] = attribute_escape($_POST['gxtb_fb_lB_widget_frameborder']);
	$gxtb_fb_lB_data['borderstyle'] = attribute_escape($_POST['gxtb_fb_lB_widget_borderstyle']);
	$gxtb_fb_lB_data['overflow'] = attribute_escape($_POST['gxtb_fb_lB_widget_overflow']);
	$gxtb_fb_lB_data['trans'] = attribute_escape($_POST['gxtb_fb_lB_widget_trans']);
	
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
  //register_activation_hook( __FILE__,  array( $this,  'gxtb_fb_lB_widget_activate')); - since 3.0
  //register_deactivation_hook( __FILE__,  array( $this,  'gxtb_fb_lB_widget_deactivate')); - since 3.0
  
}

 function gxtb_fb_lB_widget_activate(){
    $gxtb_fb_lB_data = array( 'title' => '', 'url' => '', 'layout' => '', 'faces' => '', 'width' => '', 'height' => '', 'verb' => '', 'color' => '', 'trans' => true);
	
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




/* currently out of use

global $gb_fb_lB_path;

echo '
<script type="text/javascript">
window.onload=function(){enableTooltips()};
</script>
<style type="text/css">
.tooltip{
width: 200px; color:#000;
font:lighter 11px/1.3 Arial,sans-serif;
text-decoration:none;text-align:center}

.tooltip span.top{padding: 30px 8px 0;
    background: url(' . $gb_fb_lB_path . '/images/bt.gif) no-repeat top}

.tooltip b.bottom{padding:3px 8px 15px;color: #548912;
    background: url(' . $gb_fb_lB_path . '/images/bt.gif) no-repeat bottom}
</style>
'
; */

?>