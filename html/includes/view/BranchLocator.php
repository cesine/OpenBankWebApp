<?php 
include('includes/model/Branch.Class.php');
echo '<div>';
$branchToDisplay = new Branch();
$branchToDisplay->test();
$branchToDisplay->displayBranch();
echo '</div>';
?>

