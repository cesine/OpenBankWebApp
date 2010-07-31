<?php 
include('includes/model/Transaction.Class.php');
echo '<div>';
$transactionToDisplay = new Transaction();
$transactionToDisplay->displayTest();
$transactionToDisplay->displayTransaction();
echo '</div>';
?>