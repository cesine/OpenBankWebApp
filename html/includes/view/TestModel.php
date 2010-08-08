<?php
require_once 'includes/model/PostalCodes.Class.php';
require_once 'includes/model/Address.Class.php';
require_once 'includes/model/Client.Class.php';


echo "<h4>Testing setting some elements in a postal code, then printing it as it would appear in an addres.</h4>";
$p= new PostalCodes();
$p->setCity("Montreal");
$p->setProvince("QC");
$p->setPostalCodes("H3G-1M8");
$p->displayPostalCodeInfo();

echo "<p>The above postal code is: ".$p->getPostalCodes()." </p>";

echo "<h4>Testing setting some elements in an address, then printing it as it would appear on a letter</h4>";
$address = new Address();
$address->setStreet("deMaisonneuve West");
$address->setStreetNumber(1455);
$address->setPostalCodeFromObject($p);
$address->displayAddress();

echo "<h5>Changing the city via the address object</h5>";
$address->setCity("Ville Marie");
$address->displayAddress();


echo "<h5>Displaying an address in a row.</h5>";
echo "<table border=1>";
$address->displayAddressInARow();
echo "</table>";

echo"<h5>Displaying postal code selection box</h5>";
$address->PostalCodesList();


if(isset($_SESSION['Client'])){
	echo"<hr>";
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
	echo "</p>";
}
echo "<h4>Testing employee, displaying personal info in row</h4>";
$employee= new Employee();
$employee=unserialize($_SESSION['Employee']);
echo "<table border=1>";
$employee->displayEmployeePersonalInfo();
echo "</table>";

echo"<p></p>";
?>