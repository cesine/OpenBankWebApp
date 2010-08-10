<?php

class EmployeeTitle{
	private $titleID;
	private $titleName;
	private $baseSalary;	

	public function getTitleID() 
	{
		return $this->titleID;
	}
	
	public function getTitleName() 
	{
		return $this->titleName;
	}

	public function getBaseSalary()
	{
		return $this->baseSalary;
	}
	
	
	public function setTitleID($titleIDIn) 
	{
		$this->titleID=$titleIDIn;
	}
	
	public function setTitleName($titleNameIn) 
	{
		$this->titleName=$titleNameIn;
	}	
	
	public function setBaseSalary($baseSalaryIn) 
	{
		$this->baseSalary=$baseSalaryIn;
	}	

	
	function displayEmployeeTitleInRowFormatted()
	{
		
		echo '
		<TR class="bgcoloroption1">
			<TD class="tableDataLeftC">'.$this->titleID.'</TD>
			<TD class="tableDataRightC">'.$this->titleName.'</TD>
			<TD class="tableDataRightC">'.$this->baseSalary.'</TD>	
		</TR>';		
	}

	public function initializeEmployeeTitle($row)
	{
		// in the line ($row[]), parameter name [] from db table
		$this->setTitleID($row[titleid]);
		$this->setTitleName($row[titlename]);
		$this->setBaseSalary($row[basesalary]);	
	}

	
	public function initializeEmployeeTitleID($row)
	{
		// in the line ($row[]), parameter name [] from db table
		$this->setTitleID($row[titleid]);
	}
			
	
	public function displayEmployeeTitleName()
	{
		echo '<TD class="tableDataRightC">'.$this->titleName.'</TD>';		
	}	
	
	public function displayEmployeeTitleList()
	{
?>
		<!-- Build dynamic list of employee title names -->
		<table border="1"> 
			<tr><td width="180">Select title name:</td><td width="180">
				<select name="choiceTitle">
				
				<?php 
				
					//Build dynamic selection list
					$dbSelectTitle = new Database();
					$dbSelectTitle->connect();
					
					$querySelectTitle="SELECT DISTINCT titlename 
									   FROM employeetitle";
												
					$dbSelectTitle->query($querySelectTitle);	
					$result = $dbSelectTitle->query($querySelectTitle);						
								   
					//Put results of query into dynamic list
					for($count=0;$count<$dbSelectTitle->queryResultsCount;$count=$count+1)
					{
						$row=mysql_fetch_array($dbSelectTitle->queryResultsResource);
						extract($row);
						echo "<option value='$titlename'>$titlename</option>";
					
					}//endl if to only print when there are any results
					echo "</select>\n";	
					$dbSelectTitle->close();
				?>
				
				</select>
			</td></tr>
		</table>
		<!-- End Build dynamic list of employee title names -->
<?php 		
	} // end public function displayEmployeeTitleList()	
	
	
	public function findTitleID($titleNameNew)
	{
		// find title id from title name
	
		$dbEmployeeTitleID = new Database();
		$dbEmployeeTitleID->connect();
				
		// note: in query we use data, selected by user
		$queryEmployeeTitleID=
				
		"SELECT titleid  
		 FROM   employeetitle	
		 WHERE  titlename='$titleNameNew'";					
											
		$dbEmployeeTitleID->query($queryEmployeeTitleID);
				
		for($count=0;$count<$dbEmployeeTitleID->queryResultsCount;$count=$count+1)
		{
			$row=mysql_fetch_array($dbEmployeeTitleID->queryResultsResource);	
			$this->initializeEmployeeTitleID($row);
		}
		
		$dbEmployeeTitleID->close();
			
	} // end public function findTitleID()		
				
	
	public function EmployeeTitleBaseSalary($employeeTitle)
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
			$this->initializeEmployeeTitle($row);		
		}
		$dbSelectBaseSalary->close();
	} // end public function EmployeeTitleBaseSalary()
		
}
?>

