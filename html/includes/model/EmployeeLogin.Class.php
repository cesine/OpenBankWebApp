
<?php 
class EmployeeLogin{
	private $ID;
	private $login;

	public function getID() 
	{
		return $this->ID;
	}
	
	public function getLogin() 
	{
		return $this->login;
	}
	
	
	public function setID($IDIn) 
	{
		$this->ID=$IDIn;
	}
	
	public function setLogin($loginIn) 
	{
		$this->login=$loginIn;
	}	
	

	
	function displayEmployeeLoginFormatted()
	{
		
		echo '
		<TR class="bgcoloroption1">
			<TD class="tableDataLeftC">'.$this->ID.'</TD>
			<TD class="tableDataRightC">'.$this->login.'</TD>
		</TR>';		
	}

	public function initializeEmployeeLogin($row)
	{
		// in the line ($row[]), parameter name [] from db table
		$this->setID($row[employeeid]);
		$this->setLogin($row[passwd]);
	}
