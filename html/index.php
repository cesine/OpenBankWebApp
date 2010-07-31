<?php  include ('includes/view/header.php')?>

<?php include ('includes/view/menu.php')?>

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

<?php  include ('includes/view/footer.php')?>
