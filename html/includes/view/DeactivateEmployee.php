<p></p>
<?php 
echo "<h4> Deactivate employee. </h4>\n";
//echo "<form action='?&content=DeactivateEmployee&topMenu=EmployeeTopMenu' method='POST'>";
echo "<form action='?&content=DeactivateEmployee' method='POST'>";


// create dynamic list of employee and let user to select
$employee->EmployeeList(); 	
?>

<!-- read input from user after submition -->
<P></P>
<input type="submit" name="SelectEmployee" value="select employee" />
<P></P>

<?php

$selectedEmployee=$_POST["choiceEmployee"];

$employee = new Employee();
$employee->initializeEmployee($selectedEmployee);

//if submit selection button is pressed:
if (isset($_POST["SelectEmployee"])) 						
{
	
} // end if (isset($_POST["SelectEmployee"])) 	


?>