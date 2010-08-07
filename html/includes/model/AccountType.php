<?php
require_once('includes/controller/Database.Class.php');

class AccountType{
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

public function insurancePlans()
{
    $insurePlan = new Database();
    $insurePlan->connect();
    $insureList = "SELECT a.accountname
                    FROM servicetype s, accounttype a
                    WHERE s.servicetypeid = a.servicetypeid
                    AND s.serviceid = 3
                    ORDER BY a.accounttypeid";

    $insurePlan->query($insureList);
    $rowsSelected = $insurePlan->queryResultsCount;
     ?>
<select name="accountType" size="4" >
<?php
    for ($x=0;$x<$rowsSelected;++$rowsSelected)
    {
        $row=mysql_fetch_array($insurePlan->queryResultsResource);
	extract($row);
	echo "<option value='$accountname'>$accountname</option>";
    }
 
    $insurePlan->close();
    ?>
    </select>
<?php

}

public function borrowingPlans()
{
    $borrowPlan = new Database();
    $borrowPlan->connect();
    $borrowList = "SELECT a.accountname
                    FROM servicetype s, accounttype a
                    WHERE s.servicetypeid = a.servicetypeid
                    AND s.serviceid = 4
                    ORDER BY a.accounttypeid";

    $borrowPlan->query($borrowList);
    $rowResults = $borrowPlan->queryResultsCount;
     ?>
<select name="accountType" size="4" >
<?php
    for ($n=0;$n<$rowResults;++$rowResults)
    {
        $Row=mysql_fetch_array($borrowPlan->queryResultsResource);
	extract($Row);
	echo "<option value='$accountname'>$accountname</option>";
    }
 
    $borrowPlan->close();
    ?>
    </select>
<?php

}

public function investPlans()
{
    $investPlan = new Database();
    $investPlan->connect();
    $investList = "SELECT a.accountname
                    FROM servicetype s, accounttype a
                    WHERE s.servicetypeid = a.servicetypeid
                    AND s.serviceid = 2
                    ORDER BY a.accounttypeid";

    $investPlan->query($investList);
    $allRows = $investPlan->queryResultsCount;
     ?>
<select name="accountType" size="4" >
<?php
    for ($n=0;$n<$allRows;++$allRows)
    {
        $oneRow=mysql_fetch_array($investPlan->queryResultsResource);
	extract($oneRow);
	echo "<option value='$accountname'>$accountname</option>";
    }
        
    $investPlan->close();
   ?>
    </select>
<?php
}


}//end of class
?>