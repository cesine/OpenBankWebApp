<?php

class PostalCodes
{
	
	private $postalCodes;	
	private $street;
	private $city;
	private $province;

	public function getPostalCodes()
	{
	        return $this->postalCodes;
	}
	
	public function getStreet()
	{
	        return $this->street;
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
	        $this->postalcode=$postalCodesIn;
	}	

	public function setStreet($streetIn)
	{
        $this->street=$streetIn;
	}
	public function setCity($cityIn)
	{
	        $this->city=$cityIn;
	}
	
	public function setProvince($provinceIn)
	{
	        $this->province=$provinceIn;
	}

	public function initializePostalCodes($row)
	{
		// in the line ($row[]), parameter name [] from db table
		$this->setPostalCodes($row[postalcodes]);
		$this->setStreet($row[street]);
		$this->setCity($row[city]);	
		$this->setProvince($row[province]);			
	}

	public function displayInRowFormatted()
	{
		
	echo '<TR class="bgcoloroption1">
			<TD class="tableDataLeftC">'.$this->postalCodes.'</TD>
			<TD class="tableDataLeftC">'.$this->province.'</TD>		
			<TD class="tableDataLeftC">'.$this->city.'</TD>		
			<TD class="tableDataLeftC">'.$this->street.'</TD>					
    	  </TR>';		
	}	

	public function displayInOneCell()
	{
		
	$s=' ';
	echo '<TR class="bgcoloroption1">
			<TD class="tableDataLeftC">'.$this->postalCodes.$this->province.$this->city.$this->street.'</TD>
    	  </TR>';		
	}			
	
}

?>