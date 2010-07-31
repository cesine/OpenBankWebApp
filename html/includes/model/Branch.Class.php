<?php 
class Branch{
	private $branchName;
	private $openingHours;
	private $managerName;
	private $managerId;
	private $openingDate;
	private static $sqlTableName="branch";
	private static $sqlTableAttributes;


	public function getTableName() {
		return $this->sqlTableName;
	}
	public function getBranchName() {
		return $this->branchName;
	}
	public function getOpeningHours(){
		return $this->openingHours;
	}
	public function getManagerName(){
		return $this->managerName;
	}
	public function getManagerId(){
		return $this->managerId;
	}
	public function getOpeningDate(){
		return $this->openingDate;
	}
	public function setSqlTableName($sqlTNameIn) {
		$this->sqlTablesName=$sqlTNameIn;
	}
	public function setBranchName($branchNameIn) {
		$this->branchName=$branchNameIn;
	}
	public function setOpeningHours($openingHoursIn){
		$this->openingHours=$openingHoursIn;
	}
	public function setManagerName($managerNameIn){
		$this->managerName=$managerNameIn;
	}
	public function setManagerNameFromId(){
		echo "Setting Manager name from ID, getting id from object, then querying DB";
	}
	
	public function setManagerId($managerIdIn){
		$this->managerId=$managerIdIn;
	}
	public function setOpeningDate($openingDateIn){
		$this->openingDate=$openingDateIn;
	}
	
	function test(){
		echo 'Testing the branch functionalities.';
		$this->setBranchName("Mcgill Street");
		$this->setManagerId(2);
		$this->setManagerName(2);
		$this->setManagerNameFromId();
		$this->setOpeningDate("1992-01-01");
		$this->setOpeningHours("Monday-Friday<br> 8am to 3pm");
	}
	function displayBranch(){
		echo '<p class="name">'.$this->branchName.
		'<br/>'.$this->openingHours.
		'</p>';
	}
	function __construct(){
		echo 'Creating a branch. Change somethings';
		$this->branchName ="Metro Mcgill";
	}
	
}
?>