<?php
require_once('includes/model/AccountType.php');
require_once('includes/model/ClientAccount.Class.php');


echo "<form action='?&content=OpenNewAccount' method='POST'>";



 
//session variable	
if (isset($_SESSION['Client']))
{
	$client = unserialize($_SESSION['Client']);
	$clientName = $client->getFirstName()." ".$client->getLastName();
	//$userBranch = $client->getBranchID();
	//$clientID = $client->getClientID();
}


echo "Dear ", $clientName, ", please choose the account you'd like to open.<br/>";

$newAccount = new ClientAccount();
$newAccount->setAutoIncAccID();
$newAccount->setBranchId($userBranch);
$newAccount->setclientId($clientId);
$newAccount->setAccountTypeId($userAccountChoice);

$newAccount->InsertAccountIntoDatabase();


?>