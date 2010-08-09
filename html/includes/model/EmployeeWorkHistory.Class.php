<?php
require_once('includes/model/EmployeeTitle.Class.php');

class EmployeeWorkHistory{
	private $employeeID;
	private $branchID;	
	private $startDate;	
	private $lastDate;	
	private $titleID;
	private $titlename;						
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

	public function gettitlename()
	{
		return $this->titlename;
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
		$this->lastDate=$lastDateIn;
	}	
	
	public function setTitleID($titleIDIn) 
	{
		$this->titleID=$titleIDIn;
	}	
	
	public function settitlename($titlenameIn) 
	{
		$this->titlename=$titlenameIn;
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
	
	// title name added
	function displayEmployeeWorkHistoryInRowFormattedNew()
	{
		
		echo '
		<TR class="bgcoloroption1">
			<TD class="tableDataLeftC">'.$this->employeeID.'</TD>
			<TD class="tableDataRightC">'.$this->branchID.'</TD>		
			<TD class="tableDataRightC">'.$this->startDate.'</TD>
			<TD class="tableDataRightC">'.$this->lastDate.'</TD>	
			<TD class="tableDataRightC">'.$this->titleID.'</TD>		
			<TD class="tableDataRightC">'.$this->titlename.'</TD>				
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

	// title name added
	public function initializeEmployeeWorkHistoryNew($row)
	{
		// in the line ($row[]), parameter name [] from db table
		$this->setEmployeeID($row[employeeid]);
		$this->setBranchID($row[branchid]);			
		$this->setStartDate($row[startdate]);
		$this->setLastDate($row[lastdate]);	
		$this->setTitleID($row[titleid]);	
		$this->settitlename($row[titlename]);						
		$this->setSalary($row[salary]);
	}		
	
	// show work history till today
	public function employeeHistory($selectedEmployee)
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
			
			// Display current info of employee from table "employeeworkhistory" 
			$dbEmployeeWorkHistory = new Database();
			$dbEmployeeWorkHistory->connect();
			
			// note: in query we use data, selected by user
			$queryEmployeeWorkHistory=
			"SELECT e.employeeid, e.branchid, e.startdate, e.lastdate, e.titleid, t.titlename, e.salary  
			 FROM   employeeworkhistory e, employeetitle t	
			 WHERE  e.employeeid=$selectedEmployee AND t.titleid=e.titleid";
										
			$dbEmployeeWorkHistory->query($queryEmployeeWorkHistory);
			
			//Put results of query 1 into table on the screen
			for($count=0;$count<$dbEmployeeWorkHistory->queryResultsCount;$count=$count+1)
			{
				$row=mysql_fetch_array($dbEmployeeWorkHistory->queryResultsResource);	
				$this->initializeEmployeeWorkHistoryNew($row);
				$this->displayEmployeeWorkHistoryInRowFormattedNew();
			}
			$dbEmployeeWorkHistory->close();
		?>
		</table>
		<P></P>		

<?php 
	} // end public function employeeHistory($selectedEmployee)
	
	
	// show last line from working history
	public function employeeHistoryCurrent($selectedEmployee)
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
				$this->initializeEmployeeWorkHistoryNew($row);
				$this->displayEmployeeWorkHistoryInRowFormattedNew();
			}
			$dbEmployeeWorkHistory->close();
		?>
		</table>
		<P></P>		

<?php 
	} // end public function employeeHistoryCurrent($selectedEmployee)	
	
	
	
}
?>

	
	
	
	
	
	
	
	



