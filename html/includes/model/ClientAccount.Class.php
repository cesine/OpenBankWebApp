<?php

class ClientAccount{
	private $clientAccountId;
	private $branchId;
	private $clientId;
	private $accountTypeId;
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
	public function setBranchId($branchId){
		$this->branchId=$branchId;
	}
	public function setclientId($clientId) {
		$this->clientId=$clientId;
	}
	public function setAccountTypeId($accountTypeId){
		$this->accountTypeId=$accountTypeId;
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
	}
	
	
}	
?>