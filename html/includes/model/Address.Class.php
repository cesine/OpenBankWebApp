<?php

class Address
{
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


	public function setPostalCode($postalCodeIn)
	{
	        $this->postalcode=$postalCodeIn;
	}
	
	
	/*
	 * Takes any adressId and puts all the appropriate values into the address object it is called on
	 * It uses the variable "queryFirstResult" from the db object, which is essentially the first row 
	 * hopefully in this case, the only row.
	 */
	
	/*
	public function initializeAddress($addressIdIn)
	{
		$db = new Database();
		$db->connect();
		$queryToDo= "SELECT DISTINCT * FROM address	WHERE addressid=".$addressIdIn;
		$db->query($queryToDo);
		$db->close();//just closes the connection to the db so that some other object can connect. the 
					//db object is still alive and contains the results. 
		/* 
		 * put the results into the object
		 */
		/*
		$this->streetName=$db->queryFirstResult[streetname];
		$this->streetNumber=$db->queryFirstResult[streetnumber];
		$this->city=$db->queryFirstResult[city];
		$this->addressID=$db->queryFirstResult[addressid];
		$this->province=$db->queryFirstResult[province];
		$this->country="Canada";
		$this->appartmentNumber="";
		$this->postalcode=$db->queryFirstResult[postalcode];
		
	}
	*/
	public function displayAddress()
	{
		echo '<p>'.$this->streetNumber." ".
		$this->postalcode."</p>";
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

	public function displayStreetNumberInRowFormatted()
	{
		
	echo '<TR class="bgcoloroption1">
			<TD class="tableDataLeftC">'.$this->streetNumber.'</TD>
    	  </TR>';		
	}		
	

	
}

?>