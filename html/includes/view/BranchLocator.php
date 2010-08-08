<?php 
require_once 'includes/model/Branch.Class.php';
//include('includes/controller/Database.Class.php');  //included automatically by the header
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
//	$querystrg="SELECT branchid, branchname,managerid,openingdate,openinghours,status 
//		FROM address a, branch b 
//		WHERE a.addressid=b.addressid AND a.city LIKE '".$searchCity."%'";
	$querystrg="SELECT DISTINCT * 
		FROM branch b, client c, address a, postalcodes p
		WHERE c.clientid=b.branchsclientid AND
		c.addressid=a.addressid AND
		a.postalcode=p.postalcodes AND
		p.city LIKE '%".$searchCity."%'";
}else{
	$querystrg="SELECT DISTINCT * FROM branch";
}
$dbToGetAllBranches->query($querystrg);
$dbToGetAllBranches->close();

/*
 * Print out each branch
 */
//print_r($dbToGetAllBranches->queryFirstResult);

/*
 * Print out the number of branches found
 */
echo "<h2>".$dbToGetAllBranches->queryResultsCount." Branches available:</h2>";
//if($dbToGetAllBranches->queryResultsCount=="0"){//cant get it to work...
//$count=$dbToGetAllBranches->queryResultsCount;
echo "</div>";
for($count=0;$count<$dbToGetAllBranches->queryResultsCount;$count=$count+1){
	$row=mysql_fetch_array($dbToGetAllBranches->queryResultsResource);
		//echo "Here is the row: ";
		//print_r($row);
	
		$b = new Branch();
		$b->initializeBranch($row);	
		echo "<div>";
		$b->displayBranch();
		$b->displayBranchMap();
	
		//$b->__destruct(); //called automatically when the object goes out of scope
		

		echo "</div>";
	//}
}//endl if to only print when there are any results

echo '</div>';
?>

