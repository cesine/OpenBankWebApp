<?php 
include('includes/model/Transaction.Class.php');
echo '<div>';
$transactionToDisplay = new Transaction();
$transactionToDisplay->test();
$transactionToDisplay->displayTransaction();
echo '</div>';
?>

<!-- Ctreate header for table -->
<table width="100%" border="1" cellpadding="3" cellspacing="1">
<tr>
<td>
Date
</td>
<td>
Desctiption
</td>
<td>
Withdraw
</td>
<td>
Deposits
</td>
<td>
Balance
</td>
</tr>
<?php
$transactionToDisplay->displayTransactionInRowFormatted();
?>
</table>



<?php
//Check to see if there is a transactions_array in the sessions variable, 
//if there is it is because the mapper put one there. The transactions array is the 
//serialzed version of a transaction object. If it is set, it means that there is 
//some results to display. 

if ($_SESSION['TransactionsArray']){
	 if ($_SESSION['TransactionsArray'][0]){ 
 		//put the result objects into the results array 
  		$resultsArray = unserialize($_SESSION['TransactionsArray']); 
  		//put the number of results into hit 
	 	//$hit= count($resultsArray);  	
	 	$hit=3;					
 	 }
 	 else{	 
  			$hit=0;	 	
 	 }
 }


// For each hit - Displays transactions

if ($hit == 0)
{
    echo ('No results found.');
    echo '<br>';
}
else
{
	echo '<table width="100%" border="1" cellpadding="3" cellspacing="1">';

	echo '</th>';
	//$resultsArray[0]->displayTableHeadingRow();

	for ($i = 0; $i < $hit; $i++)
	{    		
	
		// Display array of Transactions
		//$resultsArray[$i]->displayTransactionInRowFormatted();
		
		$transactionToDisplay->displayTransactionInRowFormatted();
	}
 
	echo '</table>';
	echo '<br>';   
}
?>



<!-- Ctreate row in table -->
 <!-- <table width="100%" border="1" cellpadding="3" cellspacing="1">
<tr>
<td>
Date
</td>
<td>
Desctiption
</td>
<td>
Withdraw
</td>
<td>
Deposits
</td>
<td>
Balance
</td>
</tr>

<?php //$transactionToDisplay->displayTransactionInRowFormatted();?>
</table>

<P> </P>
<table width="100%" border="0" cellpadding="3" cellspacing="1">

<tbody><tr class="bgcoloroption0">
	<td class="fieldTitleLeftC" valign="top">Date<br><span class="regularText">Sort&nbsp;</span><a class="accountLinkB" href="/portal/index.jsp?pageID=financial_services_banking&amp;?reqOption=AccountHistoryDisplay&amp;action=reDisplay&amp;FUNCTION=1&amp;accttype=DDA&amp;token=792CD57BEF9608B7B7C55AC9C5B64ACC2D30B076FBD115F7460C07D41EECFE79F1A&amp;language=English">

	
		<img src="/images/red_upTR.gif" alt="Ascending" width="13" border="0" height="9">
	

	</a><a href="/portal/index.jsp?pageID=financial_services_banking&amp;?reqOption=AccountHistoryDisplay&amp;action=reDisplay&amp;FUNCTION=3&amp;accttype=DDA&amp;token=792CD57BEF9608B7B7C55AC9C5B64ACC2D30B076FBD115F7460C07D41EECFE79F1A&amp;language=English" class="rewardsItemlink" title="Set Sort Order for all Banking Accounts">Set</a></td>
	<td class="fieldTitleCenterC" valign="top">Num</td>

	<td class="fieldTitleLeftC" valign="top">Description<br><span class="regularText">Sort&nbsp;</span><a class="accountLinkB" href="/portal/index.jsp?pageID=financial_services_banking&amp;?reqOption=AccountHistoryDisplay&amp;action=reDisplay&amp;FUNCTION=2&amp;accttype=DDA&amp;token=792CD57BEF9608B7B7C55AC9C5B64ACC2D30B076FBD115F7460C07D41EECFE79F1A&amp;language=English"><img src="/images/black_upTR.gif" alt="Ascending" width="13" border="0" height="9"></a></td>

	<td class="fieldTitleRightC" valign="top">Withdrawals</td>
	<td class="fieldTitleRightC" valign="top">Deposits</td>
	<td class="fieldTitleRightC" valign="top">Balance</td>
