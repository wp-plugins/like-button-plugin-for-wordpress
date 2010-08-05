<?php // Do not delete these lines
	if (!empty($_SERVER['SCRIPT_FILENAME']) && basename(__file__) == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');
?>
<?php
/*
+----------------------------------------------------------------+
+	Like-Button-Plugin-For-Wordpress [v3.1]
+	by Stefan Natter (http://www.gangxtaboii.com and http://www.gb-world.net)
+   required for Like-Button-Plugin-For-Wordpress and WordPress 2.7.x or higher
+----------------------------------------------------------------+
*/

####################################################
####################################################
###########								 ###########
###########								 ###########
###########	       SUBMIT-METHOD		 ###########
###########								 ###########
###########								 ###########
####################################################
##################### by ganxtaboii.com ############
####################################################
?>
<input type="hidden" name="action" value="update" />
	<input name="submit" type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />	
</form>

<form method="post" action="<?php echo  admin_url( 'options-general.php?page=fb-like-button' ); ?>">
	<input type="submit" onclick="return confirm('<?php _e('Restore default Like-Button settings?', 'gb_like_button' ); ?>');" name="reset" value="<?php _e('Restore Defaults', 'gb_like_button' ); ?>" class="button-primary"  />
</form>