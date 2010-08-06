<p></p>
<?php 
//session_start();
include('includes/model/Employee.Class.php');
include ('includes/view/employeetopmenu.php'); 
require_once('includes/controller/Database.Class.php'); 
require_once('includes/model/Branch.Class.php');
require_once('includes/model/EmployeeTitle.Class.php');
require_once('includes/model/EmployeeWorkHistory.Class.php');
require_once('includes/model/EmployeeTimeOffPlan.Class.php');

echo "<form action='?&content=AddEmployee&topMenu=EmployeeTopMenu' method='POST'>";

?>

<p></p>

<?php 
	echo "<h4> Add employee. </h4>\n";
?>

<p></p>

<?php 
	// create new objects
	$employee = new Employee();
	$branch = new Branch();
	$employeeTitle = new EmployeeTitle();
	$employeeWorkHistory = new EmployeeWorkHistory();
	$employeeTimeOffPlan = new EmployeeTimeOffPlan();	
	
	// create dynamic list of branches and let user to select
	$branch->BranchList();
	
	// create dynamic list of employee title names and let user to select
	$employeeTitle->displayEmployeeTitleList();	
	
	$s="first name";
?>

	<!-- Create field to put salary -->
	<table border="1"> 
		<tr><td width="180">Salary:</td><td width="180">
			<input type="text" name="choiceSalary" value=0 maxlength=8 />
		</td></tr>
	</table>
	<!-- End create field to put salary -->		
	
	<!-- Create field to put first name -->
	<table border="1"> 
		<tr><td width="180">First name:</td><td width="180">
			<input type="text" name="choiceFirstName" value=".$s" maxlength=20 />
		</td></tr>
	</table>
	<!-- End create field to put first name -->		
	
	<!-- Create field to put last name -->
	<table border="1"> 
		<tr><td width="180">Last name:</td><td width="180">
			<input type="text" name="choiceLastName" maxlength=20 />
		</td></tr>
	</table>
	<!-- End create field to put last name -->	

<?php

	// create dynamic list of employee's time off plan names and let user to select
	$employeeTimeOffPlan->displayEmployeeTimeOffPlanList();

?>					
		





