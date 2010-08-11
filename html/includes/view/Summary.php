<?php
require_once('includes/model/AccountType.php');
require_once('includes/model/ClientAccount.Class.php');
require_once('includes/model/Client.Class.php');

//echo  'Set the account you want to display on the RecentActivity page using;
	  //$_SESSION[\'DisplayAccount\']=the account id number you want; ';



if (isset($_SESSION['Client']))
{
	$client = unserialize($_SESSION['Client']);
	$clientId = $client->getClientID();

	$client->setClientAccountsArray($clientId);
	
//	echo '<table>';
//	foreach($client->clientAccountsArray as $clientAccount){
//		$clientAccount->displayAccountInRow();
//	}
//	echo '</table>';
}
?>

<?php 
if($content=="AllAccountsSummary")
{
?>

<table width="600" border="1" cellspacing="0" cellpadding="0">
	<tr>
		<td>
		<form name=sumform0 method="post">
		<table width="100%" border="0" cellspacing="0" cellpadding="2">
			<TR class="bgcoloroptionA">
				<TD colSpan=5><FONT class=fieldTitleLeftC><a class="helpLinkC">Business Accounts</a></FONT></TD>
			</TR>
			<TR class="bgcoloroptionB">
				<TD class=fieldTitleLeftC colSpan=2>&nbsp;&nbsp;&nbsp;<a class="helpLinkC">Banking</a></td>
			</tr>

			<TR class="bgcoloroption1">
				<TD class=fieldTitleLeftC width="30%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a class="helpLinkC">Account Name </a></td>
				<TD class=fieldTitleRightC align=right><a class="helpLinkC">Balance</a></td>
			</tr>

			<tr>
				<td colspan=5>
				<table width="100%" border="0" cellspacing="0" cellpadding="2">

<?php 
	$count = count($client->clientBusinessBankingAccountsArray);
	if ( $count != 0 )
	{
		foreach($client->clientBusinessBankingAccountsArray as $clientAccount)
		{
?>
					<tr class='bgcoloroption2'>

						<TD class="acctC" vAlign=top align=left width="50%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a class='accountLinkB'
							href=''><?php echo $clientAccount->getAccountTypeName();?></a></td>
						<TD class="dollarAmountC" vAlign=top align=right><?php echo $clientAccount->getCurrentBalance();?></td>
					</tr>
<?php 
		}//endl if to only print when there are any results
	}
?>
				</table>
				</td>
			</tr>

		</table>
		</form>
	
	</td>
	</tr>

	<tr>
		<td>
		<form name=sumform0 method="post">
		<table width="100%" border="0" cellspacing="0" cellpadding="2">
			<TR class="bgcoloroptionA">
				<TD colSpan=5><FONT class=fieldTitleLeftC><a class="helpLinkC">Personal Accounts</a></FONT></TD>
			</TR>
			<TR class="bgcoloroptionB">
				<TD class=fieldTitleLeftC colSpan=2>&nbsp;&nbsp;<a class="helpLinkC">Banking</a></td>
			</tr>

			<TR class="bgcoloroption1">
				<TD class=fieldTitleLeftC width="30%">&nbsp;&nbsp;&nbsp;<a class="helpLinkC">Account Name </a></td>
				<TD class=fieldTitleRightC align=right><a class="helpLinkC">Balance</a></td>
			</tr>

			<tr>
				<td colspan=5>
				<table width="100%" border="0" cellspacing="0" cellpadding="2">
		
<?php
 	$count = count($client->clientPersonalBankingAccountsArray);
	if ( $count != 0 )
	{
		foreach($client->clientPersonalBankingAccountsArray as $clientAccount)
		{
?>
					<tr class='bgcoloroption2'>

						<TD class="acctC" vAlign=top align=left width="30%"><a
							class='accountLinkB'
							href='/portal/index.jsp?pageID=financial_services_banking&reqOption=AccountDetails&accountNum=DDA;CA;DDA;CA;CAD;3648.09999999999990905052982270717620849609375;2322629620217624967@3708478640705414144'><?php echo $clientAccount->getAccountTypeName();?></a></td>
						<TD class="dollarAmountC" vAlign=top align=right><?php echo $clientAccount->getCurrentBalance();?></td>
					</tr>
<?php 
		}//endl if to only print when there are any results
	}
?>
				</table>
				</td>
			</tr>

			<TR class="bgcoloroptionB">
				<TD class=fieldTitleLeftC colSpan=2><a class="helpLinkC">Investment</a></td>
				<TD class="bgcoloroption2">&nbsp;</td>
			</tr>

			<TR class="bgcoloroption1">
				<TD class=fieldTitleLeftC width="30%"><a class="helpLinkC">Account Name </a></td>
				<TD class=fieldTitleRightC align=right><a class="helpLinkC">Balance</a></td>
			</tr>

			<tr>
				<td colspan=5>
				<table width="100%" border="0" cellspacing="0" cellpadding="2">

<?php 
 	$count = count($client->clientPersonalInvestingAccountsArray);
 	if ( $count != 0 )
	{
		foreach($client->clientPersonalInvestingAccountsArray as $clientAccount)
		{
?>
					<tr class='bgcoloroption2'>

						<TD class="acctC" vAlign=top align=left width="30%"><a
							class='accountLinkB'
							href='/portal/index.jsp?pageID=financial_services_banking&reqOption=AccountDetails&accountNum=DDA;CA;DDA;CA;CAD;3648.09999999999990905052982270717620849609375;2322629620217624967@3708478640705414144'><?php echo $clientAccount->getAccountTypeName();?></a></td>
						<TD class="dollarAmountC" vAlign=top align=right width="19%"><?php echo $clientAccount->getCurrentBalance();?></td>
					</tr>
<?php 
		}//endl if to only print when there are any results
	}
?>
				</table>
				</td>
			</tr>

			<TR class="bgcoloroptionB">
				<TD class=fieldTitleLeftC colSpan=2><a class="helpLinkC">Borrowing</a></td>
				<TD class="bgcoloroption2">&nbsp;</td>
			</tr>

			<TR class="bgcoloroption1">
				<TD class=fieldTitleLeftC width="30%"><a class="helpLinkC">Account Name </a></td>
				<TD class=fieldTitleRightC align=right><a class="helpLinkC">Balance</a></td>
			</tr>

			<tr>
				<td colspan=5>
				<table width="100%" border="0" cellspacing="0" cellpadding="2">

<?php 
 	$count = count($client->clientPersonalBorrowingAccountsArray);
	if ( $count != 0 )
	{
		foreach($client->clientPersonalBorrowingAccountsArray as $clientAccount)
		{
?>
					<tr class='bgcoloroption2'>

						<TD class="acctC" vAlign=top align=left width="30%"><a
							class='accountLinkB'
							href='/portal/index.jsp?pageID=financial_services_banking&reqOption=AccountDetails&accountNum=DDA;CA;DDA;CA;CAD;3648.09999999999990905052982270717620849609375;2322629620217624967@3708478640705414144'><?php echo $clientAccount->getAccountTypeName();?></a></td>
						<TD class="dollarAmountC" vAlign=top align=right width="19%"><?php echo $clientAccount->getCurrentBalance();?></td>
					</tr>
<?php 
		}//endl if to only print when there are any results
	}
?>
				</table>
				</td>
			</tr>

			<TR class="bgcoloroptionB">
				<TD class=fieldTitleLeftC colSpan=2><a class="helpLinkC">Insurance</a></td>
				<TD class="bgcoloroption2">&nbsp;</td>
			</tr>

			<TR class="bgcoloroption1">
				<TD class=fieldTitleLeftC width="30%"><a class="helpLinkC">Account Name </a></td>
				<TD class=fieldTitleRightC  width="19%" align=right><a class="helpLinkC">Balance</a></td>
				<TD width="2%" class="bgcoloroption2">&nbsp;</TD>
			</tr>

			<tr>
				<td colspan=5>
				<table width="100%" border="0" cellspacing="0" cellpadding="2">

<?php 
 	$count = count($client->clientPersonalInsuranceAccountsArray);
	if ( $count != 0 )
	{
		foreach($client->clientPersonalInsuranceAccountsArray as $clientAccount)
		{
?>
					<tr class='bgcoloroption2'>

						<TD class="acctC" vAlign=top align=left width="30%"><a
							class='accountLinkB'
							href='/portal/index.jsp?pageID=financial_services_banking&reqOption=AccountDetails&accountNum=DDA;CA;DDA;CA;CAD;3648.09999999999990905052982270717620849609375;2322629620217624967@3708478640705414144'><?php echo $clientAccount->getAccountTypeName();?></a></td>
						<TD class="dollarAmountC" vAlign=top align=right width="19%"><?php echo $clientAccount->getCurrentBalance();?></td>
					</tr>
<?php 
		}//endl if to only print when there are any results
	}
?>
				</table>
				</td>
			</tr>
		</table>
		</form>
	</td>
	</tr>
</table>
<?php
 }
