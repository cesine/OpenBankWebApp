<?php
require_once 'includes/model/Transaction.Class.php';

/*
 * Get client from session variable, then display list of
 */
if(isset($_SESSION)){
	$client= new Client();
	$client = unserialize($_SESSION['Client']);
	//$client->displaySelectClientAccount();

	$selectedAccountId=$client->clientAccountsArray[0];
	/*
	 * print out the Page header and transaction table header
	 */
	echo "<table bgcolor='#a50000' border='0' cellpadding='0' cellspacing='0'
				width='600'>
				<tbody>		<tr bgcolor='#ffffff'>
						<td width='58%'><font class='regularTextBold'>Transaction Detail for:
						<font color='#666666'>&nbsp;</font>Current Period</font></td>
						<td class='tableTitleRightC' width='42%'><span
							class='tableDataRightC'> </span></td>
					</tr>
				</tbody>
			</table><TABLE border='0' cellspacing='1' cellpadding='3' width='100%'>
				<TR class='bgcoloroption0'>
					<td class='fieldTitleLeftC' valign=top>Date<br></td>
					<td class='fieldTitleLeftC' valign=top>Description<br></td>
					<TD class='fieldTitleRightC' valign=top>Withdrawals</TD>
					<TD class='fieldTitleRightC' valign=top>Deposits</TD>
					<TD class='fieldTitleRightC' valign=top>Balance</TD>
				</TR>";

	/*
	 * get all transactions for this account and display most recent 5 transactions
	 */
	$numberOfTransactionsToDisplay=5;
	$sumWithdrawals=0;
	$sumDeposits=0;
	
	$dbGetSomeTransactions= new Database();
	$dbGetSomeTransactions->connect();
	$queryOrderedByDate="SELECT * FROM `transaction` 
	WHERE `accountid`=10000002	ORDER BY date ";//DESC if i want most recent on top
	//echo $queryOrderedByDate;
	$dbGetSomeTransactions->query($queryOrderedByDate);
	
	$dbGetSomeTransactions->close();
	
	for($count=0; $count<$numberOfTransactionsToDisplay; $count++){
		$transaction= new Transaction();
		$row=mysql_fetch_array($dbGetSomeTransactions->queryResultsResource);
		$transaction->initializeTransaction($row);
		
		/*
		 * Calculate the totals of withdrawals and deposits for selected transactions
		 */
		$sumWithdrawals=$sumWithdrawals+$transaction->getWithdrawalAmount();
		$sumDeposits=$sumDeposits+$transaction->getDepositAmount();
		
		$transaction->displayTransactionInRow($count);
	}

	$transaction= new Transaction();


	setlocale(LC_MONETARY, 'en_US');
	echo "
	<TR VALIGN='top' class='bgcoloroption2'>
			<TD colspan='2' class='fieldTitleRightC'>Total :</TD>
			<TD class='totalBalanceC' align=right>&nbsp;";
	echo money_format('%(#5n', $sumWithdrawals);
	echo 	"</TD>
			<TD class='totalBalanceC' align=right>&nbsp;";
	echo money_format('%(#5n', $sumDeposits);
	echo 	"</TD>
			<TD class='tableDataCenterC'>&nbsp;</TD>
	</TR></TABLE>";
}else{
	echo "Please Log In";
}


?>