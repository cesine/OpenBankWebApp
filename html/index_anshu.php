<?php  include ('includes/view/header_anshu.php')?>

 <?php include ('includes/view/menu.php')?>

<?php
$content = $_GET["content"];
$topMenu = $_GET["topMenu"];//old way of setting the top menu
$userIsEmployee=false;
$userIsClient=false;
?>

<table border="0" width="940">

	<tr valign="top">
	<td width="100%">
		<?php
		/*
		 * Control logic to change which small top menu to display in the main window
		 */
		if($topMenu =="ClientTopMenu"){
			include ('includes/view/clienttopmenu.php');
		}elseif($topMenu=="EmployeeTopMenu"){
			include ('includes/view/employeetopmenu.php');	
		}else{
			include ('includes/view/topmenu.php');
		}
		?>
	</td></tr>
	
	<tr valign="top">
		<td width="20%">
<!-- Sidemenu Cell -->

<?php 
//$content = $_GET["content"];
//$topMenu = $_GET["topMenu"];//old way of setting the top menu
//$userIsEmployee=false;
//$userIsClient=false;
if (isset($_SESSION['Client'])){
	$client=unserialize($_SESSION['Client']);
	$userIsClient=true;
}
if (isset($_SESSION['Employee'])){
	$employee=unserialize($_SESSION['Employee']);
	$userIsEmployee=true;
}
/*
 * Control Logic to change the side menu and set the top menus
 */
if($userIsEmployee){
	include ('includes/view/EmployeeSideMenu.php'); 
	$topMenu="EmployeeTopMenu";
}
if($userIsClient){
	include ('includes/view/ClientSideMenu.php');
	$topMenu="ClientTopMenu";
}
if($content=="BusinessServices"){
	include ('includes/view/BusinesSideMenu.php');
}
if(!($userIsEmployee) && !($userIsClient)&& $content!="BusinessServices"){
	include ('includes/view/sidemenu.php'); 
	$topMenu="";
}
?>

</td>
<td width= "80%">

<!--<?php
/*
 * Control logic to change which small top menu to display in the main window
 */
if($topMenu =="ClientTopMenu"){
	include ('includes/view/clienttopmenu.php');
}elseif($topMenu=="EmployeeTopMenu"){
	include ('includes/view/employeetopmenu.php');	
}else{
	include ('includes/view/topmenu.php');
}
?>

-->
<!-- Main Content Cell -->
<div id="content">
<div id="main">
<?php 
/*
 * Main Control Switch to change which page to display
 */
if($userIsClient || $userIsEmployee){
	if($content=="Statement"){
		include ('includes/view/Statements.php');
	}elseif ($content=="AccountType"){
		include ('includes/view/AccountType.php');
	}elseif ($content=="AddClient"){
		include ('includes/view/AddClient.php');
	}elseif($content=="AllAccountsSummary" || $content=="BankingSummary" 
				|| $content=="InvestingSummary" || $content=="BorrowingSummary" 
				|| $content=="InsuranceSummary"){
		include ('includes/view/Summary.php');
	}elseif($content=="ViewAccount"){
		include ('includes/view/ViewAccounts.php');
	}elseif($content=="RecentActivity"){
		include ('includes/view/RecentActivity.php');
	}elseif($content=="TransferFunds"){
		include ('includes/view/Transfer.php');
	}elseif($content=="LoginAsClient"){
		include ('includes/view/LoginAsClient.php');
	}elseif($content=="MyEmployeeInfo"){
		include ('includes/view/MyEmployeeInfo.php');		
	}elseif($content=="EmployeeInfo"){
		include ('includes/view/EmployeeInfo.php');			
	}elseif($content=="ViewEmployeeInfo"){
		include ('includes/view/ViewEmployeeInfo.php');	
	}elseif($content=="AddEmployee"){
		include ('includes/view/AddEmployee.php');	
	}elseif($content=="ModifyEmployee"){
		include ('includes/view/ModifyEmployee.php');	
	}elseif($content=="DeactivateEmployee"){
		include ('includes/view/DeactivateEmployee.php');	
	}elseif($content=="ZViewEmployeeInfo"){
		include ('includes/view/ZViewEmployeeInfo.php');
	}elseif($content=="TestClientAccount"){
		include ('includes/view/TestClientAccount.php');	// need to be removed later !!!	
	}elseif($content=="testclientclass"){
		include ('includes/view/testclientclass.php');	// need to be removed later !!!	
	}elseif($content=="TestModel"){
		include ('includes/view/TestModel.php');	// need to be removed later !!!	
	}else{
	//echo "<p>You must log on to access pages".$content."</p>";
	}
}

/*
 * These pages can still be seen with out logging in.
 * Please move them inside the if(userisClient or userisEmployee) section above 
 * once they are finished, or if they use the user session information
 */

if($content=="BranchLocator"){	
	include ('includes/view/BranchLocator.php');
}elseif($content=="Banking"|| $content=="Borrowing" || $content=="Insurance" || $content=="Investing" || $content=="PersonalServices" 
			|| $content=="BusinessServices" || $content=="RSP" || $content=="TFSA" || $content=="Chequing" || $content=="Savings" 
			|| $content=="ForeignCurrency" || $content=="LifeInsurance" || $content=="CreditCards" || $content=="LineOfCredit")
			{
				include('includes/view/AboutTheBank.php');
}elseif($content=="Welcome"){
	include ('includes/view/Welcome.php');
}elseif ($content=="OpenNewAccount"){
	include ('includes/view/OpenNewAccount.php');
}elseif($content=="Login"){
	include ('includes/view/Login.php');
}elseif($content=="EmployeeLogin"){
	include ('includes/view/EmployeeLogin.php');
}elseif($content==""){
	$content="PersonalServices";
	include('includes/view/AboutTheBank.php');
}

?>

</div>
</div>
</td>
</tr>
</table>


<?php  include ('includes/view/footer.php')?>
<?php 
//for debugging this will print out all the information in the session
echo'<hr><p><font color="red">Begin Debugging: </p><p>Printing the Session information in case you need to see it </font></p>';
echo '<blockquote>';
print_r($_SESSION);	
echo '</blockquote>';
echo '<p><font color="red">Printing the URL information in case you need to see it (eg, index.php?&variable=value)</font></p>';
echo '<blockquote>';
print_r($_GET);
echo '</blockquote>';
echo '<p><font color="red">Printing the Post information in case you need to see it (eg, information that you submitted using the PoST method in a form) </font></p>';
echo '<blockquote>';
print_r($_POST);
echo '</blockquote>';
echo '<font color="red">The content to display is '.$content;
echo '<p>End Debugging.</font</p><hr>';
?>