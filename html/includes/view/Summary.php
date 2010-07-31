<?php
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="EXPIRES" content="NOW">
<meta http-equiv="PRAGMA" content="NO-CACHE">
<title>Scotia OnLine</title>
<link rel="stylesheet" href="/css/SOPStyles.css">
<script language="javascript">
	<!--
                function openThirdPartySite(URL)
                  {
                       window.open(URL, 'ThirdPartySite', 'toolbar=yes,location=yes,status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=700,height=' + Math.min(screen.availHeight-165,600)).focus();
                  }

                function surfToHyperLinkWindow(URL){
                    openThirdPartySite(URL);
                }
	//-->
	</script>
</head>


<body topmargin="0" bgcolor=#666699
	onResize="if(document.layers) location.reload(true)" text=#000000
	link=#000066 alink=#FF0000 vlink=#660066>

<script language="JavaScript" type="text/javascript">
var analytics = "scotiabankonlineprod,scotiabankglobal";
var analyticsInternalLinks = "javascript:,www.scotiaonline.scotiabank.com";
</script>


<script language="JavaScript" type="text/javascript"
	src="/html/s_code.js"></script>

<script language="javascript">
<!--
        /**
         * Add window onload event. 
         * This is used to accomodate execution of multiple window.onload(s).
         * You can call the addOnLoadEvent function multiple times with different arguments
         * and it will build up a chain of functions, making sure that everything will be executed
         * when the page loads no matter how many callbacks you have added.
         *
         * Parameter/Argument: Function argument is the function name. 
         *                     A callback function which will be executed once the page has loaded.
         *
         * Example: 
         * addOnLoadEvent(webanalytics) - coded in this jsp.
         * addOnLoadEvent(createList) - implemented in mfaQA.jsp, which includes this WebAnalyticsController.jsp.
         *
         * The above example, will execute webanalytics and createList functions when page is loaded.
         *
         */
        function addOnLoadEvent(func) {
          // The previously assigned function(s) are first saved in a variable called oldonload.
          var oldonload = window.onload;

          // The window.onload does not already have a function assigned,
          // assigns the callback function to window.onload
          if (typeof window.onload != 'function') {
            window.onload = func;
          } else {
            // The window.onload has already had something assigned to it.
            // A brand new function is created which executes the oldonload,
            // then executes the new callback function.
            window.onload = function() {
              if (oldonload) { oldonload(); }

              if (func) { func(); }

            }
      
          }//end-if
        }//addOnLoadEvent()

        function webanalytics() {
        	siteID="SO"
        	pageID=document.getElementById('pageid')
        	hpageID=document.getElementById('hpageid')
        	tabID="Home"
        	delimeter=":"
        	
        	if (pageID && pageID.firstChild && tabID) {
        		if(typeof(subtabID)!="undefined")
        			s.pageName=siteID + delimeter + tabID + delimeter + subtabID + delimeter + pageID.firstChild.nodeValue
        		else
        			s.pageName=siteID + delimeter + tabID + delimeter + pageID.firstChild.nodeValue
        	}
        	else if (hpageID && tabID) {
        		if(typeof(subtabID)!="undefined")
        			s.pageName=siteID + delimeter + tabID + delimeter + subtabID + delimeter + document.getElementById('hpageid').title
        		else
        			s.pageName=siteID + delimeter + tabID + delimeter + hpageID.title
        	}
        	else
        		s.pageName=siteID + delimeter + "Unknown"
        	
        	if(tabID) s.channel=siteID + delimeter + tabID
        	else s.channel=siteID


			s.prop6 = "logged in";
			s.events = "event2";

		        	if(analytics!="" && analytics!="null" && analyticsInternalLinks!="" && analyticsInternalLinks!="null") {
		        		
		        		//only continue if the page-level Web Analytics override has not been set
		        		if(typeof(analyticsOverride)=="undefined" || (analyticsOverride!=true)) {
		        	
				        	//only continue if outside Investing, or under Investing on a page with a valid pageid or hpageid
				        	if( !tabID=="Investing" || (pageID || hpageID)) {
				        	
					        	/************* DO NOT ALTER ANYTHING BELOW THIS LINE ! **************/
					        	
					        	var s_code=s.t();if(s_code)document.write(s_code)
					        	
					        	<!-- End SiteCatalyst code version: H.17. -->
					        	
				        	}
			        	}
		        	}
	
        }
        
        addOnLoadEvent(webanalytics);
//-->
</script>

<font face="Verdana" size="2"> <script>
<!--
function openPreferences()
{
	window.open("/portal/preferences.jsp?from=portal", 'ProfileWindow',
		'toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes,width=780,height=' + Math.min(screen.availHeight-60,600)).focus();
}

