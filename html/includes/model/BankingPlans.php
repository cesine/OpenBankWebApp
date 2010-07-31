<?php
class BankingPlans
{
	private $accountTypeId;
	private $monthlyFee;
	private $freeTransactions;
	private $transactionFee;
	private $overdraftAmount;
	private $overdraftProtectionFee;
	private $minimumBalance;
	private $interestRate;

	public function getAccountTypeId() 
	{
		return $this->$accountTypeId;
	}
	
	public function getMonthlyFee()
	{
		return $this->monthlyFee;
	}

	public function getFreeTransactions() 
	{
		return $this->freeTransactions;
	}
	
	public function getTransactionFee()
	{
		return $this->transactionFee;
	}
	
	public function getOverdraftAmount() 
	{
		return $this->overdraftAmount;
	}
	
	public function getOverdraftProtectionFee()
	{
		return $this->overdraftProtectionFee;
	}
	
	public function getMinimumBalance() 
	{
		return $this->minimumBalance;
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
	
	public function setFreeTransactions($freeTransactions)
	{
		$this->freeTransactions=$freeTransactions;
	}
		
	public function setTransactionFee($transactionFee)
	{
		$this->transactionFee=$transactionFee;
	}
	
	public function setOverdraftAmount($overdraftAmount)
	{
		$this->overdraftAmount=$overdraftAmount;
	}
		
	public function setOverdraftProtectionFee($overdraftProtectionFee)
	{
		$this->overdraftProtectionFee=$overdraftProtectionFee;
	}
	
	public function setMinimumBalance($minimumBalance)
	{
		$this->minimumBalance=$minimumBalance;
	}
		
	public function setInterestRate($interestRate)
	{
		$this->interestRate=$interestRate;
	}
}
?>