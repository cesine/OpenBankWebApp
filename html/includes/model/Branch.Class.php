<?php 
class Branch{
	private $branchName;
	private $openingHours;
	private $managerName;
	private $managerId;
	private $openingDate;
	private static $sqlTableName="branch";
	private static $sqlTableAttributes;


	public function getTableName() {
		return $this->sqlTableName;
	}
	public function getBranchName() {
		return $this->branchName;
	}
	public function getOpeningHours(){
		return $this->openingHours;
	}
	public function getManagerName(){
		return $this->managerName;
	}
	public function getManagerId(){
		return $this->managerId;
	}
	public function getOpeningDate(){
		return $this->openingDate;
	}
	public function setSqlTableName($sqlTNameIn) {
		$this->sqlTablesName=$sqlTNameIn;
	}
	public function setBranchName($branchNameIn) {
		$this->branchName=$branchNameIn;
	}
	public function setOpeningHours($openingHoursIn){
		$this->openingHours=$openingHoursIn;
	}
	public function setManagerName($managerNameIn){
		$this->managerName=$managerNameIn;
	}
	public function setManagerNameFromId(){
		echo "Setting Manager name from ID, getting id from object, then querying DB";
		$db = new Database();
		$db->connect();
		$queryString= "SELECT DISTINCT firstname,lastname FROM employee e	WHERE e.employeeid=20000005";
		$db->query($queryString);
		//$db->query("SELECT * FROM branch",$db->link_id);
		/*
		 * Loop through the results (there should only be one result)
		 * 
		 * 		access the results via the function mysql_fetch_array() which will turn the results into an array 
		 */
		print_r($db->queryResults); //debuging, print out the array to find the element you need
		$this->managerName=$db->queryResults[firstname]." ".$db->queryResults[lastname];
		//echo $this->managerName;
		
	}
	
	public function setManagerId($managerIdIn){
		$this->managerId=$managerIdIn;
	}
	public function setOpeningDate($openingDateIn){
		$this->openingDate=$openingDateIn;
	}
	
	function test(){
		echo 'Testing the branch functionalities.<p>';
		$this->setBranchName("Mcgill Street");
		$this->setManagerId(2);
		$this->setManagerName(2);
		$this->setManagerNameFromId();
		$this->setOpeningDate("1992-01-01");
		$this->setOpeningHours("Monday-Friday<br> 8am to 3pm");
		$this->displayBranch();
		
		
		echo 'Testing the database connection.';
		echo DB_USER; //this is a constant set by the configMySql file, if the word "openbank" appears
						// it means that the config file was sucessfully included. 
		$db = new Database();//this creates a database object
		$dbConnectionNumber = $db->connect(); //this attempts to create a connection the datbase and puts the connection's 
												//number into $dbConnectionNumber
		$db->query("SELECT * FROM branch");//this sends the query to the database on the database object's link number
		print_r($db->queryResults);	//this prints an array, namely the array which was put into the database object's queryResults variable
		$db->close();//this closes the dtabase link connection
	}
	function displayBranch(){
		echo '<p class="name">'.$this->branchName.
		'</b><p><b>Branch Manager:</b>'.$this->managerName.
		'</p><p>'.$this->openingHours.
		'</p>';
	}
	function __construct(){
		echo 'Creating a branch. Change somethings';
		$this->branchName ="Metro Mcgill";
	}
	
}
?>