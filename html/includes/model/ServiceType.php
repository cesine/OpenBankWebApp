<?php

class Account{
	private $serviceTypeId;
	private $serviceId;
	private $serviceTypeName;
	
	public function getserviceTypeId() {
		return $this->serviceTypeId;
	}
	public function getserviceId() {
		return $this->serviceId;
	}
	public function getClientId(){
		return $this->clientId;
	}
	public function setserviceTypeId($serviceTypeId){
		$this->serviceTypeId=$serviceTypeId;
	}
	public function setclientId($clientId) {
		$this->clientId=$clientId;
	}
	public function setAccountTypeId($accountTypeId){
		$this->accountTypeId=$accountTypeId;
	}
}
?>