<?php 
require_once 'includes/model/ClientAccount.Class.php';
class Client{
	private $clientID;
	private $firstName;
	private $lastName;
	private $socialInsuranceNumber;
	private $dateOfBirth;
	private $startDate;
	private $status;
	private $statusString;
	private $address;
	private $addressId;
	public $clientAccountsArray;	

	public $clientBusinessBankingAccountsArray;
	
	public $clientPersonalBankingAccountsArray;
	public $clientPersonalInvestingAccountsArray;	
	public $clientPersonalBorrowingAccountsArray;	
	public $clientPersonalInsuranceAccountsArray;	
	
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
	public function getStatusString() {
		return $this->statusString;
	}
	public function getAddress() {
		return $this->address;
	}
	public function getAddressId() {
		return $this->addressId;
	}
	public function getBranchID() {
		return $this->branchID;
	}
	public function getClientAccountsArray() {
		return $this->clientAccountsArray;
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
	public function setStatusString($status) {
		if ($status==0){
			$this->statusString="Former Customer";
		}else{
			$this->statusString="Current Customer";
		}
	}
	public function setAddress($addressid) {
		$this->address = new Address();
		$this->address->initializeAddress($addressid);
	}
	public function setAddressId($addressid){
		$this->addresId=$addressid;
		$this->setAddress($addresid);
	}
	public function setAddressObject($addressobject){
		$this->address=$addressobject;
	}
	public function setBranchID($branchID) {
		$this->branchID=$branchID;
	}
	public function setClientAccountsArray($clientid) {
		$db = new Database();
		$db->connect();
		
		$queryToDo="SELECT DISTINCT * FROM clientaccount 
				WHERE clientid=".$clientid;
		$db->query($queryToDo);
		$db->close();
		
		//$queryToDo= "SELECT DISTINCT clientaccountid FROM clientaccount WHERE clientid=".$clientid;
		
		for($count=0;$count<$db->queryResultsCount;$count=$count+1)
		{
			$row=mysql_fetch_array($db->queryResultsResource);
			$account = new ClientAccount();
			$account->initializeClientAccount($row);
			$this->clientAccountsArray[$count]=$account;
			
			if ( $account->serviceCategoryId == 1)
			{
				$this->clientPersonalBankingAccountsArray[count($clientPersonalBankingAccountsArray)] = $account;
			}
			else
			{
				$this->clientBusinessBankingAccountsArray[count($clientBusinessBankingAccountsArray)] = $account;
			}
		}
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
		$this->setBranchID(10001);
		$this->setClientAccountID(95432453);
	}
	
	public function displayClientDetails(){
		$this->setStatusString($this->status);
		echo '<table border=0 ><tr valign="top"><td ><p>Client Card Number </td><td>'.$this->clientID.
		'</td></tr><tr valign=top><td>Accounts:</td><td>';
		$this->displaySelectClientAccount();
		echo '</td></tr><tr><td>Name:</td><td>'.$this->firstName.' '.$this->lastName.
		'</td></tr><tr><td>SSN:</td><td> '.$this->socialInsuranceNumber.
		'</td></tr><tr><td>Date of Birth:</td><td>'.$this->dateOfBirth.
		'</td></tr><tr><td>Customer since:</td><td>'.$this->startDate.
		'</td></tr><tr><td>Status:</td><td>'.$this->statusString.
		'</td></tr><tr valign=top><td>Address</td><td>';
		$this->address->displayAddress();
		echo'</td></tr></table>';
	}
	public function __construct(){
		$this->address = new Address();
		$this->addressId= $this->address->getAddressID();
		$this->clientAccountsArray = array();
		$this->setClientID(54010023);
		$this->setFirstName("John");
		$this->setLastName("Smith");
		$this->setSocialInsuranceNumber("875 345 280");
		$this->setDateOfBirth("1954-05-21");
		$this->setStartDate("2010-03-15");
		$this->setStatus(1);
		$this->setAddressID(10000315);
		$this->setBranchID(10001);
		$this->clientAccountsArray[0]=0;
	}
	public function initializeClient($clientid){
		$db = new Database();
		$db->connect();
		$queryToDo= "SELECT DISTINCT * FROM client WHERE clientid=".$clientid;
		$db->query($queryToDo);
		$db->close();
		$this->initializeClientFromRow($db->queryFirstResult);
		$this->setClientAccountsArray($this->clientID);
	}
	public function initializeClientFromRow($row){
		$this->setFirstName($row[firstname]);
		$this->setLastName($row[lastname]);
		$this->setClientID($row[clientid]);
		$this->setSocialInsuranceNumber($row[ssn]);
		$this->setDateOfBirth($row[dateofbirth]);
		$this->setStartDate($row[startdate]);
		$this->setStatus($row[status]);
		
		$this->setStatusString($row[status]);
		$this->setAddressId($row[addressid]);
		$this->setClientAccountsArray($row[clientid]);
	}
	public function saveToDatabase(){
		$newAddresId=$this->address->saveToDatabase();
		if($newAddresId != 0){
			$this->setAddressId($newAddresId);
		}
		$dbInsertClient = new Database();
		$dbInsertClient->connect();
		$insertClientQuery="
			INSERT INTO `client` (`clientid`, 
			`ssn`, `firstname`, `lastname`, `addressid`, 
			`dateofbirth`, `startdate`, `status`) 
			VALUES (NULL, 
			'$this->socialInsuranceNumber', '$this->firstName', '$this->lastName', '$this->addressId', 
			'$this->dateOfBirth', '$this->startDate', '$this->status')";
		//echo $insertClientQuery;
		$newClientid=$dbInsertClient->insert($insertClientQuery);
		$dbInsertClient->close();
		return $newClientid;
	}
	public function addClient(){
		$this->setFirstName($_POST["firstName"]);
		$this->setLastName($_POST["lastName"]);
		$this->setSocialInsuranceNumber($_POST["socialInsuranceNumber"]);
		$this->setDateOfBirth($_POST["dateOfBirth"]);
		$this->setStartDate($_POST["startDate"]);
		$this->setStatus($_POST["status"]);
		$this->setAddressID($_POST["addressID"]);
		$this->setBranchID($_POST["branchID"]);
		$this->setClientAccountID($_POST["clientAccountID"]);
				
	}
	public function displaySelectClientAccount(){
		$selectAccount='$selectAccount';
		$this->displaySelectAccountWithChooseSelect($selectAccount);
	}
	public function displaySelectAccountWithChooseSelect($selectvariablename){
		setlocale(LC_MONETARY, 'en_US');
		$this->setClientAccountsArray($this->clientID);
		echo "<select name='";
		echo $selectvariablename;
		echo "'>";
		foreach ($this->clientAccountsArray as $accountNumber){
			$account= new ClientAccount();
			$account->initializeAccountFromID($accountNumber);
			//Dont display account if it matches insurance
			if ( !(preg_match('/.*Insurance.*/',$account->getAccountTypeName())) && $account->getStatus()!=0 ){
				echo "<option value='$accountNumber'>".$account->getAccountTypeName()." ".$account->getClientAccountId();
				echo money_format('%(#5n', $account->getCurrentBalance());
				echo "</option>";
			}
		}
		echo"</select>";
	}
}
?>