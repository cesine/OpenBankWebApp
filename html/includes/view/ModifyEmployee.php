<?php 
//session_start();

//include ('includes/view/employeetopmenu.php');  
require_once('includes/model/Employee.Class.php');
//require_once('includes/controller/Database.Class.php');
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
			
			$employee = new Employee($selectedEmployee);
			
			
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
			?>
				
			<!-- Show old info -->
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
			
				$employeeTitle = new EmployeeTitle();
				$employeeWorkHistory = new EmployeeWorkHistory();			
				
				// Display current info of employee from table "employeeworkhistory" 
				$dbEmployeeWorkHistory = new Database();
				$dbEmployeeWorkHistory->connect();
				
				// note: in query we use data, selected by user
				$queryEmployeeWorkHistory=
				"SELECT e.employeeid, e.branchid, e.startdate, e.lastdate, e.titleid, t.titlename, e.salary  
				 FROM   employeeworkhistory e, employeetitle t	
				 WHERE  e.employeeid=$selectedEmployee AND e.lastdate='0000-00-00' AND t.titleid=e.titleid";						
											
				$dbEmployeeWorkHistory->query($queryEmployeeWorkHistory);
				
				//Put results of query 1 into table on the screen
				for($count=0;$count<$dbEmployeeWorkHistory->queryResultsCount;$count=$count+1)
				{
					$row=mysql_fetch_array($dbEmployeeWorkHistory->queryResultsResource);	
					$employeeWorkHistory->initializeEmployeeWorkHistory($row);
					$employeeWorkHistory->displayEmployeeWorkHistory2();
					$employeeTitle->initializeEmployeeTitle($row);
					$employeeTitle->displayEmployeeTitleName();	
					$employeeWorkHistory->displayEmployeeWorkHistorySalary();								
				}
				// save current values
				$branchIDCurrent=$row[branchid];	
				$startDateCurrent=$row[startdate];	
				$lastDateCurrent=$row[lastdate];
				$titleIDCurrent=$row[titleid];	
				$titleNameCurrent=$row[titlename];			
				$salaryCurrent=$row[salary];											
			
				$dbEmployeeWorkHistory->close();
			
			?>
	
			</table>
			<P></P>	
<?php 				
			
				// find title id from title name
			
				/*
				$dbEmployeeTitleID = new Database();
				$dbEmployeeTitleID->connect();
				
				// note: in query we use data, selected by user
				$queryEmployeeTitleID=
				
				"SELECT titleid  
				 FROM   employeetitle	
				 WHERE  titlename=$titleNameNew";					
											
				$dbEmployeeTitleID->query($queryEmployeeTitleID);
				
				for($count=0;$count<$dbEmployeeTitleID->queryResultsCount;$count=$count+1)
				{
					$row=mysql_fetch_array($dbEmployeeTitleID->queryResultsResource);	
					$employeeTitle->initializeEmployeeTitle($row);
				}
				// save values
				$titleIDNew=$row[titleid];
					
				$dbEmployeeTitleID->close();
				*/
				
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
				
				// put "last date" for old title
				$dbEmployeeTitleOld = new Database();
				$dbEmployeeTitleOld->connect();
				
				// note: in query we use data, selected by user
				$queryEmployeeTitleOld=
				
				"UPDATE employeeworkhistory 
				 SET    lastdate = CURDATE()
				 WHERE  employeeid=$selectedEmployee AND lastdate='0000-00-00'";				

				$dbEmployeeTitleOld->query($queryEmployeeTitleOld);
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
									
				$dbEmployeeTitleNew->query($queryEmployeeTitleNew);
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
				
				$dbEmployeeUpdate->query($queryEmployeeUpdate);
				$dbEmployeeUpdate->close();
				// end update branch/title/salary in employee table	
				
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
