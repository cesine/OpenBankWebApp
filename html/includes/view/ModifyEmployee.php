<?php 
require_once('includes/model/Branch.Class.php');
require_once('includes/model/EmployeeTitle.Class.php');
require_once('includes/model/EmployeeWorkHistory.Class.php');

echo "<form action='?&content=ModifyEmployee' method='POST'>";
?>

<p></p>

<?php 
echo "<h4> Modify employee. </h4>\n";
?>

<p></p>

<?php 
// create new objects
//$employee = new Employee();
$branch = new Branch();
$employeeTitle = new EmployeeTitle();
$employeeWorkHistory = new EmployeeWorkHistory();
?>

<!-- Choose what should be changed -->
<table border="1"> 
	<tr><td width="180">Select information to change:</td><td width="180">
		<select name="choiceInfo">
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

$selectedInfo=$_POST["choiceInfo"];

//if submit selection button is pressed:
if (isset($_POST['SelectedOptionsSubmit'])) 	
				
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

		// create dynamic list of employee and let user to select
		$employee->EmployeeList(); 

		// create dynamic list of branches and let user to select
		$branch->BranchList();
			
		// show dynamic list with employee title names
		$employeeTitle->displayEmployeeTitleList();	
?>

		<!-- Create field to change salary -->
		<table border="1"> 
			<tr><td width="180">Salary:</td><td width="180">
				<input type="text" name="choiceSalary" value=0 maxlength=8 />
			</td></tr>
		</table>
		<!-- End create field to change salary -->		
		
		<!-- read input from user after submition -->
		<P></P>
		<input type="submit" name="SelectedOptionsSubmit" value="submit changes" /> 
		<!--  <input type="submit" name="SubmitChanges" value="submit changes" />	-->	
		<P></P>		
		
