/**
 *  File: ingFormFunctions.js
 *  Purpose:
 *        1) Provide a common shared approach to displaying error information	
 *		  2) Provide two option for displaying errors
 *				a) Show all error, list missing information warning an errors
 *			    b) Only show error messages for incorrect input.
 *  Usage:	
 *        To be used with the IPageElement.xsl includes
 */			
	function showAllErrors(field, error){
		// Shows all error including require field errors
		var fieldName = field.name;
		var fieldNameDiv = "errorMessage_" + fieldName;
		var consoleX = "";
		consoleX = document.getElementById(fieldNameDiv);		
		if (consoleX) {					
			consoleX.innerHTML = "";				
			if(error){
				// for valid errors show the error box and error line item
				var text = error;
				consoleX.appendChild(document.createTextNode(text));
				consoleX.style.display = "block";
				consoleX = document.getElementById("boxError");
				consoleX.style.display = "block"; 
			} else {
				// for corrected errors hide error line item
				// error box must stay hidden as there may be other errors
				consoleX.style.display = "none";
			}
		}
	}
				
	function showIncorrectInputErrors(field, error){
		// Shows errors only if the user has provided incorrect input
		var fieldName = field.name;
		var fieldNameDiv = "errorMessage_" + fieldName;
		var consoleX = "";
		consoleX = document.getElementById(fieldNameDiv);							
		if (consoleX) {					
			consoleX.innerHTML = "";
			
			if(error){
				if (field.value ==""){
					consoleX.style.display = "none";
				} else {
					var text = error;
					consoleX.appendChild(document.createTextNode(text));
					consoleX.style.display = "block"; 
					consoleX = document.getElementById("boxError");
					consoleX.style.display = "block"; 
				}
			} else {
				consoleX.style.display = "none";
			}
		}
	 }	
	 
	 function showIncorrectInputErrorsInRed(field, error){
		// Shows errors only if the user has provided incorrect input
		var fieldName = field.name;
		var fieldNameDiv = "errorMessage_" + fieldName;
		var consoleX = "";
		consoleX = document.getElementById(fieldNameDiv);							
		if (consoleX) {					
			consoleX.innerHTML = "";
			
			//Document viewer
			var viewer = getDocumentViewer();
			
			if(error){
				if (field.value ==""){
					consoleX.style.display = "none";
				} else {
					var text = 	"<ul class='icon'><li class='fixit'>"+error+"</li></ul>";
					//console.appendChild(document.createTextNode(text));
					consoleX.innerHTML = text;
					consoleX.style.display = "block"; 
					consoleX.style.display = "block";
					
					//resize either tab or popup window
					if (viewer != null) {
						if (isOnTab(viewer)) {
							resizeTabContainer(viewer);
						}
						else {
							if (viewer.resizeBigWindowForError) {
								viewer.resizeBigWindowForError(fieldName);
							}
						}
					}
				}
			} else {
				consoleX.style.display = "none";

				//resize either tab or popup window
				if (viewer != null) {
					if (isOnTab(viewer)) {
						resizeTabContainer(viewer);
					}
					else {
						if (viewer.resizeSmallWindowForError) {
							viewer.resizeSmallWindowForError(fieldName);
						}
					}				
				}
			}
		}
	 }	
	 
	 function getDocumentViewer() {
		if (document.defaultView) {
			return document.defaultView; //FF
		}
		else if (document.parentWindow) {
			return document.parentWindow; //IE
		}	 
		else {
			return null;
		}
	 }
	 
	 //Return true if current document is on a Zapatec tab
	 function isOnTab(viewer) {
	 	if (viewer && viewer.frameElement && viewer.frameElement.className) {
	 		var className = viewer.frameElement.className;
	 		if (className.toUpperCase().indexOf('ZPTAB') != -1) {
	 			return true;
	 		}
	 	}
	 	return false;
	 }
	 
	 //Resize a zapatec tab to the current document height
	 function resizeTabContainer(viewer) {
		var height = 0;
		if (viewer.parent.getBodyHeight) {
			height = viewer.parent.getBodyHeight(document);
			if (viewer.parent.resizeActiveTab) {
			 	viewer.parent.resizeActiveTab(height, viewer.parent.activeTabId);
			}					
		}
	 }
	 
	//////////////////////////////////////////////////////////////////////////////
	// AJAX custom request function for loading informaton real time in a page
	// Uses the validation framework to extend the success/errorMessage response
	// Parameters
	//  Input field (String): Id of the IPage element on the document preconfigured 
	//                        with the URL to call for the AJAX request
	//  Custom Parsing Function:  The function used to parse the response JSON
	//
	// Response format:
	//			{ "success":true,
	//			  "generalError":"Your error message",    ( only used if success is false )
	//   		  "MyTag1":"My test",
	//		 	  "MyTag2":"More text"
	//			} 
	// Response Parsing
	//  The custom fields are accessible via the objResponse object
	//  for example 
	//    		document.getElementById("MyDivTag").innerHTML=objResponse.MyTag1;
	//    		document.getElementById("MyInputField").value=objResponse.MyTag2;
	//
	//////////////////////////////////////////////////////////////////////////////
	function actionCustomAJAXrequest(fieldName, parseCustomAJAXResponseFunction, parseCustomAJAXErrorFunction){	
		var fieldObj = document.getElementById(fieldName); 
		if (fieldObj == null) return;
		var hashMap = Zapatec.Form.Utils.getTokens(fieldObj.className, " ");
	
		var submitUrl = hashMap["zpFormValidate"];
		if (submitUrl == null)return;
		submitUrl += "&" + fieldName + "=" + fieldObj.value;
		submitUrl += "&" + Math.random();
													
		Zapatec.Transport.fetch({
			url: submitUrl,
			onLoad: function(objText){
				if (objText.responseText == null) {
					return null;
				}
				var objResponse = Zapatec.Transport.parseJsonStr(objText.responseText);
				if(objResponse == null){
					return null;
				}
				if(objResponse.success){
					// Parse response and hide previous error messages
					parseCustomAJAXResponseFunction(objResponse);
					showIncorrectInputErrors(fieldObj, "");
				} else {
					// Show error message
					if(parseCustomAJAXErrorFunction != null) {
						parseCustomAJAXErrorFunction(fieldObj, objResponse.generalError);
					} else {
						showIncorrectInputErrors(fieldObj, objResponse.generalError);
					}
				}
			}
		});
	}