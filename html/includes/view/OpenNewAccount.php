
<?php 
//client is opening a new account

require_once('includes/model/ClientAccount.Class.php');
require_once('includes/controller/Database.Class.php');

echo "<form action='?&content=OpenNewAccount' method='POST'>";


?>



<P>&nbsp;</P>
<!-- 
<table border="1">
<tr><td>Services:</td><td><select name="service" size="4" single="single">
<option value="banking">Banking</option>
<option value="investments">Investments</option>
<option value="insurance">Insurance</option>
<option value="borrowing">Borrowing</option>
</select>
</td>
</tr></table>

<P> </P>

<table border="1"> 
<tr><td>Category:</td><td><select name="serviceCategory" size="2" single="single">
<option value="personal">Personal</option>
<option value="business">Business</option>
</select>
</td>
</tr></table>

<P> </P>

<table border="1"> 
<tr><td>Type:</td><td><select name="serviceType" size="8" single="single">
<option value="checking">Chequing</option>
<option value="savings">Savings</option>
<option value="foreignCurrency">Foreign Currency</option>
<option value="creditCard">Credit cards</option>
<option value="lineOfCredits">Line of credits</option>
<option value="rSP">RSP</option>
<option value="tSFA">TSFA</option>
<option value="life">Life</option>
</select>
</td>
</tr></table>

<P></P>

 -->
 <?php
$clientName = new Database();
$clientName->connect();
$queryName = "SELECT `firstname`,`lastname`
              FROM `client`
              WHERE `clientid` = 54010015"; //change to $_SESSION[]
$clientName->query($queryName);
$row=mysql_fetch_array($clientName->queryResultsResource);
$userGName = $row[firstname];
$userLName = $row[lastname];
$clientName->close();

echo "<br/> Dear ", $userGName," ", $userLName, ", please choose the account you'd like to open.<br/>"
 ?>

 <!--displaying choice of account types
<table border="1"> 
<tr><td>Account name:</td><td><select name="accountType" size="5" >
<option value="powerChecking">Powerchequing Account</option>
<option value="moneyMasterSavings">Money Master Savings Account</option>
<option value="usDollarAccount">US Dollar Account</option>
<option value="creditCard">Credit Card No-Fee Value VISA</option>
<option value="lineOfCredits">Basic Line of Credit</option>
<option value="rSPSix">GIC(6mos) with Flex for RSPs Account</option>
<option value="rSPTwelve">GIC(12mos) with Flex for RSPs Account</option>
<option value="rSPEighteen">GIC(18mos) with Flex for RSPs Account</option>
<option value="rSPTFour">GIC(24mos) with Flex for RSPs Account</option>
<option value="tSFASix">GIC with Flex for TFSAs Account</option>
<option value="tSFAtwelve">GIC(12mos) with Flex for TFSAs Account</option>
<option value="tSFAEighteen">GIC(18mos) with Flex for TFSAs Account</option>
<option value="tSFATfour">GIC(24mos) with Flex for TFSAs Account</option>
<option value="lifeOne">Accidental Death Insurance - 1</option>
<option value="lifeTwo">Accidental Death Insurance - 2</option>
<option value="lifeThree">Accidental Death Insurance - 3</option>
<option value="lifeFour">Accidental Death Insurance - 4</option>
<option value="businessChecking">Basic Business Chequing Account</option>
<option value="businessSavings">Basic Business Savings Account</option>
<option value="businessFC">Basic Business Foreign Currency Account</option>

</select>
</td>
</tr></table>

<P></P>
<input type="submit" name="submitAccountName" value="submit" />
<P></P> -->
 <p>&nbsp;</p>
 <h3> Account Types </h3>
 <p>&nbsp;</p>

<table width ="100%" border="1">
     
    <tr><td width ="50%"><b> Banking Plans</b></td> <td width ="50%"> <b> Insurance Plans</b> </td></tr>
    <tr><td width ="50%"><select name="accountType" size="4" ></select></td>

        <td width ="50%"><select name="accountType" size="4" ></select> </td></tr>


    <tr><td width ="50%"> <b>Borrowing Plans</b></td> <td width ="50%"><b> Investment Plans</b> </td></tr>
    <tr><td width ="50%"><select name="accountType" size="4" ></select></td>

        <td width ="50%"><select name="accountType" size="4" ></select> </td></tr>

</table>
<p>&nbsp;</p>
<input type="submit" name="submitAccountName" value="Submit" />
<input type="reset" name="submitReset" value="Reset" />
<p>&nbsp;</p>

