<?php
require_once('includes/controller/Database.Class.php');

class Employee{
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
	
	
	function displayEmployeeInRowFormatted()
	{
		
	echo '<TR class="bgcoloroption1">
	<TD class="tableDataLeftC">'.$this->employeeID.'</TD>
	<TD class="tableDataRightC">'.$this->firstName.'</TD>
	<TD class="tableDataRightC">'.$this->lastName.'</TD>	
	<TD class="tableDataRightC">'.$this->branchID.'</TD>	
	<TD class="tableDataRightC">'.$this->titleID.'</TD>		
	<TD class="tableDataLeftC">'.$this->salary.'</TD>
	<TD class="tableDataRightC">'.$this->addressID.'</TD>	
	<TD class="tableDataRightC">'.$this->timeOffID.'</TD>
	<TD class="tableDataRightC">'.$this->status.'</TD>	


	</TR>';		
	}

	public function initializeEmployee($row)
	{
		// in the line ($row[employeeid]), parameter name [] from db table
		$this->setEmployeeID($row[employeeid]);
		$this->setFirstName($row[firstname]);
		$this->setLastName($row[lastname]);	
		$this->setBranchID($row[branchid]);	
		$this->setTitleID($row[titleid]);				
		$this->setSalary($row[salary]);
		$this->setAddressID($row[addressid]);	
		$this->setTimeOffID($row[timeoffid]);
		$this->setStatus($row[status]);
	}	
	
	public function displayEmployeePersonalInfo()
	{
		echo '	<TD class="tableDataLeftC">'.$this->employeeID.'</TD>
				<TD class="tableDataRightC">'.$this->firstName.'</TD>
				<TD class="tableDataRightC">'.$this->lastName.'</TD>';		
	}	
	
	public function EmployeeList()
	{
?>
		<!-- Select employee to show -->
		<table border="1"> 
			<tr><td width="180">Select employee to show:</td><td width="180">
				<select name="choiceEmployee">
				
				<?php 
					
					//Build dynamic selection list
					$dbSelectEmployee = new Database();
					$dbSelectEmployee->connect();
					
					$querySelectEmployee="SELECT DISTINCT employeeid 
									   FROM employee";
												
					$dbSelectEmployee->query($querySelectEmployee);	
					$result = $dbSelectEmployee->query($querySelectEmployee);						
								   
					//Put results of query into dynamic list
					for($count=0;$count<$dbSelectEmployee->queryResultsCount;$count=$count+1)
					{
						$row=mysql_fetch_array($dbSelectEmployee->queryResultsResource);
						extract($row);
						echo "<option value='$employeeid'>$employeeid</option>";
					
					}//endl if to only print when there are any results
					echo "</select>\n";	
					$dbSelectEmployee->close();
								
				?>
				
				</select>
			</td></tr>
		</table>
		<!-- End select employee to show -->
<?php 		
	} // end public function EmployeeList()
}


?>

