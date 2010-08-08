<?php
require_once 'includes/model/PostalCodes.Class.php';
class Address{
	private $addressID;
	private $appartmentNumber;
	private $streetNumber;
	private $street;
	private $postalCode;
	private $country;


	public function getAddressID(){
		return $this->addressID;
	}
	public function getStreetNumber(){
		return $this->streetNumber;
	}
	public function getStreet(){
		return $this->street;
	}
	/*
	 * Accessors having to do with the postal code information
	 */
	public function getPostalCodeObject(){
		return $this->postalCode;
	}
	public function getPostalCode(){
		return $this->postalCode->getPostalCodes();
	}
	public function getCity(){
		return $this->postalCode->getCity();
	}
	public function getProvince(){
		return $this->postalCode->getProvince();
	}
	
	
	public function setAddressID($addressIDIn){
		$this->addressID=$addressIDIn;
	}
	public function setStreetNumber($streetNumberIn){
		$this->streetNumber=$streetNumberIn;
	}
	public function setStreet($streetIn){
		$this->street=$streetIn;
	}
	/*
	 * Map setCity, setProvince, setPostalCode through functions in the address class
	 * to make using an address easy to do with out knowing that it uses PostalCode class
	 */
	public function setCity($cityIn){
		$this->postalCode->setCity($cityIn);
	}
	public function setProvince($provinceIn){
		$this->postalCode->setProvince($provinceIn);
	}
	public function setPostalCodeString($postalcodestring){
		$this->postalCode->setPostalCodes($postalcodestring);
	}
	public function setPostalCode($row){
		$this->postalCode = new PostalCodes();
		$this->postalCode->initializePostalCodes($row);
	}
	public function setPostalCodeFromObject($postalCodeObject){
		$this->postalCode=$postalCodeObject;
	}


	/*
	 * Takes any adressId and puts all the appropriate values into the address object it is called on.
	 *   Used by: all objects that have an addressId and need to get an address object, eg, Branch, Employee, Client
	 *
	 * It uses the variable "queryFirstResult" from the db object, which is essentially the first row
	 * hopefully in this case, the only row.
	 */
	public function initializeAddress($addressIdIn){
		//echo "Initialising an address object for: ".$addressIdIn;
		$dbForAddress = new Database();
		$dbForAddress->connect();
		$queryToDo= "SELECT DISTINCT * 
			FROM address a, postalcodes p	
			WHERE p.postalcodes=a.postalcode AND a.addressid=".$addressIdIn;
		$dbForAddress->query($queryToDo);
		$dbForAddress->close();
		/*
		 * put the results into the object
		 */	
		$this->initializeAddressFromRow($dbForAddress->queryFirstResult);
	}
	public function initializeAddressFromRow($row){
		$this->streetNumber=$row[streetnumber];
		$this->setStreet($row[street]);
		$this->addressID=$row[addressid];
		$this->country="Canada";
		$this->appartmentNumber="";
		$this->setCity($row[city]);
		$this->setProvince($row[province]);
		$this->setPostalCodeString($row[postalcode]);
	}
	public function saveToDatabase(){
		$postalcodeSuccess=$this->postalCode->saveToDatabase();
		$dbForAddressInsert = new Database();
		$dbForAddressInsert->connect();
		$addressInsertQuery= "INSERT INTO address (streetnumber,street,postalcode)
			VALUES ('$this->streetNumber','$this->street','".$this->postalCode->getPostalCodes()."')";
		//echo $addressInsertQuery;
		$addresSuccess=$dbForAddressInsert->updateInsert($addressInsertQuery);
		$dbForAddressInsert->close();
		return $addresSuccess.$postalcodeSuccess;
	}
	public function emptyIt(){
		$this->streetNumber="0";
		$this->setStreet("");
		$this->addressID="0";
		$this->country="";
		$this->appartmentNumber="";
		$this->setStreet("");
		$this->setCity("");
		$this->setProvince("");
		$this->setPostalCodeString("");
	}
	public function displayAddress(){
		echo '<p>'.$this->streetNumber." ".
		$this->getStreet()." <br/>".
		$this->getCity().", ".
		$this->getProvince()." ".
		$this->getPostalCode()."</p>";
	}
	public function displayAddressInARow(){
		echo"<tr>
		<td>".$this->streetNumber."</td>
		<td>".$this->getStreet()."</td>
		<td>".$this->getCity()."</td>
		<td>".$this->getProvince()."</td>
		<td>".$this->getPostalCode()."</td>
		</tr>";
	}

	public function __construct(){
		//set the default address to 
		$this->postalCode = new PostalCodes();
		$this->streetNumber="1455";
		$this->setStreet("deMaisonneuve West");
		$this->addressID="10000315";
		$this->country="Canada";
		$this->appartmentNumber="";
		$this->setCity("Montreal");
		$this->setProvince("Quebec");
		$this->setPostalCodeString("H3G-1M8");
	}
	public function PostalCodesList()
	{
		?>
		<!-- Build dynamic list of postal codes -->
		<table border="1">
			<tr>
				<td width="180">Select postal code:</td>
				<td width="180"><select name="choicePostalCode">
		
				<?php
		
				//Build dynamic selection list
				$dbSelectPostalCode = new Database();
				$dbSelectPostalCode->connect();
					
				$querySelectPostalCode="SELECT DISTINCT postalcodes
											   		FROM postalcodes";
		
				$dbSelectPostalCode->query($querySelectPostalCode);
				$result = $dbSelectPostalCode->query($querySelectPostalCode);
					
				//Put results of query into dynamic list
				for($count=0;$count<$dbSelectPostalCode->queryResultsCount;$count=$count+1)
				{
					$row=mysql_fetch_array($dbSelectPostalCode->queryResultsResource);
					extract($row);
					echo "<option value='$postalcodes'>$postalcodes</option>";
		
				}//endl if to only print when there are any results
				echo "</select>\n";
				$dbSelectPostalCode->close();
				?>
		
				</select></td>
			</tr>
		</table>
		<!-- End Build dynamic list of postal codes -->
		<?php
	} // end public function PostalCodesList()		
	/* This function is needed in Add Employee class. 
	 * User enter postal code and from it I find province, city, street*/
	public function initializeProvinceCityStreet($row)
	{
		// in the line ($row[]), parameter name [] from db table
		$this->setProvince($row[province]);
		$this->setCity($row[city]);
		$this->setStreet($row[street]);
	}	

	/* This function is needed in Add Employee class. 
	 * User enter postal code and from it I find province, city, street*/
	public function findProvinceCityStreet($employeePostalCode)
	{
			//find province, city from postal code
			$dbSelectProvinceCityStreet = new Database();
			$dbSelectProvinceCityStreet->connect();
							
			$querySelectProvinceCityStreet="SELECT DISTINCT province, city, street 
							   				FROM postalcodes, address
							   				WHERE postalcodes='$employeePostalCode' AND
							   				postalcode=postalcodes";
														
			$dbSelectProvinceCityStreet->query($querySelectProvinceCityStreet);	
			$result = $dbSelectProvinceCityStreet->query($querySelectProvinceCityStreet);						
										   
			for($count=0;$count<$dbSelectProvinceCityStreet->queryResultsCount;$count=$count+1)
			{
				$row=mysql_fetch_array($dbSelectProvinceCityStreet->queryResultsResource);
				$this->initializeProvinceCityStreet($row);
			}

			$dbSelectProvinceCityStreet->close();	
	} // end public function findProvinceCityStreet($employeePostalCode)		

}
?>