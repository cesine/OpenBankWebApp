<?php
require_once 'includes/model/Transaction.Class.php';
require_once 'includes/model/BankingPlans.php';
require_once 'includes/model/BorrowingPlans.php';

/*
 * Get client from session variable, then display list of
 */
if(isset($_SESSION)){
	$client= new Client();
	$client = unserialize($_SESSION['Client']);

	$client->setClientAccountsArray($clientId);
		
	$selectedAccountId = $_GET['accountid'];
	$selectedAccountType = $_GET['accounttype'];
	
	if ( $selectedAccountId == "" )
		$selectedAccountId=$_SESSION['DisplayAccount'];
		
	$clientAccount = new ClientAccount();
	$clientAccount->initializeAccountFromID($selectedAccountId);		
	
	$clientAccountName = $clientAccount->getAccountTypeName();
	$currentBalance = $clientAccount->getCurrentBalance();
	$availableBalance = $clientAccount->getAvailableBalance();
	$accountTypeId = $clientAccount->getAccountTypeId();
	
	if ( $selectedAccountType == "Banking")
	{
//		$bankingPlan = new BankingPlans();
//		$bankingPlan->setAccountTypeId($accountTypeId);
//		$overdraftAmount = $bankingPlan->getOverdraftAmount();
		
		echo "<table bgcolor='#a50000' border='0' cellpadding='0' cellspacing='0'
					width='600'>
					<tbody>	
						<tr bgcolor='#ffffff'>
							<td width='58%' align=center><font class='regularTextBold'>Account Details for:<br>
							<font color='#666666'>&nbsp;</font>$clientAccountName - $selectedAccountId</font></td>
						</tr>
					</tbody>
				</table>
				<TABLE border='0' cellspacing='1' cellpadding='3' width='100%'>
					<TR class='bgcoloroption0'>
						<td class='fieldTitleLeftC' valign=top width=\"30%\">Account Name<br></td>
						<td class='fieldTitleLeftC' valign=top width=\"20%\">Account Number<br></td>
						<TD class='fieldTitleRightC' valign=top width=\"25%\">Current<br> Balance CAD</TD>
						<TD class='fieldTitleRightC' valign=top width=\"25%\">Available<br> Balance CAD</TD>
					</TR>
						<TR class='bgcoloroption1'>
						<td class='tableDataLeftC' valign=top>$clientAccountName<br></td>
						<td class='tableDataLeftC' valign=top>$selectedAccountId<br></td>
						<TD class='tableDataRightC' valign=top>$currentBalance</TD>
						<TD class='tableDataRightC' valign=top>$availableBalance</TD>
					</TR><tr><td></td></tr><tr></tr></table>";
		
	}
	elseif ( $selectedAccountType == "Borrowing")
	{
		$borrowingPlan = new BorrowingPlans();
		$borrowingPlan->setAccountTypeId($accountTypeId);
		$creditLimit = $borrowingPlan->getCreditLimit();
		$availableCredit = $creditLimit - $currentBalance;
		
		echo "<table bgcolor='#a50000' border='0' cellpadding='0' cellspacing='0'
					width='600'>
					<tbody>	
						<tr bgcolor='#ffffff'>
							<td width='58%' align=center><font class='regularTextBold'>Account Details for:<br>
							<font color='#666666'>&nbsp;</font>$clientAccountName - $selectedAccountId</font></td>
						</tr>
					</tbody>
				</table>
				<TABLE border='0' cellspacing='1' cellpadding='3' width='100%'>
					<TR class='bgcoloroption0'>
						<td class='fieldTitleLeftC' valign=top width=\"30%\">Account Name<br></td>
						<td class='fieldTitleLeftC' valign=top width=\"20%\">Account Number<br></td>
						<TD class='fieldTitleRightC' valign=top width=\"25%\">Current<br> Balance CAD</TD>
						<TD class='fieldTitleRightC' valign=top width=\"25%\">Available<br> Credit CAD</TD>
					</TR>
						<TR class='bgcoloroption1'>
						<td class='tableDataLeftC' valign=top>$clientAccountName<br></td>
						<td class='tableDataLeftC' valign=top>$selectedAccountId<br></td>
						<TD class='tableDataRightC' valign=top>$currentBalance</TD>
						<TD class='tableDataRightC' valign=top>$availableBalance</TD>
					</TR><tr><td></td></tr><tr></tr></table>";
		
	}
	
	echo "<br><br>";
	
	/*
	 * print out the Page header and transaction table header
	 */
	echo "<table bgcolor='#a50000' border='0' cellpadding='0' cellspacing='0'
				width='600'>
				<tbody>		<tr bgcolor='#ffffff'>
						<td width='58%' align=center><font class='regularTextBold'>Transaction Details for:<br>
						<font color='#666666'>&nbsp;</font>Current Period in Account - $selectedAccountId</font></td>
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
	$numberOfTransactionsToDisplay=15;
	$sumWithdrawals=0;
	$sumDeposits=0;
	
	$dbGetSomeTransactions= new Database();
	$dbGetSomeTransactions->connect();
	$queryOrderedByDate="SELECT * FROM `transaction` 
	WHERE `accountid`=".$selectedAccountId." ORDER BY transactionid ";//date DESC";//LIMIT ".$numberOfTransactionsToDisplay;//DESC if i want most recent on top
	//echo $queryOrderedByDate;
	$dbGetSomeTransactions->query($queryOrderedByDate);
	
	$dbGetSomeTransactions->close();
	$numberOfTransactionsToDisplay=$dbGetSomeTransactions->queryResultsCount;
	
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