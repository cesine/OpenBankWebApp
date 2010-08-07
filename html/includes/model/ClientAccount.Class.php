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
	private $autoIncAccID;

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
	public function getAutoIncAccID() {
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
	public function setAutoIncAccID(){
		$clientAc = new Database();
		$clientAc->connect();
		$queryMax = "SELECT MAX(clientaccountid)
		             FROM `clientaccount`";
		
		$clientAc->query($queryMax);
		$clientAc->close();
		$this->autoIncAccID=$clientAc->queryFirstResult[MAX(clientaccountid)]+1;
	}
	public function test(){
		$this->setCurrentBalance(12.99);
		'<br/>\n'.$this->CurrentBalance.			
		'</p>\n\n';
	}
	public function DisplayAcountDetailsInRow(){
		echo "Anshu Garg";
		echo '<TR class="bgcoloroption1">
		<TD class="tableDataLeftC">'.$this->accountName.'</TD>
		<TD class="tableDataLeftC">'.$this->clientAccountId.'</TD>
		<TD class="tableDataRightC">'.$this->currentBalance.'</TD>
		<TD class="tableDataRightC">'.$this->availableBalance.'</TD>
		</TR>';
	}
	
	public function __construct(){
		//set all the member variables using 
	}
	
/*	public function initializeAccFrom($clientAccountId, $userBranch, $clientId, $userAccountChoice, $curentBal="0", $availBal, $status, CURDATE(), $dateNull){
		$this->setAutoIncAccID($clientAccountId);
		$this->setBranchId($userBranch);
		$this->setclientId($clientId);
		$this->setAccountTypeId($userAccountChoice);
		$this->setCurrentBalance($curentBal);
		$this->setAvailableBalance("0");
		$this->setStatus("1");
		$this->setOpeningDate($date);
		$this->setClosingDate('NULL');
		
	} */
	
	public function InsertAccountIntoDatabase(){
		//open a database, connect, insert the objects values, and insert into whatever extra other tables are needed
		$newClientAccount = new Database();
		$newClientAccount->connect();
		$newDataRow = getAutoIncAccID().",".getBranchId().",".getClientId().",".getAccountTypeId().",".
				getCurrentBalance().",".getAvailableBalance().",".getStatus().",".getOpeningDate().
				",".getClosingDate();
		$queryAddAccount = "INSERT INTO clientaccount VALUES ($newDataRow)";
		$newClientAccount->query($queryAddAccount);
		$newClientAccount->close();
		
	if ($newClientAccount->queryResultsResource)
    {
        echo  "<br/>", "You're account has been created!" , "<br/>";
        echo 'Pl. follow the link to make a ';
        ?>
<a href = "index.php?&content=Transfer">transaction</a>

       <?php
       echo ' in your new account. <br/>';
    }
else
    {
        //echo 'Sorry, there was a problem inserting values! ';
        ?>
<a href = "index.php?&content=OpenNewAccount">Please try again</a>
       <?php
    }
	}
	public function initializeClientAccount($row)
	{
		$this->setClientAccountId($row[clientAccountId]);
		$this->setBranchId($row[branchId]);//note: the name takes the managerid as a parameter,as long as you have the managerid it will work
		$this->setclientId($row[clientId]);
		$this->setAccountTypeId($row[accountTypeId]);
		$this->setAccountName($row[accountName]);
		$this->setCurrentBalance($row[currentBalance]);//note: the name takes the managerid as a parameter,as long as you have the managerid it will work
		$this->setAvailableBalance($row[availableBalance]);
		$this->setStatus($row[$status]);
		$this->setOpeningDate($row[openingdate]);
		$this->setClosingDate($row[$closingDate]);
	}
	
}	
?>