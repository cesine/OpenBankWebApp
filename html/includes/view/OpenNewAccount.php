
<?php 
//client is opening a new account
require_once('includes/model/AccountType.php');
require_once('includes/model/ClientAccount.Class.php');


echo "<form action='?&content=OpenNewAccount' method='POST'>";



 
//session variable	
if (isset($_SESSION['Client']))
{
	$client = unserialize($_SESSION['Client']);
	$clientName = $client->getFirstName()." ".$client->getLastName();
	$userBranch = $client->getBranchID();
	$clientID = $client->getClientID();
}


echo "Dear ", $clientName, ", please choose the account you'd like to open.<br/>";

//object to call planlist
//$banking = new AccountType();
//object to call ClientAccount
$clientAccount = new ClientAccount();
//object for the Database to find the user's branch


//checking branch query result
//echo "The cliend's branch is", $userBranch, "<br/>";
 ?>
<p>&nbsp;</p>
 <b > <big> Account Types </big></b>
 <p>&nbsp;</p>
 
<table border="0">
    <tr><td > <b> <u>Banking Plans</u> </b></td> <td>&nbsp;&nbsp;&nbsp;</td> <td > <b><u> Insurance Plans </u></b> </td></tr>

<tr><td><select name="accountType" size="5" >
<option value="powerChecking">Powerchequing Account</option>
<option value="moneyMasterSavings">Money Master Savings Account</option>
<option value="usDollarAccount">US Dollar Account</option>
<option value="businessChecking">Basic Business Chequing Account</option>
<option value="businessSavings">Basic Business Savings Account</option>
<option value="businessFC">Basic Business Foreign Currency Account</option>
        </select></td>
        <td>&nbsp;&nbsp;&nbsp;</td>
    <td><select name="accountType" size="5" >
<option value="lifeOne">Accidental Death Insurance - 1</option>
<option value="lifeTwo">Accidental Death Insurance - 2</option>
<option value="lifeThree">Accidental Death Insurance - 3</option>
<option value="lifeFour">Accidental Death Insurance - 4</option>
        </select> </td></tr>
<tr>&nbsp;</tr>
<tr>&nbsp;</tr>
<tr>&nbsp;</tr>
<tr>&nbsp;</tr>
<tr><td > <b><u> Investment Plans </u></b></td> <td>&nbsp;&nbsp;&nbsp;</td> <td > <b><u> Borrowing Plans </u></b> </td></tr>

<tr><td><select name="accountType" size="5" >
<option value="rSPSix">GIC(6mos) with Flex for RSPs Account</option>
<option value="rSPTwelve">GIC(12mos) with Flex for RSPs Account</option>
<option value="rSPEighteen">GIC(18mos) with Flex for RSPs Account</option>
<option value="rSPTFour">GIC(24mos) with Flex for RSPs Account</option>
<option value="tSFASix">GIC with Flex for TFSAs Account</option>
<option value="tSFAtwelve">GIC(12mos) with Flex for TFSAs Account</option>
<option value="tSFAEighteen">GIC(18mos) with Flex for TFSAs Account</option>
<option value="tSFATfour">GIC(24mos) with Flex for TFSAs Account</option>
        </select></td>
        <td>&nbsp;&nbsp;&nbsp;</td>
     <td><select name="accountType" size="5" >
<option value="creditCard">Credit Card No-Fee Value VISA</option>
<option value="lineOfCredits">Basic Line of Credit</option>
</select></td></tr>


</table>

<!--dynamic list

<table  border="1">
     
    <tr><th > Banking Plans </th> <td > <b> Insurance Plans</b> </td></tr>
    <tr><td > <?php //$banking->bankingPlans();?> </td>
        <td > <?php //$banking->insurancePlans(); ?> </td></tr>

    <tr><th > Borrowing Plans </th> <td ><b> Investment Plans</b> </td></tr>
    <tr><td > <?php //$banking->borrowingPlans(); ?> </td>
        <td > <?php //$banking->investPlans(); ?> </td></tr>

</table>

-->
<p>&nbsp;</p>
<input type="submit" name="submitAccountName" value="Submit" />
<input type="reset" name="submitReset" value="Reset" />
<p>&nbsp;</p>

<?php

$userChoice=$_POST["accountType"];


//belongs to the firsttable
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

	


