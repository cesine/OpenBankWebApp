<?php 
include('includes/model/Transaction.Class.php');
echo '<div>';
$transactionToDisplay = new Transaction();
$transactionToDisplay->test();
$transactionToDisplay->displayTransaction();
echo '</div>';
?>