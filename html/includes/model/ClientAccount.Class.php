class Account{
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
		return $this->branchId;
	}
	public function setclientId($clientId) {
		return $this->clientId;
	}
	public function setAccountTypeId($accountTypeId){
		return $this->accountTypeId;
	}
	public function setCurrentBalance($currentBalance) {
		return $this->currentBalance;
	}	
	public function setAvailableBalance($availableBalance){
		return $this->availableBalance;
	}	
	public function setStatus($status) {
		return $this->status;
	}	
	public function setOpeningDate($openingDate){
		return $this->openingDate;
	}
	public function setClosingDate($closingDate){
		return $this->closingDate;
	}