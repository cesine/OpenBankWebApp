<?php
require_once('includes/model/AccountType.php');
require_once('includes/model/ClientAccount.Class.php');


//echo "<form action='?&content=OpenNewAccount' method='POST'>";


echo "Cliendaccountid worked. Now testing update in original class";
 
//session variable
if (isset($_SESSION['Client']))
{
	$client = unserialize($_SESSION['Client']);
	$clientName = $client->getFirstName()." ".$client->getLastName();
	$userBranch = $client->getBranchID();
	$clientID = $client->getClientID();
}


//echo "Dear ", $clientName, ", please choose the account you'd like to open.<br/>";
$curDate = date("Y,m,d");
$newAccount = new ClientAccount();
$newAccount->setOpeningDate($curDate);
$newAccount->setBranchId($userBranch);
$newAccount->setclientId($clientId);
$newAccount->setAccountTypeId("8");

$newAccount->InsertAccountIntoDatabase();

//echo "Testing query to receive max clientaccountid renaming field name";
//echo "Now calling from original class <br/>";
//
//
//$newID = new ClientAccount();
//
//$newAccNum = $newID->getAutoIncAccID();
//
//echo "<br/> Max id: ", $newAccNum; "<br/>";
?>