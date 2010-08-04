<?php
require_once 'includes/model/PostalCodes.Class.php';
class Address{
	private $addressID;
	private $streetNumber;
	private $postalCode;
	
	
	public function getAddressID()
	{
	        return $this->addressID;
	}

	public function getStreetNumber()
	{
	        return $this->streetNumber;
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
	
	public function displayAddress()
	{
		echo '<p>'.$this->streetNumber." ".
		$this->postalCode->getStreet()." <br/>".
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
		$this->setPostalCode($row[postalcode]);	
	}

	public function displayStreetNumber()
	{
		echo '<TD class="tableDataLeftC">'.$this->streetNumber.'</TD>';		
	}		
}
?>