?>




<?php 
if($content=="BankingSummary")
{
?>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td>
		<form name=sumform0 method="post">
		<table width="100%" border="0" cellspacing="0" cellpadding="2">
			<TR class="bgcoloroptionA">
				<TD colSpan=5><FONT class=fieldTitleLeftC><a class="helpLinkC">Business Accounts</a></FONT></TD>
			</TR>
			<TR class="bgcoloroptionB">
				<TD class=fieldTitleLeftC colSpan=2><a class="helpLinkC">Banking</a></td>
			</tr>

			<TR class="bgcoloroption1">
				<TD class=fieldTitleLeftC width="30%"><a class="helpLinkC">Account Name </a></td>
				<TD class=fieldTitleRightC align=right><a class="helpLinkC">Balance</a></td>
			</tr>

			<tr>
				<td colspan=5>
				<table width="100%" border="0" cellspacing="0" cellpadding="2">

<?php 
	$count = count($client->clientBusinessBankingAccountsArray);
	if ( $count != 0 )
	{
		foreach($client->clientBusinessBankingAccountsArray as $clientAccount)
		{
?>
					<tr class='bgcoloroption2'>

						<TD class="acctC" vAlign=top align=left width="30%"><a
							class='accountLinkB'
							href='index.php?&content=RecentActivity&accountNum=DDA;CA;DDA;CA;CAD;3648.09999999999990905052982270717620849609375;2322629620217624967@3708478640705414144'><?php echo $clientAccount->getAccountTypeName();?></a></td>
						<TD class="dollarAmountC" vAlign=top align=right><?php echo $clientAccount->getCurrentBalance();?></td>
					</tr>
<?php 
		}//endl if to only print when there are any results
	}
?>
				</table>
				</td>
			</tr>

		</table>
		</form>
	
	</td>
	</tr>

	<tr>
		<td>
		<form name=sumform0 method="post">
		<table width="100%" border="0" cellspacing="0" cellpadding="2">
			<TR class="bgcoloroptionA">
				<TD colSpan=5><FONT class=fieldTitleLeftC><a class="helpLinkC">Personal Accounts</a></FONT></TD>
			</TR>
			<TR class="bgcoloroptionB">
				<TD class=fieldTitleLeftC colSpan=2><a class="helpLinkC">Banking</a></td>
			</tr>

			<TR class="bgcoloroption1">
				<TD class=fieldTitleLeftC width="30%"><a class="helpLinkC">Account Name </a></td>
				<TD class=fieldTitleRightC align=right><a class="helpLinkC">Balance</a></td>
			</tr>

			<tr>
				<td colspan=5>
				<table width="100%" border="0" cellspacing="0" cellpadding="2">
		
<?php
 	$count = count($client->clientPersonalBankingAccountsArray);
	if ( $count != 0 )
	{
		foreach($client->clientPersonalBankingAccountsArray as $clientAccount)
		{
?>
					<tr class='bgcoloroption2'>

						<TD class="acctC" vAlign=top align=left width="30%"><a
							class='accountLinkB'
							href='/portal/index.jsp?pageID=financial_services_banking&reqOption=AccountDetails&accountNum=DDA;CA;DDA;CA;CAD;3648.09999999999990905052982270717620849609375;2322629620217624967@3708478640705414144'><?php echo $clientAccount->getAccountTypeName();?></a></td>
						<TD class="dollarAmountC" vAlign=top align=right><?php echo $clientAccount->getCurrentBalance();?></td>
					</tr>
<?php 
		}//endl if to only print when there are any results
	}
?>
				</table>
				</td>

			</tr>
		</table>
		</form>
	</td>
	</tr>
</table>
<?php
 }
