<?php
require_once('includes/model/Address.Class.php');
require_once('includes/model/PostalCodes.Class.php');
class Employee{
	private $employeeID;
	private $salary;
	private $firstName;
	private $lastName;
	private $timeOffID;
	private $status;
	private $address;
	private $addressId;
	private $branchID;
	private $titleID;
	private $titleName;

	public function canEditHR(){
		return ($this->titleName=="Branch Manager");
	}
	public function getEmployeeID(){
		return $this->employeeID;
	}
	public function getSalary(){
		return $this->salary;
	}
	public function getFirstName(){
		return $this->firstName;
	}
	public function getLastName(){
		return $this->lastName;
	}
	public function getTimeOffID(){
		return $this->timeOffID;
	}
	public function getStatus(){
		return $this->status;
	}
	public function getAddress(){
		return $this->address;
	}
	public function getAddressId(){
		return $this->addressId;
	}
	public function getBranchID(){
		return $this->branchID;
	}
	public function getTitleID(){
		return $this->titleID;
	}


	public function setEmployeeID($employeeID){
		$this->employeeID=$employeeID;
	}
	public function setSalary($salary){
		$this->salary=$salary;
	}
	public function setFirstName($firstName){
		$this->firstName=$firstName;
	}
	public function setLastName($lastName){
		$this->lastName=$lastName;
	}
	public function setTimeOffID($timeOffID){
		$this->timeOffID=$timeOffID;
	}
	public function setStatus($status){
		$this->status=$status;
	}
	public function setBranchID($branchID){
		$this->branchID=$branchID;
	}
	public function setTitleID($titleID){
		$this->titleID=$titleID;
	}
	public function setTitleName($titleID){
		//go in database and get title name, using the titleid foreign key
		$dbCheckBranchManager = new Database();
		$dbCheckBranchManager->connect();
			
		$queryCheckBranchManager="SELECT titlename
							   FROM employeetitle
							   WHERE titleid=$titleID";

		$dbCheckBranchManager->query($queryCheckBranchManager);
		$dbCheckBranchManager->close();

		$this->titleName=$dbCheckBranchManager->queryFirstResult[titlename];
	}
	public function setAddress($addressid) {
		$this->address->initializeAddress($addressid);
	}
	public function setAddressId($addressid) {
		//set the local addressid to the new id, and then get the rest of the details from the db
		$this->addressId=$addressid;
		$this->setAddress($this->addressId);
	}
	

	public function setAddressFromObject($addressIn){
		$this->address=$addressIn;
	}	
	
	
	public function __construct(){
		$this->address = new Address();
		$this->addressId=$this->address->getAddressID();
		//setting the new employee to default values, basically for a teller
		$this->titleID ="30";
		$this->salary ="30000";
		$this->branchID ="10004";
		$this->timeOffID ="10001";
		$this->firstName ="NoFirstName";
		$this->lastName="NoLastName";
		$this->status="1";
		$this->setTitleName($this->titleID);
	}	
	public function initializeEmployee($employeeid){
		//build an employee object using just the employee id
		$dbConstructEmployee= new Database();
		$dbConstructEmployee->connect();
		$queryGetEmployee="SELECT *
							   FROM employee e
							   WHERE e.employeeid=$employeeid";
		$dbConstructEmployee->query($queryGetEmployee);
		$dbConstructEmployee->close();
		$this->initializeEmployeeFromRow($dbConstructEmployee->queryFirstResult);
	}
	
	public function changeStatus($selectedEmployee)
	{
		//make employee not active
		$dbChangeStatus = new Database();
		$dbChangeStatus->connect();
				
		// note: in query we use data, selected by user
		$queryChangeStatus=
				
		"UPDATE employee
   		 SET    status=0
		 WHERE  employeeid=$selectedEmployee";				

		$dbChangeStatus->updateInsert($queryChangeStatus);
		$dbChangeStatus->close();	

		
		// put "last date" for old title
			
		$dbEmployeeTitleOld = new Database();
		$dbEmployeeTitleOld->connect();
				
		// note: in query we use data, selected by user
		$queryEmployeeTitleOld=
				
		"UPDATE employeeworkhistory 
   		 SET    lastdate = CURDATE()
		 WHERE  employeeid=$selectedEmployee AND lastdate='0000-00-00'";				

		$dbEmployeeTitleOld->updateInsert($queryEmployeeTitleOld);
		$dbEmployeeTitleOld->close();
			
		// end put "last date" for old title		
	}	
	
	public function initializeEmployeeFromRow($row)
	{
		// in the line ($row[employeeid]), parameter name [] from db table
		$this->setEmployeeID($row[employeeid]);
		$this->setFirstName($row[firstname]);
		$this->setLastName($row[lastname]);
		$this->setBranchID($row[branchid]);
		$this->setTitleID($row[titleid]);
		$this->setTitleName($row[titleid]);
		$this->setSalary($row[salary]);
		$this->setAddress($row[addressid]);
		$this->setTimeOffID($row[timeoffid]);
		$this->setStatus($row[status]);
	}
	
	public function initializeEmployeeSalary($row)
	{
		$this->setSalary($row[salary]);
	}
	
