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
		
		$employeeWorkHistory->EmployeeWorkHistoryCurrent($selectedEmployee);
		
		echo "<h4> current title: </h4>\n";	
		$s=$employeeWorkHistory->getTitleIDCurrent();
		$s2=$employeeWorkHistory->getTitleID();		
		echo "<h4> s= $s </h4>\n";		
		echo "<h4> s2= $s2 </h4>\n";	

		$titleIDCurrent=$row[titleid];	
		echo "<h4> titleIDCurrent = $titleIDCurrent </h4>\n";			
		
		?>






		
<?php 		
	} // end elseif ($selectedInfo=="branch/title/salary")	

	elseif ($selectedInfo=="vacation type")
	{
		
	} // end elseif ($selectedInfo=="vacation type")		
	
} // if (isset($_POST["SelectedOptionsSubmit"])) 

?>
