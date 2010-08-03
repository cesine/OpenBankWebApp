<?php

class Account{
	private $employeeid;
	private $addressid;
	private $branchid;
	private $titleid;

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

<!--  
salary 	double 			No 	None 		Browse distinct values 	Change 	Drop 	Primary 	Unique 	Index 	Fulltext
	firstname 	varchar(20) 	utf8_general_ci 		No 	None 		Browse distinct values 	Change 	Drop 	Primary 	Unique 	Index 	Fulltext
	lastname 	varchar(20) 	utf8_general_ci 		No 	None 		Browse distinct values 	Change 	Drop 	Primary 	Unique 	Index 	Fulltext
	vacationdaysallowed 	int(2) 		UNSIGNED 	Yes 	NULL 		Browse distinct values 	Change 	Drop 	Primary 	Unique 	Index 	Fulltext
	status 	int(1) 
-->	