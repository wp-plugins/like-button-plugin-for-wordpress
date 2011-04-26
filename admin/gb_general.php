<?php // Do not delete these lines
	if (!empty($_SERVER['SCRIPT_FILENAME']) && basename(__file__) == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');
?>
<?php
/*
+----------------------------------------------------------------+
+	Like-Button-Plugin-For-Wordpress [v4.3.3] - GB-General-Page [v0.3.1 - FINAL]
+	by Stefan Natter (http://www.gb-world.net)
+   required for Like-Button-Plugin-For-Wordpress and WordPress 2.7.x or higher
+----------------------------------------------------------------+
*/
####################################################
####################################################
###########								 ###########
###########								 ###########
###########	       Like-Button-General	 ###########
###########								 ###########
###########								 ###########
####################################################
####################### by gb-world.net ############
####################################################
if (!class_exists('gxtb_gb_general')) {
class gxtb_gb_general {
	
	var $metacontent;	
	var $GBLikeButton;
	
function gxtb_gb_general() {
	$this->GBLikeButton = get_option('GBLikeButton');
	$this->metacontent = new metacontent($this->GBLikeButton);
}

function gxtb_gb_settings() {

$this->GBLikeButton = get_option('GBLikeButton');
?>
<table class="form-table" border="0" id="gb-table">
	<tbody>
		<tr>
            <td width="20%" rowspan="2" valign="top" class="gb-table-header">
				<strong>
					<?php _e('FB-Button-Settings', gxtb_fb_lB_lang); ?>
				</strong>
			</td>		
            <td width="80%" valign="bottom">
			<!-- Tabs-Menue -->
		<div class="ui-tabs-panel ui-widget-content ui-corner-bottom ui-tabs ui-widget ui-corner-all" id="tabs_general">
			<ul class="ui-tabs-nav ui-helper-reset ui-helper-clearfix ui-widget-header ui-corner-all">
				<li class="ui-state-default ui-corner-top ui-tabs-selected ui-state-active ui-state-focus">
					<a href="#tabs-1" class="ui-state-default ui-corner-top">
						<?php _e('General Settings', gxtb_fb_lB_lang); ?>
					</a>
				</li>
				<li class="ui-state-default ui-corner-top">
					<a href="#tabs-2" class="ui-state-default ui-corner-top">
						<?php _e('Position Settings', gxtb_fb_lB_lang); ?>
					</a>
				</li>
				<li class="ui-state-default ui-corner-top">
					<a href="#tabs-3" class="ui-state-default ui-corner-top">
						<?php _e('Special Settings', gxtb_fb_lB_lang); ?>
					</a>
				</li>
			</ul>
			<!-- /Tabs-Menue -->
			
			<!-- Tabs-Content -->
			<div class="ui-tabs-panel ui-widget-content ui-corner-bottom" id="tabs-1"><table class="form-table">
					<?php $this->metacontent -> tab1(); ?>
			</table></div>
			<div class="ui-tabs-panel ui-widget-content ui-corner-bottom ui-tabs-hide" id="tabs-2"><table class="form-table">
					<?php $this->metacontent -> tab2(); ?>
			</table></div>
			<div class="ui-tabs-panel ui-widget-content ui-corner-bottom ui-tabs-hide" id="tabs-3"><table class="form-table">
					<?php $this->metacontent -> tab3(); ?>
			</table></div>

			<!-- /Tabs-Content -->
		</div>
             </td>
        </tr>
        <tr>
            <td class="gb-table-tipp">
			</td>
        </tr>
	</tbody>
</table>
<?php
} // end function

####################################################
####################################################
###########								 ###########
###########								 ###########
###########	      GENERATOR-FUNC		 ###########
###########								 ###########
###########								 ###########
####################################################
###################### by gb-world.net #############
####################################################
function gxtb_gb_generator() {
?>
<table class="form-table" border="0" id="gb-table-generator">
		        <tbody>
           			<tr>
                    	<td width="20%" rowspan="2" valign="top" class="gb-table-header">
							<strong>
								<?php _e('Generator', gxtb_fb_lB_lang); ?>
							</strong>
						</td>
                        <td width="80%" valign="bottom">
								<!-- Tabs -->
		<div class="ui-tabs-panel ui-widget-content ui-corner-bottom ui-tabs ui-widget ui-corner-all" id="tabs_generator">
			<ul class="ui-tabs-nav ui-helper-reset ui-helper-clearfix ui-widget-header ui-corner-all">
				<li class="ui-state-default ui-corner-top ui-tabs-selected ui-state-active ui-state-focus"><a href="#tabs-5" class="ui-state-default ui-corner-top"><?php _e('General Settings', gxtb_fb_lB_lang); ?></a></li>
				<li class="ui-state-default ui-corner-top"><a href="#tabs-6" class="ui-state-default ui-corner-top"><?php _e('Design', gxtb_fb_lB_lang); ?></a></li>
				<li class="ui-state-default ui-corner-top"><a href="#tabs-7" class="ui-state-default ui-corner-top"><?php _e('iFrame Settings', gxtb_fb_lB_lang); ?></a></li>
			</ul>
			<div class="ui-tabs-panel ui-widget-content ui-corner-bottom" id="tabs-5">
			<table class="form-table">
			 <tr>
                    	<td width="20%" rowspan="2" valign="top" class="gb-table-header">
							<strong>
								<?php _e('Wordpress-Domain-URL', gxtb_fb_lB_lang); ?>
							</strong>
						</td>
                        <td width="80%" valign="bottom">
							<input name="gxtb_fb_lB_generator_url" type="text" onchange="gxtb_generator()" value="<?php if(isset($this->GBLikeButton['Generator']['url']) && $this->GBLikeButton['Generator']['url'] != "") {echo $this->GBLikeButton['Generator']['url'];} else {echo home_url();} ?>" size="30"/><br />
							<small>
								<?php _e('(Example: http://www.gb-world.net)', gxtb_fb_lB_lang); ?>
								<br /><br /><b><?php _e('Changes since 10th of September 2010:', gxtb_fb_lB_lang); ?></b><br />
								<?php _e('You can now also like your Facebook Pages and Application. Just enter the URL to your Facebook Page or Application (for example: <a href="http://www.facebook.com/gbworldnet" target="_blank">http://www.facebook.com/gbworldnet</a>)', gxtb_fb_lB_lang); ?><br />
                                <?php _e('If you like to add <b>dynamic Like-Buttons</b> you have to enter your <b>domain-url</b> if you would like to use this URL as the Like-Button source for <b>every Button</b> you can enter every URL you want.', gxtb_fb_lB_lang); ?>
							</small>
                         </td>
                    </tr>
                    <tr>
                        <td class="gb-table-tipp">
						</td>
                    </tr>

					<tr>
                    	<td width="20%" rowspan="2" valign="top" class="gb-table-header">
							<strong>
								<?php _e('Send Button', gxtb_fb_lB_lang); ?>
							</strong>
						</td>
                        <td width="80%" valign="bottom">
						<input name="gxtb_fb_lB_generator_send" type="checkbox" class="checkbox" onchange="gxtb_generator()" <?php if ( isset($this->GBLikeButton['Generator']['send']) && $this->GBLikeButton['Generator']['send']) echo("checked"); ?>  value="1"/>
							
                         </td>
                    </tr>
                    <tr>
                        <td class="gb-table-tipp">
						</td>
                    </tr>

					<tr>
                    	<td width="20%" rowspan="2" valign="top" class="gb-table-header">
							<strong>
								<?php _e('Layout Style', gxtb_fb_lB_lang); ?>
								<br /><br />
								<?php _e('Show Faces?', gxtb_fb_lB_lang); ?>
							</strong>
						</td>
                        <td width="80%" valign="bottom">
							<SELECT NAME="gxtb_fb_lB_generator_layout" onchange="gxtb_generator()">
								<?php
								$i = array( "standard", "button_count", "box_count" );
								  foreach($i as $variable) {
									if($variable == $this->GBLikeButton['Generator']['layout'] && isset($this->GBLikeButton['Generator']['layout'])) {
										echo '<OPTION selected>' . $variable .'</OPTION>';
									} else {
										echo '<OPTION>' . $variable .'</OPTION>';
									}
								}
								?>
							</SELECT>
							<br /><br />
						<input name="gxtb_fb_lB_generator_faces" type="checkbox" class="checkbox" onchange="gxtb_generator()" <?php if ( isset($this->GBLikeButton['Generator']['faces']) && $this->GBLikeButton['Generator']['faces']) echo("checked"); ?>  value="1"/>
							
                         </td>
                    </tr>
                    <tr>
                        <td class="gb-table-tipp">
						</td>
                    </tr>
					<tr>
                    	<td width="20%" rowspan="2" valign="top" class="gb-table-header">
							<strong>
								<?php _e('Verb to display', gxtb_fb_lB_lang); ?>
							</strong>
						</td>
                        <td width="80%" valign="top">
					<SELECT NAME="gxtb_fb_lB_generator_verb" onchange="gxtb_generator()">
					<?php
					$i = array( "like", "recommend" );
					  foreach($i as $variable) {
						if($variable == $this->GBLikeButton['Generator']['verb'] && isset($this->GBLikeButton['Generator']['verb']) ) {
							echo '<OPTION selected>' . $variable .'</OPTION>';
						} else {
							echo '<OPTION>' . $variable .'</OPTION>';
						}
					}
					?>
					</SELECT>
                         </td>
                    </tr>
                    <tr>
                        <td class="gb-table-tipp">
						</td>
                    </tr>
			</table>
			
			</div>
			<div class="ui-tabs-panel ui-widget-content ui-corner-bottom ui-tabs-hide" id="tabs-6"><table class="form-table">
			 <tr>
                    	<td width="20%" rowspan="2" valign="top" class="gb-table-header">
							<strong>
								<?php _e('Width', gxtb_fb_lB_lang); ?>
								<br />
								<?php _e('Height', gxtb_fb_lB_lang); ?>
							</strong>
						</td>
                        <td width="80%" valign="top">
						<input name="gxtb_fb_lB_generator_width" type="text" onchange="gxtb_generator()" value="<?php if (isset($this->GBLikeButton['Generator']['width']) && $this->GBLikeButton['Generator']['width'] != "") {echo $this->GBLikeButton['Generator']['width'];} else {echo "";} ?>" size="4" maxlength="4"/> px <small>(<?php _e('Default', gxtb_fb_lB_lang); ?>: 250 px)</small>
							<br />
							<input name="gxtb_fb_lB_generator_height" type="text" onchange="gxtb_generator()" value="<?php if (isset($this->GBLikeButton['Generator']['height']) && $this->GBLikeButton['Generator']['height'] != "") {echo $this->GBLikeButton['Generator']['height'];} else {echo "";} ?>" size="4" maxlength="4"/> px <small>(<?php _e('Default', gxtb_fb_lB_lang); ?>: 100 px)</small>
                         </td>
                    </tr>
                    <tr>
                        <td class="gb-table-tipp">
						</td>
                    </tr>
					 <tr>
                    	<td width="20%" rowspan="2" valign="top" class="gb-table-header">
							<strong>
								<?php _e('Like-Button-Design', gxtb_fb_lB_lang); ?>
							</strong>
						</td>
                        <td width="80%" valign="top">
					<p><label><?php _e('Color Scheme', gxtb_fb_lB_lang); ?><br />
					<SELECT NAME="gxtb_fb_lB_generator_color" onchange="gxtb_generator()">
					<?php
					$i = array( "light", "dark" );
					  foreach($i as $variable) {
						if($variable == $this->GBLikeButton['Generator']['color'] && isset($this->GBLikeButton['Generator']['color'])) {
							echo '<OPTION selected>' . $variable .'</OPTION>';
						} else {
							echo '<OPTION>' . $variable .'</OPTION>';
						}
					}
					?>
					</SELECT>
			</label></p>
            
			<p><label><?php _e('Font', gxtb_fb_lB_lang); ?><br />
					<SELECT NAME="gxtb_fb_lB_generator_font" onchange="gxtb_generator()">
					<?php
					$i = array( "" ,"arial", "luciada grande", "segoe ui", "tahoma", "trebuchet ms", "verdana" );
					  foreach($i as $variable) {
						if($variable == $this->GBLikeButton['Generator']['font'] && isset($this->GBLikeButton['Generator']['font'])) {
							echo '<OPTION selected>' . $variable .'</OPTION>';
						} else {
							echo '<OPTION>' . $variable .'</OPTION>';
						}
					}
					?>
					</SELECT>
			</label></p>
                         </td>
                    </tr>
                    <tr>
                        <td class="gb-table-tipp">
						</td>
                    </tr>
					
			</table></div>
			
			<div class="ui-tabs-panel ui-widget-content ui-corner-bottom ui-tabs-hide" id="tabs-7">				
				<table class="form-table">
				<tr>
                    	<td width="20%" rowspan="2" valign="top" class="gb-table-header">
							<strong>
								<?php _e('Like-Button-Design', gxtb_fb_lB_lang); ?>
							</strong>
						</td>
                        <td width="80%" valign="top">
<!-- BEGIN generator-settings for the iframe -->
<div id="xtraIframe" style="visibility:visible">          
          <p><label><?php _e('Scrolling', gxtb_fb_lB_lang); ?><br />
					<input name="gxtb_fb_lB_generator_scrolling" <?php if($this->GBLikeButton['General']['jdk']) { echo "disabled"; }?> type="checkbox" class="checkbox" onchange="gxtb_generator()" <?php if ($this->GBLikeButton['Generator']['scrolling']) echo("checked"); ?>  value="1"/>
			</label></p>

          <p><label><?php _e('Frameborder', gxtb_fb_lB_lang); ?><br />
					<input name="gxtb_fb_lB_generator_frameborder" <?php if($this->GBLikeButton['General']['jdk']) { echo "disabled"; }?>  type="text" onchange="gxtb_generator()" value="<?php if ($this->GBLikeButton['Generator']['frameborder'] != "") {echo $this->GBLikeButton['Generator']['frameborder'];} else {echo "";} ?>" size="4" maxlength="4"/>px
			</label></p>

          <p><label><?php _e('Style (of the Border)', gxtb_fb_lB_lang); ?><br />
					<input name="gxtb_fb_lB_generator_borderstyle" <?php if($this->GBLikeButton['General']['jdk']) { echo "disabled"; }?>  type="text" onchange="gxtb_generator()" value="<?php if ($this->GBLikeButton['Generator']['borderstyle'] != "") {echo $this->GBLikeButton['Generator']['borderstyle'];} else {echo "";} ?>" size="20" maxlength="20"/><br />
					<?php _e('Example: none or solid', gxtb_fb_lB_lang); ?>
			</label></p>

          <p><label><?php _e('Overflow', gxtb_fb_lB_lang); ?></label><br />
					<select name="gxtb_fb_lB_generator_overflow" <?php if($this->GBLikeButton['General']['jdk']) { echo "disabled"; }?>  onchange="gxtb_generator()">
					<?php
					$i = array( "hidden", "scroll");
					  foreach($i as $variable) {
						if($variable == $this->GBLikeButton['Generator']['overflow']) {
							echo '<OPTION selected>' . $variable .'</OPTION>';
						} else {
							echo '<OPTION>' . $variable .'</OPTION>';
						}
					}
					?>
					</select>
             </p>

          <p><label><?php _e('Allow Transparency', gxtb_fb_lB_lang); ?><br />
					<input name="gxtb_fb_lB_generator_trans" <?php if($this->GBLikeButton['General']['jdk']) { echo "disabled"; }?>  type="checkbox" class="checkbox" onchange="gxtb_generator()" <?php if ($this->GBLikeButton['Generator']['trans']) echo("checked"); ?> value="1" />
			</label></p>
</div>
<div id="iframe_info" style="visibility:visible"><small>
	<?php if ($this->GBLikeButton['General']['jdk']) { _e('You do not need this disabled options if you use the XFBML (Java-SDK).', gxtb_fb_lB_lang); } ?></small>
</div>
<!-- END generator-settings for the iframe -->
                         </td>
                    </tr>
                    <tr>
                        <td class="gb-table-tipp">
						</td>
                    </tr>
					
			</table>
				
			</div>

		</div>
                         </td>
                    </tr>
                    <tr>
                        <td class="gb-table-tipp">
						</td>
                    </tr>
<?php //} ?>
					<tr>
                    	<td width="20%" rowspan="2" valign="top" class="gb-table-header-preview"><br />
							<strong>
<p><b><?php _e('iFrame-Preview', gxtb_fb_lB_lang); ?></b> <img src="<?php echo gxtb_fb_lB_PLUGIN_FOLDER; ?>/images/rot17a.gif"  onmouseover="tooltip.show('<?php _e('It will show a preview of a iFrame-FB-Like-Button. If XFBML (Java-SDK) is enabled it will act a little bit different like this preview. Because the preview is always without XFBML (Java-SDK).', gxtb_fb_lB_lang); ?>');" onmouseout="tooltip.hide();"></p>
<p><b><?php echo sprintf( '%s <a href="admin.php?page=fb-like-button#tabs-6">%s</a>.',  __('Do not forget to set the height and width of your Like Button under the', gxtb_fb_lB_lang), __('Design-Tab', gxtb_fb_lB_lang)); ?></b></p>
							</strong>
						</td>
                        <td width="80%" valign="bottom"><br />
							<div id="gxtb_fb_lB_preview"></div>
							<script type="text/javascript"> gxtb_generator(); </script>
                         </td>
                    </tr>
                    <tr>
                        <td class="gb-table-tipp">
						</td>
                    </tr>

					
			</tbody>
</table>
<?php
} // end function
} // end class

####################################################
####################################################
###########								 ###########
###########								 ###########
###########	      SETTINGS-CONTENT		 ###########
###########								 ###########
###########								 ###########
####################################################
###################### by gb-world.net #############
####################################################
if(!class_exists('metacontent')) {
class metacontent {
var $GBLikeButton;
function metacontent($GBLikeButton) {
	$this->GBLikeButton = $GBLikeButton;
}	
############################################################################### 
#################################### TAB 1 #################################### 
############################################################################### 
function tab1() {
?>
                    <tr>
                    	<td width="20%" rowspan="2" valign="middle" class="gb-table-header"><strong><?php _e('Activate the Like-Button', gxtb_fb_lB_lang) ?></strong></td>
                        <td width="80%" valign="bottom">
                        	<input type="checkbox" class="checkbox" name="general_on" 
							<?php 
							if (isset($this->GBLikeButton['General']['on']) && $this->GBLikeButton['General']['on'] == 1) {
								echo("checked");
							} ?> value="1" /> 
                            <img src="<?php echo gxtb_fb_lB_PLUGIN_FOLDER; ?>images/rot17a.gif"  onmouseover="tooltip.show('<?php _e('Activate this checkbox if you want that your Like-Button appears on your blog.', gxtb_fb_lB_lang); ?>');" onmouseout="tooltip.hide();">
                         </td>
                    </tr>
                    <tr>
                        <td class="gb-table-tipp"><small><?php _e('Activate this option if you want to activate the Like-Button for your Blog', gxtb_fb_lB_lang) ?></small></td>
                    </tr>
                   <tr>
                    	<td width="20%" rowspan="2" valign="top" class="gb-table-header"><strong><?php _e('Activate XFBML (JavaScript SDK)', gxtb_fb_lB_lang) ?></strong></td>
                        <td width="80%" valign="bottom">
                        	<input type="checkbox" onchange="post_focus();" class="checkbox" name="general_jdk" id="gxtb_fb_lB_jdk" value="1" <?php if (isset($this->GBLikeButton['General']['jdk']) && $this->GBLikeButton['General']['jdk']) {echo("checked"); } ?> /> 
                             <img src="<?php echo gxtb_fb_lB_PLUGIN_FOLDER; ?>images/rot17a.gif"  onmouseover="tooltip.show('<?php _e('For some additional functions of the Like-Button you need this Java-Enviroment. Read more at the FAQ.', gxtb_fb_lB_lang); ?>');" onmouseout="tooltip.hide();">
                         </td>
                    </tr>
                    <tr>
                        <td class="gb-table-tipp">
							<small>
								<?php _e('Activate this option if you want to enable all the FB-Like-Button-Functions which are available.', gxtb_fb_lB_lang) ?><br />
								<?php _e('<b>Notice:</b> You must have a valid AppID if you want to use XFBML (JavaScript SDK).', gxtb_fb_lB_lang) ?><br />
                                <?php _e('<b>Important:</b> If you do not activate the XFBML your Like-Button will be inside of a iFrame (see FAQ).', gxtb_fb_lB_lang) ?>
							</small>
						</td>
                    </tr>
					<tr>
						 <td width="20%" rowspan="2" valign="top" id="xfbml_mod1" class="gb-table-header" style="display:table-cell;"><strong><?php _e('XFBML-Modification', gxtb_fb_lB_lang) ?></strong></td>
						 <td width="80%" valign="bottom" id="xfbml_mod2" style="display:table-cell;">
								<?php
								echo "<img class='gxtb_image' src=". get_bloginfo('wpurl') ."/wp-content/plugins/like-button-plugin-for-wordpress/screenshot-2.png width='400px'></img><br><br>";
								_e('You have to enter this two attributes to the &lt;head&gt;-tag in your &quot;Template-header.php&quot;-file.', gxtb_fb_lB_lang);
								echo " (<b><small>" . __('your file', gxtb_fb_lB_lang) . ": <u><a href='" .  get_bloginfo('template_url') . "/header.php" . "'>" . get_bloginfo('template_url') . "/header.php</a>)</u></small></b>";
								echo "<br><br><b>";
								echo "xmlns:og=&quot;http://ogp.me/ns#&quot;";
								echo "<br>";
								echo "xmlns:fb=&quot;http://www.facebook.com/2008/fbml&quot;";
								echo "</b><br><br>";
								_e('If you do not do this the Open-Graph-Protocol will not work with all its functions.', gxtb_fb_lB_lang); 
								?>
						</td>
					</tr>
					<tr>
                        <td class="gb-table-tipp">
						</td>
                    </tr><tr>
                    	<td width="20%" rowspan="2" valign="top" class="gb-table-header"><strong><?php _e('Post-Specific Button <small>(Dynamic Buttons)</small>', gxtb_fb_lB_lang) ?></strong></td>
                        <td width="80%" valign="middle">
					<input name="general_dynamic" type="checkbox" class="checkbox" <?php if (isset($this->GBLikeButton['General']['dynamic']) && $this->GBLikeButton['General']['dynamic']) echo("checked"); ?> value="1"/> 
                    <img src="<?php echo gxtb_fb_lB_PLUGIN_FOLDER; ?>/images/rot17a.gif"  onmouseover="tooltip.show('<?php _e('Read the instructions below please. This is an important option.', gxtb_fb_lB_lang); ?>');" onmouseout="tooltip.hide();">
                         </td>
                    </tr>
                    <tr>
                        <td class="gb-table-tipp">
						<small>
			<u><?php _e('Activated', gxtb_fb_lB_lang); ?>:</u> <?php _e('Every Post/Page has its own Like-Button. Which means for every page on your side there will be a unique Like-Button.', gxtb_fb_lB_lang); ?> <?php _e('(recommended)', gxtb_fb_lB_lang); ?><br />
				<u><?php _e('Deactivated', gxtb_fb_lB_lang); ?>:</u> <?php _e('Every Post/Page has the same Like-Button. Which means if you click on it, it looks like you like/recommend every post even if you have not read it before.', gxtb_fb_lB_lang); ?>
            		</small>
						</td>
                    </tr>
					
					<!--<tr><td colspan="2"><HR SIZE=1></td></tr>-->
					
                    <tr>
                    	<td width="20%" rowspan="2" valign="top" class="gb-table-header"><strong><?php _e('Language', gxtb_fb_lB_lang); ?></strong></td>
                        <td width="80%" valign="middle">
					<input name="general_language" type="text" value="<?php if (isset($this->GBLikeButton['General']['language']) && $this->GBLikeButton['General']['language'] != "") {echo $this->GBLikeButton['General']['language'];} else {echo "en_US";} ?>" size="6" maxlength="6"/> 
                    <img src="<?php echo gxtb_fb_lB_PLUGIN_FOLDER; ?>/images/rot17a.gif"  onmouseover="tooltip.show('<?php _e('You only need this if you activate XFBML (Java-SDK)', gxtb_fb_lB_lang); ?>');" onmouseout="tooltip.hide();">
                         </td>
                    </tr>
                    <tr>
                        <td class="gb-table-tipp">
						<small><?php _e('You only have to choose this option if you activate <b>XFBML (Java-SDK)</b> and if you have a valid AppID. Otherwise the FB-Like-Button chooses its language by itself.', gxtb_fb_lB_lang); ?><br />
                <?php _e('<b>Examples:</b> All available languages could be looked up here: <a href="http://www.facebook.com/translations/FacebookLocales.xml" target="_blank">FacebookLocales</a>', gxtb_fb_lB_lang); ?><br />
                <?php _e('<b>Default:</b> en_US', gxtb_fb_lB_lang); ?>
            		</small>
						</td>
                    </tr>
                    
                    <tr>
                    	<td width="20%" rowspan="2" valign="top" class="gb-table-header"><strong><?php _e('Activate the Meta-Tag Output', gxtb_fb_lB_lang) ?></strong></td>
                        <td width="80%" valign="middle">
					<input name="opengraph_on" type="checkbox" class="checkbox" <?php if (isset($this->GBLikeButton['OpenGraph']['on']) && $this->GBLikeButton['OpenGraph']['on']) echo("checked"); ?> value="1"/> 
                    <img src="<?php echo gxtb_fb_lB_PLUGIN_FOLDER; ?>/images/rot17a.gif"  onmouseover="tooltip.show('<?php _e('It is not recommended to deactivate the OpenGraph Output because the Plugin generates very individual and very dynamic OpenGraph Tags.', gxtb_fb_lB_lang); ?>');" onmouseout="tooltip.hide();">
                         </td>
                    </tr>
                    <tr>
                        <td class="gb-table-tipp">
						<small>
			<u><?php _e('Information', gxtb_fb_lB_lang); ?>:</u> <?php _e('Deactivate this Option if another Plugin already creates the OpenGraph Metatags or you just do not need/want it.', gxtb_fb_lB_lang); ?> 
            		</small>
						</td>
                    </tr>
					
					<!--<tr><td colspan="2"><HR SIZE=1></td></tr>-->
<?php }
############################################################################### 
#################################### TAB 2 #################################### 
############################################################################### 
function tab2() {
?>
                    <tr>
                    	<td width="20%" rowspan="2" valign="middle" class="gb-table-header"><strong><?php _e('Like-Button-Position', gxtb_fb_lB_lang) ?></strong></td>
                        <td width="80%" valign="middle">
						<input type="checkbox" class="checkbox" name="general_position_before" <?php if (isset($this->GBLikeButton['General']['position_before']) && $this->GBLikeButton['General']['position_before']) echo("checked"); ?>  value="1" /> <?php _e('Before the Content', gxtb_fb_lB_lang)?><br />
						<input type="checkbox" class="checkbox" name="general_position_after" <?php if (isset($this->GBLikeButton['General']['position_after']) && $this->GBLikeButton['General']['position_after']) echo("checked"); ?>  value="1" /> <?php _e('After the Content', gxtb_fb_lB_lang)?><br />
                         </td>
                    </tr>
                    <tr>
                        <td class="gb-table-tipp"><small><?php _e('Choose the position of your Like-Button.', gxtb_fb_lB_lang) ?></small></td>
                    </tr>
					
					<!--<tr><td colspan="2"><HR SIZE=1></td></tr>-->
					
					<tr>
                    	<td width="20%" rowspan="2" valign="middle" class="gb-table-header"><strong><?php _e('Add the Like-Button in the Footer', gxtb_fb_lB_lang) ?></strong> <img src="<?php echo gxtb_fb_lB_PLUGIN_FOLDER; ?>images/rot17a.gif"  onmouseover="tooltip.show('<?php _e('This may not work with all themes. Report any bugs with your themes in our forum or bugtracker please. thanks.', gxtb_fb_lB_lang); ?>');" onmouseout="tooltip.hide();"></td>
                        <td width="80%" valign="bottom">
                         <input type="checkbox" class="checkbox" name="general_addfooter_activate" <?php if (isset($this->GBLikeButton['General']['addfooter_activate']) && $this->GBLikeButton['General']['addfooter_activate']) echo("checked"); ?>  value="1" />
                             <select name="general_addfooter">
                                  <option <?php if(isset($this->GBLikeButton['General']['addfooter']) && $this->GBLikeButton['General']['addfooter'] == __('Before the Footer', gxtb_fb_lB_lang)) echo "selected"; ?> ><?php _e('Before the Footer', gxtb_fb_lB_lang) ?></option>
                                  <option <?php if(isset($this->GBLikeButton['General']['addfooter']) && $this->GBLikeButton['General']['addfooter'] == __('After the Footer', gxtb_fb_lB_lang)) echo "selected"; ?> ><?php _e('After the Footer', gxtb_fb_lB_lang) ?></option>
   							 </select>
                         </td>
                    </tr>
                    <tr>
                        <td class="gb-table-tipp"><small><?php _e('Activate this option if you want to activate the Like-Button for your Blog', gxtb_fb_lB_lang) ?></small></td>
                    </tr>
					
					<!--<tr><td colspan="2"><HR SIZE=1></td></tr>-->
					
					 <tr>
                    	<td width="20%" rowspan="2" valign="middle" class="gb-table-header"><strong><?php _e('Show the Like-Button on every', gxtb_fb_lB_lang) ?></strong></td>
                        <td width="80%" valign="bottom">
						
						<table border="1" cellspacing="0" cellpadding="0">
							<tr>
								<td valign="bottom">
									<input type="checkbox" class="checkbox" name="general_frontpage" <?php if (isset($this->GBLikeButton['General']['frontpage']) && $this->GBLikeButton['General']['frontpage']) echo("checked"); ?>  value="1" /> <?php _e('Front-Page', gxtb_fb_lB_lang) ?>
								</td>
							</tr>                         
							<tr>
								<td valign="bottom">							
                        			<input type="checkbox" class="checkbox" name="general_page" <?php if (isset($this->GBLikeButton['General']['page']) && $this->GBLikeButton['General']['page']) echo("checked"); ?>  value="1" /> <?php _e('Page', gxtb_fb_lB_lang) ?>
								</td>
								<td valign="bottom">
								<?php _e('Exclude IDs', gxtb_fb_lB_lang) ?>: <input name="general_page_exclude" type="text" value="<?php if (isset($this->GBLikeButton['General']['page_exclude']) && $this->GBLikeButton['General']['page_exclude'] != "") { echo stripslashes($this->GBLikeButton['General']['page_exclude']); } else {echo "";} ?>" size="10" /> <small><?php _e('Example', gxtb_fb_lB_lang) ?>: <?php _e('1,84', gxtb_fb_lB_lang) ?></small>
								</td>
							</tr>
							<tr>
								<td valign="bottom">							
									<input type="checkbox" class="checkbox" name="general_post" <?php if (isset($this->GBLikeButton['General']['post']) && $this->GBLikeButton['General']['post']) echo("checked"); ?> value="1"  /> <?php _e('Post', gxtb_fb_lB_lang) ?>
								</td>
								<td valign="bottom">
								<?php _e('Exclude IDs', gxtb_fb_lB_lang) ?>: <input name="general_post_exclude" type="text" value="<?php if (isset($this->GBLikeButton['General']['post_exclude']) && $this->GBLikeButton['General']['post_exclude'] != "") { echo stripslashes($this->GBLikeButton['General']['post_exclude']); } else {echo "";} ?>" size="10" /> <small><?php _e('Example', gxtb_fb_lB_lang) ?>: <?php _e('55,56', gxtb_fb_lB_lang) ?></small>
								</td>
							</tr>
							<tr>
								<td valign="bottom">							
									<input type="checkbox" class="checkbox" name="general_category" <?php if (isset($this->GBLikeButton['General']['category']) && $this->GBLikeButton['General']['category']) echo("checked"); ?> value="1" /> <?php _e('Category', gxtb_fb_lB_lang) ?> <img src="<?php echo gxtb_fb_lB_PLUGIN_FOLDER; ?>images/rot17a.gif"  onmouseover="tooltip.show('<?php _e('Some themes have problems to display our generated Like-Button on this kind of Site. Please report this in our Forum if you have a problem with your current theme. We will then try to help you to fix that problem.', gxtb_fb_lB_lang); ?>');" onmouseout="tooltip.hide();">
								</td>
								<td valign="bottom">
								<?php _e('Exclude IDs', gxtb_fb_lB_lang) ?>: <input name="general_category_exclude" type="text" value="<?php if (isset($this->GBLikeButton['General']['category_exclude']) && $this->GBLikeButton['General']['category_exclude'] != "") { echo stripslashes($this->GBLikeButton['General']['category_exclude']); } else {echo "";} ?>" size="10" /> <small><?php _e('Example', gxtb_fb_lB_lang) ?>: <?php _e('22,36', gxtb_fb_lB_lang) ?></small>
								</td>
							</tr>
							<tr>
								<td valign="bottom">							
									<input type="checkbox" class="checkbox" name="general_archiv" <?php if (isset($this->GBLikeButton['General']['archiv']) && $this->GBLikeButton['General']['archiv']) echo("checked"); ?>  value="1" /> <?php _e('Archive', gxtb_fb_lB_lang) ?> <img src="<?php echo gxtb_fb_lB_PLUGIN_FOLDER; ?>images/rot17a.gif"  onmouseover="tooltip.show('<?php _e('Some themes have problems to display our generated Like-Button on this kind of Site. Please report this in our Forum if you have a problem with your current theme. We will then try to help you to fix that problem.', gxtb_fb_lB_lang); ?>');" onmouseout="tooltip.hide();">
								</td>
								<td valign="bottom">
								<?php _e('Exclude IDs', gxtb_fb_lB_lang) ?>: <input name="general_archiv_exclude" type="text" value="<?php if (isset($this->GBLikeButton['General']['archiv_exclude']) && $this->GBLikeButton['General']['archiv_exclude'] != "") { echo stripslashes($this->GBLikeButton['General']['archiv_exclude']); } else {echo "";} ?>" size="10"/> <small><?php _e('Example', gxtb_fb_lB_lang) ?>: <?php _e('3,83', gxtb_fb_lB_lang) ?></small>
								</td>
							</tr>
						</table>	
							
                         </td>
                    </tr>
					 
                    <tr>
                        <td class="gb-table-tipp"><small><?php _e('Activate this option if you want to activate the Like-Button on every selected post, page...', gxtb_fb_lB_lang) ?></small></td>
                    </tr>
<?php }

############################################################################### 
#################################### TAB 3 #################################### 
############################################################################### 

function tab3() {
?>
                   <tr>
                    	<td width="20%" rowspan="2" valign="top" class="gb-table-header"><strong><?php _e('Shortcode-Only', gxtb_fb_lB_lang) ?></strong></td>
                        <td width="80%" valign="bottom">
                        	<input type="checkbox" class="checkbox" name="general_shortcode" id="general_shortcode" <?php if (isset($this->GBLikeButton['General']['shortcode']) && $this->GBLikeButton['General']['shortcode']) {echo("checked"); } ?> value="1"/> 
                             <img src="<?php echo gxtb_fb_lB_PLUGIN_FOLDER; ?>images/rot17a.gif"  onmouseover="tooltip.show('<?php _e('If you activate this option it is possible to use the Shortcode only and you do not have to set a position of the like button because no like button will appear except you use the shortcode.', gxtb_fb_lB_lang); ?>');" onmouseout="tooltip.hide();">
                         </td>
                    </tr>
                    <tr>
                        <td class="gb-table-tipp">
							<small><b>
								<?php _e('only the Shortcode will work if you activate this option (ShortCode-Only-Modus)! Notice: The SideBar-Widget will work beside the Shortcode-Only-Modus!', gxtb_fb_lB_lang) ?><br />
							</b></small>
						</td>
                    </tr>	
<?php
} // end function
} // end class
} // end if-class
} // end if-class
?>