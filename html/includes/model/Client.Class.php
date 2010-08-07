<?php 
class Client{
	private $clientID;
	private $firstName;
	private $lastName;
	private $socialInsuranceNumber;
	private $dateOfBirth;
	private $startDate;
	private $status;
	private $addressID;
	private $branchID;	//maybe we need
	private $clientAccountID;	//maybe we need
	private static $sqlTableName="client";
	private static $sqlTableAttributes;
	
	//getters
	public function getTableName() {
		return $this->sqlTableName;
	}
	public function getClientID() {
		return $this->clientID;
	}
	public function getFirstName() {
		return $this->firstName;
	}
	public function getLastName() {
		return $this->lastName;
	}
	public function getSocialInsuranceNumber() {
		return $this->socialInsuranceNumber;
	}
	public function getDateOfBirth() {
		return $this->dateOfBirth;
	}
	public function getStartDate() {
		return $this->startDate;
	}
	public function getStatus() {
		return $this->status;
	}
	public function getAddressID() {
		return $this->addressID;
	}
	public function getBranchID() {
		return $this->branchID;
	}
	public function getClientAccountID() {
		return $this->clientAccountID;
	}
	
	//setters
	public function setSqlTableName($sqlTName) {
		$this->sqlTablesName=$sqlTName;
	}
	public function setClientID($clientID) {
		$this->clientID=$clientID;
	}
	public function setFirstName($firstName) {
		$this->firstName=$firstName;
	}
	public function setLastName($lastName) {
		$this->lastName=$lastName;
	}
	public function setSocialInsuranceNumber($socialInsuranceNumber) {
		$this->socialInsuranceNumber=$socialInsuranceNumber;
	}
	public function setDateOfBirth($dateOfBirth) {
		$this->dateOfBirth=$dateOfBirth;
	}
	public function setStartDate($startDate) {
		$this->startDate=$startDate;
	}
	public function setStatus($status) {
		$this->status=$status;
	}
	public function setAddressID($addressID) {
		$this->addressID=$addressID;
	}
	public function setBranchID($branchID) {
		$this->branchID=$branchID;
	}
	public function setClientAccountID($clientAccountID) {
		$this->clientAccountID=$clientAccountID;
	}
	
	public function test(){
		echo 'Testing the client functionalities.';
		$this->setClientID(12300045);
		$this->setFirstName("John");
		$this->setLastName("Blake");
		$this->setSocialInsuranceNumber("875 345 281");
		$this->setDateOfBirth("1954-05-21");
		$this->setStartDate("2010-03-15");
		$this->setStatus(1);
		$this->setAddressID(10000049);
		$this->setBranchID(1001);
		$this->setClientAccountID(95432453);
	}
	public function displayClientDetails(){
		echo '<p class="name">'.$this->clientID.
		'<br/>'.$this->firstName.
		'<br/>'.$this->lastName.
		'</p>';
	}
	public function __construct($clientid){
		//echo 'Adding a client, changing firstName';
		$this->firstName="Jack";
	}
	public function addClient(){
		$this->setFirstName($_POST["firstName"]);
		//add all variables
	}
}

?>