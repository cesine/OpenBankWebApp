<!--<?php
require_once 'includes/model/Client.Class.php';
echo '<div>';

     
//test creating an object

$myClient = new Client();
$myClient = unserialize($_SESSION['Client']);
echo "client id is ".$myClient->clientID;


//test creating an object from the datbase





//test display object





//test writing an object to the database







///* 
// * Get all client info
// */
//$dbToGetAllBranches = new Database();
//$dbToGetAllBranches->connect();
//$search=$_GET["search"];
//$searchID=$_POST['$FormID'];//this comes from the submit of the form. 
//if($search=="ByCity" && $searchCity!=""){
////	$querystrg="SELECT branchid, branchname,managerid,openingdate,openinghours,status 
////		FROM address a, branch b 
////		WHERE a.addressid=b.addressid AND a.city LIKE '".$searchCity."%'";
//	$querystrg="select firstname, lastname, ssn, dateofbirth, startdate, streetnumber, street, city, province, postalcodes
//				from client c, address a, postalcodes p
//				where c.clientid=             and
//				c.addressid=a.addressid and
//				a.postalcode=p.postalcodes
//}else{
//	$querystrg="SELECT DISTINCT * FROM branch";
//}
//$dbToGetAllBranches->query($querystrg);
//$dbToGetAllBranches->close();
//
///*
// * Print out each branch
// */
////print_r($dbToGetAllBranches->queryFirstResult);
//
///*
// * Print out the number of branches found
// */
//echo "<h2>".$dbToGetAllBranches->queryResultsCount." Branches are in your area:</h2>";
////if($dbToGetAllBranches->queryResultsCount=="0"){//cant get it to work...
////$count=$dbToGetAllBranches->queryResultsCount;
//
//for($count=0;$count<$dbToGetAllBranches->queryResultsCount;$count=$count+1){
//	$row=mysql_fetch_array($dbToGetAllBranches->queryResultsResource);
//		//echo "Here is the row: ";
//		//print_r($row);
//	
//		$b = new Branch();
//		$b->initializeBranch($row);	
//		$b->displayBranch();
//	
//		//$b->__destruct(); //called automatically when the object goes out of scope
//	//}
//}//endl if to only print when there are any results
//
//echo '</div>';
//?>