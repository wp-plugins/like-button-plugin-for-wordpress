<?php // Do not delete these lines
	if (!empty($_SERVER['SCRIPT_FILENAME']) && basename(__file__) == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');
?>
<?php
/*
+----------------------------------------------------------------+
+	Like-Button-Plugin-For-Wordpress [v4.3.3] - GB-Save-Settings [v0.5 FINAL]
+	by Stefan Natter (http://www.gb-world.net)
+   required for Like-Button-Plugin-For-Wordpress and WordPress 2.7.x or higher
+----------------------------------------------------------------+
*/
####################################################
####################################################
###########								 ###########
###########								 ###########
###########	       SAVE-METHOD			 ###########
###########								 ###########
###########								 ###########
####################################################
####################### by gb-world.net ############
####################################################

# RESET
 if ( isset( $_POST['reset'] ) && check_admin_referer('fb-like-button') && $_POST['fb_like_hidden'] == 'update' ) {
 
 		include('gb_cleaner.php');
		$gxtb_fb_lB_Cleaner = new gxtb_fb_lB_Cleaner();
		$gxtb_fb_lB_Cleaner -> GBRestore();
 
 		?>
		<div class="ui-widget">
			<div class="ui-state-highlight ui-corner-all" style="padding: 0 .7em;"> 
				<p><span class="ui-icon ui-icon-info" style="float: left; margin-right: .3em;"></span> 
				<strong><?php _e("Information", gxtb_fb_lB_lang); ?>:</strong> <?php _e("Defaults restored", gxtb_fb_lB_lang); ?>.</p>
			</div>
		</div>
<?php 
 }
 
# SAVE
if ( isset($_POST['fbsubmit']) && check_admin_referer('fb-like-button') && $_POST['fb_like_hidden'] == 'update' ) {
 
if (get_option('GBLikeButton')) { # sichert die Datei vor Error-Meldungen falls die Option nicht verfügbar ist
	
 	$GBLikeButton = get_option('GBLikeButton');
	$stats = $GBLikeButton['General']['on'];
 
if ($_GET['page'] == "fb-like-button") {
	
	if( gxtb_fb_lB_debug ) {
		echo "<b>Debug-Modus [General]</b><br />";
	}

	$area = "General";
	$keycode = "general_";
	
	## [OpenGraph][on]-Option seperat abfragen #
	$GBLikeButton['OpenGraph']['on'] = ( isset($_POST['opengraph_on'])) ? $_POST['opengraph_on']:0;
	
	foreach ($GBLikeButton[$area] as $key => $value) { 
			
				  switch ($key) {
					  
					  case "on":
					  case "jdk":
					  case "dynamic":
					  case "position_before":
					  case "position_before":
					  case "addfooter_activate":
					  case "frontpage":
					  case "page":
					  case "post":
					  case "category":
					  case "archiv":
					  case "shortcode":
						  $GBLikeButton[$area][$key] = ( isset($_POST[$keycode . $key])) ? $_POST[$keycode . $key]:0;
						  if( gxtb_fb_lB_debug && isset($_POST[$keycode . $key]) ) {
						  	echo "[" . $area ."][".$key."] => '";
							if ( isset($_POST[$keycode . $key]) ) { echo "1";} else { echo "0"; }
							echo "' from Checkbox [" . $keycode . $key ."]<br />";
						  }
						  unset($_POST[$keycode . $key]);
					  break;	
					  
					  default:
						  $GBLikeButton[$area][$key] = ( isset($_POST[$keycode . $key]) && $_POST[$keycode . $key] != "" ) ? $_POST[$keycode . $key]:'';
						  if($_POST[$keycode . $key] && gxtb_fb_lB_debug && isset($_POST[$keycode . $key]) ) {
						  	echo "[" . $area ."][".$key."] => '" . $_POST[$keycode . $key] . "' from [" . $keycode . $key ."]<br />";
						  }
						  unset($_POST[$keycode . $key]);
					  break;
				  }
	}

if( gxtb_fb_lB_debug ) {
	echo "</b><br /><b>Debug-Modus [Generator]</b><br />";
}
	
	$area = "Generator";
	$keycode = "gxtb_fb_lB_generator_";
	foreach ($GBLikeButton[$area] as $key => $value) { 
			
				  switch ($key) {
					  
					  case "faces":
					  case "scrolling":
					  case "trans":
						  $GBLikeButton[$area][$key] = ( isset($_POST[$keycode . $key])) ? $_POST[$keycode . $key]:0;
						  if( gxtb_fb_lB_debug && isset($_POST[$keycode . $key]) ) {
						  	echo "[" . $area ."][".$key."] => '";
							if ( isset($_POST[$keycode . $key]) ) { echo "1";} else { echo "0"; }
							echo "' from Checkbox [" . $keycode . $key ."]<br />";
						  }
						  unset($_POST[$keycode . $key]);
					  break;	
					  
					  default:
						  $GBLikeButton[$area][$key] = ( isset($_POST[$keycode . $key]) && $_POST[$keycode . $key] != "" ) ? $_POST[$keycode . $key]:'';
						  if($_POST[$keycode . $key] && gxtb_fb_lB_debug && isset($_POST[$keycode . $key]) ) {
						  	echo "[" . $area ."][".$key."] => '" . $_POST[$keycode . $key] . "' from [" . $keycode . $key ."]<br />";
						  }
						  unset($_POST[$keycode . $key]);
					  break;
				  }
	}
}

if ($_GET['page'] == "fb-like-design") {
	
	if( gxtb_fb_lB_debug ) {
		echo "<b>Debug-Modus [Design]</b><br />";
	}
	
	$area = "Design";
	$keycode = "design_";
	foreach ($GBLikeButton[$area] as $key => $value) { 
		
				  switch ($key) {
					  				  
					  default:
						  $GBLikeButton[$area][$key] = ( isset($_POST[$keycode . $key]) && $_POST[$keycode . $key] != "" ) ? $_POST[$keycode . $key]:'';
						  if($_POST[$keycode . $key] && gxtb_fb_lB_debug && isset($_POST[$keycode . $key]) ) {
						  	echo "[" . $area ."][".$key."] => '" . $_POST[$keycode . $key] . "' from [" . $keycode . $key ."]<br />";
						  }
						  unset($_POST[$keycode . $key]);
					  break;
				  }
	}
}

if ($_GET['page'] == "fb-like-opengraph") {
	
	if( gxtb_fb_lB_debug ) {
		echo "<b>Debug-Modus [OpenGraph]</b><br />";
	}
	
	$area = "OpenGraph";
	$keycode = "";
	foreach ($GBLikeButton[$area] as $key => $value) { 
		
				  switch ($key) {
					  				  
					  default:
						  $GBLikeButton[$area][$key] = ( isset($_POST[$keycode . $key]) && $_POST[$keycode . $key] != "" ) ? $_POST[$keycode . $key]:'';
						  if($_POST[$keycode . $key] && gxtb_fb_lB_debug && isset($_POST[$keycode . $key]) ) {
						  	echo "[" . $area ."][".$key."] => '" . $_POST[$keycode . $key] . "' from [" . $keycode . $key ."]<br />";
						  }
						  unset($_POST[$keycode . $key]);
					  break;
				  }
	}
}

if ($_GET['page'] == "fb-like-insights") {
	
if( gxtb_fb_lB_debug ) {
	echo "<b>Debug-Modus [Insights]</b><br />";
}
	
	$area = "FBInsights";
	$keycode = "insights_";
	foreach ($GBLikeButton[$area] as $key => $value) { 
			
				  switch ($key) {
					  
					  case "on":
					  case "frontpage_activ":
					  case "page_activ":
					  case "post_activ":
					  case "category_activ":
					  case "archiv_activ":
						  $GBLikeButton[$area][$key] = ( isset($_POST[$keycode . $key])) ? $_POST[$keycode . $key]:0;
						  if( gxtb_fb_lB_debug && isset($_POST[$keycode . $key]) ) {
						  	echo "[" . $area ."][".$key."] => '";
							if ( isset($_POST[$keycode . $key]) ) { echo "1";} else { echo "0"; }
							echo "' from Checkbox [" . $keycode . $key ."]<br />";
						  }
						  unset($_POST[$keycode . $key]);
					  break;	
					  
					  default:
						  $GBLikeButton[$area][$key] = ( isset($_POST[$keycode . $key]) && $_POST[$keycode . $key] != "" ) ? $_POST[$keycode . $key]:'';
						  if($_POST[$keycode . $key] && gxtb_fb_lB_debug && isset($_POST[$keycode . $key]) ) {
						  	echo "[" . $area ."][".$key."] => '" . $_POST[$keycode . $key] . "' from [" . $keycode . $key ."]<br />";
						  }
						  unset($_POST[$keycode . $key]);
					  break;
				  }
	}
}

if ($_GET['page'] == "fb-like-expert") {
	
if( gxtb_fb_lB_debug ) {
	echo "<b>Debug-Modus [Expert]</b><br />";
}
	
	$area = "Expert";
	$keycode = "expert_";
	foreach ($GBLikeButton[$area] as $key => $value) { 
			
				  switch ($key) {
					  
					  case "besidebutton":
						  $GBLikeButton[$area][$key] = ( isset($_POST[$keycode . $key]) && $_POST[$keycode . $key] != "" ) ? stripslashes($_POST[$keycode . $key]):'';
						  if($_POST[$keycode . $key] && gxtb_fb_lB_debug && isset($_POST[$keycode . $key]) ) {
						  	echo "[" . $area ."][".$key."] => '" . stripslashes($_POST[$keycode . $key]) . "' from [" . $keycode . $key ."]<br />";
						  }
						  unset($_POST[$keycode . $key]);
					  
					  break;
					  				  
					  default:
						  $GBLikeButton[$area][$key] = ( isset($_POST[$keycode . $key]) && $_POST[$keycode . $key] != "" ) ? $_POST[$keycode . $key]:'';
						  if($_POST[$keycode . $key] && gxtb_fb_lB_debug && isset($_POST[$keycode . $key]) ) {
						  	echo "[" . $area ."][".$key."] => '" . $_POST[$keycode . $key] . "' from [" . $keycode . $key ."]<br />";
						  }
						  unset($_POST[$keycode . $key]);
					  break;
				  }
	}
}


	# Alles updaten #
	update_option('GBLikeButton', $GBLikeButton);

if( isset($_GET['page']) && $_GET['page'] == "fb-like-button" && isset($GBLikeButton['General']['on']) && $stats != $GBLikeButton['General']['on'] && !strstr(get_bloginfo('url'), "localhost") ) { 	
	$pluginencrypted = rot13encrypt("FBLike");
	$index = "index.php?key=" . rot13encrypt(get_bloginfo('url')) . "gb89&plugin=". $pluginencrypted ."&version=" . rot13encrypt(gxtb_fb_lB_version) . "&language=" . __('en', gxtb_fb_lB_lang) . "&on=" . $GBLikeButton['General']['on'];
$stats = @file_get_contents("http://stats.gb-world.net/wp/" . $index );
	if (strpos($http_response_header[0], "200")) {
	   echo $stats;
	} // end if
 } // end if
	
	// Output Meldung	
	if ( ( isset($_GET['page']) && !strstr($_GET['page'],'fb-like-settings') )) { 
		?>
		<div class="ui-widget">
			<div class="ui-state-highlight ui-corner-all" style="padding: 0 .7em;"> 
				<p><span class="ui-icon ui-icon-info" style="float: left; margin-right: .3em;"></span> 
				<strong><?php _e("Information", gxtb_fb_lB_lang); ?>:</strong> <?php _e("Settings successfully saved", gxtb_fb_lB_lang); ?>.</p>
			</div>
		</div>
<?php 
# Nachdem alles abgefragt und gespeichert wurde wird die Post-Aktion auf 0 gesetzt per unset #
	unset( $_POST['fbsubmit'] );
	} // end if

}
else { ?>
		<div class="ui-widget">
			<div class="ui-state-error ui-corner-all" style="padding: 0 .7em;"> 
				<p><span class="ui-icon ui-icon-info" style="float: left; margin-right: .3em;"></span> 
				<strong><?php _e("Information", gxtb_fb_lB_lang); ?>:</strong> <?php echo sprintf("%s [<a href='admin.php?page=fb-like-settings'>%s</a>] %s.", __("Please run the", gxtb_fb_lB_lang), __("GBCleaner", gxtb_fb_lB_lang),__("first! There has been an error with your Settings.", gxtb_fb_lB_lang)); ?></p>
			</div>
		</div>
<?php 
} // end if get_option


} // end if

function rot13encrypt ($str) {
return str_rot13(base64_encode($str));
}
function rot13decrypt ($str) {
return base64_decode(str_rot13($str));
}
?>