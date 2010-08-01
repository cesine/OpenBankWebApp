<?php 
include('includes/model/Branch.Class.php');
include('includes/controller/Database.Class.php');
echo '<div>';
//$branchToDisplay = new Branch();
//$branchToDisplay->test();



/*
 * Display form to search Branches by City
 */
?>
<form action="?&content=BranchLocator&search=ByCity" method="post">
<fieldset>
<legend><font color=cornflowerblue><b>Search Branches </b></font></legend>
<table>
	<tr><td>Enter City (ex. Montreal):</td><td>
    <input type="text" name="$FormCity" size ="32"  maxlength="64"  class="inputtext">
  	</td></tr>
</table>
<input type="submit" name="mysubmit" value="Search">
</fieldset>
</form>
     

<?php 
/*
 * Get all Branches
 */
$dbToGetAllBranches = new Database();
$dbToGetAllBranches->connect();
$search=$_GET["search"];
$searchCity=$_POST['$FormCity'];//this comes from the sumbit of the form. 
if($search=="ByCity" && $searchCity!=""){
	$querystrg="SELECT branchid, branchname,managerid,openingdate,openinghours,status 
		FROM address a, branch b 
		WHERE a.addressid=b.addressid AND a.city LIKE '".$searchCity."%'";
}else{
	$querystrg="SELECT * FROM branch";
}
$dbToGetAllBranches->query($querystrg);
$dbToGetAllBranches->close();

/*
 * Print out each branch
 */
//print_r($dbToGetAllBranches->queryFirstResult);
$objectCount=0;

/*
 * Print out the number of branches found
 */
echo "<h2>".$dbToGetAllBranches->queryResultsCount." Branches are in your area:</h2>";
//if($dbToGetAllBranches->queryResultsCount=="0"){//cant get it to work...
	/*
	 * TBD: figure out why it wont display results if use the city query., 
	 */

	while($row=mysql_fetch_array($dbToGetAllBranches->queryResultsResource)){
		$b = new Branch();
		$b->setBranchName($row[branchname]);
		$b->setManagerId($row[managerid]);
		$b->setManagerName($row[managerid]);//note: the name takes the managerid as a parameter,as long as you have the managerid it will work
		$b->setOpeningDate($row[openingdate]);
		$b->setOpeningHours($row[openinghours]);
	
		$b->displayBranch();
		//$b->__destruct(); //called automatically when the object goes out of scope
	//}
}//endl if to only print when there are any results

echo '</div>';
?>

