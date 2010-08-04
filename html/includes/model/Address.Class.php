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
		$db = new Database();
		$db->connect();
		$queryToDo= "SELECT DISTINCT * FROM address	WHERE addressid=".$addressIdIn;
		$db->query($queryToDo);
		/* 
		 * put the results into the object
		 */
		$this->streetNumber=$db->queryFirstResult[streetnumber];
		$this->addressID=$db->queryFirstResult[addressid];
		$this->country="Canada";
		$this->appartmentNumber="";
		/*
		 * do the postalcode object 
		 */
		//$this->streetName=$db->queryFirstResult[streetname];
		//$this->city=$db->queryFirstResult[city];
		//$this->province=$db->queryFirstResult[province];
		$postalcodeString=$db->queryFirstResult[postalcode];
		$queryToDo= "SELECT DISTINCT * FROM postalcodes	WHERE postalcodes=".$postalcodeString;
		$db->query($queryToDo);
		$db->close();//just closes the connection to the db so that some other object can connect. the 
					//db object is still alive and contains the results. 
		$this->setPostalCode($db->queryFirstResult);
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