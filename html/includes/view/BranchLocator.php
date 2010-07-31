<?php 
include('includes/model/Branch.Class.php');
echo '<div>';
$branchToDisplay = new Branch();
$branchToDisplay->displayBranch();
echo '</div>';
?>

