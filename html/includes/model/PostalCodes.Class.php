<?php

class PostalCodes{
	private $postalCodes;	
	private $city;
	private $province;

	public function getPostalCodes()
	{
	        return $this->postalCodes;
	}
	public function getCity()
	{
	        return $this->city;
	}
	public function getProvince()
	{
	        return $this->province;
	}
	public function setPostalCodes($postalCodesIn)
	{
	        $this->postalCodes=$postalCodesIn;
	}
	public function setCity($cityIn)
	{
	        $this->city=$cityIn;
	}
	public function setProvince($provinceIn)
	{
	        $this->province=$provinceIn;
	}
	public function __construct(){
		
		//null constructor
	}
	public function initializePostalCodes($row)
	{
		// in the line ($row[]), parameter name [] from db table
		$this->setPostalCodes($row[postalcodes]);
		$this->setCity($row[city]);	
		$this->setProvince($row[province]);			
	}
	public function saveToDatabase(){
		$dbInsertPostalCode = new Database();
		$dbInsertPostalCode->connect();
		$insertquery="INSERT INTO postalcodes (postalcodes,city,province)
			VALUES ('$this->postalCodes','$this->city','$this->province')";
		//echo $insertquery;
		$dbInsertPostalCode->insert($insertquery);
		//because its not an autoincrement
		$succcessOrNot=$dbInsertPostalCode->queryResultsResource;
		$dbInsertPostalCode->close();
		return $succcessOrNot;
	}
	public function displayPostalCodeInfo(){
		echo"<p>$this->city,
			$this->province 
			$this->postalCodes</p>";
	}
	public function initializeProvinceCityStreet2($row)
	{
		// in the line ($row[]), parameter name [] from db table
		$this->setProvince($row[province]);
		$this->setCity($row[city]);
		//$this->setStreet($row[street]);		
	}		
	public function displayInRowFormatted(){
		echo '<TR class="bgcoloroption1">
				<TD class="tableDataLeftC">'.$this->postalCodes.'</TD>
				<TD class="tableDataLeftC">'.$this->province.'</TD>		
				<TD class="tableDataLeftC">'.$this->city.'</TD>					
	    	  </TR>';		
	}	
	public function displayCodeProvinceCity(){
		echo '	<TD>'.$this->postalCodes.'</TD>
				<TD>'.$this->province.'</TD>		
				<TD>'.$this->city.'</TD>';		
	}	

	
	
}

?>