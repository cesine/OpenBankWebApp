<?php

class Account{
	private $employeeID;
	private $salary;
	private $firstName;	
	private $lastName;		
	private $timeOffID;
	private $status;
	private $addressID;
	private $branchID;	
	private $titleID;	

	public function getEmployeeID() 
	{
		return $this->employeeID;
	}
	
	public function getSalary() 
	{
		return $this->salary;
	}

	public function getFirstName()
	{
		return $this->firstName;
	}
	
	public function getLastName()
	{
		return $this->lastName;
	}

	public function getTimeOffID()
	{
		return $this->timeOffID;
	}	

	public function getStatus()
	{
		return $this->status;
	}	
	
	public function getAddressID()
	{
		return $this->addressID;
	}	
	
	public function getBranchID()
	{
		return $this->branchID;
	}		
	
	public function getTitleID()
	{
		return $this->titleID;
	}	
	
	
	public function setEmployeeID($employeeID) 
	{
		$this->employeeID=$employeeID;
	}
	
	public function setSalary($salary) 
	{
		$this->salary=$salary;
	}	
	
	public function setFirstName($firstName) 
	{
		$this->firstName=$firstName;
	}	

	public function setLastName($lastName) 
	{
		$this->lastName=$lastName;
	}

	public function setTimeOffID($timeOffID) 
	{
		$this->timeOffID=$timeOffID;
	}

	public function setStatus($status) 
	{
		$this->status=$status;
	}

	public function setAddressID($addressID) 
	{
		$this->addressID=$addressID;
	}	
	
	public function setBranchID($branchID) 
	{
		$this->branchID=$branchID;
	}

	public function setTitleID($titleID) 
	{
		$this->titleID=$titleID;
	}	
	
	
}
?>

