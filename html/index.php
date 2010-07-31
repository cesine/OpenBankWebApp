<?php  include ('includes/view/header.php')?>

<?php include ('includes/view/menu.php')?>

<div id="content">
<div id="main">

<?php



//for debugging this will print out all the information in the session
echo'<hr><p>/n';
print_r($_SESSION);
echo '<hr><p>';

if($_GET['content']='BranchLocator'){
	include ('includes/view/BranchLocator.php');
}

?>

</div>
</div>

<?php  include ('includes/view/footer.php')?>
