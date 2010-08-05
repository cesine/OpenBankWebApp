<?php 
//session_start();
include('includes/model/Employee.Class.php');
include ('includes/view/employeetopmenu.php');  

require_once('includes/controller/Database.Class.php');
require_once('includes/model/Branch.Class.php');
require_once('includes/model/EmployeeTitle.Class.php');
require_once('includes/model/EmployeeWorkHistory.Class.php');

echo "<form action='?&content=ModifyEmployee&topMenu=EmployeeTopMenu' method='POST'>";
?>

<p></p>

<?php 
echo "<h4> Modify employee. </h4>\n";
?>

<p></p>

<?php 
// create new objects
$employee = new Employee();
$branch = new Branch();
$employeeTitle = new EmployeeTitle();
$employeeWorkHistory = new EmployeeWorkHistory();

// create dynamic list of employee and let user to select
$employee->EmployeeList(); 
?>

<!-- Choose what should be changed -->
<table border="1"> 
	<tr><td width="180">Select information to change:</td><td width="180">
		<select name="choice2">
			<option value="first name">first name</option>
			<option value="last name">last name</option>
			<option value="address">address</option>			
			<option value="branch/title/salary"selected>branch/title/salary</option>
			<option value="vacation type">vacation type</option>
		</select>
	</td></tr>
</table>

<!-- read input from user after submition -->
<P></P>
<input type="submit" name="SelectedOptionsSubmit" value="submit selection" />
<P></P>

<?php

$selectedInfo=$_POST["choice2"];
$selectedEmployee=$_POST["choice1"];

//if submit selection button is pressed:
if (isset($_POST["SelectedOptionsSubmit"])) 						// if user press login button
{

	if ($selectedInfo=="first name")
	{
		
	} // end if ($selectedInfo=="first name")
	
	elseif ($selectedInfo=="last name")
	{
		
	} // end elseif ($selectedInfo=="last name")	
	
	elseif ($selectedInfo=="address")
	{
		
	} // end elseif ($selectedInfo=="address")	

	elseif ($selectedInfo=="branch/title/salary")
	{
			
		//echo "<h4> Selected: </h4>\n";
		//echo "<h5> information to change: $selectedInfo </h5>\n";
		//echo "<h5> employee ID:           $selectedEmployee </h5>\n";
		echo "<h4> Current Info: </h4>\n";
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
			
			echo "<h4> Change on: </h4>\n";	
			// show dynamic list with branches id
			$branch->BranchList();
			
			// show dynamic list with employee title names
			$employeeTitle->displayEmployeeTitleList();	
		?>

		<!-- Create field to change salary -->
		<table border="1"> 
			<tr><td width="180">Salary:</td><td width="180">
				<input type="text" name="choiceSalary" />
			</td></tr>
		</table>
		<!-- End create field to change salary -->			



		
<?php 		
	} // end elseif ($selectedInfo=="branch/title/salary")	

	elseif ($selectedInfo=="vacation type")
	{
		
	} // end elseif ($selectedInfo=="vacation type")		
	
} // if (isset($_POST["SelectedOptionsSubmit"])) 

?>
