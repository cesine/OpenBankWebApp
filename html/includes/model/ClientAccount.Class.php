<?php

class ClientAccount{
	private $clientAccountId;
	private $branchId;
	private $clientId;
	private $accountTypeId;
	private $accountName;
	private $currentBalance;
	private $availableBalance;
	private $status;
	private $openingDate;
	private $closingDate;

	public function getClientAccountId() {
		return $this->clientAccountId;
	}
	public function getBranchId() {
		return $this->branchId;
	}
	public function getClientId(){
		return $this->clientId;
	}
	public function getAccountTypeId(){
		return $this->accountTypeId;
	}
	public function getAccountName(){
		return $this->accountName;
	}
	public function getCurrentBalance(){
		return $this->currentBalance;
	}
	public function getAvailableBalance(){
		return $this->availableBalance;
	}
	public function getStatus($status) {
		return $this->status;
	}
	public function getOpeningDate(){
		return $this->openingDate;
	}
	public function getClosingDate($closingDate) {
		return $this->closingDate;
	}
        public function setClientAccountId($clientAccountId){
		$this->clientAccountId=$clientAccountId;
	}
	public function setBranchId($branchId){
		$this->branchId=$branchId;
	}
	public function setclientId($clientId) {
		$this->clientId=$clientId;
	}
	public function setAccountTypeId($accountTypeId){
		$this->accountTypeId=$accountTypeId;
	}
	public function setAccountName($accountName){
		$this->accountName=$accountName;
	}
	public function setCurrentBalance($currentBalance) {
		$this->currentBalance=$currentBalance;
	}	
	public function setAvailableBalance($availableBalance){
		$this->availableBalance=$availableBalance;
	}	
	public function setStatus($status) {
		$this->status=$status;
	}	
	public function setOpeningDate($openingDate){
		$this->openingDate=$openingDate;
	}
	public function setClosingDate($closingDate){
		$this->closingDate=$closingDate;
	}
	public function test(){
		$this->setCurrentBalance(12.99);
		'<br/>\n'.$this->CurrentBalance.			
		'</p>\n\n';
	}
	public function DisplayAcountDetailsInRow(){
		echo '<TR class="bgcoloroption1">
		<TD class="tableDataLeftC">'.$this->accountName.'</TD>
		<TD class="tableDataLeftC">'.$this->clientAccountId.'</TD>
		<TD class="tableDataRightC">'.$this->currentBalance.'</TD>
		<TD class="tableDataRightC">'.$this->availableBalance.'</TD>
		</TR>';
	}
	public function createAccount(){
		//use auto increment to create a new account number, and take in the account information for them 
		//add account page
	}
}	
?>