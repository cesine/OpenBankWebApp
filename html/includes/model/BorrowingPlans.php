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
	    $bankPlan = new Database();
	    $bankPlan->connect();
	    $plan = "SELECT DISTINCT *
	                    FROM borrowingplans b
	                    WHERE b.accounttypeid = ".$accountTypeId;
	    
	    $bankPlan->query($plan);
	    $bankPlan->close();
		$this->initializeBorrowingPlan($bankPlan->queryFirstResult);
	}
		
	public function initializeBorrowingPlan($row)
	{
		$this->setMonthlyFee($row[monthlyfee]);
		$this->setCreditLimit($row[creditlimit]);
		$this->setGracePeriod($row[graceperiod]);
		$this->setInterestRate($row[interestrate]);
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
