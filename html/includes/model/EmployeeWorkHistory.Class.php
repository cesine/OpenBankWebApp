<?php

require_once('includes/controller/Database.Class.php');
require_once('includes/model/EmployeeTitle.Class.php');

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

	public function EmployeeWorkHistoryCurrent($selectedEmployee)
	{
?>
		<!-- Show current info -->
		<table width="100%" border="1" cellpadding="3" cellspacing="1">
		<tr>
			<td>
			Employee ID
			</td>
			<td>
			Branch ID
			</td>
			<td>
			Start date
			</td>
			<td>
			Last date
			</td>
			<td>
			Title ID
			</td>
			<td>
			Title name
			</td>					
			<td>
			Salary
			</td>	
		</tr>
		
		<?php
		
			$employeeTitle = new EmployeeTitle();
			$employeeWorkHistory = new EmployeeWorkHistory();			
			
			// Display current info of employee from table "employeeworkhistory" 
			$dbEmployeeWorkHistory = new Database();
			$dbEmployeeWorkHistory->connect();
			
			// note: in query we use data, selected by user
			$queryEmployeeWorkHistory=
			"SELECT e.employeeid, e.branchid, e.startdate, e.lastdate, e.titleid, t.titlename, e.salary  
			 FROM   employeeworkhistory e, employeetitle t	
			 WHERE  e.employeeid=$selectedEmployee AND e.lastdate='0000-00-00' AND t.titleid=e.titleid";
										
			$dbEmployeeWorkHistory->query($queryEmployeeWorkHistory);
			
			//Put results of query 1 into table on the screen
			for($count=0;$count<$dbEmployeeWorkHistory->queryResultsCount;$count=$count+1)
			{
				$row=mysql_fetch_array($dbEmployeeWorkHistory->queryResultsResource);	
				$employeeWorkHistory->initializeEmployeeWorkHistory($row);
				$employeeWorkHistory->displayEmployeeWorkHistory2();
				$employeeTitle->initializeEmployeeTitle($row);
				$employeeTitle->displayEmployeeTitleName();	
				$employeeWorkHistory->displayEmployeeWorkHistorySalary();								
			}
			// save current values
			$branchIdCurrent=$row[branchid];	
			$startDateCurrent=$row[startdate];	
			$lastDateCurrent=$row[lastdate];
			$titleIDCurrent=$row[titleid];	
			$titleNameCurrent=$row[titlename];			
			$salaryCurrent=$row[salary];											
		
			$dbEmployeeWorkHistory->close();
		?>
		</table>
		<P></P>		

<?php 
	} // end public function EmployeeWorkHistoryCurrent()		
	
	
}
?>