var helpFile=null;
function openHelp(URL)
{
	if (helpFile && helpFile != '') URL = helpFile;
	window.open(URL, 'HelpWindow', 'scrollbars=yes,resizable=yes,width=685,height=' + Math.min(screen.availHeight-60,700) + ',screenX=0,screenY=0,location=no,status=no').focus();
}
// -->
</script>



<table cellspacing="0" cellpadding="0" border="0" width="760"
	align="center">
	<tr valign="top">
		<td rowspan="2" align="left" class="bgcoloroption2"><img
			src="/images/topcorner.gif" width="10" height="40"></td>
		<td width="262" rowspan="2" valign="bottom" class="bgcoloroption2"><img
			src="/images/en_topnav_logo.gif" width="156" height="26" border="0"></td>
		<td width="478" height="18" valign="middle" align="right"
			background="/images/topbgglobal.gif"><a
			href="/portal/SopPreferenceNav.jsp?func=ctx&ctxId=000000"
			class="globallinks">Profile & Preferences</a> | <a
			href="/portal/index.jsp?pageID=sitemap" class="globallinks">Site Map</a>
		| <a
			href="javascript:openThirdPartySite('http://askscotia.scotiabank.com/askscotiasol/index.jsp')"
			class=globallinks>Contact Us</a> | <a
			href="javascript:openHelp('http://askscotia.scotiabank.com/index.jsp?TopTenCategoryName=Scotia OnLine')"
			class=globallinks>Help</a> | <a
			href="/portal/SopInvestmentNav.jsp?func=ctx&ctxId=999999"
			class=globallinks>Sign Out</a></td>
		<td align="right" class="bgcoloroptionE"><img
			src="/images/topcornerrightbeige.gif" width="10" height="18"></td>
	</tr>
	<tr valign="bottom">
		<td colspan="2" align="right" class="bgcoloroption2"><img
			src="/images/service_sofsb_en.gif" width="325" height="16"
			align="bottom"></td>
	</tr>
</table>
<table cellspacing="0" cellpadding="0" border="0" width="760"
	align="center">
	<tr>
		<td height="12" background="/images/headerA.gif"></td>
	</tr>
	<tr>
		<td height="20" colspan="2" background="/images/headerB.gif">

		<table cellspacing="0" cellpadding="0" border="0">

			<tr>
				<td>
				<table cellspacing="0" cellpadding="0" border="0">
					<tr>


						<td background="/images/headerB.gif" height="20"><img
							src="/images/tabONleftselected.gif" width=10 height=20></td>
						<td background="/images/tabbg.gif"><a class="linkTabON"
							href="/portal/index.jsp?pageID=sme_home_prelogin"><b>Home</b></a>

						</td>
						<td background="/images/headerB.gif" height="20"><img
							src="/images/tabONrightselected.gif" width=10 height=20></td>
						<td width="1"><img src="/images/spacer.gif" width="1" height="8"></td>



						<td background="/images/headerB.gif" height="20"><img
							src="/images/dclefttab.gif" width=10 height=20></td>
						<td background="/images/dctabbg.gif"><a class="linkTab"
							href="/portal/index.jsp?pageID=financial_services_banking"><b>Banking</b></a>
						</td>
						<td background="/images/headerB.gif" height="20"><img
							src="/images/dcrighttab.gif" width=10 height=20></td>
						<td width="1"><img src="/images/spacer.gif" width="1" height="8"></td>



						<td background="/images/headerB.gif" height="20"><img
							src="/images/dclefttab.gif" width=10 height=20></td>
						<td background="/images/dctabbg.gif"><a class="linkTab"
							href="/portal/index.jsp?pageID=financial_services_brokerage"><b>Investing</b></a>
						</td>
						<td background="/images/headerB.gif" height="20"><img
							src="/images/dcrighttab.gif" width=10 height=20></td>
						<td width="1"><img src="/images/spacer.gif" width="1" height="8"></td>



						<td background="/images/headerB.gif" height="20"><img
							src="/images/dclefttab.gif" width=10 height=20></td>
						<td background="/images/dctabbg.gif"><a class="linkTab"
							href="/portal/index.jsp?pageID=borrowing"><b>Borrowing</b></a></td>
						<td background="/images/headerB.gif" height="20"><img
							src="/images/dcrighttab.gif" width=10 height=20></td>
						<td width="1"><img src="/images/spacer.gif" width="1" height="8"></td>



						<td background="/images/headerB.gif" height="20"><img
							src="/images/dclefttab.gif" width=10 height=20></td>
						<td background="/images/dctabbg.gif"><a class="linkTab"
							href="/portal/index.jsp?pageID=sme_tools"><b>Planning</b></a></td>
						<td background="/images/headerB.gif" height="20"><img
							src="/images/dcrighttab.gif" width=10 height=20></td>
						<td width="1"><img src="/images/spacer.gif" width="1" height="8"></td>



						<td background="/images/headerB.gif" height="20"><img
							src="/images/dclefttab.gif" width=10 height=20></td>
						<td background="/images/dctabbg.gif"><a class="linkTab"
							href="/portal/index.jsp?pageID=page_01"><b>Business Resources</b></a>
						</td>
						<td background="/images/headerB.gif" height="20"><img
							src="/images/dcrighttab.gif" width=10 height=20></td>
						<td width="1"><img src="/images/spacer.gif" width="1" height="8"></td>



					</tr>
				</table>
				</td>
			</tr>


		</table>

		</td>
	</tr>


	<tr>
		<td>
		<table cellspacing="0" cellpadding="0" border="0" width=100%>

			<tr bgcolor="#003366">
				<td class="bgcoloroptionE"><img src="/images/spacer.gif" width=1
					height=3 border="0"></td>
			</tr>




			<tr>
				<td><img src="/images/tabnavbg2.gif" width=760 height=10 border="0"></td>
			</tr>




		</table>
		</td>
	</tr>

