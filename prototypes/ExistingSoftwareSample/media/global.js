/* Images Preload */

var PageImages = new Array();
var PageAltImages = new Array();

function LoadActiveImages() {
	var num = document.images.length;
	for (var i = 0; i < num; i++) {
		var thisImage = document.images[i];
		var thisImageSrc = thisImage.src;
		var imageName = thisImageSrc.substring(0,thisImageSrc.lastIndexOf("-o"));
		//document.write(imageName + "<BR>");
		if (thisImageSrc.lastIndexOf("-off") != -1) {
			PageImages[i] = new Image(thisImage.width, thisImage.height);
      	    PageImages[i].src = imageName + "-on.gif";
		} else if (thisImage.src.lastIndexOf("-on") != -1) {
			PageAltImages[i] = new Image(thisImage.width, thisImage.height);
      	    PageAltImages[i].src = imageName + "-off.gif";
		}
    }
}

window.onload = LoadActiveImages;
	
/* Image Swap */
function imageSwap(which, state) {
     	
	//which - required input of image name
	//state - required input of image rollover state (1 for on, 0 for off)
	
	//get the element obj reference
 	thisImage=document.getElementById(which);
	
	//find the image src name
	var imageName = thisImage.src.substring(0,thisImage.src.lastIndexOf("-o"));
	//toggle the src name based on state
	state == 0?endString = "-off.gif":endString = "-on.gif";
	//alert(layerOver);
	//set the image src to the new src
	thisImage.setAttribute("src",imageName + endString);
}

function printPage(lang) {
  if (window.print) {
    window.print() 
  } else if (lang == "fr") {
    alert("D&eacute;sol&eacute;, votre fureteur ne supporte pas cette fonction."); 
  } else  {
    alert("Sorry, your browser doesn't support this feature. \nUse the print option on your browser to print this page"); 
  } 
}