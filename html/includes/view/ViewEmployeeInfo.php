<?php 
session_start();
include('includes/model/Employee.Class.php');
include('includes/controller/Database.Class.php');
include ('includes/view/employeetopmenu.php');  
echo "<form action='?&content=ViewEmployeeInfo&topMenu=EmployeeTopMenu' method='POST'>";
?>

<p></p>

<?php 
echo "<h4> View employee info. </h4>\n";
?>

<p></p>

<!-- Choose information to show -->
<table border="1"> 
	<tr><td width="15">Select option to show:</td><td>
		<select name="choice1">
		
			<option value="personalInfo" selected>personal info</option>
			<option value="workHistory">work history</option>
			<option value="shedule">shedule</option>
			<option value="holidays">holidays</option>
		
		</select>
	</td></tr>
</table>

<p></p>

<!-- Choose branch to show -->
<table border="1"> 
	<tr><td>Select option to show:</td><td>
		<select name="choice2" size="2">
		
			<option value="personalInfo" selected>personal info</option>
			<option value="workHistory">work history</option>
			<option value="shedule">shedule</option>
			<option value="holidays">holidays</option>
		
		</select>
	</td></tr>
</table>

