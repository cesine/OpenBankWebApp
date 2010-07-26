<?php 
class Branch{
	private $branchName;
	private $openingHours;
	private $managerName;
	private $managerId;
	private $openingDate;

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
	public function openingDate(){
		return $this->openingDate;
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
	public function setManagerId($managerId){
		return $this->managerId;
	}
	public function openingDate($openingDate){
		return $this->openingDate;
	}
	
	
	function displayBranch(){
		echo 'Displaying the branch.';
	}
	function __construct(){
		echo 'Creating a branch. Change somethings';
		$this->branchName ="Metro Mcgill";
	}
}
?>