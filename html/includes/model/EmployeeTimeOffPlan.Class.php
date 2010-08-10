<?php
//require_once('includes/controller/Database.Class.php');

class EmployeeTimeOffPlan{
	private $timeOffID;
	private $timeOffName;
	private $numberOfDays;	
	
	private $employeeID;	
	private $reason;	
	private $startDate;	
	private $returnDate;	
	private $availableDays;	
	

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
	
	
	
	public function getEmployeeID() 
	{
		return $this->employeeID;
	}
	
	public function getReason() 
	{
		return $this->reason;
	}

	public function getStartDate()
	{
		return $this->startDate;
	}
	
	public function getReturnDate()
	{
		return $this->returnDate;
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
	
	
	public function setEmployeeID($employeeIDIn) 
	{
		$this->employeeID=$employeeIDIn;
	}
	
	public function setReason($reasonIn) 
	{
		$this->reason=$reasonIn;
	}	
	
	public function setStartDate($startDateIn) 
	{
		$this->startDate=$startDateIn;
	}	

	public function setRerurnDate($returnDateIn) 
	{
		$this->returnDate=$returnDateIn;
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
	
	
	function displayEmployeeTimeOffPlan()
	{
		echo "<h4> Time off plan ID: $this->timeOffID</h4>\n";
		echo "<h4> Time off plan name: $this->timeOffName</h4>\n";	
		echo "<h4> Number of allowed days off: $this->numberOfDays</h4>\n";				
	}	

	public function initializeEmployeeTimeOffPlan($row)
	{
		// in the line ($row[]), parameter name [] from db table
		$this->setTimeOffID($row[timeoffid]);
		$this->setTimeOffName($row[timeoffname]);
		$this->setNumberOfDays($row[numberofdays]);	
	}	
	
	public function initializeEmployeeTimeOffPlanID($row)
	{
		// in the line ($row[]), parameter name [] from db table
		$this->setTimeOffID($row[timeoffid]);
	}		
	
	public function initializeEmployeeTimeOff($row)
	{
		// in the line ($row[]), parameter name [] from db table
		$this->setEmployeeID($row[employeeid]);
		$this->setReason($row[reason]);
		$this->setStartDate($row[startdateoff]);
		$this->setRerurnDate($row[dayreturntowork]);	
	}		
	
	public function displayEmployeeTimeOffName()
	{
		echo '<TD class="tableDataRightC">'.$this->timeOffName.'</TD>';		
	}

	public function displayEmployeeTimeOff()
	{
		echo'<TR class="bgcoloroption1">
			<TD class="tableDataLeftC">'.$this->employeeID.'</TD>
			<TD class="tableDataRightC">'.$this->reason.'</TD>
			<TD class="tableDataRightC">'.$this->startDate.'</TD>	
			<TD class="tableDataRightC">'.$this->returnDate.'</TD>				
		</TR>';				
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

	
	public function findEmployeeTimeOff($selectedEmployee)
	{
		
?>
		<!-- Show employee time off history -->
		<table width="100%" border="1" cellpadding="3" cellspacing="1">
		<tr>
			<td>
			Employee ID
			</td>
			<td>
			Reason
			</td>
			<td>
			Start date off
			</td>
			<td>
			Date return to work
			</td>
		</tr>
		
		<?php
			
			// Show employee time off history
			$dbEmployeeTimeOff = new Database();
			$dbEmployeeTimeOff->connect();
			
			// note: in query we use data, selected by user
			$queryEmployeeTimeOff=
			"SELECT employeeid, reason, startdateoff, dayreturntowork  
			 FROM   employeetimeoffhistory	
			 WHERE  employeeid=$selectedEmployee";
										
			$dbEmployeeTimeOff->query($queryEmployeeTimeOff);
			
			//Put results of query 1 into table on the screen
			for($count=0;$count<$dbEmployeeTimeOff->queryResultsCount;$count=$count+1)
			{
				$row=mysql_fetch_array($dbEmployeeTimeOff->queryResultsResource);	
				$this->initializeEmployeeTimeOff($row);
				$this->displayEmployeeTimeOff();
			}
			$dbEmployeeTimeOff->close();
		?>
		</table>
		<P></P>		

<?php 		

	}// end public function findEmployeeTimeOff()	
	
	public function findEmployeeTimeOffPlan($selectedEmployee)
	{
		//Show employee time off plan 

		$dbEmployeeTimeOffPlan = new Database();
		$dbEmployeeTimeOffPlan->connect();
			
		// note: in query we use data, selected by user
		$queryEmployeeTimeOffPlan=
		"SELECT p.timeoffid, p.timeoffname, p.numberofdays  
		 FROM   employeetimeoffplan p, employee e	
		 WHERE  e.employeeid=$selectedEmployee AND e.timeoffid=p.timeoffid";
										
		$dbEmployeeTimeOffPlan->query($queryEmployeeTimeOffPlan);
			
		//Put results of query 1 into table on the screen
		for($count=0;$count<$dbEmployeeTimeOffPlan->queryResultsCount;$count=$count+1)
		{
			$row=mysql_fetch_array($dbEmployeeTimeOffPlan->queryResultsResource);	
			$this->initializeEmployeeTimeOffPlanID($row);
			//$this->displayEmployeeTimeOffPlan();
		}
		$dbEmployeeTimeOffPlan->close();

	}// end public function findEmployeeTimeOffPlan()	

	
		public function findTimeOffPlanID($employeeTimeOffPlan)
	{
		// find time off plan id from title name
	
		$dbEmployeeTimeOffPlanID = new Database();
		$dbEmployeeTimeOffPlanID->connect();
				
		// note: in query we use data, selected by user
		$queryEmployeeTimeOffPlanID=
				
		"SELECT timeoffid  
		 FROM   employeetimeoffplan	
		 WHERE  timeoffname='$employeeTimeOffPlan'";					
											
		$dbEmployeeTimeOffPlanID->query($EmployeeTimeOffPlanID);
				
		for($count=0;$count<$dbEmployeeTimeOffPlanID->queryResultsCount;$count=$count+1)
		{
			$row=mysql_fetch_array($dbEmployeeTimeOffPlanID->queryResultsResource);	
			$this->initializeEmployeeTimeOffPlanID($row);
		}
		
		$dbEmployeeTimeOffPlanID->close();
			
	} // end public function findTitleID()		
	

}
?>

