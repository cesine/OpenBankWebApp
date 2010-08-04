<?php 
session_start();
include('includes/model/Employee.Class.php');
include('includes/model/Branch.Class.php');
include('includes/controller/Database.Class.php');
include ('includes/view/employeetopmenu.php');  
echo "<form action='?&content=ViewEmployeeInfo&topMenu=EmployeeTopMenu' method='POST'>";
?>

<p></p>

<?php 
echo "<h4> View employee info. </h4>\n";
?>

<p></p>

<!-- Choose information to show -->
<table border="1"> 
	<tr><td width="180">Select option to show:</td><td width="180">
		<select name="choice1">
		
			<option value="personalInfo" selected>personal info</option>
			<option value="workHistory">work history</option>
			<option value="shedule">shedule</option>
			<option value="holidays">holidays</option>
		
		</select>
	</td></tr>
</table>

<p></p>

<!-- Choose branch to show -->
<table border="1"> 
	<tr><td width="180">Select option to show:</td><td width="180">
		<select name="choice2">
		
		<?php 
		
			/*Build dynamic selection list */
			$dbSelectBrach = new Database();
			$dbSelectBrach->connect();
			
			$querySelectBrach="SELECT DISTINCT branchid 
							   FROM branch";
										
			$dbSelectBrach->query($querySelectBrach);	
			$result = $dbSelectBrach->query($querySelectBrach);						
			
			/* Create form containing selection list */
			/*
			echo "<form action='?&content=Statement' method='POST'
						style='margin-left: 2em'>
				  <label for 'clientaccountid'
				  		 style='font-weight: bold'>Select account:</label>
				   <select ID='clientaccountid'	NAME='clientaccountid'	 					
						   style='margin-left: 3em'>\n";
			*/		

		   //echo "<select ID='branchid'	NAME='branchid'>\n";			
						   
			/*Put results of query into dynamic list*/
			for($count=0;$count<$dbSelectBrach->queryResultsCount;$count=$count+1)
			{
				$row=mysql_fetch_array($dbSelectBrach->queryResultsResource);
				extract($row);
				echo "<option value='$branchid'>$branchid</option>";
			
			}//endl if to only print when there are any results
			echo "</select>\n";	
			$dbSelectBrach->close();			
		
		
		?>
		
		</select>
	</td></tr>
</table>

