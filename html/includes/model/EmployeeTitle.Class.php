<?php

class EmployeeTitle{
	private $titleID;
	private $titleName;
	private $baseSalary;	

	public function getTitleID() 
	{
		return $this->titleID;
	}
	
	public function getTitleName() 
	{
		return $this->titleName;
	}

	public function getBaseSalary()
	{
		return $this->baseSalary;
	}
	
	
	public function setTitleID($titleIDIn) 
	{
		$this->titleID=$titleIDIn;
	}
	
	public function setTitleName($titleNameIn) 
	{
		$this->titleName=$titleNameIn;
	}	
	
	public function setBaseSalary($baseSalaryIn) 
	{
		$this->baseSalary=$baseSalaryIn;
	}	

	
	function displayEmployeeTitleInRowFormatted()
	{
		
		echo '
		<TR class="bgcoloroption1">
			<TD class="tableDataLeftC">'.$this->titleID.'</TD>
			<TD class="tableDataRightC">'.$this->titleName.'</TD>
			<TD class="tableDataRightC">'.$this->baseSalary.'</TD>	
		</TR>';		
	}

	public function initializeEmployeeTitle($row)
	{
		// in the line ($row[]), parameter name [] from db table
		$this->setTitleID($row[titleid]);
		$this->setTitleName($row[titlename]);
		$this->setBaseSalary($row[basesalary]);	
	}	
	
	public function displayEmployeeTitleName()
	{
		echo '<TD class="tableDataRightC">'.$this->titleName.'</TD>';		
	}	
}
?>

