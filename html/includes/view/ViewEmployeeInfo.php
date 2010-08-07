<?php 
require_once('includes/model/Branch.Class.php');
require_once('includes/model/Address.Class.php');
require_once('includes/model/PostalCodes.Class.php');

echo "<form action='?&content=ViewEmployeeInfo' method='POST'>";

?>

<p></p>

<?php 

echo "<h4> View employee info. </h4>\n";

// create new objects
//$employee = new Employee(2);
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
		<select name="choice1">
		
			<option value="personal info" selected>personal info</option>
			<option value="work history">work history</option>
			<option value="shedule">shedule</option>
			<option value="holidays">holidays</option>
		
		</select>
	</td></tr>
</table>

<!-- Select branch to show -->
<!--  
<table border="1"> 
	<tr><td width="180">Select option to show:</td><td width="180">
		<select name="choice2">
		
		<?php 
		
			
			/*
			//Build dynamic selection list
			$dbSelectBrach = new Database();
			$dbSelectBrach->connect();
			
			$querySelectBrach="SELECT DISTINCT branchid 
							   FROM branch";
										
			$dbSelectBrach->query($querySelectBrach);	
			$result = $dbSelectBrach->query($querySelectBrach);						
						   
			//Put results of query into dynamic list
			for($count=0;$count<$dbSelectBrach->queryResultsCount;$count=$count+1)
			{
				$row=mysql_fetch_array($dbSelectBrach->queryResultsResource);
				extract($row);
				echo "<option value='$branchid'>$branchid</option>";
			
			}//endl if to only print when there are any results
			echo "</select>\n";	
			$dbSelectBrach->close();
			*/			
		?>
		
		</select>
	</td></tr>
</table>
-->
<!-- End select branch to show -->

<p></p>

<!-- Select employee to show -->
<table border="1"> 
	<tr><td width="180">Select employee to show:</td><td width="180">
	
		<?php
			//echo "<form action='?&content=ViewEmployeeInfo' method='POST'>\n";
			//echo "<form action='?&content=ViewEmployeeInfo&topMenu=EmployeeTopMenu' method='POST'>"; 
		?>	
	
		<select name="choice2">
		
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

<!-- read input from user after submition -->
<P></P>
<input type="submit" name="SelectedOptionsSubmit" value="submit selection" />
<!--  <input type="submit" value="submit selection"/> -->
<P></P>

<?php

$selectedInfo=$_POST["choice1"];
$selectedEmployee=$_POST["choice2"];

$employee = new Employee($selectedEmployee);

//if submit selection button is pressed:
if (isset($_POST["SelectedOptionsSubmit"])) 						// if user press login button
{
	
	echo "<h4> Selected: </h4>\n";
	echo "<h5> kind of information: $selectedInfo </h5>\n";
	echo "<h5> employee ID:         $selectedEmployee </h5>\n";
}

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
	Postal code
	</td>
	<td>
	Provance
	</td>	
	<td>
	City
	</td>	
	<td>
	Street number
	</td>
	<td>
	Street name
	</td>		
</tr>

<?php

//// Display personal info of employee from tables "employee", "address", "postalcodes" 
//
//$dbEmployeePersonalInfo = new Database();
//$dbEmployeePersonalInfo->connect();
//
//// note: in query we use data, selected by user
//$queryEmployeePersonalInfo=
//"SELECT e.employeeid, e.firstname, e.lastname,
//        p.postalcodes, p.province, p.city, a.streetnumber, a.street
//FROM    employee e, address a, postalcodes p	
//WHERE   e.addressid=a.addressid AND
//        a.postalcode=p.postalcodes AND
//        e.employeeid=$selectedEmployee";
//							
//$dbEmployeePersonalInfo->query($queryEmployeePersonalInfo);	
//
////Put results of query into table on the screen
//for($count=0;$count<$dbEmployeePersonalInfo->queryResultsCount;$count=$count+1)
//{
//	$row=mysql_fetch_array($dbEmployeePersonalInfo->queryResultsResource);	
//
//	$employee->initializeEmployee($row);
//	$employee->displayEmployeePersonalInfo();
//	
//	$postalCodes->initializePostalCodes($row);
//	$postalCodes->displayCodeProvinceCity($row);
//	
//	$address->initializeAddressZ($row);
//	$address->displayStreetNumber();
//	
//	$postalCodes->displayStreet();
//}
//
//$dbEmployeePersonalInfo->close();

?>
</table>
<P></P>

<?php
//echo "Province: $row[province]\n"; // correct
?>