<?php
		
		//if (isset($_POST['SubmitChanges'])) 	
		//if ($_POST['SubmitChanges']) 							
		{

			$selectedEmployee=$_POST["choiceEmployee"];				
			$branchIDNew=$_POST["choiceBranch"];
			$titleNameNew=$_POST["choiceTitle"];
			$salaryNew=$_POST["choiceSalary"];	
			
			//echo "<h4> new title name1:  $titleNameNew</h4>\n";				
			
			$employee = new Employee();
			$employee->initializeEmployee($selectedEmployee);
			
			
		    // validate values 
			if($salaryNew=="" || $salaryNew=="0")
			{
				echo "<h4>Please, provide salary ID.</h4>";
				//unset($_POST["SelectedOptionsSubmit"]); 
			}	
			elseif (is_numeric($salaryNew)==false) 
			{
				echo "<h4>Salary field can contain only digits.</h4>";	
	
			}
			else
			{
				echo "<h4> Old info: </h4>\n";

			//$employeeWorkHistory = new EmployeeWorkHistory();
			//$employeeWorkHistory->employeeHistoryCurrent($selectedEmployee);
			
			$employeeWorkHistory->employeeHistory($selectedEmployee);		
			
			// save current values
			$branchIDCurrent=$employeeWorkHistory->getBranchID();
			$startDateCurrent=$employeeWorkHistory->getStartDate();
			$lastDateCurrent=$employeeWorkHistory->getLastDate();
			$titleIDCurrent=$employeeWorkHistory->getTitleID();	
			$titleNameCurrent=$employeeWorkHistory->gettitlename();		
			$salaryCurrent=$employeeWorkHistory->getSalary();	
	
			/*
			echo "<h4> employee ID: $selectedEmployee</h4>\n";
			echo "<h4> branch ID:   $branchIDCurrent</h4>\n";	
			echo "<h4> start date:  $startDateCurrent</h4>\n";
			echo "<h4> last date:   $lastDateCurrent</h4>\n";
			echo "<h4> title ID:    $titleIDCurrent</h4>\n";
			echo "<h4> title name:  $titleNameCurrent</h4>\n";
			echo "<h4> salary:      $salaryCurrent</h4>\n";	
			*/
		
			$employeeTitle->findTitleID($titleNameNew);
			$titleIDNew=$employeeTitle->getTitleID();
			echo "<h4> new title name:  $titleNameNew</h4>\n";	
			echo "<h4> new title ID:    $titleIDNew</h4>\n";		
				
				// find title id from title name
				if ($titleNameNew=="Branch Manager")
				{
					$titleIDNew = 10;
				}	

				elseif ($titleNameNew=="Assistant Manager")
				{
					$titleIDNew = 15;
				}	

				elseif ($titleNameNew=="Banking Consultant")
				{
					$titleIDNew = 20;
				}	

				elseif ($titleNameNew=="Teller")
				{
					$titleIDNew = 30;
				}					
				// end find title id from title name	

				
				
				
				
				/*
				
				// put "last date" for old title
				$dbEmployeeTitleOld = new Database();
				$dbEmployeeTitleOld->connect();
				
				// note: in query we use data, selected by user
				$queryEmployeeTitleOld=
				
				"UPDATE employeeworkhistory 
				 SET    lastdate = CURDATE()
				 WHERE  employeeid=$selectedEmployee AND lastdate='0000-00-00'";				

				//$dbEmployeeTitleOld->query($queryEmployeeTitleOld);
				$dbEmployeeTitleOld->updateInsert($queryEmployeeTitleOld);
				$dbEmployeeTitleOld->close();
				// end put "last date" for old title
				
				// put "start date" for new title
				$dbEmployeeTitleNew = new Database();
				$dbEmployeeTitleNew->connect();
				
				// note: in query we use data, selected by user
				$queryEmployeeTitleNew=
				
				"INSERT INTO employeeworkhistory (employeeid, branchid, startdate, lastdate, 
												  titleid, salary)
                 VALUES ($selectedEmployee, $branchIDNew, CURDATE(), '', $titleIDNew, $salaryNew)";
									
				//$dbEmployeeTitleNew->query($queryEmployeeTitleNew);
				//$dbEmployeeTitleNew->updateInsert($queryEmployeeTitleNew);
				$dbEmployeeTitleNew->insert($queryEmployeeTitleNew);
				$dbEmployeeTitleNew->close();
				// end put "start date" for new title

								 
				// update branch/title/salary in employee table
				$dbEmployeeUpdate = new Database();
				$dbEmployeeUpdate->connect();
				
				// note: in query we use data, selected by user
				$queryEmployeeUpdate=
				
				"UPDATE employee 
				 SET    branchid=$branchIDNew, titleid=$titleIDNew, salary=$salaryNew
				 WHERE  employeeid=$selectedEmployee";				
				
				//$dbEmployeeUpdate->query($queryEmployeeUpdate);
				//$dbEmployeeUpdate->update($queryEmployeeUpdate);
				$dbEmployeeUpdate->updateInsert($queryEmployeeUpdate);
				$dbEmployeeUpdate->close();
				// end update branch/title/salary in employee table	
				 
				  
				  
				 
				 */
				
				echo "<h4> New info: </h4>\n";
?>				
				
				<!-- Show new info -->
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
					
					// Display new info of employee from table "employeeworkhistory" 
					$dbEmployeeWorkHistoryNew = new Database();
					$dbEmployeeWorkHistoryNew->connect();
					
					// note: in query we use data, selected by user
					$queryEmployeeWorkHistoryNew=
					"SELECT e.employeeid, e.branchid, e.startdate, e.lastdate, e.titleid, t.titlename, e.salary  
					 FROM   employeeworkhistory e, employeetitle t	
					 WHERE  e.employeeid=$selectedEmployee AND e.lastdate='0000-00-00' AND t.titleid=e.titleid";						
												
					$dbEmployeeWorkHistoryNew->query($queryEmployeeWorkHistoryNew);
					
					//Put results of query 1 into table on the screen
					for($count=0;$count<$dbEmployeeWorkHistoryNew->queryResultsCount;$count=$count+1)
					{
						$row=mysql_fetch_array($dbEmployeeWorkHistoryNew->queryResultsResource);	
						$employeeWorkHistory->initializeEmployeeWorkHistory($row);
						$employeeWorkHistory->displayEmployeeWorkHistory2();
						$employeeTitle->initializeEmployeeTitle($row);
						$employeeTitle->displayEmployeeTitleName();	
						$employeeWorkHistory->displayEmployeeWorkHistorySalary();								
					}
			
					$dbEmployeeWorkHistoryNew->close();
				
?>
		
				</table>
				<P></P>
<?php 									
	
		
			} // end input is OK

		} // end if (isset($_POST["SubmitChanges"]))
		
	} // end elseif ($selectedInfo=="branch/title/salary")	

	
	elseif ($selectedInfo=="vacation type")
	{
		
	} // end elseif ($selectedInfo=="vacation type")		
	
} // if (isset($_POST["SelectedOptionsSubmit"])) 

?>
