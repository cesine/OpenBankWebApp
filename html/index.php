<?php  include ('includes/view/header.php')?>

<?php include ('includes/view/menu.php')?>


<table><tr><td>
<!-- Sidemenu Cell -->

<table width="145" 
	style="BORDER-RIGHT: #999966 1px solid; PADDING-RIGHT: 5px; BORDER-TOP: #999966 1px solid; PADDING-LEFT: 5px; FONT-SIZE: 12px; PADDING-BOTTOM: 5px; BORDER-LEFT: #999966 1px solid; PADDING-TOP: 5px; BORDER-BOTTOM: #999966 1px solid; FONT-FAMILY: verdana, arial, sans-serif; BACKGROUND-COLOR: #f9f9f0; TEXT-ALIGN: left">
	<tbody>
	<tr>
		<td colspan="2" class="bgcoloroption0">
		<div align="center">
		<p class="fieldTitleLeftC">Application Centre</p>
		</div>
		</td>
	</tr>

	<tr valign="middle">
		<td width="14" height="21" align="center"><img
		src="/images/red_bullet_trans.gif" width="6" height="7"></td>
		<td width="124"><a
		href="/portal/index.jsp?pageID=financial_services_banking&subPageId=Banking_Accounts&reqOption=DepositAccountOpen&action=display"
		class="linkVertMenu">Open an Account</a></td>
	</tr>

	<tr valign="middle">
		<td height="22" align="center"><img
		src="/images/red_bullet_trans.gif" width="6" height="7"></td>
		<td><a
		href="/portal/index.jsp?pageID=borrowing&subPageId=Borrowing_Apply&reqOption=SpecialRequests&module=apply"
		class="linkVertMenu">Transfer Funds</a></td>
	</tr>

	<tr valign="middle">
		<td height="36" align="center"><img
		src="/images/red_bullet_trans.gif" width="6" height="7"></td>
		<td><a
		href="javascript:surfToHyperLinkWindow('https://access.scotiamcleoddirect.com')"
		class="linkVertMenu">Debit</a></td>
	</tr>

	<tr valign="middle">
		<td height="21" align="center"><img
		src="/images/red_bullet_trans.gif" width="6" height="7"></td>
		<td><a
		href="/portal/SopInvestmentNav.jsp?func=ctx&subfunction=clrSelAcct&ctxId=411000"
		class="linkVertMenu">Credit</a></td>
	</tr>
</tbody>
</table>
<?php ?>

</td><td>
<!-- Main Content Cell -->
<div id="content">
<div id="main">
<?php

//for debugging this will print out all the information in the session
echo'<hr><p>';
print_r($_SESSION);	
echo '<hr><p>';

$content = $_GET["content"];
echo 'The content to display is '.$content;

if($content=="BranchLocator"){
	echo "For Gina<br />";	
	include ('includes/view/BranchLocator.php');
}elseif($content=="Statement"){
	echo "For Lena<br />";	
	include ('includes/view/Statements.php');
}elseif ($content=="AccountType"){
	echo "For Thomas<br />";
	include ('includes/view/AccountType.php');
}elseif ($content=="AddClient"){
	echo "For Abi<br />";
	include ('includes/view/AddClient.php');
}elseif($content=="Summary"){
	echo "For Anshu<br />";
	include ('includes/view/Summary.php');
}elseif($content=="ViewAccount"){
	echo "For Thomas<br />";
	include ('includes/view/ViewAccounts.php');
}elseif($content=="Login"){
	include ('includes/view/Login.php');
}elseif($content=="TransferFunds"){
	include ('includes/view/Transfer.php');
}
else{
	echo "Content is null<br />".$content;
	include ('includes/view/Summary.php');
}

?>
</div>
</div>
</td></tr></table>


<?php  include ('includes/view/footer.php')?>
