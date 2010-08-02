<?php 
include('includes/model/Transaction.Class.php');

include('includes/controller/Database.Class.php');

// access client_account_id
require_once 'includes/model/ClientAccount.Class.php';


echo '<div>';
$transactionToDisplay = new Transaction();
//$transactionToDisplay->test();
//$transactionToDisplay->displayTransaction();
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
$hit =3;
	for ($i = 0; $i < $hit; $i++)
	{    		
	
		// Display array of Transactions
		//$resultsArray[$i]->displayTransactionInRowFormatted();
		
		$transactionToDisplay->displayTransactionInRowFormatted();
	}

/*
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
	//echo '<table width="100%" border="1" cellpadding="5" cellspacing="1">';

	//echo '</th>';
	//$resultsArray[0]->displayTableHeadingRow();

	for ($i = 0; $i < $hit; $i++)
	{    		
	
		// Display array of Transactions
		//$resultsArray[$i]->displayTransactionInRowFormatted();
		
		$transactionToDisplay->displayTransactionInRowFormatted();
	}
 
	   
}
*/	
?>


</table>

<P></P>


<?php
/*
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
	echo '<table width="100%" border="1" cellpadding="5" cellspacing="1">';

	//echo '</th>';
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
*/
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
 
 <P> Transactions details. </P>
 
 <!--
 <form action="?&content=Statement" method="post">
 -->

<?php
 /*
 * Build dynamic selection list
 */
$dbSelectionListClientAccounts = new Database();
$dbSelectionListClientAccounts->connect();

$querySelectClientAccounts="SELECT DISTINCT clientaccountid 
							FROM clientaccount
							WHERE clientid = 54010001";
							
$dbSelectionListClientAccounts->query($querySelectClientAccounts);	
$result = $dbSelectionListClientAccounts->query($querySelectClientAccounts);						

/* Create form containing selection list */
//echo "<form action='process_form.php' method='POST'
echo "<form action='?&content=Statement' method='POST'
			style='margin-left: 2em'>
	  <label for 'clientaccountid'
	  		 style='font-weight: bold'>Select account:</label>
	   <select ID='clientaccountid'	NAME='clientaccountid'	 					
			   style='margin-left: 3em'>\n";
			   
/*Put results of query into dynamic list*/
for($count=0;$count<$dbSelectionListClientAccounts->queryResultsCount;$count=$count+1)
{
	$row=mysql_fetch_array($dbSelectionListClientAccounts->queryResultsResource);
	extract($row);
	echo "<option value='$clientaccountid'>$clientaccountid</option>";

}//endl if to only print when there are any results
echo "</select>\n";	
$dbSelectionListClientAccounts->close();	   		
?>
<P></P>

<?php
/*Select date since for displaying transactions*/

$today = time(); 									// stores today's date
$f_today = date("M-d-Y",$today); 					// formats today's date

//echo "<h4> Today is $f_today </h4>\n";
//echo "<h4> </h4>\n";
echo "<h4> Select date since: </h4>\n";

//echo "<form action='process_form.php' method='POST'>\n";
echo "<form action='?&content=Statement' method='POST'>\n";

/*build selection list for year*/
$startYr1 = date("Y",$today); 					// get year from $today
$startYr = $startYr1-20;
echo "<select name='dateYear'>\n";
for ($n=$startYr; $n<=$startYr1; $n++)
{
	echo "<option value=$n>";
	echo "$n</option>\n";
}
echo "</select>\n";


/*build selection list for month*/

$monthName = array(1=> "January", "February", "March",
					   "April", "May", "June", "July", "August",
					   "September", "October", "November", "December");

$todayMO = date("n",$today); 						// get month from $today
echo "<select name='dateMonth'>\n";
for ($n=1; $n<=12; $n++)
{
	echo "<option value=$n>";
	echo "$monthName[$n]\n</option>";
}
echo "</select>\n";


/*build selection list for day*/

$todayDay = date("d",$today); 					// get day from $today
echo "<select name='dateDay'>\n";
for ($n=1; $n<=31; $n++)
{
	echo "<option value=$n>";
	echo "$n</option>\n";
}
echo "</select>\n";

?>

<P></P>
<input type="submit" value="submit selection"/>
<P></P>

<?php
$selectedAccount=$_POST["clientaccountid"];
$selectedYear=$_POST["dateYear"];
$selectedMonth=$_POST["dateMonth"];
$selectedDay=$_POST["dateDay"];
echo "<h4> Transactions details for: </h4>\n";
echo "<h5> account number: $selectedAccount.</h5>\n";
echo "<h5> since: $selectedYear-$selectedMonth-$selectedDay. </h4>\n";
?>

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


// Display transactions from table "transaction"
$dbClientAccountTransactions = new Database();
$dbClientAccountTransactions->connect();

$queryClientAccountTransactions=
"SELECT date, transactiondescription,depositamount,withdrawalamount, balance
FROM transaction
WHERE clientid = 54010001 AND accountid=10000001";
							
$dbClientAccountTransactions->query($queryClientAccountTransactions);	

/*Put results of query into table on the screen*/
for($count=0;$count<$dbClientAccountTransactions->queryResultsCount;$count=$count+1)
{
	$row=mysql_fetch_array($dbClientAccountTransactions->queryResultsResource);	
	$transactionToDisplay->initializeTransaction($row);
	$transactionToDisplay->displayTransactionInRowFormatted();

}//endl if to only print when there are any results

$dbClientAccountTransactions->close();

?>
</table>


<P></P>


 