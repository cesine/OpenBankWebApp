<?php 
require_once 'includes/model/Address.Class.php';
class Branch{
	private $branchName;
	private $openingHours;
	private $managerName;
	private $managerId;
	private $openingDate;
	private $branchClientId;
	private $address;
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
	public function setManagerNameFromId($manageridIn){
		//echo "Setting Manager name from ID, getting id from object, then querying DB";
		$db = new Database();
		$db->connect();
		$queryToDo= "SELECT DISTINCT firstname,lastname FROM employee e	WHERE e.employeeid=".$manageridIn;
		$db->query($queryToDo);
		$db->close();
		//$db->query("SELECT * FROM branch",$db->link_id);
		/*
		 * Loop through the results (there should only be one result)
		 * 
		 * 		access the results via the function mysql_fetch_array() which will turn the results into an array 
		 */
		//print_r($db->queryResults); //debuging, print out the array to find the element you need
		$this->managerName=$db->queryFirstResult[firstname]." ".$db->queryFirstResult[lastname];
		//echo $this->managerName;
		
	}
	
	public function setManagerId($managerIdIn){
		$this->managerId=$managerIdIn;
	}
	public function setOpeningDate($openingDateIn){
		$this->openingDate=$openingDateIn;
	}
	public function initializeBranch($row){
		
		$this->setManagerId($row[managerid]);
		$this->setManagerNameFromId($row[managerid]);//note: the name takes the managerid as a parameter,as long as you have the managerid it will work
		$this->setOpeningDate($row[openingdate]);
		$this->setOpeningHours($row[openinghours]);
		$this->branchClientId=$row[branchsclientid];
		
		/*
		 * get branch name and address from its client row, in the client table
		*/
		$db = new Database();
		$db->connect();
		$queryToDo= "SELECT DISTINCT firstname, addressid FROM client WHERE clientid=".$this->branchClientId;
		$db->query($queryToDo);
		$db->close();//just closes the connection to the db so that some other object can connect. the 
					//db object is still alive and contains the results. 
		$this->branchName=$db->queryFirstResult[firstname];
		$this->address = new Address();
		$this->address->initializeAddress($db->queryFirstResult[addressid]);
		//$this->address->displayAddress();
	}
	
	public function test(){
		echo 'Testing the branch functionalities.<p>';
		$this->setBranchName("Mcgill Street");
		$this->setManagerId(20000005);
		$this->setManagerName(2);
		$this->setManagerNameFromId(20000005);
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
		//print_r($db->queryFirstResult);	//this prints an array, namely the array which was put into the database object's queryFirstResult variable
		$db->close();//this closes the dtabase link connection
	}
	public function displayBranch(){
		echo '<h3>'.$this->branchName.
		'</h3><p><b>Branch Manager: </b>'.$this->managerName.'</p>';
		echo $this->address->displayAddress().
		'<p><b>Branch Opening Hours</b></p><p>'.$this->openingHours.
		'</p>';
	}
	public function __construct(){
		$this->address = new Address();
	}
	public function __destruct() {
       //print "Destroying " . $this->branchName . "\n";
   }
   public function displayBranchMap(){
   		$postalcode=$this->address->getPostalCode();
   			//display map to address
		echo"
		<iframe width='425' height='350' frameborder='0' scrolling='no' 
		marginheight='0' marginwidth='0' 
		src='http://maps.google.com/maps?&amp;q=$postalcode+Canada&amp;output=embed'></iframe><br /><small>
		<a href='http://maps.google.com/maps?&amp;q=$postalcode+Canada&amp;source=embed' 
		style='color:#0000FF;text-align:left'>View Larger Map</a></small>
		";
   }
   public function BranchList() 
	{
?>
		<!-- Select branch to show -->
		<table border="1"> 
			<tr><td width="180">Select branch:</td><td width="180">
				<select name="choiceBranch">
				
				<?php 
				
					//Build dynamic selection list
					$dbSelectBrach = new Database();
					$dbSelectBrach->connect();
					
					$querySelectBrach="SELECT DISTINCT branchid 
									   FROM branch";
												
					$dbSelectBrach->query($querySelectBrach);	
					$result = $dbSelectBrach->query($querySelectBrach);						
								   
					//Put results of query into dynamic list
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
		<!-- End select branch to show -->
<?php 		
		
    }  // end public function BranchList() 
	
}
?>