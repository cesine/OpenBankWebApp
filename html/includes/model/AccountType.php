<?php

class Account{
	private $accountTypeId;
	private $serviceCategoryId;
	private $serviceTypeId;
	private $accountName;

	public function getAccountTypeId() {
		return $this->accountTypeId;
	}
	public function getServiceCategoryId() {
		return $this->serviceCategoryId;
	}
	public function getServiceTypeId(){
		return $this->serviceTypeId;
	}
	public function getAccountName(){
		return $this->accountName;
	}
	public function setAccountTypeId($accountTypeId){
		$this->accountTypeId=$accountTypeId;
	}
	public function setServiceCategoryId($serviceCategoryId) {
		$this->serviceCategoryId=$serviceCategoryId;
	}
	public function setServiceTypeId($serviceTypeId){
		$this->serviceTypeId=$serviceTypeId;
	}
	public function setAccountName($accountName) {
		$this->AccountName=$accountName;
	}	


//functions to list all account types
public function bankingPlans()
{
    $bankPlan = new Database();
    $bankPlan->connect();
    $bankingList = "SELECT a.accountname
                    FROM servicetype s, accounttype a
                    WHERE s.servicetypeid = a.servicetypeid
                    AND s.serviceid =1
                    ORDER BY a.accounttypeid";

    $bankPlan->query($bankingList);
    $rowsResulted = $bankPlan->queryResultsCount;
     ?>
<select name="accountType" size="4" >
<?php
    for ($n=0;$n<$rowsResulted;++$rowsResulted)
    {
        $eachRow=mysql_fetch_array($bankPlan->queryResultsResource);
	extract($eachRow);
	echo "<option value='$accountname'>$accountname</option>";
    }
 ?>
   </select>
    <?php
    $bankPlan->close();
}

}//end of class
?>