	public function initializeEmployeeFirstName($row)
	{
		$this->setFirstName($row[firstname]);
	}
	
	public function saveToDatabase(){
		//insert the address in the db if it is not already there, if it is already there then the 
		//existing id will be used
		$newAddresId=$this->address->saveToDatabase() ;
		if($newAddresId != 0){
			$this->setAddressId($newAddresId);
		}
		$dbToInsertEmployee = new Database();
		$dbToInsertEmployee->connect();
		$employeeInsertQuery="
			INSERT INTO employee (`employeeid`, `addressid`, `branchid`, 
			`titleid`, `salary`, `firstname`, `lastname`, 
			`timeoffid`, `status`) VALUES 
			(NULL, '".$this->addressId."','$this->branchID',
			'$this->titleID','$this->salary','$this->firstName','$this->lastName',
			'$this->timeOffID','$this->status')";
		//echo $employeeInsertQuery;
		$newIdInserted=$dbToInsertEmployee->insert($employeeInsertQuery);
		$dbToInsertEmployee->close();
		
		return $newIdInserted;
	}
	function displayEmployeeInRowFormatted()
	{
		echo '<TR class="bgcoloroption1">
	<TD class="tableDataLeftC">'.$this->employeeID.'</TD>
	<TD class="tableDataRightC">'.$this->firstName.'</TD>
	<TD class="tableDataRightC">'.$this->lastName.'</TD>	
	<TD class="tableDataRightC">'.$this->branchID.'</TD>	
	<TD class="tableDataRightC">'.$this->titleID.'</TD>	
	<TD class="tableDataRightC">'.$this->titleName.'</TD>		
	<TD class="tableDataLeftC">'.$this->salary.'</TD>
	<TD class="tableDataRightC">'.$this->addressID.'</TD>	
	<TD class="tableDataRightC">'.$this->timeOffID.'</TD>
	<TD class="tableDataRightC">'.$this->status.'</TD>	


	</TR>';		
	}

	
	public function initializeEmployeeIDFirstLastName($row)
	{
		// in the line ($row[employeeid]), parameter name [] from db table
		$this->setEmployeeID($row[employeeid]);
		$this->setFirstName($row[firstname]);
		$this->setLastName($row[lastname]);
		$this->setBranchID($row[branchid]);
		$this->setTitleID($row[titleid]);
		$this->setTitleName($row[titleid]);
		$this->setSalary($row[salary]);
		$this->setAddressID($row[addressid]);
		$this->setTimeOffID($row[timeoffid]);
		$this->setStatus($row[status]);
	}

	public function displayEmployeePersonalInfo()
	{
		echo '	<tr><TD class="tableDataLeftC">'.$this->employeeID.'</TD>
				<TD class="tableDataRightC">'.$this->firstName.'</TD>
				<TD class="tableDataRightC">'.$this->lastName.'</TD>
				<TD class="tableDataRightC">'.$this->address->getStreetNumber().'</TD>
				<TD class="tableDataRightC">'.$this->address->getStreet().'</TD>
				<TD class="tableDataRightC">'.$this->address->getCity().'</TD>
				<TD class="tableDataRightC">'.$this->address->getProvince().'</TD>
				<TD class="tableDataRightC">'.$this->address->getPostalCode().'</TD></tr>';	
			
	}

	public function EmployeeList()
	{
?>
		<!-- Select employee to show -->
		<table border="1">
			<tr>
				<td width="180">Select employee to show:</td>
				<td width="180"><select name="choiceEmployee">
		
				<?php
					
				//Build dynamic selection list
				$dbSelectEmployee = new Database();
				$dbSelectEmployee->connect();
					
				$querySelectEmployee="SELECT DISTINCT employeeid
									  FROM employee
									  WHERE status=1
									  ORDER BY employeeid";
		
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
		
				</select></td>
			</tr>
		</table>
		<!-- End select employee to show -->
<?php
	} // end public function EmployeeList()
	
	
	public function EmployeeListAll()
	{
		// list of employees contains both active and not active
?>
		<!-- Select employee to show -->
		<table border="1">
			<tr>
				<td width="180">Select employee to show:</td>
				<td width="180"><select name="choiceEmployee">
		
				<?php
					
				//Build dynamic selection list
				$dbSelectEmployee = new Database();
				$dbSelectEmployee->connect();
					
				$querySelectEmployee="SELECT DISTINCT employeeid
									  FROM employee
									  ORDER BY employeeid";
		
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
		
				</select></td>
			</tr>
		</table>
		<!-- End select employee to show -->
<?php
	} // end public function EmployeeList()	
	
	
	public function saveHistoryToDatabase($selectedEmployee,$employeeBranch, $employeeTitleID,$employeeBaseSalary )
	{

		// update employee work history, when new employee is added
				
		$dbEmployeeTitleNew = new Database();
		$dbEmployeeTitleNew->connect();
						
		// note: in query we use data, selected by user
		$queryEmployeeTitleNew=
						
		"INSERT INTO employeeworkhistory (employeeid, branchid, startdate, lastdate, 
													  titleid, salary)
	                VALUES ($selectedEmployee, $employeeBranch, CURDATE(), '', $employeeTitleID, $employeeBaseSalary)";
		
