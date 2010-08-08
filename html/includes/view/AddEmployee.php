<p></p>
<?php 
require_once('includes/model/Branch.Class.php');
require_once('includes/model/EmployeeTitle.Class.php');
require_once('includes/model/EmployeeWorkHistory.Class.php');
require_once('includes/model/EmployeeTimeOffPlan.Class.php');
require_once('includes/model/Address.Class.php');
require_once('includes/model/PostalCodes.Class.php');

echo "<form action='?&content=AddEmployee&topMenu=EmployeeTopMenu' method='POST'>";

?>

<p></p>

<?php 
	echo "<h4> Add employee. </h4>\n";
?>

<p></p>

	<!-- Create field to put first name -->
	<table border="1"> 
		<tr><td width="180">First name:</td><td width="180">
		
			<!-- Making A Value In A Textbox Stay  -->
			<input id="text" name="choiceFirstName" maxlength=20 value="<?php if(isset($_POST['choiceFirstName'])){ echo htmlentities($_POST['choiceFirstName']); }?>" />
			
		</td></tr>
	</table>
	<!-- End create field to put first name -->		
	
	<!-- Create field to put last name -->
	<table border="1"> 
		<tr><td width="180">Last name:</td><td width="180">
			
			<!-- Making A Value In A Textbox Stay  -->
			<input id="text" name="choiceLastName" maxlength=20 value="<?php if(isset($_POST['choiceLastName'])){ echo htmlentities($_POST['choiceLastName']); }?>" />	
			
		</td></tr>
	</table>
	<!-- End create field to put last name -->	

<?php 
	// create new objects
	//$employee = new Employee();
	$branch = new Branch();
	$title = new EmployeeTitle();
	$workHistory = new EmployeeWorkHistory();
	$timeOffPlan = new EmployeeTimeOffPlan();	
	$address = new Address();
	$postalCode = new PostalCodes();
	
	// create dynamic list of branches and let user to select
	$branch->BranchList();
	
	// create dynamic list of employee title names and let user to select
	$title->displayEmployeeTitleList();	
	
	// create dynamic list of employee's time off plan names and let user to select
	$timeOffPlan->displayEmployeeTimeOffPlanList();		
	
	// create dynamic list of postal codes
	$address->PostalCodesList();	
	
?>
	<!-- Create field to put street number -->
	<table border="1"> 
		<tr><td width="180">Street number:</td><td width="180">
			<!-- <input type="text" name="choiceStreetNumber" maxlength=6 />-->
			
			<!-- Making A Value In A Textbox Stay  -->
			<input id="text" name="choiceStreetNumber" maxlength=6 value="<?php if(isset($_POST['choiceStreetNumber'])){ echo htmlentities($_POST['choiceStreetNumber']); }?>" />				
		</td></tr>
	</table>
	<!-- End create field to put street number -->	

	<!-- read input from user after submition -->
	<P></P>
	<input type="submit" name="EmployeeInfoSubmit" value="submit selection" />
	<P></P>
	
