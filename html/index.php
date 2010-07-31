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
}
if($content=="Statement"){
	echo "For Lena<br />";	
	include ('includes/view/Statements.php');
}
if ($content=="AccountType"){
	echo "For Thomas<br />";
	include ('includes/view/AccountType.php');
}
if ($content=="AddClient"){
	echo "For Abi<br />";
	include ('includes/view/AddClient.php');
}
if($content=="Summary"){
	echo "For Anshu<br />";
	include ('includes/view/Summary.php');
}
if($content==""){
	
}

?>

</div>
</div>

<?php  include ('includes/view/footer.php')?>
