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


?>