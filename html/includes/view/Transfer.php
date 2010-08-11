<?php 
require_once 'includes/model/Client.Class.php';
require_once 'includes/model/Transaction.Class.php';

/*
 * Get client from session variable, then display list of
 */
if(isset($_SESSION)){
	$client= new Client();
	$client = unserialize($_SESSION['Client']);

	
	if($_POST['action']=="transfer"){
		
		/*
		 * build and insert 1 transaction for from account
		 * build and insert 1 transaction for to account
		 * update balance for from account
		 * update balance for to account
		 * http://www.learn-mysql-tutorial.com/Transactions.cfm
		 */
		$fromAccount = new ClientAccount();
		$fromAccount->initializeAccountFromID($_POST[fromaccount]);
		if ($_POST[amount]> $fromAccount->getCurrentBalance()){
			echo "Sorry, Insufficient Balance for this transfer.";
		}else{
			$transactionFromAccount= new Transaction();
			$transactionFromAccount->setAccountId($_POST[fromaccount]);
			$transactionFromAccount->setBalance($fromAccount->getCurrentBalance() - $_POST[amount]);
			$transactionFromAccount->setDate(date('Y-m-d'));
			$transactionFromAccount->setWithdrawalAmount($_POST[amount]);
			$transactionFromAccount->setDepositAmount("NULL");
			$transactionFromAccount->setClientID($client->getClientId());
			$transactionFromAccount->setTransactionDescription("Online Fund Transfer");
			$transactionFromAccount->setTransactionFeeCharged(0);
			$transactionFromAccount->setBranchId($client->getBranchID());
			$transactionFromAccount->setTransactionFeeType("free transaction");
			if(isset($_SESSION['Employee'])){
				$employee=unserialize($_SESSION['Employee']);
				$person=$employee->getEmployeeID();
			}else{
				$person=$client->getClientID();
			}
			$transactionFromAccount->setTransactionPerformedBy($person);
			$queryInsertForFromTransaction=$transactionFromAccount->buildInsertTransactionQuery();
			//echo $queryInsertForFromTransaction;
			//echo $transactionFromAccount->saveToDatabase();
			
			
			
			
			$toAccount= new ClientAccount();
			$toAccount->initializeAccountFromID($_POST[toaccount]);
			
			$transactionToAccount= new Transaction();
			$transactionToAccount->setAccountId($_POST[toaccount]);
			$transactionToAccount->setBalance($toAccount->getCurrentBalance() + $_POST[amount]);
			$transactionToAccount->setDate(date('Y-m-d'));
			$transactionToAccount->setWithdrawalAmount("NULL");
			$transactionToAccount->setDepositAmount($_POST[amount]);
			$transactionToAccount->setClientID($client->getClientId());
			$transactionToAccount->setTransactionDescription("Online Fund Transfer");
			$transactionToAccount->setTransactionFeeCharged(0);
			$transactionToAccount->setBranchId($client->getBranchID());
			$transactionToAccount->setTransactionFeeType("free transaction");
			$transactionToAccount->setTransactionPerformedBy($person);
			$queryInsertForToTransaction=$transactionToAccount->buildInsertTransactionQuery();
			//echo $queryInsertForToTransaction;
			
		
			$temp=$fromAccount->getCurrentBalance()-$_POST[amount];
			$queryUpdateFromAccountBallance="UPDATE `clientaccount` 
				SET `currentbalance` = ".$temp." WHERE `clientaccountid` = ".$fromAccount->getClientAccountId()." AND `branchid` = ".$client->getBranchID();
			//echo $queryUpdateFromAccountBallance;
			$temp=$toAccount->getCurrentBalance()+$_POST[amount];
			$queryUpdateToAccountBallance="UPDATE `clientaccount` 
				SET `currentbalance` = ".$temp." 
				WHERE `clientaccountid` = ".$toAccount->getClientAccountId()." AND `branchid` = ".$client->getBranchID();
			//echo $queryInsertForToTransaction;
			
			$transferQueryArray[0]=$queryInsertForFromTransaction;
			$transferQueryArray[1]=$queryUpdateFromAccountBallance;
			$transferQueryArray[2]=$queryInsertForToTransaction;
			$transferQueryArray[3]=$queryUpdateToAccountBallance;
			
			$dbTransferMoney = new Database();
			$dbTransferMoney->connect();
			$transferResultArray=$dbTransferMoney->transactionSafeInsertUpdate($transferQueryArray);
			$dbTransferMoney->close();
			//echo "All 4 transactions have been run, here are the results: ";
			//print_r($transferResultArray);
					
			echo "<p>Your money has been transfered.</p>";
			$_SESSION['DisplayAccount']=$_POST[fromaccount];
			include 'includes/view/RecentActivity.php';
			$_SESSION['DisplayAccount']=$_POST[toaccount];
			include 'includes/view/RecentActivity.php';
			/*
			 * Dont allow multiple pushes of the reload or back button to create multiple transfers
			 */
			unset($_POST);
		}
	}else{	
		echo "<form action='' method='post'>
		<table cellpadding='0' cellspacing='2' width='100%' border=0>
		<tbody>
			<tr>
				<td  align='left'>
					<font class='regularTextBold'>Transfer money </font>
				</td>
			</tr>
			<tr>
				<td  width='33%'><label
					for='amount' >Amount ($):</label>
				</td>
			</tr>
			<tr>
				<td >
				<input value='' autocomplete='OFF' maxlength='12' size='12'
					name='amount' type='text'>
				</td>
			</tr>
			<tr>
				<td align='right'><label
					for='fromaccount' >From: </label>";
		$client->displaySelectAccountForFromSelect("fromaccount");
		echo "</td>
			</tr>
			
			<tr>
				<td align='right' ><label
					for='toaccount' >To: </label>";
		$fromaccount='$fromaccount';
		$client->displaySelectAccountWithChooseSelect("toaccount");
		echo "</td>
			</tr>
			</tbody>
		</table>
		<input type='hidden' name='action' value='transfer'>
		<input type='submit' name='mysubmit' value='Submit'>";
	}//end if action is not set to transfer, ie a transfer has not been made
}else{
	echo "Please log in.";
}
?>