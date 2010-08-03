<?php 

session_start();
include('includes/model/Employee.Class.php');
include('includes/controller/Database.Class.php');
echo "<h5> Please log in. </h5>\n";
echo "<form action='?&content=EmployeeLogin' method='POST'>";

?>

<form>

	<table width="240" border="0" align="center" cellpadding="1" cellspacing="3">
	
		<tr>
		
			<td class="fieldTitleLeftB">Employee ID:</td>
			<td><input type="text" name="EmployeeID" size="20" maxlength="8" value=""/></td>
			
		</tr>
	
		<tr>
			<td valign="middle">&nbsp;</td>
			<td height="35" valign="middle">
			<input type="submit" name="EmployeeIDSubmit" value="Login" />
			</td>
		</tr>
	
	</table>

</form>

<?php 

$EmployeeID=$_POST["EmployeeID"]; 							// read employee ID from user input

//if login button is pressed:
if (isset($_POST["EmployeeIDSubmit"]))
{
	echo "<h4> User press login button. </h4>\n";

	//to check if employee ID is provided:
    if($EmployeeID == '')
    {	
    	echo '<p class="err_mess">Please, provide employee ID.</p>';
    }
	else
	{
		//to check if employee ID exist in DB 
		$dbCheckEmployeeID = new Database();
		$dbCheckEmployeeID->connect();
		
		$queryCheckEmployeeID="SELECT DISTINCT $EmployeeID 
							   FROM employee";
									
		$dbCheckEmployeeID->query($queryCheckEmployeeID);	
		$result = $dbCheckEmployeeID->query($queryCheckEmployeeID);

		$count = $dbCheckEmployeeID->queryResultsCount;
		echo "<h4> Count = $count. </h4>\n";		
				
		$row=mysql_fetch_array($dbCheckEmployeeID->queryResultsResource);	
		echo "<h4> Number of rows = $row. </h4>\n";						

		
		if($row==1)
		{
			echo "<h4> Employee found in DB. </h4>\n";
		}
		else
		{
			echo "<h4> Employee ID: $EmployeeID doesn't exist in DB !</h4>\n";			
		}
	}
} // end if (isset($_POST['EmployeeIDSubmit']))

?>