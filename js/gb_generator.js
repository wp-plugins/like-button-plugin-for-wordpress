// ####################################################### \\

// @Author: Stefan Natter
// Version 1.0
// http://www.gb-world.net
// for the WP-Plugin: Like-Button-Plugin-For-Wordpress by Stefan Natter

// ####################################################### \\

function gxtb_generator(iframe) {
	
	var div = document.getElementById("gxtb_fb_lB_preview");
	
	if(document.settingpage.gxtb_fb_lB_generator_faces.checked) {
		var faces = "true";
	} else {
		var faces = "false";
	}

	if(document.settingpage.gxtb_fb_lB_generator_scrolling.checked) {
		var scrolling = "yes";
	} else {
		var scrolling = "no";
	}
	
	if(document.settingpage.gxtb_fb_lB_generator_trans.checked) {
		var trans = "true";
	} else {
		var trans = "false";
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

	if(document.settingpage.gxtb_fb_lB_generator_borderstyle.value == "") {
		var style = "none";
	} else {
	    var style = document.settingpage.gxtb_fb_lB_generator_borderstyle.value;
	}
	
	if(document.settingpage.gxtb_fb_lB_generator_frameborder.value == "") {
		var border = "0";
	} else {
	    var border = document.settingpage.gxtb_fb_lB_generator_frameborder.value;
	}
	
	if(document.settingpage.gxtb_fb_lB_generator_heigth.value == "") {
		var heigth = "80";
	} else {
	    var heigth = document.settingpage.gxtb_fb_lB_generator_heigth.value;
	}	
	
	if(document.settingpage.gxtb_fb_lB_generator_width.value == "") {
		var width = "450";
	} else {
	    var width = document.settingpage.gxtb_fb_lB_generator_width.value;
	}	
	 
	if(iframe == "iframe") {
		
	div.innerHTML =
		'<iframe src="http://www.facebook.com/plugins/like.php?href=' + url +'&layout='+ document.settingpage.gxtb_fb_lB_generator_layout.value +'&amp;show_faces='+ faces +'&amp;width='+ width+'&amp;action='+ document.settingpage.gxtb_fb_lB_generator_verb.value +'&amp;'+ font +'colorscheme='+ document.settingpage.gxtb_fb_lB_generator_color.value +'&amp;heigth='+ heigth +'" scrolling="'+ scrolling +'" frameborder="'+ border +'" allowTransparency="'+ trans +'" style="border:'+ style +'; overflow:'+ document.settingpage.gxtb_fb_lB_generator_overflow.value +'; width:'+ width +'px; height:'+ heigth +'px;"></iframe>';
	
	} else if (iframe == "jdk") {
		
		div.innerHTML = '<iframe src="http://www.facebook.com/plugins/like.php?href=' + url +'&layout='+ document.settingpage.gxtb_fb_lB_generator_layout.value +'&amp;show_faces='+ faces +'&amp;width='+ width+'&amp;action='+ document.settingpage.gxtb_fb_lB_generator_verb.value +'&amp;'+ font +'colorscheme='+ document.settingpage.gxtb_fb_lB_generator_color.value +'&amp;heigth='+ heigth +'" scrolling="no" frameborder="0" allowTransparency="true" style="border:none; overflow:hidden; width:'+ width +'px; height:'+ heigth +'px;"></iframe>';
	
	} else {
		
		if (document.settingpage.gxtb_fb_lB_jdk.checked == true) {
			div.innerHTML = '<iframe src="http://www.facebook.com/plugins/like.php?href=' + url +'&layout='+ document.settingpage.gxtb_fb_lB_generator_layout.value +'&amp;show_faces='+ faces +'&amp;width='+ width+'&amp;action='+ document.settingpage.gxtb_fb_lB_generator_verb.value +'&amp;'+ font +'colorscheme='+ document.settingpage.gxtb_fb_lB_generator_color.value +'&amp;heigth='+ heigth +'" scrolling="no" frameborder="0" allowTransparency="true" style="border:none; overflow:hidden; width:'+ width +'px; height:'+ heigth +'px;"></iframe>';	
		
		} else {
			
		div.innerHTML =
		'<iframe src="http://www.facebook.com/plugins/like.php?href=' + url +'&layout='+ document.settingpage.gxtb_fb_lB_generator_layout.value +'&amp;show_faces='+ faces +'&amp;width='+ width+'&amp;action='+ document.settingpage.gxtb_fb_lB_generator_verb.value +'&amp;'+ font +'colorscheme='+ document.settingpage.gxtb_fb_lB_generator_color.value +'&amp;heigth='+ heigth +'" scrolling="'+ scrolling +'" frameborder="'+ border +'" allowTransparency="'+ trans +'" style="border:'+ style +'; overflow:'+ document.settingpage.gxtb_fb_lB_generator_overflow.value +'; width:'+ width +'px; height:'+ heigth +'px;"></iframe>';		
		
		}
	}
	
}



function gxtb_generator_elements_disable() {

	var diviframe = document.getElementById("xtraIframe");
	var diviframe_info = document.getElementById("iframe_info");

	//diviframe.style.visibility = 'hidden';
		for (var i = 0; i <= 3; i++) {
			diviframe.getElementsByTagName("input").item(i).disabled = true;
		}
		document.settingpage.gxtb_fb_lB_generator_overflow.disabled = true;
		
	diviframe_info.style.visibility = 'visible';
	
	gxtb_generator("jdk");
}

function gxtb_generator_elements_enable() {

	var diviframe = document.getElementById("xtraIframe");
	var diviframe_info = document.getElementById("iframe_info");

	//diviframe.style.visibility = 'visible';
		for (var i = 0; i <= 3; i++) {
			diviframe.getElementsByTagName("input").item(i).disabled = false;
		}
		document.settingpage.gxtb_fb_lB_generator_overflow.disabled = false;
		
	diviframe_info.style.visibility = 'hidden';
	
	gxtb_generator("iframe");
}


// big thx to this blog for the tooltip-code: http://sixrevisions.com/tutorials/javascript_tutorial/create_lightweight_javascript_tooltip/
var tooltip=function(){
	var id = 'tt';
	var top = 3;
	var left = 3;
	var maxw = 300;
	var speed = 10;
	var timer = 20;
	var endalpha = 95;
	var alpha = 0;
	var tt,t,c,b,h;
	var ie = document.all ? true : false;
	return{
		show:function(v,w){
			if(tt == null){
				tt = document.createElement('div');
				tt.setAttribute('id',id);
				t = document.createElement('div');
				t.setAttribute('id',id + 'top');
				c = document.createElement('div');
				c.setAttribute('id',id + 'cont');
				b = document.createElement('div');
				b.setAttribute('id',id + 'bot');
				tt.appendChild(t);
				tt.appendChild(c);
				tt.appendChild(b);
				document.body.appendChild(tt);
				tt.style.opacity = 0;
				tt.style.filter = 'alpha(opacity=0)';
				document.onmousemove = this.pos;
			}
			tt.style.display = 'block';
			c.innerHTML = v;
			tt.style.width = w ? w + 'px' : 'auto';
			if(!w && ie){
				t.style.display = 'none';
				b.style.display = 'none';
				tt.style.width = tt.offsetWidth;
				t.style.display = 'block';
				b.style.display = 'block';
			}
			if(tt.offsetWidth > maxw){tt.style.width = maxw + 'px'}
			h = parseInt(tt.offsetHeight) + top;
			clearInterval(tt.timer);
			tt.timer = setInterval(function(){tooltip.fade(1)},timer);
		},
		pos:function(e){
			var u = ie ? event.clientY + document.documentElement.scrollTop : e.pageY;
			var l = ie ? event.clientX + document.documentElement.scrollLeft : e.pageX;
			tt.style.top = (u - h) + 'px';
			tt.style.left = (l + left) + 'px';
		},
		fade:function(d){
			var a = alpha;
			if((a != endalpha && d == 1) || (a != 0 && d == -1)){
				var i = speed;
				if(endalpha - a < speed && d == 1){
					i = endalpha - a;
				}else if(alpha < speed && d == -1){
					i = a;
				}
				alpha = a + (i * d);
				tt.style.opacity = alpha * .01;
				tt.style.filter = 'alpha(opacity=' + alpha + ')';
			}else{
				clearInterval(tt.timer);
				if(d == -1){tt.style.display = 'none'}
			}
		},
		hide:function(){
			clearInterval(tt.timer);
			tt.timer = setInterval(function(){tooltip.fade(-1)},timer);
		}
	};
}();



// available at version 3.5 - currently in beta-mode (google: createElement Script)

function gxtb_optionpage(id) {
	
switch(id){
case 0:
	tooltip.show('Activate this checkbox if you want that your Like-Button appears on your blog.');
	break;
}


}


// available at version 3.5 - currently in beta-mode

function appIDphp() {

/*var diviframe = document.getElementById("xtraIframe");

 d = document.createElement("script");
 d.src = "gb_js.php?iframe=true";
 d.type = "text/javascript";
 diviframe.appendChild(d);*/

}





















// out of use functions:

// TOOLTIPS for all displayed links on a site (currently out of use) \\

/*javascript for Bubble Tooltips by Alessandro Fulciniti
- http://pro.html.it - http://web-graphics.com http://web-graphics.com/mtarchive/BubbleTooltips.html */

function enableTooltips(id){
var links,i,h;
if(!document.getElementById || !document.getElementsByTagName) return;
AddCss();
h=document.createElement("span");
h.id="btc";
h.setAttribute("id","btc");
h.style.position="absolute";
document.getElementsByTagName("body")[0].appendChild(h);

if(id==null) links=document.getElementsByTagName("a");
else links=document.getElementById(id).getElementsByTagName("a");

for(i=0;i<links.length;i++){
    Prepare(links[i]);
    }
}

function Prepare(el){
var tooltip,t,b,s,l;
t=el.getAttribute("title");
if(t==null || t.length==0) t="link:";
el.removeAttribute("title");
tooltip=CreateEl("span","tooltip");
s=CreateEl("span","top");
s.appendChild(document.createTextNode(t));
tooltip.appendChild(s);
b=CreateEl("b","bottom");
l=el.getAttribute("href");
if(l.length>30) l=l.substr(0,27)+"...";
b.appendChild(document.createTextNode(l));
tooltip.appendChild(b);
setOpacity(tooltip);
el.tooltip=tooltip;
el.onmouseover=showTooltip;
el.onmouseout=hideTooltip;
el.onmousemove=Locate;
}

function showTooltip(e){
document.getElementById("btc").appendChild(this.tooltip);
Locate(e);
}

function hideTooltip(e){
var d=document.getElementById("btc");
if(d.childNodes.length>0) d.removeChild(d.firstChild);
}

function setOpacity(el){
el.style.filter="alpha(opacity:95)";
el.style.KHTMLOpacity="0.95";
el.style.MozOpacity="0.95";
el.style.opacity="0.95";
}

function CreateEl(t,c){
var x=document.createElement(t);
x.className=c;
x.style.display="block";
return(x);
}

function AddCss(){
/*var l=CreateEl("link");
l.setAttribute("type","text/css");
l.setAttribute("rel","stylesheet");
l.setAttribute("href","bt.css");
l.setAttribute("media","screen");
document.getElementsByTagName("head")[0].appendChild(l);*/
}

function Locate(e){
var posx=0,posy=0;
if(e==null) e=window.event;
if(e.pageX || e.pageY){
    posx=e.pageX; posy=e.pageY;
    }
else if(e.clientX || e.clientY){
    if(document.documentElement.scrollTop){
        posx=e.clientX+document.documentElement.scrollLeft;
        posy=e.clientY+document.documentElement.scrollTop;
        }
    else{
        posx=e.clientX+document.body.scrollLeft;
        posy=e.clientY+document.body.scrollTop;
        }
    }
document.getElementById("btc").style.top=(posy+10)+"px";
document.getElementById("btc").style.left=(posx-20)+"px";
}