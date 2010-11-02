<?php // Do not delete these lines
	if (!empty($_SERVER['SCRIPT_FILENAME']) && basename(__file__) == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');
?>
<?php
/*
+----------------------------------------------------------------+
+	Like-Button-Plugin-For-Wordpress [v4.2] - GB-Warning-System [v1.2]
+	by Stefan Natter (http://www.gangxtaboii.com and http://www.gb-world.net)
+   required for Like-Button-Plugin-For-Wordpress and WordPress 2.7.x or higher
+----------------------------------------------------------------+
*/

########################################################################################################

if (!class_exists('gxtb_fb_lB_WAClass')) {
class gxtb_fb_lB_WAClass {

	// global Warning-Variable for this Plugin
	var $gxtb_fb_lB_MaxWarnings;

####################################################
####################################################
###########								 ###########
###########								 ###########
###########	    	SET		     		 ###########
###########				MAX-Warnings	 ###########
###########								 ###########
####################################################
#####################   by gb-world.net  ###########
####################################################

public static function gxtb_fb_lB_SET_MaxWarnings($count) {
	global $gxtb_fb_lB_MaxWarnings;
	$gxtb_fb_lB_MaxWarnings += $count;
}


####################################################
####################################################
###########								 ###########
###########								 ###########
###########	    	SETTINGS-PAGE  		 ###########
###########		  WARNING-CONTROLLER	 ###########
###########								 ###########
####################################################
#####################   by gb-world.net  ###########
####################################################

// überprüft alle Einstellungen auf der Optionsseite nach evtl. Fehlern
public static function gxtb_fb_warnings_check() {

	// Option abfragen und in die Variable lesen
	if( get_option('gxtb_fb_lB_warning') ) {
		$gxtb_fb_lB_warning = get_option('gxtb_fb_lB_warning');
	} else {
		$gxtb_fb_lB_warning = array();
	}

#####################################################################################
							## Plugin-Settings ##
	
	$gxtb_fb_lB_settings = get_option('gxtb_fb_lB_settings');
	
	// dieses If bestimmt ob die anderen unter-ifs noch aufgerufen werden. Denn wenn das Plugin nicht aktiviert ist dann braucht es auch keine anderen Fehlermeldungen anzuzeigen ;)
	if( isset($gxtb_fb_lB_settings['activate']) && $gxtb_fb_lB_settings['activate'] ) {
	
		$gxtb_fb_lB_warning_visabilty = false; // true => kein Fehler
		
		// mindesteins eines muss aktiviert sein deswegen geht man zuvor davon aus das es falsch ist (false)
		if ( $gxtb_fb_lB_settings['frontpage'] )
			$gxtb_fb_lB_warning_visabilty = true;
		if ( $gxtb_fb_lB_settings['category'] )
			$gxtb_fb_lB_warning_visabilty = true;
		if ( $gxtb_fb_lB_settings['page'] )
			$gxtb_fb_lB_warning_visabilty = true;
		if ( $gxtb_fb_lB_settings['post'] )
			$gxtb_fb_lB_warning_visabilty = true;

		// Abfrage ob ein Fehler gefunden wurde
		if ( !$gxtb_fb_lB_warning_visabilty ) {
			$gxtb_fb_lB_warning["FB-Button-Settings"] = __("You must choose either frontpage, page, post, category or archive if you activate the plugin. Otherwise the Like-Button will not be displayed!", gxtb_fb_lB_lang);
			$gxtb_fb_lB_warning['warning'] += 1;
		} else {
			unset($gxtb_fb_lB_warning["FB-Button-Settings"]);
			$gxtb_fb_lB_warning['warning'] -= 1;
		}

	########## PLUGIN-POSITION - FEHLER #################

		if ( !$gxtb_fb_lB_settings['position_before'] && !$gxtb_fb_lB_settings['position_after'] ){
			$gxtb_fb_lB_warning["FB-Button-Settings (Position)"] = __("You must either choose <i>before</i> or <i>after</i> the content!", gxtb_fb_lB_lang);
			$gxtb_fb_lB_warning['warning'] += 1;
		} else {
			unset($gxtb_fb_lB_warning["FB-Button-Settings (Position)"]);
			$gxtb_fb_lB_warning['warning'] -= 1;
		}
		
#####################################################################################
							## Like-Button-Generator ##
	$gxtb_fb_lB_generator = get_option('gxtb_fb_lB_generator');
	
		if ($gxtb_fb_lB_generator['url'] == "" || !strstr($gxtb_fb_lB_generator['url'], 'http://') ){
			$gxtb_fb_lB_warning["Like-Button-Generator"] = __("You must enter a valid URL for your like-Button!", gxtb_fb_lB_lang);
			$gxtb_fb_lB_warning['warning'] += 1;
		} else {
			unset($gxtb_fb_lB_warning["Like-Button-Generator"]);
			$gxtb_fb_lB_warning['warning'] -= 1;
		}
 
#####################################################################################
							## Open Graph Protocol - Meta Tags ##
	$gxtb_fb_lB_meta = get_option('gxtb_fb_lB_meta');
	
		if ( !is_numeric($gxtb_fb_lB_meta['admins']) && !empty($gxtb_fb_lB_meta['admins']) ){
			$gxtb_fb_lB_warning["Meta Tags - Error #1"] = __('You did not enter a valid Admin-ID. Please visit <a href="http://apps.facebook.com/whatismyid/" target="_blank">this site</a> to get your Facebook-ID (which is used as Admin-ID).', gxtb_fb_lB_lang);
			$gxtb_fb_lB_warning['warning'] += 1;
		} else {
			unset($gxtb_fb_lB_warning["Meta Tags - Error #1"]);
			$gxtb_fb_lB_warning['warning'] -= 1;
		 }
		 
		if ( empty($gxtb_fb_lB_meta['admins']) && empty($gxtb_fb_lB_meta['app_id']) && empty($gxtb_fb_lB_meta['page_id']) ){
			$gxtb_fb_lB_warning["Meta Tags - Error #2"] = __('You did not enter a valid Admin-, App- or Page-ID. You have to enter at least one of this three meta-tags.', gxtb_fb_lB_lang);
			$gxtb_fb_lB_warning['warning'] += 1;
		} else {
			unset($gxtb_fb_lB_warning["Meta Tags - Error #2"]);
			$gxtb_fb_lB_warning['warning'] -= 1;
		 }
		 
		 if ( empty($gxtb_fb_lB_meta['app_id']) && $gxtb_fb_lB_settings['JDK']){
			$gxtb_fb_lB_warning["XFBML - Error #1"] = __('If you activate the XFBML you have to enter a valid App-ID.', gxtb_fb_lB_lang);
			$gxtb_fb_lB_warning['warning'] += 1;
		} else {
			unset($gxtb_fb_lB_warning["XFBML - Error #1"]);
			$gxtb_fb_lB_warning['warning'] -= 1;
		 }
	
#####################################################################################
							## Like-Button-Sidebar ##
	
	
#####################################################################################
							## FB-Analytics-Tools ##
		## Fehler-Meldung falls die REL-Definitionen nicht ausgefüllt worden sind! ##
		
		## ruft alle Optionen dieses Abschnittes ab
		$gxtb_fb_lB_analytics = get_option('gxtb_fb_lB_analytics');
	
		if ( isset($gxtb_fb_lB_analytics) && $gxtb_fb_lB_analytics['on'] ) {
		
			$gxtb_fb_lB_analytics_warn = true; // true => kein Fehler
			
			// Überprüfen ob min. eines der Felder aktiviert worden ist und der Text nicht leer ist!
			if ( $gxtb_fb_lB_analytics['frontpage_activ'] && $gxtb_fb_lB_analytics['frontpage'] == "" )
					$gxtb_fb_lB_analytics_warn = false;
			if ( $gxtb_fb_lB_analytics['category_activ'] && $gxtb_fb_lB_analytics['category'] == "" )
					$gxtb_fb_lB_analytics_warn = false;
			if ( $gxtb_fb_lB_analytics['page_activ'] && $gxtb_fb_lB_analytics['page'] == "" )
					$gxtb_fb_lB_analytics_warn = false;
			if ( $gxtb_fb_lB_analytics['post_activ'] && $gxtb_fb_lB_analytics['post'] == "" )
					$gxtb_fb_lB_analytics_warn = false;		
		
			// sollte ein Fehler existieren dann muss dieser jetzt ausgegeben werden
			if (!$gxtb_fb_lB_analytics_warn) {
				$gxtb_fb_lB_warning["FB-Analytics Tools - Error #1"] = __("If you activate the REF-Option you have to enter sth. into the REF-Boxes and activate the appropriate option (example: Archive). Because otherwise it won't work.", gxtb_fb_lB_lang);
				$gxtb_fb_lB_warning['warning'] += 1;
			 } else {
				unset($gxtb_fb_lB_warning["FB-Analytics Tools - Error #1"]);
				$gxtb_fb_lB_warning['warning'] -= 1;
			 }
			 
			 $gxtb_fb_lB_analytics_warn = true;
			 
			// Überprüfen ob min. eines der Felder aktiviert worden ist
			if ( !$gxtb_fb_lB_analytics['frontpage_activ'] && $gxtb_fb_lB_analytics['frontpage'] != "" )
					$gxtb_fb_lB_analytics_warn = false;
			if ( !$gxtb_fb_lB_analytics['category_activ'] && $gxtb_fb_lB_analytics['category'] != "" )
					$gxtb_fb_lB_analytics_warn = false;
			if ( !$gxtb_fb_lB_analytics['page_activ'] && $gxtb_fb_lB_analytics['page'] != "" )
					$gxtb_fb_lB_analytics_warn = false;
			if ( !$gxtb_fb_lB_analytics['post_activ'] && $gxtb_fb_lB_analytics['post'] != "" )
					$gxtb_fb_lB_analytics_warn = false;		
		
			// sollte ein Fehler existieren dann muss dieser jetzt ausgegeben werden
			if (!$gxtb_fb_lB_analytics_warn) {
				$gxtb_fb_lB_warning["FB-Analytics Tools - Error #2"] = __("If you enter sth. into the ref-Attribute-Box you must also activate this page.", gxtb_fb_lB_lang);
				$gxtb_fb_lB_warning['warning'] += 1;
			 } else {
				unset($gxtb_fb_lB_warning["FB-Analytics Tools - Error #2"]);
				$gxtb_fb_lB_warning['warning'] -= 1;
			 }
			 			 
		 } else { 
		 
	    	unset($gxtb_fb_lB_warning["FB-Analytics Tools - Error #1"]);
		 	unset($gxtb_fb_lB_warning["FB-Analytics Tools - Error #2"]);
			$gxtb_fb_lB_warning['warning'] -= 2;
		 
		 } // end FB-Analytics-Tools
		 
	 } // end active-abfrage-if

#####################################################################################
							## SAVE the generated warnings in this file ##
							
	// Die Warning-Option aktualisieren damit sie in der "Start"-Datei ausgelesen werden und angezeigt werden kann
	update_option('gxtb_fb_lB_warning', $gxtb_fb_lB_warning);


#####################################################################################
							## FB-Sidebar-Widget ## -> currently out of work because we don't have introduced a activation-hook for the widget [v4.0]
	
	/* include( dirname(dirname(__FILE__)) . '/include/fb_widget_warnings.php' );
	$gxtb_fb_lB_WidgetClassWarning = new gxtb_fb_lB_WidgetClassWarning();
	$gxtb_fb_lB_WidgetClassWarning -> gxtb_fb_lB_WidgetWarningCheck();
	$gxtb_fb_lB_WidgetWarningNr = $gxtb_fb_lB_WidgetClassWarning -> gxtb_fb_lB_GetMaxWarnings(); */
	$gxtb_fb_lB_WidgetWarningNr = 0;

#####################################################################################
							## calculating the max. number of warnings ##
									
	// diese globale Klassen-Variable wurde eingeführt um die Anzahl der maximalen Fehlern global definieren zu können - sehr wichtig!	
	global $gxtb_fb_lB_MaxWarnings;
	$gxtb_fb_lB_MaxWarnings = 8 + $gxtb_fb_lB_WidgetWarningNr;

	// verhindert das die Warnungen unter 0 gezählt werden oder zuviel (max)
	if ( $gxtb_fb_lB_warning['warning'] < 0 )
		$gxtb_fb_lB_warning['warning'] = 0;
		
	if ( $gxtb_fb_lB_warning['warning'] > $gxtb_fb_lB_MaxWarnings ) // Nr = Anzahl der Fehler
		$gxtb_fb_lB_warning['warning'] = $gxtb_fb_lB_MaxWarnings;
	
	// letzte Speicherung aller Daten damti die Warning-Anzahl auch stimmt
	update_option('gxtb_fb_lB_warning', $gxtb_fb_lB_warning);
} // end function



####################################################
####################################################
###########								 ###########
###########								 ###########
###########	    	WARNING-OUTPUT	     ###########
###########								 ###########
###########								 ###########
####################################################
#####################   by gb-world.net  ###########
####################################################

// Ausgabe der Warnungen auf der Optionsseite und allen anderen Seiten - nur für Admins -> derzeit für alle!
public static function gxtb_fb_warnings_output() {

	// get the warning-content
	$gxtb_fb_lB_warning = get_option('gxtb_fb_lB_warning');
	$gxtb_fb_lB_count = 0;
	
	foreach ($gxtb_fb_lB_warning as $key => $var) {
		if( $var != "" && $key != "warning" && $key != "warning_aktiv") {
			$gxtb_fb_lB_count += 1;
		} // end if
		
	} // end foreach

	if( $gxtb_fb_lB_count > 0 ) {
	
			// Ausgabe der Warnung und Zusammenbau der Warnbox
			echo "<div id='message' class='error'><p>";
				_e("Visit the FB-Like-Button Option Page (or Widget-Page) to correct all the mistakes: ", 'gb_like_button');
				echo "<strong>";
				echo sprintf( '<a href="options-general.php?page=%s">%s</a>', gxtb_fb_lB_page , __('FB-Like Button', gxtb_fb_lB_lang) );
				echo "</strong>";
				echo '<ul style="list-style-type: circle; padding-left: 1.5em;">';
			
			
			// Ausgabe der einzelnen Fehlermeldungen
			foreach ($gxtb_fb_lB_warning as $key => $var) {
		
				if (($var != "" || $var != false) && $key != "warning" && $key != "warning_aktiv" ) {
				
					echo "<li>";
					echo $var;
					echo " <small><i>[";
					echo $key;
					echo "]</i></small>";
					echo "</li>";
					
				} // end if
			} // end foreach
			
				echo "</ul>";
			echo "</p></div>";

			
	} // end if

} // end function

} // end class
} // end of Class-if
?>