<?php

class BorrowingPlans
{
	private $accountTypeId;
	private $monthlyFee;
	private $creditLimit;
	private $gracePeriod;
	private $interestRate;

	public function getAccountTypeId() 
	{
		return $this->$accountTypeId;
	}
	
	public function getMonthlyFee()
	{
		return $this->monthlyFee;
	}

	public function getCreditLimit() 
	{
		return $this->creditLimit;
	}
	
	public function getGracePeriod()
	{
		return $this->gracePeriod;
	}
	
	public function getInterestRate()
	{
		return $this->interestRate;
	}

	public function setAccountTypeId($accountTypeId)
	{
		$this->accountTypeId=$accountTypeId;
	}
		
	public function setMonthlyFee($monthlyFee)
	{
		$this->monthlyFee=$monthlyFee;
	}
	
	public function setCreditLimit($creditLimit)
	{
		$this->creditLimit=$creditLimit;
	}

	public function setGracePeriod($gracePeriod)
	{
		$this->gracePeriod = $gracePeriod;
	}
	
	public function setInterestRate($interestRate)
	{
		$this->interestRate=$interestRate;
	}
}

?>
