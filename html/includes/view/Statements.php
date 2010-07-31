<?php 
include('includes/model/Transaction.Class.php');
echo '<div>';
$transactionToDisplay = new Transaction();
$transactionToDisplay->test();
$transactionToDisplay->displayTransaction();
echo '</div>';

?>
<!-- Ctreate row in table -->
<table border = "1">
<tr>
<td>
Date
</td>
<td>
Desctiption
</td>
<td>
Withdraw
</td>
<td>
Deposits
</td>
<td>
Balance
</td>
</tr>
<?php $transactionToDisplay->displayTransactionInRow();?>
</table>