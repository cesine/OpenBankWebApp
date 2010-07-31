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
		return $this->accountTypeId;
	}
	public function setServiceCategoryId($serviceCategoryId) {
		return $this->serviceCategoryId;
	}
	public function setServiceTypeId($serviceTypeId){
		return $this->serviceTypeId;
	}
	public function setAccountName($accountName) {
		return $this->AccountName;
	}	
