<?php
require_once 'includes/model/PostalCodes.Class.php';
class Address{
	private $addressID;
	private $streetNumber;
	private $street;
	public $postalCode;
	
	
	public function getAddressID()
	{
	        return $this->addressID;
	}

	public function getStreetNumber()
	{
	        return $this->streetNumber;
	}
	public function getStreet()
	{
	        return $this->street;
	}
	public function getPostalCode()
	{
	        return $this->postalCode;
	}
	
	public function setAddressID($addressIDIn)
	{
        $this->addressID=$addressIDIn;
	}

	public function setStreetNumber($streetNumberIn)
	{
        $this->streetNumber=$streetNumberIn;
	}
	public function setStreet($streetIn)
	{
        $this->street=$streetIn;
	}

	public function setPostalCode($row)
	{
		//echo "Setting and creating a postal code object: ".$row[postalcodes];
		//print_r($row);
		$this->postalCode = new PostalCodes();
		$this->postalCode->initializePostalCodes($row);
	}
	
	
	/*
	 * Takes any adressId and puts all the appropriate values into the address object it is called on.
	 *   Used by: all objects that have an addressId and need to get an address object, eg, Branch, Employee, Client
	 * 
	 * It uses the variable "queryFirstResult" from the db object, which is essentially the first row 
	 * hopefully in this case, the only row.
	 */
	public function initializeAddress($addressIdIn)
	{
		//echo "Initialising an address object for: ".$addressIdIn;
		$dbForAddress = new Database();
		$dbForAddress->connect();
		$queryToDo= "SELECT DISTINCT * FROM address	WHERE addressid=".$addressIdIn;
		$dbForAddress->query($queryToDo);
		/* 
		 * put the results into the object
		 */
		//print_r($dbForAddress->queryFirstResult);
		$this->streetNumber=$dbForAddress->queryFirstResult[streetnumber];
		$this->setStreet($dbForAddress->queryFirstResult[street]);
		$this->addressID=$dbForAddress->queryFirstResult[addressid];
		$this->country="Canada";
		$this->appartmentNumber="";
		/*
		 * do the postalcode object 
		 */
		//$this->streetName=$dbForAddress->queryFirstResult[streetname];
		//$this->city=$dbForAddress->queryFirstResult[city];
		//$this->province=$dbForAddress->queryFirstResult[province];
		$postalcodeString=$dbForAddress->queryFirstResult[postalcode];
		$queryToDo= "SELECT DISTINCT * FROM postalcodes	WHERE postalcodes='".$postalcodeString."'";
		$dbForAddress->query($queryToDo);
		$dbForAddress->close();//just closes the connection to the db so that some other object can connect. the 
					//db object is still alive and contains the results. 
		$postalCodeRow=$dbForAddress->queryFirstResult;
		$this->setPostalCode($postalCodeRow);
	}
	public function displayStreet()
	{
		echo '	<TD>'.$this->street.'</TD>';		
	}
	
	public function displayAddress()
	{
		echo '<p>'.$this->streetNumber." ".
		$this->getStreet()." <br/>".
		$this->postalCode->getCity()."<br/>".
		$this->postalCode->getProvince()." ".
		$this->postalCode->getPostalCodes()."</p>";
	}
	
	public function __construct()
	{
		//echo "Creating an Address object";
	}
	
	public function initializeAddressZ($row)
	{
		// in the line ($row[addressid]), parameter name [] from db table
		$this->setAddressID($row[addressid]);
		$this->setStreetNumber($row[streetnumber]);
		$this->setStreet($row[street]);
		$this->setPostalCode($row[postalcode]);	
	}
	
	public function initializeProvinceCityStreet($row)
	{
		// in the line ($row[]), parameter name [] from db table
		$this->setAddressID($row[addressid]);
		$this->setStreetNumber($row[streetnumber]);
		$this->setStreet($row[street]);
		$this->setPostalCode($row[postalcode]);		
	}	

	public function displayStreetNumber()
	{
		echo '<TD class="tableDataLeftC">'.$this->streetNumber.'</TD>';		
	}	

	public function PostalCodesList()
	{
?>
		<!-- Build dynamic list of postal codes -->
		<table border="1"> 
			<tr><td width="180">Select postal code:</td><td width="180">
				<select name="choicePostalCode">
				
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
				
				</select>
			</td></tr>
		</table>
		<!-- End Build dynamic list of postal codes -->
<?php 		
	} // end public function PostalCodesList()		
	
	
	
}
?>