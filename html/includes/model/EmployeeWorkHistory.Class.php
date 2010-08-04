<?php

class EmployeeWorkHistory{
	private $employeeID;
	private $branchID;	
	private $startDate;	
	private $lastDate;	
	private $titleID;					
	private $salary;

	public function getEmployeeID() 
	{
		return $this->employeeID;
	}

	public function getBranchID()
	{
		return $this->branchID;
	}	
	
	public function getStartDate()
	{
		return $this->startDate;
	}	
	
		public function getLastDate()
	{
		return $this->lastDate;
	}	
	
	public function getTitleID()
	{
		return $this->titleID;
	}		
	
	public function getSalary() 
	{
		return $this->salary;
	}

	public function setEmployeeID($employeeIDIn) 
	{
		$this->employeeID=$employeeIDIn;
	}
	
	public function setBranchID($branchIDIn) 
	{
		$this->branchID=$branchIDIn;
	}	
	
	public function setStartDate($startDateIn) 
	{
		$this->startDate=$startDateIn;
	}	

	public function setLastDate($lastDateIn) 
	{
		$this->lastDateIn=$lastDateIn;
	}	
	
	public function setTitleID($titleIDIn) 
	{
		$this->titleID=$titleIDIn;
	}	
	
	public function setSalary($salaryIn) 
	{
		$this->salary=$salaryIn;
	}	
	
	function displayEmployeeWorkHistoryInRowFormatted()
	{
		
		echo '
		<TR class="bgcoloroption1">
			<TD class="tableDataLeftC">'.$this->employeeID.'</TD>
			<TD class="tableDataRightC">'.$this->branchID.'</TD>		
			<TD class="tableDataRightC">'.$this->startDate.'</TD>
			<TD class="tableDataRightC">'.$this->lastDate.'</TD>	
			<TD class="tableDataRightC">'.$this->titleID.'</TD>		
			<TD class="tableDataRightC">'.$this->salary.'</TD>				
		</TR>';		
	}

	public function initializeEmployeeWorkHistory($row)
	{
		// in the line ($row[]), parameter name [] from db table
		$this->setEmployeeID($row[employeeid]);
		$this->setBranchID($row[branchid]);			
		$this->setStartDate($row[startdate]);
		$this->setLastDate($row[lastdate]);	
		$this->setTitleID($row[titleid]);				
		$this->setSalary($row[salary]);
	}	
	
	public function displayEmployeeWorkHistory2()
	{
		echo '	<TD class="tableDataLeftC">'.$this->employeeID.'</TD>
				<TD class="tableDataRightC">'.$this->branchID.'</TD>		
				<TD class="tableDataRightC">'.$this->startDate.'</TD>
				<TD class="tableDataRightC">'.$this->lastDate.'</TD>	
				<TD class="tableDataRightC">'.$this->titleID.'</TD>';		
	}	
	
	public function displayEmployeeWorkHistorySalary()
	{
		echo '<TD class="tableDataRightC">'.$this->salary.'</TD>';	
	}		
	
}
?>

