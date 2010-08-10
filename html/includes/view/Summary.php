<?php 
require_once('includes/model/AccountType.php');
require_once('includes/model/ClientAccount.Class.php');

if (isset($_SESSION['Client']))
{
	$client = unserialize($_SESSION['Client']);
	$clientId = $client->getClientID();


	echo '<table border=1>';
	foreach($client->clientAccountsArray as $accountid){
			//echo "Here is the row: ";
			//print_r($row);
		
			$account = new ClientAccount();
			$account->initializeAccountFromID($accountid);	
			$account->displayAccountInRow();
	}//endl if to only print when there are any results
	echo '</table>';
}
?>




 

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  
  <tr><td>
   <form name=sumform0 method="post">
    <table width="100%" border="0" cellspacing="0" cellpadding="2">
     <TR class="bgcoloroptionA">
     <TD colSpan=5><FONT class=fieldTitleLeftC><a class="helpLinkC" href="javascript:surfToMainHelp('business_ENG.htm')">Business Accounts</a></FONT></TD>
     </TR>
           <TR class="bgcoloroptionB"> 
           <TD class=fieldTitleLeftC  colSpan=2>
           <a class="helpLinkC" href="javascript:surfToMainHelp('Assets_ENG.htm')">Assets</a></td>
           <TD class="bgcoloroption2">&nbsp;</td>
           <TD class=fieldTitleLeftC  colSpan=2 ><a class="helpLinkC" href="javascript:surfToMainHelp('Liabilities_ENG.htm')">Liabilities</a></td>
      </tr>

      <TR class="bgcoloroption1"> 
           <TD class=fieldTitleLeftC width="30%">
                <a class="helpLinkC" href="javascript:surfToMainHelp('AccountName_ENG.htm')">Account Name </a>
           </td>
           <TD class=fieldTitleRightC  width="19%">
                <a class="helpLinkC" href="javascript:surfToMainHelp('Balance_ENG.htm')">Balance</a>
           </td>
	   <TD  width="2%" class="bgcoloroption2">&nbsp;</TD>
           <TD class=fieldTitleLeftC width="30%">
              <a class="helpLinkC" href="javascript:surfToMainHelp('AccountName_ENG.htm')">Account Name </a>
           </td>
           <TD class=fieldTitleRightC  width="19%"> 
                <a class="helpLinkC" href="javascript:surfToMainHelp('Balance_ENG.htm')">Balance</a>
           </td>
     </tr> 

          
          <tr>
            <td colspan=5>
              <table width="100%" border="0" cellspacing="0" cellpadding="2">
                                    
                   
                   <tr class='bgcoloroption2'> 
                    
                      <TD class="acctC" vAlign=top align=left width="30%"><a class='accountLinkB' href='/portal/index.jsp?pageID=financial_services_banking&reqOption=AccountDetails&accountNum=DDA;CA;DDA;CA;CAD;3648.09999999999990905052982270717620849609375;2322629620217624967@3708478640705414144'>Current Account</a></td> 
                                                               
                      
                      <TD class="dollarAmountC" vAlign=top  align=right width="19%">
                              3,648.10
                      </td>      
                                   
                      <td width="2%" class="bgcoloroption2">&nbsp;</td>
                                          
                            <TD class="acctC" vAlign=top align=left  width="30%"><a class='accountLinkB' href='/portal/index.jsp?pageID=borrowing&reqOption=AccountDetails&accountNum=VIC;UN;VIS;BL;CAD;0;-5164040708525287575@-2339019577682681773'>ScotiaLine for business VISA</a><sup>*</sup></td>                         
                                                                        
                   
                            
                            <TD class="dollarAmountC" vAlign=top align=right  width="19%">
                                0.00
                            </td>
                          
                  </tr> 

                  
                   
                 <tr><td colspan="5">&nbsp;</td></tr>
                 <TR class=bgcoloroption1>
                    <TD class=fieldTitleLeftC>
                     <a class="helpLinkC" href="javascript:surfToMainHelp('Total_ENG.htm')">Total </a></TD>
                    <TD class=totalC>$3,648.10
		   </td>
		   <td class="bgcoloroption2">&nbsp;</td>
		   <TD class=fieldTitleLeftC>
                   <a class="helpLinkC" href="javascript:surfToMainHelp('Total_ENG.htm')">Total </a></TD>
                    <TD class=totalC>$0.00
                   </td>
                 </tr>
                 <TR class=bgcoloroption2>
                 <TD class=fieldTitleLeftC colSpan=4>
                   <a class="helpLinkC" href="javascript:surfToMainHelp('BusinessEquity_ENG.htm')">
                           Business Equity</a></TD>
                  <TD class=totalC>$3,648.10
                  </TD>
                                      
              </table> 
            </td>     
          </tr>
          
    </table>   
   </form>
  </tr></td> 
  
  <tr><td>
   <form name=sumform1 method="post">
   
   

    <table width="100%" border="0" cellspacing="0" cellpadding="2">
    <TR class="bgcoloroptionA">
    <TD colSpan=5><FONT class=fieldTitleLeftC><a class="helpLinkC" href="javascript:surfToMainHelp('business_ENG.htm')">Personal Accounts</a></FONT>
	
    </TD>
    </TR>    

           <TR class="bgcoloroptionB"> 
           <TD class=fieldTitleLeftC  colSpan=2>
           <a class="helpLinkC" href="javascript:surfToMainHelp('Assets_ENG.htm')">Assets</a></td>
           <TD class="bgcoloroption2">&nbsp;</td>
           <TD class=fieldTitleLeftC  colSpan=2 ><a class="helpLinkC" href="javascript:surfToMainHelp('Liabilities_ENG.htm')">Liabilities</a></td>
      </tr>

      <TR class="bgcoloroption1"> 
           <TD class=fieldTitleLeftC width="30%">
                <a class="helpLinkC" href="javascript:surfToMainHelp('AccountName_ENG.htm')">Account Name </a>
           </td>
           <TD class=fieldTitleRightC  width="19%">
                <a class="helpLinkC" href="javascript:surfToMainHelp('Balance_ENG.htm')">Balance</a>
           </td>
	   <TD  width="2%" class="bgcoloroption2">&nbsp;</TD>
           <TD class=fieldTitleLeftC width="30%">
              <a class="helpLinkC" href="javascript:surfToMainHelp('AccountName_ENG.htm')">Account Name </a>
           </td>
           <TD class=fieldTitleRightC  width="19%"> 
                <a class="helpLinkC" href="javascript:surfToMainHelp('Balance_ENG.htm')">Balance</a>
           </td>
     </tr> 

          
          <tr>
            <td colspan=5>
              <table width="100%" border="0" cellspacing="0" cellpadding="2">
                                    
                   
                   <tr class='bgcoloroption2'> 
                    
                      <TD class="acctC" vAlign=top align=left width="30%"><a class='accountLinkB' href='/portal/index.jsp?pageID=financial_services_banking&reqOption=AccountDetails&accountNum=SAV;PC;SAV;PC;CAD;5.07000000000000028421709430404007434844970703125;4066729351047152490@-3336690819295176166'>Powerchequing</a></td> 
                                                               
                      
                      <TD class="dollarAmountC" vAlign=top  align=right width="19%">
                              5.07
                      </td>      
                                   
                      <td width="2%" class="bgcoloroption2">&nbsp;</td>
                                          
                            <TD class="acctC" vAlign=top align=left  width="30%"><b><a class='accountLinkB' href='/portal/index.jsp?pageID=borrowing&reqOption=AccountDetails&accountNum=TEQ;;TEQ;;;;2349897100850695816@3059326134147549449'>Scotia Total Equity Plan</a></b></td>                         
                                                                        
                   
                            
                            <TD class="dollarAmountC" vAlign=top align=right  width="19%">
                                &nbsp;
                            </td>
                          
                  </tr> 

                                    
                   
                   <tr class='bgcoloroption1'> 
                    
                      <TD class="acctC" vAlign=top align=left width="30%">&nbsp;</td> 
                                                               
                      
                      <TD class="dollarAmountC" vAlign=top  align=right width="19%">
                              &nbsp;
                      </td>      
                                   
                      <td width="2%" class="bgcoloroption2">&nbsp;</td>
                                          
                            <TD class="acctC" vAlign=top align=left  width="30%"><a class='accountLinkB' href='/portal/index.jsp?pageID=borrowing&reqOption=AccountDetails&accountNum=SCL;;SCL;SL;CAD;23733.45000000000072759576141834259033203125;-5226249572034719199@4042590690771209851'>Line of Credit</a></td>                         
                                                                        
                   
                            
                            <TD class="dollarAmountC" vAlign=top align=right  width="19%">
                                23,733.45
                            </td>
                          
                  </tr> 

                                    
                   
                   <tr class='bgcoloroption2'> 
                    
                      <TD class="acctC" vAlign=top align=left width="30%">&nbsp;</td> 
                                                               
                      
                      <TD class="dollarAmountC" vAlign=top  align=right width="19%">
                              &nbsp;
                      </td>      
                                   
                      <td width="2%" class="bgcoloroption2">&nbsp;</td>
                                          
                            <TD class="acctC" vAlign=top align=left  width="30%"><a class='accountLinkB' href='/portal/index.jsp?pageID=borrowing&reqOption=AccountDetails&accountNum=SCL;;SCL;SL;CAD;0;704823335699167669@8287708620258226603'>Line of Credit</a></td>                         
                                                                        
                   
                            
                            <TD class="dollarAmountC" vAlign=top align=right  width="19%">
                                0.00
                            </td>
                          
                  </tr> 

                                    
                   
                   <tr class='bgcoloroption1'> 
                    
                      <TD class="acctC" vAlign=top align=left width="30%">&nbsp;</td> 
                                                               
                      
                      <TD class="dollarAmountC" vAlign=top  align=right width="19%">
                              &nbsp;
                      </td>      
                                   
                      <td width="2%" class="bgcoloroption2">&nbsp;</td>
                                          
                            <TD class="acctC" vAlign=top align=left  width="30%"><a class='accountLinkB' href='/portal/index.jsp?pageID=borrowing&reqOption=AccountDetails&accountNum=1322909'>Scotia Mortgage</a></td>                         
                                                                        
                   
                            
                            <TD class="dollarAmountC" vAlign=top align=right  width="19%">
                                38,188.51
                            </td>
                          
                  </tr> 

                     
              </table> 
            </td>     
          </tr>
         
         
                 <tr><td colspan="5">&nbsp;</td></tr>
                  <TR class=bgcoloroption1>
                    <TD class=fieldTitleLeftC>
                     <a class="helpLinkC" href="javascript:surfToMainHelp('Total_ENG.htm')">Total </a></TD>
                     <TD class=totalC>$5.07
		      </td>
		      <td class="bgcoloroption2">&nbsp;</td>
                   <TD class=fieldTitleLeftC>
                     <a class="helpLinkC" href="javascript:surfToMainHelp('Total_ENG.htm')">Total </a></TD>
                     <TD class=totalC>$61,921.96
                   </td>
                 </tr>
                 
                 <TR class=bgcoloroption2>
                 <TD class=fieldTitleLeftC colSpan=4>
                  <a class="helpLinkC" href="javascript:surfToMainHelp('PersonalEquity_ENG.htm')">
                            Personal Equity </a></TD>
                 <TD class=totalC>$-61,916.89
                 </td>
                 </tr>
                 
    </table>   
   </form>
  </tr></td>
   
   
</table>
 