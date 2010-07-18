//***********************************************
//	File: Popup Handler 
//
//    Purpose:
//	  Generic Popup handler with a method to 
//      limit the number of popups on a site
//      
//
//	Usage:
//      1) Include popup.js file in HTML as an include in the header
//      Popup Determination
//      2) Call popUp to determine which place to go
//	      <a href="javascript:popUp('{//SavingsGoalView}');" title="">Blaa Blaa </a>
//
//***********************************************
	
var popUps = new Array();
function popUp(url) {
	//Currently only one pop allowed open at any time due to session conflicts
	// Clean up existing popups
	closeAllPopUp();
	// Open new popup
	popUps[popUps.length] = window.open(url,"PopUpHandler","height='650',width='800',scrollbars=no,resizable=no,top=50,left=50,screenX=50,screenY=50,location=no,toolbar=no");
}

function closeAllPopUp() {
	for (var i=0; i < popUps.length; i++) {
		if (popUps[i] != null){
			popUps[i].close();
		}
	}
}


window.onunLoad = closeAllPopUp;