</table>









<table border="0" cellpadding="0" cellspacing="0" width=760
	align="center" bgcolor="#FFFFFF">


	<tr>

		<td width=17% valign="top" align="left"><script>
				<!-- hide from non-js browsers
				window.status = "Loading QUICK_LINKS...";
				// -->
			</script>























		<head>
		<script language="JavaScript" src="/html/JS_MainWindow.js"></script>
		</head>

		<table border="0" cellpadding="0" cellspacing="0" width=152
			align="center" bgcolor="#FFFFFF">
			<tr>
				<td><img src="/images/spacer.gif" height=1 border="0"></td>
			</tr>
		</table>

		<table width="140" border="0" cellspacing="0" cellpadding="2">
			<tr>
				<td>

				<table width="140" border="0" cellpadding="0" cellspacing="0"
					class="bgcoloroptionE">
					<tr>
						<td colspan="3" align="left"><img border=0 name=lhn_topn
							width="151" src="/images/lhn_topn.gif"></td>
					</tr>

					<tr valign="top">
						<td class="darkgreyLine" align="right" width="1"><img
							src="/images/spacer.gif" height="1" width="1"></td>
						<td colspan="1">

						<table border="0" cellpadding="2" cellspacing="0" width="100%">
							<tr valign="top">
								<td colspan="2" class="fieldTitleLeftC">Quick Links</td>
							</tr>


							<tr valign="top">
								<td><img src="/images/red_bullet_trans.gif" vspace="3"
									hspace="2"></td>
								<td><a
									href="/portal/index.jsp?pageID=financial_services_banking&subPageId=Banking_Bill_Payments&reqOption=MultipleBillPay&option=display"
									class="linkVertMenu">Bill Payment</a></td>
							</tr>


							<tr valign="top">
								<td><img src="/images/red_bullet_trans.gif" vspace="3"
									hspace="2"></td>
								<td><a
									href="/portal/index.jsp?pageID=financial_services_banking&subPageId=Banking_Transfers&reqOption=Transfer&action=display"
									class="linkVertMenu">Funds Transfer</a></td>
							</tr>

							<tr valign="top">
								<td><img src="/images/spacer.gif" vspace="3" hspace="1"></td>
								<td><a href=/portal/SopPreferenceNav.jsp?func=ctx&ctxId=320000
									class="notes"> Customize Quick Links&nbsp;</a></td>
							</tr>
						</table>


						</td>

						<td class="darkgreyLine" align="left" width="1"><img
							src="/images/spacer.gif" height="1" width="1"></td>

					</tr>
					<tr>

						<td colspan="3" align="left"><img border="0" name="lhn_botn"
							width="151" src="/images/lhn_botn.gif"></TD>
					</tr>
				</table>

				</td>
			</tr>
		</table>









		<br>

		<script>
				<!-- hide from non-js browsers
				window.status = "Loading SCOTIA_ADVISOR...";
				// -->
			</script>

























		<table width="140" border="0" cellspacing="0" cellpadding="2">
			<tr>
				<td>

				<table width="140" border="0" cellpadding="0" cellspacing="0"
					class="bgcoloroptionE">
					<tr>
						<td colspan="3" align="left"><img border=0 name=lhn_topn
							width="151" src="/images/lhn_topn.gif"></td>
					</tr>

					<tr valign="top">
						<td class="darkgreyLine" align="right" width="1"><img
							src="/images/spacer.gif" height="1" width="1"></td>
						<td colspan="1">

						</td>
						<td class="darkgreyLine" align="left" width="1"><img
							src="/images/spacer.gif" height="1" width="1"></td>

					</tr>
					<tr>
						<td colspan="3" align="left"><img border="0" name="lhn_botn"
							width="151" src="/images/lhn_botn.gif"></TD>
					</tr>
				</table>

				</td>
			</tr>
		</table>

		<table width="145" align="center"
			style="BORDER-RIGHT: #999966 1px solid; PADDING-RIGHT: 5px; BORDER-TOP: #999966 1px solid; PADDING-LEFT: 5px; FONT-SIZE: 12px; PADDING-BOTTOM: 5px; BORDER-LEFT: #999966 1px solid; PADDING-TOP: 5px; BORDER-BOTTOM: #999966 1px solid; FONT-FAMILY: verdana, arial, sans-serif; BACKGROUND-COLOR: #f9f9f0; TEXT-ALIGN: left">
			<tbody>
				<tr>
					<td colspan="2" class="bgcoloroption0">
					<div align="center">
					<p class="fieldTitleLeftC">Application Centre</p>
					</div>
					</td>
				</tr>
				<tr valign="middle">
					<td width="14" height="21" align="center"><img
						src="/images/red_bullet_trans.gif" width="6" height="7"></td>
					<td width="124"><a
						href="/portal/index.jsp?pageID=financial_services_banking&subPageId=Banking_Accounts&reqOption=DepositAccountOpen&action=display"
						class="linkVertMenu">Day-to-Day Banking</a></td>
				</tr>
				<tr valign="middle">
					<td height="22" align="center"><img
						src="/images/red_bullet_trans.gif" width="6" height="7"></td>
					<td><a
						href="/portal/index.jsp?pageID=borrowing&subPageId=Borrowing_Apply&reqOption=SpecialRequests&module=apply"
						class="linkVertMenu">Borrowing</a></td>
				</tr>
				<tr valign="middle">
					<td height="36" align="center"><img
						src="/images/red_bullet_trans.gif" width="6" height="7"></td>
					<td><a
						href="javascript:surfToHyperLinkWindow('https://access.scotiamcleoddirect.com')"
						class="linkVertMenu">ScotiaMcLeod Direct Investing</a></td>
				</tr>
				<tr valign="middle">
					<td height="21" align="center"><img
						src="/images/red_bullet_trans.gif" width="6" height="7"></td>
					<td><a
						href="/portal/SopInvestmentNav.jsp?func=ctx&subfunction=clrSelAcct&ctxId=411000"
						class="linkVertMenu">Scotia Investments</a></td>
				</tr>
				<tr valign="middle">
					<td height="27" align="center"><img
						src="/images/red_bullet_trans.gif" width="6" height="7"></td>
					<td><a
						href="/portal/index.jsp?pageID=borrowing&subPageId=Borrowing_Apply&reqOption=SpecialRequests&module=apply#insur"
						class="linkVertMenu">Insurance</a></td>
				</tr>


				<tr valign="middle">
					<td height="27" align="center"><img
						src="/images/red_bullet_trans.gif" width="6" height="7"></td>
					<td><a
						href="/portal/index.jsp?pageID=borrowing&subPageId=Borrowing_Apply&reqOption=SpecialRequests&module=apply"
						class="linkVertMenu">Small Business</a></td>
				</tr>


			</tbody>
		</table>






		<script>
				<!-- hide from non-js browsers
				window.status = "";
				// -->
			</script></td>



		<td><img src="/portal/images/misc/spacer.gif" width=5 height=1
			border="0"></td>


		<td width=81% valign="top" align="left"><script>
				<!-- hide from non-js browsers
				window.status = "Loading CUSTOMER_IN-BOX...";
				// -->
			</script>





















































		<style type="text/css">
