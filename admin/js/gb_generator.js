// ####################################################### \\

// @Author: Stefan Natter
// Version 1.1
// http://www.gb-world.net
// for the WP-Plugin: Like-Button-Plugin-For-Wordpress by Stefan Natter

// ####################################################### \\

<!-- ======================== SCRIPT ======================== -->

function gxtb_generator(iframe){var div=document.getElementById("gxtb_fb_lB_preview");if(document.settingpage.gxtb_fb_lB_generator_faces.checked){var faces="true";}else{var faces="false";}if(document.settingpage.gxtb_fb_lB_generator_scrolling.checked){var scrolling="yes";}else{var scrolling="no";}if(document.settingpage.gxtb_fb_lB_generator_trans.checked){var trans="true";}else{var trans="false";}if(document.settingpage.gxtb_fb_lB_generator_url.value==""){var url="http://www.facebook.com/GBWorldnet";}else{var url=document.settingpage.gxtb_fb_lB_generator_url.value;}if(document.settingpage.gxtb_fb_lB_generator_font.value==""){var font="";}else{var font="font="+document.settingpage.gxtb_fb_lB_generator_font.value+"&amp;";}if(document.settingpage.gxtb_fb_lB_generator_borderstyle.value==""){var style="none";}else{var style=document.settingpage.gxtb_fb_lB_generator_borderstyle.value;}if(document.settingpage.gxtb_fb_lB_generator_frameborder.value==""){var border="0";}else{var border=document.settingpage.gxtb_fb_lB_generator_frameborder.value;}if(document.settingpage.gxtb_fb_lB_generator_height.value==""){var heigth="80";}else{var heigth=document.settingpage.gxtb_fb_lB_generator_height.value;}if(document.settingpage.gxtb_fb_lB_generator_width.value==""){var width="450";}else{var width=document.settingpage.gxtb_fb_lB_generator_width.value;}if(iframe=="iframe"){div.innerHTML='<iframe src="http://www.facebook.com/plugins/like.php?href='+url+'&layout='+document.settingpage.gxtb_fb_lB_generator_layout.value+'&amp;show_faces='+faces+'&amp;width='+width+'&amp;action='+document.settingpage.gxtb_fb_lB_generator_verb.value+'&amp;'+font+'colorscheme='+document.settingpage.gxtb_fb_lB_generator_color.value+'&amp;heigth='+heigth+'" scrolling="'+scrolling+'" frameborder="'+border+'" allowTransparency="'+trans+'" style="border:'+style+';overflow:'+document.settingpage.gxtb_fb_lB_generator_overflow.value+';width:'+width+'px;height:'+heigth+'px;"></iframe>';}else if(iframe=="jdk"){div.innerHTML='<iframe src="http://www.facebook.com/plugins/like.php?href='+url+'&layout='+document.settingpage.gxtb_fb_lB_generator_layout.value+'&amp;show_faces='+faces+'&amp;width='+width+'&amp;action='+document.settingpage.gxtb_fb_lB_generator_verb.value+'&amp;'+font+'colorscheme='+document.settingpage.gxtb_fb_lB_generator_color.value+'&amp;heigth='+heigth+'" scrolling="no" frameborder="0" allowTransparency="true" style="border:none;overflow:hidden;width:'+width+'px;height:'+heigth+'px;"></iframe>';}else{if(document.settingpage.gxtb_fb_lB_jdk.checked==true){div.innerHTML='<iframe src="http://www.facebook.com/plugins/like.php?href='+url+'&layout='+document.settingpage.gxtb_fb_lB_generator_layout.value+'&amp;show_faces='+faces+'&amp;width='+width+'&amp;action='+document.settingpage.gxtb_fb_lB_generator_verb.value+'&amp;'+font+'colorscheme='+document.settingpage.gxtb_fb_lB_generator_color.value+'&amp;heigth='+heigth+'" scrolling="no" frameborder="0" allowTransparency="true" style="border:none;overflow:hidden;width:'+width+'px;height:'+heigth+'px;"></iframe>';}else{div.innerHTML='<iframe src="http://www.facebook.com/plugins/like.php?href='+url+'&layout='+document.settingpage.gxtb_fb_lB_generator_layout.value+'&amp;show_faces='+faces+'&amp;width='+width+'&amp;action='+document.settingpage.gxtb_fb_lB_generator_verb.value+'&amp;'+font+'colorscheme='+document.settingpage.gxtb_fb_lB_generator_color.value+'&amp;heigth='+heigth+'" scrolling="'+scrolling+'" frameborder="'+border+'" allowTransparency="'+trans+'" style="border:'+style+';overflow:'+document.settingpage.gxtb_fb_lB_generator_overflow.value+';width:'+width+'px;height:'+heigth+'px;"></iframe>';}}}function gxtb_generator_elements_disable(){var diviframe=document.getElementById("xtraIframe");var diviframe_info=document.getElementById("iframe_info");for(var i=0;i<=3;i++){diviframe.getElementsByTagName("input").item(i).disabled=true;}document.settingpage.gxtb_fb_lB_generator_overflow.disabled=true;diviframe_info.style.visibility='visible';gxtb_generator("jdk");}function gxtb_generator_elements_enable(){var diviframe=document.getElementById("xtraIframe");var diviframe_info=document.getElementById("iframe_info");for(var i=0;i<=3;i++){diviframe.getElementsByTagName("input").item(i).disabled=false;}document.settingpage.gxtb_fb_lB_generator_overflow.disabled=false;diviframe_info.style.visibility='hidden';gxtb_generator("iframe");}var tooltip=function(){var id='tt';var top=3;var left=3;var maxw=300;var speed=10;var timer=20;var endalpha=95;var alpha=0;var tt,t,c,b,h;var ie=document.all?true:false;return{show:function(v,w){if(tt==null){tt=document.createElement('div');tt.setAttribute('id',id);t=document.createElement('div');t.setAttribute('id',id+'top');c=document.createElement('div');c.setAttribute('id',id+'cont');b=document.createElement('div');b.setAttribute('id',id+'bot');tt.appendChild(t);tt.appendChild(c);tt.appendChild(b);document.body.appendChild(tt);tt.style.opacity=0;tt.style.filter='alpha(opacity=0)';document.onmousemove=this.pos;}tt.style.display='block';c.innerHTML=v;tt.style.width=w?w+'px':'auto';if(!w && ie){t.style.display='none';b.style.display='none';tt.style.width=tt.offsetWidth;t.style.display='block';b.style.display='block';}if(tt.offsetWidth>maxw){tt.style.width=maxw+'px'}h=parseInt(tt.offsetHeight)+top;clearInterval(tt.timer);tt.timer=setInterval(function(){tooltip.fade(1)},timer);},pos:function(e){var u=ie?event.clientY+document.documentElement.scrollTop:e.pageY;var l=ie?event.clientX+document.documentElement.scrollLeft:e.pageX;tt.style.top=(u - h)+'px';tt.style.left=(l+left)+'px';},fade:function(d){var a=alpha;if((a !=endalpha && d==1)||(a !=0 && d==-1)){var i=speed;if(endalpha - a<speed && d==1){i=endalpha - a;}else if(alpha<speed && d==-1){i=a;}alpha=a+(i * d);tt.style.opacity=alpha * .01;tt.style.filter='alpha(opacity='+alpha+')';}else{clearInterval(tt.timer);if(d==-1){tt.style.display='none'}}},hide:function(){clearInterval(tt.timer);tt.timer=setInterval(function(){tooltip.fade(-1)},timer);}};}();function gxtb_image_src(){var div=document.getElementById("gxtb_img_preview_div");var src=document.getElementById("gxtb_fb_lB_meta_image").value;div.innerHTML="<img id='gxtb_fb_lB_meta_image_preview' src='"+src+"'>";var img=document.getElementById("gxtb_fb_lB_meta_image_preview");var width=img.width;var height=img.height;if(img.width<=400||img.height<=400 ){div.innerHTML='<a href="'+src+'" class="preview"  title="'+src+'"><img id="gxtb_fb_lB_meta_image_preview" src="'+src+'" class="thumb" alt="'+src+'"/></a>';$("img.thumb").thumbs();$("img.thumb").thumbsImg();imagePreview();}else{div.innerHTML='The image you choose is to big to display. But you can click<a href="'+src+'" target="_blank">here</a>to see your choice.';}}function gxtb_image_resize(){var img=document.getElementById("gxtb_fb_lB_meta_image_preview");var src=document.getElementById("gxtb_fb_lB_meta_image").value;var w=img.width,h=img.height;var target_w=450,target_h=150;if(w * 3==h){if(w>h){var percentage=(target_w/w);}else{var percentage=(target_h/h);}w=w * percentage;h=h * percentage;img.setAttribute("width",w);img.setAttribute("height",h);}img.setAttribute("src",src);}function gxtb_image_max(){maxSize=450;var img=document.getElementById("gxtb_fb_lB_meta_image_preview");var src=document.getElementById("gxtb_fb_lB_meta_image").value;iHeight=img.height;iWidth=img.width;if(iHeight>maxSize||iWidth>maxSize ){if(iHeight>iWidth){sizeGuide=iHeight;size2=iWidth;}else{sizeGuide=iWidth;size2=iHeight;}if(sizeGuide>maxSize){sizeRatio=sizeGuide/size2;newSize1=maxSize;newSize2=newSize1/sizeRatio;if(iHeight>iWidth){img.setAttribute("width",newSize2);img.setAttribute("height",newSize1);}else{img.setAttribute("width",newSize1);img.setAttribute("height",newSize2);}}}img.setAttribute("src",src);}