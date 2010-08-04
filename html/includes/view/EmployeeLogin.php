<?php 

session_start();
include('includes/model/Employee.Class.php');
include('includes/controller/Database.Class.php');
echo "<h4> Please log in. </h4>\n";
echo "<form action='?&content=EmployeeLogin&topMenu=EmployeeTopMenu' method='POST'>";

$employee = new Employee();

?>

<form>
	
	<table  width="600" border="0">
	
	<!--  <table width="240" border="0" align="center" cellpadding="1" cellspacing="3">-->
	
		<tr>
		
			<td class="fieldTitleLeftB">Employee ID:</td>
			<td><input type="text" name="EmployeeID" size="20" maxlength="8" value=""/></td>
			
		</tr>
	
		<tr>
			<td valign="middle">&nbsp;</td>
			<td height="35" valign="middle">
			<input type="submit" name="EmployeeIDSubmit" value="   Log in   " />
			</td>
		</tr>
	
	</table>

</form>

<?php 

$EmployeeID=$_POST["EmployeeID"]; 							// read employee ID from user input

//if login button is pressed:
if (isset($_POST["EmployeeIDSubmit"])) 						// if user press login button
{

	//to check if employee ID is provided:
    if($EmployeeID == '')									// employee ID doesn't provided
    {	
    	echo "<h4>Please, provide employee ID.</h4>";
    }
	else 													// employee ID is provided
	{
		//to check if employee ID exist in DB 
		$dbCheckEmployeeID = new Database();
		$dbCheckEmployeeID->connect();
		
		$queryCheckEmployeeID="SELECT employeeid 
							   FROM employee
							   WHERE employeeid=$EmployeeID";
									
		$dbCheckEmployeeID->query($queryCheckEmployeeID);	
		$count = $dbCheckEmployeeID->queryResultsCount;
		
		if($count==1)
		{
			// employee found in DB
			echo "<h4> Employee ID: $EmployeeID found in DB. </h4>\n";	
			$_SESSION['EmployeeID']=$_POST['EmployeeID']; 							// put employee ID into session variable	
			//echo "<h4> Employee ID: $_SESSION[EmployeeID] found in DB. </h4>\n"; 	//correct	
			$dbCheckEmployeeID->close();					
		}
		else
		{
			echo "<h4> Employee ID: $EmployeeID doesn't exist in DB !</h4>\n";			
		}
	} // end else // employee ID is provided
	
	// check if employee is a Branch Manager
	// if titleid=10 than employee is a Branch Manager
	$dbCheckBranchManager = new Database();
	$dbCheckBranchManager->connect();
		
	$queryCheckBranchManager="SELECT titleid 
						   FROM employee
						   WHERE employeeid=$EmployeeID";
									
	$dbCheckBranchManager->query($queryCheckBranchManager);		

	for($count=0;$count<$dbCheckBranchManager->queryResultsCount;$count=$count+1)
	{
		$row=mysql_fetch_array($dbCheckBranchManager->queryResultsResource);
		$employee->initializeEmployee($row);
	}	
	
	echo "<h4> Employee title ID: $row[titleid] </h4>\n"; 							// correct			
	//echo "<h4> Employee title ID: $employee->getTitleID()</h4>\n"; 				// wrong

	if ($row[titleid]==10)
	{
		//include ('includes/view/employeetopmenu.php');       		
	}
	
	$dbCheckBranchManager->close();		
	
	//include ('includes/view/employeetopmenu.php');	
	
	
} // end if (isset($_POST['EmployeeIDSubmit']))

?>