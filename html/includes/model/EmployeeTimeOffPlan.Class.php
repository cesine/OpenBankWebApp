<?php
require_once('includes/controller/Database.Class.php');

class EmployeeTimeOffPlan{
	private $timeOffID;
	private $timeOffName;
	private $numberOfDays;	

	public function getTimeOffID() 
	{
		return $this->timeOffID;
	}
	
	public function getTimeOffName() 
	{
		return $this->timeOffName;
	}

	public function getNumberOfDays()
	{
		return $this->numberOfDays;
	}
	
	
	public function setTimeOffID($timeOffIDIn) 
	{
		$this->timeOffID=$timeOffIDIn;
	}
	
	public function setTimeOffName($timeOffNameIn) 
	{
		$this->timeOffName=$timeOffNameIn;
	}	
	
	public function setNumberOfDays($numberOfDaysIn) 
	{
		$this->numberOfDays=$numberOfDaysIn;
	}	

	
	function displayEmployeeTimeOffPlanInRowFormatted()
	{
		
		echo '
		<TR class="bgcoloroption1">
			<TD class="tableDataLeftC">'.$this->timeOffID.'</TD>
			<TD class="tableDataRightC">'.$this->timeOffName.'</TD>
			<TD class="tableDataRightC">'.$this->numberOfDays.'</TD>	
		</TR>';		
	}

	public function initializeEmployeeTimeOffPlane($row)
	{
		// in the line ($row[]), parameter name [] from db table
		$this->setTimeOffID($row[timeoffid]);
		$this->setTimeOffName($row[timeoffname]);
		$this->setNumberOfDays($row[numberofdays]);	
	}	
	
	public function displayEmployeeTimeOffName()
	{
		echo '<TD class="tableDataRightC">'.$this->timeOffName.'</TD>';		
	}		
	
	public function displayEmployeeTimeOffPlanList()
	{
?>
		<!-- Build dynamic list of employee time off plans -->
		<table border="1"> 
			<tr><td width="180">Select time off plan name:</td><td width="180">
				<select name="choiceTimeOffPlan">
				
				<?php 
				
					//Build dynamic selection list
					$dbSelectTimeOffPlan = new Database();
					$dbSelectTimeOffPlan->connect();
					
					$querySelectTimeOffPlan="SELECT DISTINCT timeoffname 
									   FROM employeetimeoffplan";
												
					$dbSelectTimeOffPlan->query($querySelectTimeOffPlan);	
					$result = $dbSelectTimeOffPlan->query($querySelectTimeOffPlan);						
								   
					//Put results of query into dynamic list
					for($count=0;$count<$dbSelectTimeOffPlan->queryResultsCount;$count=$count+1)
					{
						$row=mysql_fetch_array($dbSelectTimeOffPlan->queryResultsResource);
						extract($row);
						echo "<option value='$timeoffname'>$timeoffname</option>";
					
					}//endl if to only print when there are any results
					echo "</select>\n";	
					$dbSelectTimeOffPlan->close();
				?>
				
				</select>
			</td></tr>
		</table>
		<!-- End Build dynamic list of employee time off plans -->
<?php 		
	} // end displayEmployeeTimeOffPlanList()	
}
?>

