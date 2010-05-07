// @Author: Stefan Natter

function gxtb_generator() {
	
	var div = document.getElementById("gxtb_fb_lB_preview");
	
	if(document.settingpage.gxtb_fb_lB_generator_faces.checked) {
		var faces = "true";
	} else {
		var faces = "false";
	}

	if(document.settingpage.gxtb_fb_lB_generator_url.value == "") {
		var url = "http://www.gb-world.net";
	} else {
		var url = document.settingpage.gxtb_fb_lB_generator_url.value;
	}

	if(document.settingpage.gxtb_fb_lB_generator_font.value == "") {
		var font = "";
	} else {
		var font = "font=" + document.settingpage.gxtb_fb_lB_generator_font.value + "&amp;";
	}
	
	div.innerHTML =
		'<iframe src="http://www.facebook.com/plugins/like.php?href=' + url +'&layout='+ document.settingpage.gxtb_fb_lB_generator_layout.value +'&amp;show_faces='+ faces +'&amp;width='+ document.settingpage.gxtb_fb_lB_generator_width.value +'&amp;action='+ document.settingpage.gxtb_fb_lB_generator_verb.value +'&amp;' + font +'colorscheme='+ document.settingpage.gxtb_fb_lB_generator_color.value +'" scrolling="no" frameborder="0" allowTransparency="true" style="border:none; overflow:hidden; width:'+ document.settingpage.gxtb_fb_lB_generator_width.value +'px; height:'+ document.settingpage.gxtb_fb_lB_generator_heigth.value +'px"></iframe>';

}