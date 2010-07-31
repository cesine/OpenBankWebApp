<?php

class Account{
	private $accountTypeId;
	private $serviceCategoryId;
	private $serviceTypeId;
	private $accountName;

	public function getAccountTypeId() {
		return $this->accountTypeId;
	}
	public function getServiceCategoryId() {
		return $this->serviceCategoryId;
	}
	public function getServiceTypeId(){
		return $this->serviceTypeId;
	}
	public function getAccountName(){
		return $this->accountName;
	}
	public function setAccountTypeId($accountTypeId){
		$this->accountTypeId=$accountTypeId;
	}
	public function setServiceCategoryId($serviceCategoryId) {
		$this->serviceCategoryId=$serviceCategoryId;
	}
	public function setServiceTypeId($serviceTypeId){
		$this->serviceTypeId=$serviceTypeId;
	}
	public function setAccountName($accountName) {
		$this->AccountName=$accountName;
	}	
}
?>