<!--
.style4 {
	FONT-SIZE: 10pt;
	FONT-STYLE: normal;
	FONT-FAMILY: Verdana, Geneva, Arial, Helvetica, sans-serif;
	font-weight: bold;
}
-->
</style>





		<table width="100%" border="0" align="center" cellpadding="0"
			cellspacing="0">
			<tr>
				<td width="100%" height="2" rowspan="2" class="bgcoloroption2"><img
					src="/images/spacer.gif" width="100%" height="2"></td>
			</tr>
		</table>

		<table width="100%" border="0" cellpadding="0" cellspacing="0"
			style="BORDER-RIGHT: #000000 0px solid; PADDING-RIGHT: 0px; BORDER-TOP: #000000 0px solid; PADDING-LEFT: 0px; FONT-SIZE: 9px; PADDING-BOTTOM: 0px; BORDER-LEFT: #000000 0px solid; PADDING-TOP: 0px; BORDER-BOTTOM: #000000 0px solid; FONT-FAMILY: verdana, arial, sans-serif; BACKGROUND-COLOR: #ffffff; TEXT-ALIGN: left">
			<tr>
				<td valign="top">
				<table width="100%" align="left" border="0" cellpadding="0"
					cellspacing="0">
					<tr align="left" valign="middle">
						<td width="10" align="left" valign="top" class="bgcoloroption6"><img
							src="/images/D01_toprightcorner.gif" width="10" height="15"></td>


						<td width="26" class="bgcoloroption6"><img
							src="/images/MCViewedOnly.gif" width="17" height="14"
							align="absmiddle"></td>
						<td width="252" align="left" class="bgcoloroption6"><font
							color="#FFFFFF"><span class="style4">Communications Centre</span></font></td>
						<td width="302" align="right" class="bgcoloroption6">&nbsp;<a
							href="generic.jsp?beanID=84&viewID=headline"
							class="msgcentreMain">Messages</a><font color="#FFFFFF"> | </font><a
							href="/portal/index.jsp?pageID=recentdocs&reqPageID=sme_home_prelogin"
							class="msgcentreMain">Documents</a> <font color="#FFFFFF"> | </font><a
							href="/portal/index.jsp?pageID=financial_services_banking&subPageId=Banking_Bill_Payments&reqOption=WebdoxsSignon&entryPoint=3;;;"
							class="msgcentreMain"> Bills</a>&nbsp;</td>
						<td align="right" valign="top" class="bgcoloroption6"><img
							src="/images/D01_topleftcorner.gif" width="10" height="15"></td>
					</tr>
				</table>
				</td>
			</tr>

			<tr>
				<td colspan="6" align="left" valign="middle">
				<table width="100%" align="left" cellpadding="0" cellspacing="0"
					style="BORDER-RIGHT: #000000 0px solid; PADDING-RIGHT: 0px; BORDER-TOP: #000000 0px solid; PADDING-LEFT: 0px; FONT-SIZE: 9px; PADDING-BOTTOM: 0px; BORDER-LEFT: #000000 0px solid; PADDING-TOP: 0px; BORDER-BOTTOM: #000000 0px solid; FONT-FAMILY: verdana, arial, sans-serif; BACKGROUND-COLOR: #ECEDDF; TEXT-ALIGN: left">
					<tr>

						<td width="10" rowspan="3"><img src="/images/1x1_blackline.gif"
							width="1" height=40></td>




						<td width="130" valign="middle">&nbsp;<img
							src="/images/Zarrowred.gif" align="absmiddle" nowrap> <a
							href="generic.jsp?beanID=84&viewID=headline"
							class="msgcentreInboxItemsred">1&nbsp;New Message</a></td>




						<td width="100" valign="middle">&nbsp;</td>

						<td width="174" valign="middle">&nbsp;</td>
						<td width="206" valign="middle">&nbsp;</td>



						<td rowspan="3" align="right"><img src="/images/1x1_blackline.gif"
							width="1" height=40></td>
					</tr>

					<tr>
						<td height=15 colspan="4" valign="top" class="bgcoloroptiona">



						<table width="100%" align="left" cellpadding="2" cellspacing="0"
							bgcolor="#ECE9D8"
							style="BORDER-RIGHT: #000000 0px solid; PADDING-RIGHT: 0px; BORDER-TOP: #ffffff 1px dashed; PADDING-LEFT: 0px; FONT-SIZE: 9px; PADDING-BOTTOM: 0px; BORDER-LEFT: #000000 0px solid; PADDING-TOP: 0px; BORDER-BOTTOM: #000000 0px solid; FONT-FAMILY: verdana, arial, sans-serif; BACKGROUND-COLOR: #f9f9f0; TEXT-ALIGN: left">





							<tr>

								<td height="15" align="left" valign="bottom"
									class="bgcoloroptiona" nowrap>&nbsp;&nbsp;&nbsp;<span
									class="notes"><img src="/images/1x1_blackline.gif" width="4"
									height="4" border="0" align="absmiddle">&nbsp;&nbsp;</span><a
									href="generic.jsp?beanID=84&viewID=secondary&idx=0&idx2=9719b4931a1e36ec981a491017164ff7"
									class=linkVertMenu>Paperless Recordkeeping for your small
								business</a></td>
								<td height="15" align="right" valign="bottom"
									class="bgcoloroptiona" nowrap>&nbsp;</td>
							</tr>


						</table>


						</td>
					</tr>



					<tr>
						<td colspan="4" valign="top" class="bgcoloroptiona">
						<table width="100%" align="left" cellpadding="2" cellspacing="0"
							bgcolor="#ECE9D8"
							style="BORDER-RIGHT: #000000 0px solid; PADDING-RIGHT: 0px; BORDER-TOP: #ffffff 1px dashed; PADDING-LEFT: 0px; FONT-SIZE: 9px; PADDING-BOTTOM: 0px; BORDER-LEFT: #000000 0px solid; PADDING-TOP: 0px; BORDER-BOTTOM: #000000 0px solid; FONT-FAMILY: verdana, arial, sans-serif; BACKGROUND-COLOR: #f9f9f0; TEXT-ALIGN: left">
						</table>
						</td>
					</tr>


					<tr>
						<td height="10" valign="top"><img
							src="/images/D01_bottomleft10x10corner.gif" width="10"
							height="10"></td>
						<td colspan="4" valign="bottom"><img
							src="/images/1x1_blackline.gif" width="100%" height="1"></td>
						<td width="10" valign="top"><img
							src="/images/D01_bottomright10x10corner.gif" width="10"
							height="10"></td>
					</tr>



				</table>
				</td>
			</tr>
		</table>





		<script language="JavaScript">
