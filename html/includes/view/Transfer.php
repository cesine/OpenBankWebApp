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
		if ($_POST[amount]> $fromAccount->getAvailableBalance()){
			echo "Sorry, Insufficient Balance for this transfer.";
		}else{
			$transactionFromAccount= new Transaction();
			$transactionFromAccount->setAccountId($_POST[fromaccount]);
			$transactionFromAccount->setBalance($fromAccount->getAvailableBalance() - $_POST[amount]);
			$transactionFromAccount->setDate('Y-m-d');
			$transactionFromAccount->setWithdrawalAmount($_POST[amount]);
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
			
			$queryInsertToTransaction="INSERT INTO  transaction (
				`transactionid` ,`branchid` ,`accountid` , `date` ,
				`transactionfeecharged` ,	`transactionfeetype` ,	`depositamount` ,
				`withdrawalamount` , `balanceaftertransaction` , 
				`transactiondescription` , `transperformedby`)
				VALUES (NULL ,  '".$transactionFromAccount->getBranchId()."',  '".$transactionFromAccount->getAccountId()."',  '".$transactionFromAccount->getDate()."',
				  '".$transactionFromAccount->getTransactionFeeCharged()."',  '".$transactionFromAccount->getTransactionFeeType()."',  '".$transactionFromAccount->getDepositAmount()."',
				   ".$transactionFromAccount->getWithdrawalAmount()." ,  '".$transactionFromAccount->getBalance()."',  
				   '".$transactionFromAccount->getTransactionDescription()."',  '".$transactionFromAccount->getTransactionPerformedBy()."')";
			echo $queryInsertToTransaction;
			
			
			$toAccount= new ClientAccount();
			$toAccount->initializeAccountFromID($_POST[toaccount]);
			
			$transactionToAccount= new Transaction();
			$transactionToAccount->setAccountId($_POST[toaccount]);
			$transactionToAccount->setBalance(3);
			
			
			echo "<p>Money Transfered.</p>";
			$_SESSION['DisplayAccount']=$_POST[fromaccount];
			include 'includes/view/RecentActivity.php';
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
		$client->displaySelectAccountWithChooseSelect("fromaccount");
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