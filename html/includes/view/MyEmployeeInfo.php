<?php 
	require_once('includes/model/Employee.Class.php');
	//require_once('includes/model/Branch.Class.php');
	require_once('includes/model/Address.Class.php');
	require_once('includes/model/PostalCodes.Class.php');
	require_once('includes/model/EmployeeTitle.Class.php');
	require_once('includes/model/EmployeeWorkHistory.Class.php');
	require_once('includes/model/EmployeeTimeOffPlan.Class.php');	
	
?>
<p></p>
<?php 

	echo "<h4> My employee info. </h4><p></p>";
	
	if (isset($_SESSION['Employee']))
	{
		$employee=unserialize($_SESSION['Employee']);
		$employee->getEmployeeID();
		$employeeID=$employee->getEmployeeID();
		//echo "<h5> Employee ID: $employeeID </h5><p></p>";	

?>
		<!-- display personal info of employee on the screen -->
		
		<!-- create header for table -->
		<table width="100%" border="1" cellpadding="3" cellspacing="1">
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
		
		<?php
		$employee->displayEmployeePersonalInfo();
		?>
		</table>
		<P></P>
<?php 	

		echo "<h4> Work history: </h4>\n";
		$employeeWorkHistory = new EmployeeWorkHistory();
		$employeeWorkHistory->employeeHistory($employeeID);

		echo "<h4> Time off history: </h4>\n";		
		$employeeTimeOff = new EmployeeTimeOffPlan();
		$employeeTimeOff->findEmployeeTimeOffPlan($employeeID);			
		$employeeTimeOff->findEmployeeTimeOff($employeeID);					

	} // end if (isset($_SESSION['Employee']))

?>