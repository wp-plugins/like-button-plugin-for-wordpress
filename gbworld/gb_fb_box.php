<?php // Do not delete these lines
	if (!empty($_SERVER['SCRIPT_FILENAME']) && basename(__file__) == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');
?>
<?php 
/*
+----------------------------------------------------------------+
+	GB-World-FB-Box [v1.1]
+	by Stefan Natter (http://www.gangxtaboii.com and http://www.gb-world.net)
+   required for GB-World-WP-Plugins
+----------------------------------------------------------------+
*/

/* notice: http://www.noupe.com/jquery/the-power-of-wordpress-and-jquery-30-useful-plugins-tutorials.html */

####################################################
####################################################
###########								 ###########
###########								 ###########
###########	     SUPPORT-CLASS			 ###########
###########								 ###########
###########								 ###########
####################################################
##################### by gb-world.net   ############
####################################################

if (!class_exists('gxtb_FBClass')) {

class gxtb_FBClass {

function gxtb_FBClass() {}


function gxtb_get_box() {

?>

<div id="gxtb_like_box"></div>
<script>
	gb_world_box();
</script>

<?php
}

} // end class
} // end if-class
?>