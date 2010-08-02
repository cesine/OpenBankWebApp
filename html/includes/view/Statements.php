<?php 
include('includes/model/Transaction.Class.php');

include('includes/controller/Database.Class.php');

// access client_account_id
require_once 'includes/model/ClientAccount.Class.php';


echo '<div>';
$transactionToDisplay = new Transaction();
//$transactionToDisplay->test();
//$transactionToDisplay->displayTransaction();
echo '</div>';
?>

<P> Transactions details. </P>

<?php
/*Build dynamic selection list */
$dbSelectionListClientAccounts = new Database();
$dbSelectionListClientAccounts->connect();

$querySelectClientAccounts="SELECT DISTINCT clientaccountid 
							FROM clientaccount
							WHERE clientid = 54010001";
							
$dbSelectionListClientAccounts->query($querySelectClientAccounts);	
$result = $dbSelectionListClientAccounts->query($querySelectClientAccounts);						

/* Create form containing selection list */
echo "<form action='?&content=Statement' method='POST'
			style='margin-left: 2em'>
	  <label for 'clientaccountid'
	  		 style='font-weight: bold'>Select account:</label>
	   <select ID='clientaccountid'	NAME='clientaccountid'	 					
			   style='margin-left: 3em'>\n";
			   
/*Put results of query into dynamic list*/
for($count=0;$count<$dbSelectionListClientAccounts->queryResultsCount;$count=$count+1)
{
	$row=mysql_fetch_array($dbSelectionListClientAccounts->queryResultsResource);
	extract($row);
	echo "<option value='$clientaccountid'>$clientaccountid</option>";

}//endl if to only print when there are any results
echo "</select>\n";	
$dbSelectionListClientAccounts->close();	   		
?>
<P></P>

<?php
/*Select date since for displaying transactions*/

$today = time(); 									// stores today's date
$f_today = date("M-d-Y",$today); 					// formats today's date

//echo "<h4> Today is $f_today </h4>\n";
//echo "<h4> </h4>\n";
echo "<h4> Select date since: </h4>\n";

echo "<form action='?&content=Statement' method='POST'>\n";

/*build selection list for year*/
$startYr1 = date("Y",$today); 					// get year from $today
$startYr = $startYr1-20;
echo "<select name='dateYear'>\n";
for ($n=$startYr; $n<=$startYr1; $n++)
{
	echo "<option value=$n>";
	echo "$n</option>\n";
}
echo "</select>\n";


/*build selection list for month*/

$monthName = array(1=> "January", "February", "March",
					   "April", "May", "June", "July", "August",
					   "September", "October", "November", "December");

$todayMO = date("n",$today); 						// get month from $today
echo "<select name='dateMonth'>\n";
for ($n=1; $n<=12; $n++)
{
	echo "<option value=$n>";
	echo "$monthName[$n]\n</option>";
}
echo "</select>\n";


/*build selection list for day*/

$todayDay = date("d",$today); 					// get day from $today
echo "<select name='dateDay'>\n";
for ($n=1; $n<=31; $n++)
{
	echo "<option value=$n>";
	echo "$n</option>\n";
}
echo "</select>\n";

?>

<!-- read input from user after submition -->

<P></P>
<input type="submit" value="submit selection"/>
<P></P>

<?php
$selectedAccount=$_POST["clientaccountid"];
$selectedYear=$_POST["dateYear"];
$selectedMonth=$_POST["dateMonth"];
$selectedDay=$_POST["dateDay"];

/* put leading zero into month if it is only one digit */
switch($selectedMonth)
{
	case '1': 
		$selectedMonth ='01';
		break;
	case '2': 
		$selectedMonth ='02';
		break;	
	case '3': 
		$selectedMonth ='03';
		break;	
	case '4': 
		$selectedMonth ='04';
		break;	
	case '5': 
		$selectedMonth ='05';
		break;	
	case '6': 
		$selectedMonth ='06';
		break;	
	case '7': 
		$selectedMonth ='07';
		break;	
	case '6': 
		$selectedMonth ='08';
		break;	
	case '9': 
		$selectedMonth ='09';
		break;	
	default: 
		$selectedMonth =$selectedMonth;
		break;					
} // end switch($selectedMonth)

/* put leading zero into day if it is only one digit */
switch($selectedDay)
{
	case '1': 
		$selectedDay ='01';
		break;
	case '2': 
		$selectedDay ='02';
		break;	
	case '3': 
		$selectedDay ='03';
		break;	
	case '4': 
		$selectedDay ='04';
		break;	
	case '5': 
		$selectedDay ='05';
		break;	
	case '6': 
		$selectedDay ='06';
		break;	
	case '7': 
		$selectedDay ='07';
		break;	
	case '6': 
		$selectedDay ='08';
		break;	
	case '9': 
		$selectedDay ='09';
		break;	
	default: 
		$selectedDay =$selectedDay;
		break;			
} // end switch($selectedDay)

$s="-"; 															// date have format yyyy-mm-dd
$selectedDate= $selectedYear.$s.$selectedMonth.$s.$selectedDay; 	// concatenation of strings

echo "<h4> Transactions details for: </h4>\n";
echo "<h5> account number: $selectedAccount </h5>\n";
echo "<h5> date since: $selectedDate </h5>\n";

/* Convert string to date yyyy-mm-dd */
$date = strtotime( $selectedDate ); 								
$dateSince = date( 'y-m-d', $date ); 								
//echo "<h5> Date since: $dateSince </h5>\n"; 						// output in format yy-mm-dd

?>

<!-- display transactions details on the screen -->

<!-- create header for table -->
<table width="100%" border="1" cellpadding="3" cellspacing="1">
<tr>
<td>
Date
</td>
<td>
Desctiption
</td>
<td>
Withdraw
</td>
<td>
Deposits
</td>
<td>
Balance
</td>
</tr>

<?php

/* Display transactions from table "transaction" */

$dbClientAccountTransactions = new Database();
$dbClientAccountTransactions->connect();

// note: in query we use data, selected by user
$queryClientAccountTransactions=
"SELECT date, transactiondescription,depositamount,withdrawalamount, balance
FROM transaction
WHERE clientid = 54010001 AND accountid=$selectedAccount AND date>=$selectedDate";
//WHERE clientid = 54010001 AND accountid=$selectedAccount AND date>=$dateSince";
							
$dbClientAccountTransactions->query($queryClientAccountTransactions);	

/*Put results of query into table on the screen*/
for($count=0;$count<$dbClientAccountTransactions->queryResultsCount;$count=$count+1)
{
	$row=mysql_fetch_array($dbClientAccountTransactions->queryResultsResource);	
	$transactionToDisplay->initializeTransaction($row);
	$transactionToDisplay->displayTransactionInRowFormatted();

}

$dbClientAccountTransactions->close();

?>
</table>
<P></P>


 