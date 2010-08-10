<p></p>
<?php 
require_once('includes/model/Branch.Class.php');
require_once('includes/model/Employee.Class.php');
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
	$branch = new Branch();
	$title = new EmployeeTitle();
	$workHistory = new EmployeeWorkHistory();
	$timeOffPlan = new EmployeeTimeOffPlan();	
	$address = new Address();
	//$postalCode = new PostalCodes();
	$employee=new Employee();
	
	// create dynamic list of branches and let user to select
	$branch->BranchList();
	
	// create dynamic list of employee title names and let user to select
	$title->displayEmployeeTitleList();	
	
	// create dynamic list of employee's time off plan names and let user to select
	$timeOffPlan->displayEmployeeTimeOffPlanList();			
	
?>
	<!-- Create fields to put street and street number -->
	<table border="1"> 
		<tr><td width="180">Street name:</td><td width="180">			
			<!-- Making A Value In A Textbox Stay  -->
			<input id="text" name="choiceStreet" maxlength=25 value="<?php if(isset($_POST['choiceStreet'])){ echo htmlentities($_POST['choiceStreet']); }?>" />				
		</td></tr>
		
		<tr><td width="180">Street number:</td><td width="180">
			<!-- <input type="text" name="choiceStreetNumber" maxlength=6 />-->
			
			<!-- Making A Value In A Textbox Stay  -->
			<input id="text" name="choiceStreetNumber" maxlength=6 value="<?php if(isset($_POST['choiceStreetNumber'])){ echo htmlentities($_POST['choiceStreetNumber']); }?>" />				
		</td></tr>
	</table>
	<!-- End create field to put street number -->	

<?php 
		// create dynamic list of postal codes
		$address->PostalCodesList();		
?>

	<!-- read input from user after submition -->
	<P></P>
	<input type="submit" name="EmployeeInfoSubmit" value="submit selection" />
	<P></P>
	
<?php

	//if submit selection button is pressed:
	if (isset($_POST['EmployeeInfoSubmit'])) 	
	{
				
		$employee->setFirstName($_POST["choiceFirstName"]);
		$employeeFirstName=$_POST["choiceFirstName"];
		
		$employee->setLastName($_POST["choiceLastName"]);		
		$employeeLastName=$_POST["choiceLastName"];	

		$employee->setBranchID($_POST["choiceBranch"]);
		$employeeBranch=$_POST["choiceBranch"];	
		
		$employee->setTitleName($_POST["choiceTitle"]);
		$employeeTitle=$_POST["choiceTitle"];
		
		// get time off plan id from time off plan name
		$employeeTimeOffPlan=$_POST["choiceTimeOffPlan"];			
		//$timeOffPlan->findTimeOffPlanID($employeeTimeOffPlan);      // doesn't work, return empty id
		$timeOffPlan->findTimeOffPlanID2($employeeTimeOffPlan);		
		$employeeTimeOffPlanID=$timeOffPlan->getTimeOffID();		
		//echo "<h5> time off name: $employeeTimeOffPlan </h5>\n";	
		//echo "<h5> time off ID: $employeeTimeOffPlanID </h5>\n";	
		
		$employee->setTimeOffID($employeeTimeOffPlanID);	
		
		$address->setPostalCodeString($_POST["choicePostalCode"]);
		$employeePostalCode=$_POST["choicePostalCode"];	
			
		$address->setStreetNumber($_POST["choiceStreetNumber"]);
		$employeeStreetNumber=$_POST["choiceStreetNumber"];	
		
		$address->setStreet($_POST["choiceStreet"]);
		$employeeStreet=$_POST["choiceStreet"];
		
		$employee->setAddressFromObject($address);
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
		if($employeeFirstName=="" || $employeeLastName=="" || $employeeStreet==""||
		   empty($employeeStreetNumber)==true)
		{
			echo "<h4>Empty values are not valid.</h4>";
		}	
		elseif (is_numeric($employeeFirstName)==true ||
				is_numeric($employeeLastName)==true ||
				is_numeric($employeeStreet)==true)
		{
			echo "<h4>First name, last name and street name should be a string.</h4>";	
		}
		elseif (is_numeric($employeeStreetNumber)==false) 
		{
			echo "<h4>Street number should contain only digits.</h4>";	
		}		
		else 																	// input is OK
		{			
					
			//find base salary for selected title name
			$title->EmployeeTitleBaseSalary($employeeTitle);
			$employeeBaseSalary=$title->getBaseSalary();		
			
			// show base salary for selected title, which can be corrected
?>
			<!-- Create field to put salary, by default base salary -->
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

			//find province, city from postal code
			$employeeProvince=$address->getProvince();
			$employeeCity=$address->getCity();	

			$timeOffPlan->findNumberOfDays($employeeTimeOffPlanID);
			$employeeNumberOfDays=$timeOffPlan->getNumberOfDays();
?>

			<!-- Show province, city according to postal code -->
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
				<tr><td width="180">Number of days off allowed:</td><td width="180">
					<?php 
						echo "<input type=text disabled name=\"choiceNumberOfDays\" value=\"" . $employeeNumberOfDays . "\">";
					?>				
				</td></tr>												
			</table>
			<!-- End Show province and city according to postal code -->	

<?php 


			echo $employee->saveToDatabase();
			//$selectedEmployee = 
			
			// put "start date" for new title
			
			$dbEmployeeTitleNew = new Database();
			$dbEmployeeTitleNew->connect();
				
			// note: in query we use data, selected by user
			$queryEmployeeTitleNew=
				
			"INSERT INTO employeeworkhistory (employeeid, branchid, startdate, lastdate, 
											  titleid, salary)
                VALUES ($selectedEmployee, $employeeBranch, CURDATE(), '', $employeeTitle, $employeeBaseSalary)";

			$dbEmployeeTitleNew->insert($queryEmployeeTitleNew);
			$dbEmployeeTitleNew->close();
			
			// end put "start date" for new title

		} // end input is OK		
	
	} // end if (isset($_POST['EmployeeInfoSubmit'])) 

?>					






