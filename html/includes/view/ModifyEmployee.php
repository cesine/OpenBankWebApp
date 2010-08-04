<?php 
//session_start();
include('includes/model/Employee.Class.php');
include('includes/controller/Database.Class.php');
include ('includes/view/employeetopmenu.php');  

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
?>

<!-- Select employee to show -->
<table border="1"> 
	<tr><td width="180">Select employee to show:</td><td width="180">
		<select name="choice1">
		
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

<!-- Choose what should be shanged -->
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
			Title
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
		"SELECT *
		 FROM   employeeworkhistory	
		 WHERE  employeeid=$selectedEmployee AND lastdate='0000-00-00'";
									
		$dbEmployeeWorkHistory->query($queryEmployeeWorkHistory);
		
		//Put results of query 1 into table on the screen
		for($count=0;$count<$dbEmployeeWorkHistory->queryResultsCount;$count=$count+1)
		{
			$row=mysql_fetch_array($dbEmployeeWorkHistory->queryResultsResource);	
		
			$employeeWorkHistory->initializeEmployeeWorkHistory($row);
			$employeeWorkHistory->displayEmployeeWorkHistory2();
		}
		// save current values
		$branchIdCurrent=$row[branchid];	
		$startDateCurrent=$row[startdate];	
		$lastDateCurrent=$row[lastdate];
		$titleIDCurrent=$row[titleid];	
		$salaryCurrent=$row[salary];											
		
		// Display current title name of employee from table "employeetitle" 		
		$dbEmployeeTitle = new Database();
		$dbEmployeeTitle->connect();
		
		// note: in query we use data, selected by user
		$queryEmployeeTitle=
		"SELECT titlename
		 FROM   employeetitle	
		 WHERE  titleid=$titleIDCurrent";
									
		$dbEmployeeTitle->query($queryEmployeeTitle);			
		
		//Put results of query 2 into table on the screen
		for($count=0;$count<$dbEmployeeTitle->queryResultsCount;$count=$count+1)
		{
			$row=mysql_fetch_array($dbEmployeeTitle->queryResultsResource);	
			$employeeTitle->initializeEmployeeTitle($row);
			$employeeTitle->displayEmployeeTitleName();
			$employeeWorkHistory->displayEmployeeWorkHistorySalary();			
		}
		// save current values
		$titleCurrent=$row[titlename];	
		
		$dbEmployeeWorkHistory->close();
		$dbEmployeeTitle->close();		
		?>
		</table>
		<P></P>

		
<?php 		
	} // end elseif ($selectedInfo=="branch/title/salary")	

	elseif ($selectedInfo=="vacation type")
	{
		
	} // end elseif ($selectedInfo=="vacation type")		
	
} // if (isset($_POST["SelectedOptionsSubmit"])) 

?>