<?php

	//if submit selection button is pressed:
	if (isset($_POST['EmployeeInfoSubmit'])) 	
	{
		
		$employeeFirstName=$_POST["choiceFirstName"];
		$employeeLastName=$_POST["choiceLastName"];	
		$employeeBranch=$_POST["choiceBranch"];	
		$employeeTitle=$_POST["choiceTitle"];
		$employeeTimeOffPlan=$_POST["choiceTimeOffPlan"];	
		$employeePostalCode=$_POST["choicePostalCode"];	
		$employeeStreetNumber=$_POST["choiceStreetNumber"];			
	
		/*
		echo "<h4> Selected: </h4>\n";
		echo "<h5> first name: 		$employeeFirstName </h5>\n";
		echo "<h5> last name:  		$employeeLastName </h5>\n";		
		echo "<h5> branch:  		$employeeBranch </h5>\n";	
		echo "<h5> title:  			$employeeTitle </h5>\n";	
		echo "<h5> time off plan:  	$employeeTimeOffPlan </h5>\n";	
		echo "<h5> postal code:  	$employeePostalCode </h5>\n";	
		 */						
		
		
	    // validate values 
		if($employeeFirstName=="" || $employeeLastName=="" || 
		   empty($employeeStreetNumber)==true)
		{
			echo "<h4>Empty values are not valid.</h4>";
		}	
		elseif (is_numeric($employeeFirstName)==true ||
				is_numeric($employeeLastName)==true) 
		{
			echo "<h4>First name and last name should be a string.</h4>";	
		}
		elseif (is_numeric($employeeStreetNumber)==false) 
		{
			echo "<h4>Street number should contain only digits.</h4>";	
		}		
		else 																	// input is OK
		{
			
			
			//find base salary for selected title name
			$dbSelectBaseSalary = new Database();
			$dbSelectBaseSalary->connect();
							
			$querySelectBaseSalary="SELECT basesalary 
							   		FROM employeetitle
							   		WHERE titlename='$employeeTitle'";
														
			$dbSelectBaseSalary->query($querySelectBaseSalary);	
			$result = $dbSelectBaseSalary->query($querySelectBaseSalary);						
										   
			for($count=0;$count<$dbSelectBaseSalary->queryResultsCount;$count=$count+1)
			{
				$row=mysql_fetch_array($dbSelectBaseSalary->queryResultsResource);
				$title->initializeEmployeeTitle($row);
			}
			
			// save current values
			$employeeBaseSalary=$row[basesalary];	
			//echo "<h5> base salary:  	$employeeBaseSalary </h5>\n";				
			$dbSelectBaseSalary->close();	

			//$title->EmployeeTitleBaseSalary();
			//$employeeBaseSalary=$title->getBaseSalary();
			//echo "<h5> base salary:  	$employeeBaseSalary </h5>\n";				
			
			// show base salary for selected title, which can be corrected
?>
			<!-- Create field to put salary, by defalt base salary -->
			<table border="1"> 
				<tr><td width="180">Salary (base by default):</td><td width="180">
					<?php 
						// example, how to put value of variable into text box
						//echo "<input type=text disabled name=\"choiceFirstName\" size=\"25\" maxlength=\"20\" value=\"" . $s . "\">";
 						//echo "<input type=text name=\"question\" size=\"25\" value=\"" . $rows4['question'] . "\">";
						echo "<input type=text disabled name=\"choiceSalary\" maxlength=\"8\" value=\"" . $employeeBaseSalary . "\">";
					?>				
				</td></tr>
			</table>
			<!-- End create field to put salary -->	
<?php 
			
			/*
			//find province, city, street from postal code
			$dbSelectProvinceCityStreet = new Database();
			$dbSelectProvinceCityStreet->connect();
							
			$querySelectProvinceCityStreet="SELECT DISTINCT province, city, street 
							   				FROM postalcodes, address
							   				WHERE postalcodes='$employeePostalCode'	AND 
							   					  postalcode=postalcodes";
														
			$dbSelectProvinceCityStreet->query($querySelectProvinceCityStreet);	
			$result = $dbSelectProvinceCityStreet->query($querySelectProvinceCityStreet);						
										   
			for($count=0;$count<$dbSelectProvinceCityStreet->queryResultsCount;$count=$count+1)
			{
				$row=mysql_fetch_array($dbSelectProvinceCityStreet->queryResultsResource);
				$address->initializeProvinceCityStreet($row);
				//$postalCodes->initializeProvinceCityStreet2($row);
			}
			
			// save current values
			$employeeProvince=$row[province];
			$employeeCity=$row[city];	
			$employeeStreet=$row[street];
										
			$dbSelectProvinceCityStreet->close();	
			*/

			$address->findProvinceCity($employeePostalCode);
			$employeeProvince=$row[province];
			$employeeCity=$row[city];				
			


?>

			<!-- Show province, city and street according to postal code -->
			<table border="1"> 
				<tr><td width="180">Province:</td><td width="180">
					<?php 
						echo "<input type=text disabled name=\"choiceProvince\" value=\"" . $employeeProvince . "\">";
					?>				
				</td></tr>
				<tr><td width="180">City:</td><td width="180">
					<?php 
						echo "<input type=text disabled name=\"choiceCity\" value=\"" . $employeeCity . "\">";
					?>				
				</td></tr>	
				<tr><td width="180">Street name:</td><td width="180">
					<?php 
						//echo "<input type=text disabled name=\"choiceStreet\" value=\"" . $employeeStreet . "\">";
					?>				
				</td></tr>								
			</table>
			<!-- End Show province and city according to postal code -->	

<?php 

			/*
			// insert row into table Address
			$dbEmployeeAddressNew = new Database();
			$dbEmployeeAddressNew->connect();
				
			// note: in query we use data, selected by user
			$queryEmployeeAddressNew=
			"INSERT INTO address (addressid, streetnumber, street, postalcode)
			 VALUES ('NULL', $employeeStreetNumber, '$employeeStreet', '$employeePostalCode')";			
			//$dbEmployeeAddressNew->query($queryEmployeeAddressNew);
			$dbEmployeeAddressNew->updateInsert($queryEmployeeAddressNew);
			$dbEmployeeAddressNew->close();
			// end insert row into table Address	
			 */	

		} // end input is OK		
	
	} // end if (isset($_POST['EmployeeInfoSubmit'])) 

?>					