?>




<?php 
if($content=="InvestingSummary")
{
?>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td>
		<form name=sumform0 method="post">
		<table width="100%" border="0" cellspacing="0" cellpadding="2">
			<TR class="bgcoloroptionA">
				<TD colSpan=5><FONT class=fieldTitleLeftC><a class="helpLinkC">Personal Accounts</a></FONT></TD>
			</TR>

			<TR class="bgcoloroptionB">
				<TD class=fieldTitleLeftC colSpan=2><a class="helpLinkC">Investment</a></td>
				<TD class="bgcoloroption2">&nbsp;</td>
			</tr>

			<TR class="bgcoloroption1">
				<TD class=fieldTitleLeftC width="30%"><a class="helpLinkC">Account Name </a></td>
				<TD class=fieldTitleRightC align=right><a class="helpLinkC">Balance</a></td>
			</tr>

			<tr>
				<td colspan=5>
				<table width="100%" border="0" cellspacing="0" cellpadding="2">

<?php 
 	$count = count($client->clientPersonalInvestingAccountsArray);
 	if ( $count != 0 )
	{
		foreach($client->clientPersonalInvestingAccountsArray as $clientAccount)
		{
?>
					<tr class='bgcoloroption2'>

						<TD class="acctC" vAlign=top align=left width="30%"><a
							class='accountLinkB'
							href='/portal/index.jsp?pageID=financial_services_banking&reqOption=AccountDetails&accountNum=DDA;CA;DDA;CA;CAD;3648.09999999999990905052982270717620849609375;2322629620217624967@3708478640705414144'><?php echo $clientAccount->getAccountTypeName();?></a></td>
						<TD class="dollarAmountC" vAlign=top align=right width="19%"><?php echo $clientAccount->getCurrentBalance();?></td>
					</tr>
<?php 
		}//endl if to only print when there are any results
	}
?>
				</table>
				</td>
			</tr>
		</table>
		</form>
	</td>
	</tr>
</table>
<?php
} 
?>			
			

