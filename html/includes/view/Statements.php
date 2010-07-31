<?php 
include('includes/model/Transaction.Class.php');
echo '<div>';
$transactionToDisplay = new Transaction();
$transactionToDisplay->displayTransaction();
echo '</div>';
?>