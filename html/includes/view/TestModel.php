<?php
require_once 'includes/model/PostalCodes.Class.php';
require_once 'includes/model/Address.Class.php';
require_once 'includes/model/Client.Class.php';
require_once 'includes/model/Employee.Class.php';
require_once 'includes/model/ClientAccount.Class.php';


echo "<h4>Testing setting some elements in a postal code, then printing it as it would appear in an addres.</h4>";
$p= new PostalCodes();
$p->setCity("Montreal");
$p->setProvince("Quebec");
$p->setPostalCodes("H3G-1M8");
$p->displayPostalCodeInfo();

echo "<p>The above postal code is: ".$p->getPostalCodes()." </p>";

$p->setPostalCodes("H3K-1J3");
//$successOrNot=$p->saveToDatabase();
echo "Here is the result of the insert : ".$successOrNot;


echo "<h4>Testing setting some elements in an address, then printing it as it would appear on a letter</h4>";
$address = new Address();
$address->setStreet("deMaisonneuve West");
$address->setStreetNumber(1455);
$address->setPostalCodeFromObject($p);
$address->displayAddress();

echo "<h5>Changing the city via the address object</h5>";
$address->setCity("Ville Marie2");
$address->displayAddress();

echo"<h5>Saving the address object (and consequently the postal code) to the database if they do not already exist.</h5>";
$idOfInsertedAddress=$address->saveToDatabase();
echo "Here is the result of the insert, this case its the Id of the address that was just inserted, or 0 if the address already existed : ".$idOfInsertedAddress;
echo "<p></p>";

echo "<h5>Displaying an address in a row.</h5>";
echo "<table border=1>";
$address->displayAddressInARow();
echo "</table>";

echo"<h5>Displaying postal code selection box</h5>";
$address->PostalCodesList();


echo "<h5>Adding postalcodes for the banks.</h5>";
$postalC = new PostalCodes();

$postalC->setPostalCodes("M5C-2E9");
$postalC->setCity("Toronto");
$postalC->setProvince("Ontario");
$postalC->saveToDatabase();


$postalC->setPostalCodes("H2L-2G9,");
$postalC->setCity("Montreal");
$postalC->setProvince("Quebec");
$postalC->saveToDatabase();

$postalC->setPostalCodes("H9R-1E2");
$postalC->setCity("Pointe-Claire Montreal");
$postalC->setProvince("Quebec");
$postalC->saveToDatabase();

$postalC->setPostalCodes("G1N-4E2");
$postalC->setCity("Quebec");
$postalC->setProvince("Quebec");
$postalC->saveToDatabase();

if(isset($_SESSION['Client'])){
	echo"<hr height=10s>";
	echo"<h4>Testing client</h4>";
	$client= new Client();
	$client=unserialize($_SESSION['Client']);
	$client->displayClientDetails();

	echo "<h5>Testing editing the client object's last name,
			and city (through the address, through the postal code)</h5>";
	$client->setLastName($client->getLastName()."-Brown");
	$clientsAddress=$client->getAddress();
	$clientsAddress->setCity("WestmountVilleMarie");
	$client->setAddressObject($clientsAddress);
	$client->displayClientDetails();

	echo "<h5>Displaying a selction box for the client's accounts</h5>";
	$client->displaySelectClientAccount();

	echo "<h5>Listing client's accounts in the view layer</h5>";
	echo "<p>";
	foreach ($client->getClientAccountsArray() as $accountNumber){
		echo "Client has Account: $accountNumber<br/>";
	}
	echo "<h5>Testing inserting a client into the database.</h5>";
	$newClientInserted=$client->saveToDatabase();
	echo "This is the id of the new inserted client, or 
		zero if the client already existed. ".$newClientInserted;
	
	echo "<h5>Testing inserting a default client into the database.</h5>";
	$clientDefault = new Client();
	$clientDefault->displayClientDetails();
	$newClientInserted=$clientDefault->saveToDatabase();
	echo "This is the id of the new inserted client, or 
		zero if the client already existed. ".$newClientInserted;
	
	echo "</p>";
	
	

	echo "<h4>Testing client account</h4>";
	echo "<h5>Testing creating a default client account.</h5>";
	$accountDefault= new ClientAccount();
	echo "<table border=1>";
	$accountDefault->displayAccountInRow();
	echo "</table>";
	$newAccountNumber=$accountDefault->saveToDatabase();
	echo "This is the id of the new inserted client, or 
		zero if the client already existed. ".$newAccountNumber;
	echo "<table border=1>";
	$accountDefault->displayAccountInRow();
	echo "</table>";
	
	echo "<h5>Eding the account info from the client above, then inserting it into the athe database.</h5>";
	$accountToChange = new ClientAccount();
	$accountToChange->initializeAccountFromID($client->clientAccountsArray[0]);
	echo "<table border=1>";
	$accountToChange->displayAccountInRow();
	echo "</table>";
	$accountToChange->setAvailableBalance(200.00);
	echo "<table border=1>";
	$accountToChange->displayAccountInRow();
	echo "</table>";
	$newAccountNumber=$accountToChange->saveToDatabase();
	echo "This is the id of the new inserted client, or 
		zero if the client already existed. ".$newAccountNumber;
	echo "<table border=1>";
	$accountToChange->displayAccountInRow();
	echo "</table>";
	
	
	
	echo "Testing the date function.".date(Y)."-".date(m)."-".date(d).date('Y-m-d');
	
	
	
	echo "<h4>Testing transfers and bill payment</h4>";
	echo "To Be Done (TBD)";
	
	
	echo "<h4>Testing displaying recent transactions</h4>";
	echo "To Be Done (TBD)";
	
	
}
if(isset($_SESSION['Employee'])){
	echo "<h4>Testing employee, displaying personal info in row</h4>";
	$employee= new Employee();
	$employee=unserialize($_SESSION['Employee']);
	echo "<table border=1>";
	$employee->displayEmployeePersonalInfo();
	echo "</table>";


	echo "<h5>Testing employes list</h5>";
	$employee->EmployeeList();
	
	
	echo "<h5>Inserting an employee into the database</h5>";
	$employee->setLastName("GotMarried");
	$newEmpIdInserted=$employee->saveToDatabase();
	echo "The id of the new employee is ".$newEmpIdInserted;
	
	echo "<h5>Inserting an default employee into the database</h5>";
	$employeeDefault = new Employee();
	echo "<table border=1>";
	$employeeDefault->displayEmployeePersonalInfo();
	echo "</table>";
	$newEmpIdInserted=$employeeDefault->saveToDatabase();
	echo "The id of the new employee is ".$newEmpIdInserted;
	
	
}



echo"<p></p>";
?>