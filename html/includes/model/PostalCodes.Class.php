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

	public function initializeProvinceCity($row)
	{
		// in the line ($row[]), parameter name [] from db table
		$this->setProvince($row[province]);
		$this->setCity($row[city]);
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

	/* This function is needed in Add Employee class. 
	 * User enter postal code and from it I find province, city*/
	public function findProvinceCity($employeePostalCode)
	{
			//find province, city from postal code
			$dbSelectProvinceCity = new Database();
			$dbSelectProvinceCity->connect();
							
			$querySelectProvinceCity="SELECT DISTINCT province, city 
							   				FROM postalcodes
							   				WHERE postalcodes='$employeePostalCode'";
														
			$dbSelectProvinceCity->query($querySelectProvinceCity);	
			$result = $dbSelectProvinceCity->query($querySelectProvinceCity);						
										   
			for($count=0;$count<$dbSelectProvinceCity->queryResultsCount;$count=$count+1)
			{
				$row=mysql_fetch_array($dbSelectProvinceCity->queryResultsResource);
				$this->initializeProvinceCity($row);
			}
			
			$employeeProvince=$row[province];
			$employeeCity=$row[city];
			echo "<h5> province inside find: $employeeProvince </h5>\n";			
			echo "<h5> city inside find: $employeeCity </h5>\n";

			$dbSelectProvinceCity->close();	
	} // end public function findProvinceCityStreet($employeePostalCode)		
	
}

?>