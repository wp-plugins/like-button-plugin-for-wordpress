<?php // Do not delete these lines
	if (!empty($_SERVER['SCRIPT_FILENAME']) && basename(__file__) == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');
?>
<?php 
/*
+----------------------------------------------------------------+
+	GB-Paypal-Box and GB-News-Box [v2.5]
+	by Stefan Natter (http://www.gangxtaboii.com)
+   required for GB-Themes and GB-Plugins
+----------------------------------------------------------------+
*/


####################################################
####################################################
###########								 ###########
###########								 ###########
###########	     SUPPORT-CLASS			 ###########
###########								 ###########
###########								 ###########
####################################################
##################### by ganxtaboii.com ############
####################################################

class gxtb_NewsPClass {

function gxtb_NewsPClass($gxtb_NewsClass_iArray) {
	
	$gxtb_newsbox_active = $gxtb_NewsClass_iArray['active'];
	$gxtb_newsbox_langdef = $gxtb_NewsClass_iArray['language'];
	$gxtb_newsbox_Array["name"] = $gxtb_NewsClass_iArray['name'];
	$gxtb_newsbox_Array["version"] = $gxtb_NewsClass_iArray['version'];
	$gxtb_newsbox_art = $gxtb_NewsClass_iArray['def'];
	
?>

<!-- ######################################################################################################## -->
<!-- 										## GB-Newsbox 2.0  ##											  -->

	                <p>'<?php echo $gxtb_newsbox_Array["name"]; ?>' 
					<?php _e('was created by', $gxtb_newsbox_langdef) ?> <a href="http://www.gangxtaboii.com/">Stefan Natter</a>. 
           			<?php _e('The development of this plugin took a lot of time and effort, so please don&rsquo;t forget to donate if you found this plugin useful.', $gxtb_newsbox_langdef) ?></p>
                    
                    <p><?php _e('There are also other ways of supporting this plugin to ensure it is maintained and well supported in the future!', $gxtb_newsbox_langdef) ?>
                    <?php _e('Rating the plugin on wordpress.org (if you like it), linking/spreading the word, and submitting code contributions will all help.', $gxtb_newsbox_langdef) ?> </p>
                    
					<a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=SB94MEM9ATTBG"><img src="https://www.paypal.com/en_GB/i/btn/btn_donate_LG.gif" /></a>
<?php 
	}
} 



####################################################
####################################################
###########								 ###########
###########								 ###########
###########	     GB-NEWS-CLASS			 ###########
###########								 ###########
###########								 ###########
####################################################
##################### by ganxtaboii.com ############
####################################################

class gxtb_NewsClass {

function gxtb_NewsClass($gxtb_NewsClass_iArray) {
	
	$gxtb_newsbox_active = $gxtb_NewsClass_iArray['active'];
	$gxtb_newsbox_langdef = $gxtb_NewsClass_iArray['language'];
	$gxtb_newsbox_Array["name"] = $gxtb_NewsClass_iArray['name'];
	$gxtb_newsbox_Array["version"] = $gxtb_NewsClass_iArray['version'];
	$gxtb_newsbox_art = $gxtb_NewsClass_iArray['def'];
	
?>
		<ul type="circle">
			<li>	
<?php
$gxtb_newsbox_lang = __('en', $gxtb_newsbox_langdef);

// since GB-Newsbox [v1.5.5]
$news = @file_get_contents("http://www.gangxtaboii.com/downloads/wp/news.php?p=wpp&language=". $gxtb_newsbox_lang . "&log=" . $gxtb_newsbox_active . "&pfad=" . get_option('siteurl') . "&plugin=". $gxtb_newsbox_Array["name"] ."&version=". $gxtb_newsbox_Array["version"]);
if (strpos($http_response_header[0], "200")) { 
   echo $news;
   //echo 'http://www.gangxtaboii.com/downloads/wp/news.php?p=wpp&language='. $gxtb_newsbox_lang . '&log=' . $gxtb_newsbox_active . '&pfad=' . get_option('siteurl') . '&plugin='. $gxtb_newsbox_Array["name"] ."&version=". $gxtb_newsbox_Array["version"];
} else { 
   echo "Unknown Error - We are working on that problem.";
}


?>		
			</li>
		</ul>

<!-- 										## GB-Newsbox 2.0  ##											  -->
<!-- ######################################################################################################## -->

<?php 
	}
} 
?>