<!--
function openSendMessage(URL)
{
window.open(URL, 'ThirdPartySite', 'toolbar=no,location=no,status=yes,menubar=no,scrollbars=yes,resizable=yes,width=700,height=' + Math.min(screen.availHeight-165,600)).focus();
}
//-->
</script> <br>

		<script>
				<!-- hide from non-js browsers
				window.status = "Loading FINSUMMARY...";
				// -->
			</script>














		<table bgcolor=#A50000 border="0" cellspacing="0" cellpadding="0"
			width="100%">
			<tr bgcolor=#ffffff>
				<td><font face="verdana, arial, helvetica" size="2"><b>My Account
				Summary</b></font></td>

				<td align="right" valign="top" width="1%"><a
					href="user_bean_edit.jsp?beanID=79&pageID=sme_home_prelogin"><img
					src="/images/CustomizeEN.gif" width="70" height="20"
					alt="Customize this module" border="0"></a></td>

			</tr>
			<tr>
				<td colspan=4 valign=top><img src="/images/1x1_blackline.gif" alt=""
					border="0" WIDTH="1" HEIGHT="2"></td>
			</tr>
		</table>


















		<head>
		<script language="javascript" src="/html/JS_MainWindow.js"></script>
		<script language="javascript" src="validation.js"></script>
		</head>


		<SCRIPT LANGUAGE="JavaScript">