/*belongs to the second table

if (isset($_POST['submitAccountName']))
{
    if (!strcmp($userChoice,"Powerchequing Account"))
         $clientAccount->setAccountTypeId(1);
    elseif (!strcmp($userChoice,"Money Master Savings Account"))
         $clientAccount->setAccountTypeId(2);
    elseif (!strcmp($userChoice,"US Dollar Account"))
         $clientAccount->setAccountTypeId(3);
    elseif (!strcmp($userChoice,"Basic Business Chequing Account"))
         $clientAccount->setAccountTypeId(10);
    elseif (!strcmp($userChoice,"Basic Business Savings Account"))
         $clientAccount->setAccountTypeId(11);
    elseif (!strcmp($userChoice,"Basic Business Foreign Currency Account"))
         $clientAccount->setAccountTypeId(12);
    elseif (!strcmp($userChoice,"GIC(6mos) with Flex for RSPs Account"))
         $clientAccount->setAccountTypeId(6);
    elseif (!strcmp($userChoice,"GIC(6mos) with Flex for TFSAs Account"))
         $clientAccount->setAccountTypeId(7);
    elseif (!strcmp($userChoice,"GIC(24mos) with Flex for RSPs Account"))
         $clientAccount->setAccountTypeId(9);
    elseif (!strcmp($userChoice,"GIC(12mos) with Flex for RSPs Account"))
         $clientAccount->setAccountTypeId(13);
    elseif (!strcmp($userChoice,"GIC(18mos) with Flex for RSPs Account"))
         $clientAccount->setAccountTypeId(14);
    elseif (!strcmp($userChoice,"GIC(12mos) with Flex for TFSAs Account"))
         $clientAccount->setAccountTypeId(15);
    elseif (!strcmp($userChoice,"GIC(18mos) with Flex for TFSAs Account"))
         $clientAccount->setAccountTypeId(16);
    elseif (!strcmp($userChoice,"GIC(24mos) with Flex for TFSAs Account"))
         $clientAccount->setAccountTypeId(17);
    elseif (!strcmp($userChoice,"Accidental Death Insurance - 1"))
         $clientAccount->setAccountTypeId(8);
    elseif (!strcmp($userChoice,"Accidental Death Insurance - 2"))
         $clientAccount->setAccountTypeId(18);
    elseif (!strcmp($userChoice,"Accidental Death Insurance - 3"))
         $clientAccount->setAccountTypeId(19);
    elseif (!strcmp($userChoice,"Accidental Death Insurance - 4"))
         $clientAccount->setAccountTypeId(20);
    elseif (!strcmp($userChoice,"Credit Card No-Fee Value VISA"))
         $clientAccount->setAccountTypeId(4);
    elseif (!strcmp($userChoice,"Basic Line of Credit"))
         $clientAccount->setAccountTypeId(5);
    else echo"Please try again.<br/>";

}
else
    $clientAccount->setAccountTypeId('');

*/

$userAccountChoice = $clientAccount->getAccountTypeId();

//printing user's choice, comment it out later on
echo  "<br/>", "You picked account type ", $userAccountChoice, "<br/>";




//print new clientaccountid to check
echo "Max: ", $maxClientAcID, "<br/>";
$newClientAcID=$maxClientAcID+1;
echo "Your new account number is :", $newClientAcID, "<br/";


//inserting new account
//$newClientAccount = new Database();
//$newClientAccount->connect();
//
//$queryAddAccount = "INSERT INTO clientaccount
//VALUES ($newClientAcID, $userBranch, 54010015, $userAccountChoice, 0.00, 0.00, 1, CURDATE(), 0000-00-00)";
//$newClientAcc = new Client($newClientAcID, $userBranch, 54010015, $userAccountChoice, 0.00, 0.00, 1, CURDATE(), 0000-00-00)
//
//
//$newClientAccount->query($queryAddAccount);



if ($newClientAccount->queryResultsResource)
    {
        echo  "<br/>", "You're account has been created!" , "<br/>";
        echo 'Pl. follow the link to make a ';
        ?>
<a href = "index.php?&content=Transfer">transaction</a>

       <?php
       echo ' in your new account. <br/>';
    }
else
    {
        //echo 'Sorry, there was a problem inserting values! ';
        ?>
<a href = "index.php?&content=OpenNewAccount">Please try again</a>
       <?php
    }

    $newClientAccount->close();

    }
//end of if
?>
