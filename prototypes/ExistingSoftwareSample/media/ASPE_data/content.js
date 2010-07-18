<!--
hasPopped=false;
function popWin(xURL,xX,xY,options) {
	if (options) {
		optionStr='width='+xX+',height='+xY+','+options;
    } else {
		optionStr='width='+xX+',height='+xY+',resizable=yes,title=yes,toolbar=no,scrollbars=yes,screenX=40,screenY=5';
	}
 	poppedWin = window.open(xURL,'PopWin',optionStr);
	if (poppedWin) { poppedWin.focus(); }
	hasPopped=true;
}

function caminawin(fpath, wWidth, wHeight) {
   var winX = (screen.availWidth - wWidth)*.5;
   var winY = (screen.availHeight - wHeight)*.5;
   poppedWin = window.open(fpath, "PopWin", "toolbar=no,menubar=no,width=" + wWidth + ",height=" + wHeight + ",left=" + winX + ",top=" + winY + ",scrollbars=no");
   if (poppedWin) { poppedWin.focus(); }
}

function PopWin() {
   newwindow=window.open("","PopWin","height=500,width=800,scrollbars=yes,resizable=yes,top=50,left=50,screenX=50,screenY=50,location=no,toolbar=no");
}

function calcPop() {
   newwindow=window.open("","calcPop","height=380,width=550,scrollbars=no,noresize,top=50,left=50,screenX=50,screenY=50,location=no,toolbar=no");
}

function calcPopWin() {
   newwindow=window.open("","calcPopWin","height=480,width=650,scrollbars=yes,noresize,top=50,left=50,screenX=50,screenY=50,location=no,toolbar=no");
}

function mortPop() {
   newwindow=window.open("","mortPop","width=567,height=560,toolbar=no,directories=no,status=no,scrollbars=yes,resizable=no,menubar=no");
}


//-->
