<?php  include ('includes/view/header.php')?>

<?php include ('includes/view/menu.php')?>

<table border="0" with="940">
	<tr valign="top">
		<td width="20%"><!-- Sidemenu Cell --> <?php 
		$content = $_GET["content"];
		$topMenu = $_GET["topMenu"];//old way of setting the top menu
		if (isset($_SESSION['User'])){
			$user=unserialize($_SESSION['User']);
			$userIsEmployee=$user->isEmployee();
			$userIsClient=$user->isClient();
			//print_r($user);
		}else{
			$userIsEmployee=false;
			$userIsClient=false;
		}
		/*
		 * Control Logic to change the side menu and set the top menus
		 */
		if($userIsEmployee){
			include ('includes/view/EmployeeSideMenu.php');
			$topMenu="EmployeeTopMenu";
		}elseif($userIsClient){
			include ('includes/view/ClientSideMenu.php');
			$topMenu="ClientTopMenu";
		}elseif($content=="BusinessServices"){
			include ('includes/view/BusinesSideMenu.php');
		}else{
			include ('includes/view/sidemenu.php');
			$topMenu="";
		}
		?></td>
		<td width="80%"><!-- Main Content Cell -->
		<div id="content">
		<div id="main"><?php
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
			}elseif($content=="TransferFunds"){
				include ('includes/view/Transfer.php');
			}elseif($content=="LoginAsClient"){
				include ('includes/view/LoginAsClient.php');
			}elseif($content=="MyEmployeeInfo"){
				include ('includes/view/MyEmployeeInfo.php');
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
			}
		}else{
			//echo "<p>You must log on to access pages".$content."</p>";
		}

		/*
		 * These pages can still be seen with out logging in.
		 * Please move them inside the if(userisClient or userisEmployee) section above
		 * once they are finished, or if they use the user session information
		 */

		if($content=="BranchLocator"){
			include ('includes/view/BranchLocator.php');
		}elseif($content=="Banking"|| $content=="Borrowing" || $content=="Insurance" || $content=="Investing" || $content=="PersonalServices"
		|| $content=="BusinessServices" || $content=="RSP"){
			include('includes/view/AboutTheBank.php');
		}elseif($content=="Welcome"){
			include ('includes/view/Welcome.php');
		}elseif ($content=="OpenNewAccount"){
			include ('includes/view/OpenNewAccount.php');
		}elseif($content=="Login"){
			include ('includes/view/Login.php');
		}elseif($content=="EmployeeLogin"){
			include ('includes/view/EmployeeLogin.php');
		}elseif($content=="EmployeeInfo"){
			include ('includes/view/EmployeeInfo.php');
		}elseif($content=="TestClientAccount"){
			include ('includes/view/TestClientAccount.php');	// need to be removed later !!!
		}elseif($content=="testclientclass"){
			include ('includes/view/testclienta');	// need to be removed later !!!
		}else{
			$content="PersonalServices";
			include('includes/view/AboutTheBank.php');
		}

		?></div>
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