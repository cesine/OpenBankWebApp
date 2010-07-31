<?php 
class Transaction{
	private $transactionID;
	private $clientID;
	private $accounteID;
	private $date;
	private $transactionFeeCharged;
	private $transactionFeeType;
	private $depositAmount;
	private $withdrawalAmount;
	private $balance;
	private $transactionDescription;	
	

	public function getTransactionID() {
		return $this->transactionID;
	}
	public function getClientID(){
		return $this->clientID;
	}
	public function getAccounteID(){
		return $this->accounteID;
	}
	public function getDate(){
		return $this->date;
	}
	public function getTransactionFeeCharged(){
		return $this->transactionFeeCharged;
	}
	public function getTransactionFeeType() {
		return $this->transactionFeeType;
	}
	public function getDepositAmount(){
		return $this->depositAmount;
	}
	public function getWithdrawalAmount(){
		return $this->withdrawalAmount;
	}
	public function getBalance(){
		return $this->balance;
	}
	public function getTransactionDescription(){
		return $this->transactionDescription;
	}	
	
		
	public function setTransactionID($transactionID) {
		$this->transactionID=$transactionID;
	}
	public function setClientID($clientID){
		$this->clientID=$clientID;
	}
	public function setAccounteID($accounteID){
		$this->accounteID=$accounteID;
	}
	public function setDate($date){
		$this->date=$date;
	}
	public function setTransactionFeeCharged($transactionFeeCharged) {
		$this->transactionFeeCharged=$transactionFeeCharged;
	}
	public function setTransactionFeeType($transactionFeeType){
		$this->transactionFeeType=$transactionFeeType;
	}
	public function setDepositAmount($depositAmount){
		$this->depositAmount=$depositAmount;
	}
	public function setWithdrawalAmount($withdrawalAmount){
		$this->withdrawalAmount=$withdrawalAmount;
	}
	public function setBalance($balance){
		$this->balance=$balance;
	}
	public function setTransactionDescription($transactionDescription){
		$this->transactionDescription=$transactionDescription;
	}
	
	function test(){
		echo 'Testing the transactions functionalities.';
		$this->setTransactionID(0001);
		$this->setClientID(0002);
		$this->setAccounteID(0003);
		$this->setDate("2010-01-01");
		$this->setTransactionFeeCharged(5);
		$this->setTransactionFeeType("monthly fee");
		$this->setDepositAmount(1000);
		$this->setWithdrawalAmount(0);	
		$this->setBalance(1000);
		$this->setTransactionDescription("my deposit");	

		function displayTransaction(){
		echo '<p class="Transaction ID">'.
		$this->transactionID.
		'<br/>\n'.$this->clientID.		
		'<br/>\n'.$this->accounteID.
		'<br/>\n'.$this->date.		
		'<br/>\n'.$this->transactionFeeCharged.		
		'<br/>\n'.$this->depositAmount.		
		'<br/>\n'.$this->withdrawalAmount.	
		'<br/>\n'.$this->balance.		
		'<br/>\n'.$this->transactionDescription.				
		'</p>\n\n';
		}
		function __construct(){
			echo 'Creating transaction. Change somethings';
			$this->transactionID =0001;
			$this->clientID =0002;
			$this->accounteID =0003;			
			$this->date ="2010-01-01";			
			$this->transactionFeeCharged =5;			
			$this->depositAmount =1000;			
			$this->withdrawalAmount =0;			
			$this->balance =1000;
			$this->transactionDescription ="my deposit";
			
		}		
		
		
		
	}	
	
	
	
	
}
?>