		$dbEmployeeTitleNew->insert($queryEmployeeTitleNew);
		$dbEmployeeTitleNew->close();
					
		// end update employee work history, when new employee is added				
			
	} // end public function saveHistoryToDatabase()
	
	
	public function saveLoginToDatabase($selectedEmployee,$employeeLogin)
	{

		// update employee login table, when new employee is added
				
		$dbEmployeeLogin = new Database();
		$dbEmployeeLogin->connect();
						
		// note: in query we use data, selected by user
		$queryEmployeeLogin=
						
		"INSERT INTO employeelogin (employeeid, passwd)
	                VALUES ($selectedEmployee, '$employeeLogin')";
		
		$dbEmployeeLogin->insert($queryEmployeeLogin);
		$dbEmployeeLogin->close();
					
		// end update employee work history, when new employee is added				
			
	} // end update employee login table, when new employee is added	
	
	
	
	public function EmployeeDeactevatedAll()
	{
		// show personal info of all deactivated employees
?>
		
		<!-- display personal info of deactivated employee -->		
		<table width="100%" border="1" cellpadding="3" cellspacing="1">
		<!--  
		<tr>
			<td>
			Employee ID
			</td>
			<td>
			First Name
			</td>
			<td>
			Last Name
			</td>
			<td>
			Street number
			</td>
			<td>
			Street name
			</td>
			<td>
			City
			</td>
			<td>
			Province
			</td>	
			<td>
			Postal code
			</td>
		</tr>
		-->
		
<?php						
	
		// find all deactivated employees
		$dbEmployeeDeactevatedAll = new Database();
		$dbEmployeeDeactevatedAll->connect();
				
		// note: in query we use data, selected by user
		$queryEmployeeDeactevatedAll=
				
		"SELECT *
		 FROM   employee	
		 WHERE  status=0'";					
											
		$dbEmployeeDeactevatedAll->query($queryEmployeeDeactevatedAll);
				
		for($count=0;$count<$dbEmployeeDeactevatedAll->queryResultsCount;$count=$count+1)
		{
			$row=mysql_fetch_array($dbEmployeeDeactevatedAll->queryResultsResource);	
			
			$this->initializeEmployeeFromRow($row);
			//$this->displayEmployeePersonalInfo();
			
			//$this->initializeEmployee($row[employeeid]);
			$this->displayEmployeeInRowFormatted();
		}		
		$dbEmployeeDeactevatedAll->close();
?>
		</table>
		<P></P>
<?php 			
		
			
	} // end public function EmployeeDeactevatedAll()	

	
	public function EmployeeCurrentSalary($selectedEmployee)
	{
		//find base salary for selected title name
		$dbEmployeeCurrentSalary = new Database();
		$dbEmployeeCurrentSalary->connect();
						
		$queryEmployeeCurrentSalary="SELECT salary 
						   		FROM employee
						   		WHERE employeeid=$selectedEmployee";
													
		$dbEmployeeCurrentSalary->query($queryEmployeeCurrentSalary);	
		$result = $dbEmployeeCurrentSalary->query($queryEmployeeCurrentSalary);						
									   
		for($count=0;$count<$dbEmployeeCurrentSalary->queryResultsCount;$count=$count+1)
		{
			$row=mysql_fetch_array($dbEmployeeCurrentSalary->queryResultsResource);
			$this->initializeEmployeeSalary($row);		
		}
		$dbEmployeeCurrentSalary->close();
	} // end public function EmployeeTitleBaseSalary()
	
	
	public function EmployeeCurrentFirstName($selectedEmployee)
	{
		//find base salary for selected title name
		$dbEmployeeCurrentFirstName = new Database();
		$dbEmployeeCurrentFirstName->connect();
						
		$queryEmployeeCurrentFirstName="SELECT firstname 
						   		FROM employee
						   		WHERE employeeid=$selectedEmployee";
													
		$dbEmployeeCurrentFirstName->query($queryEmployeeCurrentFirstName);	
		$result = $dbEmployeeCurrentFirstName->query($queryEmployeeCurrentFirstNamey);						
									   
		for($count=0;$count<$dbEmployeeCurrentFirstName->queryResultsCount;$count=$count+1)
		{
			$row=mysql_fetch_array($dbEmployeeCurrentFirstName->queryResultsResource);
			$this->initializeEmployeeFirstName($row);		
		}
		$dbEmployeeCurrentFirstName->close();
	} // end public function EmployeeCurrentFirstName()
	
	public function updateFirstName($selectedEmployee, $firstNameNew)
	{
			$dbUpdateFirstName = new Database();
			$dbUpdateFirstName->connect();
				
			// note: in query we use data, selected by user
			$queryUpdateFirstName=
				
			"UPDATE employee
    		 SET    firstname = '$firstNameNew'
			 WHERE  employeeid=$selectedEmployee'";				

			$dbUpdateFirstName->updateInsert($queryUpdateFirstName);
			$dbUpdateFirstName->close();
	} // end public function UpdateFirstName()	
	
	
	
}


?>

