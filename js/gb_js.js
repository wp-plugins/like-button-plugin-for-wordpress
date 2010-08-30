// ####################################################### \\

// @Author: Stefan Natter
// Version 1.0
// http://www.gb-world.net
// for the WP-Plugin: Like-Button-Plugin-For-Wordpress by Stefan Natter

// ####################################################### \\

<!-- ======================== SCRIPT ======================== -->

$(document).ready(function(){$('#tabs1').tabs();$('#tabs2').tabs();$('#tabs3').tabs();$('#dialog_link,ul#icons li').hover(function(){$(this).addClass('ui-state-hover')},function(){$(this).removeClass('ui-state-hover')});});$(window).load(function(){$("a.fancylink").fancybox();$("a.fancylink_iframe").fancybox({'width':'75%','height':'75%','autoScale':false,'transitionIn':'none','transitionOut':'none','type':'iframe'});});function submitenter(myfield,e){var keycode;if(window.event)keycode=window.event.keyCode;else if(e)keycode=e.which;else return true;if(keycode==13){myfield.form.submit();return false}else return true}function post_focus(){var elem1=document.getElementById("xfbml_mod1");var elem2=document.getElementById("xfbml_mod2");if(document.settingpage.gxtb_fb_lB_jdk.checked==true){elem1.style.display="table-cell";elem2.style.display="table-cell";}else{elem1.style.display="none";elem2.style.display="none";}}