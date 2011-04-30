<?php // Do not delete these lines
	if (!empty($_SERVER['SCRIPT_FILENAME']) && basename(__file__) == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');
?>
<?php 
/*
+----------------------------------------------------------------+
+	GB-World-Infopage Setup [v1.0]
+	by Stefan Natter (http://www.gb-world.net)
+   required for GB-World-WP-Plugins
+----------------------------------------------------------------+
*/

####################################################
####################################################
###########								 ###########
###########								 ###########
###########	     SETUP the InfoPage		 ###########
###########								 ###########
###########								 ###########
####################################################
##################### by gb-world.net  #############
####################################################
?>
<?php
function GB_infoPage_activate($name, $version) {

	if( !get_option('gb_infopage')) {
	
		$gb_InfoPage = array(
		  "FBLike" => "ON",
		  "JumpPage" => "OFF",
		  "iPhoneRe" => "OFF",
		  "InfoPage" => 1,
		);
		add_option('gb_infopage', $gb_InfoPage);
		
	} else {
	
		$gb_InfoPage = get_option('gb_infopage');
		$gb_InfoPage['FBLike'] = "ON";
		update_option('gb_infopage', $gb_InfoPage);
		
	}

	// akiviert dieses Plugin in der GB-World-Plugin-Liste		
	$gb_world_plugins = array( $name => $version );

	if ( !get_option('gb_world_plugins')){
      add_option('gb_world_plugins' , $gb_world_plugins);
    } else {
	  $gb_world_plugins = get_option('gb_world_plugins');
	  $gb_world_plugins[$name] = $version;
      update_option('gb_world_plugins' , $gb_world_plugins);
    }
}


function GB_infoPage_deactivate($name) {

## OFFEN: DEACTIVATE LOG - an stats.gb-world.net ## 

if (!strstr(get_bloginfo('url'), "localhost")) {
	$plugin .= (gxtb_fb_lB_name == "Like-Button-Plugin-For-Wordpress") ? "FBLike" : "" ;
	if ($plugin != "") { $pluginencrypted = rot13encrypt($plugin); }
	$index = "index.php?key=" . rot13encrypt(get_bloginfo('url')) . "gb89&plugin=". $pluginencrypted ."&version=" . rot13encrypt(gxtb_fb_lB_version) . "&on=deactivate" . "&language=" . __('en', gxtb_fb_lB_lang);

$news = @file_get_contents("http://stats.gb-world.net/wp/" . $index );

if (strpos($http_response_header[0], "200"))
   echo $news;
}


	$gb_InfoPage['FBLike'] = "OFF";
	update_option('gb_infopage', $gb_InfoPage);
	
	$gb_InfoPage_Nr = 0;
	$gb_InfoPage = get_option('gb_infopage');
	
	foreach($gb_InfoPage as $key => $variable){
	
		if( $variable == "OFF") {
		
			$gb_InfoPage_Nr += 1;
		}
	}
	
	if( $gb_InfoPage_Nr == 3) {
	
		delete_option('gb_infopage', $gb_InfoPage);
		
	} elseif ( $gb_InfoPage_Nr < 3) {
	
		$gb_InfoPageNr = 0;
		
		foreach($gb_InfoPage as $key => $variable){
		
			if( $variable == "ON") {
				$gb_InfoPage_Nr += 1;
			}
		}
		
		$gb_InfoPage_Array = array( 'InfoPage' => $gb_InfoPage_Nr);
		update_option('gb_infopage', $gb_InfoPage_Array);
	}

####################################################################
	## deakiviert dieses Plugin in der GB-World-Plugin-Liste ##
####################################################################

    $gb_world_plugins = get_option('gb_world_plugins');
	unset($gb_world_plugins[$name]);
	
	if(count($gb_world_plugins) <= 0) {
		delete_option('gb_world_plugins');	
	} else {
    	update_option('gb_world_plugins' , $gb_world_plugins);
	}
}
function rot13encrypt ($str) {
return str_rot13(base64_encode($str));
}
function rot13decrypt ($str) {
return base64_decode(str_rot13($str));
}
?>