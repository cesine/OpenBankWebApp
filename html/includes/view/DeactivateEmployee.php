<?php 
	require_once('includes/model/Employee.Class.php');
	require_once('includes/model/EmployeeWorkHistory.Class.php');	
?>

<p></p>
<?php 
	echo "<h4> Deactivate employee. </h4>\n";
?>
	<p></p>
<?php 
//echo "<form action='?&content=DeactivateEmployee&topMenu=EmployeeTopMenu' method='POST'>";
echo "<form action='?&content=DeactivateEmployee' method='POST'>";


// create dynamic list of employee and let user to select
$employee->EmployeeList(); 	
?>

<!-- read input from user after submition -->
<P></P>
<input type="submit" name="DeactivateEmployee" value="deactivate employee" />
<P></P>

<!-- show bottom "Deactivated employee Info" -->
<!--  
<P></P>
<input type="submit" name="DeactivateEmployeeInfo" value="Deactivated employee info" />
<P></P>
-->

<?php

$selectedEmployee=$_POST["choiceEmployee"];

$employee = new Employee();
$employee->initializeEmployee($selectedEmployee);

//if submit selection button is pressed:
if (isset($_POST["DeactivateEmployee"])) 						
{
	$employee->changeStatus($selectedEmployee);
?>
	<P></P>
<?php 
	echo "<h4> Employee with ID $selectedEmployee is deactivated!. </h4>\n";
	
} // end if (isset($_POST["SelectEmployee"])) 

	
//if (isset($_POST["DeactivateEmployeeInfo"])) 						
{
	echo "<h4> Deactivated employee info. </h4>\n";
?>
		<!-- display personal info of deactivated employee -->
		
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
		$employeeWorkHistory->employeeHistory($selectedEmployee);
		

	
} // end if (isset($_POST["DeactivateEmployeeInfo"])) 	


?>