<?php 
echo "testing";
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
	public function setSqlTableName($sqlTName) {
		return $this->sqlTablesName;
	}
	public function setBranchName($branchName) {
		return $this->branchName;
	}
	public function setOpeningHours($openingHours){
		return $this->openingHours;
	}
	public function setManagerName($managerName){
		return $this->managerName;
	}
	public function setManagerNameFromId(){
		echo "Setting Manager name from ID, getting id from object, then querying DB";
	}
	
	public function setManagerId($managerId){
		return $this->managerId;
	}
	public function setOpeningDate($openingDate){
		return $this->openingDate;
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
		'<br/>\n'.$this->openingHours.
		'</p>\n\n';
	}
	function __construct(){
		echo 'Creating a branch. Change somethings';
		$this->branchName ="Metro Mcgill";
	}
	
}
?>