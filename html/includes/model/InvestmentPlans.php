<?php
class InvestmentPlans
{
	private $accountTypeId;
	private $investmentTerm;
	private $interestRate;

	public function getAccountTypeId() 
	{
		return $this->$accountTypeId;
	}
	
	public function getInvestmentTerm()
	{
		return $this->investmentTerm;
	}
	
	public function getInterestRate()
	{
		return $this->interestRate;
	}

	public function setAccountTypeId($accountTypeId)
	{
		$this->accountTypeId=$accountTypeId;
	}
		
	public function setGracePeriod($investmentTerm)
	{
		$this->investmentTerm = $investmentTerm;
	}
	
	public function setInterestRate($interestRate)
	{
		$this->interestRate=$interestRate;
	}
}
?>