<?php
$clientAccount = new ClientAccount();
$userChoice=$_POST["accountType"];

//if user submitted choice
if (isset($_POST['submitAccountName'])) 
{
switch ($userChoice)
{
	case "powerChecking":
		$clientAccount->setAccountTypeId(1);
		break;
		
	case "moneyMasterSavings":
		$clientAccount->setAccountTypeId(2);
		break;
		
	case "usDollarAccount":
		$clientAccount->setAccountTypeId(3);
		break;
		
	case "creditCard":
		$clientAccount->setAccountTypeId(4);
		break;
		
	case "lineOfCredits":
		$clientAccount->setAccountTypeId(5);
		break;
		
	case "rSPSix":
		$clientAccount->setAccountTypeId(6);
		break;
		
	case "tSFASix":
		$clientAccount->setAccountTypeId(7);
		break;
		
	case "lifeOne":
		$clientAccount->setAccountTypeId(8);
		break;
				
	case "rSPTFour":
		$clientAccount->setAccountTypeId(9);
		break;
		
	case "businessChecking":
		$clientAccount->setAccountTypeId(10);
		break;
		
	case "businessSavings":
		$clientAccount->setAccountTypeId(11);
		break;
		
	case "businessFC":
		$clientAccount->setAccountTypeId(12);
		break;
		
	case "rSPTwelve":
		$clientAccount->setAccountTypeId(13);
		break;
		
	case "rSPEighteen":
		$clientAccount->setAccountTypeId(14);
		break;
		
	case "tSFAtwelve":
		$clientAccount->setAccountTypeId(15);
		break;
		
	case "tSFAEighteen":
		$clientAccount->setAccountTypeId(16);
		break;
		
	case "tSFATfour":
		$clientAccount->setAccountTypeId(17);
		break;
		
	case "lifeTwo":
		$clientAccount->setAccountTypeId(18);
		break;
		
	case "lifeThree":
		$clientAccount->setAccountTypeId(19);
		break;
		
	case "lifeFour":
		$clientAccount->setAccountTypeId(20);
		break;
	default:
		print "Please try again!";	
}
//end of switch

	
}
//end of if
$userAccountChoice = $clientAccount->getAccountTypeId();
echo  "<br/>", "You picked account type ", $userAccountChoice, "<br/>";


//object for the Database to find the user's branch
$branch = new Database();
$branch->connect();

//query to find client's branch id
$queryBranchid =   "SELECT distinct `branchid`
                    FROM `clientaccount`
		    WHERE `clientid` = 54010015";
		   //WHERE 'clientid' = $_SESSION["User"];

$branch->query($queryBranchid);
$row=mysql_fetch_array($branch->queryResultsResource);
//setting and getting branchid
$clientAccount->setBranchId($row[branchid]);
$userBranch = $clientAccount->getBranchId();

$branch->close();



echo "The cliend's branch is", $userBranch, "<br/>";
/*
//input for chequing and savings
//I am not using it 'cause I'll have to transfer them to transaction
if (($userAccountChoice == 1)||($userAccountChoice == 2)||
        ($userAccountChoice == 10)||($userAccountChoice == 11))
{echo "<Br/>","Please fill in the amount you'd like to deposit in your new account.";




?>
<table align="centre" border="0">
    <tr> <td width="200"> <input type="text" name="amount"  maxlength=10 /> </td>
        <td width ="200"> <input type="submit" name="submitAmount" value="Submit" /></td>
    </tr>
</table>




<?php
}

$userDeposit=$_POST["amount"];

if (isset($_POST[submitAmount]))
 echo "<br/>", "Amount: ", $userDeposit, "<br/>";
*/

//inserting new account
$newClientAccount = new Database();
$newClientAccount->connect();

$queryAddAccount = "INSERT INTO clientaccount
VALUES (110005001, $userBranch, 54010015, $userAccountChoice, 0.00, 0.00, 1, CURDATE(), 0000-00-00)";

//$queryAddAccount = "INSERT INTO clientaccount SET clientaccountid = '110005000', branchid = '$userBranch', clientid = '54010015'
//accounttypeid = '$userAccountChoice', currentbalance = DEFAULT, availablebalance = DEFAULT, status = '0',
//openingdate = date('Y-m-d'), closingdate = DEFAULT";

$result = $newClientAccount->query($queryAddAccount);



if ($result)
    {
        echo  "<br/>", "You're account has been created!" , "<br/>";
        echo 'Pl. follow the link to make a transfer';
    }
else
    {
        echo 'Sorry, there was a problem inserting values!';
    }

    $newClientAccount->close();
?>
