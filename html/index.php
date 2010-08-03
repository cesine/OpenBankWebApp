<?php  include ('includes/view/header.php')?>

<?php include ('includes/view/menu.php')?>


<table border="1" with="940"><tr valign="top"><td width="20%">
<!-- Sidemenu Cell -->

<?php 
$content = $_GET["content"];
$topMenu = $_GET["topMenu"];
if($content!="EmployeeLogin" && $content!="ViewEmployeeInfo")
{
	include ('includes/view/sidemenu.php');
}
?>

</td><td width= "80%">
<!-- Main Content Cell -->
<div id="content">
<div id="main">

<?php
/*
 * Control logic to change which small top menu to display in the main window
 */
if($topMenu =="ClientTopMenu")
{
	include ('includes/view/clienttopmenu.php');
}
elseif($topMenu=="EmployeeTopMenu")
{
	include ('includes/view/employeetopmenu.php');	
}
else
{
	include ('includes/view/clienttopmenu.php');
}


/*
 * Main Control Switch to change which page to display
 */

if($content=="BranchLocator"){	
	include ('includes/view/BranchLocator.php');
}elseif($content=="Welcome"){
	include ('includes/view/Welcome.php');
}elseif($content=="Statement"){
	include ('includes/view/Statements.php');
}elseif ($content=="AccountType"){
	include ('includes/view/AccountType.php');
}elseif ($content=="AddClient"){
	include ('includes/view/AddClient.php');
}elseif ($content=="OpenNewAccount"){
	include ('includes/view/OpenNewAccount.php');
}elseif($content=="Summary"){
	include ('includes/view/Summary.php');
}elseif($content=="ViewAccount"){
	include ('includes/view/ViewAccounts.php');
}elseif($content=="Login"){
	include ('includes/view/Login.php');
}elseif($content=="TransferFunds"){
	include ('includes/view/Transfer.php');
}elseif($content=="EmployeeLogin"){
	include ('includes/view/EmployeeLogin.php');
}elseif($content=="ViewEmployeeInfo"){
	include ('includes/view/ViewEmployeeInfo.php');	
}elseif($content=="EmployeeInterface"){
	echo '<a href="?&content=Summary">View a Clients Info</a>
	</p>
	<p>
	List Employees<br />
	Add Employee<br />
	Modify Employee<br />
	Delete Employee<br />
	</p>
	';
}else{
	include ('includes/view/Welcome.php');
}

?>
</div>
</div>
</td></tr></table>


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