</tr>


<tr class="bgcoloroption1" valign="top">
	<td class="tableDataLeftC" nowrap="nowrap">2010-07-05</td>

	<td class="tableDataCenterC">-</td>
	
		<td class="tableDataLeftC">Credit Memo<br>OTHER </td>
	
		<td class="tableDataCenterC">-</td>
	
		<td class="tableDataRightC" align="right">
     		$700.00
  		</td>
		
		   <td class="tableDataRightC" align="right">
		     
     			$4,890.80
		     
		  </td>
	
</tr>


<tr class="bgcoloroption2" valign="top">
	<td class="tableDataLeftC" nowrap="nowrap">2010-07-06</td>
	<td class="tableDataCenterC">-</td>

		<td class="tableDataLeftC">Customer Transfer Dr.<br>PC TO 4538156430915 </td>
	
		<td class="tableDataRightC" align="right">
		$4,190.00
		</td>
	
		<td class="tableDataCenterC">-</td>
		
		   <td class="tableDataCenterC">-</td>
		
</tr>


<tr class="bgcoloroption1" valign="top">
	<td class="tableDataLeftC" nowrap="nowrap">2010-07-06</td>

	<td class="tableDataCenterC">-</td>
	
		<td class="tableDataLeftC">Customer Transfer Dr.<br>PC TO 4538156430915 </td>
	
		<td class="tableDataRightC" align="right">
		$10.00
		</td>
	
		<td class="tableDataCenterC">-</td>
		
		   <td class="tableDataRightC" align="right">
		     
     			$690.80
		     
		  </td>
	
</tr>


<tr class="bgcoloroption2" valign="top">
	<td class="tableDataLeftC" nowrap="nowrap">2010-07-13</td>
	<td class="tableDataCenterC">-</td>
	
		<td class="tableDataLeftC">Deposit<br> </td>
	
		<td class="tableDataCenterC">-</td>
	
		<td class="tableDataRightC" align="right">
     		$4,515.00
  		</td>
		
		   <td class="tableDataRightC" align="right">
		     
     			$5,205.80
		     
		  </td>
	
</tr>


<tr class="bgcoloroption1" valign="top">
	<td class="tableDataLeftC" nowrap="nowrap">2010-07-14</td>
	<td class="tableDataCenterC">2</td>
	
		<td class="tableDataLeftC"><a class="accountLinkB" title="View Cheque Image" href="/portal/index.jsp?pageID=financial_services_banking&amp;subPageId=Banking_Accounts&amp;reqOption=ChqImgDisclaimer&amp;src=AccountHistory&amp;an=DDA;CA;DDA;CA;CAD;3648.09999999999990905052982270717620849609375;2322629620217624967@3708478640705414144&amp;idx=4">Cheque</a><br> </td>
	
		<td class="tableDataRightC" align="right">
		$669.70
		</td>

		<td class="tableDataCenterC">-</td>

	
		   <td class="tableDataRightC" align="right">
		     
     			$4,536.10
		     
		  </td>
	
</tr>



<tr class="bgcoloroption1" valign="top">
	<td class="tableDataLeftC" nowrap="nowrap">2010-07-26</td>
	<td class="tableDataCenterC">-</td>
	
		<td class="tableDataLeftC">Deposit<br> </td>
	
		<td class="tableDataCenterC">-</td>
	
		<td class="tableDataRightC" align="right">
     		$3,612.00
  		</td>
		
		   <td class="tableDataRightC" align="right">
		     
     			$3,648.10
		     
		  </td>
	
</tr>

	<tr class="bgcoloroption2" valign="top">
	  <td colspan="3" class="fieldTitleRightC">Total

		:</td>
	  <td class="totalBalanceC" align="right">&nbsp;$9,369.70</td>

	  <td class="totalBalanceC" align="right">&nbsp;$8,827.00</td>
	  <td class="tableDataCenterC">&nbsp;</td>
	</tr>
	

</tbody></table>
 -->
