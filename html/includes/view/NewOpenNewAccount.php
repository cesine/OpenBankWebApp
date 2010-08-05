
<?php 
//client is opening a new account

require_once('includes/model/ClientAccount.Class.php');

echo "<form action='?&content=OpenNewAccount method='POST'>";
?>



<P>Please select your choice.</P>
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
<table border="1"> 
<tr><td>Account name:</td><td><select name="accountType" size="15" single="single">
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
<P></P>

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
	echo "You picked account type", $clientAccount->getAccountTypeId();
}
?>


