
// source: http://www.htmldog.com/articles/suckerfish/dropdowns/
sfHover = function() {
	if(document.getElementById("navMain")!=null){
		var sfEls = document.getElementById("navMain").getElementsByTagName("LI");
		for (var i=0; i<sfEls.length; i++) {
			sfEls[i].onmouseover=function() {
				this.className+=" sfhover";
			}
			sfEls[i].onmouseout=function() {
				this.className=this.className.replace(new RegExp(" sfhover\\b"), "");
			}
		}

	}
}
if (window.attachEvent) window.attachEvent("onload", sfHover);

