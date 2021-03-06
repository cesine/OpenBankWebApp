<?php
class ClientAccount
{
	private $clientAccountId;
	private $branchId;
	private $clientId;
	public  $currentBalance;
	public $availableBalance;
	private $status;
	private $openingDate;
	private $closingDate;
	
	private $autoIncAccID;
	
	private $accountTypeId;
	public  $accountTypeName;
	private $accountName;
	
	public $serviceCategoryId;
	public $serviceTypeId;
	public $serviceId;

	
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
	public function getAccountTypeName(){
		return $this->accountTypeName;
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
	public function getAutoIncAccID() {
		$this->setAutoIncAccID();
		return $this->autoIncAccID;
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
	/*
	 * Depreciated, can use the mysql_insert_id to find out the value of the autoincrement
	 */
	public function setAutoIncAccID(){
		$clientAc = new Database();
		$clientAc->connect();
		$queryMax = "SELECT MAX(clientaccountid)clientaccountid
		             FROM `clientaccount`";

		$clientAc->query($queryMax);
		$clientAc->close();
		$newAccNum=$clientAc->queryFirstResult[clientaccountid];
		$this->autoIncAccID = $newAccNum+1;
	}
	public function test(){
		$this->setCurrentBalance(12.99);
		'<br/>\n'.$this->CurrentBalance.			
		'</p>\n\n';
	}
	public function chargeMonthlyFees(){
		//go in the database
		/*
		 * for each account type
		 * 	get monthly fee 
		 * SELECT a.accounttypeid, monthlyfee 
		 * FROM accounttype a, bankingplans b
		 * WHERE a.accounttypeid=b.accounttypeid
		 * 
		 * 	for each account of that type
		 * 		charge fee
		 */
		$dbChargeMonthlyFees= new Database();
		$dbChargeMonthlyFees->connect();
		$getAccountsAndFees="SELECT a.accounttypeid, monthlyfee 
					FROM accounttype a, bankingplans b
		 			WHERE a.accounttypeid=b.accounttypeid";
		$dbChargeMonthlyFees->query($getAccountsAndFees);
		for($count=0;$count<$dbChargeMonthlyFees->queryResultsCount;$count++){
			$row=mysql_fetch_array($dbChargeMonthlyFees->queryResultsResource);
			echo "Charging ".$row[accounttypeid]."<br/>";
		}
	}

	public function __construct(){
		$this->clientAccountId="NULL";
		$this->branchId=10004;
		$this->clientId=54010026;
		$this->accountTypeId=2;
		$this->availableBalance="0.00";
		$this->currentBalance="0.00";
		$this->openingDate=date('Y-m-d');
		$this->closingDate="NULL";
		$this->status=1;
	}
	public function initializeAccountFromID($accountid){
		$db = new Database();
		$db->connect();
		$queryGetAccountInfo="SELECT DISTINCT * FROM clientaccount 
				WHERE clientaccountid=".$accountid;
		$db->query($queryGetAccountInfo);
		$db->close();
		$this->initializeClientAccount($db->queryFirstResult);
	}
	public function initializeAccFrom($clientAccountId, $userBranch, $clientId, $userAccountChoice, $curDate, $curentBal="0", $availBal="0", $status="1", $endDate='Null'){
		$this->setAutoIncAccID($clientAccountId);
		$this->setBranchId($userBranch);
		$this->setclientId($clientId);
		$this->setAccountTypeId($userAccountChoice);
		$this->setOpeningDate($date);
		$this->setCurrentBalance($curentBal);
		$this->setAvailableBalance($availBal);
		$this->setStatus($status);
		$this->setClosingDate($endDate);
	}
	public function saveToDatabase(){
		$newClientAccount = new Database();
		$newClientAccount->connect();
		$queryAddAccount = "INSERT INTO clientaccount 
						(clientaccountid, branchid, clientid, accounttypeid, currentbalance,
						 	availablebalance, status, openingdate, closingdate) VALUES ('NULL','$this->branchId',
			'$this->clientId','$this->accountTypeId','$this->currentBalance',
			'$this->availableBalance','$this->status',
			'$this->openingDate','$this->closingDate')";
		$queryAddAccount;
		$newAccountId=$newClientAccount->insert($queryAddAccount);
		$newClientAccount->close();
//		if($newAccountId != 0){
//			$this->clientAccountId=$newAccountId;
//		}

		return $newAccountId;
	}
	public function DisplayAcountDetailsInRow(){
		//echo "<table>";//added a table around the row to make sure the rest of the page displays
		$this->displayAccountInRow();
		//echo "</table>";
	}
	/*
	 * This function is depreciated by new, more default function saveToDatabase
	 */
	public function InsertAccountIntoDatabase(){
		//open a database, connect, insert the objects values, and insert into whatever extra other tables are needed
		$newClientAccount = new Database();
		$newClientAccount->connect();
		$newDataRow = "NULL".",".$this->getBranchId().",".$this->getClientId().",".$this->getAccountTypeId().",".
		$this->getCurrentBalance().",".$this->getAvailableBalance().",".$this->getStatus($status).",".$this->getOpeningDate().
				",".$this->getClosingDate($endDate);
		$queryAddAccount = "INSERT INTO clientaccount VALUES ($newDataRow)";
		$newAccountId=$newClientAccount->insert($queryAddAccount);
		$newClientAccount->close();
        return $newAccountId;
	}

	public function initializeClientAccount($row)
	{
		//print_r($row);
		$this->setClientAccountId($row[clientaccountid]);
		$this->setBranchId($row[branchid]);//note: the name takes the managerid as a parameter,as long as you have the managerid it will work
		$this->setclientId($row[clientid]);
		$this->setAccountTypeId($row[accounttypeid]);
		$this->setCurrentBalance($row[currentbalance]);//note: the name takes the managerid as a parameter,as long as you have the managerid it will work
		$this->setAvailableBalance($row[availablebalance]);
		$this->setStatus($row[status]);
		$this->setOpeningDate($row[openingdate]);
		$this->setClosingDate($row[closingdate]);
		$this->setAccountTypeName($row[accounttypeid]);
	}
	public function setAccountTypeName($accountTypeId){
		$db = new Database();
		$db->connect();
		$queryToDo= "SELECT DISTINCT servicecategoryid, servicetypeid, accountname FROM accounttype	
			WHERE accounttypeid=$accountTypeId";
		$db->query($queryToDo);
		$db->close();
		
		$this->accountTypeName=$db->queryFirstResult[accountname];
		$this->serviceCategoryId=$db->queryFirstResult[servicecategoryid];
		$this->serviceTypeId=$db->queryFirstResult[servicetypeid];
	}
	public function displayAccountInRow(){
		echo "<tr class='bgcoloroption1'>
		<td class='tableDataRightC'>$this->serviceTypeId</td>
		<td class='tableDataRightC'>$this->serviceCategoryId</td>
		<td class='tableDataRightC'>$this->accountTypeName</td>
		<td class='tableDataRightC'>$this->clientAccountId</td>
		<td class='tableDataRightC'>$this->currentBalance</td>
		<td class='tableDataRightC'>$this->availableBalance</td>
		</tr>";
	}
}
?>