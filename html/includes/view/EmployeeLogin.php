<?php 

session_start();

include('includes/model/Employee.Class.php');
include('includes/controller/Database.Class.php');

//echo '<div>';
//$transactionToDisplay = new Transaction();
//echo '</div>';

//if login button is pressed:
if (isset($_POST['EmployeeIDSubmit']))
{
	//to check if employee ID is provided:
    if(($_POST['EmployeeID'] == ''))
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

		if(($dbCheckEmployeeID->queryResultsCount)==1)
		{
			echo "<h4> Employee found in DB. </h4>\n";
		}
		else
		{
			echo "<h4> Employee ID: $EmployeeID not exist in DB !</h4>\n";			
		}
	}
} // end if (isset($_POST['EmployeeIDSubmit']))

?>

<p></p>
<?php 
echo "<h5> Please log in. </h5>\n";
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