<?php 
require_once('includes/model/Branch.Class.php');
require_once('includes/model/Address.Class.php');
require_once('includes/model/PostalCodes.Class.php');

echo "<form action='?&content=ViewEmployeeInfo' method='POST'>";

?>

<p></p>

<?php 

echo "<h5> View employee info. </h5>\n";

// create new objects
$address = new Address();
$postalCodes = new PostalCodes();

?>

<p></p>

<!-- Choose information to show -->
<table border="1"> 
	<tr><td width="180">Select information to show:</td><td width="180">
		<?php
			//echo "<form action='?&content=ViewEmployeeInfo' method='POST'>\n";
			//echo "<form action='?&content=ViewEmployeeInfo&topMenu=EmployeeTopMenu' method='POST'>"; 
		?>
		<select name="choiceInfo">
		
			<option value="personalInfo" selected>personal info</option>
			<option value="workHistory">work history</option>
			<option value="timeOffHistory">time off history</option>
		
		</select>
	</td></tr>
</table>

<p></p>

<?php 
	// create dynamic list of employee and let user to select
	$employee->EmployeeList(); 	
?>

<!-- read input from user after submition -->
<P></P>
<input type="submit" name="SelectedOptionsSubmit" value="submit selection" />
<!--  <input type="submit" value="submit selection"/> -->
<P></P>

<?php

$selectedInfo=$_POST["choiceInfo"];
$selectedEmployee=$_POST["choiceEmployee"];

$employee = new Employee();
$employee->initializeEmployee($selectedEmployee);

//if submit selection button is pressed:
if (isset($_POST["SelectedOptionsSubmit"])) 						
{
	if ($selectedInfo=="personalInfo")
	{
		echo "<h5> Personal Info: </h5>\n";
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
	} // end if (choiceInfo=="personal info")
	
	
	elseif ($selectedInfo=="workHistory")
	{
		echo "<h5> Work history: </h5>\n";		
		
	} // end elseif (choiceInfo=="work history")
	elseif ($selectedInfo=="timeOffHistory")
	{
		echo "<h5> Time off history: </h5>\n";			
		
	} // end elseif (choiceInfo=="time off history")

} // end if (isset($_POST["SelectedOptionsSubmit"])) 

?>