<?php 
if($content=="BorrowingSummary")
{
?>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td>
		<form name=sumform0 method="post">
		<table width="100%" border="0" cellspacing="0" cellpadding="2">
			<TR class="bgcoloroptionA">
				<TD colSpan=5><FONT class=fieldTitleLeftC><a class="helpLinkC">Personal Accounts</a></FONT></TD>
			</TR>

			<TR class="bgcoloroptionB">
				<TD class=fieldTitleLeftC colSpan=2><a class="helpLinkC">Borrowing</a></td>
				<TD class="bgcoloroption2">&nbsp;</td>
			</tr>

			<TR class="bgcoloroption1">
				<TD class=fieldTitleLeftC width="30%"><a class="helpLinkC">Account Name </a></td>
				<TD class=fieldTitleRightC align=right><a class="helpLinkC">Balance</a></td>
			</tr>

			<tr>
				<td colspan=5>
				<table width="100%" border="0" cellspacing="0" cellpadding="2">

<?php 
 	$count = count($client->clientPersonalBorrowingAccountsArray);
	if ( $count != 0 )
	{
		foreach($client->clientPersonalBorrowingAccountsArray as $clientAccount)
		{
?>
					<tr class='bgcoloroption2'>

						<TD class="acctC" vAlign=top align=left width="30%"><a
							class='accountLinkB'
							href='/portal/index.jsp?pageID=financial_services_banking&reqOption=AccountDetails&accountNum=DDA;CA;DDA;CA;CAD;3648.09999999999990905052982270717620849609375;2322629620217624967@3708478640705414144'><?php echo $clientAccount->getAccountTypeName();?></a></td>
						<TD class="dollarAmountC" vAlign=top align=right width="19%"><?php echo $clientAccount->getCurrentBalance();?></td>
					</tr>
<?php 
		}//endl if to only print when there are any results
	}
?>
				</table>
				</td>
			</tr>
		</table>
		</form>
	</td>
	</tr>
</table>
<?php
 }
?>

<?php 
if($content=="InsuranceSummary")
{
?>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td>
		<form name=sumform0 method="post">
		<table width="100%" border="0" cellspacing="0" cellpadding="2">
			<TR class="bgcoloroptionA">
				<TD colSpan=5><FONT class=fieldTitleLeftC><a class="helpLinkC">Personal Accounts</a></FONT></TD>
			</TR>

			<TR class="bgcoloroptionB">
				<TD class=fieldTitleLeftC colSpan=2><a class="helpLinkC">Insurance</a></td>
				<TD class="bgcoloroption2">&nbsp;</td>
			</tr>

			<TR class="bgcoloroption1">
				<TD class=fieldTitleLeftC width="30%"><a class="helpLinkC">Account Name </a></td>
				<TD class=fieldTitleRightC align=right><a class="helpLinkC">Balance</a></td>
			</tr>

			<tr>
				<td colspan=5>
				<table width="100%" border="0" cellspacing="0" cellpadding="2">

<?php 
 	$count = count($client->clientPersonalInvestingAccountsArray);
 	if ( $count != 0 )
	{
		foreach($client->clientPersonalInvestingAccountsArray as $clientAccount)
		{
?>
					<tr class='bgcoloroption2'>

						<TD class="acctC" vAlign=top align=left width="30%"><a
							class='accountLinkB'
							href='/portal/index.jsp?pageID=financial_services_banking&reqOption=AccountDetails&accountNum=DDA;CA;DDA;CA;CAD;3648.09999999999990905052982270717620849609375;2322629620217624967@3708478640705414144'><?php echo $clientAccount->getAccountTypeName();?></a></td>
						<TD class="dollarAmountC" vAlign=top align=right width="19%"><?php echo $clientAccount->getCurrentBalance();?></td>
					</tr>
<?php 
		}//endl if to only print when there are any results
	}
?>
				</table>
				</td>
			</tr>
		</table>
		</form>
	</td>
	</tr>
</table>
<?php
 }
?>
