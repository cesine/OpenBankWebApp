<?php
class Address{
	private $addressID;
	private $addressName;
	private $appartmentNumber;
	private $streetName;
	private $streetNumber;
	private $city;
	private $province;
	private $country;
	private $postalcode;
	
	
	public function getAddressID(){
	        return $this->AddressID;
	}
	public function getAddressName(){
	        return $this->AddressName;
	}
	public function getAppartmentNumber(){
	        return $this->AppartmentNumber;
	}
	public function getStreetNumber(){
	        return $this->StreetNumber;
	}
	public function getStreetName(){
	        return $this->StreetName;
	}
	public function getCity(){
	        return $this->City;
	}
	public function getProvince(){
	        return $this->Province;
	}
	public function getCountry(){
	        return $this->Country;
	}
	public function getPostalcode(){
	        return $this->Postalcode;
	}
	
	public function setAddressID($addressIDIn){
        $this->addressID=$addressIDIn;
	}
	public function setAddressName($addressNameIn){
	        $this->addressName=$addressNameIn;
	}
	public function setAppartmentNumber($appartmentNumberIn){
	        $this->appartmentNumber=$appartmentNumberIn;
	}
	public function setstreetNumber($streetNumberIn){
        $this->streetNumber=$streetNumberIn;
	}
	public function setStreetName($streetNameIn){
        $this->streetName=$streetNameIn;
	}
	public function setCity($cityIn){
	        $this->city=$cityIn;
	}
	public function setProvince($provinceIn){
	        $this->province=$provinceIn;
	}
	public function setCountry($countryIn){
	        $this->country=$countryIn;
	}
	public function setPostalcode($postalcodeIn){
	        $this->postalcode=$postalcodeIn;
	}
	
	
	/*
	 * Takes any adressId and puts all the appropriate values into the address object it is called on
	 * It uses the variable "queryFirstResult" from the db object, which is essentially the first row 
	 * hopefully in this case, the only row.
	 */
	public function initializeAddress($addressIdIn){
		$db = new Database();
		$db->connect();
		$queryToDo= "SELECT DISTINCT * FROM address	WHERE adressid=".$addressIdIn;
		$db->query($queryToDo);
		$db->close();//just closes the connection to the db so that some other object can connect. the 
					//db object is still alive and contains the results. 
		/* 
		 * put the results into the object
		 */
		$this->streetName=$db->queryFirstResult[streetname];
		$this->streetNumber=$db->queryFirstResult[streetnumber];
		$this->city=$db->queryFirstResult[city];
		$this->addressID=$db->queryFirstResult[addressid];
		$this->province=$db->queryFirstResult[province];
		$this->country="Canada";
		$this->appartmentNumber="";
		$this->postalcode=$db->queryFirstResult[postalcode];
		
	}
	public function displayAddress(){
		echo '<p>'.$this->streetNumber." ".
		$this->streetName." <br/>".
		$this->city."<br/>".
		$this->province." ".
		$this->postalcode."</p>";
	}
	public function __construct(){
		echo "Creating an Address object";
	}

	
}

?>