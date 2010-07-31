<?php  include ('includes/view/header.php')?>

<?php include ('includes/view/menu.php')?>

<div id="content">
<div id="main">

<?php



//for debugging this will print out all the information in the session
echo'<hr><p>';
print_r($_SESSION);	
echo '<hr><p>';

$content == $_GET['content'];
echo 'The content to display is '.$content;

if($content=='BranchLocator'){	
	include ('includes/view/BranchLocator.php');
}

?>

</div>
</div>

<?php  include ('includes/view/footer.php')?>