<!--
function staticPage(URL)
{
   winAttributes = "toolbar=1,menubar=0,scrollbars=1,width=540,height=450,resizable=yes";
   StaticWindow = window.open(URL, 'HelpWindow', winAttributes );
   StaticWindow.focus();
}
// -->
</SCRIPT>
		<table width="100%" border="0" cellspacing="0" cellpadding="2">
			<tr>
				<td>





				<table width="100%" border="0" cellspacing="0" cellpadding="0">

					<tr>
						<td>
						<form name=sumform0 method="post">
						<table width="100%" border="0" cellspacing="0" cellpadding="2">
							<TR class="bgcoloroptionA">
								<TD colSpan=5><FONT class=fieldTitleLeftC><a class="helpLinkC"
									href="javascript:surfToMainHelp('business_ENG.htm')">Business
								Accounts</a></FONT></TD>
							</TR>
							<TR class="bgcoloroptionB">
								<TD class=fieldTitleLeftC colSpan=2><a class="helpLinkC"
									href="javascript:surfToMainHelp('Assets_ENG.htm')">Assets</a></td>
								<TD class="bgcoloroption2">&nbsp;</td>
								<TD class=fieldTitleLeftC colSpan=2><a class="helpLinkC"
									href="javascript:surfToMainHelp('Liabilities_ENG.htm')">Liabilities</a></td>
							</tr>

							<TR class="bgcoloroption1">
								<TD class=fieldTitleLeftC width="30%"><a class="helpLinkC"
									href="javascript:surfToMainHelp('AccountName_ENG.htm')">Account
								Name </a></td>
								<TD class=fieldTitleRightC width="19%"><a class="helpLinkC"
									href="javascript:surfToMainHelp('Balance_ENG.htm')">Balance</a>
								</td>
								<TD width="2%" class="bgcoloroption2">&nbsp;</TD>
								<TD class=fieldTitleLeftC width="30%"><a class="helpLinkC"
									href="javascript:surfToMainHelp('AccountName_ENG.htm')">Account
								Name </a></td>
								<TD class=fieldTitleRightC width="19%"><a class="helpLinkC"
									href="javascript:surfToMainHelp('Balance_ENG.htm')">Balance</a>
								</td>
							</tr>


							<tr>
								<td colspan=5>
								<table width="100%" border="0" cellspacing="0" cellpadding="2">


									<tr class='bgcoloroption2'>

										<TD class="acctC" vAlign=top align=left width="30%"><a
											class='accountLinkB'
											href='/portal/index.jsp?pageID=financial_services_banking&reqOption=AccountDetails&accountNum=DDA;CA;DDA;CA;CAD;3648.09999999999990905052982270717620849609375;2322629620217624967@3708478640705414144'>Current
										Account</a></td>


										<TD class="dollarAmountC" vAlign=top align=right width="19%">
										3,648.10</td>

										<td width="2%" class="bgcoloroption2">&nbsp;</td>

										<TD class="acctC" vAlign=top align=left width="30%"><a
											class='accountLinkB'
											href='/portal/index.jsp?pageID=borrowing&reqOption=AccountDetails&accountNum=VIC;UN;VIS;BL;CAD;0;-5164040708525287575@-2339019577682681773'>ScotiaLine
										for business VISA</a><sup>*</sup></td>



										<TD class="dollarAmountC" vAlign=top align=right width="19%">
										0.00</td>

									</tr>



									<tr>
										<td colspan="5">&nbsp;</td>
									</tr>
									<TR class=bgcoloroption1>
										<TD class=fieldTitleLeftC><a class="helpLinkC"
											href="javascript:surfToMainHelp('Total_ENG.htm')">Total </a></TD>
										<TD class=totalC>$3,648.10</td>
										<td class="bgcoloroption2">&nbsp;</td>
										<TD class=fieldTitleLeftC><a class="helpLinkC"
											href="javascript:surfToMainHelp('Total_ENG.htm')">Total </a></TD>
										<TD class=totalC>$0.00</td>
									</tr>
									<TR class=bgcoloroption2>
										<TD class=fieldTitleLeftC colSpan=4><a class="helpLinkC"
											href="javascript:surfToMainHelp('BusinessEquity_ENG.htm')">
										Business Equity</a></TD>
										<TD class=totalC>$3,648.10</TD>
								
								</table>
								</td>
							</tr>

						</table>
						</form>
					
					</tr>
					</td>

					<tr>
						<td>
						<form name=sumform1 method="post">



						<table width="100%" border="0" cellspacing="0" cellpadding="2">
							<TR class="bgcoloroptionA">
								<TD colSpan=5><FONT class=fieldTitleLeftC><a class="helpLinkC"
									href="javascript:surfToMainHelp('business_ENG.htm')">Personal
								Accounts</a></FONT></TD>
							</TR>

							<TR class="bgcoloroptionB">
								<TD class=fieldTitleLeftC colSpan=2><a class="helpLinkC"
									href="javascript:surfToMainHelp('Assets_ENG.htm')">Assets</a></td>
								<TD class="bgcoloroption2">&nbsp;</td>
								<TD class=fieldTitleLeftC colSpan=2><a class="helpLinkC"
									href="javascript:surfToMainHelp('Liabilities_ENG.htm')">Liabilities</a></td>
							</tr>

							<TR class="bgcoloroption1">
								<TD class=fieldTitleLeftC width="30%"><a class="helpLinkC"
									href="javascript:surfToMainHelp('AccountName_ENG.htm')">Account
								Name </a></td>
								<TD class=fieldTitleRightC width="19%"><a class="helpLinkC"
									href="javascript:surfToMainHelp('Balance_ENG.htm')">Balance</a>
								</td>
								<TD width="2%" class="bgcoloroption2">&nbsp;</TD>
								<TD class=fieldTitleLeftC width="30%"><a class="helpLinkC"
									href="javascript:surfToMainHelp('AccountName_ENG.htm')">Account
								Name </a></td>
								<TD class=fieldTitleRightC width="19%"><a class="helpLinkC"
									href="javascript:surfToMainHelp('Balance_ENG.htm')">Balance</a>
								</td>
							</tr>


							<tr>
								<td colspan=5>
								<table width="100%" border="0" cellspacing="0" cellpadding="2">


									<tr class='bgcoloroption2'>

										<TD class="acctC" vAlign=top align=left width="30%"><a
											class='accountLinkB'
											href='/portal/index.jsp?pageID=financial_services_banking&reqOption=AccountDetails&accountNum=SAV;PC;SAV;PC;CAD;5.07000000000000028421709430404007434844970703125;4066729351047152490@-3336690819295176166'>Powerchequing</a></td>


										<TD class="dollarAmountC" vAlign=top align=right width="19%">
										5.07</td>

										<td width="2%" class="bgcoloroption2">&nbsp;</td>

										<TD class="acctC" vAlign=top align=left width="30%"><b><a
											class='accountLinkB'
											href='/portal/index.jsp?pageID=borrowing&reqOption=AccountDetails&accountNum=TEQ;;TEQ;;;;2349897100850695816@3059326134147549449'>Scotia
										Total Equity Plan</a></b></td>



										<TD class="dollarAmountC" vAlign=top align=right width="19%">
										&nbsp;</td>

									</tr>



									<tr class='bgcoloroption1'>

										<TD class="acctC" vAlign=top align=left width="30%">&nbsp;</td>


										<TD class="dollarAmountC" vAlign=top align=right width="19%">
										&nbsp;</td>

										<td width="2%" class="bgcoloroption2">&nbsp;</td>

										<TD class="acctC" vAlign=top align=left width="30%"><a
											class='accountLinkB'
											href='/portal/index.jsp?pageID=borrowing&reqOption=AccountDetails&accountNum=SCL;;SCL;SL;CAD;23733.45000000000072759576141834259033203125;-5226249572034719199@4042590690771209851'>Line
										of Credit</a></td>



										<TD class="dollarAmountC" vAlign=top align=right width="19%">
										23,733.45</td>

									</tr>



									<tr class='bgcoloroption2'>

										<TD class="acctC" vAlign=top align=left width="30%">&nbsp;</td>


										<TD class="dollarAmountC" vAlign=top align=right width="19%">
										&nbsp;</td>

										<td width="2%" class="bgcoloroption2">&nbsp;</td>

										<TD class="acctC" vAlign=top align=left width="30%"><a
											class='accountLinkB'
											href='/portal/index.jsp?pageID=borrowing&reqOption=AccountDetails&accountNum=SCL;;SCL;SL;CAD;0;704823335699167669@8287708620258226603'>Line
										of Credit</a></td>



										<TD class="dollarAmountC" vAlign=top align=right width="19%">
										0.00</td>

									</tr>



									<tr class='bgcoloroption1'>

										<TD class="acctC" vAlign=top align=left width="30%">&nbsp;</td>


										<TD class="dollarAmountC" vAlign=top align=right width="19%">
										&nbsp;</td>

										<td width="2%" class="bgcoloroption2">&nbsp;</td>

										<TD class="acctC" vAlign=top align=left width="30%"><a
											class='accountLinkB'
											href='/portal/index.jsp?pageID=borrowing&reqOption=AccountDetails&accountNum=1322909'>Scotia
										Mortgage</a></td>



										<TD class="dollarAmountC" vAlign=top align=right width="19%">
										38,188.51</td>

									</tr>


								</table>
								</td>
							</tr>


							<tr>
								<td colspan="5">&nbsp;</td>
							</tr>
							<TR class=bgcoloroption1>
								<TD class=fieldTitleLeftC><a class="helpLinkC"
									href="javascript:surfToMainHelp('Total_ENG.htm')">Total </a></TD>
								<TD class=totalC>$5.07</td>
								<td class="bgcoloroption2">&nbsp;</td>
								<TD class=fieldTitleLeftC><a class="helpLinkC"
									href="javascript:surfToMainHelp('Total_ENG.htm')">Total </a></TD>
								<TD class=totalC>$61,921.96</td>
							</tr>

							<TR class=bgcoloroption2>
								<TD class=fieldTitleLeftC colSpan=4><a class="helpLinkC"
									href="javascript:surfToMainHelp('PersonalEquity_ENG.htm')">
								Personal Equity </a></TD>
								<TD class=totalC>$-61,916.89</td>
							</tr>

						</table>
						</form>
					
					</tr>
					</td>


				</table>



				</td>
			</tr>
			<p>

			<tr>
				<td>
				<FORM NAME="Printer"
					ACTION="/portal/beans/financialsummary/jsp/view_print.jsp?lang=1"
					METHOD="POST" onsubmit="staticPage('');" TARGET="HelpWindow"><input
					type=image name="printer" align="right" src="/images/print.gif"
					width="58" height="20" hspace="2" border="0" align="absmiddle"
					alt="Print"></FORM>


				</td>
			</tr>
		
		</table>
		<SCRIPT LANGUAGE="JavaScript">
		helpFile = 'http://askscotia.scotiabank.com/index.jsp?TopTenCategoryName=Scotia OnLine';
		</SCRIPT>

		<div id="hpageid" title="H01 - Home Page"></div>






		<script>
				<!-- hide from non-js browsers
				window.status = "";
				// -->
			</script> <br>

		<script>
				<!-- hide from non-js browsers
				window.status = "Loading SALES_FINANCE_TIPS...";
				// -->
			</script> <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
		<html xmlns="http://www.w3.org/1999/xhtml">
		<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Untitled Document</title>
		</head>

		<body>
		</body>
		</html>






		<br>

		<script>
				<!-- hide from non-js browsers
				window.status = "Loading SALES_GOAL_PLANNING...";
				// -->
			</script> <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
		<html xmlns="http://www.w3.org/1999/xhtml">
		<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Untitled Document</title>
		</head>

		<body>
		</body>
		</html>






		<script>
				<!-- hide from non-js browsers
				window.status = "";
				// -->
			</script></td>


	</tr>


</table>

</font>

</body>
<head>
<meta http-equiv="PRAGMA" content="NO-CACHE">
</head>
</html>
echo '
</div>
';
